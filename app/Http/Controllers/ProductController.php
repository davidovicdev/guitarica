<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Activity;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use App\Models\Review;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use phpDocumentor\Reflection\Types\Parent_;
use PhpParser\Node\Expr\AssignOp\ShiftLeft;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $limitPerPage = 10;
    protected $productModel, $imageModel, $brandModel, $categoryModel, $subCategoryModel, $priceModel, $reviewModel;
    public function __construct()
    {
        Parent::__construct();
        $this->activityModel = new Activity();
        $this->productModel = new Product();
        $this->imageModel = new Image();
        $this->brandModel = new Brand();
        $this->subCategoryModel = new SubCategory();
        $this->categoryModel = new Category();
        $this->priceModel = new Price();
        $this->reviewModel = new Review();
    }
    public function insertActivity($message)
    {
        $activity = session("user")->first_name . " " . session("user")->last_name . " $message";
        $this->activityModel->name = $activity;
        $this->activityModel->created_at = now();
        $this->activityModel->save();
    }
    public function index(Request $request)
    {

        if ($request->search == null) $products = Product::paginate($this->limitPerPage);
        else $products = Product::with(["brand"])
            ->whereHas("brand", function ($query) use ($request) {
                return $query->where("name", "LIKE", "%$request->search%");
            })
            ->orWhereHas("subCategory", function ($query) use ($request) {
                return $query->where("name", "LIKE", "%$request->search%");
            })
            ->orWhere("name", "LIKE", "%$request->search%")
            ->paginate($this->limitPerPage);

        foreach ($products as $product) {
            $product->price =  $this->priceModel->where("product_id", $product->id)->first()->price;
            $product->images =  $this->imageModel->where("product_id", $product->id)->get();
            $product->sub_category =  $this->subCategoryModel->where("id", $product->sub_category_id)->first()->name;
            $product->src =  $this->imageModel->where("product_id", $product->id)->first()->src;
            $product->brand =  $this->brandModel->where("id", $product->brand_id)->first()->name;
            $starsSum =  $this->reviewModel->where("product_id", $product->id)->sum("mark_id");
            $starsCount =  $this->reviewModel->where("product_id", $product->id)->count();
            if ($starsCount and $starsSum) {
                $product->stars =  $starsSum / $starsCount;
            }
        }
        $products->search  =  $request->search;
        $this->data["products"] = $products;
        $this->data["categories"] = Category::all();
        $this->data["brands"] = Brand::all();
        return view("pages.products.products", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware(["isLogged", "isAdmin"]);
        $this->data["brands"] = $this->brandModel->get();
        return view("pages.products.create", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $this->middleware(["isLogged", "isAdmin"]);
        try {
            DB::beginTransaction();
            $productId = $this->productModel->insertGetId([
                "brand_id" => $request->brand,
                "sub_category_id" => $request->subCategory,
                "name" => $request->product_name,
                "description" => $request->product_description,
                "quantity" => $request->product_quantity,
                "created_at" => now(),
                "updated_at" => now()
            ]);
            $this->priceModel->insert([
                "product_id" => $productId,
                "active" => 1,
                "price" => $request->product_price,
                "created_at" => now(),
                "updated_at" => now()
            ]);
            foreach ($request->images as $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move(public_path('img'), $name);
                $this->imageModel->insert([
                    "product_id" => $productId,
                    "src" => $name,
                    "alt" => $name,
                    "created_at" => now()
                ]);
            }
            DB::commit();
            return redirect()->route("products.show", $productId)->with(["msg" => "Successfully added a product"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(["error" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $product = $this->productModel->find($id);
        $product->sub_category = $this->subCategoryModel->where("id", $product->sub_category_id)->first()->name;
        $categoryId = $this->subCategoryModel->where("id", $product->sub_category_id)->first()->category_id;
        $product->category =  $this->categoryModel->find($categoryId)->name;
        $product->firstImage = $this->imageModel->where("product_id", $id)->first()->src;
        $product->images = $this->imageModel->where("product_id", $id)->get();
        $product->images->shift();
        $product->brand = $this->brandModel->where("id", $product->brand_id)->first()->name;
        $starsSum = $this->reviewModel->where("product_id", $product->id)->sum("mark_id");
        $starsCount = $this->reviewModel->where("product_id", $product->id)->count();
        if ($starsCount and $starsSum) {
            $product->stars =  $starsSum / $starsCount;
        }
        $this->data["product"] = $product;
        return view("pages.products.product", $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware(["isLogged", "isAdmin"]);
        $this->data["product"] = $this->productModel->find($id);
        return view("pages.products.edit", $this->data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->middleware(["isLogged", "isAdmin"]);
        if (strlen($request->product_name) < 5) return redirect()->back()->with(["product_name" => "Product name needs to be at least 5 characters long"]);
        try {
            DB::beginTransaction();
            $product = $this->productModel->find($id);
            $product->name = $request->product_name;
            $product->description = $request->product_description;
            $product->quantity = $request->product_quantity;
            $product->save();
            //SET CURRENT PRICE TO INACITVE
            if ($product->price()->where("active", 1)->first()->price != $request->product_price) {
                $product->price()->where("active", 1)->first()->update([
                    "active" => 0
                ]);
                $this->priceModel->insert([
                    "product_id" => $id,
                    "price" => $request->product_price,
                    "active" => 1,
                    "created_at" => now(),
                ]);
            }
            DB::commit();
            return redirect()->back()->with(["msg" => "Successfully updated product"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(["error" => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware(["isLogged", "isAdmin"]);
        try {
            $product = $this->productModel->find($id);
            $product->reviews()->delete();
            $product->price()->delete();
            $product->wishlists()->delete();
            $product->images()->delete();
            $product->delete();
            return Json::encode(1);
        } catch (\Throwable $th) {
            DB::rollBack();
            return Json::encode($th->getMessage());
        }
    }
    public function getByCategories(Request $request)
    {
        if ($request->categories == null) {
            $products = Product::all();
        } else {
            $subCategoriesIds = [];
            foreach ($this->subCategoryModel->whereIn("category_id", $request->categories)->get() as $s) {
                array_push($subCategoriesIds, $s->id);
            }
            $products = $this->productModel->whereIn("sub_category_id", $subCategoriesIds)->get();
        }
        foreach ($products as $product) {
            $product->price =  $this->priceModel->where("product_id", $product->id)->first()->price;
            $product->images =  $this->imageModel->where("product_id", $product->id)->get();
            $product->sub_category =  $this->subCategoryModel->where("id", $product->sub_category_id)->first()->name;
            $product->src =  $this->imageModel->where("product_id", $product->id)->first()->src;
            $product->brand =  $this->brandModel->where("id", $product->brand_id)->first()->name;
            $starsSum =  $this->reviewModel->where("product_id", $product->id)->sum("mark_id");
            $starsCount =  $this->reviewModel->where("product_id", $product->id)->count();
            $product->stars =  $starsSum / $starsCount;
        }
        $products->search = "";
        $this->data["products"] = $products;
        $this->data["categories"] = Category::all();
        $this->data["brands"] = Brand::all();
        return Json::encode(view("inc.products", $this->data)->render());
    }
    public function addComment(Request $request)
    {
        $this->middleware("isLogged");
        try {
            DB::beginTransaction();
            $this->reviewModel->user_id = session("user")->id;
            $this->reviewModel->product_id = $request->product_id;
            $this->reviewModel->mark_id = $request->mark_id;
            $this->reviewModel->description = $request->description;
            $this->reviewModel->title = $request->title;
            $this->reviewModel->created_at = now();
            $this->reviewModel->updated_at = now();
            $this->reviewModel->save();
            $product = Product::find($request->product_id);
            $this->insertActivity("has added comment on $product->name");
            DB::commit();
            $this->reviewModel->user = session("user");
            return Json::encode($this->reviewModel);
        } catch (\Exception $e) {
            DB::rollBack();
            return Json::encode(0);
        }
    }
    public function removeComment(Request $request)
    {
        $this->middleware("isLogged");
        try {
            DB::beginTransaction();
            $this->reviewModel->where("user_id", session("user")->id)->where("product_id", $request->product_id)->delete();
            $product = Product::find($request->product_id);
            $this->insertActivity("has removed comment from $product->name");
            DB::commit();
            return JSON::encode(1);
        } catch (Exception $e) {
            DB::rollBack();
            return JSON::encode($e->getMessage());
        }
    }
}

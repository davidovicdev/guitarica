<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use App\Models\Wishlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;
use Nette\Utils\Json;
use phpDocumentor\Reflection\Types\Parent_;

class WishlistController extends Controller
{
    protected $wishlistModel, $imageModel, $priceModel;
    public function __construct()
    {
        Parent::__construct();
        $this->activityModel = new Activity();
        $this->wishlistModel = new Wishlist();
        $this->imageModel = new Image();
        $this->priceModel = new Price();
    }
    public function insertActivity($message)
    {
        $activity = session("user")->first_name . " " . session("user")->last_name . " $message";
        $this->activityModel->name = $activity;
        $this->activityModel->created_at = now();
        $this->activityModel->save();
    }
    public function index()
    {
        $productsIds = [];
        foreach (Wishlist::where("user_id", session("user")->id)->get() as $product) {
            array_push($productsIds, $product->product_id);
        }

        $products = Product::whereIn("id", $productsIds)->paginate(10);
        foreach ($products as $product) {
            $product->firstImage = $this->imageModel->where("product_id", $product->id)->first()->src;
            $product->price =  $this->priceModel->where("product_id", $product->id)->first()->price;
        }
        $this->data["products"] = $products;
        return view("pages.wishlist", $this->data);
    }
    public function store($productId)
    {
        try {
            DB::beginTransaction();
            $this->wishlistModel->insert([
                "user_id" => session("user")->id,
                "product_id" => $productId,

            ]);
            $product = Product::find($productId);
            $this->insertActivity("has added $product->name to wishlist");
            DB::commit();
            return Json::encode(1);
        } catch (Exception $e) {
            DB::rollBack();
            return Json::encode(0);
        }
    }
    public function destroy($productId)
    {
        try {
            DB::beginTransaction();
            $this->wishlistModel->where("product_id", $productId)->delete();
            $product = Product::find($productId);
            $this->insertActivity("has removed $product->name from wishlist");
            DB::commit();
            return Json::encode(1);
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return Json::encode(0);
        }
    }
}

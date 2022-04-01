<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Cart;
use App\Models\Image;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Price;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use phpDocumentor\Reflection\Types\Parent_;
use Throwable;

use function PHPUnit\Framework\returnSelf;

class CartController extends Controller
{
    protected $cartModel, $imageModel, $priceModel;
    public function __construct()
    {
        Parent::__construct();
        $this->activityModel = new Activity();
        $this->cartModel = new Cart();
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
        foreach (Cart::where("user_id", session("user")->id)->get() as $product) {
            array_push($productsIds, $product->product_id);
        }

        $products = Product::whereIn("id", $productsIds)->paginate(10);
        $total = 0;
        foreach ($products as $product) {
            $product->firstImage = $this->imageModel->where("product_id", $product->id)->first()->src;
            $product->price =  $this->priceModel->where("product_id", $product->id)->first()->price;
            $product->quantity = $this->cartModel->where("product_id", $product->id)->where("user_id", session()->get("user")->id)->first()->quantity;
            $total += (int) $product->price * $product->quantity;
        }
        $products->totalPrice = $total;
        $this->data["products"] = $products;
        return view("pages.cart", $this->data);
    }
    public function store($productId)
    {
        try {
            DB::beginTransaction();
            $this->cartModel->insert([
                "user_id" => session("user")->id,
                "product_id" => $productId,
                "quantity" => 1,
                "created_at" => now()
            ]);
            $product = Product::find($productId);
            $this->insertActivity("has added $product->name to cart");
            DB::commit();
            return Json::encode(1);
        } catch (Exception $e) {
            DB::rollBack();
            return Json::encode($e->getMessage());
        }
    }
    public function destroy($productId)
    {
        try {
            DB::beginTransaction();
            $this->cartModel->where("product_id", $productId)->where("user_id", session("user")->id)->delete();
            $product = Product::find($productId);
            $this->insertActivity("has removed $product->name from cart");
            DB::commit();
            return Json::encode(1);
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return Json::encode(0);
        }
    }
    public function update($productId, $times)
    {
        /*  dd($productId, $times); */
        try {
            DB::beginTransaction();
            DB::table("cart")->where("product_id", $productId)->where("user_id", session("user")->id)->update([
                "quantity" => $times
            ]);
            DB::commit();
            return Json::encode(1);
        } catch (Throwable $e) {
            DB::rollBack();
            return Json::encode($e->getMessage());
        }
    }
    public function order(Request $request)
    {
        try {
            //VALIDATION
            if (count($request->product_id) < 1) return redirect()->back()->with(["msg" => "Your cart is empty"]);
            DB::beginTransaction();
            //REDUCE QUANTITY FOREACH PRODUCT
            $products = Product::whereIn("id", $request->product_id)->get();
            $totalPrice = 0;
            for ($i = 0; $i < count($products); $i++) {
                $products[$i]->quantity -=  $request->quantities[$i];
                $products[$i]->save();
                $totalPrice += $products[$i]->price->price * $request->quantities[$i];
            }
            //CREATE ORDER
            $orderId = Order::insertGetId([
                "user_id" => session()->get("user")->id,
                "total" => $totalPrice,
                "created_at" => now()
            ]);
            //FOREACH PRODUCT INSERT INTO ORDER_PRODUCT
            foreach ($products as $i => $product) {
                OrderProduct::insert([
                    "order_id" => $orderId,
                    "product_id" => $product->id,
                    "product_name" => $product->name,
                    "quantity" => $request->quantities[$i],
                    "price" => $products[$i]->price->price * $request->quantities[$i],
                    "created_at" => now()
                ]);
            }
            //EMPTY CART
            DB::table("cart")->where("user_id", session("user")->id)->delete();
            $this->insertActivity("has made an order");
            DB::commit();
            return redirect()->route("dashboard")->with(["msg" => "Your order was successful. You can expect your products within 3 days. Your cart is now empty"]);
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with(["msg" => "Your cart is empty"]);
        }
    }
}

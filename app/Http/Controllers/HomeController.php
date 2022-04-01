<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Price;
use App\Models\Product;
use App\Models\Review;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Parent_;

class HomeController extends Controller
{

    //
    public function index()
    {
        $this->data["products"] = [Product::find(25), Product::find(44), Product::find(51), Product::find(11)];
        return view("pages.index", $this->data);
    }

    public function about()
    {
        return view("pages.about", $this->data);
    }
    public function dashboard()
    {
        $orders = Order::where("user_id", session("user")->id)->get();
        foreach ($orders as $order) {
            $order->products = OrderProduct::where("order_id", $order->id)->get();
        }
        $this->data["orders"] = $orders;
        return view("pages.auth.dashboard", $this->data);
    }
    public function aboutAuthor()
    {
        return view("pages.aboutAuthor", $this->data);
    }
}

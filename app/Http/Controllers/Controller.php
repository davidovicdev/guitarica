<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Menu;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $data = [], $activityModel;

    public function __construct()
    {
        if (session()->has("user")) {
            $this->data["wishlistCounter"] = Wishlist::where("user_id", session("user")->id)->count();
            $this->data["cartCounter"] = Cart::where("user_id", session("user")->id)->count();
        } else {
            $this->data["wishlistCounter"] = 0;
            $this->data["cartCounter"] = 0;
        }
        $this->data["categories"] = Category::all();
        $this->data["subCategories"] = SubCategory::all();
        $this->data["menu"] = Menu::all();
    }
}

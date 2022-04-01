<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;

class AdminPanelController extends Controller
{


    public function index()
    {
        $this->data["activites"] = Activity::all();
        $this->data["orders"] = Order::all();
        $this->data["totalQuantity"] = Product::all()->sum("quantity");
        $this->data["users"] = User::all()->count();
        return view("admin.pages.dashboard", $this->data);
    }
    public function activites(Request $request)
    {
        if ($request->sort) {
            $this->data["activites"] = Activity::orderBy("created_at", $request->sort)->get();
            $this->data["sort"] = $request->sort;
            return view("admin.pages.activites", $this->data);
        } else {
            $this->data["activites"] = Activity::all();
            $this->data["sort"] = "desc";
            return view("admin.pages.activites", $this->data);
        }
    }
    public function products()
    {
        $this->data["products"] = Product::paginate(20);
        return view("admin.pages.products", $this->data);
    }
    public function categories()
    {

        $this->data["categories"] = Category::orderBy("id", "ASC")->get();
        $this->data["subCategories"] = SubCategory::orderBy("id", "ASC")->get();
        return view("admin.pages.categories", $this->data);
    }
    public function users()
    {
        $this->data["users"] = User::all();
        return view("admin.pages.users", $this->data);
    }
    public function orders()
    {
        $this->data["orders"] = Order::all();
        return view("admin.pages.orders", $this->data);
    }
    public function deleteActivity($id)
    {
        try {
            DB::beginTransaction();
            Activity::destroy($id);
            DB::commit();
            return Json::encode(1);
        } catch (\Throwable $th) {
            DB::rollBack();
            return Json::encode($th->getMessage());
        }
        return view("admin.pages.orders", $this->data);
    }
}

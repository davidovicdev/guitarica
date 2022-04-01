<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get("/products/getByCategories", [ProductController::class, "getByCategories"]);
Route::resource('/products', ProductController::class);
Route::post("/login", [AuthController::class, "login"])->name("login");
Route::post("/register", [AuthController::class, "register"])->name("register");
Route::get("/", [HomeController::class, "index"])->name("index");
Route::get("/about", [HomeController::class, "about"])->name("about");
Route::get("/aboutAuthor", [HomeController::class, "aboutAuthor"])->name("aboutAuthor");
Route::get("/contact", [ContactController::class, "index"])->name("contact.index");
Route::get("/sendMail", [MailController::class, "index"])->name("sendMail");

Route::middleware(['isLogged'])->group(function () {
    Route::post("/updatequantity/{id}/{times}", [CartController::class, "update"])->name("cart.update");
    Route::post("/logout", [AuthController::class, "logout"])->name("logout");
    Route::get("/dashboard", [HomeController::class, "dashboard"])->name("dashboard");
    Route::get("/wishlist", [WishlistController::class, "index"])->name("wishlist");
    Route::post("/wishlist/{id}", [WishlistController::class, "store"])->name("wishlist.store");
    Route::post("/wishlist/remove/{id}", [WishlistController::class, "destroy"])->name("wishlist.destroy");
    Route::post("/addComment", [ProductController::class, "addComment"]);
    Route::post("/removeComment", [ProductController::class, "removeComment"]);
    Route::get("/cart", [CartController::class, "index"])->name("cart.index");
    Route::post("/cart/{id}", [CartController::class, "store"])->name("cart.store");
    Route::post("/cart/remove/{id}", [CartController::class, "destroy"])->name("cart.destroy");
    Route::post("/order", [CartController::class, "order"])->name("order");
    Route::put("/editInfo", [AuthController::class, "editInfo"])->name("editInfo");
});
Route::middleware(["isLogged", "isAdmin"])->group(function () {
    Route::get("/adminpanel", [AdminPanelController::class, "index"])->name("adminpanel.index");
    Route::get("/adminpanel/activites", [AdminPanelController::class, "activites"])->name("adminpanel.activites");
    Route::get("/adminpanel/users", [AdminPanelController::class, "users"])->name("adminpanel.users");
    Route::get("/adminpanel/products", [AdminPanelController::class, "products"])->name("adminpanel.products");
    Route::get("/adminpanel/orders", [AdminPanelController::class, "orders"])->name("adminpanel.orders");
    Route::get("/adminpanel/categories", [AdminPanelController::class, "categories"])->name("adminpanel.categories");
    Route::delete("/activity/{id}/delete", [AdminPanelController::class, "deleteActivity"])->name("activities.destroy");
});

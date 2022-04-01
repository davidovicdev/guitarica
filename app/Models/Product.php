<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    public function reviews()
    {
        return $this->hasMany(Review::class)->orderBy("updated_at", "DESC")->orderBy("created_at", "DESC");
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function price()
    {
        return $this->hasOne(Price::class);
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}

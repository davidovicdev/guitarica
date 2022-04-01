<?php

namespace App\Models;

use App\Http\Requests\LoginRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class User extends Model
{

    use HasFactory;
    public function getUsers()
    {
        return DB::table("users")->get();
    }
    public function getUser($id)
    {
        return DB::table("users")->find($id);
    }
    public function loginUser(Request $request)
    {
        return DB::table('users')
            ->where("email", $request->login_email)
            ->where("password", md5($request->login_password))
            ->first();
    }
    public function insertUser(Request $request)
    {
        try {
            $id = DB::table("users")->insertGetId([
                "first_name" => $request->register_first_name,
                "last_name" => $request->register_last_name,
                "email" => $request->register_email,
                "phone" => $request->register_phone,
                "address" => $request->register_address,
                "password" => md5($request->register_password),
                "role_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ]);
            return DB::table("users")->find($id);
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }
    public function wishlists()
    {
        $this->hasMany(Wishlist::class);
    }
    public function role()
    {
        $this->belongsTo(Role::class);
    }
    public function cart()
    {
        $this->hasOne(Cart::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class)->orderBy("updated_at", "DESC")->orderBy("created_at", "DESC");
    }
}

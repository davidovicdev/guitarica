<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $titles = ["Great Product", "Best Product Ever", "Good", "Best", "Excellent"];
        $descriptions = ["This was my first product bought from this website and it is awesome", "I recently bought this product and its fantastic", "No comments for it, great product", "Good, good"];
        $totalProducts = 60;
        foreach (DB::table("users")->where("role_id", 1)->get() as $user) {
            $id = $user->id;
            for ($i = 1; $i <= $totalProducts; $i++) {
                DB::table("reviews")->insert([
                    "product_id" => $i,
                    "user_id" => $id,
                    "mark_id" => rand(1, 5),
                    "title" => $titles[rand(0, count($titles) - 1)],
                    "description" => $descriptions[rand(0, count($descriptions) - 1)],
                    "created_at" =>  $faker->dateTime()
                ]);
            }
        }
    }
}

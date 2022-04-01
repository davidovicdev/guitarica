<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices = [60, 60, 55, 90, 90, 95, 130, 1480, 110, 110, 130, 130, 130, 15, 20, 5, 460, 320, 430, 850, 920, 1230, 1300, 50, 100, 20, 45, 90, 2000, 300, 900, 2500, 90, 160, 10, 10, 10, 250, 100, 190, 230, 290, 70, 140, 210, 1500, 280, 1100, 410, 600, 830, 1900, 520, 2030, 300, 800, 670, 2000, 1500, 1400];
        $productId = 1;
        foreach ($prices as $price) {
            DB::table('prices')->insert([
                "product_id" => $productId,
                "price" => $price,
                "active" => 1,
                "created_at" => now()
            ]);
            $productId++;
        }
    }
}

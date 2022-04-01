<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ["Korg", "K&M", "Alesis", "Casio", "Vox", "Soundsation", "Vinage", "Ibanez", "Admira", "Elixir", "ABC", "Vic", "Audac", "DB", "Void", "Denon", "Numark", "Pioneer", "Valencia", "Ernie Ball", "Laney", "Rane"];
        foreach ($brands as $brand) {
            DB::table('brands')->insert([
                "name" => $brand
            ]);
        }
    }
}

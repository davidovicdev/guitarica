<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = [["Home", "index"], ["Shop", "products.index"], ["Contact", "contact.index"], ["About us", "about"], ["About author", "aboutAuthor"]];
        foreach ($menu as $m) {
            DB::table("menu")->insert(["title" => $m[0], "route" => $m[1]]);
        }
    }
}

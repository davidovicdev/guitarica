<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marks = [1, 2, 3, 4, 5];
        foreach ($marks as $mark) {
            DB::table("marks")->insert(["mark" => $mark]);
        }
    }
}

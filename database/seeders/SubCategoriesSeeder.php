<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subCategories = [
            ["Classical guitars", "Acoustic guitars", "Electric guitars", "Bass guitars", "Guitar strings"],
            ["Acoustic pianos", "Electric pianos", "Arrangers", "Synthesizers", "Piano equipment and other"], ["Acoustic drums", "Electric drums", "Percussion drums", "Sticks", "Other"],
            ["Amplifiers for acoustic guitar", "Amplifiers for electric guitar", "Amplifiers for bass guitar"],
            ["Controllers", "Gramophones", "Mixers", "Effects", "Media players"]
        ];
        $categoryId = 1;
        for ($i = 0; $i < count($subCategories); $i++) {
            for ($l = 0; $l < count($subCategories[$i]); $l++) {
                DB::table("sub_categories")->insert(["name" => $subCategories[$i][$l], "category_id" => $categoryId]);
            }
            $categoryId++;
        }
    }
}

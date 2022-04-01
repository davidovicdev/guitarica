<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [
            MenuSeeder::class,
            RolesSeeder::class,
            CategoriesSeeder::class,
            MarksSeeder::class,
            BrandsSeeder::class,
            SubCategoriesSeeder::class,
            /* These seeders need to be last */
            ProductsSeeder::class,
            ImagesSeeder::class,
            PricesSeeder::class,
            UsersSeeder::class,
            ReviewsSeeder::class,
        ];
        foreach ($seeders as $seeder) {
            $this->call($seeder);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $discounts = [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60];
        $products = [
            /* Classical guitars */
            [
                "sub_category_id" => 1,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Toledo Primera Student 4/4",
                "description" => "Prvi koraci su najbitniji u učenju bilo kog instrumenta. Mekan vrat za lako sviranje prstima, što pomaže učenicima da sviraju i melodije i akorde. U pitanju je cela gitara, postoji model ove gitare 3/4 i 1/2"
            ],
            [
                "sub_category_id" => 1,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Toledo Primera Student 44 BK",
                "description" => "Prvi koraci su najbitniji u učenju bilo kog instrumenta. Mekan vrat za lako sviranje prstima, što pomaže učenicima da sviraju i melodije i akorde. U pitanju je cela gitara, postoji model ove gitare 3/4 i 1/2"
            ],
            [
                "sub_category_id" => 1,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Toledo Primera Student 34",
                "description" => "Prvi koraci su najbitniji u učenju bilo kog instrumenta. Mekan vrat za lako sviranje prstima, što pomaže učenicima da sviraju i melodije i akorde. U pitanju je 3/4 gitara, za decu od 6 do 10 godina"
            ],
            [
                "sub_category_id" => 1,
                "brand_id" => 19,
                "quantity" => rand(5, 30),
                "name" => "VC104K Pack",
                "description" => "Valencia VC104Kit 4/4 u paketu sa torbom i štimerom je jedna od najpopularnijih klasicnih gitara namenjena početnicima. Odlican izbor po pristupacnoj ceni. "
            ],

            /* Acoustic guitars */

            [
                "sub_category_id" => 2,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Yellowstone MJCE SB",
                "description" => null
            ],
            [
                "sub_category_id" => 2,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Yellowstone MJCE NT",
                "description" => null
            ],
            [
                "sub_category_id" => 2,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Yellowstone MJCE BK",
                "description" => null
            ],

            /* Electric guitars */

            [
                "sub_category_id" => 3,
                "brand_id" => 5,
                "quantity" => rand(5, 30),
                "name" => "Bobcat S66B",
                "description" => null
            ],
            [
                "sub_category_id" => 3,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Rider-STD-H BK",
                "description" => null
            ],
            [
                "sub_category_id" => 3,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Rider-STD-H 3TS",
                "description" => null
            ],

            /* Bass guitars */

            [
                "sub_category_id" => 4,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Horseman BK",
                "description" => null
            ],
            [
                "sub_category_id" => 4,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Horseman 3TS",
                "description" => null
            ],
            [
                "sub_category_id" => 4,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Horseman TRD",
                "description" => null
            ],

            /* Guitar strings */

            [
                "sub_category_id" => 5,
                "brand_id" => 10,
                "quantity" => rand(5, 30),
                "name" => "Nanoweb Electric Super light",
                "description" => null
            ],
            [
                "sub_category_id" => 5,
                "brand_id" => 10,
                "quantity" => rand(5, 30),
                "name" => "Nanoweb 80/20 Acoustic Guitar Strings",
                "description" => null
            ],
            [
                "sub_category_id" => 5,
                "brand_id" => 20,
                "quantity" => rand(5, 30),
                "name" => "Super Slinky",
                "description" => null
            ],


            /* Acoustic pianos */

            /* Electric pianos */

            [
                "sub_category_id" => 7,
                "brand_id" => 3,
                "quantity" => rand(5, 30),
                "name" => "Recital PRO",
                "description" => null
            ],
            [
                "sub_category_id" => 7,
                "brand_id" => 3,
                "quantity" => rand(5, 30),
                "name" => "Concert",
                "description" => null
            ],
            [
                "sub_category_id" => 7,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Primius",
                "description" => null
            ],

            /* Arrangers */

            [
                "sub_category_id" => 8,
                "brand_id" => 1,
                "quantity" => rand(5, 30),
                "name" => "Pa4x-61",
                "description" => null
            ],
            [
                "sub_category_id" => 8,
                "brand_id" => 1,
                "quantity" => rand(5, 30),
                "name" => "Pa4x-76",
                "description" => null
            ],
            [
                "sub_category_id" => 8,
                "brand_id" => 1,
                "quantity" => rand(5, 30),
                "name" => "PA-700",
                "description" => null
            ],

            /* Synthesizers */

            [
                "sub_category_id" => 9,
                "brand_id" => 1,
                "quantity" => rand(5, 30),
                "name" => "MS20-FS",
                "description" => null
            ],
            [
                "sub_category_id" => 9,
                "brand_id" => 3,
                "quantity" => rand(5, 30),
                "name" => "Harmony 32",
                "description" => null
            ],
            [
                "sub_category_id" => 9,
                "brand_id" => 1,
                "quantity" => rand(5, 30),
                "name" => "NTS-1 Digital",
                "description" => null
            ],

            /* Piano equipment and other */

            [
                "sub_category_id" => 10,
                "brand_id" => 2,
                "quantity" => rand(5, 30),
                "name" => "Boom Arm Black",
                "description" => null
            ],
            [
                "sub_category_id" => 10,
                "brand_id" => 1,
                "quantity" => rand(5, 30),
                "name" => "DS-1H",
                "description" => null
            ],
            [
                "sub_category_id" => 10,
                "brand_id" => 1,
                "quantity" => rand(5, 30),
                "name" => "EC-5",
                "description" => null
            ],

            /* Acoustic drums */

            [
                "sub_category_id" => 11,
                "brand_id" => 5,
                "quantity" => rand(5, 30),
                "name" => "Telstar 2020",
                "description" => null
            ],

            /* Electric drums */

            [
                "sub_category_id" => 12,
                "brand_id" => 3,
                "quantity" => rand(5, 30),
                "name" => "Debut Kit",
                "description" => null
            ],
            [
                "sub_category_id" => 12,
                "brand_id" => 3,
                "quantity" => rand(5, 30),
                "name" => "Crimson II Kit",
                "description" => null
            ],
            [
                "sub_category_id" => 12,
                "brand_id" => 3,
                "quantity" => rand(5, 30),
                "name" => "Strike Pro Special Edition",
                "description" => null
            ],

            /* Percussion drums */

            [
                "sub_category_id" => 13,
                "brand_id" => 3,
                "quantity" => rand(5, 30),
                "name" => "PERCPAD",
                "description" => null
            ],
            [
                "sub_category_id" => 13,
                "brand_id" => 3,
                "quantity" => rand(5, 30),
                "name" => "Sample Pad 4",
                "description" => null
            ],

            /* Sticks */

            [
                "sub_category_id" => 14,
                "brand_id" => 12,
                "quantity" => rand(5, 30),
                "name" => "Firth 5A",
                "description" => null
            ],
            [
                "sub_category_id" => 14,
                "brand_id" => 12,
                "quantity" => rand(5, 30),
                "name" => "Firth 5AN",
                "description" => null
            ],
            [
                "sub_category_id" => 14,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "SD-5AN",
                "description" => null
            ],

            /* Other */

            /* Amplifiers for acoustic guitar */

            [
                "sub_category_id" => 16,
                "brand_id" => 5,
                "quantity" => rand(5, 30),
                "name" => "VX50AG",
                "description" => null
            ],
            [
                "sub_category_id" => 16,
                "brand_id" => 21,
                "quantity" => rand(5, 30),
                "name" => "LA15C",
                "description" => null
            ],

            /* Amplifiers for electric guitar */

            [
                "sub_category_id" => 17,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "GC212-E",
                "description" => null
            ],
            [
                "sub_category_id" => 17,
                "brand_id" => 5,
                "quantity" => rand(5, 30),
                "name" => "Cambridge 50",
                "description" => null
            ],
            [
                "sub_category_id" => 17,
                "brand_id" => 5,
                "quantity" => rand(5, 30),
                "name" => "Pathfinder 10",
                "description" => null
            ],

            /* Amplifiers for bass guitar */

            [
                "sub_category_id" => 18,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Red Spark 15",
                "description" => null
            ],
            [
                "sub_category_id" => 18,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Red Spark 30",
                "description" => null
            ],
            [
                "sub_category_id" => 18,
                "brand_id" => 6,
                "quantity" => rand(5, 30),
                "name" => "Red Spark 60",
                "description" => null
            ],

            /* Controllers */

            [
                "sub_category_id" => 19,
                "brand_id" => 16,
                "quantity" => rand(5, 30),
                "name" => "Prime 2",
                "description" => null
            ], [
                "sub_category_id" => 19,
                "brand_id" => 17,
                "quantity" => rand(5, 30),
                "name" => "Mixtrack Platinum FX",
                "description" => null
            ], [
                "sub_category_id" => 19,
                "brand_id" => 16,
                "quantity" => rand(5, 30),
                "name" => "Prime GO",
                "description" => null
            ],

            /* Gramophones */

            [
                "sub_category_id" => 20,
                "brand_id" => 17,
                "quantity" => rand(5, 30),
                "name" => "NTX1000",
                "description" => null
            ],
            [
                "sub_category_id" => 20,
                "brand_id" => 16,
                "quantity" => rand(5, 30),
                "name" => "VL12",
                "description" => null
            ],
            [
                "sub_category_id" => 20,
                "brand_id" => 18,
                "quantity" => rand(5, 30),
                "name" => "PLX-1000",
                "description" => null
            ],

            /* Mixers */

            [
                "sub_category_id" => 21,
                "brand_id" => 18,
                "quantity" => rand(5, 30),
                "name" => "DJM2000 Nexus",
                "description" => null
            ], [
                "sub_category_id" => 21,
                "brand_id" => 17,
                "quantity" => rand(5, 30),
                "name" => "Scratch",
                "description" => null
            ], [
                "sub_category_id" => 21,
                "brand_id" => 22,
                "quantity" => rand(5, 30),
                "name" => "Seventy-Two",
                "description" => null
            ],

            /* Effects */

            [
                "sub_category_id" => 22,
                "brand_id" => 1,
                "quantity" => rand(5, 30),
                "name" => "KAOSSPAD KP3+",
                "description" => null
            ],
            [
                "sub_category_id" => 22,
                "brand_id" => 18,
                "quantity" => rand(5, 30),
                "name" => "RMX 1000",
                "description" => null
            ],
            [
                "sub_category_id" => 22,
                "brand_id" => 18,
                "quantity" => rand(5, 30),
                "name" => "RMX 500",
                "description" => null
            ],

            /* Media Players */

            [
                "sub_category_id" => 23,
                "brand_id" => 16,
                "quantity" => rand(5, 30),
                "name" => "DJ SC6000M",
                "description" => null
            ], [
                "sub_category_id" => 23,
                "brand_id" => 16,
                "quantity" => rand(5, 30),
                "name" => "DJ SC5000M",
                "description" => null
            ], [
                "sub_category_id" => 23,
                "brand_id" => 16,
                "quantity" => rand(5, 30),
                "name" => "DJ SC5000",
                "description" => null
            ]


        ];
        foreach ($products as $product) {
            DB::table("products")->insert([
                "sub_category_id" => $product["sub_category_id"],
                "brand_id" => $product["brand_id"],
                "quantity" => $product["quantity"],
                "name" => $product["name"],
                "description" => $product["description"],
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
    }
}

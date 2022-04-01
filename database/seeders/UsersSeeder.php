<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use stdClass;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $admin = new stdClass();
        $user = new stdClass();
        $admin->first_name = "Matija";
        $admin->last_name = "Davidovic";
        $admin->address = "Zdravka Celara 16";
        $admin->phone = "+38163063063";
        $admin->email = "matija.davidovic.115.18@ict.edu.rs";
        $admin->password = md5("pass123");
        $admin->role_id = 2;
        DB::table('users')->insert([
            "first_name" => $admin->first_name,
            "last_name" => $admin->last_name,
            "address" => $admin->address,
            "email" => $admin->email,
            "phone" => $admin->phone,
            "password" => $admin->password,
            "role_id" => $admin->role_id,
            "created_at" => now(),
            "updated_at" => now()
        ]);
        $users = [
            ["Guest", "Guestovic", "Guestinska 14C", "+38164064064", "guest@gmail.com", "guest123"],
            [$faker->firstName, $faker->lastName, "Pozeska 24", $faker->phoneNumber, $faker->email, "guest123"],
            [$faker->firstName, $faker->lastName, "Kralja Milana 13/2", $faker->phoneNumber, $faker->email, "guest123"],
            [$faker->firstName, $faker->lastName, "Kralja Petra 74", $faker->phoneNumber, $faker->email, "guest123"],
            [$faker->firstName, $faker->lastName, "Bulevar Kralja Aleksandra 224", $faker->phoneNumber, $faker->email, "guest123"],
            [$faker->firstName, $faker->lastName, "Bulevar despota Stefana 119", $faker->phoneNumber, $faker->email, "guest123"],
            [$faker->firstName, $faker->lastName, "Tjentiste 223C", $faker->phoneNumber, $faker->email, "guest123"],
            [$faker->firstName, $faker->lastName, "Krunska 28", $faker->phoneNumber, $faker->email, "guest123"],
            [$faker->firstName, $faker->lastName, "Batutova 19B", $faker->phoneNumber, $faker->email, "guest123"],
        ];
        foreach ($users as $u) {
            DB::table('users')->insert([
                "first_name" => $u[0],
                "last_name" => $u[1],
                "address" => $u[2],
                "phone" => $u[3],
                "email" => $u[4],
                "password" => md5($u[5]),
                "role_id" => 1,
                "created_at" => now(),
                "updated_at" => null
            ]);
        }
    }
}

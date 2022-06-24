<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

            $newUser = new User();
            $newUser->image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnwfhQ8v3-pNPzCKAASEWGb4NOmBtjs4wTYQ&usqp=CAU";
            $newUser-> name_restaurant = "Gigi il troione"/* $faker->randomElement(["Shinto", "Puerto Messico", "Ristopizza Pizzorante", "Tonnarello", "Nunù","Ghandi", "Hang Zhou", "L'orto di Brera", "Hops!"]) */;
            $newUser->address='Via delle stelle, 1';
            $newUser->vat_number=$faker->vat();
            $newUser->email=$faker->email();
            $newUser->password = Hash::make("deliveboo");
            $newUser->save();

            $newUser = new User();
            $newUser -> image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnwfhQ8v3-pNPzCKAASEWGb4NOmBtjs4wTYQ&usqp=CAU";
            $newUser-> name_restaurant = "Da paolo"/* $faker->randomElement(["Shinto", "Puerto Messico", "Ristopizza Pizzorante", "Tonnarello", "Nunù","Ghandi", "Hang Zhou", "L'orto di Brera", "Hops!"]) */;
            $newUser->address='Via delle stelle, 12';
            $newUser->vat_number=$faker->vat();
            $newUser->email=$faker->email();
            $newUser->password = Hash::make("deliveboo");
            $newUser->save();


    }
}

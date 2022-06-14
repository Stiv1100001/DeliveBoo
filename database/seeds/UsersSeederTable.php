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
        for ($i=0 ; $i < 10 ; $i++) {
            $newUser = new User();
            $newUser -> image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnwfhQ8v3-pNPzCKAASEWGb4NOmBtjs4wTYQ&usqp=CAU";
            $newUser-> name_restaurant = $faker->randomElement(["Shinto", "Gigi il Troione", "Puerto Messico", "Ristopizza Pizzorante", "Tonnarello", "Nunù","Ghandi", "Hang Zhou", "L'orto di Brera", "Hops!"]);
            $newUser->address=$faker->address();
            $newUser->vat_number=$faker->vat();
            $newUser->email=$faker->email();
            $newUser->password = Hash::make("deliveboo". $i);
            $newUser->save();
        }
    }
}

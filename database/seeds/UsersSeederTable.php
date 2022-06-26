<?php

use App\User;
/* use App\Model\Type; */
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
           /* $id = Type::pluck("id")->toArray();
            $newUserOne = new User();
            $newUserOne->id = 1;
            $newUserOne->image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnwfhQ8v3-pNPzCKAASEWGb4NOmBtjs4wTYQ&usqp=CAU";
            $newUserOne->name_restaurant = "Gigi il troione"$faker->randomElement(["Shinto", "Puerto Messico", "Ristopizza Pizzorante", "Tonnarello", "Nunù","Ghandi", "Hang Zhou", "L'orto di Brera", "Hops!"]) ;
            $newUserOne->address='Via delle stelle, 1';
            $newUserOne->vat_number=$faker->vat();
            $newUserOne->email=$faker->email();
            $newUserOne->password = Hash::make("deliveboo");
            $newUserOne->save();

            $newUserTwo = new User();
            $newUserTwo->id = 2;
            $newUserTwo-> image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnwfhQ8v3-pNPzCKAASEWGb4NOmBtjs4wTYQ&usqp=CAU";
            $newUserTwo->name_restaurant = "Da paolo"$faker->randomElement(["Shinto", "Puerto Messico", "Ristopizza Pizzorante", "Tonnarello", "Nunù","Ghandi", "Hang Zhou", "L'orto di Brera", "Hops!"]) ;
            $newUserTwo->address='Via delle stelle, 12';
            $newUserTwo->vat_number=$faker->vat();
            $newUserTwo->email=$faker->email();
            $newUserTwo->password = Hash::make("deliveboo");
            $newUserTwo->save();

            $newUserThree = new User();
            $newUserThree->id = 2;
            $newUserThree-> image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnwfhQ8v3-pNPzCKAASEWGb4NOmBtjs4wTYQ&usqp=CAU";
            $newUserThree->name_restaurant = "pizzeria";
            $newUserThree->address='Via delle stelle, 12';
            $newUserThree->vat_number=$faker->vat();
            $newUserThree->email=$faker->email();
            $newUserThree->password = Hash::make("deliveboo");
            $newUserThree->save();
 */

            /* $newUserTwo = new User();
           $newUserTwo->id = 2;
            $newUserTwo-> image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnwfhQ8v3-pNPzCKAASEWGb4NOmBtjs4wTYQ&usqp=CAU";
            $newUserTwo->name_restaurant = "ciccio";
            $newUserTwo->address='Via delle stelle, 12';
            $newUserTwo->vat_number=$faker->vat();
            $newUserTwo->email=$faker->email();
            $newUserTwo->password = Hash::make("deliveboo");
            $newUserTwo->save(); */


    }
}

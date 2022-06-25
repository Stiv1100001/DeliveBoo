<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Dish;
use Faker\Generator as Faker;


class DishUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $User= User::pluck("id")->toArray();
        /* $Dishes = Dish::all();  */

    /*  foreach($Dishes as $dish){
            $user= $faker->randomElement($User);
            $dish->user_id=$user;
            $dish->save();
        } */
    }
}

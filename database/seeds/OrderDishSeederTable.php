<?php

use Illuminate\Database\Seeder; 
use App\Model\Order; 
use App\Model\Dish; 
use Faker\Generator as Faker;

class OrderDishSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $Orders= Order::all(); 
        $Dishes = Dish::pluck("id")->toArray(); 

        foreach($Orders as $order){
            $dish= $faker->randomElements($Dishes, rand(1, 3));
            $order->dish()->attach($dish, ["quantity"=> 1]);
        } 
    }
}

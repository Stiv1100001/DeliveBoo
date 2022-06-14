<?php

use Illuminate\Database\Seeder; 
use App\Model\Dish; 
use Faker\Generator as Faker; 

class DishesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <10 ; $i++) { 
            $newDish = new Dish(); 
            $newDish->name = $faker->word(); 
            $newDish->description= $faker->paragraph(4);
            $newDish->ingredients= $faker->paragraph(3);
            $newDish->price= $faker-> randomFloat(2, 10, 999);
            $newDish-> save(); 
        }
       
    }
}

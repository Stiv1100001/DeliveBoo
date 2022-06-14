<?php

use Illuminate\Database\Seeder;
use App\Model\Type; 
use App\User;  
use Faker\Generator as Faker;

class UserTypeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $User= User::all(); 
        $Type = Type::pluck("id")->toArray(); 

        foreach($User as $user){
            $type= $faker->randomElements($Type, rand(1, 3));
            $user->type()->sync($type); 
        }


    }
}

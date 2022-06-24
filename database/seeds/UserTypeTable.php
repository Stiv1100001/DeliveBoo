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
        $users = User::all();
        $types = Type::pluck("id")->toArray();

        foreach ($users as $user) {
            $types = $faker->randomElements($types, 1);
            $user->types()->sync($types);
        }
    }
}

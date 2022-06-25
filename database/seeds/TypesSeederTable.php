<?php

use App\Model\Type;
use Illuminate\Database\Seeder;

class TypesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()


    {
        $types = [
            "Italiano",
            "Cinese",
            "Sushi",
            "Messicano",
            "Ristorante",
            "Pizzeria",
            "Giapponese",
            "Tailandese",
            "Vegano",
            "Steakhouse",
            "Hambuegeria",
            "Pub"
        ];

        foreach($types as $type){
            $newType = new Type();
            $newType->name_type = $type;
            $newType-> save();
        };

        }
    }

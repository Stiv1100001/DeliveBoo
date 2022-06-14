<?php

use App\Model\Type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                UsersSeederTable::class,
                TypesSeederTable::class,
                UserTypeTable::class, 
                DishesSeederTable::class, 
                DishUserTable::class, 
                OrdersSeederTable::class, 
                

                
            ]
        );
    }
}

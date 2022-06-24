<?php

use Illuminate\Database\Seeder;
use App\Model\Order;
use Faker\Generator as Faker;

class OrdersSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <50 ; $i++) {
            $newOrder = new Order();
            $newOrder->name_customer = $faker->name();
            $newOrder->address_customer= $faker->address();
            $newOrder->phone_number_customer="3458989666";
            $newOrder->total_price= $faker->randomFloat(2, 5, 100);
            // $newOrder->data= $faker->date();
            $newOrder->save();
        }
    }
}

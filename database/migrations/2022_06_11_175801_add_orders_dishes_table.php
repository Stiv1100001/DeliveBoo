<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrdersDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("orders_dishes", function (Blueprint $table){
            $table->unsignedBigInteger("order_id"); 
            $table->foreign("order_id")
            ->references("id")
            ->on("orders")->onDelete("cascade");

            $table->unsignedBigInteger("dish_id"); 
            $table->foreign("dish_id")
            ->references("id")
            ->on("dishes")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("orders_dishes");
    }
}

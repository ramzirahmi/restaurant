<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_meals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('discount');
             $table->integer('item_id')->unsigned();
             $table->foreign('item_id')->references('id')->on('items');
              $table->integer('meal_id')->unsigned();
             $table->foreign('meal_id')->references('id')->on('meals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_meals');
    }
}

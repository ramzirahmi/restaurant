<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
             $table->string('title');
             $table->text('descrption');
             $table->boolean('status');
             $table->string('image');
             $table->decimal('rate');
             $table->integer('customer_id')->unsigned();
             $table->foreign('customer_id')->references('id')->on('customers');
             $table->integer('order_id')->unsigned()->nullable();
             $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::dropIfExists('comments');
    }
}

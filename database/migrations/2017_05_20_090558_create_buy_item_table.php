<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shopping_cart_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quatity');
            $table->timestamps();
        });

        Schema::table('buy_item', function($table) {
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_cart');
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy_item');
    }
}

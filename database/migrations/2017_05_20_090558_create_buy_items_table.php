<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shopping_cart_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quatity');
            $table->timestamps();
        });

        Schema::table('buy_items', function($table) {
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts');
            $table->foreign('product_id')->references('id')->on('products');
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

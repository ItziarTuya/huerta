<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producer_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('picture');
            $table->double('price');
            $table->integer('stock');
            $table->string('category');
            $table->timestamps();
        });

        Schema::table('product', function($table) {
            $table->foreign('producer_id')->references('id')->on('producer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}

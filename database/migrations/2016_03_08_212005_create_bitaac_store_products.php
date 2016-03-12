<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitaacStoreProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__bitaac_store_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->string('type', 20)->default('item');
            $table->string('contains', 255);
            $table->string('description', 255)->default('');
            $table->integer('points')->default(1);
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
        Schema::drop('__bitaac_store_products');
    }
}

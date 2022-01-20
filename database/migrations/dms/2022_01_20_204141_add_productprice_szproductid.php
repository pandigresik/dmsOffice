<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductpriceSzproductid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_price', function(Blueprint $table){
            $table->string('product_id', 50)->nullable();
        });
        Schema::table('product_price_log', function(Blueprint $table){
            $table->string('product_id', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_price', function(Blueprint $table){
            $table->dropColumn('product_id');
        });
        Schema::table('product_price_log', function(Blueprint $table){
            $table->dropColumn('product_id');
        });
    }
}

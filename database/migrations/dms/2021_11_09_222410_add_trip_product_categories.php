<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTripProductCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::table('trip', function (Blueprint $table) {
            $table->unsignedBigInteger('product_categories_id')->nullable();
            $table->foreign('product_categories_id', 'fk_trip_product_categories')->references('id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trip', function (Blueprint $table) {
            $table->dropForeign('fk_trip_product_categories');
            $table->dropColumn('product_categories_id');            
        });
    }
}

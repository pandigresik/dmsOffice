<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceProductStock extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('product_stock', function (Blueprint $table) {
            $table->decimal('price', 8, 2, true);
            $table->integer('transfer', false, true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('product_stock', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('transfer');
        });
    }
}

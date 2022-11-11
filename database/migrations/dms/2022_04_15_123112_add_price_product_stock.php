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
            $table->string('branch_id', 50)->nullable();
            $table->decimal('substractor', 15, 0, false);
            $table->decimal('cogs', 15, 0, true);
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
            $table->dropColumn('branch_id');
            $table->dropColumn('substractor');
            $table->dropColumn('cogs');
        });
    }
}

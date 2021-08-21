<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterStockPicking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_picking', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->string('table_references', 50)->nullable();
            $table->foreign('product_id', 'fk_stock_picking_product')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_picking', function (Blueprint $table) {
            $table->dropColumn('product_id');            
            $table->dropColumn('table_references');
            $table->dropForeign('fk_stock_picking_product');
        });
    }
}

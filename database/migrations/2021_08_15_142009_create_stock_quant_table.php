<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockQuantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('stock_quant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->integer('quantity')->default(0);
            $table->unsignedBigInteger('uom_id');
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_id', 'fk_stock_quant_product')->references('id')->on('product');
            $table->foreign('warehouse_id', 'fk_stock_quant_warehouse')->references('id')->on('warehouse');
            $table->foreign('uom_id', 'fk_stock_quant_uom')->references('id')->on('uom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_quant');
    }
}

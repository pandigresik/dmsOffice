<?php

use Doctrine\DBAL\Schema\ForeignKeyConstraint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockInventoryLineTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('stock_inventory_line', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_inventory_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('uom_id');
            $table->integer('quantity')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('stock_inventory_id', 'fk_stock_inventory_line_inventory')->references('id')->on('stock_inventory');
            $table->foreign('product_id', 'fk_stock_inventory_line_product')->references('id')->on('product');
            $table->foreign('uom_id', 'fk_stock_inventory_line_uom')->references('id')->on('uom');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('stock_inventory_line');
    }
}

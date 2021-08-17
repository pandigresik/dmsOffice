<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockPickingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_picking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('stock_picking_type_id');
            $table->string('name', 70);
            $table->integer('quantity');
            $table->string('state', 15)->nullable();
            $table->string('external_references', 50)->nullable();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->string('note', 100)->nullable();
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('warehouse_id', 'fk_stock_picking_warehouse')->references('id')->on('warehouse');
            $table->foreign('stock_picking_type_id', 'fk_stock_picking_stock_picking_type')->references('id')->on('stock_picking_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_picking');
    }
}

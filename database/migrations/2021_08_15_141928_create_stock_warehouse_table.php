<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('warehouse', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('internal_code', 50)->unique();
            $table->unsignedBigInteger('company_id');
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('company_id', 'fk_warehouse_company')->references('id')->on('company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('warehouse');
    }
}

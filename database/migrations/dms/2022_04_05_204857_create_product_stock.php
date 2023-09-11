<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stock', function (Blueprint $table) {
            $table->id();
            $table->string('product_id', 50);
            $table->integer('first_stock', false, true);
            $table->integer('supplier_in', false, true);
            $table->integer('mutation_in', false, true);
            $table->integer('distribution_in', false, true);
            $table->integer('supplier_out', false, true);
            $table->integer('mutation_out', false, true);
            $table->integer('distribution_out', false, true);
            $table->integer('morphing', false, false);
            $table->integer('last_stock', false, true);
            $table->string('period',7);
            $table->text('additional_info')->nullable();
            $table->timestamps();
            $table->blameable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stock');
    }
}

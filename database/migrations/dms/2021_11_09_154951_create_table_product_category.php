<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('product_categories_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id');
            $table->unsignedBigInteger('product_categories_id');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('product_id', 'fk_product_categories_product_product')->references('iInternalId')->on('dms_inv_product');
            $table->foreign('product_categories_id', 'fk_product_categories_product_product_categories')->references('id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categories_product');
    }
}

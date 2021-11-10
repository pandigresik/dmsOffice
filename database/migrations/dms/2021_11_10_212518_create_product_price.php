<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('product_price', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('dms_inv_product_id');
            $table->decimal('price', 10, 2, true)->default(0);
            $table->date('start_date')->nullable();
            $table->softDeletes();
            $table->blameable();
            $table->timestamps();
            $table->foreign('dms_inv_product_id', 'fk_product_price_product_id')->references('iInternalId')->on('dms_inv_product');
        });

        Schema::create('product_price_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('dms_inv_product_id');
            $table->decimal('price', 10, 2, true)->default(0);
            $table->date('start_date')->nullable();            
            $table->blameable();
            $table->timestamps();
            $table->foreign('dms_inv_product_id', 'fk_product_price_product_log_id')->references('iInternalId')->on('dms_inv_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {                
        Schema::dropIfExists('product_price');
        Schema::dropIfExists('product_price_log');
    }
}

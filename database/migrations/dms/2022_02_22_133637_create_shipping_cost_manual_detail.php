<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingCostManualDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('shipping_cost_manual_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_cost_manual_id');
            $table->string('product_id', 15);
            $table->integer('quantity', false, true);            
            $table->blameable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('shipping_cost_manual_id', 'fk_shipping_cost_manual_detail_1')->references('id')->on('shipping_cost_manual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_cost_manual_detail');
    }
}

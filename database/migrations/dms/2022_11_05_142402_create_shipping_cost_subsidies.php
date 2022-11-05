<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingCostSubsidies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_cost_subsidies', function (Blueprint $table) {
            $table->id();
            $table->string('product_id', 20);
            $table->strint('origin_plant_id', 10);
            $table->unsignedDecimal('amount',15, 2);
            $table->softDeletes();
            $table->blameable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_cost_subsidies');
    }
}

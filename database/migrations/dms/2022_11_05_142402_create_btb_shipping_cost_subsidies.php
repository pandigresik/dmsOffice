<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBtbShippingCostSubsidies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('btb_shipping_cost_subsidies', function (Blueprint $table) {
            $table->id();
            $table->string('doc_id', 20);            
            $table->unsignedDecimal('amount',15, 2);
            $table->boolean('invoiced')->default(0)->nullable();
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
        Schema::dropIfExists('btb_shipping_cost_subsidies');
    }
}

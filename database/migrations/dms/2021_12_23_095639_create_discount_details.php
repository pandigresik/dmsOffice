<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('discounts_id');
            $table->string('main_dms_inv_product_id', 10);
            $table->unsignedInteger('min_main_qty');
            $table->unsignedInteger('max_main_qty');
            $table->string('bundling_dms_inv_product_id', 10)->nullable();
            $table->unsignedInteger('min_bundling_qty')->nullable();
            $table->unsignedInteger('max_bundling_qty')->nullable();
            $table->unsignedInteger('principle_amount');
            $table->unsignedInteger('distributor_amount')->nullable();
            $table->blameable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_details');
    }
}

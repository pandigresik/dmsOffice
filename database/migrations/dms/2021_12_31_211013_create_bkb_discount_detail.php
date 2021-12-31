<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBkbDiscountDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bkb_discount_details', function (Blueprint $table) {
            $table->id();
            $table->string('szDocId', 50);
            $table->string('szProductId', 50);
            $table->string('szBranchId', 50);
            $table->date('bkbDate');
            $table->unsignedBigInteger('discount_id');
            $table->decimal('principle_amount', 15, 2, true);
            $table->decimal('distributor_amount', 15, 2, true);
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
        Schema::dropIfExists('bkb_discount_details');
    }
}

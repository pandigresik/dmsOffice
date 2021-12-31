<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBkbDiscount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {           
        Schema::create('bkb_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('szDocId', 50);
            $table->string('szProductId', 50);
            $table->string('szSalesId', 50);
            $table->string('szBranchId', 50);
            $table->date('bkbDate');
            $table->decimal('decQty', 8, 2, true);
            $table->decimal('discPrinciple', 15, 2, true);
            $table->decimal('discDistributor', 15, 2, true);
            $table->decimal('sistemPrinciple', 15, 2, true);
            $table->decimal('sistemDistributor', 15, 2, true);
            $table->decimal('selisihPrinciple', 15, 2, false);
            $table->decimal('selisihDistributor', 15, 2, false);
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
        Schema::dropIfExists('bkb_discounts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingCostManual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_cost_manual', function (Blueprint $table) {
            $table->id();
            $table->string('number', 20);
            $table->string('origin_branch_id', 50);
            $table->string('destination_branch_id', 50);
            $table->string('carrier_id', 50);
            $table->date('date');
            $table->string('do_references', 20);
            $table->string('sj_references', 20);
            $table->decimal('amount', 15, 2, true);
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
        Schema::dropIfExists('shipping_cost_manual');
    }
}

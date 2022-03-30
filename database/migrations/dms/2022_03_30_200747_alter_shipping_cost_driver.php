<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterShippingCostDriver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipping_cost_manual', function (Blueprint $table) {
            $table->string('co_references', 50)->nullable();
            $table->string('driver', 50)->nullable();
            $table->string('vehicle_number', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipping_cost_manual', function (Blueprint $table) {
            $table->dropColumn('co_references');
            $table->dropColumn('driver');
            $table->dropColumn('vehicle_number');
        });
    }
}

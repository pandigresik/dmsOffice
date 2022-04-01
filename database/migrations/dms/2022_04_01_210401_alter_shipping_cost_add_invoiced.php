<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterShippingCostAddInvoiced extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipping_cost_manual', function (Blueprint $table) {            
            $table->boolean('invoiced_expedition')->nullable()->default(false);
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
            $table->dropColumn('invoiced_expedition');
        });
    }
}

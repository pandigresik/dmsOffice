<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBtbValidateAddJenis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('btb_validate', function (Blueprint $table) {
            $table->dropColumn('qty_retur');
            $table->dropColumn('qty_reject');
            $table->date('btb_date')->nullable();
            $table->string('btb_type', 20);
            $table->string('dms_inv_carrier_id', 20);
            $table->string('vehicle_number', 20);
            $table->string('dms_inv_warehouse_id', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('btb_validate', function (Blueprint $table) {
            $table->integer('qty_retur',false, true);
            $table->integer('qty_reject',false, true);
            $table->dropColumn('btb_date');
            $table->dropColumn('btb_type');
            $table->dropColumn('dms_inv_carrier_id');
            $table->dropColumn('vehicle_number');
            $table->dropColumn('dms_inv_warehouse_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVehicleEkspedisiAddVehicleid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicle_ekspedisi', function (Blueprint $table) {
            $table->unsignedInteger('dms_inv_carrier_id');
            $table->foreign('dms_inv_carrier_id', 'fk_vehicle_ekspedisi_dms_inv_carrier')->references('iInternalId')->on('dms_inv_carrier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicle_ekspedisi', function (Blueprint $table) {            
            $table->dropForeign('dms_inv_carrier_id');
            $table->dropColumn('dms_inv_carrier_id');
        });
    }
}

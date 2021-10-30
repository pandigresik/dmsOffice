<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVehicleEkspedisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('vehicle_ekspedisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('dms_inv_vehicle_id');            
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('dms_inv_vehicle_id', 'fk_vehicle_ekspedisi_dms_inv_vehicle')->references('iInternalId')->on('dms_inv_vehicle');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_ekspedisi');
    }
}

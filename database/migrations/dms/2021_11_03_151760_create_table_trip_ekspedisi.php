<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTripEkspedisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('trip_ekspedisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('dms_inv_carrier_id');  
            $table->unsignedBigInteger('trip_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('dms_inv_carrier_id', 'fk_trip_ekspedisi_dms_inv_carrier')->references('iInternalId')->on('dms_inv_carrier');
            $table->foreign('trip_id', 'fk_trip_ekspedisi_trip')->references('id')->on('trip');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_ekspedisi');
    }
}

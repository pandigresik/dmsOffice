<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorExpeditionTrip extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vendor_expedition_trip', function (Blueprint $table) {            
            $table->unsignedBigInteger('vendor_expedition_id');
            $table->unsignedBigInteger('route_trip_id');
            $table->blameable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('vendor_expedition_trip');
    }
}

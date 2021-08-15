<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicle extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->string('number_registration', 15)->comment('nopol');
            $table->string('number_identity', 30)->comment('stnk');
            $table->unsignedBigInteger('vehicle_group_id');
            $table->unsignedBigInteger('vendor_expedition_id');
            $table->softDeletes();
            $table->blameable();
            $table->timestamps();
            $table->foreign('vehicle_group_id', 'fk_vehicle_vehicle_group')->references('id')->on('vehicle_group');
            $table->foreign('vendor_expedition_id', 'fk_vehicle_vendor_expedition')->references('id')->on('vendor_expedition');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('vehicle');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteTrip extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('route_trip', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('description', 60)->nullable();
            $table->unsignedBigInteger('vehicle_group_id');
            $table->unsignedBigInteger('origin');
            $table->unsignedBigInteger('destination');
            $table->decimal('price', 12, 2, true);
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('origin', 'fk_route_trip_origin')->references('id')->on('city');
            $table->foreign('destination', 'fk_route_trip_destination')->references('id')->on('city');
            $table->foreign('vehicle_group_id', 'fk_route_trip_vehicle_group')->references('id')->on('vehicle_group');
            $table->unique(['vehicle_group_id', 'origin', 'destination']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('route_trip');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_location', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('city',50);
            $table->string('state',50);            
            $table->float('additional_cost', 8, 2, true);
            $table->unsignedBigInteger('route_trip_id');
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('route_trip_id', 'fk_vendor_location_route_trip')->references('id')->on('route_trip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_location');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVendorExpeditionTrip extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('vendor_expedition_trip', function (Blueprint $table) {
            $table->foreign('vendor_expedition_id', 'fk_vendor_expedition_trip_vendor_1')->references('id')->on('vendor_expedition');
            $table->foreign('route_trip_id', 'fk_vendor_expedition_trip_trip_2')->references('id')->on('route_trip');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('vendor_expedition_trip', function (Blueprint $table) {
            $table->dropForeignKey('fk_vendor_expedition_trip_vendor_1', 'vendor_expedition_trip');
            $table->dropForeignKey('fk_vendor_expedition_trip_trip_2', 'vendor_expedition_trip');
        });
    }
}

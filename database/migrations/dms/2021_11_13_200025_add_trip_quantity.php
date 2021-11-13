<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTripQuantity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trip', function (Blueprint $table) {
            $table->dropForeign('fk_route_trip_origin');
            $table->dropForeign('fk_route_trip_destination');
            $table->dropColumn('destination');
            $table->dropColumn('origin');
            $table->dropColumn('origin_place');
            $table->dropColumn('destination_place');            
            $table->unsignedInteger('quantity')->default(0);
            $table->unsignedBigInteger('origin_location_id');
            $table->unsignedBigInteger('destination_location_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trip', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTrip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip', function (Blueprint $table) {
            $table->id();
            $table->string('code', 30)->unique();
            $table->string('name', 60);              
            $table->unsignedBigInteger('origin');
            $table->string('origin_place');
            $table->decimal('origin_additional_price', 12, 2, true);
            $table->unsignedBigInteger('destination');
            $table->string('destination_place');
            $table->decimal('destination_additional_price', 12, 2, true);
            $table->decimal('price', 12, 2, true);
            $table->decimal('distance', 12, 2, true);
            $table->string('description', 60)->nullable();
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('origin', 'fk_route_trip_origin')->references('id')->on('city');
            $table->foreign('destination', 'fk_route_trip_destination')->references('id')->on('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip');
    }
}

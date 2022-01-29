<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripEkspedisiPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_ekspedisi_price', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_ekspedisi_id');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->decimal('price', 12, 2, true);
            $table->decimal('origin_additional_price', 12, 2, true)->nullable()->default(0);
            $table->decimal('destination_additional_price', 12, 2, true)->nullable()->default(0);            
            $table->timestamps();            
            $table->foreign('trip_ekspedisi_id', 'fk_trip_ekspedisi_price_trip')->references('id')->on('trip_ekspedisi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_ekspedisi_price');
    }
}

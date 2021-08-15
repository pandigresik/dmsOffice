<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVehicleGroup extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vehicle_group', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->integer('capacity');
            $table->string('uom', 30)->comment('liter', 'kg', 'm2', 'm3');
            $table->string('description', 100)->nullable();
            $table->softDeletes();
            $table->blameable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_group');
    }
}

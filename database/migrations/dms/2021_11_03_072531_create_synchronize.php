<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSynchronize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('synchronize', function (Blueprint $table) {
            $table->id();
            $table->string('table_name', 60);
            $table->timestamps();
        });

        Schema::create('log_synchronize', function (Blueprint $table) {
            $table->id();
            $table->string('table_name', 60);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('synchronize');
        Schema::dropIfExists('log_synchronize');
    }
}

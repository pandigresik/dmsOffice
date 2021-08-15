<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorExpedition extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vendor_expedition', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('address', 80);
            $table->string('email', 30)->nullable();
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('vendor_expedition');
    }
}

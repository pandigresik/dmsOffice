<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVendorContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_contact', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('position', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('mobile', 50)->nullable();
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->string('city',50);
            $table->string('state',50);
            $table->blameable();
            $table->softDeletes();
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
        Schema::dropIfExists('vendor_contact');
    }
}

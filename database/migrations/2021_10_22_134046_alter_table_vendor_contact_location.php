<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableVendorContactLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendor_contact', function (Blueprint $table) {
            $table->unsignedBigInteger('vendor_id');            
            $table->foreign('vendor_id', 'fk_vendor_contact_vendor')->references('id')->on('vendor');
        });

        Schema::table('vendor_location', function (Blueprint $table) {
            $table->unsignedBigInteger('vendor_id');            
            $table->foreign('vendor_id', 'fk_vendor_location_vendor')->references('id')->on('vendor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

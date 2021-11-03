<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveStateLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('location_ekspedisi', function (Blueprint $table) {
            $table->dropColumn('state');
        });
        Schema::table('location_supplier', function (Blueprint $table) {
            $table->dropColumn('state');
        });
        Schema::table('location_customer', function (Blueprint $table) {
            $table->dropColumn('state');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVendorAddTax extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendor', function (Blueprint $table) {
            $table->string('phone', 30)->nullable();
            $table->string('tax_identification', 25)->nullable();
            $table->string('payment_term', 40);
            $table->string('city', 50)->nullable();
            $table->string('state', 40)->nullable();
            $table->string('group')->nullable();
        });

        Schema::table('vendor_contact', function (Blueprint $table) {
            $table->string('program', 30)->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendor', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('tax_identification');
            $table->dropColumn('payment_term');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('group');
        });

        Schema::table('vendor_contact', function (Blueprint $table) {
            $table->stridropColumnng('program', 30);            
        });
    }
}

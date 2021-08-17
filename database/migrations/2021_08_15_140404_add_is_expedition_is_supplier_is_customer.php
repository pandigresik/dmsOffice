<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsExpeditionIsSupplierIsCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('vendor_expedition','vendor');
        Schema::table('vendor', function (Blueprint $table) {
            $table->boolean('is_supplier')->nullable();
            $table->boolean('is_customer')->nullable();
            $table->boolean('is_expedition')->nullable();
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
            $table->dropColumn('is_supplier');
            $table->dropColumn('is_customer');
            $table->dropColumn('is_expedition');
        });
        Schema::rename('vendor','vendor_expedition');

    }
}

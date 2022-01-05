<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDiscountAddConversion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->string('jenis', 20)->change();
            $table->unsignedSmallInteger('conversion_main_dms_inv_product_id')->nullable()->default(1);
            $table->unsignedSmallInteger('conversion_bundling_dms_inv_product_id')->nullable()->default(1);
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->string('jenis', 20)->change();
            $table->dropColumn('conversion_main_dms_inv_product_id');
            $table->dropColumn('conversion_bundling_dms_inv_product_id');
        });
        
    }
}

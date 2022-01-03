<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDiscountMultiProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->string('main_dms_inv_product_id', 150)->nullable()->change();
            $table->string('bundling_dms_inv_product_id', 150)->nullable()->change();
        });
        Schema::table('discount_details', function (Blueprint $table) {
            $table->string('main_dms_inv_product_id', 150)->nullable()->change();
            $table->string('bundling_dms_inv_product_id', 150)->nullable()->change();
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
            $table->string('main_dms_inv_product_id', 15)->change();
            $table->string('bundling_dms_inv_product_id', 15)->nullable()->change();
        });
        Schema::table('discount_details', function (Blueprint $table) {
            $table->string('main_dms_inv_product_id', 15)->change();
            $table->string('bundling_dms_inv_product_id', 15)->nullable()->change();
        });
    }
}

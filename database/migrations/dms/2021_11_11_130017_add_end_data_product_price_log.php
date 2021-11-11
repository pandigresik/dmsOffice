<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEndDataProductPriceLog extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('product_price_log', function (Blueprint $table) {
            $table->date('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('product_price_log', function (Blueprint $table) {
            $table->dropColumn('end_date');
        });
    }
}

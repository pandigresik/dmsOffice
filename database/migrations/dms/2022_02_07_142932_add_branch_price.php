<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBranchPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_price', function (Blueprint $table) {            
            $table->decimal('branch_price', 10, 2, true)->default(0);
        });
        Schema::table('product_price_log', function (Blueprint $table) {
            $table->decimal('branch_price', 10, 2, true)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_price', function (Blueprint $table) {
            $table->dropColumn('branch_price');
        });
        Schema::table('product_price_log', function (Blueprint $table) {
            $table->dropColumn('branch_price');
        });
    }
}
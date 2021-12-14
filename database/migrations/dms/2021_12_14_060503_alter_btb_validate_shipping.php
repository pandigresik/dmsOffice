<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBtbValidateShipping extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('btb_validate', function (Blueprint $table) {
            $table->decimal('shipping_cost', 15, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('btb_validate', function (Blueprint $table) {
            $table->dropColumn('shipping_cost');
        });
    }
}

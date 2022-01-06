<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBkbDiscountDetailAddqty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bkb_discount_details', function (Blueprint $table) {
            $table->decimal('decQty', 8, 2, true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bkb_discount_details', function (Blueprint $table) {
            $table->dropColumn('decQty');
        });
    }
}

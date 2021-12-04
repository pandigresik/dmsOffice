<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBtbValidateAddInvoicedEkspedisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('btb_validate', function (Blueprint $table) {
            $table->decimal('price', 15, 2);
            $table->boolean('invoiced_expedition')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('btb_validate', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('invoiced_expedition');
        });
    }
}

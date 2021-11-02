<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warehouse', function (Blueprint $table) {
            //$table->dropForeign('fk_warehouse_company');
            //$table->foreign('company_id', 'fk_warehouse_company')->references('id')->on('ifrs_entities');
        });
        Schema::dropIfExists('account_invoice_line');
        Schema::dropIfExists('account_move_line');
        Schema::dropIfExists('account_move');                       
        Schema::dropIfExists('account_invoice');
        Schema::dropIfExists('account_journal');
        Schema::dropIfExists('account_account');
        Schema::dropIfExists('account_type');
        Schema::dropIfExists('company');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class DeleteIfrsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('warehouse', function ($table) {
            $table->dropForeign('fk_warehouse_company');
        });
        Schema::dropIfExists('ifrs_assignments');
        Schema::dropIfExists('ifrs_balances');
        Schema::dropIfExists('ifrs_recycled_objects');
        Schema::dropIfExists('ifrs_ledgers');
        Schema::dropIfExists('ifrs_line_items');
        Schema::dropIfExists('ifrs_transactions');
        Schema::dropIfExists('ifrs_closing_transactions');
        Schema::dropIfExists('ifrs_closing_rates');
        Schema::dropIfExists('ifrs_exchange_rates');
        Schema::dropIfExists('ifrs_reporting_periods');
        Schema::dropIfExists('ifrs_vats');
        Schema::dropIfExists('ifrs_accounts');
        Schema::dropIfExists('ifrs_categories');
        Schema::dropIfExists('ifrs_currencies');
        Schema::dropIfExists('ifrs_entities');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
    }
}

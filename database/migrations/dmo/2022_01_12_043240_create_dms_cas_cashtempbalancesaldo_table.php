<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsCasCashtempbalancesaldoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_cas_cashtempbalancesaldo', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szBranchId', 50)->default('')->index('IX_DMS_Cas_CashTempBalanceSaldo_3');
            $table->string('szAccountId', 50)->index('IX_DMS_Cas_CashTempBalanceSaldo_4');
            $table->string('szSubAccountId', 50)->index('IX_DMS_Cas_CashTempBalanceSaldo_5');
            $table->decimal('decDebit', 18, 4);
            $table->decimal('decCredit', 18, 4);
            $table->decimal('decAmount', 18, 4);
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');            
            $table->unique(['szBranchId', 'szAccountId', 'szSubAccountId'], 'IX_DMS_Cas_CashTempBalanceSaldo_1');
            $table->index(['szBranchId', 'szAccountId', 'szSubAccountId'], 'IX_DMS_Cas_CashTempBalanceSaldo_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_cas_cashtempbalancesaldo');
    }
}

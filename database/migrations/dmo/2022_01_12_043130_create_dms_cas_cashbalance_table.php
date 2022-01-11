<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsCasCashbalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_cas_cashbalance', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szObjectId', 20)->index('IX_DMS_CAS_CashBalance_1');
            $table->string('szDocId', 50)->index('IX_DMS_CAS_CashBalance_2');
            $table->dateTime('dtmDoc')->default('2000-01-01 00:00:00')->index('IX_DMS_CAS_CashBalance_3');
            $table->string('szAccountId', 50);
            $table->string('szSubAccountId', 50);
            $table->decimal('decDebit', 18, 4);
            $table->decimal('decCredit', 18, 4);
            $table->decimal('decAmount', 18, 4);
            $table->unsignedTinyInteger('bVoucher');
            $table->string('szVoucherNo', 50)->index('IX_DMS_CAS_CashBalance_5');
            $table->string('szBranchId', 50)->default('');
            $table->string('szDescription', 2000)->default('');
            $table->integer('intItemNumber')->default(0);
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');            
            $table->index(['szAccountId', 'szSubAccountId'], 'IX_DMS_CAS_CashBalance_4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_cas_cashbalance');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsArDoccustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_ar_doccustomer', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId');
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50)->unique('IX_DMS_AR_DocCustomer');
            $table->dateTime('dtmDoc')->default('2000-01-01 00:00:00');
            $table->string('szCustomerId', 50)->index('IX_DMS_AR_DocCustomer_1');
            $table->string('szName', 50);
            $table->unsignedTinyInteger('bNewCustomer');
            $table->string('szIDCard', 50)->default('');
            $table->unsignedTinyInteger('bHasDifferentCollectAddress');
            $table->integer('intPrintedCount');
            $table->string('szBranchId', 50);
            $table->string('szCompanyId', 50);
            $table->string('szDocStatus', 50);
            $table->string('szHierarchyId', 50)->default('');
            $table->string('szHierarchyFull', 1000)->default('');
            $table->string('szDocFUpId', 50)->default('');
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->primary(['iInternalId', 'iId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_ar_doccustomer');
    }
}

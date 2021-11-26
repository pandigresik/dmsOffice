<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsSdDocdoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_sd_docdo', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50)->index()->unique();
            $table->dateTime('dtmDoc')->default('2000-01-01 00:00:00')->index('IX_DMS_SD_DocDo_16');
            $table->string('szCustomerId', 50)->index('IX_DMS_SD_DocDo_1');
            $table->string('szEmployeeId', 50)->index('IX_DMS_SD_DocDo_2');
            $table->string('szOrderTypeId', 50)->index('IX_DMS_SD_DocDo_3');
            $table->unsignedTinyInteger('bCash');
            $table->unsignedTinyInteger('bInvoiced')->index('IX_DMS_SD_DocDo_7');
            $table->string('szPaymentTermId', 50)->index();
            $table->string('szDocSoId', 50)->index('IX_DMS_SD_DocDo_14');
            $table->string('szCarrier', 50)->default('')->index('IX_DMS_SD_DocDo_9');
            $table->string('szVehicleId', 50)->default('')->index('IX_DMS_SD_DocDo_13');
            $table->string('szHelper1', 50)->default('')->index('IX_DMS_SD_DocDo_10');
            $table->string('szHelper2', 50)->default('')->index('IX_DMS_SD_DocDo_11');
            $table->unsignedTinyInteger('bDirectWarehouse');
            $table->string('szWarehouseId', 50)->default('');
            $table->string('szStockTypeId', 50)->default('');
            $table->string('szCustomerPO', 50)->default('');
            $table->dateTime('dtmCustomerPO')->default('2000-01-01 00:00:00');
            $table->string('szSalesId', 50)->default('')->index('IX_DMS_SD_DocDo_12');
            $table->string('szDocStockOutCustomerId', 50)->default('');
            $table->string('szReturnFromId', 50)->default('');
            $table->string('szVehicle2', 50)->default('');
            $table->string('szDriver2', 50)->default('');
            $table->string('szVehicle3', 50)->default('');
            $table->string('szDriver3', 50)->default('');
            $table->string('szDescription', 500)->default('');
            $table->string('szPromoDesc', 500)->default('');
            $table->integer('intPrintedCount');
            $table->string('szBranchId', 50)->index('IX_DMS_SD_DocDo_4');
            $table->string('szCompanyId', 50)->index('IX_DMS_SD_DocDo_5');
            $table->string('szDocStatus', 50)->index('IX_DMS_SD_DocDo_6');
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->timestamp('dtmMobileTransaction')->useCurrent()->useCurrentOnUpdate();
            $table->string('szMobileId', 50)->default('');
            $table->string('szManualNo', 50)->default('')->index('IX_dms_sd_docdo_6D5EC726-EB8B-4936-A4E1-99786AF95A86');
            $table->unique(['iInternalId', 'iId']);
            $table->index(['szDocId', 'dtmDoc', 'szDocStatus'], 'IX_DMS_SD_DocDo_18');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_sd_docdo');
    }
}

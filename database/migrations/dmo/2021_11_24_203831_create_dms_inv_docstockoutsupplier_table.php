<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvDocstockoutsupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_docstockoutsupplier', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50)->unique('IX_DMS_INV_DocStockOutSupplier');
            $table->dateTime('dtmDoc')->default('2000-01-01 00:00:00')->index('IX_DMS_INV_DocStockOutSupplier_1');
            $table->string('szSupplierId', 50)->index('IX_DMS_INV_DocStockOutSupplier_2');
            $table->string('szWarehouseId', 50)->index('IX_DMS_INV_DocStockOutSupplier_3');
            $table->string('szStockType', 50)->index('IX_DMS_INV_DocStockOutSupplier_4');
            $table->string('szRefDocId', 50)->index('IX_DMS_INV_DocStockOutSupplier_7');
            $table->timestamp('dtmDN')->default('2000-01-02 06:00:00');
            $table->string('szCarrierId', 50)->default('');
            $table->string('szVehicle', 50)->default('');
            $table->string('szDriver', 50)->default('');
            $table->string('szVehicle2', 50)->default('');
            $table->string('szDriver2', 50)->default('');
            $table->string('szRef1', 50)->default('');
            $table->string('szRef2', 50)->default('');
            $table->string('szRef3', 50)->default('');
            $table->integer('intShift');
            $table->integer('intHelperCount');
            $table->integer('intPrintedCount');
            $table->string('szBranchId', 50)->index('IX_DMS_INV_DocStockOutSupplier_5');
            $table->string('szCompanyId', 50);
            $table->string('szDocStatus', 50)->index('IX_DMS_INV_DocStockOutSupplier_6');
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->text('szDescription');
            $table->string('szBtbReferensi', 50)->default('');
            $table->unique(['iInternalId', 'iId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_inv_docstockoutsupplier');
    }
}

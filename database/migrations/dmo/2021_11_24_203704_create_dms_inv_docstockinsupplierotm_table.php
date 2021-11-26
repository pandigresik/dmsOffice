<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvDocstockinsupplierotmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_docstockinsupplierotm', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50)->unique('IX_DMS_INV_DocStockInSupplierOTM');
            $table->dateTime('dtmDoc')->default('2000-01-01 00:00:00')->index('IX_DMS_INV_DocStockInSupplierOTM_1');
            $table->string('szSupplierId', 50)->index('IX_DMS_INV_DocStockInSupplierOTM_3');
            $table->string('szWarehouseId', 50);
            $table->string('szStockType', 50)->index('IX_DMS_INV_DocStockInSupplierOTM_4');
            $table->string('szRefDocId', 50);
            $table->integer('intPrintedCount');
            $table->string('szBranchId', 50)->index('IX_DMS_INV_DocStockInSupplierOTM_2');
            $table->string('szCompanyId', 50);
            $table->string('szDocStatus', 50)->index('IX_DMS_INV_DocStockInSupplierOTM_5');
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
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
        Schema::dropIfExists('dms_inv_docstockinsupplierotm');
    }
}

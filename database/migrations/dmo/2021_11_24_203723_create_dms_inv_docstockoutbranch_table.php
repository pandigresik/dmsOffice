<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvDocstockoutbranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_docstockoutbranch', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50)->unique('IX_DMS_INV_DocStockOutBranch');
            $table->dateTime('dtmDoc')->default('2000-01-01 00:00:00')->index('IX_DMS_INV_DocStockOutBranch1');
            $table->string('szPartyId', 50)->index('IX_DMS_INV_DocStockOutBranch2');
            $table->string('szWarehouseId', 50)->index('IX_DMS_INV_DocStockOutBranch3');
            $table->string('szStockType', 50)->index('IX_DMS_INV_DocStockOutBranch4');
            $table->string('szEmployeeId', 50)->default('')->index('IX_DMS_INV_DocStockOutBranch5');
            $table->string('szVehicleId', 50)->default('')->index('IX_DMS_INV_DocStockOutBranch6');
            $table->integer('intPrintedCount');
            $table->string('szBranchId', 50);
            $table->string('szCompanyId', 50);
            $table->string('szDocStatus', 50);
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->string('szDescription', 500)->default('');
            $table->string('szBtbReferensi', 50)->default('');
            $table->string('szDeliveryStatus', 50)->default('');
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
        Schema::dropIfExists('dms_inv_docstockoutbranch');
    }
}

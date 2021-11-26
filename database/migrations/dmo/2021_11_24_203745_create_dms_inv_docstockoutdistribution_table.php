<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvDocstockoutdistributionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_docstockoutdistribution', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50)->unique('IX_DMS_INV_DocStockOutDistribution');
            $table->dateTime('dtmDoc')->default('2000-01-01 00:00:00')->index('IX_DMS_INV_DocStockOutDistribution_1');
            $table->string('szEmployeeId', 50)->index('IX_DMS_INV_DocStockOutDistribution_2');
            $table->string('szWarehouseId', 50)->index('IX_DMS_INV_DocStockOutDistribution_3');
            $table->string('szStockType', 50)->index('IX_DMS_INV_DocStockOutDistribution_4');
            $table->string('szDocPRId', 50)->index('IX_DMS_INV_DocStockOutDistribution_5');
            $table->integer('intPrintedCount');
            $table->string('szBranchId', 50)->index('IX_DMS_INV_DocStockOutDistribution_6');
            $table->string('szCompanyId', 50);
            $table->string('szDocStatus', 50)->index('IX_DMS_INV_DocStockOutDistribution_7');
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->text('szDescription');
            $table->string('szVehicleId', 50)->default('');
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
        Schema::dropIfExists('dms_inv_docstockoutdistribution');
    }
}

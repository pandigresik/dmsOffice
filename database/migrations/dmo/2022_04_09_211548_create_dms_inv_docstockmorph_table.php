<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvDocstockmorphTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_docstockmorph', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId');
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50)->unique('IX_DocStockMorph');
            $table->dateTime('dtmDoc')->default('2000-01-01 00:00:00')->index('IX_DocStockMorph1');
            $table->string('szWarehouseId', 50)->index('IX_DocStockMorph2');
            $table->string('szStockType', 50)->index('IX_DocStockMorph3');
            $table->integer('intPrintedCount');
            $table->string('szBranchId', 50);
            $table->string('szCompanyId', 50);
            $table->string('szDocStatus', 50);
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->string('szDescription', 500)->default('');
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
        Schema::dropIfExists('dms_inv_docstockmorph');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvStockhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_stockhistory', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId');
            $table->char('iId', 50)->default('ewid(');
            $table->string('szProductId', 50)->index('IX_DMS_INV_StockHistory');
            $table->string('szLocationType', 50)->index('IX_DMS_INV_StockHistory_1');
            $table->string('szLocationId', 50)->index('IX_DMS_INV_StockHistory_2');
            $table->string('szStockTypeId', 50)->index('IX_DMS_INV_StockHistory_3');
            $table->string('szReportedAsId', 50)->index('IX_DMS_INV_StockHistory_4');
            $table->decimal('decQtyOnHand', 18, 0)->index('IX_DMS_INV_StockHistory_7');
            $table->string('szUomId', 50);
            $table->dateTime('dtmTransaction')->default('2000-01-01 00:00:00')->index('IX_DMS_INV_StockHistory_5');
            $table->string('szTrnId', 50)->index('IX_DMS_INV_StockHistory_6');
            $table->string('szDocId', 50);
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->primary(['iInternalId', 'iId']);
            $table->index(['szProductId', 'szLocationType', 'szLocationId', 'szStockTypeId', 'szReportedAsId', 'dtmTransaction', 'szTrnId'], 'IX_DMS_INV_StockHistory_8');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_inv_stockhistory');
    }
}

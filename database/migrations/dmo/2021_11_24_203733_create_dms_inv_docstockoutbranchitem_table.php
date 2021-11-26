<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvDocstockoutbranchitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_docstockoutbranchitem', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50);
            $table->integer('intItemNumber');
            $table->string('szProductId', 50)->index('IX_DMS_INV_DocStockOutBranchItem1');
            $table->decimal('decQty', 18, 2);
            $table->string('szUomId', 50)->index('IX_DMS_INV_DocStockOutBranchItem2');
            $table->string('szBkbReferensi', 50)->default('');
            $table->boolean('bIgnoreStockLotSn')->default(0);
            $table->unique(['iInternalId', 'iId']);
            $table->unique(['szDocId', 'intItemNumber'], 'IX_DMS_INV_DocStockOutBranchItem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_inv_docstockoutbranchitem');
    }
}

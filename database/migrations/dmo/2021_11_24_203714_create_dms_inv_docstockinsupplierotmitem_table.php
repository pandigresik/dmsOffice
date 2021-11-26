<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvDocstockinsupplierotmitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_docstockinsupplierotmitem', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50);
            $table->integer('intItemNumber');
            $table->string('szProductId', 50)->index('IX_DMS_INV_DocStockInSupplierOTMItem1');
            $table->decimal('decQty', 18, 2);
            $table->string('szUomId', 50)->index('IX_DMS_INV_DocStockInSupplierOTMItem2');
            $table->unique(['iInternalId', 'iId']);
            $table->unique(['szDocId', 'intItemNumber'], 'IX_DMS_INV_DocStockInSupplierOTMItem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_inv_docstockinsupplierotmitem');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvDocstockmorphitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_docstockmorphitem', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId');
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50);
            $table->integer('intItemNumber');
            $table->string('szProductId', 50)->index('IX_DMS_INV_DocStockMorphItem_1');
            $table->decimal('decQty', 18, 2);
            $table->string('szUomId', 50)->index('IX_DMS_INV_DocStockMorphItem_2');
            $table->string('szProductIdTo', 50)->index('IX_DMS_INV_DocStockMorphItem_3');
            $table->decimal('decQtyTo', 18, 2);
            $table->string('szUomIdTo', 50)->index('IX_DMS_INV_DocStockMorphItem_4');
            $table->primary(['iInternalId', 'iId']);
            $table->unique(['szDocId', 'intItemNumber'], 'IX_DMS_INV_DocStockMorphItem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_inv_docstockmorphitem');
    }
}

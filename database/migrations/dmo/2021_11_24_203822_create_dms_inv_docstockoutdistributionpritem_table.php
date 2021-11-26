<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvDocstockoutdistributionpritemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_docstockoutdistributionpritem', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(')->unique('PK_DMS_INV_DocStockOutDistributionPRItem');
            $table->string('szDocId', 50);
            $table->string('szDocProductRequestId', 50);
            $table->string('szProductId', 50);
            $table->decimal('decQty', 18, 4);
            $table->string('szUomId', 50);
            $table->unique(['iInternalId', 'iId']);
            $table->index(['szDocId', 'szDocProductRequestId', 'szProductId'], 'IX_DMS_INV_DocStockOutDistributionPRItem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_inv_docstockoutdistributionpritem');
    }
}

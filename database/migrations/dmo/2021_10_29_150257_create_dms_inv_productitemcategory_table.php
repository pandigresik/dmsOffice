<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvProductitemcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_productitemcategory', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szId', 50);
            $table->integer('intItemNumber');
            $table->string('szCategoryTypeId', 50)->index('IX_DMS_INV_ProductItemCategory_1');
            $table->string('szCategoryValue', 50)->index('IX_DMS_INV_ProductItemCategory_2');
            $table->unique(['iInternalId', 'iId']);
            $table->unique(['szId', 'intItemNumber'], 'IX_DMS_INV_ProductItemCategory');
            $table->index(['szCategoryTypeId', 'szCategoryValue'], 'IX_DMS_INV_ProductItemCategory_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_inv_productitemcategory');
    }
}

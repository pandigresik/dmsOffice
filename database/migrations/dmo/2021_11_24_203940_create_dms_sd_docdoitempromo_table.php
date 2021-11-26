<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsSdDocdoitempromoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_sd_docdoitempromo', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50);
            $table->integer('intItemNumber');
            $table->integer('intItemDetailNumber');
            $table->string('szPromoId', 50);
            $table->unsignedTinyInteger('bBonusProduct');
            $table->string('szDiscountType', 50);
            $table->decimal('decDiscount', 18, 4);
            $table->string('szProductBonusId', 50)->index('IX_DMS_SD_DocDoItemPromo_1');
            $table->decimal('decQtyBonus', 18, 4);
            $table->decimal('decDiscountValue', 18, 4);
            $table->decimal('decQtyBonusValue', 18, 4);
            $table->unique(['iInternalId', 'iId']);
            $table->unique(['szDocId', 'intItemNumber', 'intItemDetailNumber'], 'IX_DMS_SD_DocDoItemPromo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_sd_docdoitempromo');
    }
}

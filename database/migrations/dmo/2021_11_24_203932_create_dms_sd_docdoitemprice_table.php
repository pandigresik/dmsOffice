<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsSdDocdoitempriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_sd_docdoitemprice', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50);
            $table->integer('intItemNumber');
            $table->integer('intItemDetailNumber');
            $table->string('szPriceId', 50)->index('IX_DMS_SD_DocDoItemPrice2');
            $table->decimal('decPrice', 18, 4);
            $table->decimal('decDiscount', 18, 4);
            $table->unsignedTinyInteger('bTaxable');
            $table->decimal('decAmount', 18, 4);
            $table->decimal('decTax', 18, 4);
            $table->decimal('decDpp', 18, 4);
            $table->string('szTaxId', 50)->index('IX_DMS_SD_DocDoItemPrice3');
            $table->decimal('decTaxRate', 18, 4);
            $table->decimal('decDiscPrinciple', 18, 4);
            $table->decimal('decDiscDistributor', 18, 4);
            $table->decimal('decDiscInternal', 18, 4)->default(0.0000);
            $table->unique(['iInternalId', 'iId']);
            $table->unique(['szDocId', 'intItemNumber', 'intItemDetailNumber'], 'IX_DMS_SD_DocDoItemPrice1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_sd_docdoitemprice');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsSdDocdoinvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_sd_docdoinvoice', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50);
            $table->integer('intItemNumber');
            $table->string('szDocInvoiceId', 50)->index('IX_DMS_SD_DocDoInvoice_1');
            $table->unique(['iInternalId', 'iId']);
            $table->unique(['szDocId', 'intItemNumber'], 'IX_DMS_SD_DocDoInvoice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_sd_docdoinvoice');
    }
}

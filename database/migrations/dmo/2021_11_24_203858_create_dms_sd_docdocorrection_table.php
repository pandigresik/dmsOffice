<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsSdDocdocorrectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_sd_docdocorrection', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szDocId', 50)->unique('IX_DMS_SD_DocDoCorrection');
            $table->dateTime('dtmDoc')->default('2000-01-01 00:00:00');
            $table->integer('intPrintedCount');
            $table->string('szBranchId', 50)->index('IX_DMS_SD_DocDoCorrection_2');
            $table->string('szCompanyId', 50)->index('IX_DMS_SD_DocDoCorrection_3');
            $table->string('szDocStatus', 50)->index('IX_DMS_SD_DocDoCorrection_1');
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->unique(['iInternalId', 'iId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_sd_docdocorrection');
    }
}

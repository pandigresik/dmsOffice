<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsSdPricecatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_sd_pricecatalog', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId');
            $table->char('iId', 50)->default('ewid(');
            $table->string('szId', 50)->unique('IX_DMS_SD_PriceCatalog');
            $table->string('szName', 50);
            $table->string('szDescription', 200);
            $table->string('szCombinationId', 100)->default('')->index('IX_DMS_SD_PriceCatalog_1');
            $table->string('szCompanyId', 50)->index('IX_DMS_SD_PriceCatalog_2');
            $table->dateTime('dtmValidFrom')->default('2000-01-01 00:00:00')->index('IX_DMS_SD_PriceCatalog_3');
            $table->dateTime('dtmValidTo')->default('2000-01-01 00:00:00')->index('IX_DMS_SD_PriceCatalog_4');
            $table->integer('intPriority')->index('IX_DMS_SD_PriceCatalog_6');
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->primary(['iInternalId', 'iId']);
            $table->index(['dtmValidFrom', 'dtmValidTo', 'szCompanyId', 'intPriority'], 'IX_DMS_SD_PriceCatalog_5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_sd_pricecatalog');
    }
}

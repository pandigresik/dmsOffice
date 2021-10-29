<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsArCustomerrouteinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_ar_customerrouteinfo', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId');
            $table->char('iId', 50)->default('ewid(');
            $table->string('szId', 50);
            $table->integer('intItemNumber');
            $table->string('szRouteType', 20);
            $table->string('szEmployeeId', 50)->index('IX_DMS_AR_CustomerRouteInfo_1');
            $table->unsignedTinyInteger('bMon');
            $table->unsignedTinyInteger('bTue');
            $table->unsignedTinyInteger('bWed');
            $table->unsignedTinyInteger('bThu');
            $table->unsignedTinyInteger('bFri');
            $table->unsignedTinyInteger('bSat');
            $table->unsignedTinyInteger('bSun');
            $table->unsignedTinyInteger('bWeek1');
            $table->unsignedTinyInteger('bWeek2');
            $table->unsignedTinyInteger('bWeek3');
            $table->unsignedTinyInteger('bWeek4');
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->primary(['iInternalId', 'iId']);
            $table->unique(['szId', 'intItemNumber'], 'IX_DMS_AR_CustomerRouteInfo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_ar_customerrouteinfo');
    }
}

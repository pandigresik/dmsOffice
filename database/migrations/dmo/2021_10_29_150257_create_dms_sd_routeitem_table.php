<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsSdRouteitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_sd_routeitem', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szId', 50)->index('IX_DMS_SD_RouteItem_2');
            $table->integer('intItemNumber');
            $table->string('szCustomerId', 50)->index('IX_DMS_SD_RouteItem_1');
            $table->integer('intDay1');
            $table->integer('intDay2');
            $table->integer('intDay3');
            $table->integer('intDay4');
            $table->integer('intDay5');
            $table->integer('intDay6');
            $table->integer('intDay7');
            $table->integer('intWeek1');
            $table->integer('intWeek2');
            $table->integer('intWeek3');
            $table->integer('intWeek4');
            $table->unique(['iInternalId', 'iId']);
            $table->unique(['szId', 'intItemNumber'], 'IX_DMS_SD_RouteItem');
            $table->index(['szId', 'szCustomerId'], 'IX_DMS_SD_RouteItem_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_sd_routeitem');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsSmAddressinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_sm_addressinfo', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId');
            $table->char('iId', 50)->default('ewid(');
            $table->string('szObjectId', 50);
            $table->string('szId', 50);
            $table->string('szAddress', 1000);
            $table->string('szProvince', 50);
            $table->string('szCity', 50);
            $table->string('szDistrict', 50);
            $table->string('szSubDistrict', 50);
            $table->string('szZipCode', 50);
            $table->string('szPhone1', 50);
            $table->string('szPhone2', 50);
            $table->string('szPhone3', 50);
            $table->string('szFaximile', 50);
            $table->string('szContactPerson1', 50);
            $table->string('szContactPerson2', 50);
            $table->string('szEmail', 50);
            $table->string('szLongitude', 20)->default('');
            $table->string('szLatitude', 20)->default('');
            $table->string('szAddress2', 1000)->default('');
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->primary(['iInternalId', 'iId']);
            $table->unique(['szObjectId', 'szId'], 'IX_DMS_SM_AddressInfo');
            $table->index(['szId', 'szObjectId'], 'IX_DMS_SM_AddressInfo_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_sm_addressinfo');
    }
}

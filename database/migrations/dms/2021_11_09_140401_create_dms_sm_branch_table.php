<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsSmBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_sm_branch', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId');
            $table->char('iId', 50)->default('ewid(');
            $table->string('szId', 50)->unique('IX_DMS_SYS_Branch');
            $table->string('szName', 50);
            $table->string('szDescription', 200);
            $table->string('szCompanyId', 20)->index('IX_DMS_SM_Branch');
            $table->string('szLangitude', 50);
            $table->string('szLongitude', 50);
            $table->string('szTaxEntityId', 50)->default('')->index('IX_DMS_SM_Branch_1');
            $table->string('szProvince', 500)->default('');
            $table->string('szCity', 500)->default('');
            $table->string('szDistrict', 1000)->default('');
            $table->string('szSubDistrict', 1000)->default('');
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->primary(['iInternalId', 'iId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_sm_branch');
    }
}

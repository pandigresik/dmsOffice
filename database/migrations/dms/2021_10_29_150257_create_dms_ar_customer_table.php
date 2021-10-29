<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsArCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_ar_customer', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szId', 50)->index()->unique();
            $table->string('szName', 50);
            $table->string('szDescription', 200);
            $table->string('szHierarchyId', 200)->default('')->index('IX_DMS_AR_Customer_1');
            $table->string('szHierarchyFull', 1000)->default('');
            $table->string('szIDCard', 50)->default('');
            $table->unsignedTinyInteger('bHasDifferentCollectAddress');
            $table->string('szCode', 50)->default('')->index('IX_DMS_AR_Customer_999');
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->string('szMCOId', 50)->default('0')->index('IX_DMS_AR_Customer_6C2A0948_FDFF_42C7_B7AF_561703C05155');
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
        Schema::dropIfExists('dms_ar_customer');
    }
}

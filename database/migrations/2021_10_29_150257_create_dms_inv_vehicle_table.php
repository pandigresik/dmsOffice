<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_vehicle', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szId', 50)->unique('IX_DMS_INV_Vehicle');
            $table->string('szName', 50);
            $table->string('szDescription', 200);
            $table->string('szBranchId', 50)->default('')->index('IX_DMS_INV_Vehicle_1');
            $table->string('szPoliceNo', 50)->default('');
            $table->string('szChassisNo', 50)->default('');
            $table->string('szMachineNo', 50)->default('');
            $table->decimal('decWeight', 18, 4);
            $table->decimal('decVolume', 18, 4);
            $table->string('szVehicleTypeId', 50)->default('')->index('IX_DMS_INV_Vehicle_2');
            $table->dateTime('dtmVehicleLicense')->default('2000-01-01 00:00:00');
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
        Schema::dropIfExists('dms_inv_vehicle');
    }
}

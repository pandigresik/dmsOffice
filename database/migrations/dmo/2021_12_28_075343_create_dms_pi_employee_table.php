<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsPiEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_pi_employee', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId');
            $table->char('iId', 50)->default('ewid(');
            $table->string('szId', 50)->index()->unique();
            $table->string('szName', 50);
            $table->string('szDescription', 200);
            $table->string('szDivisionId', 50)->default('')->index('IX_DMS_PI_Employee_1');
            $table->string('szDepartmentId', 50)->default('')->index('IX_DMS_PI_Employee_2');
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->dateTime('dtmCreated')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmLastUpdated')->default('2000-01-01 00:00:00');
            $table->string('szBranchId', 50)->default('')->index('IX_DMS_PI_Employee_3');
            $table->string('szGender', 50)->default('');
            $table->dateTime('dtmBirth')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmJoin')->default('2000-01-01 00:00:00');
            $table->dateTime('dtmStop')->default('2000-01-01 00:00:00');
            $table->string('szIdCard', 50)->default('');
            $table->string('szSupervisorId', 50)->default('')->index('IX_dms_pi_employee_83E44C3F_96DD_4207_8E19_4031992A88D8');
            $table->string('szPassword', 50)->default('');
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
        Schema::dropIfExists('dms_pi_employee');
    }
}

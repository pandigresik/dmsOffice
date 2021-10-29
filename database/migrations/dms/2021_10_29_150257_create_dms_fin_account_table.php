<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsFinAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_fin_account', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szId', 50)->unique('IX_DMS_FIN_Account');
            $table->string('szName', 50);
            $table->string('szDescription', 200);
            $table->unsignedTinyInteger('bCashAccount')->index('IX_DMS_FIN_Account_1');
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
        Schema::dropIfExists('dms_fin_account');
    }
}

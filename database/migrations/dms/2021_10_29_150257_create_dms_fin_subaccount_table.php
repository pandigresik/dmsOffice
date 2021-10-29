<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsFinSubaccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_fin_subaccount', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId');
            $table->char('iId', 50)->default('ewid(');
            $table->string('szId', 50)->unique('IX_DMS_FIN_SubAccount');
            $table->string('szName', 50);
            $table->string('szDescription', 200);
            $table->string('szUserCreatedId', 20);
            $table->string('szUserUpdatedId', 20);
            $table->timestamp('dtmCreated')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('dtmLastUpdated')->default('0000-00-00 00:00:00');
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
        Schema::dropIfExists('dms_fin_subaccount');
    }
}

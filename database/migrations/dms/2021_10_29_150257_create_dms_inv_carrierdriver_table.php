<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvCarrierdriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_carrierdriver', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szId', 50);
            $table->integer('intItemNumber');
            $table->string('szDriverName', 50);
            $table->primary(['iInternalId', 'iId']);
            $table->unique(['szId', 'intItemNumber'], 'IX_DMS_INV_CarrierDriver');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_inv_carrierdriver');
    }
}

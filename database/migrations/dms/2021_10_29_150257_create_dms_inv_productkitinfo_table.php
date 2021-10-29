<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvProductkitinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_productkitinfo', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szId', 50);
            $table->string('szProductId', 50);
            $table->decimal('decQty', 18, 2);
            $table->string('szUomId', 50)->index('IX_DMS_INV_ProductKitInfo_1');
            $table->primary(['iInternalId', 'iId']);
            $table->unique(['szId', 'szProductId'], 'IX_DMS_INV_ProductKitInfo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_inv_productkitinfo');
    }
}

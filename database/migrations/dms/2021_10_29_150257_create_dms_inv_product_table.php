<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInvProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inv_product', function (Blueprint $table) {
            $table->unsignedInteger('iInternalId')->autoIncrement();
            $table->char('iId', 50)->default('ewid(');
            $table->string('szId', 50)->unique('IX_DMS_INV_Product');
            $table->string('szName', 50);
            $table->string('szDescription', 1000);
            $table->string('szTrackingType', 10);
            $table->string('szUomId', 50)->index('IX_DMS_INV_Product_2');
            $table->unsignedTinyInteger('bUseComposite');
            $table->unsignedTinyInteger('bKit');
            $table->string('szQtyFormat', 50)->default('#,0');
            $table->string('szProductType', 50)->default('')->index('IX_DMS_INV_Product_1');
            $table->string('szNickName', 30)->nullable();
            $table->dateTime('dtmStartDate')->default('2000-01-01 00:00:00')->index('IX_dms_inv_product_B270F300-2967-4740-96ED-5B14A93E44FA');
            $table->dateTime('dtmEndDate')->default('5000-01-01 00:00:00')->index('IX_dms_inv_product_B1785FAF-16D2-42BC-A25C-EBD5F56CF31A');
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
        Schema::dropIfExists('dms_inv_product');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDiscount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_discount', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();
            $table->string('name', 50);
            $table->decimal('amount_value', 12, 2, true)->nullable();
            $table->decimal('amount_procent', 4, 2, true)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->blameable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('master_discount_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_discount_id');
            $table->unsignedInteger('dms_inv_product_id');
            $table->timestamps();
            $table->foreign('master_discount_id', 'fk_master_discount_product_master')->references('id')->on('master_discount');
            $table->foreign('dms_inv_product_id', 'fk_master_discount_product_product')->references('iInternalId')->on('dms_inv_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_discount_product');
        Schema::dropIfExists('master_discount');
    }
}

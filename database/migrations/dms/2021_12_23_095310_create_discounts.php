<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['combine', 'promo', 'bundling', 'kontrak']);
            $table->string('name', 100);
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedTinyInteger('split')->default(0);
            $table->string('main_dms_inv_product_id', 15)->nullable();
            $table->unsignedInteger('main_quota')->nullable();
            $table->string('bundling_dms_inv_product_id', 15)->nullable();
            $table->unsignedInteger('bundling_quota')->nullable();
            $table->unsignedInteger('max_quota')->nullable();
            $table->string('state', 2)->default('A');
            $table->blameable();
            $table->timestamps();
            $table->softDeletes();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUomTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('uom', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->unsignedBigInteger('uom_category_id');
            $table->decimal('factor')->default(1);
            $table->string('uom_type')->default('reference');
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('uom_category_id', 'fk_uom_uom_category')->references('id')->on('uom_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('uom');
    }
}

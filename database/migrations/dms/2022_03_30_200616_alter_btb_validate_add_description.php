<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBtbValidateAddDescription extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('btb_validate', function (Blueprint $table) {
            $table->string('description', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('btb_validate', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}

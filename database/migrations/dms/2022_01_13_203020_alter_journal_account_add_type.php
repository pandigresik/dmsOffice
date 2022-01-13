<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterJournalAccountAddType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('journal_account', function (Blueprint $table) {
            $table->string('type', 10)->nullable()->default('JM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('journal_account', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}

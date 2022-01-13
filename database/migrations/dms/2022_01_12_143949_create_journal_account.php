<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_account', function (Blueprint $table) {
            $table->id();
            $table->string('account_id',15);
            $table->date('date');
            $table->string('branch_id', 50)->nullable();
            $table->string('name', 100);
            $table->string('description', 255)->nullable();
            $table->string('reference', 255)->nullable();
            $table->decimal('debit', 15, 2, true);
            $table->decimal('credit', 15, 2, true);
            $table->decimal('balance', 15, 2, false);
            $table->string('state', 15)->nullable()->default('posted');
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
        Schema::dropIfExists('journal_account');
    }
}

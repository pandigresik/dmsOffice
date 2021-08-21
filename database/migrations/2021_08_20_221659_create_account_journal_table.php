<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_journal', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('code', 8);
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('default_debit_account_id')->nullable();
            $table->unsignedBigInteger('default_credit_account_id')->nullable();
            $table->enum('type', ['sale', 'purchase', 'general', 'bank', 'cash']);
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('company_id', 'fk_account_journal_company')->references('id')->on('company');
            $table->foreign('default_debit_account_id', 'fk_account_journal_default_debit_account')->references('id')->on('account_account');
            $table->foreign('default_credit_account_id', 'fk_account_journal_default_credit_account')->references('id')->on('account_account');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_journal');
    }
}

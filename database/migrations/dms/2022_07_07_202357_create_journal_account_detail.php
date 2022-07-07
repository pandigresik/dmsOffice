<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalAccountDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_account_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('journal_account_id');
            $table->string('account_id',15);
            $table->date('date');
            $table->string('branch_id', 50)->nullable();
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journal_account_detail');
    }
}

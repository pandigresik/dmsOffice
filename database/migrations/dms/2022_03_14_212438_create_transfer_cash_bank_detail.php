<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferCashBankDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_cash_bank_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transfer_cash_bank_id');
            $table->string('no_reference', 30);
            $table->string('account', 15);
            $table->string('description', 50);
            $table->integer('amount', false, true);
            $table->string('pic', 25)->nullable();
            $table->timestamps();

            $table->foreign('transfer_cash_bank_id')->references('id')->on('transfer_cash_bank');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_cash_bank_detail');
    }
}

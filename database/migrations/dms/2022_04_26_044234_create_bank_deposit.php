<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankDeposit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_deposit', function (Blueprint $table) {
            $table->id();
            $table->string('account_id', 15);
            $table->date('transaction_date');
            $table->decimal('amount', 15, 2, true);
            $table->string('description', 100)->nullable();
            $table->timestamps();
            $table->blameable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_deposit');
    }
}

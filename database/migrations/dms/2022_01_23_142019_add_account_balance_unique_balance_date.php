<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountBalanceUniqueBalanceDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::dropIfExists('account_balance');
        Schema::create('account_balance', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10);
            $table->decimal('amount', 15, 2)->default(0);
            $table->date('balance_date');
            $table->blameable();
            $table->timestamps();
            $table->softDeletes(); 
            $table->unique(['code','balance_date']);
            $table->foreign('code', 'fk_account_balance_code')->references('code')->on('account');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_balance');
    }
}

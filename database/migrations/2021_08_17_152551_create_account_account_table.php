<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_account', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('code', 20)->unique();    
            $table->unsignedBigInteger('company_id');
            $table->boolean('is_off_balance')->nullable();
            $table->boolean('reconcile')->nullable();
            $table->enum('internal_type', ['receivable', 'payable', 'other', 'liquidity']);
            $table->enum('internal_group', ['asset', 'liability', 'equity', 'income', 'expense', 'off_balance']);
            $table->string('note', 50)->nullable();
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('company_id', 'fk_account_account_company')->references('id')->on('company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_account');
    }
}

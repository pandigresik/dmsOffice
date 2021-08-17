<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_type', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->boolean('include_initial_balance')->nullable();
            $table->enum('type', ['receivable', 'payable', 'other', 'liquidity']);
            $table->enum('internal_group', ['asset', 'liability', 'equity', 'income', 'expense', 'off_balance']);
            $table->string('note', 50)->nullable();
            $table->blameable();
            $table->softDeletes();
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
        Schema::dropIfExists('account_type');
    }
}

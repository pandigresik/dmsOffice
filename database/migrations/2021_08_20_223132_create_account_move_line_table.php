<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountMoveLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_move_line', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('account_move_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('account_journal_id');
            $table->unsignedBigInteger('account_invoice_id')->nullable();            
            $table->decimal('debit', 15, 2);
            $table->decimal('credit', 15, 2);
            $table->decimal('balance', 15, 2, true);
            $table->decimal('quantity', 8, 2)->nullable();                        
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_id', 'fk_account_move_line_product')->references('id')->on('product');
            $table->foreign('account_move_id', 'fk_account_move_line_account_move')->references('id')->on('account_move');
            $table->foreign('company_id', 'fk_account_move_line_company')->references('id')->on('company');
            $table->foreign('account_journal_id', 'fk_account_move_line_account_journal')->references('id')->on('account_journal');
            $table->foreign('account_invoice_id', 'fk_account_move_line_account_invoice')->references('id')->on('account_invoice');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_move_line');
    }
}

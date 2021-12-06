<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitCreditNote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit_credit_note', function (Blueprint $table) {
            $table->id();
            $table->string('number', 30);
            $table->enum('type', ['CN', 'DN']);
            $table->enum('partner_type',['supplier', 'ekspedisi', 'customer', 'other']);
            $table->string('partner_id', 30);
            $table->date('issue_date');
            $table->string('reference', 30)->nullable();
            $table->unsignedBigInteger('invoice_id');
            $table->text('description')->nullable();
            $table->blameable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('invoice_id', 'fk_debit_credit_note_invoice')->references('id')->on('invoice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debit_credit_note');
    }
}

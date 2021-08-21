<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_invoice', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('number', 50);
            $table->decimal('amount_total', 15, 2);
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('account_journal_id');            
            $table->enum('type', ['out', 'in']);
            $table->string('references', 50)->nullable();
            $table->text('comment')->nullable();
            $table->enum('state', ['draft','cancel', 'validate', 'open', 'close'])->default('draft');
            $table->date('date_invoice');
            $table->date('date_due');            
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('company_id', 'fk_account_invoice_company')->references('id')->on('company');
            $table->foreign('vendor_id', 'fk_account_invoice_vendor')->references('id')->on('vendor');
            $table->foreign('account_journal_id', 'fk_account_invoice_account_journal')->references('id')->on('account_journal');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_invoice');
    }
}

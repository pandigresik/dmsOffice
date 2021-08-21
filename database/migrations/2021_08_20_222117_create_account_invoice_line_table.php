<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountInvoiceLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_invoice_line', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->integer('sequence');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('account_invoice_id');
            $table->unsignedBigInteger('account_account_id');
            $table->unsignedBigInteger('account_journal_id');
            $table->decimal('quantity');
            $table->decimal('price_unit', 12, 2);
            $table->decimal('price_total', 15, 2);
            $table->decimal('discount');
            $table->decimal('amount_total', 15, 2);
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_id','fk_account_invoice_line_product')->references('id')->on('product');
            $table->foreign('company_id','fk_account_invoice_line_company')->references('id')->on('company');
            $table->foreign('vendor_id','fk_account_invoice_line_vendor')->references('id')->on('vendor');
            $table->foreign('account_invoice_id','fk_account_invoice_line_account_invoice')->references('id')->on('account_invoice');
            $table->foreign('account_account_id','fk_account_invoice_line_account_account')->references('id')->on('account_account');
            $table->foreign('account_journal_id','fk_account_invoice_line_account_journal')->references('id')->on('account_journal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_invoice_line');
    }
}

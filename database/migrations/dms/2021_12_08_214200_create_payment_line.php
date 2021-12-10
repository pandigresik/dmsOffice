<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentLine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_line', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedDecimal('amount', 15, 2);
            $table->decimal('amount_cn_dn', 15, 2)->default(0);            
            $table->unsignedDecimal('amount_total', 15, 2);
            $table->blameable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('invoice_id', 'fk_payment_line_invoice')->references('id')->on('invoice');
            $table->foreign('payment_id', 'fk_payment_line_payment')->references('id')->on('payment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_line');
    }
}

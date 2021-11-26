<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->string('number', 30);
            $table->enum('type', ['in', 'out']);
            $table->string('reference')->description('external document');
            $table->unsignedInteger('qty')->default(0);
            $table->unsignedDecimal('amount', 15, 2);
            $table->unsignedDecimal('amount_discount', 15, 2);
            $table->string('state', 10);
            $table->date('date_invoice');
            $table->date('date_due');
            $table->string('partner_id', 20);
            $table->blameable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->string('number', 30);
            $table->enum('type', ['IN', 'OUT']);
            $table->string('reference')->nullable()->description('external document');
            $table->string('state', 10)->default('submit');
            $table->date('estimate_date');
            $table->date('pay_date')->nullable();
            $table->unsignedDecimal('amount', 15, 2);            
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
        Schema::dropIfExists('payment');
    }
}

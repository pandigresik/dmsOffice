<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceLine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_line', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->string('doc_id', 50);            
            $table->string('reference_id', 50);
            $table->string('product_id', 50);
            $table->string('product_name', 70);
            $table->string('uom_id', 50);            
            $table->integer('qty',false, true);
            $table->decimal('price', 15, 2);
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
        Schema::dropIfExists('invoice_line');
    }
}

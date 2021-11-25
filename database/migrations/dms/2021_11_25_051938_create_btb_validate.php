<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBtbValidate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('btb_validate', function (Blueprint $table) {
            $table->id();
            $table->string('doc_id', 50);
            $table->string('co_reference', 50);
            $table->string('reference_id', 50);
            $table->string('product_id', 50);
            $table->string('product_name', 70);
            $table->string('uom_id', 50);
            $table->string('ref_doc', 50)->description('Surat jalan');
            $table->integer('qty',false, true);
            $table->integer('qty_retur',false, true);
            $table->integer('qty_reject',false, true);
            $table->boolean('invoiced')->default(false);
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
        Schema::dropIfExists('btb_validate');
    }
}

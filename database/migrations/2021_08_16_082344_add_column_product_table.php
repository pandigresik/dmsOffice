<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->unsignedBigInteger('uom_id');
            $table->boolean('saleable')->nullable();
            $table->boolean('storeable')->nullable();
            $table->boolean('consumeable')->nullable();
            $table->foreign('uom_id', 'fk_product_uom')->references('id')->on('uom');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table){            
            $table->dropForeignKey('fk_product_uom');
            $table->dropColumn('uom_id');
            $table->dropColumn('saleable');
            $table->dropColumn('storeable');
            $table->dropColumn('consumeable');
        });
        
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBkbdiscountInternal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bkb_discounts', function (Blueprint $table) {            
            $table->decimal('discInternal', 15, 2, true);
            $table->decimal('sistemInternal', 15, 2, true);            
            $table->decimal('selisihInternal', 15, 2, false);                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bkb_discounts', function (Blueprint $table) {            
            $table->dropColumn('discInternal');
            $table->dropColumn('sistemInternal');
            $table->dropColumn('selisihInternal');
        });
    }
}

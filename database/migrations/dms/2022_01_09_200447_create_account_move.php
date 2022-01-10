<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountMove extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_move', function (Blueprint $table) {
            $table->id();
            $table->string('number', 20);
            $table->date('date');
            $table->string('reference', 80);
            $table->text('narration')->nullable();
            $table->string('state', 15)->nullable()->default('posted');
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
        Schema::dropIfExists('account_move');
    }
}

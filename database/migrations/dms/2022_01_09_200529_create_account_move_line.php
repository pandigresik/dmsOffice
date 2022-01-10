<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountMoveLine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_move_line', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_move_id');
            $table->string('name', 100);
            $table->string('description', 256)->nullable();
            $table->string('account_id');
            $table->decimal('debit', 15, 2, true);
            $table->decimal('credit', 15, 2, true);
            $table->decimal('balance', 15, 2, false);
            $table->blameable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('account_move_id', 'fk_account_move_line_account_move')->references('id')->on('account_move');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_move_line');
    }
}

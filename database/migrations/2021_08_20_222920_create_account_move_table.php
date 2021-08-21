<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountMoveTable extends Migration
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
            $table->string('name', 100)->nullable();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('account_journal_id');
            $table->string('ref', 50)->nullable();
            $table->date('date');
            $table->string('state', 10);
            $table->decimal('amount', 15, 2);
            $table->enum('move_type', ['move_in', 'move_out']);
            $table->text('narration')->nullable();
            $table->unsignedBigInteger('stock_picking_id')->nullable();
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('company_id', 'fk_account_move_company')->references('id')->on('company');
            $table->foreign('account_journal_id', 'fk_account_move_account_journal')->references('id')->on('account_journal');
            $table->foreign('stock_picking_id', 'fk_account_move_stock_picking')->references('id')->on('stock_picking');
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

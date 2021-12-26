<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('discounts_id');
            $table->string('member_id',20);
            $table->enum('tipe', ['customer', 'customer_segment'])->default('customer_segment');
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
        Schema::dropIfExists('discount_members');
    }
}

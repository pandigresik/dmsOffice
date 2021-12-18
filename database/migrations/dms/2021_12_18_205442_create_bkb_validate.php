<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBkbValidate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bkb_validate', function (Blueprint $table) {
            $table->id();
            $table->string('doc_id', 50);
            $table->string('dms_ar_customer_id', 50);
            $table->string('dms_pi_employee_id', 50);
            $table->unsignedDecimal('disc_principle_sales', 15, 2);
            $table->unsignedDecimal('disc_distributor_sales', 15, 2);
            $table->unsignedDecimal('disc_principle_dms', 15, 2);
            $table->unsignedDecimal('disc_distributor_dms', 15, 2);
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
        Schema::dropIfExists('bkb_validate');
    }
}

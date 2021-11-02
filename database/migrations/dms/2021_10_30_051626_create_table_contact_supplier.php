<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableContactSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('contact_ekspedisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('dms_inv_carrier_id');
            $table->string('name', 50);
            $table->string('position', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('mobile', 50)->nullable();
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->string('city',50);            
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('dms_inv_carrier_id', 'fk_contact_ekspedisi_dms_inv_carrier')->references('iInternalId')->on('dms_inv_carrier');
        });

        Schema::create('contact_supplier', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('dms_ap_supplier_id');
            $table->string('name', 50);
            $table->string('position', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('mobile', 50)->nullable();
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->string('city',50);            
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('dms_ap_supplier_id', 'fk_contact_supplier_dms_ap_supplier')->references('iInternalId')->on('dms_ap_supplier');
        });

        Schema::create('contact_customer', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('dms_ar_customer_id');
            $table->string('name', 50);
            $table->string('position', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('mobile', 50)->nullable();
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->string('city',50);            
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('dms_ar_customer_id', 'fk_contact_customer_dms_ar_customer')->references('iInternalId')->on('dms_ar_customer');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_ekspedisi');
        Schema::dropIfExists('contact_customer');
        Schema::dropIfExists('contact_supplier');
    }
}

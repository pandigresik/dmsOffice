<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLocationSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('location_ekspedisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('dms_inv_carrier_id');
            $table->string('address')->nullable();
            $table->string('city',50);
            $table->string('state',50);            
            $table->float('additional_cost', 8, 2, true);
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('dms_inv_carrier_id', 'fk_location_ekspedisi_dms_inv_carrier')->references('iInternalId')->on('dms_inv_carrier');
        });

        Schema::create('location_supplier', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('dms_ap_supplier_id');
            $table->string('address')->nullable();
            $table->string('city',50);
            $table->string('state',50);            
            $table->float('additional_cost', 8, 2, true);  
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('dms_ap_supplier_id', 'fk_location_supplier_dms_ap_supplier')->references('iInternalId')->on('dms_ap_supplier');
        });

        Schema::create('location_customer', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('dms_ar_customer_id');
            $table->string('address')->nullable();
            $table->string('city',50);
            $table->string('state',50);            
            $table->float('additional_cost', 8, 2, true);
            $table->blameable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('dms_ar_customer_id', 'fk_location_customer_dms_ar_customer')->references('iInternalId')->on('dms_ar_customer');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_ekspedisi');
        Schema::dropIfExists('location_customer');
        Schema::dropIfExists('location_supplier');
    }
}

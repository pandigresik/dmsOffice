<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewShippingcost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->dropView());
        DB::statement($this->createView());        
    }
    
    private function dropView(): string
    {
    return <<<SQL
        DROP VIEW IF EXISTS shippingCost;
    SQL;
    }

    private function createView(): string
    {
    return <<<SQL
        create view shippingCost as
        select t.code, (t.price + t.destination_additional_price) as cost, dip.szId as product_id
            ,pc.name as jenis, l.name as asal, ld.name as tujuan 
            ,l.reference_id as origin_id, ld.reference_id as destination_id
        from trip t
        join product_categories pc on t.product_categories_id = pc.id
        join product_categories_product pcp on pcp.product_categories_id = pc.id
        join dms_inv_product dip on dip.iInternalId = pcp.product_id
        join location l on l.id = t.origin_location_id and l.type = 'origin'
        join location ld on l.id = t.origin_location_id and ld.type = 'destination'
    SQL;
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
    }
}

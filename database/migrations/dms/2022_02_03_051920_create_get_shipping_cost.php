<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGetShippingCost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::raw($this->dropFunction());
        DB::raw($this->createFunction());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::raw($this->dropFunction());
    }

    private function createFunction(){
        return <<<SQL
            DELIMITER $$            
            CREATE FUNCTION getShippingCost(btbDate date, ekspedisiId varchar(15) , supplierId varchar(15), warehouseId varchar(15), productId varchar(15)) RETURNS decimal(15,2)
                DETERMINISTIC
            BEGIN
                declare shippingCost decimal(15,2);
                select ( tep.price + tep.origin_additional_price + tep.destination_additional_price ) into shippingCost from trip t
                        join trip_ekspedisi te on t.id  = te.trip_id and te.dms_inv_carrier_id = (select iInternalId from dms_inv_carrier where szId = ekspedisiId  COLLATE utf8mb4_unicode_ci)
                        join trip_ekspedisi_price tep on tep.trip_ekspedisi_id = te.id and tep.start_date <= btbDate and ( tep.end_date is null or tep.end_date >= btbDate)
                        where t.origin_location_id = (select id from location where `type` = 'origin' and reference_type = 'supplier' and reference_id = supplierId  COLLATE utf8mb4_unicode_ci)  
                        and t.destination_location_id  = (select id from location where `type` = 'destination' and reference_type = 'warehouse' and reference_id = warehouseId  COLLATE utf8mb4_unicode_ci)
                        and t.product_categories_id = (select pcp.product_categories_id from product_categories_product pcp join dms_inv_product dip ON dip.iInternalId = pcp.product_id and pcp.status = 1 where dip.szId = productId  COLLATE utf8mb4_unicode_ci limit 1)
                        order by tep.id desc limit 1;	
                return shippingCost;
            END
            $$
            DELIMITER ;
        SQL;
    }

    private function dropFunction(){
        return <<<SQL
            DROP FUNCTION IF EXISTS getShippingCost;            
        SQL;
    }
}

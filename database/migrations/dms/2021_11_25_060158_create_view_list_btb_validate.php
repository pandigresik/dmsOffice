<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewListBtbValidate extends Migration
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
        DROP VIEW IF EXISTS `list_btb_validate`;
    SQL;
    }

    private function createView(): string
    {
    return <<<SQL
        CREATE VIEW `list_btb_validate` AS
            select dsd.szDocId as no_btb, dsd.szRefDocId as sj_pabrik, dsd.szRef1 as co_reference, dsd.szRef2 as sj_ekspedisi,dsd.szBranchId
                , dsb.szName, dsd.szDocStatus, divi.szName as product_name, dsdi.decQty
                , dsdi.szProductId as product_id, dsdi.szUomId as uom_id, dsdi.iId as reference_id 
            from dms_inv_docstockinsupplier dsd
            join dms_inv_docstockinsupplieritem dsdi on dsdi.szDocId = dsd.szDocId
            join dms_inv_product divi on divi.szId = dsdi.szProductId
            join dms_sm_branch dsb on dsb.szId = dsd.szBranchId
            left join btb_validate bv on bv.doc_id = dsd.szDocId and bv.product_id = dsdi.szProductId and bv.deleted_at is null
            where dsd.szDocStatus  = 'Applied' and bv.product_id is NULL
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

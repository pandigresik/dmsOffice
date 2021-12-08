<?php

namespace App\Models\Purchase;

use Illuminate\Support\Facades\DB;
use App\Models\BaseEntity as Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="BtbValidate",
 *      required={"doc_id", "product_id", "uom_id", "ref_doc", "qty", "qty_retur", "qty_reject", "invoiced"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="doc_id",
 *          description="doc_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="product_id",
 *          description="product_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="uom_id",
 *          description="uom_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ref_doc",
 *          description="ref_doc",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="qty",
 *          description="qty",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="qty_retur",
 *          description="qty_retur",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="qty_reject",
 *          description="qty_reject",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="invoiced",
 *          description="invoiced",
 *          type="boolean"
 *      )
 * )
 */
class BtbValidate extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'btb_validate';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];    

    public $fillable = [
        'doc_id',
        'co_reference',
        'reference_id',
        'product_id',
        'product_name',
        'uom_id',
        'ref_doc',
        'qty',        
        'btb_date',
        'invoiced',
        'invoiced_expedition',
        'price'        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'doc_id' => 'string',
        'product_id' => 'string',
        'uom_id' => 'string',
        'ref_doc' => 'string',
        'qty' => 'integer',        
        'invoiced' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'btb' => 'required|array',        
    ];

    public function getQtyAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    public function getPriceAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    public function getQtyRejectAttribute($value)
    {
        return localNumberFormat($value, 0);
    }    

    public function getBtbDateAttribute($value)
    {

        return localFormatDate($value);
    }
    
    public function mustValidate($startDate, $endDate){
        $sql = implode(' union all ', [
            $this->btbSupplierSql($startDate, $endDate),
            $this->btbDistribusiSql($startDate, $endDate),
        ]);
        return $this->fromQuery($sql);
    }

    public function scopeCanInvoiced($query){

        return $query->whereInvoiced(0);
    }

    public function scopeCanInvoicedExpedition($query){

        return $query->whereInvoicedExpedition(0);
    }

    public function scopeCanInvoicedSupplier($query, $supplierId, $listDoc = []){
        if(empty($listDoc)){
            return $query->canInvoiced()->wherePartnerId($supplierId);
        }
        return $query->canInvoiced()->wherePartnerId($supplierId)->whereNotIn('doc_id',$listDoc);
    }

    public function scopeCanInvoicedEkspedisi($query, $supplierId, $listDoc = []){
        if(empty($listDoc)){
            return $query->canInvoicedExpedition()->wherePartnerId($supplierId);
        }
        return $query->canInvoicedExpedition()->wherePartnerId($supplierId)->whereNotIn('doc_id',$listDoc);
    }

    private function btbSupplierSql($startDate, $endDate){
        return <<<SQL
        select
            'BTB Supplier' as jenis,
            dsd.szDocId AS no_btb,
            dsd.dtmCreated as tgl_btb,
            dsd.szRefDocId AS sj_pabrik,
            dsd.szRef1 AS co_reference,
            dsd.szRef2 AS sj_ekspedisi,
            dsd.dtmDoc as tgl_sj,
            dsd.szVehicle2 as nopol,
            dsd.szStockType as tipe_stok,
            dsd.szWarehouseId as id_gudang,
            wh.szName as nama_gudang,
            eks.szName as nama_ekspedisi,        
            dsd.szDocStatus AS szDocStatus
        from
            dms_inv_docstockinsupplier dsd
        join dms_inv_warehouse wh on wh.szId = dsd.szWarehouseId 
        join dms_inv_carrier eks on eks.szId  = dsd.szCarrierId 
        left join btb_validate bv on bv.doc_id = dsd.szDocId and bv.deleted_at is null 
        where dsd.szDocStatus = 'Applied' and bv.reference_id is null 
        and dsd.dtmCreated between '${startDate}' and '${endDate}'
        SQL;
    }

    private function btbDistribusiSql($startDate, $endDate){
        return <<<SQL
        select
            'BTB Distribusi' as jenis,
            dsd.szDocId AS no_btb,
            dsd.dtmCreated as tgl_btb,
            dsd.szBkbReferensi AS sj_pabrik,
            dsd.szDoReferensi AS co_reference,
            '-' AS sj_ekspedisi,
            dsd.dtmDoc as tgl_sj,
            eks.szPoliceNo as nopol,
            dsd.szStockType as tipe_stok,
            dsd.szWarehouseId as id_gudang,
            wh.szName as nama_gudang,
            'Internal' as nama_ekspedisi,        
            dsd.szDocStatus AS szDocStatus
        from
            dms_inv_docstockindistribution dsd
        join dms_inv_warehouse wh on wh.szId = dsd.szWarehouseId 
        join dms_inv_vehicle eks on eks.szId  = dsd.szVehicleId 
        left join btb_validate bv on bv.doc_id = dsd.szDocId and bv.deleted_at is null
        where dsd.szDocStatus = 'Applied' and bv.reference_id is null        
        and dsd.dtmCreated between '${startDate}' and '${endDate}'
        SQL;
    }

    public function insertBtbSupplier($btbs){
        $userId = Auth::id();
        $now = (\Carbon\Carbon::now())->format('Y-m-d H:i:s');        
        $btbStr = implode("','", $btbs->flatten()->all());
        $sql = <<<SQL
        insert into btb_validate (btb_type, doc_id, btb_date, reference_id ,  co_reference, product_id, product_name, uom_id,ref_doc, qty, dms_inv_carrier_id, dms_inv_warehouse_id, vehicle_number ,created_by, created_at, partner_id, price )
        select
            'BTB Supplier' as jenis,
            dsd.szDocId AS no_btb,
            dsd.dtmCreated as tgl_btb,
            dsdi.iId as reference_id,
            -- dsd.szRefDocId AS sj_pabrik,
            dsd.szRef1 AS co_reference,            
            dsdi.szProductId,
            divi.szName,
            dsdi.szUomId, 
            dsd.szRef2 AS sj_ekspedisi,
            dsdi.decQty,
            dsd.szCarrierId,
            dsd.szWarehouseId,
            dsd.szVehicle2 as nopol,
            ${userId} as created_by ,
            '${now}' as created_at,
            dsd.szSupplierId,
            coalesce(pp.price, 0) as price
            
        from
            dms_inv_docstockinsupplier dsd
        join dms_inv_docstockinsupplieritem dsdi on dsdi.szDocId = dsd.szDocId
        join dms_inv_product divi on divi.szId = dsdi.szProductId
        left join product_price pp on pp.dms_inv_product_id = divi.iInternalId
        where dsd.szDocStatus = 'Applied' and dsd.szDocId in ('${btbStr}') 
        SQL;
        // DB::statement($sql);
        $this->fromQuery($sql);
}

    public function insertBtbDistribusi($btbs){
        $userId = Auth::id();
        $now = (\Carbon\Carbon::now())->format('Y-m-d H:i:s');
        $btbStr = implode("','", $btbs->flatten()->all());
        $sql = <<<SQL
        insert into btb_validate (btb_type, doc_id, btb_date, reference_id ,  co_reference, product_id, product_name, uom_id,ref_doc, qty, dms_inv_carrier_id, dms_inv_warehouse_id, vehicle_number ,created_by, created_at, partner_id, price )
        select
            'BTB Distribusi' as jenis,
            dsd.szDocId AS no_btb,
            dsd.dtmCreated as tgl_btb,
            dsdi.iId as reference_id,
            -- dsd.szBkbReferensi AS sj_pabrik,
            dsd.szDoReferensi AS co_reference,
            dsdi.szProductId,
            divi.szName,
            dsdi.szUomId, 
            '-' AS sj_ekspedisi,
            dsdi.decQty,
            'Internal',
            dsd.szWarehouseId,
            eks.szPoliceNo as nopol,
            ${userId} as created_by ,
            '${now}' as created_at,
            'Internal' as partner_id,
            coalesce(pp.price, 0) as price
            
        from
            dms_inv_docstockindistribution dsd
        join dms_inv_docstockindistributionitem dsdi on dsdi.szDocId = dsd.szDocId
        join dms_inv_product divi on divi.szId = dsdi.szProductId
        join dms_inv_vehicle eks on eks.szId  = dsd.szVehicleId
        left join product_price pp on pp.dms_inv_product_id = divi.iInternalId
        where dsd.szDocStatus = 'Applied' and dsd.szDocId in ('${btbStr}') 
        SQL;
        //DB::statement($sql);
        $this->fromQuery($sql);
    }
}

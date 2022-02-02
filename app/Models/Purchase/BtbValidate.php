<?php

namespace App\Models\Purchase;

use App\Models\BaseEntity as Model;
use App\Models\Inventory\DmsInvCarrier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


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

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const INVOICE_TYPE_COLUMN = [
        'supplier' => 'invoiced',
        'ekspedisi' => 'invoiced_expedition',
    ];
    public $table = 'btb_validate';

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
        'dms_inv_carrier_id',
        'price',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'btb' => 'required|array',
    ];

    protected $dates = ['deleted_at'];

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
        'invoiced' => 'boolean',
    ];

    public function getQtyAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    public function getPriceAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    public function getShippingCostAttribute($value)
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

    public function mustValidate($startDate, $endDate, $branchId)
    {
        $sql = implode(' union all ', [
            $this->btbSupplierSql($startDate, $endDate, $branchId),
           // $this->btbDistribusiSql($startDate, $endDate, $branchId),
        ]);

        return $this->fromQuery($sql);
    }

    public function scopeCanInvoiced($query)
    {
        return $query->whereInvoiced(0);
    }

    public function scopeCanInvoicedExpedition($query)
    {
        return $query->whereInvoicedExpedition(0);
    }    

    public function scopeCanInvoicedSupplier($query, $listDoc = [])
    {
        if (empty($listDoc)) {
            return $query->canInvoiced();
        }

        return $query->canInvoiced()->whereNotIn('doc_id', $listDoc);
    }

    public function scopeCanInvoicedEkspedisi($query, $supplierId, $listDoc = [])
    {
        if (empty($listDoc)) {
            return $query->canInvoicedExpedition()->whereDmsInvCarrierId($supplierId);
        }

        return $query->canInvoicedExpedition()->whereDmsInvCarrierId($supplierId)->whereNotIn('doc_id', $listDoc);
    }

    /**
     * Get the ekspedisi that owns the BtbValidate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ekspedisi(): BelongsTo
    {
        return $this->belongsTo(DmsInvCarrier::class, 'dms_inv_carrier_id', 'szId');
    }


    public function updateEkspedisi($id, $input){                
        $listBtb = $this->where(['doc_id' => $input['doc_id']])->get();        
        $ongkir = $this->getOngkir($listBtb[0], $input);
        foreach($listBtb as $model){
            $model->shipping_cost = $ongkir;
            $model->dms_inv_carrier_id = $input['dms_inv_carrier_id'];
            $model->save();
        }
        
        return $model;
    }

    private function getOngkir($btb, $input){
        $btbDate = $btb->getRawOriginal('btb_date');
        $supplier = $btb->partner_id;
        $ekspedisi = $input['dms_inv_carrier_id'];
        $warehouse = $btb->dms_inv_warehouse_id;
        $product = $btb->product_id;
        $sql = <<<SQL
            select ( tep.price + tep.origin_additional_price + tep.destination_additional_price ) as shippingCost from trip t
            join trip_ekspedisi te on t.id  = te.trip_id and te.dms_inv_carrier_id = (select iInternalId from dms_inv_carrier where szId = '{$ekspedisi}')
            join trip_ekspedisi_price tep on tep.trip_ekspedisi_id = te.id and tep.start_date <= '{$btbDate}' and ( tep.end_date is null or tep.end_date >= '{$btbDate}')
            where t.origin_location_id = (select id from location where `type` = 'origin' and reference_type = 'supplier' and reference_id = '{$supplier}')  
            and t.destination_location_id  = (select id from location where `type` = 'destination' and reference_type = 'warehouse' and reference_id = '{$warehouse}')
            and t.product_categories_id = (select pcp.product_categories_id from product_categories_product pcp join dms_inv_product dip ON dip.iInternalId = pcp.product_id and pcp.status = 1 where dip.szId = '{$product}' limit 1)
            order by tep.id desc limit 1
        SQL;

        $result = $this->fromQuery($sql)->first();

        return $result->shippingCost ?? 0;        
    }

    public function insertBtbSupplier($btbs)
    {
        $userId = Auth::id();
        $now = (\Carbon\Carbon::now())->format('Y-m-d H:i:s');
        $btbStr = implode("','", $btbs->flatten()->all());
        $sql = <<<SQL
        insert into btb_validate (branch_id,btb_type, doc_id, btb_date, reference_id ,  co_reference, product_id, product_name, uom_id,ref_doc, qty, dms_inv_carrier_id, dms_inv_warehouse_id, vehicle_number ,created_by, created_at, partner_id, price, shipping_cost )
        select z.* from(
        select
            dsd.szBranchId,
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
            {$userId} as created_by ,
            '{$now}' as created_at,
            dsd.szSupplierId,
            coalesce((select ppl.price from product_price_log ppl where ppl.product_id = dsdi.szProductId and ppl.start_date <= dsd.dtmDoc and (ppl.end_date is null or ppl.end_date >= dsd.dtmDoc) order by id desc limit 1),0) as price,
            coalesce((select cost from shippingCost where product_id = dsdi.szProductId and destination_id = dsd.szWarehouseId and origin_id = dsd.szSupplierId limit 1),0) as shipping_cost
        from
            dms_inv_docstockinsupplier dsd
        join dms_inv_docstockinsupplieritem dsdi on dsdi.szDocId = dsd.szDocId
        join dms_inv_product divi on divi.szId = dsdi.szProductId
        -- left join product_price pp on pp.dms_inv_product_id = divi.iInternalId
        where dsd.szDocStatus = 'Applied' and dsd.szDocId in ('{$btbStr}') 
        )z where z.price > 0
        SQL;
        // DB::statement($sql);
        $this->fromQuery($sql);
    }

    public function insertBtbDistribusi($btbs)
    {
        $userId = Auth::id();
        $now = (\Carbon\Carbon::now())->format('Y-m-d H:i:s');
        $btbStr = implode("','", $btbs->flatten()->all());
        $sql = <<<SQL
        insert into btb_validate (branch_id,btb_type, doc_id, btb_date, reference_id ,  co_reference, product_id, product_name, uom_id,ref_doc, qty, dms_inv_carrier_id, dms_inv_warehouse_id, vehicle_number ,created_by, created_at, partner_id, price, shipping_cost )
        select
            dsd.szBranchId,
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
            {$userId} as created_by ,
            '{$now}' as created_at,
            'Internal' as partner_id,
            0 as price,
            0 as shipping_cost
            
        from
            dms_inv_docstockindistribution dsd
        join dms_inv_docstockindistributionitem dsdi on dsdi.szDocId = dsd.szDocId
        join dms_inv_product divi on divi.szId = dsdi.szProductId
        join dms_inv_vehicle eks on eks.szId  = dsd.szVehicleId
        -- left join product_price pp on pp.dms_inv_product_id = divi.iInternalId
        where dsd.szDocStatus = 'Applied' and dsd.szDocId in ('{$btbStr}') 
        SQL;
        //DB::statement($sql);
        $this->fromQuery($sql);
    }

    private function btbSupplierSql($startDate, $endDate, $branchId)
    {
        $whereBranchId = !empty($branchId) ? " and dsd.szBranchId = '{$branchId}'" : '';
        return <<<SQL
        select
            'BTB Supplier' as jenis,
            dsd.szDocId AS no_btb,
            dsd.dtmCreated as tgl_btb,
            dsd.szRefDocId AS sj_pabrik,            
            divi.szName as product_name,
            dsdi.decQty as qty,
            dap.szName as asal,
            dsd.szRef1 AS co_reference,
            dsd.szRef2 AS sj_ekspedisi,
            dsd.dtmDoc as tgl_sj,
            dsd.szVehicle2 as nopol,
            dsd.szStockType as tipe_stok,
            dsd.szWarehouseId as id_gudang,            
            wh.szName as nama_gudang,
            eks.szName as nama_ekspedisi,        
            dsd.szDocStatus AS szDocStatus,
            coalesce((select ppl.price from product_price_log ppl where ppl.product_id = dsdi.szProductId and ppl.start_date <= dsd.dtmDoc and (ppl.end_date is null or ppl.end_date >= dsd.dtmDoc) order by id desc limit 1),0) as price,
            coalesce(getShippingCost(dsd.dtmCreated, dsd.szCarrierId, dsd.szSupplierId , dsd.szWarehouseId, dsdi.szProductId),0) as shipping_cost
            -- coalesce((select cost from shippingCost where product_id = dsdi.szProductId and destination_id = dsd.szWarehouseId and origin_id = dsd.szSupplierId limit 1),0) as shipping_cost
        from
            dms_inv_docstockinsupplier dsd
        join dms_inv_docstockinsupplieritem dsdi on dsdi.szDocId = dsd.szDocId
        join dms_inv_product divi on divi.szId = dsdi.szProductId
        join dms_inv_warehouse wh on wh.szId = dsd.szWarehouseId 
        join dms_inv_carrier eks on eks.szId  = dsd.szCarrierId
        join dms_ap_supplier dap on dap.szId = dsd.szSupplierId 
        left join btb_validate bv on bv.doc_id = dsd.szDocId and bv.deleted_at is null
        where dsd.szDocStatus = 'Applied' and bv.reference_id is null        
            and dsd.dtmCreated between '{$startDate}' and '{$endDate}'
            {$whereBranchId}            
        SQL;
    }

    private function btbDistribusiSql($startDate, $endDate, $branchId)
    {
        $whereBranchId = !empty($branchId) ? " and dsd.szBranchId = '{$branchId}'" : '';
        return <<<SQL
        select
            'BTB Distribusi' as jenis,
            dsd.szDocId AS no_btb,
            dsd.dtmCreated as tgl_btb,
            dsd.szBkbReferensi AS sj_pabrik,
            divi.szName as product_name,
            '-' as id_asal,
            dsd.szDoReferensi AS co_reference,
            '-' AS sj_ekspedisi,
            dsd.dtmDoc as tgl_sj,
            eks.szPoliceNo as nopol,
            dsd.szStockType as tipe_stok,
            dsd.szWarehouseId as id_gudang,
            wh.szName as nama_gudang,
            'Internal' as nama_ekspedisi,        
            dsd.szDocStatus AS szDocStatus,
            0 as price,
            0 as shipping_cost
        from
            dms_inv_docstockindistribution dsd
        join dms_inv_docstockindistributionitem dsdi on dsdi.szDocId = dsd.szDocId
        join dms_inv_product divi on divi.szId = dsdi.szProductId
        join dms_inv_warehouse wh on wh.szId = dsd.szWarehouseId 
        join dms_inv_vehicle eks on eks.szId  = dsd.szVehicleId 
        left join btb_validate bv on bv.doc_id = dsd.szDocId and bv.deleted_at is null
        where dsd.szDocStatus = 'Applied' and bv.reference_id is null        
        and dsd.dtmCreated between '{$startDate}' and '{$endDate}'
        {$whereBranchId}
        SQL;
    }
}

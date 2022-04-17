<?php

namespace App\Repositories\Inventory;

use App\Models\Base\Setting;
use App\Models\Inventory\DmsInvProduct;
use App\Models\Inventory\ProductStock;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

/**
 * Class ProductStockRepository.
 *
 * @version April 5, 2022, 9:33 pm WIB
 */
class ProductStockRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'first_stock',
        'supplier_in',
        'mutation_in',
        'distribution_in',
        'supplier_out',
        'mutation_out',
        'distribution_out',
        'morphing',
        'last_stock',
        'period',
        'additional_info',
    ];

    /**
     * Return searchable fields.
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model.
     */
    public function model()
    {
        return ProductStock::class;
    }

    public function generate($data)
    {
        $period = $data['period'];
        $startDate = $period.'-01';
        $endDate = Carbon::createFromFormat('Y-m-d', $startDate)->endOfMonth()->format('Y-m-d');
        $previousPeriod = Carbon::createFromFormat('Y-m-d', $startDate)->subMonth()->format('Y-m');
        $branch = $data['branch_id'];
        $settingCompany = Setting::pluck('value', 'code');
        $kodeGalon = "'".implode("','", explode(',', $settingCompany['kode_galon']))."'";

        $sql = <<<SQL
select z.*,z.szProductId as product_id, (z.diff_price * z.qty_in_change) as pengurang from (
        select x.*, y.last_stock as first_stock, COALESCE(y.price, 0) as old_price, COALESCE(current_price.price, 0) as price,  
	        case when 
		COALESCE(y.price,0) != COALESCE(current_price.price, 0) 
		then (select (COALESCE(y.price,0) - COALESCE(current_price.price, 0)))  
                else 0 
                end diff_price,
		case when COALESCE(y.price,0) != COALESCE(current_price.price, 0) 
                then
			coalesce((select sum(decQtyOnHand) from dms_inv_stockhistory 
					where szProductId = x.szProductId
						and szLocationType = 'WAREHOUSE'
						and szReportedAsId = '{$branch}'
						and szTrnId in ('DMSDocStockInBranch','DMSDocStockInDistribution','DMSDocStockInSupplier') 
						and dtmTransaction between '{$startDate}' and (select max(start_date) from product_price_log where product_id COLLATE utf8mb4_unicode_ci = x.szProductId and start_date <= '{$endDate}') )
                                ,0)			 
			else 0 
		end qty_in_change
from (
select dis.szProductId, dip.szName,
	sum(case when dis.szTrnId = 'DMSDocStockInBranch' then dis.decQtyOnHand else 0 end) as 'mutation_in',
        sum(case when dis.szTrnId = 'DMSDocStockOutBranch' then abs(dis.decQtyOnHand) else 0 end) as 'mutation_out',
        sum(case when dis.szTrnId = 'DMSDocStockInDistribution' then dis.decQtyOnHand else 0 end) as 'distribution_in',
        sum(case when dis.szTrnId = 'DMSDocStockOutDistribution' then abs(dis.decQtyOnHand) else 0 end) as 'distribution_out',
        sum(case when dis.szTrnId = 'DMSDocStockInSupplier' then dis.decQtyOnHand else 0 end) as 'supplier_in',
        sum(case when dis.szTrnId = 'DMSDocStockOutSupplier' then abs(dis.decQtyOnHand) else 0 end) as 'supplier_out',
--         sum(case when dis.szTrnId = 'DMSDocDo' then dis.decQtyOnHand else 0 end) as 'DOCDO',
        sum(case when dis.szTrnId = 'DMSDocStockMorph' then abs(dis.decQtyOnHand) else 0 end) as 'morphing',
        sum(case when dis.szTrnId = 'DMSDocStockTrfBetweenWarehouse' then abs(dis.decQtyOnHand) else 0 end) as 'transfer'
from dms_inv_stockhistory dis
join (select dip.szId, dip.szName from dms_inv_product dip where dtmEndDate >= '{$startDate}' ) dip on dip.szId = dis.szProductId 
where dis.szLocationType = 'WAREHOUSE' and dis.dtmTransaction BETWEEN '{$startDate}' and '{$endDate}' and dis.szReportedAsId = '{$branch}' and dis.szProductId not in ({$kodeGalon})
group by dis.szProductId, dip.szName
)x left join (
        -- stock akhir bulan kemarin sebagai stock awal
	select ps.product_id, ps.price, ps.last_stock from product_stock ps where period = '{$previousPeriod}'
)y on x.szProductId = y.product_id COLLATE utf8mb4_unicode_ci 
left join (
	select ppl.product_id, ppl.dpp_price as price
	from product_price_log ppl 
	join ( 
	select max(id) as id from product_price_log ppl where ppl.start_date <= '{$endDate}' and ( end_date is null or end_date >= '{$endDate}' ) group by product_id
	) last_id on last_id.id = ppl.id
) current_price on current_price.product_id = x.szProductId COLLATE utf8mb4_unicode_ci
)z
SQL;

        /*
        $sql = <<<SQL
                select  dip.szId,
                        x.szBranchId,
                        sum(case when x.jenis = 'MI' then x.qty else 0 end) as 'MI',
                        sum(case when x.jenis = 'MO' then x.qty else 0 end) as 'MO',
                        sum(case when x.jenis = 'DI' then x.qty else 0 end) as 'DI',
                        sum(case when x.jenis = 'DO' then x.qty else 0 end) as 'DO',
                        sum(case when x.jenis = 'SI' then x.qty else 0 end) as 'SI',
                        sum(case when x.jenis = 'SO' then x.qty else 0 end) as 'SO'
                from (
                select 	did.szBranchId,
                        didi.szProductId,
                        sum(didi.decQty) as qty,
                        'MI' as jenis
                from dms_inv_docstockinbranch did
                join dms_inv_docstockinbranchitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ({$kodeGalon})
                where did.dtmDoc BETWEEN '{$startDate}' and '{$endDate}' and did.szBranchId = '{$branch}'
                GROUP  by did.szBranchId ,didi.szProductId
                union all
                select 	did.szBranchId,
                        didi.szProductId,
                        sum(didi.decQty) as qty,
                        'MO' as jenis
                from dms_inv_docstockoutbranch did
                join dms_inv_docstockoutbranchitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ({$kodeGalon})
                where did.dtmDoc BETWEEN '{$startDate}' and '{$endDate}' and did.szBranchId = '{$branch}'
                GROUP  by did.szBranchId ,didi.szProductId
                union all
                select 	did.szBranchId,
                        didi.szProductId,
                        sum(didi.decQty) as qty,
                        'DI' as jenis
                from dms_inv_docstockindistribution did
                join dms_inv_docstockindistributionitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ({$kodeGalon})
                where did.dtmDoc BETWEEN '{$startDate}' and '{$endDate}' and did.szBranchId = '{$branch}'
                GROUP  by did.szBranchId ,didi.szProductId
                union all
                select 	did.szBranchId,
                        didi.szProductId,
                        sum(didi.decQty) as qty,
                        'DO' as jenis
                from dms_inv_docstockoutdistribution did
                join dms_inv_docstockoutdistributionitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ({$kodeGalon})
                where did.dtmDoc BETWEEN '{$startDate}' and '{$endDate}' and did.szBranchId = '{$branch}'
                GROUP  by did.szBranchId ,didi.szProductId
                union all
                select 	did.szBranchId,
                        didi.szProductId,
                        sum(didi.decQty) as qty,
                        'SO' as jenis
                from dms_sd_docdo did
                join dms_sd_docdoitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ({$kodeGalon})
                where did.dtmDoc BETWEEN '{$startDate}' and '{$endDate}' and did.szBranchId = '{$branch}' and did.szDocStatus = 'Applied'
                GROUP  by did.szBranchId ,didi.szProductId
                union all
                select 	did.szBranchId,
                        didi.szProductId,
                        sum(didi.decQty) as qty,
                        'SI' as jenis
                from dms_inv_docstockinsupplier did
                join dms_inv_docstockinsupplieritem didi on didi.szDocId = did.szDocId and didi.szProductId not in ({$kodeGalon})
                where did.dtmDoc BETWEEN '{$startDate}' and '{$endDate}' and did.szBranchId = '{$branch}' and did.szDocStatus = 'Applied'
                GROUP  by did.szBranchId ,didi.szProductId
                )x
                right join dms_inv_product dip on dip.szId = x.szProductId
                where dip.dtmEndDate > now()
                GROUP  by x.szBranchId ,dip.szId
        SQL;
        */
        return $this->model->fromQuery($sql);
    }

    public function create($input)
    {
        $this->model->getConnection()->beginTransaction();

        try {
            $period = $input['period'];
            $branchId = $input['branch_id'];
            $history = $input['history'];
            $pengurang = $input['pengurang'];
            $this->removePreviousData($period);
            $products = DmsInvProduct::where('dtmEndDate', '>=', $period.'-01')->get();
            $defaultProductStock = [        
                'first_stock' => 0,
                'supplier_in' => 0,
                'mutation_in' => 0,
                'distribution_in' => 0,
                'supplier_out' => 0,
                'mutation_out' => 0,
                'distribution_out' => 0,
                'morphing' => 0,
                'transfer' => 0,
                'substractor' => 0,
                'cogs' => 0,
                'last_stock' => 0,                
                'price' => 0           
            ];
            $productSave = [];
            foreach($products as $product){
                $defaulfData = isset($history[$product->szId]) ? array_merge($defaultProductStock, json_decode($history[$product->szId], 1)) :  $defaultProductStock;
                $item = new ProductStock($defaulfData);
                $item->product_id = $product->szId;
                $item->substractor = $pengurang[$product->szId] ?? 0;                
                $item->cogs = $item->cogs - $item->substractor;
                $item->period = $period;
                $item->branch_id = $branchId;
                $item->save();
            }
            $this->model->getConnection()->commit();
            $this->model->flushCache();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return $e->getMessage();
        }

        return $this->model;
    }

    private function removePreviousData($period)
    {
        $this->model->wherePeriod($period)->forceDelete();
    }
}

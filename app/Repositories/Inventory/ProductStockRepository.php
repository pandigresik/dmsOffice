<?php

namespace App\Repositories\Inventory;

use App\Models\Accounting\JournalAccount;
use App\Models\Base\Setting;
use App\Models\Inventory\DmsInvProduct;
use App\Models\Inventory\ProductStock;
use App\Models\Inventory\ProductStockAdjustment;
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

    public function detail($startDate, $endDate, $branch, $product)
    {
        $user = \Auth::user();
        $gudangPusat = config('entity.gudangPusat')[$user->entity_id];        
        $previousPeriod = Carbon::createFromFormat('Y-m-d', $startDate)->subMonth()->format('Y-m');                
        
        $historyTable = 'dms_inv_stockhistory';
        if (isset($gudangPusat[$branch])) {
            $historyTable = 'gdpusat.dms_inv_stockhistory';
        }
        $sqlSaldoAwal = <<<SQL
        select ps.product_id, ps.price, ps.last_stock as qty, ps.cogs
        from product_stock ps 
        where period = '{$previousPeriod}' and branch_id = '{$branch}' and ps.product_id = '{$product}'
SQL;

        $sql = <<<SQL
select dis.dtmTransaction, dis.decQtyOnHand, dis.sZDocId
	,upper(dis.szProductId) as szProductId, dip.szName, dis.szTrnId	
	,coalesce (
	(select dpp_price from product_price_log ppl where ppl.start_date <= dtmTransaction and ( end_date is null or end_date >= dtmTransaction ) and product_id = dis.szProductId),0) as price
from {$historyTable} dis
join (select dip.szId, dip.szName from dms_inv_product dip where dtmEndDate >= '{$startDate}' ) dip on dip.szId = dis.szProductId 
where dis.szLocationType = 'WAREHOUSE' 
and dis.dtmTransaction BETWEEN '{$startDate}' and '{$endDate}' 
and dis.szReportedAsId = '{$branch}' 
and dis.szProductId = '{$product}'

SQL;
        return [
            'detail' => $this->model->fromQuery($sql),
            'saldoAwal' => $this->model->fromQuery($sqlSaldoAwal),
        ];
    }

    public function list($startDate, $endDate, $branch, $product)
    {
        $user = \Auth::user();
        $gudangPusat = config('entity.gudangPusat')[$user->entity_id];        
        $previousPeriod = Carbon::createFromFormat('Y-m-d', $startDate)->subMonth()->format('Y-m');        
        $settingCompany = Setting::pluck('value', 'code');
        $kodeGalon = "'".implode("','", explode(',', $settingCompany['kode_galon']))."'";
        $whereProductStr = '';
        if(!empty($product)){
            $whereProductStr = ' and dis.szProductId in (\''.implode("','", $product).'\')';
        }
        $historyTable = 'dms_inv_stockhistory';
        if (isset($gudangPusat[$branch])) {
            $historyTable = 'gdpusat.dms_inv_stockhistory';
        }

        $sql = <<<SQL
select z.*,z.szProductId as product_id, (z.diff_price * z.qty_in_change) as pengurang from (
        select x.*, coalesce(y.last_stock, 0) as first_stock, coalesce(y.cogs, 0) as first_stock_val, COALESCE(y.price, 0) as old_price, COALESCE(current_price.price, 0) as price,  
	        case when 
		COALESCE(y.price,0) != COALESCE(current_price.price, 0) 
		then (select (COALESCE(y.price,0) - COALESCE(current_price.price, 0)))  
                else 0 
                end diff_price,
		case when COALESCE(y.price,0) != COALESCE(current_price.price, 0) 
                then
			coalesce((select sum(decQtyOnHand) from {$historyTable} 
					where szProductId = x.szProductId
						and szLocationType = 'WAREHOUSE'
						and szReportedAsId = '{$branch}'
						and szTrnId in ('DMSDocStockInBranch','DMSDocStockInDistribution','DMSDocStockInSupplier') 
						and dtmTransaction between '{$startDate}' and (select max(start_date) from product_price_log where product_id = x.szProductId and start_date <= '{$endDate}') )
                                ,0)			 
			else 0 
		end qty_in_change
from (
select upper(dis.szProductId) as szProductId, dip.szName,
	sum(case when dis.szTrnId = 'DMSDocStockInBranch' then dis.decQtyOnHand else 0 end) as 'mutation_in',
        sum(case when dis.szTrnId = 'DMSDocStockOutBranch' then abs(dis.decQtyOnHand) else 0 end) as 'mutation_out',
        sum(case when dis.szTrnId = 'DMSDocStockInDistribution' then dis.decQtyOnHand else 0 end) as 'distribution_in',
        sum(case when dis.szTrnId = 'DMSDocStockOutDistribution' then abs(dis.decQtyOnHand) else 0 end) as 'distribution_out',
        sum(case when dis.szTrnId = 'DMSDocStockInSupplier' then dis.decQtyOnHand else 0 end) as 'supplier_in',
        sum(case when dis.szTrnId = 'DMSDocStockOutSupplier' then abs(dis.decQtyOnHand) else 0 end) as 'supplier_out',
--         sum(case when dis.szTrnId = 'DMSDocDo' then dis.decQtyOnHand else 0 end) as 'DOCDO',
        sum(case when dis.szTrnId = 'DMSDocStockMorph' then dis.decQtyOnHand else 0 end) as 'morphing',
        sum(case when dis.szTrnId = 'DMSDocStockTrfBetweenWarehouse' then abs(dis.decQtyOnHand) else 0 end) as 'transfer'
from {$historyTable} dis
join (select dip.szId, dip.szName from dms_inv_product dip where dtmEndDate >= '{$startDate}' ) dip on dip.szId = dis.szProductId 
where dis.szLocationType = 'WAREHOUSE' and dis.dtmTransaction BETWEEN '{$startDate}' and '{$endDate}' and dis.szReportedAsId = '{$branch}' 
    -- and dis.szProductId not in ({$kodeGalon}) 
    {$whereProductStr}
group by dis.szProductId, dip.szName
)x left join (
        -- stock akhir bulan kemarin sebagai stock awal
	select ps.product_id, ps.price, ps.last_stock, ps.cogs from product_stock ps where period = '{$previousPeriod}' and branch_id = '{$branch}'
)y on x.szProductId = y.product_id 
left join (
	select ppl.product_id, ppl.dpp_price as price
	from product_price_log ppl 
	join ( 
	select max(id) as id from product_price_log ppl where ppl.start_date <= '{$endDate}' and ( end_date is null or end_date >= '{$endDate}' ) group by product_id
	) last_id on last_id.id = ppl.id
) current_price on current_price.product_id = x.szProductId 
)z
SQL;
        return $this->model->fromQuery($sql);
    }

    public function generate($data)
    {
        $user = \Auth::user();
        $gudangPusat = config('entity.gudangPusat')[$user->entity_id];
        $period = $data['period'];
        $startDate = $period.'-01';
        $endDate = Carbon::createFromFormat('Y-m-d', $startDate)->endOfMonth()->format('Y-m-d');
        $previousPeriod = Carbon::createFromFormat('Y-m-d', $startDate)->subMonth()->format('Y-m');
        $branch = $data['branch_id'];
        $settingCompany = Setting::pluck('value', 'code');
        $kodeGalon = "'".implode("','", explode(',', $settingCompany['kode_galon']))."'";
        
        $historyTable = 'dms_inv_stockhistory';
        if (isset($gudangPusat[$branch])) {
            $historyTable = 'gdpusat.dms_inv_stockhistory';
        }

        $sql = <<<SQL
select z.*,z.szProductId as product_id, (z.diff_price * z.qty_in_change) as pengurang from (
        select x.*, coalesce(y.last_stock, 0) as first_stock, COALESCE(y.price, 0) as old_price, COALESCE(current_price.price, 0) as price,  
	        case when 
		COALESCE(y.price,0) != COALESCE(current_price.price, 0) 
		then (select (COALESCE(y.price,0) - COALESCE(current_price.price, 0)))  
                else 0 
                end diff_price,
		case when COALESCE(y.price,0) != COALESCE(current_price.price, 0) 
                then
			coalesce((select sum(decQtyOnHand) from {$historyTable} 
					where szProductId = x.szProductId
						and szLocationType = 'WAREHOUSE'
						and szReportedAsId = '{$branch}'
						and szTrnId in ('DMSDocStockInBranch','DMSDocStockInDistribution','DMSDocStockInSupplier') 
						and dtmTransaction between '{$startDate}' and (select max(start_date) from product_price_log where product_id = x.szProductId and start_date <= '{$endDate}') )
                                ,0)			 
			else 0 
		end qty_in_change
from (
select upper(dis.szProductId) as szProductId, dip.szName,
	sum(case when dis.szTrnId = 'DMSDocStockInBranch' then dis.decQtyOnHand else 0 end) as 'mutation_in',
        sum(case when dis.szTrnId = 'DMSDocStockOutBranch' then abs(dis.decQtyOnHand) else 0 end) as 'mutation_out',
        sum(case when dis.szTrnId = 'DMSDocStockInDistribution' then dis.decQtyOnHand else 0 end) as 'distribution_in',
        sum(case when dis.szTrnId = 'DMSDocStockOutDistribution' then abs(dis.decQtyOnHand) else 0 end) as 'distribution_out',
        sum(case when dis.szTrnId = 'DMSDocStockInSupplier' then dis.decQtyOnHand else 0 end) as 'supplier_in',
        sum(case when dis.szTrnId = 'DMSDocStockOutSupplier' then abs(dis.decQtyOnHand) else 0 end) as 'supplier_out',
--         sum(case when dis.szTrnId = 'DMSDocDo' then dis.decQtyOnHand else 0 end) as 'DOCDO',
        sum(case when dis.szTrnId = 'DMSDocStockMorph' then dis.decQtyOnHand else 0 end) as 'morphing',
        sum(case when dis.szTrnId = 'DMSDocStockTrfBetweenWarehouse' then abs(dis.decQtyOnHand) else 0 end) as 'transfer'
from {$historyTable} dis
join (select dip.szId, dip.szName from dms_inv_product dip where dtmEndDate >= '{$startDate}' ) dip on dip.szId = dis.szProductId 
where dis.szLocationType = 'WAREHOUSE' and dis.dtmTransaction BETWEEN '{$startDate}' and '{$endDate}' and dis.szReportedAsId = '{$branch}' -- and dis.szProductId not in ({$kodeGalon})
group by dis.szProductId, dip.szName
)x left join (
        -- stock akhir bulan kemarin sebagai stock awal
	select ps.product_id, ps.price, ps.last_stock from product_stock ps where period = '{$previousPeriod}' and branch_id = '{$branch}'
)y on x.szProductId = y.product_id 
left join (
	select ppl.product_id, ppl.dpp_price as price
	from product_price_log ppl 
	join ( 
	select max(id) as id from product_price_log ppl where ppl.start_date <= '{$endDate}' and ( end_date is null or end_date >= '{$endDate}' ) group by product_id
	) last_id on last_id.id = ppl.id
) current_price on current_price.product_id = x.szProductId 
)z
SQL;
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
            $this->removePreviousData($period, $branchId);
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
            $totalCogs = 0;
            foreach ($products as $product) {
                $defaulfData = isset($history[$product->szId]) ? array_merge($defaultProductStock, json_decode($history[$product->szId], 1)) : $defaultProductStock;
                $item = new ProductStock($defaulfData);
                if ($item->last_stock < 0) {
                    $item->last_stock = 0;
                }
                $item->product_id = $product->szId;
                $item->substractor = $pengurang[$product->szId] ?? 0;
                $item->cogs = $item->cogs - $item->substractor;
                if ($item->cogs < 0) {
                    $item->cogs = abs($item->cogs);
                }
                $item->period = $period;
                $item->branch_id = $branchId;
                $item->save();
                $totalCogs += $item->cogs;
            }
            $lastDay = \Carbon\Carbon::createFromFormat('Y-m', $period)->endOfMonth();
            // save to journal account
            JournalAccount::create([
                'account_id' => 'HPPPT',
                'name' => 'HARGA PABRIK',
                'debit' => $totalCogs,
                'credit' => 0,
                'balance' => $totalCogs,
                'date' => $lastDay,
                'branch_id' => $branchId,
                'description' => 'HPP Pabrik product stock',
                'reference' => 'HPPP-'.$period,
                'type' => 'JPS'
            ]);
            $this->model->getConnection()->commit();
            $this->model->flushCache();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return $e;
        }

        return $this->model;
    }

    private function removePreviousData($period, $branchId)
    {
        $this->model->wherePeriod($period)->whereBranchId($branchId)->forceDelete();
        JournalAccount::where(['branch_id' => $branchId, 'type' =>'JPS'])->forceDelete();
    }
}

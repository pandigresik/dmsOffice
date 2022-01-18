<?php

namespace App\Repositories\Sales;

use App\Models\Sales\BkbDiscountDetail;
use App\Models\Sales\BkbDiscounts;
use App\Models\Sales\Discounts;
use App\Models\Sales\DmsSdDocdo;
use App\Repositories\BaseRepository;

/**
 * Class BkbDiscountsRepository.
 *
 * @version December 31, 2021, 9:22 pm WIB
 */
class BkbDiscountsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'szDocId',
        'szProductId',
        'szSalesId',
        'szBranchId',
        'decQty',
        'discPrinciple',
        'discDistributor',
        'sistemPrinciple',
        'sistemDistributor',
        'selisihPrinciple',
        'selisihDistributor',
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
        return BkbDiscounts::class;
    }

    public function mustValidate($startDate, $endDate, $branchId)
    {
        $discountProduct = [];
        $tmpDiscountProduct = Discounts::whereState('A')
            ->whereRaw("(start_date between '{$startDate}' and '{$endDate}' or end_date between '{$startDate}' and '{$endDate}') or ('{$startDate}' between start_date and end_date or '{$endDate}' between start_date and end_date)")
            ->get()
        ;
        if ($tmpDiscountProduct) {
            foreach ($tmpDiscountProduct as $discount) {
                if ('kontrak' == $discount->tipe) {
                    $discountProduct = array_merge($discountProduct, $discount->details->pluck('main_dms_inv_product_id')->toArray());
                } else {
                    $listMainProduct = explode(',', $discount->main_dms_inv_product_id);
                    $discountProduct = array_merge($discountProduct, $listMainProduct);
                    if (!empty($discount->bundling_dms_inv_product_id)) {
                        $listBundlingProduct = explode(',', $discount->bundling_dms_inv_product_id);
                        // array_push($discountProduct, $discount->bundling_dms_inv_product_id);
                        $discountProduct = array_merge($discountProduct, $listBundlingProduct);
                    }
                }
            }
        }
        if (empty($discountProduct)) {
            return [];
        }

        return DmsSdDocdo::with(['items' => function ($q) use ($discountProduct) {
            $q->select(['dms_sd_docdoitem.szDocId', 'dms_sd_docdoitem.szProductId', 'dms_sd_docdoitem.intItemNumber', 'dms_sd_docdoitem.decQty', 'dms_sd_docdoitemprice.decDiscPrinciple', 'dms_sd_docdoitemprice.decDiscDistributor'])
                ->with(['product'])
                ->whereIn('szProductId', $discountProduct)
                ->join('dms_sd_docdoitemprice', function ($join) {
                            $join->on('dms_sd_docdoitemprice.szDocId', '=', 'dms_sd_docdoitem.szDocId')
                                ->on('dms_sd_docdoitemprice.intItemNumber', '=', 'dms_sd_docdoitem.intItemNumber')
                            ;
                        })
                    ;
        }, 'customer' => function($q){
            return $q->with(['address']);
        }, 'sales', 'depo'])->whereBetween('dtmDoc', [$startDate, $endDate])
            ->join('dms_sd_docdoitem', function ($join) {
                    $join->on('dms_sd_docdoitem.szDocId', '=', 'dms_sd_docdo.szDocId')
                        ->on('dms_sd_docdoitem.intItemNumber', '=', \DB::raw('0'))
                    ;
                })->whereIn('dms_sd_docdoitem.szProductId', $discountProduct)
            ->where('szBranchId', $branchId)
            ->where('szDocStatus', 'Applied')
            ->disableModelCaching()
            ->get()
        ;
    }

    public function processDiscount($startDate, $endDate, $branchId)
    {
        $result = collect();
        $datas = $this->mustValidate($startDate, $endDate, $branchId);
        if (empty($datas)) {
            return $result;
        }

        foreach ($datas as $data) {
            foreach ($data->items as $index => $item) {
                //\Log::error($item->getRawOriginal('decDiscPrinciple'));
                if ($item->getRawOriginal('decDiscPrinciple') <= 0) {                    
                    continue;
                }

                $item->setSkipCountComboPromo($data->getCountedDiscount());
                $item->setOtherItem($data->items);
                $item->setCustomer($data->customer);
                $item->setBkbDate($data->getRawOriginal('dtmDoc'));
                $item->getDiscounts();
                
                if ($item->getHasDiscount()) {
                    $totalItemDiscountPrinciple = collect($item->getDiscountPrinciple())->sum('amount');
                    $item->setSelisihPrinciple($item->getRawOriginal('decDiscPrinciple') - $totalItemDiscountPrinciple);
                    $data->setCountedDiscount(1);
                    $additionalInfo = [
                        'szSalesId' => $data->szSalesId,
                        'szBranchId' => $data->szBranchId,
                        'depo' => $data->depo->szName,
                        'dtmDoc' => $data->dtmDoc,
                        'szCustomerId' => $data->szCustomerId,
                        'customerName' => $data->customer->szName ?? '-' ,
                        'customerAddress' => $data->customer->address->fullAddress ?? '-',
                        'salesName' => $data->sales->szName ?? '-'                        
                    ];
                    $item->setAdditionalInfo($additionalInfo);
                }else{
                    continue;   
                }

                $result->push($item);
            }
        }
        
        return $result->sortBy([            
            ['bkb_date','asc'],
            ['has_selisih_principle','desc']
        ]);


    }

    public function create($input)
    {
        $this->model->getConnection()->beginTransaction();

        try {
            $this->removePreviousData($input);
            $szDocId = $input['szDocId'];
            foreach ($szDocId as $_d) {
                $d = json_decode($_d, true);
                $detailProgram = $d['detailProgram'];
                unset($d['detailProgram']);
                BkbDiscounts::create($d);
                if (!empty($detailProgram['principle'])) {
                    $item = [
                        'szDocId' => $d['szDocId'],
                        'szProductId' => $d['szProductId'],
                        'szBranchId' => $d['szBranchId'],
                        'bkbDate' => $d['bkbDate'],
                        'decQty' => $d['decQty']
                    ];
                    foreach ($detailProgram['principle'] as $_index => $program) {
                        $item['discount_id'] = $program['id'];
                        $item['principle_amount'] = $program['amount'];
                        $item['distributor_amount'] = $detailProgram['distributor'][$_index]['amount'];                        
                        BkbDiscountDetail::create($item);
                    }
                }
            }

            $this->model->getConnection()->commit();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return $e;
        }

        return $this->model;
    }

    public function listDiscount($startDate, $endDate, $branchId)
    {
        return BkbDiscountDetail::with(['bkb' => function ($q) {
            $q->with(['customer', 'sales']);
        }, 'product'])->whereBetween('bkbDate', [$startDate, $endDate])->where(['szBranchId' => $branchId])->get()->groupBy('discount_id');
    }

    public function listDiscountRekap($startDate, $endDate)
    {
        return BkbDiscountDetail::select(['szBranchId', 'szProductId', 'discount_id'])->selectRaw('sum(principle_amount) as principle_amount, sum(distributor_amount) as distributor_amount')->with(['product'])->whereBetween('bkbDate', [$startDate, $endDate])
            ->with(['depo'])
            ->groupBy(['szBranchId', 'szProductId', 'discount_id'])
            ->get()->groupBy('discount_id');
    }

    public function listDiscountRekapExcel($startDate, $endDate)
    {
        return BkbDiscountDetail::select(['szBranchId', 'szDocId','szProductId','decQty', 'discount_id', 'principle_amount','distributor_amount','bkbDate'])->with(['product'])->whereBetween('bkbDate', [$startDate, $endDate])
            ->with(['depo', 'promo', 'product', 'bkb' => function($q){
                $q->with(['customer' => function($r){
                    $r->with(['address']);
                }]);
            }])
            ->orderBy('szBranchId')->orderBy('bkbDate')     
            ->get()->groupBy('discount_id');
    }

    public function listSalesReject($startDate, $endDate, $sales)
    {
        return BkbDiscounts::with(['bkb' => function ($q) {
            $q->with(['customer' => function($r){
                    $r->with(['address']);
                }]);
        }, 'product'])
        ->where('selisihPrinciple','>',0)
        ->whereBetween('bkbDate', [$startDate, $endDate])->whereIn('szSalesId', $sales)->get()->groupBy('szSalesId');
    }

    private function removePreviousData($input)
    {
        $startDate = $input['start_date'];
        $endDate = $input['end_date'];
        $branchId = $input['branch_id'];
        BkbDiscountDetail::whereBetween('bkbDate', [$startDate, $endDate])->where(['szBranchId' => $branchId])->forceDelete();
        BkbDiscounts::whereBetween('bkbDate', [$startDate, $endDate])->where(['szBranchId' => $branchId])->forceDelete();
    }
}

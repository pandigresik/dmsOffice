<?php

namespace App\Repositories\Sales;

use App\Models\Sales\BkbDiscountDetail;
use App\Models\Sales\BkbDiscounts;
use App\Repositories\BaseRepository;

/**
 * Class BkbDiscountsRepository
 * @package App\Repositories\Sales
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
        'selisihDistributor'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BkbDiscounts::class;
    }

    public function create($input)
    {
        $this->model->getConnection()->beginTransaction();

        try {
            $this->removePreviousData($input);
            $szDocId = $input['szDocId'];
            foreach($szDocId as $_d){
                $d = json_decode($_d, true);
                $detailProgram = $d['detailProgram'];
                unset($d['detailProgram']);
                BkbDiscounts::create($d);
                if(!empty($detailProgram['principle'])){
                    $item = [
                        'szDocId' => $d['szDocId'],
                        'szProductId' => $d['szProductId'],
                        'szBranchId' => $d['szBranchId'],
                        'bkbDate' => $d['bkbDate']                        
                    ];
                    foreach($detailProgram['principle'] as $_index => $program){
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

    private function removePreviousData($input){
        $startDate = $input['start_date'];
        $endDate = $input['end_date'];
        $branchId = $input['branch_id'];
        BkbDiscountDetail::whereBetween('bkbDate', [$startDate, $endDate])->where(['szBranchId' => $branchId])->forceDelete();
        BkbDiscounts::whereBetween('bkbDate', [$startDate, $endDate])->where(['szBranchId' => $branchId])->forceDelete();
    }
}

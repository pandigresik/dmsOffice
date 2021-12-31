<?php

namespace App\Repositories\Sales;

use App\Models\Sales\BkbValidate;
use App\Models\Sales\Discounts;
use App\Models\Sales\DmsSdDocdo;
use App\Repositories\BaseRepository;

/**
 * Class BkbValidateRepository
 * @package App\Repositories\Sales
 * @version December 27, 2021, 5:39 am WIB
*/

class BkbValidateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'doc_id',
        'dms_ar_customer_id',
        'dms_pi_employee_id',
        'disc_principle_sales',
        'disc_distributor_sales',
        'disc_principle_dms',
        'disc_distributor_dms',
        'invoiced'
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
        return BkbValidate::class;
    }

    public function mustValidate($startDate, $endDate, $branchId)
    {        
        $discountProduct = [];
        $tmpDiscountProduct = Discounts::whereState('A')
                ->whereRaw("(start_date between '$startDate' and '$endDate' or end_date between '$startDate' and '$endDate') or ('$startDate' between start_date and end_date or '$endDate' between start_date and end_date)")
                ->get();
        if($tmpDiscountProduct){
            foreach($tmpDiscountProduct as $discount){
                if($discount->tipe == 'kontrak'){
                    $discountProduct = array_merge($discountProduct, $discount->details->pluck('main_dms_inv_product_id')->toArray());
                }else{
                    array_push($discountProduct, $discount->main_dms_inv_product_id);
                    if(!empty($discount->bundling_dms_inv_product_id)){
                        array_push($discountProduct, $discount->bundling_dms_inv_product_id);
                    }
                    
                }
            }
        }
        if (empty($discountProduct)) {
            return [];
        }
        return DmsSdDocdo::with(['items' => function($q) use($discountProduct){                    
                    $q->select(['dms_sd_docdoitem.szDocId','dms_sd_docdoitem.szProductId','dms_sd_docdoitem.intItemNumber','dms_sd_docdoitem.decQty','dms_sd_docdoitemprice.decDiscPrinciple','dms_sd_docdoitemprice.decDiscDistributor'])
                        ->with(['product'])
                        ->whereIn('szProductId',$discountProduct)
                        ->join('dms_sd_docdoitemprice',function($join){
                            $join->on('dms_sd_docdoitemprice.szDocId','=','dms_sd_docdoitem.szDocId')
                                ->on('dms_sd_docdoitemprice.intItemNumber','=','dms_sd_docdoitem.intItemNumber');
                        });
                },'customer','sales', 'depo'])->whereBetween('dtmDoc',[$startDate, $endDate])
                ->join('dms_sd_docdoitem', function($join){
                    $join->on('dms_sd_docdoitem.szDocId', '=','dms_sd_docdo.szDocId')
                        ->on('dms_sd_docdoitem.intItemNumber','=',\DB::raw('0'));
                })->whereIn('dms_sd_docdoitem.szProductId', $discountProduct)  
                    ->where('szBranchId',$branchId)
                    ->where('szDocStatus','Applied')
                    ->disableModelCaching()
                ->get();
        // return DmsSdDocdo::join('dms_sd_docdoitem',function($join){
        //                 $join->on('dms_sd_docdoitem.szDocId','=','dms_sd_docdo.szDocId');
        //             })->join('dms_sd_docdoitemprice',function($join){
        //                 $join->on('dms_sd_docdoitemprice.szDocId','=','dms_sd_docdoitem.szDocId')
        //                     ->on('dms_sd_docdoitemprice.intItemNumber','=','dms_sd_docdoitem.intItemNumber');
        //             })->join('dms_ar_customer',function($join){
        //                 $join->on('dms_ar_customer.szId','=','dms_sd_docdo.szCustomerId');
        //             })->join('dms_sm_branch',function($join){
        //                 $join->on('dms_sm_branch.szId','=','dms_sd_docdo.szBranchId');
        //             })->join('dms_pi_employee',function($join){
        //                 $join->on('dms_pi_employee.szId','=','dms_sd_docdo.szDocId');
        //             })
        //             ->whereBetween('dtmDoc',[$startDate, $endDate])
        //             ->where('szBranchId',$branchId)
        //             ->where('szDocStatus','Applied')
        //         ->get();
    }    
}

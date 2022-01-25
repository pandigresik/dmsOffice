<?php

namespace App\Repositories\Sales;

use App\Models\Sales\DmsSdDocdo;
use App\Repositories\BaseRepository;

/**
 * Class BkbDiscountsRepository.
 *
 * @version December 31, 2021, 9:22 pm WIB
 */
class SalesReportRepository extends BaseRepository
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
        return DmsSdDocdo::class;
    }

    public function listRekap($startDate, $endDate, $branchId, $cash){
        return DmsSdDocdo::select(['dms_sd_docdoitem.szProductId','dms_inv_product.szName as szProductName'])
            ->selectRaw('sum(if(dms_sd_docdoitemprice.decPrice < 0,-1 * dms_sd_docdoitem.decQty,dms_sd_docdoitem.decQty)) as decQty, sum(dms_sd_docdoitem.decQty * dms_sd_docdoitemprice.decPrice) as amount,
                sum(dms_sd_docdoitemprice.decDiscPrinciple) as decDiscPrinciple, sum(dms_sd_docdoitemprice.decDiscDistributor) as decDiscDistributor,sum(dms_sd_docdoitemprice.decDiscInternal) as decDiscInternal'
            )
            // ->join('dms_sm_branch','dms_sm_branch.szId','=','dms_sd_docdo.szBranchId')
            ->join('dms_sd_docdoitem','dms_sd_docdoitem.szDocId','=','dms_sd_docdo.szDocId')
            ->join('dms_inv_product','dms_inv_product.szId','=','dms_sd_docdoitem.szProductId')            
            ->join('dms_sd_docdoitemprice', function($q){
                $q->on('dms_sd_docdoitemprice.szDocId','=','dms_sd_docdoitem.szDocId')
                    ->on('dms_sd_docdoitemprice.intItemNumber','=','dms_sd_docdoitem.intItemNumber');
            }
        )->where(['dms_sd_docdo.szDocStatus' => 'Applied','szBranchId' => $branchId, 'bCash' => $cash])        
        ->whereBetween('dms_sd_docdo.dtmDoc',[$startDate, $endDate])
        ->groupBy('dms_sd_docdoitem.szProductId')
        ->groupBy('dms_inv_product.szName')
        ->groupBy('dms_sd_docdo.szDocStatus')
        ->orderBy('dms_inv_product.szName')
        ->get();
    }
}

<?php

namespace App\Repositories\Accounting;

use App\Models\Purchase\BtbValidate;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class BtbValidateRepository.
 *
 * @version November 25, 2021, 5:35 am WIB
 */
class PayableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'doc_id',
        'product_id',
        'uom_id',
        'ref_doc',
        'qty',
        'qty_retur',
        'qty_reject',
        'invoiced',
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
        return BtbValidate::class;
    }

    public function list($startDate, $endDate, $type)
    {        
        $data = $this->model
            ->selectRaw('btb_validate.*, btb_validate.price * btb_validate.qty as total_price, dms_sm_branch.szName as depo, invoice.reference, payment_line.updated_at as pay_date')
            ->whereBetween('btb_date', [$startDate, $endDate])
            ->join('dms_sm_branch','dms_sm_branch.szId','btb_validate.branch_id')
            ->leftJoin('invoice', function($join) use ($type){
                if($type == 'OA'){
                    $join->on('invoice.id','=','btb_validate.invoiced_expedition')
                        ->where('invoice.partner_type','ekspedisi');
                }
                if($type == 'TIV'){
                    $join->on('invoice.id','=','btb_validate.invoiced')
                        ->where('invoice.partner_type','supplier');
                }                
            })
            ->leftJoin('payment_line','payment_line.invoice_id','invoice.id')
            ->orderBy('btb_date')
            // ->whereRaw('invoice.id is null or invoice.state != \'pay\'')            
            ;
        if($type == 'OA'){
            $data->with(['ekspedisi']);
        }
        if($type == 'TIV'){
            $data->with(['supplier']);
        }
        return [
            'data' => $data->get()            
        ];
    }

}

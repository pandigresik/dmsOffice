<?php

namespace App\Repositories\Finance;

use App\Models\Finance\Payment;
use App\Repositories\BaseRepository;

/**
 * Class PaymentRepository
 * @package App\Repositories\Finance
 * @version December 8, 2021, 9:49 pm WIB
*/

class PaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number',
        'type',
        'reference',
        'state',
        'estimate_date',
        'pay_date',
        'amount'
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
        return Payment::class;
    }

    /**
     * Create model record.
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance($input);
        $paymentLine = $input['invoice_id'];
        $model->number = $model->getNextNumber();
        $model->type = 'in';
        $model->state = Payment::READY_PAY;        
        $model->reference = $model->external_reference;
        $model->amount_total = $input['amount'] - $model->getRawOriginal('amount_discount');
        $model->save();
        $model->invoiceUsers()->create([
            'state' => $model->getRawOriginal('state')
        ]);        
        
        $model->btb()->update(['invoiced' => 1]);
        return $model;
    }
}

<?php

namespace App\Repositories\Finance;

use App\Models\Finance\Payment;
use App\Models\Purchase\Invoice;
use App\Repositories\BaseRepository;

/**
 * Class PaymentRepository.
 *
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
        'amount',
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
        $model->type = $model->defaultType();
        $model->number = $model->getNextNumber();
        $model->state = Payment::READY_PAY;
        $model->save();

        $this->setPaymentLines($paymentLine, $model);

        $model->invoices()->update(['state' => Payment::READY_PAY]);

        return $model;
    }

    public function update($input, $id)
    {
        $model = parent::update($input, $id);
        $model->invoices()->update(['state' => Payment::PAY]);

        return $model;
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return null|bool|mixed
     */
    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);
        $model->invoices()->update(['state' => Invoice::VALIDATE]);
        $model->paymentLines()->forceDelete();

        return $model->forceDelete();
    }

    public function paymentToPay()
    {
        return $this->model->disableModelCaching()->selectRaw('count(*) as qty, sum(amount) amount')->readyToPay()->first();
    }

    public function supplierPaymentToPay()
    {
        return $this->model->disableModelCaching()->supplier()->selectRaw('count(*) as qty, sum(amount) amount')->readyToPay()->first();
    }

    public function ekspedisiPaymentToPay()
    {
        return $this->model->disableModelCaching()->ekspedisi()->selectRaw('count(*) as qty, sum(amount) amount')->readyToPay()->first();
    }

    private function setPaymentLines($paymentLine, $model)
    {
        if (!empty($paymentLine)) {
            $model->paymentLines()->forceDelete();
            foreach ($paymentLine as $line) {
                $lineArr = json_decode($line, 1);
                $lineArr['invoice_id'] = $lineArr['id'];
                $lineArr['amount_total'] = $lineArr['amount'] + $lineArr['amount_cn_dn'];
                unset($lineArr['id']);
                $model->paymentLines()->create($lineArr);
            }
        }
    }
}

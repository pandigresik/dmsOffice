<?php

namespace App\Repositories\Purchase;

use App\Models\Purchase\Invoice;
use App\Repositories\BaseRepository;

/**
 * Class InvoiceRepository.
 *
 * @version November 26, 2021, 9:05 pm WIB
 */
class InvoiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number',
        'type',
        'reference',
        'qty',
        'amount',
        'amount_discount',
        'state',
        'date_invoice',
        'date_due',
        'partner_id',
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
        return Invoice::class;
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
        if(isset($input['ekspedisi_id'])){
            $input['partner_type'] = 'ekspedisi';
            $input['partner_id'] = $input['ekspedisi_id'];
            unset($input['ekspedisi_id']);
        }else{
            $input['partner_type'] = 'supplier';
        }
        $model = $this->model->newInstance($input);
        $invoiceLine = $input['invoice_line'];        
        $model->number = $model->getNextNumber();
        $model->type = 'in';
        $model->state = Invoice::DEFAULT_STATE;
        $model->amount_discount = 0;
        $model->qty = $invoiceLine ? count($invoiceLine) : 0;
        $model->reference = $model->external_reference;
        $model->amount_total = $input['amount'] - $model->getRawOriginal('amount_discount');
        $model->save();
        $model->invoiceUsers()->create([
            'state' => $model->getRawOriginal('state'),
        ]);
        $this->setInvoiceLines($invoiceLine, $model);

        $model->btb()->update(['invoiced' => 1]);

        return $model;
    }

    public function update($input, $id)
    {
        $invoiceLine = $input['invoice_line'];
        $model = parent::update($input, $id);
        $this->setInvoiceLines($invoiceLine, $model);
        $model->invoiceUsers()->create([
            'state' => $model->getRawOriginal('state'),
        ]);

        return $model;
    }

    public function validate($id)
    {
        $model = parent::update(['state' => 'validate'], $id);
        $model->invoiceUsers()->create([
            'state' => $model->getRawOriginal('state'),
        ]);

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
        $model->btb()->update(['invoiced' => 0]);
        $model->invoiceLines()->forceDelete();
        $model->invoiceUsers()->forceDelete();

        return $model->forceDelete();
    }

    public function billSubmit()
    {
        return $this->model->disableModelCaching()->selectRaw('count(*) as qty, sum(amount_total) amount')->submit()->first();
    }
    
    public function billValidate()
    {
        return $this->model->disableModelCaching()->selectRaw('count(*) as qty, sum(amount_total) amount')->validate()->first();
    }

    public function billSupplierValidate()
    {
        return $this->model->disableModelCaching()->supplierPartner()->selectRaw('count(*) as qty, sum(amount_total) amount')->validate()->first();
    }

    public function billEkspedisiValidate()
    {
        return $this->model->disableModelCaching()->ekspedisiPartner()->selectRaw('count(*) as qty, sum(amount_total) amount')->validate()->first();
    }

    public function readyPayment()
    {
        return $this->model->disableModelCaching()->with(['invoiceLines', 'partner', 'debitCreditNote'])->validate()->get();
    }

    private function setInvoiceLines($invoiceLine, $model)
    {
        if (!empty($invoiceLine)) {
            $model->invoiceLines()->forceDelete();
            foreach ($invoiceLine as $line) {
                $model->invoiceLines()->create(json_decode($line, 1));
            }
        }
    }
}

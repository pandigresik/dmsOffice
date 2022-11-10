<?php

namespace App\Repositories\Purchase;

use App\Models\Purchase\BtbShippingCostSubsidy;
use App\Models\Purchase\BtbValidate;
use App\Models\Purchase\Invoice;
use App\Models\Purchase\InvoiceSubsidi;
use App\Repositories\BaseRepository;
use Exception;

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
        $this->model->getConnection()->beginTransaction();
        try {
            $btbInvoicedColumn = BtbValidate::INVOICE_TYPE_COLUMN['supplier'];
            if (isset($input['ekspedisi_id'])) {
                $input['partner_type'] = 'ekspedisi';
                $input['partner_id'] = $input['ekspedisi_id'];
                unset($input['ekspedisi_id']);
                $btbInvoicedColumn = BtbValidate::INVOICE_TYPE_COLUMN['ekspedisi'];
            } else {
                $input['partner_type'] = 'supplier';
            }
            $model = $this->model->newInstance($input);
            $invoiceLine = $input['invoice_line'];
            $invoiceBkb = $input['invoice_bkb'] ?? [];
            $subsidiOA = $input['subsidi_oa'] ?? [];
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
            $this->setInvoiceBkb($invoiceBkb, $model);
            $this->setSubsidiOA($subsidiOA, $model);
            $model->btb()->update([$btbInvoicedColumn => 1]);
            if ('ekspedisi' == $input['partner_type']) {
                $model->shippingCost()->update([$btbInvoicedColumn => 1]);
            }
            /** pastikan amount pada header = total invoice line - total BKB */
            // $invoiceLineSum = $model->invoiceLines->sum(function($v){
            //     return $v->getRawOriginal('price') * $v->getRawOriginal('qty');
            // });

            // if($model->getRawOriginal('amount') == $invoiceLineSum){
            //     $this->model->getConnection()->commit();
            // }else{
            //     $this->model->getConnection()->rollBack();
            //     throw new Exception('Nilai amount invoice ('.$model->getRawOriginal('amount').') dan total detail ('.$invoiceLineSum.') tidak sama ');
            //     \Log::error('Nilai amount invoice ('.$model->getRawOriginal('amount').') dan total detail ('.$invoiceLineSum.') tidak sama ');
            // }            
            $this->model->getConnection()->commit();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();

            return $e;
        }
        return $model;
    }

    public function update($input, $id)
    {
        $this->model->getConnection()->beginTransaction();
        try{
            $invoiceLine = $input['invoice_line'];
            $invoiceBkb = $input['invoice_bkb'] ?? [];
            $model = parent::update($input, $id);
            $this->setInvoiceLines($invoiceLine, $model);
            $this->setInvoiceBkb($invoiceBkb, $model);
            $model->invoiceUsers()->create([
                'state' => $model->getRawOriginal('state'),
            ]);
            $this->model->getConnection()->commit();
        }catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();
            return $e;
        }        

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
        $this->model->getConnection()->beginTransaction();
        try{
            $query = $this->model->newQuery();

            $model = $query->findOrFail($id);
            $btbInvoicedColumn = BtbValidate::INVOICE_TYPE_COLUMN[$model->getRawOriginal('partner_type')];
            $model->btb()->update([$btbInvoicedColumn => 0]);
            if ('ekspedisi' == $model->getRawOriginal('partner_type')) {
                $model->shippingCost()->update([$btbInvoicedColumn => 0]);
            }
            // $subsidiOA = InvoiceSubsidi::where(['invoice_id' => $id])->get()->pluck('subsidi_oa_id', 'subsidi_oa_id')->toArray();            
            BtbShippingCostSubsidy::whereIn('id', function($q) use ($id){
                return $q->select(['id'])->from('invoice_subsidi')->where(['invoice_id' => $id]);
            })->update(['invoiced' => 0]);
            $model->invoiceLines()->forceDelete();
            $model->invoiceBkb()->forceDelete();
            $model->invoiceUsers()->forceDelete();
            $model->subsidiOa()->forceDelete();
            $model->forceDelete();
            $this->model->getConnection()->commit();

        }catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->model->getConnection()->rollBack();
            return $e;
        }
        
        return true;
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

    public function readyPayment($partnerType)
    {
        return $this->model->disableModelCaching()->where(['partner_type' => $partnerType])->with(['invoiceLines', 'partner', 'debitCreditNote', 'invoiceBkb'])->validate()->get();
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

    private function setInvoiceBkb($invoiceBkb, $model)
    {
        if (!empty($invoiceBkb)) {
            $model->invoiceBkb()->forceDelete();
            foreach ($invoiceBkb as $bkb) {
                $line = json_decode($bkb, 1);
                if (isset($line['ID. DOKUMEN'])) {
                    $model->invoiceBkb()->create(['references' => $line['ID. DOKUMEN'], 'additional_info' => $line]);
                }
            }
        }
    }

    private function setSubsidiOA($subsidiOA, $model)
    {
        if (!empty($subsidiOA)) {
            $model->subsidiOa()->forceDelete();
            foreach ($subsidiOA as $id => $oa) {
                $model->subsidiOa()->create(['amount' => $oa, 'subsidi_oa_id' => $id]);
            }
            BtbShippingCostSubsidy::whereIn('id', array_keys($subsidiOA))->update(['invoiced' => 1]);
        }
    }
}

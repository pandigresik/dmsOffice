<?php

namespace App\Repositories\Purchase;

use App\Models\Purchase\Invoice;
use App\Repositories\BaseRepository;

/**
 * Class InvoiceRepository
 * @package App\Repositories\Purchase
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
        'partner_id'
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
        $model = $this->model->newInstance($input);
        $model->number = $model->getNextNumber();
        $model->type = 'in';
        $model->state = Invoice::DEFAULT_STATE;
        $model->amount_total = $model->amount - $model->amount_discount;
        $model->save();
        $model->invoiceUsers()->create([
            'state' => $model->getRawOriginal('state')
        ]);
        $model->btb()->update(['invoiced' => 1]);
        return $model;
    }

    public function update($input, $id)
    {
        $model = parent::update($input, $id);
        $model->invoiceUsers()->create([
            'state' => $model->getRawOriginal('state')
        ]);
        return $model;
    }

    public function billSubmit(){

        return $this->model->disableModelCaching()->selectRaw('count(*) as qty, sum(amount_total) amount')->submit()->first();
    }

    public function billValidate(){
        return $this->model->disableModelCaching()->selectRaw('count(*) as qty, sum(amount_total) amount')->validate()->first();
    }
}

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
}

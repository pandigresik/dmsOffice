<?php

namespace App\Repositories\Purchase;

use App\Models\Purchase\InvoiceLine;
use App\Repositories\BaseRepository;

/**
 * Class InvoiceLineRepository.
 *
 * @version December 4, 2021, 8:42 pm WIB
 */
class InvoiceLineRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'invoice_id',
        'doc_id',
        'reference_id',
        'product_id',
        'product_name',
        'uom_id',
        'qty',
        'price',
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
        return InvoiceLine::class;
    }
}

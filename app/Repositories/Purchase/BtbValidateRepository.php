<?php

namespace App\Repositories\Purchase;

use App\Models\Purchase\BtbValidate;
use App\Repositories\BaseRepository;

/**
 * Class BtbValidateRepository
 * @package App\Repositories\Purchase
 * @version November 25, 2021, 5:35 am WIB
*/

class BtbValidateRepository extends BaseRepository
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
        return BtbValidate::class;
    }
}

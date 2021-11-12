<?php

namespace App\Repositories\Base;

use App\Models\Base\LocationSupplier;
use App\Repositories\BaseRepository;

/**
 * Class LocationSupplierRepository.
 *
 * @version October 30, 2021, 5:59 am UTC
 */
class LocationSupplierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dms_ap_supplier_id',
        'address',
        'city',
        'state',
        'additional_cost',
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
        return LocationSupplier::class;
    }
}

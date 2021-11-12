<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\LocationEkspedisi;
use App\Repositories\BaseRepository;

/**
 * Class LocationEkspedisiRepository.
 *
 * @version October 30, 2021, 5:57 am UTC
 */
class LocationEkspedisiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dms_inv_carrier_id',
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
        return LocationEkspedisi::class;
    }
}

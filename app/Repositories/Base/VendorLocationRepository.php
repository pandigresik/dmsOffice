<?php

namespace App\Repositories\Base;

use App\Models\Base\VendorLocation;
use App\Repositories\BaseRepository;

/**
 * Class VendorLocationRepository
 * @package App\Repositories\Base
 * @version October 21, 2021, 2:08 pm UTC
*/

class VendorLocationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'address',
        'city',
        'state',
        'additional_cost',
        'route_trip_id'
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
        return VendorLocation::class;
    }
}

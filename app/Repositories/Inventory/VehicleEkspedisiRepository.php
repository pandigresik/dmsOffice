<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\VehicleEkspedisi;
use App\Repositories\BaseRepository;

/**
 * Class VehicleEkspedisiRepository
 * @package App\Repositories\Inventory
 * @version October 30, 2021, 5:57 am UTC
*/

class VehicleEkspedisiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dms_inv_vehicle_id',
        'dms_inv_carrier_id'
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
        return VehicleEkspedisi::class;
    }
}

<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\TripEkspedisi;
use App\Repositories\BaseRepository;

/**
 * Class TripEkspedisiRepository
 * @package App\Repositories\Inventory
 * @version November 3, 2021, 3:13 pm UTC
*/

class TripEkspedisiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dms_inv_carrier_id',
        'trip_id'
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
        return TripEkspedisi::class;
    }
}

<?php

namespace App\Repositories\Base;

use App\Models\Base\Vehicle;
use App\Repositories\BaseRepository;

/**
 * Class VehicleRepository.
 *
 * @version August 10, 2021, 1:39 pm UTC
 */
class VehicleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number_registration',
        'number_identity',
        'vehicle_group_id',
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
        return Vehicle::class;
    }
}

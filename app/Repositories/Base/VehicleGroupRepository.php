<?php

namespace App\Repositories\Base;

use App\Models\Base\VehicleGroup;
use App\Repositories\BaseRepository;

/**
 * Class VehicleGroupRepository.
 *
 * @version August 10, 2021, 1:38 pm UTC
 */
class VehicleGroupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'capacity',
        'uom',
        'description',
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
        return VehicleGroup::class;
    }
}

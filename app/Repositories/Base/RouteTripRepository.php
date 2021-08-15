<?php

namespace App\Repositories\Base;

use App\Models\Base\RouteTrip;
use App\Repositories\BaseRepository;

/**
 * Class RouteTripRepository.
 *
 * @version August 10, 2021, 1:39 pm UTC
 */
class RouteTripRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'vehicle_group_id',
        'origin',
        'destination',
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
        return RouteTrip::class;
    }
}

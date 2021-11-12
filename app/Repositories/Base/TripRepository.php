<?php

namespace App\Repositories\Base;

use App\Models\Base\Trip;
use App\Repositories\BaseRepository;

/**
 * Class TripRepository.
 *
 * @version November 1, 2021, 8:26 am UTC
 */
class TripRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'origin',
        'origin_place',
        'origin_additional_price',
        'destination',
        'destination_place',
        'destination_additional_price',
        'price',
        'distance',
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
        return Trip::class;
    }
}

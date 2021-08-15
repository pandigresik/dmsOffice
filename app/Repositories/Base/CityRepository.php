<?php

namespace App\Repositories\Base;

use App\Models\Base\City;
use App\Repositories\BaseRepository;

/**
 * Class CityRepository.
 *
 * @version August 10, 2021, 1:38 pm UTC
 */
class CityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return City::class;
    }
}

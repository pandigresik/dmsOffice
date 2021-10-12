<?php

namespace App\Repositories\Base;

use App\Models\Base\Currency;
use App\Repositories\BaseRepository;

/**
 * Class CityRepository.
 *
 * @version August 10, 2021, 1:38 pm UTC
 */
class CurrenciesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country',
        'currency',
        'code',
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
        return Currency::class;
    }
}

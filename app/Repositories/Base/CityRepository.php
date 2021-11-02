<?php

namespace App\Repositories\Base;

use App\Models\Base\City;
use App\Repositories\BaseRepository;

/**
 * Class CityRepository
 * @package App\Repositories\Base
 * @version November 1, 2021, 6:17 am UTC
*/

class CityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'province'
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
        return City::class;
    }    
}

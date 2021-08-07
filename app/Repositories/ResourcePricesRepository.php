<?php

namespace App\Repositories;

use App\Models\ResourcePrices;
use App\Repositories\BaseRepository;

/**
 * Class ResourcePricesRepository
 * @package App\Repositories
 * @version July 8, 2021, 8:50 am UTC
*/

class ResourcePricesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'resource_id',
        'price'
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
        return ResourcePrices::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\Resources;
use App\Repositories\BaseRepository;

/**
 * Class ResourcesRepository
 * @package App\Repositories
 * @version July 8, 2021, 8:50 am UTC
*/

class ResourcesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'grup',
        'name',
        'description',
        'specification'
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
        return Resources::class;
    }
}

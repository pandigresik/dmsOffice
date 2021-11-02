<?php

namespace App\Repositories\Base;

use App\Models\Base\Entity;
use App\Repositories\BaseRepository;

/**
 * Class EntityRepository
 * @package App\Repositories\Base
 * @version November 1, 2021, 6:13 am UTC
*/

class EntityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'internal_code',
        'description'
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
        return Entity::class;
    }
}

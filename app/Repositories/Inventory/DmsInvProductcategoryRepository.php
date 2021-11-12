<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\DmsInvProductcategory;
use App\Repositories\BaseRepository;

/**
 * Class DmsInvProductcategoryRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsInvProductcategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szCategoryTypeId',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated',
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
        return DmsInvProductcategory::class;
    }
}

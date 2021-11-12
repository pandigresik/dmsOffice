<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\DmsInvProductitemcategory;
use App\Repositories\BaseRepository;

/**
 * Class DmsInvProductitemcategoryRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsInvProductitemcategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'intItemNumber',
        'szCategoryTypeId',
        'szCategoryValue',
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
        return DmsInvProductitemcategory::class;
    }
}

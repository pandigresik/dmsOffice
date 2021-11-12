<?php

namespace App\Repositories\Base;

use App\Models\Base\DmsArCustomercategory;
use App\Repositories\BaseRepository;

/**
 * Class DmsArCustomercategoryRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsArCustomercategoryRepository extends BaseRepository
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
        return DmsArCustomercategory::class;
    }
}

<?php

namespace App\Repositories\Base;

use App\Models\Base\DmsArCustomerhierarchy;
use App\Repositories\BaseRepository;

/**
 * Class DmsArCustomerhierarchyRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsArCustomerhierarchyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szParentId',
        'szCode',
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
        return DmsArCustomerhierarchy::class;
    }
}

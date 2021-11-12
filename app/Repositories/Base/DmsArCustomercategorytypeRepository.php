<?php

namespace App\Repositories\Base;

use App\Models\Base\DmsArCustomercategorytype;
use App\Repositories\BaseRepository;

/**
 * Class DmsArCustomercategorytypeRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsArCustomercategorytypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
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
        return DmsArCustomercategorytype::class;
    }
}

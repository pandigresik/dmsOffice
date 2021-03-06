<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\DmsInvUom;
use App\Repositories\BaseRepository;

/**
 * Class DmsInvUomRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsInvUomRepository extends BaseRepository
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
        return DmsInvUom::class;
    }
}

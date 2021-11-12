<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\DmsInvVehicletype;
use App\Repositories\BaseRepository;

/**
 * Class DmsInvVehicletypeRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsInvVehicletypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'decWeight',
        'decVolume',
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
        return DmsInvVehicletype::class;
    }
}

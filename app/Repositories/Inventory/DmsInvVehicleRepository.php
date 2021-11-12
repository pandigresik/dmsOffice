<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\DmsInvVehicle;
use App\Repositories\BaseRepository;

/**
 * Class DmsInvVehicleRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsInvVehicleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szBranchId',
        'szPoliceNo',
        'szChassisNo',
        'szMachineNo',
        'decWeight',
        'decVolume',
        'szVehicleTypeId',
        'dtmVehicleLicense',
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
        return DmsInvVehicle::class;
    }
}

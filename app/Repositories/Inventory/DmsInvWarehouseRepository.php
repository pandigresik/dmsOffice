<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\DmsInvWarehouse;
use App\Repositories\BaseRepository;

/**
 * Class DmsInvWarehouseRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsInvWarehouseRepository extends BaseRepository
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
        'bAllowForSalesTransaction',
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
        return DmsInvWarehouse::class;
    }
}

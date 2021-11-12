<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\DmsInvCarriervehicle;
use App\Repositories\BaseRepository;

/**
 * Class DmsInvCarriervehicleRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsInvCarriervehicleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'intItemNumber',
        'szVehicleNo',
        'szDriverName',
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
        return DmsInvCarriervehicle::class;
    }
}

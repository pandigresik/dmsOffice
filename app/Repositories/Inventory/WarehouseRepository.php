<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\Warehouse;
use App\Repositories\BaseRepository;

/**
 * Class WarehouseRepository
 * @package App\Repositories\Inventory
 * @version August 15, 2021, 3:22 pm UTC
*/

class WarehouseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'internal_code',
        'company_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Warehouse::class;
    }
}

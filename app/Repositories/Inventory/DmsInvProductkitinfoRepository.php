<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\DmsInvProductkitinfo;
use App\Repositories\BaseRepository;

/**
 * Class DmsInvProductkitinfoRepository
 * @package App\Repositories\Inventory
 * @version October 29, 2021, 6:54 am UTC
*/

class DmsInvProductkitinfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szProductId',
        'decQty',
        'szUomId'
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
        return DmsInvProductkitinfo::class;
    }
}

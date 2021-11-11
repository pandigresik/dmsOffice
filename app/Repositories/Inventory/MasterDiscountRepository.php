<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\MasterDiscount;
use App\Repositories\BaseRepository;

/**
 * Class MasterDiscountRepository
 * @package App\Repositories\Inventory
 * @version November 11, 2021, 9:01 pm WIB
*/

class MasterDiscountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'amount_value',
        'amount_procent',
        'start_date',
        'end_date'
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
        return MasterDiscount::class;
    }
}

<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\ProductPriceLog;
use App\Repositories\BaseRepository;

/**
 * Class ProductPriceLogRepository
 * @package App\Repositories\Inventory
 * @version November 10, 2021, 9:37 pm UTC
*/

class ProductPriceLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dms_inv_product_id',
        'price',
        'start_date'
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
        return ProductPriceLog::class;
    }
}

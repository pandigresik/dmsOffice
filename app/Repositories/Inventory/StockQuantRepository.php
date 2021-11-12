<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\StockQuant;
use App\Repositories\BaseRepository;

/**
 * Class StockQuantRepository.
 *
 * @version August 15, 2021, 3:22 pm UTC
 */
class StockQuantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'warehouse_id',
        'quantity',
        'uom_id',
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
        return StockQuant::class;
    }
}

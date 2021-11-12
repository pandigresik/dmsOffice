<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\StockPicking;
use App\Repositories\BaseRepository;

/**
 * Class StockPickingRepository.
 *
 * @version August 15, 2021, 3:22 pm UTC
 */
class StockPickingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'warehouse_id',
        'product_id',
        'stock_picking_type_id',
        'name',
        'quantity',
        'state',
        'table_references',
        'external_references',
        'vendor_id',
        'note',
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
        return StockPicking::class;
    }
}

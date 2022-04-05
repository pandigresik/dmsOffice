<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\ProductStock;
use App\Repositories\BaseRepository;

/**
 * Class ProductStockRepository
 * @package App\Repositories\Inventory
 * @version April 5, 2022, 9:33 pm WIB
*/

class ProductStockRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'first_stock',
        'supplier_in',
        'mutation_in',
        'distribution_in',
        'supplier_out',
        'mutation_out',
        'distribution_out',
        'morphing',
        'last_stock',
        'period',
        'additional_info'
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
        return ProductStock::class;
    }
}

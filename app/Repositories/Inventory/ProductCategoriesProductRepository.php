<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\ProductCategoriesProduct;
use App\Repositories\BaseRepository;

/**
 * Class ProductCategoriesProductRepository.
 *
 * @version November 10, 2021, 12:48 pm UTC
 */
class ProductCategoriesProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'product_categories_id',
        'status',
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
        return ProductCategoriesProduct::class;
    }
}

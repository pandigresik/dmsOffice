<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\ProductCategories;
use App\Repositories\BaseRepository;

/**
 * Class ProductCategoriesRepository
 * @package App\Repositories\Inventory
 * @version November 9, 2021, 2:13 pm UTC
*/

class ProductCategoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
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
        return ProductCategories::class;
    }
}

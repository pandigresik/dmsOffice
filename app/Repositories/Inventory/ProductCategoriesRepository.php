<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\ProductCategories;
use App\Models\Inventory\ProductCategoriesProduct;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductCategoriesRepository.
 *
 * @version November 9, 2021, 2:13 pm UTC
 */
class ProductCategoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
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
        return ProductCategories::class;
    }

    public function update($input, $id)
    {
        DB::beginTransaction();

        try {
            $productCategoriesProducts = $input['productCategoriesProducts'] ?? [];
            $model = parent::update($input, $id);

            if (!empty($productCategoriesProducts)) {
                foreach ($productCategoriesProducts as $key => $vc) {
                    $stateForm = $vc['stateForm'];
                    switch ($stateForm) {
                        case 'insert':
                            $model->productCategoriesProducts()->create($vc);

                            break;
                        case 'update':
                            $obj = ProductCategoriesProduct::find($key);
                            $obj->fill($vc)->save();

                            break;
                        case 'delete':
                            ProductCategoriesProduct ::whereId($key)->delete();

                            break;
                    }
                }
            }

            DB::commit();

            return $model;
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);

            return $e;
        }
    }

    public function create($input)
    {
        DB::beginTransaction();

        try {
            $productCategoriesProducts = $input['productCategoriesProducts'] ?? [];
            $model = parent::create($input);
            if (!empty($productCategoriesProducts)) {
                foreach ($productCategoriesProducts as $key => $vc) {
                    $stateForm = $vc['stateForm'];
                    switch ($stateForm) {
                        case 'insert':
                            $model->productCategoriesProducts()->create($vc);

                            break;
                    }
                }
            }

            DB::commit();

            return $model;
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);

            return $e;
        }
    }
}

<?php

namespace App\Repositories\Base;

use App\Models\Base\DmsInvProduct;
use App\Models\Base\ProductPriceSales;
use App\Repositories\BaseRepository;

/**
 * Class ProductPriceSalesRepository.
 *
 * @version November 10, 2021, 9:37 pm UTC
 */
class ProductPriceSalesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dms_inv_product_id',
        'price',
        'dpp_price',
        'branch_price',
        'start_date',
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
        return ProductPriceSales::class;
    }

    public function create($input)
    {
        // transaction menjadikan cache tidak berjalan dengan baik
        $this->model->getConnection()->transaction(function () use ($input) {
            $model = $this->model->firstOrCreate(['dms_inv_product_id' => $input['dms_inv_product_id']]);
            $product = DmsInvProduct::find($input['dms_inv_product_id']);
            $input['product_id'] = $product->szId;
            $model->fill($input);
            $model->save();

            $priceLog = new ProductPriceSalesLogRepository(app());
            $priceLog->create($input);

            return $model;
        });
    }
}

<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\DmsInvProduct;
use App\Models\Inventory\ProductPrice;
use App\Repositories\BaseRepository;

/**
 * Class ProductPriceRepository.
 *
 * @version November 10, 2021, 9:37 pm UTC
 */
class ProductPriceRepository extends BaseRepository
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
        return ProductPrice::class;
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

            $priceLog = new ProductPriceLogRepository(app());
            $priceLog->create($input);

            return $model;
        });
    }
}

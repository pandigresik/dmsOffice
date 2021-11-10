<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\ProductPrice;
use App\Repositories\BaseRepository;

/**
 * Class ProductPriceRepository
 * @package App\Repositories\Inventory
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
        return ProductPrice::class;
    }

    public function create($input)
    {
        $this->model->getConnection()->transaction(function() use ($input){
            $model = $this->model->firstOrCreate(['dms_inv_product_id' => $input['dms_inv_product_id']]);
            $model->fill($input);
            $model->save();            
            /** insert to log price */
            $priceLog = new ProductPriceLogRepository(app());
            $priceLog->create($input);
            return $model;
        });        
    }
}

<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\ProductPriceLog;
use App\Repositories\BaseRepository;

/**
 * Class ProductPriceLogRepository.
 *
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
        return ProductPriceLog::class;
    }

    public function create($input)
    {
        /** insert to log price */
        $lastPriceLog = $this->model->whereDmsInvProductId($input['dms_inv_product_id'])->orderBy('id', 'desc')->first();
        if ($lastPriceLog) {
            $endDate = new \Carbon\Carbon($input['start_date']);
            $endDate->subDays(1);
            $lastPriceLog->end_date = $endDate;
            $lastPriceLog->save();
        }

        return parent::create($input);
    }
}

<?php

namespace App\Repositories\Sales;

use App\Models\Sales\Discounts;
use App\Repositories\BaseRepository;

/**
 * Class DiscountsRepository
 * @package App\Repositories\Sales
 * @version December 23, 2021, 10:46 am WIB
*/

class DiscountsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jenis',
        'name',
        'start_date',
        'end_date',
        'split',
        'main_dms_inv_product_id',
        'main_quota',
        'bundling_dms_inv_product_id',
        'bundling_quota',
        'max_quota',
        'state'
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
        return Discounts::class;
    }
}

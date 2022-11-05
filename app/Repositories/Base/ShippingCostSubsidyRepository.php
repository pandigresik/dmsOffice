<?php

namespace App\Repositories\Base;

use App\Models\Base\ShippingCostSubsidy;
use App\Repositories\BaseRepository;

/**
 * Class ShippingCostSubsidyRepository
 * @package App\Repositories\Base
 * @version November 5, 2022, 10:26 pm WIB
*/

class ShippingCostSubsidyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'origin_plant_id',
        'amount'
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
        return ShippingCostSubsidy::class;
    }
}

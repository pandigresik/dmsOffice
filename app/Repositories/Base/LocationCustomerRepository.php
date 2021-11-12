<?php

namespace App\Repositories\Base;

use App\Models\Base\LocationCustomer;
use App\Repositories\BaseRepository;

/**
 * Class LocationCustomerRepository.
 *
 * @version October 30, 2021, 5:59 am UTC
 */
class LocationCustomerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dms_ar_customer_id',
        'address',
        'city',
        'state',
        'additional_cost',
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
        return LocationCustomer::class;
    }
}

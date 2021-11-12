<?php

namespace App\Repositories\Base;

use App\Models\Base\ContactCustomer;
use App\Repositories\BaseRepository;

/**
 * Class ContactCustomerRepository.
 *
 * @version October 30, 2021, 5:59 am UTC
 */
class ContactCustomerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dms_ar_customer_id',
        'name',
        'position',
        'email',
        'phone',
        'mobile',
        'description',
        'address',
        'city',
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
        return ContactCustomer::class;
    }
}

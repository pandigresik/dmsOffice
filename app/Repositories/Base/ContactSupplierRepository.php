<?php

namespace App\Repositories\Base;

use App\Models\Base\ContactSupplier;
use App\Repositories\BaseRepository;

/**
 * Class ContactSupplierRepository
 * @package App\Repositories\Base
 * @version October 30, 2021, 5:59 am UTC
*/

class ContactSupplierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dms_ap_supplier_id',
        'name',
        'position',
        'email',
        'phone',
        'mobile',
        'description',
        'address',
        'city'
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
        return ContactSupplier::class;
    }
}

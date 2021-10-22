<?php

namespace App\Repositories\Base;

use App\Models\Base\VendorContact;
use App\Repositories\BaseRepository;

/**
 * Class VendorContactRepository
 * @package App\Repositories\Base
 * @version October 21, 2021, 2:08 pm UTC
*/

class VendorContactRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'position',
        'email',
        'phone',
        'mobile',
        'description',
        'address',
        'city',
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
        return VendorContact::class;
    }
}

<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\ContactEkspedisi;
use App\Repositories\BaseRepository;

/**
 * Class ContactEkspedisiRepository.
 *
 * @version October 30, 2021, 5:57 am UTC
 */
class ContactEkspedisiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dms_inv_carrier_id',
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
        return ContactEkspedisi::class;
    }
}

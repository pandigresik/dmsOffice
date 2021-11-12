<?php

namespace App\Repositories\Base;

use App\Models\Base\DmsArPaymenttype;
use App\Repositories\BaseRepository;

/**
 * Class DmsArPaymenttypeRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsArPaymenttypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szPaymentTypeId',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated',
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
        return DmsArPaymenttype::class;
    }
}

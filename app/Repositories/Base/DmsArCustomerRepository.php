<?php

namespace App\Repositories\Base;

use App\Models\Base\DmsArCustomer;
use App\Repositories\BaseRepository;

/**
 * Class DmsArCustomerRepository
 * @package App\Repositories\Base
 * @version October 29, 2021, 6:54 am UTC
*/

class DmsArCustomerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szHierarchyId',
        'szHierarchyFull',
        'szIDCard',
        'bHasDifferentCollectAddress',
        'szCode',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated',
        'szMCOId'
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
        return DmsArCustomer::class;
    }
}

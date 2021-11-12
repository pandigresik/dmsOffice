<?php

namespace App\Repositories\Base;

use App\Models\Base\DmsArDoccustomer;
use App\Repositories\BaseRepository;

/**
 * Class DmsArDoccustomerRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsArDoccustomerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szDocId',
        'dtmDoc',
        'szCustomerId',
        'szName',
        'bNewCustomer',
        'szIDCard',
        'bHasDifferentCollectAddress',
        'intPrintedCount',
        'szBranchId',
        'szCompanyId',
        'szDocStatus',
        'szHierarchyId',
        'szHierarchyFull',
        'szDocFUpId',
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
        return DmsArDoccustomer::class;
    }
}

<?php

namespace App\Repositories\Base;

use App\Models\Base\DmsPiEmployee;
use App\Repositories\BaseRepository;

/**
 * Class DmsArCustomerRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsPiEmployeeRepository extends BaseRepository
{
    protected $lookupColumnSelect = ['id' => 'szId', 'text' => 'szName'];

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'szId',
        'szName',
        'szDescription',
        'szDivisionId',
        'szDepartmentId',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated',
        'szBranchId',
        'szGender',
        'dtmBirth',
        'dtmJoin',
        'dtmStop',
        'szIdCard',
        'szSupervisorId',
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
        return DmsPiEmployee::class;
    }
}

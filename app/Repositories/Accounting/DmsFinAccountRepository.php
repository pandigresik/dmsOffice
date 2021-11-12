<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\DmsFinAccount;
use App\Repositories\BaseRepository;

/**
 * Class DmsFinAccountRepository.
 *
 * @version October 29, 2021, 6:54 am UTC
 */
class DmsFinAccountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'bCashAccount',
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
        return DmsFinAccount::class;
    }
}

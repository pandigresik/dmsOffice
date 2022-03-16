<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\JournalAccount;
use App\Repositories\BaseRepository;

/**
 * Class JournalAccountRepository.
 *
 * @version January 12, 2022, 2:55 pm WIB
 */
class JournalAccountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'account_id',
        'szBranchId',
        'name',
        'debit',
        'credit',
        'balance',
        'state',
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
        return JournalAccount::class;
    }
}

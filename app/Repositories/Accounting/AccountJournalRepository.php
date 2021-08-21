<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountJournal;
use App\Repositories\BaseRepository;

/**
 * Class AccountJournalRepository
 * @package App\Repositories\Accounting
 * @version August 21, 2021, 2:10 pm UTC
*/

class AccountJournalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'company_id',
        'default_debit_account_id',
        'default_credit_account_id',
        'type'
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
        return AccountJournal::class;
    }
}

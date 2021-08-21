<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountAccount;
use App\Repositories\BaseRepository;

/**
 * Class AccountAccountRepository
 * @package App\Repositories\Accounting
 * @version August 17, 2021, 10:30 pm UTC
*/

class AccountAccountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'company_id',
        'is_off_balance',
        'reconcile',
        'internal_type',
        'internal_group',
        'note'
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
        return AccountAccount::class;
    }
}

<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountType;
use App\Repositories\BaseRepository;

/**
 * Class AccountTypeRepository
 * @package App\Repositories\Accounting
 * @version August 17, 2021, 10:30 pm UTC
*/

class AccountTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'include_initial_balance',
        'type',
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
        return AccountType::class;
    }
}

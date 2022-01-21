<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountBalance;
use App\Repositories\BaseRepository;

/**
 * Class AccountBalanceRepository
 * @package App\Repositories\Accounting
 * @version January 21, 2022, 8:19 am WIB
*/

class AccountBalanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'amount',
        'balance_date'
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
        return AccountBalance::class;
    }
}

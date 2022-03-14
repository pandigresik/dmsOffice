<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\TransferCashBank;
use App\Repositories\BaseRepository;

/**
 * Class TransferCashBankRepository
 * @package App\Repositories\Accounting
 * @version March 14, 2022, 9:37 pm WIB
*/

class TransferCashBankRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type_account',
        'number',
        'transaction_date',
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
        return TransferCashBank::class;
    }
}

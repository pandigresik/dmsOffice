<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountInvoice;
use App\Repositories\BaseRepository;

/**
 * Class AccountInvoiceRepository
 * @package App\Repositories\Accounting
 * @version August 21, 2021, 2:11 pm UTC
*/

class AccountInvoiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'number',
        'amount_total',
        'company_id',
        'vendor_id',
        'account_journal_id',
        'type',
        'references',
        'comment',
        'state',
        'date_invoice',
        'date_due'
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
        return AccountInvoice::class;
    }
}

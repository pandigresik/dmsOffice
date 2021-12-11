<?php

namespace App\Repositories\Finance;

use App\Models\Finance\PaymentLine;
use App\Repositories\BaseRepository;

/**
 * Class PaymentLineRepository.
 *
 * @version December 8, 2021, 9:49 pm WIB
 */
class PaymentLineRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'payment_id',
        'invoice_id',
        'amount',
        'amount_cn',
        'amount_dn',
        'amount_total',
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
        return PaymentLine::class;
    }
}

<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\TransferCashBank;
use App\Repositories\BaseRepository;

/**
 * Class BkbDiscountsRepository.
 *
 * @version December 31, 2021, 9:22 pm WIB
 */
class SummaryCostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [];

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
        return  TransferCashBank::class;
    }

    public function list($startDate, $endDate)
    {
        $data = $this->model->with(['transferCashBankDetails'])
            ->whereBetween('transaction_date', [$startDate, $endDate])
            ->whereType('KK')
            ->orderBy('transaction_date')
            ->get()
        ;

        return [
            'data' => $data,
        ];
    }
}

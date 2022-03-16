<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\CashFlowAccount;
use App\Repositories\BaseRepository;

/**
 * Class BkbDiscountsRepository.
 *
 * @version December 31, 2021, 9:22 pm WIB
 */
class CashFlowRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return CashFlowAccount::class;
    }

    public function list($startDate, $endDate)
    {
        return $this->model->list($startDate, $endDate);
    }
}

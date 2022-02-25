<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountBalance;
use App\Models\Accounting\CashFlowAccount;
use App\Models\Accounting\JournalAccount;
use App\Models\Accounting\ReportSettingAccount;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

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

<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountBalance;
use App\Models\Accounting\JournalAccount;
use App\Models\Accounting\ReportSettingAccount;
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
    private $groupCode = 'LCF';

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
        return JournalAccount::class;
    }

    public function list($startDate, $endDate)
    {
        $listAccount = $this->listAccount();
        $data = [];
        JournalAccount::selectRaw("account_id, sum(balance) as balance, (DATE_FORMAT(date, '%m-%Y')) as month_year")
            ->disableModelCaching()
            ->whereBetween('date', [$startDate, $endDate])
            ->whereIn('account_id', $this->cashFlowAccountCode($listAccount))
            ->groupBy('account_id')
            ->groupByRaw(\DB::raw("DATE_FORMAT(date, '%m-%Y')"))
            ->get()            
            ->map(function($item) use (&$data){
                $data[$item->account_id][$item->month_year] = $item;
            })
        ;
        
        return [
            'data' => $data,
            //'saldo' => $this->getSaldo($startDate, $listAccount),
            'listAccount' => $listAccount,
        ];
    }

    private function listAccount()
    {
        return ReportSettingAccount::with(['details' => function ($q) {
            $q->select(['report_setting_account_detail.*', 'account.code', 'account.name'])->join('account', 'account.id', '=', 'report_setting_account_detail.account_id');
        }])->orderBy('code')->whereGroupType($this->groupCode)->get();
    }

    private function getSaldo($startDate, $listAccount)
    {
        return AccountBalance::whereBalanceDate($startDate)
            ->whereIn('code', $this->cashFlowAccountCode($listAccount))
            ->get()->keyBy('code');
    }

    private function cashFlowAccountCode($listAccount)
    {
        $result = [];
        $listAccount->map(function ($item) use (&$result) {
            $result = array_merge($result, $item->details->pluck('code')->toArray());
        });

        return $result;
    }
}

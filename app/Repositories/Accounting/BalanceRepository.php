<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountBalance;
use App\Models\Accounting\DmsCasCashbalance;
use App\Models\Accounting\JournalAccount;
use App\Models\Accounting\JournalAccountDetail;
use App\Models\Accounting\ReportSettingAccount;
use App\Repositories\BaseRepository;

/**
 * Class BkbDiscountsRepository.
 *
 * @version December 31, 2021, 9:22 pm WIB
 */
class BalanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
    ];
    private $groupCode = 'NRC';

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
        $data = JournalAccount::with(['account'])->selectRaw('account_id, sum(balance) as balance')
            ->disableModelCaching()
            ->whereBetween('date', [$startDate, $endDate])
            ->whereIn('account_id', $this->balanceAccountCode($listAccount))
            ->groupBy('account_id')
            ->get()
            ->keyBy('account_id')
        ;

        return [
            'data' => $data,
            'saldo' => $this->getSaldo($startDate, $listAccount),
            'listAccount' => $listAccount,
        ];
    }

    public function detail($startDate, $endDate, $accountCode)
    {
        $query = JournalAccountDetail::select(['account_id', 'date', 'additional_info'])        
            ->disableModelCaching()
            ->whereBetween('date', [$startDate, $endDate])
            ->where('account_id', $accountCode)
            ->orderBy('date')
        ;

        // if (!empty($branch)) {
        //     $query->where(['szBranchId' => $branch]);
        // }
        $data = $query->get();
        return [
            'data' => $data,            
            'manual' => $this->getManualJournal($startDate, $endDate, $accountCode) 
            // 'saldo' => $this->getSaldoAccount($startDate, $accountCode),
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
            ->whereIn('code', $this->balanceAccountCode($listAccount))
            ->get()->keyBy('code');
    }

    private function getSaldoAccount($startDate, $accountCode)
    {
        return AccountBalance::whereBalanceDate($startDate)
            ->where('code', $accountCode)
            ->first()
        ;
    }

    private function balanceAccountCode($listAccount)
    {
        $result = [];
        $listAccount->map(function ($item) use (&$result) {
            $result = array_merge($result, $item->details->pluck('code')->toArray());
        });

        return $result;
    }

    private function getManualJournal($startDate, $endDate, $accountCode){
        $query = JournalAccount::select(['account_id', 'date', 'branch_id', 'name', 'reference', 'debit', 'credit', 'balance'])        
            ->disableModelCaching()
            ->whereBetween('date', [$startDate, $endDate])
            ->where('account_id', $accountCode)
            ->where('type', 'JM')
            ->orderBy('date')
        ;

        return $query->get();
    }
}

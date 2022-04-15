<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountBalance;
use App\Models\Accounting\DmsCasCashbalance;
use App\Models\Accounting\JournalAccount;
use App\Models\Accounting\ReportSettingAccount;
use App\Repositories\BaseRepository;

/**
 * Class BkbDiscountsRepository.
 *
 * @version December 31, 2021, 9:22 pm WIB
 */
class GeneralLedgerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
    ];
    private $groupCode = 'GL';

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

    public function list($startDate, $endDate, $branch)
    {
        $listAccount = $this->listAccount();
        $query = JournalAccount::with(['account'])->selectRaw('account_id, sum(debit) as debit, sum(credit) as credit')
            ->disableModelCaching()
            ->whereBetween('date', [$startDate, $endDate])
            ->whereIn('account_id', $this->accountCode($listAccount))
            ->groupBy('account_id')
        ;
        if (!empty($branch)) {
            $query->where(['branch_id' => $branch]);
        }
        $data = $query->get()->keyBy('account_id');

        return [
            'data' => $data,
            'saldo' => $this->getSaldo($startDate, $listAccount),
            'listAccount' => $listAccount,
        ];
    }

    public function detail($startDate, $endDate, $accountCode, $branch)
    {
        $query = DmsCasCashbalance::select(['szAccountId as account_id', 'decDebit as debit', 'decCredit as credit', 'decAmount as balance', 'szDocId as reference', 'szDescription as description', 'szVoucherNo as voucher'])
        // $query = JournalAccount::with(['account'])->select(['account_id', 'debit', 'credit', 'date', 'name', 'reference','dms_cas_cashbalance.szDescription as description','dms_cas_cashbalance.szVoucherNo as voucher'])
            ->disableModelCaching()
            ->whereBetween('dtmDoc', [$startDate, $endDate])
            ->where('szAccountId', $accountCode)
            ->orderBy('dtmDoc')
        ;

        if (!empty($branch)) {
            $query->where(['szBranchId' => $branch]);
        }
        $data = $query->get();

        return [
            'data' => $data,
            'saldo' => $this->getSaldoAccount($startDate, $accountCode),
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
            ->whereIn('code', $this->accountCode($listAccount))
            ->get()->keyBy('code');
    }

    private function getSaldoAccount($startDate, $accountCode)
    {
        return AccountBalance::whereBalanceDate($startDate)
            ->where('code', $accountCode)
            ->first()
        ;
    }

    private function accountCode($listAccount)
    {
        $result = [];
        $listAccount->map(function ($item) use (&$result) {
            $result = array_merge($result, $item->details->pluck('code')->toArray());
        });

        return $result;
    }
}

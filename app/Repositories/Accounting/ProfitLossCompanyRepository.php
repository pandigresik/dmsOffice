<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\JournalAccount;
use App\Models\Accounting\ReportSettingAccount;
use App\Models\Base\DmsSmBranch;
use App\Repositories\BaseRepository;

/**
 * Class BkbDiscountsRepository.
 *
 * @version December 31, 2021, 9:22 pm WIB
 */
class ProfitLossCompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
    ];
    private $groupCode = 'LRC';

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

        $data = JournalAccount::with(['account'])->selectRaw('account_id, sum(debit) as debit, sum(credit) as credit, sum(balance) as balance')
            ->disableModelCaching()
            ->whereBetween('date', [$startDate, $endDate])            
            ->whereIn('account_id', $this->profitLossAccountCode($listAccount))
            ->groupBy('account_id')
            // ->groupBy('branch_id')
            // ->union($claimTiv)
            ->get()
            ->keyBy('account_id')
        ;

        return [
            'data' => $data,
            //'branchMaster' => DmsSmBranch::whereIn('szId',$branchId)->get()->keyBy('szId'),
            'listAccount' => $listAccount,
        ];
    }

    private function totalPendapatanUsaha($startDate, $endDate){
        $listAccountPendapatanUsaha = $this->listAccountPendapatanUsaha();
        $claimTiv = JournalAccount::with(['account'])->selectRaw('branch_id, \'919901\' as account_id, sum(debit) as debit, sum(credit) as credit, abs(sum(balance)) as balance')
            ->disableModelCaching()
            ->whereBetween('date',[$startDate, $endDate])            
            ->whereIn('account_id', ['411011','411111'])
            ->groupBy('account_id')
            ->groupBy('branch_id');
        $data = JournalAccount::with(['account'])->selectRaw('account_id, sum(debit) as debit, sum(credit) as credit, sum(balance) as balance')
            ->disableModelCaching()
            ->whereBetween('date', [$startDate, $endDate])            
            ->whereIn('account_id', $this->profitLossAccountCode($listAccountPendapatanUsaha))
            ->groupBy('account_id')           
            ->union($claimTiv)
            ->get()
            ->keyBy('account_id')
        ;
    }
    private function listAccount()
    {
        return ReportSettingAccount::with(['details' => function ($q) {
            $q->select(['report_setting_account_detail.*', 'account.code', 'account.name'])->join('account', 'account.id', '=', 'report_setting_account_detail.account_id');
        }])->orderBy('code')->whereGroupType($this->groupCode)->get();
    }

    private function listAccountPendapatanUsaha()
    {
        return ReportSettingAccount::with(['details' => function ($q) {
            $q->select(['report_setting_account_detail.*', 'account.code', 'account.name'])->join('account', 'account.id', '=', 'report_setting_account_detail.account_id');
        }])->orderBy('code')->whereIn('group_type',['LR-01', 'LR-02', 'LR-05'])->get();
    }

    private function profitLossAccountCode($listAccount)
    {
        $result = [];
        $listAccount->map(function ($item) use (&$result) {
            $result = array_merge($result, $item->details->pluck('code')->toArray());
        });

        return $result;
    }
}

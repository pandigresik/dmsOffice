<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\JournalAccount;
use App\Models\Accounting\ReportSettingAccount;
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

    // public function list($startDate, $endDate)
    // {
    //     $listAccount = $this->listAccount();
    //     $data = JournalAccount::with(['account'])->selectRaw('account_id, sum(balance) as balance')
    //         ->disableModelCaching()
    //         ->whereBetween('date', [$startDate, $endDate])
    //         ->whereIn('account_id', $this->profitLossAccountCode($listAccount))
    //         ->groupBy('account_id')
    //         ->get()
    //         ->keyBy('account_id')
    //     ;

    //     return [
    //         'data' => $data,
    //         'pendapatanUsaha' => $this->totalPendapatanUsaha($startDate, $endDate),
    //         'hppPabrik' => $this->totalHppPabrik($startDate, $endDate),
    //         'listAccount' => $listAccount,
    //     ];
    // }

    public function list($startDate, $endDate)
    {                
        $excludeAccount = ['HPPP'];
        $listAccount = $this->listAccount($excludeAccount);

        $claimTiv = JournalAccount::with(['account'])->selectRaw('\'919901\' as account_id, abs(sum(balance)) as balance')
            ->disableModelCaching()
            ->whereBetween('date', [$startDate, $endDate])            
            ->whereIn('account_id', ['411011', '411111', '411016','411116'])
            ->groupBy('account_id')
            // ->groupBy('branch_id')
        ;

        $data = JournalAccount::with(['account'])
            //->selectRaw('branch_id, account_id, sum(case when type=\'JM\' then (-1 * balance) else balance end) as balance')
            ->selectRaw('account_id, sum(balance) as balance')
            ->disableModelCaching()
            ->whereBetween('date', [$startDate, $endDate])            
            ->whereIn('account_id', $this->profitLossAccountCode($listAccount))
            ->whereNotIn('account_id', $excludeAccount)
            ->groupBy('account_id')
            // ->groupBy('branch_id')
            ->union($claimTiv)
            ->get()
            // ->groupBy('branch_id')
        ;

        return [
            'data' => $data,            
            'listAccount' => $listAccount,
            'excludeAccount' => $excludeAccount,
        ];
    }    

    private function listAccount($excludeAccount)
    {
        return ReportSettingAccount::with(['details' => function ($q) use ($excludeAccount) {
            $q->select(['report_setting_account_detail.*', 'account.code', 'account.name'])
                ->join('account', 'account.id', '=', 'report_setting_account_detail.account_id')
                ->whereNotIn('report_setting_account_detail.account_id', $excludeAccount)
            ;
        }])->orderBy('code')->whereGroupType($this->groupCode)->get();
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

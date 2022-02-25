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
class ProfitLossRepository extends BaseRepository
{
    private $groupCode = 'LR';
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
        return JournalAccount::class;
    }

    public function list($startDate, $endDate, $branchId)
    {
        $listAccount = $this->listAccount();
        $claimTiv = JournalAccount::with(['account'])->selectRaw('branch_id, \'919901\' as account_id, abs(sum(balance)) as balance')
            ->disableModelCaching()
            ->whereBetween('date',[$startDate, $endDate])
            ->whereIn('branch_id',$branchId)            
            ->whereIn('account_id', ['411011','411111'])
            ->groupBy('account_id')
            ->groupBy('branch_id');
        
        $data = JournalAccount::with(['account'])
            //->selectRaw('branch_id, account_id, sum(case when type=\'JM\' then (-1 * balance) else balance end) as balance')
            ->selectRaw('branch_id, account_id, sum(balance) as balance')
            ->disableModelCaching()                 
            ->whereBetween('date',[$startDate, $endDate])
            ->whereIn('branch_id',$branchId)            
            ->whereIn('account_id', $this->profitLossAccountCode($listAccount))
            ->groupBy('account_id')
            ->groupBy('branch_id')            
            ->union($claimTiv)
            ->get()
            ->groupBy('branch_id');
        return [
            'data' => $data,
            'branchMaster' => DmsSmBranch::whereIn('szId',$branchId)->get()->keyBy('szId'),
            'listAccount' => $listAccount
        ];
    }

    private function listAccount(){    
        return ReportSettingAccount::with(['details' => function($q){
            $q->select(['report_setting_account_detail.*','account.code','account.name'])->join('account', 'account.id', '=', 'report_setting_account_detail.account_id');
        }])->orderBy('code')->whereGroupType($this->groupCode)->get();
    }

    private function profitLossAccountCode($listAccount){
        $result = [];
        $listAccount->map(function($item) use (&$result){
            $result = array_merge($result, $item->details->pluck('code')->toArray());
        });

        return $result;
    }
}

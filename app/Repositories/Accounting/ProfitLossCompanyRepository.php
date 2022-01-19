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

        $data = JournalAccount::with(['account'])->selectRaw('account_id, sum(balance) as balance')
            ->disableModelCaching()
            ->whereBetween('date', [$startDate, $endDate])            
            ->whereIn('account_id', $this->profitLossAccountCode($listAccount))
            ->groupBy('account_id')            
            ->get()
            ->keyBy('account_id')
        ;

        return [
            'data' => $data,
            'pendapatanUsaha' => $this->totalPendapatanUsaha($startDate, $endDate),
            'hppPabrik' => $this->totalHppPabrik($startDate, $endDate),
            'listAccount' => $listAccount,
        ];
    }

    private function totalPendapatanUsaha($startDate, $endDate){
        $listAccountPendapatanUsaha = $this->listAccountPendapatanUsaha();        
        return JournalAccount::whereBetween('date', [$startDate, $endDate])            
            ->disableModelCaching()
            ->whereIn('account_id', array_diff($this->profitLossAccountCode($listAccountPendapatanUsaha), ['411011','411111']))                                 
            ->sum('balance')            
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
        }])->orderBy('code')->whereIn('code',['LR-01', 'LR-02', 'LR-05'])->get();
    }

    private function profitLossAccountCode($listAccount)
    {
        $result = [];
        $listAccount->map(function ($item) use (&$result) {
            $result = array_merge($result, $item->details->pluck('code')->toArray());
        });

        return $result;
    }

    private function totalHppPabrik($startDate, $endDate){

        return 90900000;
    }
}

/**
select b.szDocId, a.dtmDoc, b.szProductId, b.szOrderItemTypeId, b.szTrnType 
	, b.decQty * (select ppl.price from product_price_log ppl
join dms_inv_product d on d.iInternalId = ppl.dms_inv_product_id and d.szId = b.szProductId 
where ppl.start_date <= a.dtmDoc and (ppl.end_date is null or ppl.end_date >= a.dtmDoc))
as hpp
from dms_sd_docdo a
join dms_sd_docdoitem b on a.szDocId  = b.szDocId
where a.dtmDoc between '2021-11-01' and '2021-11-30'



 */
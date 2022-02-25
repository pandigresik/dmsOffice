<?php

namespace App\Models\Accounting;

use Carbon\Carbon;

class CashFlowAccount extends JournalAccount
{    
    private $groupCode = 'LCF';
    private $pengaliGroup = [
        'LCF-01' => 1,
        'LCF-02' => 1,
        'LCF-03' => -1,
        'LCF-04' => -1,
    ];
    public function calcStartingBalance($balanceDate){
        $result = 0;
        $dateObj = Carbon::createFromFormat('Y-m-d', $balanceDate)->subMonth();
        $lastDateMonth = $dateObj->endOfMonth()->format('Y-m-d');
        $firstDateMonth = $dateObj->format('Y-m-').'01'; 
        $data = $this->list($firstDateMonth, $lastDateMonth);
        $listAccount = $data['listAccount'];
        $amountAccount = $data['data'];
        
        foreach($listAccount as $group){            
            foreach($group->details as $account){
                $amount = 0;
                if(isset($amountAccount[$account->code])){
                    $amount = $amountAccount[$account->code][$dateObj->format('m-Y')]->amount ?? 0;
                }
                $result += $this->pengaliGroup[$group->code] * $amount;
            }
        }
        return $result;
    }

    public function list($startDate, $endDate)
    {
        $firstDateMonth = substr($startDate, 0, 8).'01';
        $lastDateMonth = substr($endDate,0,8).'01';
        $saldo = $this->getSaldo($firstDateMonth, $lastDateMonth);
        $coaPendapatanLain2 = '919900';
        $listAccount = $this->listAccount();
        $data = [];

        if(!empty($saldo)){
            $data = array_merge($data, $saldo);
        }
        
        JournalAccount::selectRaw("account_id, sum(case when account_id = '$coaPendapatanLain2' then -1 * balance else balance end) as balance, (DATE_FORMAT(date, '%m-%Y')) as month_year")
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
            'listAccount' => $listAccount,
        ];
    }

    private function listAccount()
    {
        return ReportSettingAccount::with(['details' => function ($q) {
            $q->select(['report_setting_account_detail.*', 'account.code', 'account.name'])->join('account', 'account.id', '=', 'report_setting_account_detail.account_id');
        }])->orderBy('code')->whereGroupType($this->groupCode)->get();
    }

    private function getSaldo($startDate, $endDate)
    {        
        $data = [];
        // $startDateObj = Carbon::createFromFormat('Y-m-d', $startDate);
        // $endDateObj = Carbon::createFromFormat('Y-m-d', $endDate);
        // while($startDateObj <= $endDateObj){
        //     $data['SAAK'][$startDateObj->format('M-Y')] = 0;
        //     $startDateObj->addMonth();
        // }
        AccountBalance::selectRaw("code as account_id, amount as balance, (DATE_FORMAT(balance_date, '%m-%Y')) as month_year")
            ->disableModelCaching()
            ->whereBetween('balance_date', [$startDate, $endDate])
            ->where('code', 'SAAK')            
            ->get()
            ->map(function($item) use (&$data){
                $data[$item->account_id][$item->month_year] = $item;
            });

        return $data;
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

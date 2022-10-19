<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\AccountBalance;
use App\Models\Accounting\DmsCasCashbalance;
use App\Models\Accounting\JournalAccount;
use App\Models\Accounting\JournalAccountDetail;
use App\Models\Accounting\ReportSettingAccount;
use App\Models\Purchase\Invoice;
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

    public function detail($startDate, $endDate, $accountCode, $branchId)
    {
        $query = JournalAccountDetail::select(['account_id', 'date', 'additional_info'])        
            ->disableModelCaching()
            ->whereBetween('date', [$startDate, $endDate])
            ->where(['account_id' => $accountCode])            
            ->orderBy('date')
        ;
        if(!empty($branchId)){
            $query->whereIn('branch_id', $branchId);
        }
        $data = $query->get();
        return [
            'data' => $data,            
            'manual' => $this->getManualJournal($startDate, $endDate, $accountCode, $branchId) 
            // 'saldo' => $this->getSaldoAccount($startDate, $accountCode),
        ];
    }

    public function detailHutangTIV($startDate, $endDate, $accountCode, $branchId){
        $sqlBayar = <<<SQL
        select p.pay_date, i.amount , (select sum(amount) from debit_credit_note where invoice_id = i.id and reference = 'PROGRAM TIV' group by invoice_id ) as klaim_tiv
        , (select sum(amount) from debit_credit_note where invoice_id = i.id and reference = 'POT HARGA' group by invoice_id ) as pot_harga
        from invoice i
        join payment_line pl on pl.invoice_id = i.id
        join payment p on p.id = pl.payment_id and p.pay_date between '{$startDate}' and '{$endDate}'
        where i.partner_type = 'supplier' and i.`type` = 'in'        
SQL;        
        $pembayaran = $this->model->fromQuery($sqlBayar);
        return [
            'invoices' => Invoice::wherePartnerType('supplier')->whereBetween('date_invoice',[$startDate, $endDate])->where(['type' => 'in'])->with(['invoiceLines','invoiceBkb'])->get(),
            'pembayarans' => $pembayaran
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

    private function getManualJournal($startDate, $endDate, $accountCode, $branchId){
        $query = JournalAccount::select(['account_id', 'date', 'branch_id', 'name', 'reference', 'debit', 'credit', 'balance'])        
            ->disableModelCaching()
            ->whereBetween('date', [$startDate, $endDate])
            ->where(['account_id' => $accountCode])
            ->whereIn('branch_id', $branchId)
            ->where('type', 'JM')
            ->orderBy('date')
        ;

        return $query->get();
    }
}

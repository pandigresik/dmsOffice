<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="AccountBalance",
 *      required={"code", "amount", "balance_date"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="code",
 *          description="code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="balance_date",
 *          description="balance_date",
 *          type="string",
 *          format="date"
 *      )
 * )
 */
class AccountBalance extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'account_balance';

    public $fillable = [
        'code',
        'amount',
        'balance_date',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'balance_date' => 'required',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'amount' => 'decimal:2',
        'balance_date' => 'date',
    ];

    /**
     * Get the account that owns the AccountBalance.
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'code', 'code');
    }

    // public function getAmountAttribute($value){

    //     return localNumberFormat($value);
    // }

    public function copyBalance($balanceDate)
    {
        $lastDayPreviousMonth = \Carbon\Carbon::createFromFormat('Y-m-d', $balanceDate)->subDay()->format('Y-m-d');
        $firstDayPreviousMonth = substr($lastDayPreviousMonth, 0, 8).'01';
        $cashFlow = new CashFlowAccount();
        $cashFlowBalance = str_replace(',', '.', $cashFlow->calcStartingBalance($balanceDate));
        $sql = <<<SQL
            insert into {$this->getTable()} (code, amount, balance_date, created_at) 
            SELECT ac.code
                , coalesce((select amount from account_balance where account_balance.code = ac.code and balance_date = '{$firstDayPreviousMonth}'),0) + (select coalesce(sum(balance),0) from journal_account where journal_account.account_id = ac.code and date between '{$firstDayPreviousMonth}' and '{$lastDayPreviousMonth}')
                , '{$balanceDate}' as balance_date
                , now()
            FROM account ac
            where ac.has_balance = 1 and ac.deleted_at is null
            union all
            Select 'SAAK' as code , '{$cashFlowBalance}' as amount, '{$balanceDate}' as balance_date, now()
            union all 
            SELECT ac.code
                , coalesce((select amount from account_balance where account_balance.code = ac.code and balance_date = '{$firstDayPreviousMonth}'),0) + (select coalesce(sum(case when type = 'KM' then transfer_cash_bank_detail.amount else -transfer_cash_bank_detail.amount end),0) from transfer_cash_bank join transfer_cash_bank_detail on transfer_cash_bank_detail.transfer_cash_bank_id = transfer_cash_bank.id where transfer_cash_bank.type_account = ac.code and transfer_cash_bank.transaction_date between '{$firstDayPreviousMonth}' and '{$lastDayPreviousMonth}')
                , '{$balanceDate}' as balance_date
                , now()
            FROM account ac
            where ac.code in ('kas_kecil','kas_besar','giro') and ac.deleted_at is null           
        SQL;
        $this->fromQuery($sql);
    }

    public function getBalanceDateAttribute($value)
    {
        return localFormatDate($value);
    }

    private function listAccount()
    {
        return ReportSettingAccount::with(['details' => function ($q) {
            $q->select(['report_setting_account_detail.*', 'account.code', 'account.name'])->join('account', 'account.id', '=', 'report_setting_account_detail.account_id');
        }])->orderBy('code')->whereGroupType('NRC')->get();
    }

    private function balanceAccountCode()
    {
        $result = [];
        $listAccount = $this->listAccount();
        $listAccount->map(function ($item) use (&$result) {
            $result = array_merge($result, $item->details->pluck('code')->toArray());
        });

        return $result;
    }
}

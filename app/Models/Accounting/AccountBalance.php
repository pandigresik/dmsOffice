<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public $table = 'account_balance';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    

    public $fillable = [
        'code',
        'amount',
        'balance_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'amount' => 'decimal:2',
        'balance_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [        
        'balance_date' => 'required'
    ];

    /**
     * Get the account that owns the AccountBalance
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'code', 'code');
    }

    // public function getAmountAttribute($value){

    //     return localNumberFormat($value);
    // }

    public function copyBalance($balanceDate){
        $lastDayPreviousMonth = \Carbon\Carbon::createFromFormat('Y-m-d', $balanceDate)->subDay()->format('Y-m-d');
        $firstDayPreviousMonth = substr($lastDayPreviousMonth, 0, 8).'01';        

        $sql = <<<SQL
            insert into {$this->getTable()} (code, amount, balance_date) 
            SELECT ac.code
                , coalesce((select amount from account_balance where account_balance.code = ac.code and balance_date = '{$firstDayPreviousMonth}'),0) + (select coalesce(sum(balance),0) from journal_account where journal_account.account_id = ac.code and date between '{$firstDayPreviousMonth}' and '{$lastDayPreviousMonth}')
                , '{$balanceDate}' as balance_date
            FROM report_setting_account rst
            join report_setting_account_detail rstd on rstd.report_setting_account_id = rst.id            
            join account ac on ac.id = rstd.account_id
            where rst.group_type in ('NRC')            
        SQL;
        $this->fromQuery($sql);
    }

    private function listAccount()
    {
        return ReportSettingAccount::with(['details' => function ($q) {
            $q->select(['report_setting_account_detail.*', 'account.code', 'account.name'])->join('account', 'account.id', '=', 'report_setting_account_detail.account_id');
        }])->orderBy('code')->whereGroupType('NRC')->get();
    }    

    private function balanceAccountCode(){
        $result = [];
        $listAccount = $this->listAccount();
        $listAccount->map(function($item) use (&$result){
            $result = array_merge($result, $item->details->pluck('code')->toArray());
        });

        return $result;
    }
    
    public function getBalanceDateAttribute($value){

        return localFormatDate($value);
    }
}

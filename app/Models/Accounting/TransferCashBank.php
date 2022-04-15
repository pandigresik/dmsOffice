<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="TransferCashBank",
 *      required={"type_account", "number", "transaction_date", "type"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="type_account",
 *          description="type_account",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="number",
 *          description="number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="transaction_date",
 *          description="transaction_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      )
 * )
 */
class TransferCashBank extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'transfer_cash_bank';

    public $fillable = [
        'type_account',
        'number',
        'transaction_date',
        'type',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'type_account' => 'required|string|max:10',
        //  'number' => 'required|string|max:15',
        'transaction_date' => 'required',
        'type' => 'required|string|max:5',
        'transfer_cash_bank_detail' => 'required',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type_account' => 'string',
        'number' => 'string',
        'transaction_date' => 'date',
        'type' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transferCashBankDetails()
    {
        return $this->hasMany(\App\Models\Accounting\TransferCashBankDetail::class, 'transfer_cash_bank_id');
    }

    public function sumDetails()
    {
        return $this->transferCashBankDetails()->groupBy('type_account')->sum('amount');
    }

    public function getNextNumber($type)
    {
        $monthCode = chr(65 + intval(date('m')));
        $pattern = $type.'/'.date('y').$monthCode.'/';
        $columnReference = 'number';
        $sequenceLength = 4;
        $nextId = $this->where($columnReference, 'like', $pattern.'%')->max($columnReference);
        $nextId = !$nextId ? 1 : intval(substr($nextId, strlen($nextId) - $sequenceLength)) + 1;
        $newId = [$pattern, str_pad($nextId, $sequenceLength, '0', STR_PAD_LEFT)];

        return implode('', $newId);
    }

    public function getTransactionDateAttribute($value)
    {
        return localFormatDate($value);
    }
}

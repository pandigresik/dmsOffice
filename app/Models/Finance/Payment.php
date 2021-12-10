<?php

namespace App\Models\Finance;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Payment",
 *      required={"number", "type", "reference", "state", "estimate_date", "pay_date", "amount"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="number",
 *          description="number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="reference",
 *          description="reference",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="estimate_date",
 *          description="estimate_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="pay_date",
 *          description="pay_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="number"
 *      )
 * )
 */
class Payment extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'payment';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const READY_PAY = 'ready_pay';
    const PAY = 'pay';
    const TYPE = 'OUT';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'number',
        'type',
        'reference',
        'state',
        'estimate_date',
        'pay_date',
        'amount'        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'number' => 'string',
        'type' => 'string',
        'reference' => 'string',
        'state' => 'string',
        'estimate_date' => 'date',
        'pay_date' => 'date',
        'amount' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'number' => 'required|string|max:30',
        // 'type' => 'required|string',
        // 'reference' => 'required|string|max:255',
        // 'state' => 'required|string|max:10',
        // 'estimate_date' => 'required',
        // 'pay_date' => 'required',
        'amount' => 'required|numeric|min:1'
    ];
    
    public function scopeReadyToPay($query)
    {
        return $query->whereState(self::READY_PAY);
    }

    public function scopePay($query)
    {
        return $query->whereState(self::PAY);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function paymentLines()
    {
        return $this->hasMany(\App\Models\Finance\PaymentLine::class, 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasManyThrough(\App\Models\Purchase\Invoice::class, \App\Models\Finance\PaymentLine::class, 'payment_id', 'id', 'id', 'invoice_id');
    }

    /**
    * $type = IN or OUT
     */
    public function getNextNumber()
    {
        $pattern = 'PAY/'.self::TYPE.'/'.date('Ym').'/';
        $columnReference = 'number';
        $sequenceLength = 5;
        $nextId = $this->where($columnReference, 'like', $pattern.'%')->max($columnReference);
        $nextId = !$nextId ? 1 : intval(substr($nextId, strlen($nextId) - $sequenceLength)) + 1;
        $newId = [$pattern, str_pad($nextId, $sequenceLength, '0', STR_PAD_LEFT)];

        return implode('', $newId);
    }

    public function getEstimateDateAttribute($value)
    {
        return localFormatDate($value);
    }

    public function getPayDateAttribute($value)
    {
        return localFormatDate($value);
    }

    public function getAmountAttribute($value)
    {
        return localNumberFormat($value);
    }

    public function defaultType(){

        return self::TYPE;
    }
}

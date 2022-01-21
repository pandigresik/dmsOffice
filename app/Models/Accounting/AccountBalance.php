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

    public $connection = "mysql_sejati";

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
        'code' => 'required|string|max:10',
        'amount' => 'required|numeric',
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
    
}

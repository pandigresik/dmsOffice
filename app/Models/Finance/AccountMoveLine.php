<?php

namespace App\Models\Finance;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="AccountMoveLine",
 *      required={"account_move_id", "name", "account_id", "debit", "credit", "balance"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="account_move_id",
 *          description="account_move_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="account_id",
 *          description="account_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="debit",
 *          description="debit",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="credit",
 *          description="credit",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="balance",
 *          description="balance",
 *          type="number",
 *          format="number"
 *      )
 * )
 */
class AccountMoveLine extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'account_move_line';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'account_move_id',
        'name',
        'description',
        'account_id',
        'debit',
        'credit',
        'balance'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'account_move_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'account_id' => 'string',
        'debit' => 'decimal:2',
        'credit' => 'decimal:2',
        'balance' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'account_move_id' => 'required',
        'name' => 'required|string|max:100',
        'description' => 'nullable|string|max:256',
        'account_id' => 'required|string|max:255',
        'debit' => 'required|numeric',
        'credit' => 'required|numeric',
        'balance' => 'required|numeric'
    ];

    public function getDebitAttribute($value)
    {    
        return localNumberFormat($value);
    }

    public function getCreditAttribute($value)
    {    
        return localNumberFormat($value);
    }

    public function getBalanceAttribute($value)
    {    
        return localNumberFormat($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function accountMove()
    {
        return $this->belongsTo(\App\Models\Finance\AccountMove::class, 'account_move_id');
    }
}

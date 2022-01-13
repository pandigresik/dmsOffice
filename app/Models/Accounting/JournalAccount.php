<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="JournalAccount",
 *      required={"account_id", "branch_id", "name", "debit", "credit", "balance"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="account_id",
 *          description="account_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="branch_id",
 *          description="branch_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
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
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="string"
 *      )
 * )
 */
class JournalAccount extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'journal_account';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    

    public $fillable = [
        'account_id',
        'branch_id',
        'date',
        'name',
        'debit',
        'credit',
        'balance',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'account_id' => 'string',
        'branch_id' => 'string',
        'name' => 'string',
        'debit' => 'decimal:2',
        'credit' => 'decimal:2',
        'balance' => 'decimal:2',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'account_id' => 'required|string|max:15',
        'branch_id' => 'required|string|max:50',
        'name' => 'required|string|max:100',
        'debit' => 'required|numeric',
        'credit' => 'required|numeric',
        'balance' => 'required|numeric',
        'state' => 'nullable|string|max:15'
    ];

    /**
     * Get the account that owns the JournalAccount
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id', 'code');
    }
}

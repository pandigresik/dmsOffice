<?php

namespace App\Models\Accounting;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="AccountMove",
 *      required={"company_id", "account_journal_id", "date", "state", "amount", "move_type"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="code",
 *          description="code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="company_id",
 *          description="company_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="default_debit_account_id",
 *          description="default_debit_account_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="default_credit_account_id",
 *          description="default_credit_account_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      )
 * )
 */
class AccountMove extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'account_move';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'company_id',
        'account_journal_id',
        'ref',
        'date',
        'state',
        'amount',
        'move_type',
        'narration',
        'stock_picking_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'company_id' => 'integer',
        'account_journal_id' => 'integer',
        'ref' => 'string',
        'date' => 'date',
        'state' => 'string',
        'amount' => 'decimal:2',
        'move_type' => 'string',
        'narration' => 'string',
        'stock_picking_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:100',
        'company_id' => 'required',
        'account_journal_id' => 'required',
        'ref' => 'nullable|string|max:50',
        'date' => 'required',
        'state' => 'required|string|max:10',
        'amount' => 'required|numeric',
        'move_type' => 'required|string',
        'narration' => 'nullable|string',
        'stock_picking_id' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function accountJournal()
    {
        return $this->belongsTo(\App\Models\Accounting\AccountJournal::class, 'account_journal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Base\Company::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stockPicking()
    {
        return $this->belongsTo(\App\Models\Inventory\StockPicking::class, 'stock_picking_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function accountMoveLines()
    {
        return $this->hasMany(\App\Models\Accounting\AccountMoveLine::class, 'account_move_id');
    }
}

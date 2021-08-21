<?php

namespace App\Models\Accounting;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="AccountJournal",
 *      required={"name", "code", "company_id", "type"},
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
class AccountJournal extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'account_journal';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'code',
        'company_id',
        'default_debit_account_id',
        'default_credit_account_id',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'company_id' => 'integer',
        'default_debit_account_id' => 'integer',
        'default_credit_account_id' => 'integer',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:50',
        'code' => 'required|string|max:8',
        'company_id' => 'required',
        'default_debit_account_id' => 'nullable',
        'default_credit_account_id' => 'nullable',
        'type' => 'required|string'
    ];

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
    public function defaultCreditAccount()
    {
        return $this->belongsTo(\App\Models\Accounting\AccountAccount::class, 'default_credit_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function defaultDebitAccount()
    {
        return $this->belongsTo(\App\Models\Accounting\AccountAccount::class, 'default_debit_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function accountInvoices()
    {
        return $this->hasMany(\App\Models\Accounting\AccountInvoice::class, 'account_journal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function accountInvoiceLines()
    {
        return $this->hasMany(\App\Models\Accounting\AccountInvoiceLine::class, 'account_journal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function accountMoves()
    {
        return $this->hasMany(\App\Models\Accounting\AccountMove::class, 'account_journal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function accountMoveLines()
    {
        return $this->hasMany(\App\Models\Accounting\AccountMoveLine::class, 'account_journal_id');
    }
}

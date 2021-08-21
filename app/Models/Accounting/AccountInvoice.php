<?php

namespace App\Models\Accounting;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="AccountInvoice",
 *      required={"name", "number", "amount_total", "company_id", "vendor_id", "account_journal_id", "type", "state", "date_invoice", "date_due"},
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
class AccountInvoice extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'account_invoice';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'number',
        'amount_total',
        'company_id',
        'vendor_id',
        'account_journal_id',
        'type',
        'references',
        'comment',
        'state',
        'date_invoice',
        'date_due'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'number' => 'string',
        'amount_total' => 'decimal:2',
        'company_id' => 'integer',
        'vendor_id' => 'integer',
        'account_journal_id' => 'integer',
        'type' => 'string',
        'references' => 'string',
        'comment' => 'string',
        'state' => 'string',
        'date_invoice' => 'date',
        'date_due' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:50',
        'number' => 'required|string|max:50',
        'amount_total' => 'required|numeric',
        'company_id' => 'required',
        'vendor_id' => 'required',
        'account_journal_id' => 'required',
        'type' => 'required|string',
        'references' => 'nullable|string|max:50',
        'comment' => 'nullable|string',
        'state' => 'required|string',
        'date_invoice' => 'required',
        'date_due' => 'required'
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
    public function vendor()
    {
        return $this->belongsTo(\App\Models\Base\Vendor::class, 'vendor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function accountInvoiceLines()
    {
        return $this->hasMany(\App\Models\Accounting\AccountInvoiceLine::class, 'account_invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function accountMoveLines()
    {
        return $this->hasMany(\App\Models\Accounting\AccountMoveLine::class, 'account_invoice_id');
    }
}

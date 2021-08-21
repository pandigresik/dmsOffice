<?php

namespace App\Models\Accounting;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="AccountInvoiceLine",
 *      required={"name", "sequence", "product_id", "company_id", "vendor_id", "account_invoice_id", "account_account_id", "account_journal_id", "quantity", "price_unit", "price_total", "discount", "amount_total"},
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
 *          property="sequence",
 *          description="sequence",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="product_id",
 *          description="product_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="company_id",
 *          description="company_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="vendor_id",
 *          description="vendor_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="account_invoice_id",
 *          description="account_invoice_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="account_account_id",
 *          description="account_account_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="account_journal_id",
 *          description="account_journal_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          description="quantity",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="price_unit",
 *          description="price_unit",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="price_total",
 *          description="price_total",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="discount",
 *          description="discount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="amount_total",
 *          description="amount_total",
 *          type="number",
 *          format="number"
 *      )
 * )
 */
class AccountInvoiceLine extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'account_invoice_line';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'sequence',
        'product_id',
        'company_id',
        'vendor_id',
        'account_invoice_id',
        'account_account_id',
        'account_journal_id',
        'quantity',
        'price_unit',
        'price_total',
        'discount',
        'amount_total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'sequence' => 'integer',
        'product_id' => 'integer',
        'company_id' => 'integer',
        'vendor_id' => 'integer',
        'account_invoice_id' => 'integer',
        'account_account_id' => 'integer',
        'account_journal_id' => 'integer',
        'quantity' => 'decimal:2',
        'price_unit' => 'decimal:2',
        'price_total' => 'decimal:2',
        'discount' => 'decimal:2',
        'amount_total' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:50',
        'sequence' => 'required|integer',
        'product_id' => 'required',
        'company_id' => 'required',
        'vendor_id' => 'required',
        'account_invoice_id' => 'required',
        'account_account_id' => 'required',
        'account_journal_id' => 'required',
        'quantity' => 'required|numeric',
        'price_unit' => 'required|numeric',
        'price_total' => 'required|numeric',
        'discount' => 'required|numeric',
        'amount_total' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function accountAccount()
    {
        return $this->belongsTo(\App\Models\Accounting\AccountAccount::class, 'account_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function accountInvoice()
    {
        return $this->belongsTo(\App\Models\Accounting\AccountInvoice::class, 'account_invoice_id');
    }

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
    public function product()
    {
        return $this->belongsTo(\App\Models\Base\Product::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vendor()
    {
        return $this->belongsTo(\App\Models\Base\Vendor::class, 'vendor_id');
    }
}

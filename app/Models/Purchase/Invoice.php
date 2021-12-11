<?php

namespace App\Models\Purchase;

use App\Models\Base\DmsApSupplier;
use App\Models\BaseEntity as Model;
use App\Models\Inventory\DmsInvCarrier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Invoice",
 *      required={"number", "type", "reference", "qty", "amount", "amount_discount", "state", "date_invoice", "date_due", "partner_id"},
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
 *          property="qty",
 *          description="qty",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="amount_discount",
 *          description="amount_discount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="date_invoice",
 *          description="date_invoice",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="date_due",
 *          description="date_due",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="partner_id",
 *          description="partner_id",
 *          type="string"
 *      )
 * )
 */
class Invoice extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DEFAULT_STATE = 'submit';
    const SUBMIT = 'submit';
    const VALIDATE = 'validate';
    const APPROVE = 'approve';
    const READY_PAY = 'ready_pay';
    const PAY = 'pay';

    public $table = 'invoice';
    public $isCachable = false;
    public $fillable = [
        'number',
        'type',
        'reference',
        'external_reference',
        'qty',
        'amount',
        'amount_discount',
        'state',
        'date_invoice',
        'date_due',
        'partner_id',
        'partner_type'        
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [        
        'external_reference' => 'required|string|max:255',        
        'amount' => 'required|numeric',        
        'date_invoice' => 'required',
        'date_due' => 'required',
        // 'partner_id' => 'required|string|max:20',
    ];

    protected $dates = ['deleted_at'];

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
        'qty' => 'integer',
        'amount' => 'decimal:2',
        'amount_discount' => 'decimal:2',
        'state' => 'string',
        'date_invoice' => 'date',
        'date_due' => 'date',
        'partner_id' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceUsers()
    {
        return $this->hasMany(\App\Models\Purchase\InvoiceUser::class, 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceLines()
    {
        return $this->hasMany(\App\Models\Purchase\InvoiceLine::class, 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function debitCreditNote()
    {
        return $this->hasMany(\App\Models\Finance\DebitCreditNote::class, 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function btb()
    {
        return $this->hasManyThrough(\App\Models\Purchase\BtbValidate::class, \App\Models\Purchase\InvoiceLine::class, 'invoice_id', 'doc_id', 'id', 'doc_id');
    }

    /**
     * Get the partner that owns the Invoice.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->hasOne(DmsApSupplier::class, 'szId', 'partner_id');
    }

    public function ekspedisi()
    {
        return $this->hasOne(DmsInvCarrier::class, 'szId', 'partner_id');
    }

    public function getNextNumber()
    {
        $pattern = 'BILL/'.date('Ym').'/';
        $columnReference = 'number';
        $sequenceLength = 5;
        $nextId = $this->where($columnReference, 'like', $pattern.'%')->max($columnReference);
        $nextId = !$nextId ? 1 : intval(substr($nextId, strlen($nextId) - $sequenceLength)) + 1;
        $newId = [$pattern, str_pad($nextId, $sequenceLength, '0', STR_PAD_LEFT)];

        return implode('', $newId);
    }

    public function scopeSubmit($query)
    {
        return $query->whereState(self::SUBMIT);
    }

    public function scopeValidate($query)
    {
        return $query->whereState(self::VALIDATE);
    }

    public function getQtyAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    public function getAmountAttribute($value)
    {
        return localNumberFormat($value);
    }

    public function getAmountTotalAttribute($value)
    {
        return localNumberFormat($value);
    }

    public function getAmountDiscountAttribute($value)
    {
        return localNumberFormat($value);
    }

    public function getDateInvoiceAttribute($value)
    {
        return localFormatDate($value);
    }

    public function getDateDueAttribute($value)
    {
        return localFormatDate($value);
    }
}

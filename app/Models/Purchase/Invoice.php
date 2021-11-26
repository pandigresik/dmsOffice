<?php

namespace App\Models\Purchase;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public $table = 'invoice';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];    

    public $fillable = [
        'number',
        'type',
        'reference',
        'qty',
        'amount',
        'amount_discount',
        'state',
        'date_invoice',
        'date_due',
        'partner_id'
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
        'qty' => 'integer',
        'amount' => 'decimal:2',
        'amount_discount' => 'decimal:2',
        'state' => 'string',
        'date_invoice' => 'date',
        'date_due' => 'date',
        'partner_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'number' => 'required|string|max:30',
        'type' => 'required|string',
        'reference' => 'required|string|max:255',
        'qty' => 'required|integer',
        'amount' => 'required|numeric',
        'amount_discount' => 'required|numeric',
        'state' => 'required|string|max:10',
        'date_invoice' => 'required',
        'date_due' => 'required',
        'partner_id' => 'required|string|max:20'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function invoiceUsers()
    {
        return $this->hasMany(\App\Models\Purchase\InvoiceUser::class, 'invoice_id');
    }
}

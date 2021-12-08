<?php

namespace App\Models\Finance;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="PaymentLine",
 *      required={"payment_id", "invoice_id", "amount", "amount_cn", "amount_dn", "amount_total"},
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
class PaymentLine extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'payment_line';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "mysql_sejati";

    public $fillable = [
        'payment_id',
        'invoice_id',
        'amount',
        'amount_cn',
        'amount_dn',
        'amount_total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'payment_id' => 'integer',
        'invoice_id' => 'integer',
        'amount' => 'decimal:2',
        'amount_cn' => 'decimal:2',
        'amount_dn' => 'decimal:2',
        'amount_total' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'payment_id' => 'required',
        'invoice_id' => 'required',
        'amount' => 'required|numeric',
        'amount_cn' => 'required|numeric',
        'amount_dn' => 'required|numeric',
        'amount_total' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function invoice()
    {
        return $this->belongsTo(\App\Models\Finance\Invoice::class, 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function payment()
    {
        return $this->belongsTo(\App\Models\Finance\Payment::class, 'payment_id');
    }
}

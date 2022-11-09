<?php

namespace App\Models\Purchase;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="InvoiceBkb",
 *      required={"invoice_id", "references"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="invoice_id",
 *          description="invoice_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="references",
 *          description="references",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="additional_info",
 *          description="additional_info",
 *          type="string"
 *      )
 * )
 */
class InvoiceSubsidi extends Model
{    
    use HasFactory;

    public $table = 'invoice_subsidi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    protected $dates = ['deleted_at'];    

    public $fillable = [
        'invoice_id',
        'subsidi_oa_id',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'invoice_id' => 'integer',
        'subsidi_oa_id' => 'integer',
        'amount' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function invoice()
    {
        return $this->belongsTo(\App\Models\Purchase\Invoice::class, 'invoice_id');
    }
}

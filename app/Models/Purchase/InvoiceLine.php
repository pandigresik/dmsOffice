<?php

namespace App\Models\Purchase;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="InvoiceLine",
 *      required={"invoice_id", "doc_id", "reference_id", "product_id", "product_name", "uom_id", "qty", "price"},
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
 *          property="doc_id",
 *          description="doc_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="reference_id",
 *          description="reference_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="product_id",
 *          description="product_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="product_name",
 *          description="product_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="uom_id",
 *          description="uom_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="qty",
 *          description="qty",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="price",
 *          description="price",
 *          type="number",
 *          format="number"
 *      )
 * )
 */
class InvoiceLine extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'invoice_line';

    public $fillable = [
        'invoice_id',
        'doc_id',
        'reference_id',
        'product_id',
        'product_name',
        'uom_id',
        'qty',
        'price',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'invoice_id' => 'required',
        'doc_id' => 'required|string|max:50',
        'reference_id' => 'required|string|max:50',
        'product_id' => 'required|string|max:50',
        'product_name' => 'required|string|max:70',
        'uom_id' => 'required|string|max:50',
        'qty' => 'required|integer',
        'price' => 'required|numeric',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'invoice_id' => 'integer',
        'doc_id' => 'string',
        'reference_id' => 'string',
        'product_id' => 'string',
        'product_name' => 'string',
        'uom_id' => 'string',
        'qty' => 'integer',
        'price' => 'decimal:2',
    ];

    /**
     * Get the btb associated with the InvoiceLine.
     *
     * @return \Illuminate\Database\Eloquent\RBtbValidateions\HasOne
     */
    public function btb(): HasOne
    {
        return $this->hasOne(BtbValidate::class, 'doc_id', 'doc_id');
    }

    public function getQtyAttribute($value)
    {
        return localNumberFormat($value, 0);
    }

    public function getPriceAttribute($value)
    {
        return localNumberFormat($value, 2);
    }

    public function getAmountTotalAttribute($value)
    {
        return localNumberFormat($this->attributes['price'] * $this->attributes['qty'], 2);
    }
}

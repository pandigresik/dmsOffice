<?php

namespace App\Models\Base;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="ProductPriceSalesLog",
 *      required={"dms_inv_product_id", "price"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="dms_inv_product_id",
 *          description="dms_inv_product_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="price",
 *          description="price",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="start_date",
 *          description="start_date",
 *          type="string",
 *          format="date"
 *      )
 * )
 */
class ProductPriceSalesLog extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'product_price_sales_log';

    public $fillable = [
        'dms_inv_product_id',
        'price',
        'start_date',
        'end_date',
        'product_id',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'dms_inv_product_id' => 'required|string',
        'price' => 'required|numeric',
        'start_date' => 'required',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dms_inv_product_id' => 'string',
        'price' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dmsInvProduct()
    {
        return $this->belongsTo(\App\Models\Inventory\DmsInvProduct::class, 'dms_inv_product_id', 'szId');
    }

    public function getPriceAttribute($value)
    {
        return localNumberFormat($value);
    }

    public function getStartDateAttribute($value)
    {
        return localFormatDate($value);
    }

    public function getEndDateAttribute($value)
    {
        return $value ? localFormatDate($value) : null;
    }

    public function getCreatedAtAttribute($value)
    {
        return localFormatDateTime($value);
    }
}

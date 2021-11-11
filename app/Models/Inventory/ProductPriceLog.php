<?php

namespace App\Models\Inventory;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="ProductPriceLog",
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
class ProductPriceLog extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'product_price_log';

    public $fillable = [
        'dms_inv_product_id',
        'price',
        'start_date',
        'end_date'
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'dms_inv_product_id' => 'required|integer',
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
        'dms_inv_product_id' => 'integer',
        'price' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dmsInvProduct()
    {
        return $this->belongsTo(\App\Models\Inventory\DmsInvProduct::class, 'dms_inv_product_id');
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

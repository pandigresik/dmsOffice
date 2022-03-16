<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use App\Models\Inventory\DmsInvProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ShippingCostManualDetail",
 *      required={"shipping_cost_manual_id", "quantity"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="shipping_cost_manual_id",
 *          description="shipping_cost_manual_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          description="quantity",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class ShippingCostManualDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'shipping_cost_manual_detail';

    public $fillable = [
        'shipping_cost_manual_id',
        'product_id',
        'quantity',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'shipping_cost_manual_id' => 'required',
        'product_id' => 'required',
        'quantity' => 'required|integer',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'string',
        'shipping_cost_manual_id' => 'integer',
        'quantity' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shippingCostManual()
    {
        return $this->belongsTo(\App\Models\Accounting\ShippingCostManual::class, 'shipping_cost_manual_id');
    }

    /**
     * Get the product that owns the ShippingCostManualDetail.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(DmsInvProduct::class, 'product_id', 'szId');
    }
}

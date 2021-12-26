<?php

namespace App\Models\Sales;

use App\Models\BaseEntity as Model;
use App\Models\Inventory\DmsInvProduct;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DiscountDetail",
 *      required={"discounts_id", "main_dms_inv_product_id", "min_main_qty", "max_main_qty", "principle_amount"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="discounts_id",
 *          description="discounts_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="main_dms_inv_product_id",
 *          description="main_dms_inv_product_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="min_main_qty",
 *          description="min_main_qty",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="max_main_qty",
 *          description="max_main_qty",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="bundling_dms_inv_product_id",
 *          description="bundling_dms_inv_product_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="min_bundling_qty",
 *          description="min_bundling_qty",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="max_bundling_qty",
 *          description="max_bundling_qty",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="principle_amount",
 *          description="principle_amount",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="distributor_amount",
 *          description="distributor_amount",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class DiscountDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'discount_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    

    public $fillable = [
        'discounts_id',
        'main_dms_inv_product_id',
        'min_main_qty',
        'max_main_qty',
        'bundling_dms_inv_product_id',
        'min_bundling_qty',
        'max_bundling_qty',
        'principle_amount',
        'distributor_amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'discounts_id' => 'integer',
        'main_dms_inv_product_id' => 'string',
        'min_main_qty' => 'integer',
        'max_main_qty' => 'integer',
        'bundling_dms_inv_product_id' => 'string',
        'min_bundling_qty' => 'integer',
        'max_bundling_qty' => 'integer',
        'principle_amount' => 'integer',
        'distributor_amount' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'discounts_id' => 'required',
        'main_dms_inv_product_id' => 'required|string|max:10',
        'min_main_qty' => 'required|integer',
        'max_main_qty' => 'required|integer',
        'bundling_dms_inv_product_id' => 'nullable|string|max:10',
        'min_bundling_qty' => 'nullable|integer',
        'max_bundling_qty' => 'nullable|integer',
        'principle_amount' => 'required|integer',
        'distributor_amount' => 'nullable|integer'
    ];

    /**
     * Get the Discount that owns the DiscountMember.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }

    /**
     * Get the user associated with the DiscountDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mainProduct(): BelongsTo
    {
        return $this->belongsTo(DmsInvProduct::class, 'main_dms_inv_product_id', 'szId');
    }

    public function bundlingProduct(): BelongsTo
    {
        return $this->belongsTo(DmsInvProduct::class, 'bundling_dms_inv_product_id', 'szId');
    }
}

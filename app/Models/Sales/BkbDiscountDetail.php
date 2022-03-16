<?php

namespace App\Models\Sales;

use App\Models\Base\DmsSmBranch;
use App\Models\BaseEntity as Model;
use App\Models\Inventory\DmsInvProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="BkbDiscountDetail",
 *      required={"szDocId", "szProductId", "szBranchId", "discount_id", "principle_amount", "distributor_amount"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="szDocId",
 *          description="szDocId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szProductId",
 *          description="szProductId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szBranchId",
 *          description="szBranchId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="discount_id",
 *          description="discount_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="principle_amount",
 *          description="principle_amount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="distributor_amount",
 *          description="distributor_amount",
 *          type="number",
 *          format="number"
 *      )
 * )
 */
class BkbDiscountDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'bkb_discount_details';

    public $fillable = [
        'szDocId',
        'szProductId',
        'szBranchId',
        'bkbDate',
        'decQty',
        'discount_id',
        'principle_amount',
        'distributor_amount',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'szDocId' => 'required|string|max:50',
        'szProductId' => 'required|string|max:50',
        'szBranchId' => 'required|string|max:50',
        'discount_id' => 'required',
        'principle_amount' => 'required|numeric',
        'distributor_amount' => 'required|numeric',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'szDocId' => 'string',
        'szProductId' => 'string',
        'szBranchId' => 'string',
        'discount_id' => 'integer',
        'principle_amount' => 'decimal:2',
        'distributor_amount' => 'decimal:2',
    ];

    /**
     * Get the product that owns the DmsSdDocdoItem.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(DmsInvProduct::class, 'szProductId', 'szId');
    }

    /**
     * Get the bkb that owns the BkbDiscounts.
     */
    public function bkb(): BelongsTo
    {
        return $this->belongsTo(DmsSdDocdo::class, 'szDocId', 'szDocId');
    }

    /**
     * Get the promo that owns the BkbDiscountDetail.
     *
     * @return \IlluminDiscountsDatabase\Ediscount_idatioidsTo
     */
    public function promo(): BelongsTo
    {
        return $this->belongsTo(Discounts::class, 'discount_id', 'id');
    }

    /**
     * Get the depo that owns the DmsSdDocdo.
     */
    public function depo(): BelongsTo
    {
        return $this->belongsTo(DmsSmBranch::class, 'szBranchId', 'szId');
    }
}

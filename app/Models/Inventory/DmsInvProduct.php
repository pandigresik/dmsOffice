<?php

namespace App\Models\Inventory;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * @SWG\Definition(
 *      definition="DmsInvProduct",
 *      required={"iId", "szId", "szName", "szDescription", "szTrackingType", "szUomId", "bUseComposite", "bKit", "szQtyFormat", "szProductType", "dtmStartDate", "dtmEndDate", "szUserCreatedId", "szUserUpdatedId", "dtmCreated", "dtmLastUpdated"},
 *      @SWG\Property(
 *          property="iInternalId",
 *          description="iInternalId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="iId",
 *          description="iId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szId",
 *          description="szId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szName",
 *          description="szName",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDescription",
 *          description="szDescription",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szUserCreatedId",
 *          description="szUserCreatedId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szUserUpdatedId",
 *          description="szUserUpdatedId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dtmCreated",
 *          description="dtmCreated",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="dtmLastUpdated",
 *          description="dtmLastUpdated",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class DmsInvProduct extends Model
{
    use HasFactory;

    const CREATED_AT = 'dtmCreated';
    const UPDATED_AT = 'dtmLastUpdated';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'dms_inv_product';

    public $primaryKey = 'iInternalId';
    public $fillable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szTrackingType',
        'szUomId',
        'bUseComposite',
        'bKit',
        'szQtyFormat',
        'szProductType',
        'szNickName',
        'dtmStartDate',
        'dtmEndDate',
        //'szUserCreatedId',
        // 'szUserUpdatedId',
        //'dtmCreated',
        //'dtmLastUpdated',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'iId' => 'required|string|max:50',
        'szId' => 'required|string|max:50',
        'szName' => 'required|string|max:50',
        'szDescription' => 'required|string|max:1000',
        'szTrackingType' => 'required|string|max:10',
        'szUomId' => 'required|string|max:50',
        'bUseComposite' => 'required|boolean',
        'bKit' => 'required|boolean',
        'szQtyFormat' => 'required|string|max:50',
        'szProductType' => 'required|string|max:50',
        'szNickName' => 'nullable|string|max:30',
        'dtmStartDate' => 'required',
        'dtmEndDate' => 'required',
        'szUserCreatedId' => 'required|string|max:20',
        'szUserUpdatedId' => 'required|string|max:20',
        'dtmCreated' => 'required',
        'dtmLastUpdated' => 'required',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'iInternalId' => 'integer',
        'iId' => 'string',
        'szId' => 'string',
        'szName' => 'string',
        'szDescription' => 'string',
        'szTrackingType' => 'string',
        'szUomId' => 'string',
        'bUseComposite' => 'boolean',
        'bKit' => 'boolean',
        'szQtyFormat' => 'string',
        'szProductType' => 'string',
        'szNickName' => 'string',
        'dtmStartDate' => 'datetime',
        'dtmEndDate' => 'datetime',
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
        'dtmCreated' => 'datetime',
        'dtmLastUpdated' => 'datetime',
    ];

    public function getFullIdentityAttribute($value)
    {
        return implode(' | ', [$this->attributes['szId'], $this->attributes['szName'], $this->attributes['szUomId']]);
    }

    /**
     * Get the ProductCategories that owns the DmsInvProduct.
     *
     * @return \Illuminate\ProductCategoriesbase\Eloquent\Relations\BelongsTo
     */
    public function productCategoriesProduct(): BelongsTo
    {
        return $this->belongsTo(ProductCategoriesProduct::class, 'iInternalId', 'product_id');
    }

    /**
     * Get the ProductCategories associated with the DmsInvProduct.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productCategories(): HasOneThrough
    {
        return $this->hasOneThrough(ProductCategories::class, ProductCategoriesProduct::class, 'product_id', 'id', 'iInternalId');
    }

    /**
     * Get all of the logProductPrice for the DmsInvProduct.
     */
    public function logProductPrice(): HasMany
    {
        return $this->hasMany(ProductPriceLog::class, 'iInternalId', 'dms_inv_product_id');
    }
}

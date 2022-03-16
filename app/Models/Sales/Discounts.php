<?php

namespace App\Models\Sales;

use App\Models\BaseEntity as Model;
use App\Models\Inventory\DmsInvProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Discounts",
 *      required={"jenis", "name", "start_date", "end_date", "split", "main_dms_inv_product_id", "main_quota", "max_quota", "state"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="jenis",
 *          description="jenis",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="start_date",
 *          description="start_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="end_date",
 *          description="end_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="split",
 *          description="split",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="main_dms_inv_product_id",
 *          description="main_dms_inv_product_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="main_quota",
 *          description="main_quota",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="bundling_dms_inv_product_id",
 *          description="bundling_dms_inv_product_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bundling_quota",
 *          description="bundling_quota",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="max_quota",
 *          description="max_quota",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="string"
 *      )
 * )
 */
class Discounts extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const OPTION_ITEM_JENIS = ['promo', 'bundling', 'combine', 'kontrak', 'combo', 'extension'];
    const OPTION_ITEM_SEGMENT = ['customer_segment', 'customer'];
    const OPTION_ITEM_TYPE = ['principle', 'internal'];

    public $table = 'discounts';

    public $fillable = [
        'type',
        'jenis',
        'name',
        'start_date',
        'end_date',
        'split',
        'main_dms_inv_product_id',
        'main_quota',
        'conversion_main_dms_inv_product_id',
        'bundling_dms_inv_product_id',
        'bundling_quota',
        'conversion_bundling_dms_inv_product_id',
        'max_quota',
        'state',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required|string',
        'jenis' => 'required|string',
        'name' => 'required|string|max:100',
        'period' => 'required',
        'main_dms_inv_product_id' => 'required',
        'main_quota' => 'required|integer',
        'bundling_dms_inv_product_id' => 'nullable',
        'bundling_quota' => 'nullable|integer',
        'max_quota' => 'required|integer',
    ];

    public static $rulesCombine = [
        'type' => 'required|string',
        'jenis' => 'required|string',
        'name' => 'required|string|max:100',
        'period' => 'required',
        'split' => 'required|integer',
        'main_dms_inv_product_id' => 'required',
        'main_quota' => 'required|integer',
        'bundling_dms_inv_product_id' => 'nullable',
        'bundling_quota' => 'nullable|integer',
        'max_quota' => 'required|integer',
    ];

    public static $rulesKontrak = [
        'type' => 'required|string',
        'jenis' => 'required|string',
        'name' => 'required|string|max:100',
        'period' => 'required',
    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'jenis' => 'string',
        'name' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'split' => 'boolean',
        'main_dms_inv_product_id' => 'string',
        'main_quota' => 'integer',
        'bundling_dms_inv_product_id' => 'string',
        'bundling_quota' => 'integer',
        'max_quota' => 'integer',
        'state' => 'string',
    ];

    /**
     * Get all of the details for the Discounts.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details(): HasMany
    {
        return $this->hasMany(DiscountDetail::class);
    }

    public function members(): HasMany
    {
        return $this->hasMany(DiscountMember::class);
    }

    /**
     * Get the mainProduct that owns the Discounts.
     */
    public function mainProduct(): BelongsTo
    {
        return $this->belongsTo(DmsInvProduct::class, 'main_dms_inv_product_id', 'szId');
    }

    public function bundlingProduct(): BelongsTo
    {
        return $this->belongsTo(DmsInvProduct::class, 'bundling_dms_inv_product_id', 'szId');
    }

    public function getStartDateAttribute($value)
    {
        return localFormatDate($value);
    }

    public function getEndDateAttribute($value)
    {
        return localFormatDate($value);
    }

    public function getPeriodAttribute($value)
    {
        return localFormatDate($this->attributes['start_date']).' - '.localFormatDate($this->attributes['end_date']);
    }
}

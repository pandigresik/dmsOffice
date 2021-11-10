<?php

namespace App\Models\Inventory;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="ProductCategoriesProduct",
 *      required={"product_id", "product_categories_id", "status"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="product_id",
 *          description="product_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="product_categories_id",
 *          description="product_categories_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="boolean"
 *      )
 * )
 */
class ProductCategoriesProduct extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'product_categories_product';

    public $fillable = [
        'product_id',
        'product_categories_id',
        'status',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required|integer',
        'product_categories_id' => 'required',
        'status' => 'required|boolean',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'product_categories_id' => 'integer',
        'status' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(\App\Models\Inventory\DmsInvProduct::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategories()
    {
        return $this->belongsTo(\App\Models\Inventory\ProductCategory::class, 'product_categories_id');
    }
}

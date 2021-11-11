<?php

namespace App\Models\Inventory;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="ProductPrice",
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
class ProductPrice extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'product_price';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'dms_inv_product_id',
        'price',
        'start_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dms_inv_product_id' => 'integer',
        'price' => 'decimal:2',
        'start_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dms_inv_product_id' => 'required|integer',
        'price' => 'required|numeric',
        'start_date' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
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

    public function getFullIdentityAttribute($value)
    {
        // return implode(' | ',[$this->attributes['dms_inv_product']['productCategories']['name'],$this->attributes['dmsInvProduct']['szName'],$this->attributes['price']]);
        return implode(' | ',[$this->dmsInvProduct->productCategories->name, $this->dmsInvProduct->szName, localNumberFormat($this->attributes['price'])]);
    }
}

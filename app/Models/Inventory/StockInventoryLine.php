<?php

namespace App\Models\Inventory;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="StockInventoryLine",
 *      required={"stock_inventory_id", "product_id", "uom_id", "quantity"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="stock_inventory_id",
 *          description="stock_inventory_id",
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
 *          property="uom_id",
 *          description="uom_id",
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
class StockInventoryLine extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'stock_inventory_line';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    protected $dates = ['deleted_at'];



    public $fillable = [
        'stock_inventory_id',
        'product_id',
        'uom_id',
        'quantity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'stock_inventory_id' => 'integer',
        'product_id' => 'integer',
        'uom_id' => 'integer',
        'quantity' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'stock_inventory_id' => 'required',
        'product_id' => 'required',
        'uom_id' => 'required',
        'quantity' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stockInventory()
    {
        return $this->belongsTo(\App\Models\Inventory\StockInventory::class, 'stock_inventory_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Base\Product::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function uom()
    {
        return $this->belongsTo(\App\Models\Base\Uom::class, 'uom_id');
    }
}

<?php

namespace App\Models\Inventory;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="StockPicking",
 *      required={"warehouse_id", "stock_picking_type_id", "name", "quantity"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="internal_code",
 *          description="internal_code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="company_id",
 *          description="company_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class StockPicking extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'stock_picking';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'warehouse_id',
        'stock_picking_type_id',
        'name',
        'quantity',
        'state',
        'external_references',
        'vendor_id',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'warehouse_id' => 'integer',
        'stock_picking_type_id' => 'integer',
        'name' => 'string',
        'quantity' => 'integer',
        'state' => 'string',
        'external_references' => 'string',
        'vendor_id' => 'integer',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'warehouse_id' => 'required',
        'stock_picking_type_id' => 'required',
        'name' => 'required|string|max:70',
        'quantity' => 'required|integer',
        'state' => 'nullable|string|max:15',
        'external_references' => 'nullable|string|max:50',
        'vendor_id' => 'nullable',
        'note' => 'nullable|string|max:100'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stockPickingType()
    {
        return $this->belongsTo(\App\Models\Inventory\StockPickingType::class, 'stock_picking_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function warehouse()
    {
        return $this->belongsTo(\App\Models\Inventory\Warehouse::class, 'warehouse_id');
    }
}

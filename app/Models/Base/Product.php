<?php

namespace App\Models\Base;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Product",
 *      required={"name"},
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
 *      )
 * )
 */
class Product extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'product';

    public $fillable = [
        'name',
        'internal_code',
        'uom_id',
        'saleable',
        'storeable',
        'consumeable',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:50',
        'internal_code' => 'nullable|string|max:50',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'internal_code' => 'string',
        'saleable' => 'boolean',
        'storeable' => 'boolean',
        'consumeable' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stockInventoryLines()
    {
        return $this->hasMany(\App\Models\Base\StockInventoryLine::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stockQuants()
    {
        return $this->hasMany(\App\Models\Base\StockQuant::class, 'product_id');
    }

    public function uom()
    {
        return $this->belongsTo(App\Models\Base\Uom::class, 'uom_id');
    }
}

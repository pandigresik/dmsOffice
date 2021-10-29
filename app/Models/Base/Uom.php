<?php

namespace App\Models\Base;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Uom",
 *      required={"name", "uom_category_id", "factor", "uom_type"},
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
class Uom extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'uom';

    public $fillable = [
        'name',
        'uom_category_id',
        'factor',
        'uom_type',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:50',
        'uom_category_id' => 'required',
        'factor' => 'required|numeric',
        'uom_type' => 'required|string|max:255',
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
        'uom_category_id' => 'integer',
        'factor' => 'decimal:2',
        'uom_type' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomCategory()
    {
        return $this->belongsTo(\App\Models\Base\UomCategory::class, 'uom_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stockInventoryLines()
    {
        return $this->hasMany(\App\Models\Base\StockInventoryLine::class, 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stockQuants()
    {
        return $this->hasMany(\App\Models\Base\StockQuant::class, 'uom_id');
    }
}

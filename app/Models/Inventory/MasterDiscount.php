<?php

namespace App\Models\Inventory;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="MasterDiscount",
 *      required={"code", "name", "start_date", "end_date"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="code",
 *          description="code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="amount_value",
 *          description="amount_value",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="amount_procent",
 *          description="amount_procent",
 *          type="number",
 *          format="number"
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
 *      )
 * )
 */
class MasterDiscount extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'master_discount';

    public $fillable = [
        'code',
        'name',
        'amount_value',
        'amount_procent',
        'start_date',
        'end_date',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required|string|max:10',
        'name' => 'required|string|max:50',
        'amount_value' => 'nullable|numeric',
        'amount_procent' => 'nullable|numeric',
        'start_date' => 'required',
        'end_date' => 'required',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'amount_value' => 'decimal:2',
        'amount_procent' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(\App\Models\Inventory\MasterDiscountProduct::class, 'master_discount_id');
    }
}

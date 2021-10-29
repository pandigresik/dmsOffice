<?php

namespace App\Models\Accounting;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="IfrsCategories",
 *      required={"entity_id", "category_type", "name"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="entity_id",
 *          description="entity_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="category_id",
 *          description="category_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="currency_id",
 *          description="currency_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="code",
 *          description="code",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="account_type",
 *          description="account_type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="destroyed_at",
 *          description="destroyed_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class IfrsCategories extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'ifrs_categories';

    public $fillable = [
        'entity_id',
        'category_type',
        'name',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'entity_id' => 'required',
        'category_type' => 'required|string',
        'name' => 'required|string|max:300',
        'destroyed_at' => 'nullable',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'entity_id' => 'integer',
        'category_type' => 'string',
        'name' => 'string',
        'destroyed_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo(\App\Models\Accounting\IfrsEntities::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entityIdentity()
    {
        return $this->entity()->selectRaw('*, name as name_entity');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsAccounts()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsAccount::class, 'category_id');
    }
}

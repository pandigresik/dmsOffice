<?php

namespace App\Models\Accounting;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="IfrsExchangeRates",
 *      required={"entity_id", "currency_id", "valid_from", "rate"},
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
class IfrsExchangeRates extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'ifrs_exchange_rates';

    public $fillable = [
        'entity_id',
        'currency_id',
        'valid_from',
        'valid_to',
        'rate',
        'destroyed_at',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'entity_id' => 'required',
        'currency_id' => 'required',
        'valid_from' => 'required',
        'valid_to' => 'nullable',
        'rate' => 'required|numeric',
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
        'currency_id' => 'integer',
        'valid_from' => 'datetime',
        'valid_to' => 'datetime',
        'rate' => 'decimal:4',
        'destroyed_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(\App\Models\Accounting\IfrsCurrency::class, 'currency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo(\App\Models\Accounting\IfrsEntities::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsBalances()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsBalance::class, 'exchange_rate_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsClosingRates()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsClosingRate::class, 'exchange_rate_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsTransactions()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsTransaction::class, 'exchange_rate_id');
    }
}

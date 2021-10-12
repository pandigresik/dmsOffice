<?php

namespace App\Models\Accounting;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="IfrsReportingPeriods",
 *      required={"entity_id", "period_count", "status", "calendar_year"},
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
class IfrsReportingPeriods extends Model
{
    use SoftDeletes;
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'ifrs_reporting_periods';

    public $fillable = [
        'entity_id',
        'period_count',
        'status',
        'calendar_year',
        'destroyed_at',
        'closing_date',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'entity_id' => 'required',
        'period_count' => 'required|integer',
        'status' => 'required|string',
        'calendar_year' => 'required',
        'destroyed_at' => 'nullable',
        'closing_date' => 'nullable',
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
        'period_count' => 'integer',
        'status' => 'string',
        'calendar_year' => 'date',
        'destroyed_at' => 'datetime',
        'closing_date' => 'datetime',
    ];

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
        return $this->hasMany(\App\Models\Accounting\IfrsBalance::class, 'reporting_period_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsClosingRates()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsClosingRate::class, 'reporting_period_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsClosingTransactions()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsClosingTransaction::class, 'reporting_period_id');
    }
}

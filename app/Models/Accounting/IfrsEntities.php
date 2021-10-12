<?php

namespace App\Models\Accounting;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="IfrsEntities",
 *      required={"name", "multi_currency", "mid_year_balances", "year_start", "locale"},
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
class IfrsEntities extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $table = 'ifrs_entities';

    public $fillable = [
        'currency_id',
        'parent_id',
        'name',
        'multi_currency',
        'mid_year_balances',
        'year_start',
        'destroyed_at',
        'locale',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'currency_id' => 'nullable',
        'parent_id' => 'nullable',
        'name' => 'required|string|max:300',
        'multi_currency' => 'required|boolean',
        'mid_year_balances' => 'required|boolean',
        'year_start' => 'required|integer',
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
        'currency_id' => 'integer',
        'parent_id' => 'integer',
        'name' => 'string',
        'multi_currency' => 'boolean',
        'mid_year_balances' => 'boolean',
        'year_start' => 'integer',
        'destroyed_at' => 'datetime',
        'locale' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsAccounts()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsAccount::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsAssignments()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsAssignment::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsBalances()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsBalance::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsCategories()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsCategory::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsClosingRates()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsClosingRate::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsClosingTransactions()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsClosingTransaction::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsCurrencies()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsCurrency::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsExchangeRates()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsExchangeRate::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsLedgers()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsLedger::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsLineItems()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsLineItem::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsRecycledObjects()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsRecycledObject::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsReportingPeriods()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsReportingPeriod::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsTransactions()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsTransaction::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsVats()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsVat::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ifrsParent()
    {
        return $this->belongsTo(\App\Models\Accounting\IfrsEntities::class, 'parent_id', 'id');
    }
}

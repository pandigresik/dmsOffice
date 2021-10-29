<?php

namespace App\Models\Accounting;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="IfrsCurrencies",
 *      required={"entity_id", "name", "currency_code"},
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
class IfrsCurrencies extends Model
{
    use SoftDeletes;
    use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'ifrs_currencies';

    public $fillable = [
        'entity_id',
        'name',
        'currency_code',
        'destroyed_at',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'entity_id' => 'required',
        'name' => 'required|string|max:300',
        'currency_code' => 'required|string|max:3',
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
        'name' => 'string',
        'currency_code' => 'string',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsAccounts()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsAccount::class, 'currency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsBalances()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsBalance::class, 'currency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsClosingTransactions()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsClosingTransaction::class, 'currency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsExchangeRates()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsExchangeRate::class, 'currency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsLedgers()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsLedger::class, 'currency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsTransactions()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsTransaction::class, 'currency_id');
    }
}

<?php

namespace App\Models\Accounting;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="IfrsAccounts",
 *      required={"entity_id", "currency_id", "code", "name", "account_type"},
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
class IfrsAccounts extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'ifrs_accounts';

    public $fillable = [
        'entity_id',
        'category_id',
        'currency_id',
        'code',
        'name',
        'description',
        'account_type',
        //'destroyed_at'
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'entity_id' => 'required',
        'category_id' => 'nullable',
        'currency_id' => 'required',
        'code' => 'required|integer',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        //'account_type' => 'required|string',
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
        'category_id' => 'integer',
        'currency_id' => 'integer',
        'code' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'account_type' => 'string',
        'destroyed_at' => 'datetime',
    ];

    public function setCategoryIdAttribute($value)
    {
        $category = \App\Models\Accounting\IfrsCategories::find($value);
        $this->attributes['account_type'] = $category->category_type;
        $this->attributes['category_id'] = $value;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(\App\Models\Accounting\IfrsCategories::class, 'category_id');
    }

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
    public function ifrsAssignments()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsAssignment::class, 'forex_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsBalances()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsBalance::class, 'account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsLedgers()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsLedger::class, 'folio_account');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsLedger1s()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsLedger::class, 'post_account');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsLineItems()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsLineItem::class, 'account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsTransactions()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsTransaction::class, 'account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ifrsVats()
    {
        return $this->hasMany(\App\Models\Accounting\IfrsVat::class, 'account_id');
    }
}

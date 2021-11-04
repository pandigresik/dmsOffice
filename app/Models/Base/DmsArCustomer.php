<?php

namespace App\Models\Base;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @SWG\Definition(
 *      definition="DmsArCustomer",
 *      required={"iId", "szId", "szName", "szDescription", "szHierarchyId", "szHierarchyFull", "szIDCard", "bHasDifferentCollectAddress", "szCode", "szUserCreatedId", "szUserUpdatedId", "dtmCreated", "dtmLastUpdated", "szMCOId"},
 *      @SWG\Property(
 *          property="iInternalId",
 *          description="iInternalId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="iId",
 *          description="iId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szId",
 *          description="szId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szName",
 *          description="szName",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDescription",
 *          description="szDescription",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szUserCreatedId",
 *          description="szUserCreatedId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szUserUpdatedId",
 *          description="szUserUpdatedId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dtmCreated",
 *          description="dtmCreated",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="dtmLastUpdated",
 *          description="dtmLastUpdated",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class DmsArCustomer extends Model
{
    use HasFactory;

    const CREATED_AT = 'dtmCreated';
    const UPDATED_AT = 'dtmLastUpdated';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'dms_ar_customer';

    public $primaryKey = 'iInternalId';
    public $fillable = [
        'iId',
        'szId',
        'szName',
        'szDescription',
        'szHierarchyId',
        'szHierarchyFull',
        'szIDCard',
        'bHasDifferentCollectAddress',
        'szCode',
        // 'szUserCreatedId',
        // 'szUserUpdatedId',
        // 'dtmCreated',
        // 'dtmLastUpdated',
        'szMCOId',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'iId' => 'required|string|max:50',
        'szId' => 'required|string|max:50',
        'szName' => 'required|string|max:50',
        // 'szDescription' => 'required|string|max:200',
        // 'szHierarchyId' => 'required|string|max:200',
        // 'szHierarchyFull' => 'required|string|max:1000',
        // 'szIDCard' => 'required|string|max:50',
        // 'bHasDifferentCollectAddress' => 'required|boolean',
        // 'szCode' => 'required|string|max:50',
        // 'szUserCreatedId' => 'required|string|max:20',
        // 'szUserUpdatedId' => 'required|string|max:20',
        // 'dtmCreated' => 'required',
        // 'dtmLastUpdated' => 'required',
        'szMCOId' => 'required|string|max:50',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'iInternalId' => 'integer',
        'iId' => 'string',
        'szId' => 'string',
        'szName' => 'string',
        'szDescription' => 'string',
        'szHierarchyId' => 'string',
        'szHierarchyFull' => 'string',
        'szIDCard' => 'string',
        'bHasDifferentCollectAddress' => 'boolean',
        'szCode' => 'string',
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
        'dtmCreated' => 'datetime',
        'dtmLastUpdated' => 'datetime',
        'szMCOId' => 'string',
    ];

    /**
     * Get all of the contactCustomers for the DmsArCustomer.
     */
    public function contactCustomers(): HasMany
    {
        return $this->hasMany(ContactCustomer::class, 'dms_ar_customer_id', 'iInternalId');
    }

    /**
     * Get all of the locationCustomers for the DmsArCustomer.
     */
    public function locationCustomers(): HasMany
    {
        return $this->hasMany(LocationCustomer::class, 'dms_ar_customer_id', 'iInternalId');
    }
}

<?php

namespace App\Models\Base;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DmsArDoccustomer",
 *      required={"iId", "szDocId", "dtmDoc", "szCustomerId", "szName", "bNewCustomer", "szIDCard", "bHasDifferentCollectAddress", "intPrintedCount", "szBranchId", "szCompanyId", "szDocStatus", "szHierarchyId", "szHierarchyFull", "szDocFUpId", "szUserCreatedId", "szUserUpdatedId", "dtmCreated", "dtmLastUpdated"},
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
class DmsArDoccustomer extends Model
{
    use HasFactory;

    const CREATED_AT = 'dtmCreated';
    const UPDATED_AT = 'dtmLastUpdated';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'dms_ar_doccustomer';

    public $primaryKey = 'iInternalId';
    public $fillable = [
        'iId',
        'szDocId',
        'dtmDoc',
        'szCustomerId',
        'szName',
        'bNewCustomer',
        'szIDCard',
        'bHasDifferentCollectAddress',
        'intPrintedCount',
        'szBranchId',
        'szCompanyId',
        'szDocStatus',
        'szHierarchyId',
        'szHierarchyFull',
        'szDocFUpId',
        //'szUserCreatedId',
        // 'szUserUpdatedId',
        //'dtmCreated',
        //'dtmLastUpdated',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'iId' => 'required|string|max:50',
        'szDocId' => 'required|string|max:50',
        'dtmDoc' => 'required',
        'szCustomerId' => 'required|string|max:50',
        'szName' => 'required|string|max:50',
        'bNewCustomer' => 'required|boolean',
        'szIDCard' => 'required|string|max:50',
        'bHasDifferentCollectAddress' => 'required|boolean',
        'intPrintedCount' => 'required|integer',
        'szBranchId' => 'required|string|max:50',
        'szCompanyId' => 'required|string|max:50',
        'szDocStatus' => 'required|string|max:50',
        'szHierarchyId' => 'required|string|max:50',
        'szHierarchyFull' => 'required|string|max:1000',
        'szDocFUpId' => 'required|string|max:50',
        'szUserCreatedId' => 'required|string|max:20',
        'szUserUpdatedId' => 'required|string|max:20',
        'dtmCreated' => 'required',
        'dtmLastUpdated' => 'required',
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
        'szDocId' => 'string',
        'dtmDoc' => 'datetime',
        'szCustomerId' => 'string',
        'szName' => 'string',
        'bNewCustomer' => 'boolean',
        'szIDCard' => 'string',
        'bHasDifferentCollectAddress' => 'boolean',
        'intPrintedCount' => 'integer',
        'szBranchId' => 'string',
        'szCompanyId' => 'string',
        'szDocStatus' => 'string',
        'szHierarchyId' => 'string',
        'szHierarchyFull' => 'string',
        'szDocFUpId' => 'string',
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
        'dtmCreated' => 'datetime',
        'dtmLastUpdated' => 'datetime',
    ];
}

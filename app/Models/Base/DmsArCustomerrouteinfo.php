<?php

namespace App\Models\Base;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DmsArCustomerrouteinfo",
 *      required={"iId", "szId", "intItemNumber", "szRouteType", "szEmployeeId", "bMon", "bTue", "bWed", "bThu", "bFri", "bSat", "bSun", "bWeek1", "bWeek2", "bWeek3", "bWeek4", "szUserCreatedId", "szUserUpdatedId", "dtmCreated", "dtmLastUpdated"},
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
class DmsArCustomerrouteinfo extends Model
{
    use HasFactory;

    const CREATED_AT = 'dtmCreated';
    const UPDATED_AT = 'dtmLastUpdated';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'dms_ar_customerrouteinfo';

    public $primaryKey = 'iInternalId';
    public $fillable = [
        'iId',
        'szId',
        'intItemNumber',
        'szRouteType',
        'szEmployeeId',
        'bMon',
        'bTue',
        'bWed',
        'bThu',
        'bFri',
        'bSat',
        'bSun',
        'bWeek1',
        'bWeek2',
        'bWeek3',
        'bWeek4',
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
        'szId' => 'required|string|max:50',
        'intItemNumber' => 'required|integer',
        'szRouteType' => 'required|string|max:20',
        'szEmployeeId' => 'required|string|max:50',
        'bMon' => 'required|boolean',
        'bTue' => 'required|boolean',
        'bWed' => 'required|boolean',
        'bThu' => 'required|boolean',
        'bFri' => 'required|boolean',
        'bSat' => 'required|boolean',
        'bSun' => 'required|boolean',
        'bWeek1' => 'required|boolean',
        'bWeek2' => 'required|boolean',
        'bWeek3' => 'required|boolean',
        'bWeek4' => 'required|boolean',
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
        'szId' => 'string',
        'intItemNumber' => 'integer',
        'szRouteType' => 'string',
        'szEmployeeId' => 'string',
        'bMon' => 'boolean',
        'bTue' => 'boolean',
        'bWed' => 'boolean',
        'bThu' => 'boolean',
        'bFri' => 'boolean',
        'bSat' => 'boolean',
        'bSun' => 'boolean',
        'bWeek1' => 'boolean',
        'bWeek2' => 'boolean',
        'bWeek3' => 'boolean',
        'bWeek4' => 'boolean',
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
        'dtmCreated' => 'datetime',
        'dtmLastUpdated' => 'datetime',
    ];
}

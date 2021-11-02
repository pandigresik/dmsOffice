<?php

namespace App\Models\Sales;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DmsSdRouteitem",
 *      required={"iId", "szId", "intItemNumber", "szCustomerId", "intDay1", "intDay2", "intDay3", "intDay4", "intDay5", "intDay6", "intDay7", "intWeek1", "intWeek2", "intWeek3", "intWeek4"},
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
 *          property="szCombinationId",
 *          description="szCombinationId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szCompanyId",
 *          description="szCompanyId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dtmValidFrom",
 *          description="dtmValidFrom",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="dtmValidTo",
 *          description="dtmValidTo",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="intPriority",
 *          description="intPriority",
 *          type="integer",
 *          format="int32"
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
class DmsSdRouteitem extends Model
{
    use HasFactory;

    const CREATED_AT = 'dtmCreated';
    const UPDATED_AT = 'dtmLastUpdated';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'dms_sd_routeitem';

    public $primaryKey = 'iInternalId';
    public $fillable = [
        'iId',
        'szId',
        'intItemNumber',
        'szCustomerId',
        'intDay1',
        'intDay2',
        'intDay3',
        'intDay4',
        'intDay5',
        'intDay6',
        'intDay7',
        'intWeek1',
        'intWeek2',
        'intWeek3',
        'intWeek4',
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
        'szCustomerId' => 'required|string|max:50',
        'intDay1' => 'required|integer',
        'intDay2' => 'required|integer',
        'intDay3' => 'required|integer',
        'intDay4' => 'required|integer',
        'intDay5' => 'required|integer',
        'intDay6' => 'required|integer',
        'intDay7' => 'required|integer',
        'intWeek1' => 'required|integer',
        'intWeek2' => 'required|integer',
        'intWeek3' => 'required|integer',
        'intWeek4' => 'required|integer',
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
        'szCustomerId' => 'string',
        'intDay1' => 'integer',
        'intDay2' => 'integer',
        'intDay3' => 'integer',
        'intDay4' => 'integer',
        'intDay5' => 'integer',
        'intDay6' => 'integer',
        'intDay7' => 'integer',
        'intWeek1' => 'integer',
        'intWeek2' => 'integer',
        'intWeek3' => 'integer',
        'intWeek4' => 'integer',
    ];
}

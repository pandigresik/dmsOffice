<?php

namespace App\Models\Base;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DmsSmAddressinfo",
 *      required={"iId", "szObjectId", "szId", "szAddress", "szProvince", "szCity", "szDistrict", "szSubDistrict", "szZipCode", "szPhone1", "szPhone2", "szPhone3", "szFaximile", "szContactPerson1", "szContactPerson2", "szEmail", "szLongitude", "szLatitude", "szAddress2", "szUserCreatedId", "szUserUpdatedId", "dtmCreated", "dtmLastUpdated"},
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
 *          property="szObjectId",
 *          description="szObjectId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szId",
 *          description="szId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szAddress",
 *          description="szAddress",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szProvince",
 *          description="szProvince",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szCity",
 *          description="szCity",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDistrict",
 *          description="szDistrict",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szSubDistrict",
 *          description="szSubDistrict",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szZipCode",
 *          description="szZipCode",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szPhone1",
 *          description="szPhone1",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szPhone2",
 *          description="szPhone2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szPhone3",
 *          description="szPhone3",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szFaximile",
 *          description="szFaximile",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szContactPerson1",
 *          description="szContactPerson1",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szContactPerson2",
 *          description="szContactPerson2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szEmail",
 *          description="szEmail",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szLongitude",
 *          description="szLongitude",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szLatitude",
 *          description="szLatitude",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szAddress2",
 *          description="szAddress2",
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
class DmsSmAddressinfo extends Model
{     

    public $table = 'dms_sm_addressinfo';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    

    public $fillable = [
        'iId',
        'szObjectId',
        'szId',
        'szAddress',
        'szProvince',
        'szCity',
        'szDistrict',
        'szSubDistrict',
        'szZipCode',
        'szPhone1',
        'szPhone2',
        'szPhone3',
        'szFaximile',
        'szContactPerson1',
        'szContactPerson2',
        'szEmail',
        'szLongitude',
        'szLatitude',
        'szAddress2',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'iInternalId' => 'integer',
        'iId' => 'string',
        'szObjectId' => 'string',
        'szId' => 'string',
        'szAddress' => 'string',
        'szProvince' => 'string',
        'szCity' => 'string',
        'szDistrict' => 'string',
        'szSubDistrict' => 'string',
        'szZipCode' => 'string',
        'szPhone1' => 'string',
        'szPhone2' => 'string',
        'szPhone3' => 'string',
        'szFaximile' => 'string',
        'szContactPerson1' => 'string',
        'szContactPerson2' => 'string',
        'szEmail' => 'string',
        'szLongitude' => 'string',
        'szLatitude' => 'string',
        'szAddress2' => 'string',
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
        'dtmCreated' => 'datetime',
        'dtmLastUpdated' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'iId' => 'required|string|max:50',
        'szObjectId' => 'required|string|max:50',
        'szId' => 'required|string|max:50',
        'szAddress' => 'required|string|max:1000',
        'szProvince' => 'required|string|max:50',
        'szCity' => 'required|string|max:50',
        'szDistrict' => 'required|string|max:50',
        'szSubDistrict' => 'required|string|max:50',
        'szZipCode' => 'required|string|max:50',
        'szPhone1' => 'required|string|max:50',
        'szPhone2' => 'required|string|max:50',
        'szPhone3' => 'required|string|max:50',
        'szFaximile' => 'required|string|max:50',
        'szContactPerson1' => 'required|string|max:50',
        'szContactPerson2' => 'required|string|max:50',
        'szEmail' => 'required|string|max:50',
        'szLongitude' => 'required|string|max:20',
        'szLatitude' => 'required|string|max:20',
        'szAddress2' => 'required|string|max:1000',
        'szUserCreatedId' => 'required|string|max:20',
        'szUserUpdatedId' => 'required|string|max:20',
        'dtmCreated' => 'required',
        'dtmLastUpdated' => 'required'
    ];

    public function getFullAddressAttribute($value){

        return implode(' ', [$this->attributes['szAddress'], $this->attributes['szSubDistrict'], $this->attributes['szDistrict'], $this->attributes['szCity']]);
    }
}

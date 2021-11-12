<?php

namespace App\Models\Base;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DmsSmBranch",
 *      required={"szId", "szName", "szDescription", "szCompanyId", "szLangitude", "szLongitude", "szTaxEntityId", "szProvince", "szCity", "szDistrict", "szSubDistrict", "szUserCreatedId", "szUserUpdatedId"},
 *      @SWG\Property(
 *          property="iInternalId",
 *          description="iInternalId",
 *          type="integer",
 *          format="int32"
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
 *          property="szCompanyId",
 *          description="szCompanyId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szLangitude",
 *          description="szLangitude",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szLongitude",
 *          description="szLongitude",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szTaxEntityId",
 *          description="szTaxEntityId",
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
 *          property="szUserCreatedId",
 *          description="szUserCreatedId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szUserUpdatedId",
 *          description="szUserUpdatedId",
 *          type="string"
 *      )
 * )
 */
class DmsSmBranch extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'dms_sm_branch';

    public $primaryKey = 'iInternalId';
    public $fillable = [
        'szId',
        'szName',
        'szDescription',
        'szCompanyId',
        'szLangitude',
        'szLongitude',
        'szTaxEntityId',
        'szProvince',
        'szCity',
        'szDistrict',
        'szSubDistrict',
        'szUserCreatedId',
        'szUserUpdatedId',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'szId' => 'required|string|max:50',
        'szName' => 'required|string|max:50',
        'szDescription' => 'required|string|max:200',
        'szCompanyId' => 'required|string|max:20',
        'szLangitude' => 'required|string|max:50',
        'szLongitude' => 'required|string|max:50',
        'szTaxEntityId' => 'required|string|max:50',
        'szProvince' => 'required|string|max:5000',
        'szCity' => 'required|string|max:5000',
        'szDistrict' => 'required|string|max:5000',
        'szSubDistrict' => 'required|string|max:5000',
        'szUserCreatedId' => 'required|string|max:20',
        'szUserUpdatedId' => 'required|string|max:20',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'iInternalId' => 'integer',
        'szId' => 'string',
        'szName' => 'string',
        'szDescription' => 'string',
        'szCompanyId' => 'string',
        'szLangitude' => 'string',
        'szLongitude' => 'string',
        'szTaxEntityId' => 'string',
        'szProvince' => 'string',
        'szCity' => 'string',
        'szDistrict' => 'string',
        'szSubDistrict' => 'string',
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
    ];
}

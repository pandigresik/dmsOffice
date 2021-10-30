<?php

namespace App\Models\Base;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="ContactSupplier",
 *      required={"dms_ap_supplier_id", "name", "city"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="dms_ap_supplier_id",
 *          description="dms_ap_supplier_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="position",
 *          description="position",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone",
 *          description="phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mobile",
 *          description="mobile",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="city",
 *          description="city",
 *          type="string"
 *      )
 * )
 */
class ContactSupplier extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contact_supplier';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'dms_ap_supplier_id',
        'name',
        'position',
        'email',
        'phone',
        'mobile',
        'description',
        'address',
        'city'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dms_ap_supplier_id' => 'integer',
        'name' => 'string',
        'position' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'mobile' => 'string',
        'description' => 'string',
        'address' => 'string',
        'city' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dms_ap_supplier_id' => 'required|integer',
        'name' => 'required|string|max:50',
        'position' => 'nullable|string|max:50',
        'email' => 'nullable|string|max:50',
        'phone' => 'nullable|string|max:50',
        'mobile' => 'nullable|string|max:50',
        'description' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'city' => 'required|string|max:50'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dmsApSupplier()
    {
        return $this->belongsTo(\App\Models\Base\DmsApSupplier::class, 'dms_ap_supplier_id');
    }
}

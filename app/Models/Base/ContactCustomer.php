<?php

namespace App\Models\Base;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ContactCustomer",
 *      required={"dms_ar_customer_id", "name", "city"},
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
class ContactCustomer extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'contact_customer';
    public $fillable = [
        'dms_ar_customer_id',
        'name',
        'position',
        'email',
        'phone',
        'mobile',
        'description',
        'address',
        'city',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'dms_ar_customer_id' => 'required|integer',
        'name' => 'required|string|max:50',
        'position' => 'nullable|string|max:50',
        'email' => 'nullable|string|max:50',
        'phone' => 'nullable|string|max:50',
        'mobile' => 'nullable|string|max:50',
        'description' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'city' => 'required|string|max:50',
    ];
    protected $appends = ['state_form'];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dms_ar_customer_id' => 'integer',
        'name' => 'string',
        'position' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'mobile' => 'string',
        'description' => 'string',
        'address' => 'string',
        'city' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dmsArCustomer()
    {
        return $this->belongsTo(\App\Models\Base\DmsArCustomer::class, 'dms_ar_customer_id');
    }

    /**
     * Determine state form.
     *
     * @return bool
     */
    public function getStateFormAttribute()
    {
        return $this->attributes['id'] ? 'update' : 'insert';
    }
}

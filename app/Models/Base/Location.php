<?php

namespace App\Models\Base;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Location",
 *      required={"name", "district", "city", "type"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="district",
 *          description="district",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="city",
 *          description="city",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      )
 * )
 */
class Location extends Model
{
    use SoftDeletes;

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const REFERENCE_TYPE = [
        'origin' => 'supplier',
        'destination' => 'warehouse',
        'common' => '',
    ];
    public $table = 'location';

    public $fillable = [
        'name',
        'district',
        'city',
        'type',
        'reference_id',
        'reference_type',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:80',
        'district' => 'required|string|max:50',
        'city' => 'required|string|max:50',
        'type' => 'required|string',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'district' => 'string',
        'city' => 'string',
        'type' => 'string',
    ];

    public function getFullIdentityAttribute($value)
    {
        return $this->attributes['name'].' ( '.$this->attributes['reference_id'].' ) , '.$this->attributes['district'].' '.$this->attributes['city'];
    }
}

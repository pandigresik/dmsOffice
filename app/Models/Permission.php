<?php

namespace App\Models;
use App\Traits\SearchModelTrait;
use Spatie\Permission\Models\Permission as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Permission",
 *      required={"name", "guard_name"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="guard_name",
 *          description="guard_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Permission extends Model
{
    use HasFactory;
    use SearchModelTrait;    
    /**
     * Indicates if the IDs are UUIDs.
     *
     * @var bool
     */
    protected $keyIsUuid = false;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    protected $keyType = 'int';            
    protected $showColumnOption = 'name';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';    
    
    public $fillable = [
        'name',
        'guard_name',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'guard_name' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
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
        'guard_name' => 'string',
    ];

    /**
     * Get the value of showColumnOption
     */ 
    public function getShowColumnOption()
    {
        return $this->showColumnOption ?? $this->getKeyName();
    }
}

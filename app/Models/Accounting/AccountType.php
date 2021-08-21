<?php

namespace App\Models\Accounting;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="AccountType",
 *      required={"name", "type", "internal_group"},
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
 *          property="code",
 *          description="code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="company_id",
 *          description="company_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="is_off_balance",
 *          description="is_off_balance",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="reconcile",
 *          description="reconcile",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="internal_type",
 *          description="internal_type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="internal_group",
 *          description="internal_group",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="note",
 *          description="note",
 *          type="string"
 *      )
 * )
 */
class AccountType extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'account_type';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'include_initial_balance',
        'type',
        'internal_group',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'include_initial_balance' => 'boolean',
        'type' => 'string',
        'internal_group' => 'string',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:50',
        'include_initial_balance' => 'nullable|boolean',
        'type' => 'required|string',
        'internal_group' => 'required|string',
        'note' => 'nullable|string|max:50'
    ];

    
}

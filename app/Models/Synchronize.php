<?php

namespace App\Models;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Synchronize",
 *      required={"table_name"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="table_name",
 *          description="table_name",
 *          type="string"
 *      )
 * )
 */
class Synchronize extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'synchronize';

    

    public $fillable = [
        'table_name',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'table_name' => 'required|string|max:60',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'table_name' => 'string',
    ];
}

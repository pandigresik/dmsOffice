<?php

namespace App\Models\Base;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Currency",
 *      required={""},
 *      @SWG\Property(
 *          property="country",
 *          description="country",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="currency",
 *          description="currency",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="code",
 *          description="code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="symbol",
 *          description="symbol",
 *          type="string"
 *      )
 * )
 */
class Currency extends Model
{ 

    public $table = 'currency';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $showColumnOption = 'country';
    protected $primaryKey = 'code';

    protected $dates = ['deleted_at'];



    public $fillable = [
        'country',
        'currency',
        'code',
        'symbol'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'country' => 'string',
        'currency' => 'string',
        'code' => 'string',
        'symbol' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country' => 'nullable|string|max:100',
        'currency' => 'nullable|string|max:100',
        'code' => 'nullable|string|max:100',
        'symbol' => 'nullable|string|max:100'
    ];

    
}

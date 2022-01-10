<?php

namespace App\Models\Finance;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="AccountMove",
 *      required={"number", "date", "reference"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="number",
 *          description="number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="date",
 *          description="date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="reference",
 *          description="reference",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="narration",
 *          description="narration",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="string"
 *      )
 * )
 */
class AccountMove extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'account_move';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    

    public $fillable = [
        'number',
        'date',
        'reference',
        'narration',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'number' => 'string',
        'date' => 'date',
        'reference' => 'string',
        'narration' => 'string',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [        
        'date' => 'required',
        'reference' => 'required|string|max:80',
        'narration' => 'nullable|string',
        'state' => 'nullable|string|max:15'
    ];

    public function getNextNumber()
    {
        $pattern = 'AM/'.date('Ym').'/';
        $columnReference = 'number';
        $sequenceLength = 5;
        $nextId = $this->where($columnReference, 'like', $pattern.'%')->max($columnReference);
        $nextId = !$nextId ? 1 : intval(substr($nextId, strlen($nextId) - $sequenceLength)) + 1;
        $newId = [$pattern, str_pad($nextId, $sequenceLength, '0', STR_PAD_LEFT)];

        return implode('', $newId);
    }
}

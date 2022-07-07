<?php

namespace App\Models\Accounting;

use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="JournalAccountDetail",
 *      required={"journal_account_id", "account_id", "date"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="journal_account_id",
 *          description="journal_account_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="account_id",
 *          description="account_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="date",
 *          description="date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="branch_id",
 *          description="branch_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="additional_info",
 *          description="additional_info",
 *          type="string"
 *      )
 * )
 */
class JournalAccountDetail extends Model
{
    use HasFactory;

    public $table = 'journal_account_detail';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const CREATED_BY = NULL;
    const UPDATED_BY = NULL;


    protected $dates = ['deleted_at'];    

    public $fillable = [
        'journal_account_id',
        'account_id',
        'date',
        'branch_id',
        'additional_info'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'journal_account_id' => 'integer',
        'account_id' => 'string',
        'date' => 'date',
        'branch_id' => 'string',
        'additional_info' => 'json'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'journal_account_id' => 'required',
        'account_id' => 'required|string|max:15',
        'date' => 'required',
        'branch_id' => 'nullable|string|max:50',
        'additional_info' => 'nullable|string'
    ];

    
}

<?php

namespace App\Models\Inventory;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="SynchronizeOutStockPicking",
 *      required={"Tgl_BTB", "No_BTB", "ID_Vendor", "Nama_Vendor", "Nama_PT", "No_CO", "No_DN", "Tgl_sjp", "Depo", "Nama_Produk"},
 *      @SWG\Property(
 *          property="Tgl_BTB",
 *          description="Tgl_BTB",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="No_BTB",
 *          description="No_BTB",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ID_Vendor",
 *          description="ID_Vendor",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Nama_Vendor",
 *          description="Nama_Vendor",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Nama_PT",
 *          description="Nama_PT",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="No_CO",
 *          description="No_CO",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="No_DN",
 *          description="No_DN",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Tgl_sjp",
 *          description="Tgl_sjp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Depo",
 *          description="Depo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Nama_Produk",
 *          description="Nama_Produk",
 *          type="string"
 *      )
 * )
 */
class SynchronizeOutStockPicking extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'btb_view_tmp';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Tgl_BTB',
        'No_BTB',
        'ID_Vendor',
        'Nama_Vendor',
        'Nama_PT',
        'No_CO',
        'No_DN',
        'Tgl_sjp',
        'Depo',
        'Nama_Produk'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Tgl_BTB' => 'string',
        'No_BTB' => 'string',
        'ID_Vendor' => 'integer',
        'Nama_Vendor' => 'string',
        'Nama_PT' => 'string',
        'No_CO' => 'integer',
        'No_DN' => 'integer',
        'Tgl_sjp' => 'string',
        'Depo' => 'string',
        'Nama_Produk' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Tgl_BTB' => 'required|string|max:10',
        'No_BTB' => 'required|string|max:11',
        'ID_Vendor' => 'required',
        'Nama_Vendor' => 'required|string|max:20',
        'Nama_PT' => 'required|string|max:3',
        'No_CO' => 'required',
        'No_DN' => 'required',
        'Tgl_sjp' => 'required|string|max:10',
        'Depo' => 'required|string|max:8',
        'Nama_Produk' => 'required|string|max:5'
    ];

    
}

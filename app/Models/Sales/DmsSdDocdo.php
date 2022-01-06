<?php

namespace App\Models\Sales;

use App\Models\Base\DmsSmBranch;
use App\Models\Base\DmsArCustomer;
use App\Models\Base\DmsPiEmployee;
use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="DmsSdDocdo",
 *      required={"iId", "szDocId", "dtmDoc", "szCustomerId", "szEmployeeId", "szOrderTypeId", "bCash", "bInvoiced", "szPaymentTermId", "szDocSoId", "szCarrier", "szVehicleId", "szHelper1", "szHelper2", "bDirectWarehouse", "szWarehouseId", "szStockTypeId", "szCustomerPO", "dtmCustomerPO", "szSalesId", "szDocStockOutCustomerId", "szReturnFromId", "szVehicle2", "szDriver2", "szVehicle3", "szDriver3", "szDescription", "szPromoDesc", "intPrintedCount", "szBranchId", "szCompanyId", "szDocStatus", "szUserCreatedId", "szUserUpdatedId", "dtmCreated", "dtmLastUpdated", "dtmMobileTransaction", "szMobileId", "szManualNo"},
 *      @SWG\Property(
 *          property="iInternalId",
 *          description="iInternalId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="iId",
 *          description="iId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDocId",
 *          description="szDocId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dtmDoc",
 *          description="dtmDoc",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="szCustomerId",
 *          description="szCustomerId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szEmployeeId",
 *          description="szEmployeeId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szOrderTypeId",
 *          description="szOrderTypeId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bCash",
 *          description="bCash",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="bInvoiced",
 *          description="bInvoiced",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="szPaymentTermId",
 *          description="szPaymentTermId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDocSoId",
 *          description="szDocSoId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szCarrier",
 *          description="szCarrier",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szVehicleId",
 *          description="szVehicleId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szHelper1",
 *          description="szHelper1",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szHelper2",
 *          description="szHelper2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bDirectWarehouse",
 *          description="bDirectWarehouse",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="szWarehouseId",
 *          description="szWarehouseId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szStockTypeId",
 *          description="szStockTypeId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szCustomerPO",
 *          description="szCustomerPO",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dtmCustomerPO",
 *          description="dtmCustomerPO",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="szSalesId",
 *          description="szSalesId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDocStockOutCustomerId",
 *          description="szDocStockOutCustomerId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szReturnFromId",
 *          description="szReturnFromId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szVehicle2",
 *          description="szVehicle2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDriver2",
 *          description="szDriver2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szVehicle3",
 *          description="szVehicle3",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDriver3",
 *          description="szDriver3",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDescription",
 *          description="szDescription",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szPromoDesc",
 *          description="szPromoDesc",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="intPrintedCount",
 *          description="intPrintedCount",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="szBranchId",
 *          description="szBranchId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szCompanyId",
 *          description="szCompanyId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szDocStatus",
 *          description="szDocStatus",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szUserCreatedId",
 *          description="szUserCreatedId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szUserUpdatedId",
 *          description="szUserUpdatedId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dtmCreated",
 *          description="dtmCreated",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="dtmLastUpdated",
 *          description="dtmLastUpdated",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="dtmMobileTransaction",
 *          description="dtmMobileTransaction",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="szMobileId",
 *          description="szMobileId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="szManualNo",
 *          description="szManualNo",
 *          type="string"
 *      )
 * )
 */
class DmsSdDocdo extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'dms_sd_docdo';
    private $countedDiscount = 0;
    public $fillable = [
        'iId',
        'szDocId',
        'dtmDoc',
        'szCustomerId',
        'szEmployeeId',
        'szOrderTypeId',
        'bCash',
        'bInvoiced',
        'szPaymentTermId',
        'szDocSoId',
        'szCarrier',
        'szVehicleId',
        'szHelper1',
        'szHelper2',
        'bDirectWarehouse',
        'szWarehouseId',
        'szStockTypeId',
        'szCustomerPO',
        'dtmCustomerPO',
        'szSalesId',
        'szDocStockOutCustomerId',
        'szReturnFromId',
        'szVehicle2',
        'szDriver2',
        'szVehicle3',
        'szDriver3',
        'szDescription',
        'szPromoDesc',
        'intPrintedCount',
        'szBranchId',
        'szCompanyId',
        'szDocStatus',
        'szUserCreatedId',
        'szUserUpdatedId',
        'dtmCreated',
        'dtmLastUpdated',
        'dtmMobileTransaction',
        'szMobileId',
        'szManualNo',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'iId' => 'required|string|max:50',
        'szDocId' => 'required|string|max:50',
        'dtmDoc' => 'required',
        'szCustomerId' => 'required|string|max:50',
        'szEmployeeId' => 'required|string|max:50',
        'szOrderTypeId' => 'required|string|max:50',
        'bCash' => 'required|boolean',
        'bInvoiced' => 'required|boolean',
        'szPaymentTermId' => 'required|string|max:50',
        'szDocSoId' => 'required|string|max:50',
        'szCarrier' => 'required|string|max:50',
        'szVehicleId' => 'required|string|max:50',
        'szHelper1' => 'required|string|max:50',
        'szHelper2' => 'required|string|max:50',
        'bDirectWarehouse' => 'required|boolean',
        'szWarehouseId' => 'required|string|max:50',
        'szStockTypeId' => 'required|string|max:50',
        'szCustomerPO' => 'required|string|max:50',
        'dtmCustomerPO' => 'required',
        'szSalesId' => 'required|string|max:50',
        'szDocStockOutCustomerId' => 'required|string|max:50',
        'szReturnFromId' => 'required|string|max:50',
        'szVehicle2' => 'required|string|max:50',
        'szDriver2' => 'required|string|max:50',
        'szVehicle3' => 'required|string|max:50',
        'szDriver3' => 'required|string|max:50',
        'szDescription' => 'required|string|max:500',
        'szPromoDesc' => 'required|string|max:500',
        'intPrintedCount' => 'required|integer',
        'szBranchId' => 'required|string|max:50',
        'szCompanyId' => 'required|string|max:50',
        'szDocStatus' => 'required|string|max:50',
        'szUserCreatedId' => 'required|string|max:20',
        'szUserUpdatedId' => 'required|string|max:20',
        'dtmCreated' => 'required',
        'dtmLastUpdated' => 'required',
        'dtmMobileTransaction' => 'required',
        'szMobileId' => 'required|string|max:50',
        'szManualNo' => 'required|string|max:50',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'iInternalId' => 'integer',
        'iId' => 'string',
        'szDocId' => 'string',
        'dtmDoc' => 'datetime',
        'szCustomerId' => 'string',
        'szEmployeeId' => 'string',
        'szOrderTypeId' => 'string',
        'bCash' => 'boolean',
        'bInvoiced' => 'boolean',
        'szPaymentTermId' => 'string',
        'szDocSoId' => 'string',
        'szCarrier' => 'string',
        'szVehicleId' => 'string',
        'szHelper1' => 'string',
        'szHelper2' => 'string',
        'bDirectWarehouse' => 'boolean',
        'szWarehouseId' => 'string',
        'szStockTypeId' => 'string',
        'szCustomerPO' => 'string',
        'dtmCustomerPO' => 'datetime',
        'szSalesId' => 'string',
        'szDocStockOutCustomerId' => 'string',
        'szReturnFromId' => 'string',
        'szVehicle2' => 'string',
        'szDriver2' => 'string',
        'szVehicle3' => 'string',
        'szDriver3' => 'string',
        'szDescription' => 'string',
        'szPromoDesc' => 'string',
        'intPrintedCount' => 'integer',
        'szBranchId' => 'string',
        'szCompanyId' => 'string',
        'szDocStatus' => 'string',
        'szUserCreatedId' => 'string',
        'szUserUpdatedId' => 'string',
        'dtmCreated' => 'datetime',
        'dtmLastUpdated' => 'datetime',
        'dtmMobileTransaction' => 'datetime',
        'szMobileId' => 'string',
        'szManualNo' => 'string',
    ];

    /**
     * Get all of the items for the DmsSdDocdo.
     *
     * @return \Illuminate\Database\Relations\HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(DmsSdDocdoItem::class, 'szDocId', 'szDocId');
    }

    /**
     * Get the customer that owns the DmsSdDocdo.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(DmsArCustomer::class, 'szCustomerId', 'szId');
    }

    /**
     * Get the sales that owns the DmsSdDocdo.
     */
    public function sales(): BelongsTo
    {
        return $this->belongsTo(DmsPiEmployee::class, 'szSalesId', 'szId');
    }

    /**
     * Get the depo that owns the DmsSdDocdo.
     */
    public function depo(): BelongsTo
    {
        return $this->belongsTo(DmsSmBranch::class, 'szBranchId', 'szId');
    }

    /**
     * Get the value of countedDiscount
     */ 
    public function getCountedDiscount()
    {
        return $this->countedDiscount;
    }

    /**
     * Set the value of countedDiscount
     *
     * @return  self
     */ 
    public function setCountedDiscount($countedDiscount)
    {
        $this->countedDiscount = $countedDiscount;

        return $this;
    }
}

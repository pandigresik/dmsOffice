<?php

namespace App\Models\Accounting;

use App\Models\Base\Setting;
use App\Models\BaseEntity as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="JournalAccount",
 *      required={"account_id", "branch_id", "name", "debit", "credit", "balance"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="account_id",
 *          description="account_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="branch_id",
 *          description="branch_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="debit",
 *          description="debit",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="credit",
 *          description="credit",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="balance",
 *          description="balance",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="string"
 *      )
 * )
 */
class JournalAccount extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'journal_account';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    

    public $fillable = [
        'account_id',
        'branch_id',
        'date',
        'name',
        'debit',
        'credit',
        'balance',
        'reference',
        'type',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'account_id' => 'string',
        'branch_id' => 'string',
        'name' => 'string',
        'debit' => 'decimal:2',
        'credit' => 'decimal:2',
        'balance' => 'decimal:2',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'account_id' => 'required|string|max:15',
        'branch_id' => 'required|string|max:50',
        'name' => 'required|string|max:100',
        'debit' => 'required|numeric',
        'credit' => 'required|numeric',
        'balance' => 'required|numeric',
        'state' => 'nullable|string|max:15'
    ];

    /**
     * Get the account that owns the JournalAccount
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id', 'code');
    }

    public function jurnalBiaya($input){
        list($startDate, $endDate) = explode('__', $input['period_range']);
        $branchId = $input['branch_id'];
        $type = $input['type'];
        $sql = <<<SQL
            insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, reference, type) 
            SELECT szAccountId, account.name, decDebit, decCredit, decAmount, dtmDoc, szBranchId, szDocId, '{$type}' 
            FROM dms_cas_cashbalance 
            join account on account.code = dms_cas_cashbalance.szAccountId
            join report_setting_account_detail on report_setting_account_detail.account_id = account.id
            join report_setting_account on report_setting_account.id = report_setting_account_detail.report_setting_account_id 
                and report_setting_account.group_type = 'LR' and report_setting_account.code in ('LR-05', 'LR-06')
            where szBranchId = '{$branchId}'             
            and dtmDoc between '{$startDate}' and '{$endDate}'
            union all 
            -- account cashback
            SELECT '829220', account.name, decCredit, decDebit, (-1 * decAmount), dtmDoc, szBranchId, szDocId, '{$type}' 
            FROM dms_cas_cashbalance 
            join account on account.code = dms_cas_cashbalance.szAccountId
            where szBranchId = '{$branchId}' and szAccountId = '829207'
            and dtmDoc between '{$startDate}' and '{$endDate}'
        SQL;
        $this->fromQuery($sql);
    }

    public function jurnalPenjualanTunai($input){        
        $settingCompany = Setting::pluck('value', 'code');        
        $kodeGalon = "'".implode("','",explode(',',$settingCompany["kode_galon"]))."'";
        $coaPenjualanTunai = $settingCompany['coa_penjualan_tunai'];
        $coaGalonTunai  = $settingCompany["coa_galon_tunai"];
        $coaPotDistTunai = $settingCompany["coa_pot_dist_tunai"];
        $coaPotIntTunai = $settingCompany["coa_pot_int_tunai"];        
        $coaPotTivTunai = $settingCompany["coa_pot_tiv_tunai"];
        list($startDate, $endDate) = explode('__', $input['period_range']);
        $branchId = $input['branch_id'];
        $type = $input['type'];

        $sql = <<<SQL
            insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, reference, type) 
            select x.coa, account.name, debit, credit, amount, dtmDoc, szBranchId, szDocId, '{$type}' from (
            -- penjualan produk
            select case 
                    when di.szProductId in ({$kodeGalon}) then $coaGalonTunai                         
                    else $coaPenjualanTunai
                end as coa,
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, (abs(dip.decPrice) * di.decQty) as debit, 0 as credit, (dip.decPrice * di.decQty) as amount , do.szDocId 
            from dms_sd_docdo do
            join dms_sd_docdoitem di on di.szDocId = do.szDocId
            join dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and do.bCash = 1 
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
            union all
            -- potongan distributor
            select '{$coaPotDistTunai}' as coa,
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, dip.decDiscDistributor as credit, -1 * dip.decDiscDistributor as amount , do.szDocId 
            from dms_sd_docdo do
            join dms_sd_docdoitem di on di.szDocId = do.szDocId
            join dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and dip.decDiscDistributor > 0  and do.bCash = 1
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
            union all
            -- potongan internal
            select '{$coaPotIntTunai}' as coa,
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, dip.decDiscInternal as credit, -1 * dip.decDiscInternal as amount , do.szDocId 
            from dms_sd_docdo do
            join dms_sd_docdoitem di on di.szDocId = do.szDocId
            join dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and dip.decDiscInternal > 0  and do.bCash = 1 
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
            -- potongan TIV
            union all
            select '{$coaPotTivTunai}' as coa,
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, bkd.principle_amount as credit, -1 * bkd.principle_amount as amount , do.szDocId 
            from dms_sd_docdo do
            join dms_sd_docdoitem di on di.szDocId = do.szDocId
            join bkb_discount_details bkd on bkd.szDocId = do.szDocId and bkd.szProductId = di.szProductId and bkd.szBranchId = '{$branchId}'
            where do.szDocStatus = 'Applied' and do.bCash = 1
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'            
            )x 
            join account on account.code = x.coa
            join report_setting_account_detail on report_setting_account_detail.account_id = account.id
            join report_setting_account on report_setting_account.id = report_setting_account_detail.report_setting_account_id 
            and report_setting_account.group_type = 'LR' and report_setting_account.code in ('LR-01')
                        
        SQL;
        $this->fromQuery($sql);
    }

    public function jurnalPenjualanKredit($input){        
        $settingCompany = Setting::pluck('value', 'code');                
        $kodeGalon = "'".implode("','",explode(',',$settingCompany["kode_galon"]))."'";        
        $coaPenjualanKredit = $settingCompany["coa_penjualan_kredit"];
        $coaGalonKredit = $settingCompany["coa_galon_kredit"];        
        $coaPotDistKredit = $settingCompany["coa_pot_dist_kredit"];
        $coaPotIntKredit = $settingCompany["coa_pot_int_kredit"];
        $coaPotTivKredit = $settingCompany["coa_pot_tiv_kredit"];
        
        list($startDate, $endDate) = explode('__', $input['period_range']);
        $branchId = $input['branch_id'];
        $type = $input['type'];

        $sql = <<<SQL
            insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, reference, type) 
            select x.coa, account.name, debit, credit, amount, dtmDoc, szBranchId, szDocId, '{$type}' from (
            -- penjualan produk
            select case 
                    when di.szProductId in ({$kodeGalon}) then $coaGalonKredit
                    else $coaPenjualanKredit
                end as coa,
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, (abs(dip.decPrice) * di.decQty) as debit, 0 as credit, (dip.decPrice * di.decQty) as amount , do.szDocId 
            from dms_sd_docdo do
            join dms_sd_docdoitem di on di.szDocId = do.szDocId
            join dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and do.bCash = 0
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
            union all
            -- potongan distributor
            select '{$coaPotDistKredit}' as coa,
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, dip.decDiscDistributor as credit, -1 * dip.decDiscDistributor as amount , do.szDocId 
            from dms_sd_docdo do
            join dms_sd_docdoitem di on di.szDocId = do.szDocId
            join dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and dip.decDiscDistributor > 0  and do.bCash = 0
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
            union all
            -- potongan internal
            select '{$coaPotIntKredit}' as coa,
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, dip.decDiscInternal as credit, -1 * dip.decDiscInternal as amount , do.szDocId 
            from dms_sd_docdo do
            join dms_sd_docdoitem di on di.szDocId = do.szDocId
            join dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and dip.decDiscInternal > 0  and do.bCash = 0
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
            -- potongan TIV
            union all
            select '{$coaPotTivKredit}' as coa,
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, bkd.principle_amount as credit, -1 * bkd.principle_amount as amount , do.szDocId 
            from dms_sd_docdo do
            join dms_sd_docdoitem di on di.szDocId = do.szDocId
            join bkb_discount_details bkd on bkd.szDocId = do.szDocId and bkd.szProductId = di.szProductId and bkd.szBranchId = '{$branchId}'
            where do.szDocStatus = 'Applied' and do.bCash = 0
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
            )x 
            join account on account.code = x.coa
            join report_setting_account_detail on report_setting_account_detail.account_id = account.id
            join report_setting_account on report_setting_account.id = report_setting_account_detail.report_setting_account_id 
            and report_setting_account.group_type = 'LR' and report_setting_account.code in ('LR-02')
                        
        SQL;
        $this->fromQuery($sql);
    }

    public function jurnalPembelian($input){        
        $settingCompany = Setting::pluck('value', 'code');        
        $marginDpp = $settingCompany["margin_dpp"];
        $kodeGalon = "'".implode("','",explode(',',$settingCompany["kode_galon"]))."'";        

        list($startDate, $endDate) = explode('__', $input['period_range']);
        $branchId = $input['branch_id'];
        $type = $input['type'];

        $sql = <<<SQL
            insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, reference, type)             
            select x.coa, account.name, debit, credit, amount, dtmDoc, szBranchId, szDocId, '{$type}' from (
            select case 
                    when di.szProductId in ({$kodeGalon}) then 'HPPGKP'
                    else 'HPPP'
                end as coa,
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, di.decQty * (dip.decPrice - {$marginDpp}) as debit, 0 as credit, di.decQty * (dip.decPrice - {$marginDpp}) as amount, do.szDocId 
            from dms_sd_docdo do
            join dms_sd_docdoitem di on di.szDocId = do.szDocId
            join dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and dip.decPrice > $marginDpp
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
            )x 
            join account on account.code = x.coa
            join report_setting_account_detail on report_setting_account_detail.account_id = account.id
            join report_setting_account on report_setting_account.id = report_setting_account_detail.report_setting_account_id 
            and report_setting_account.group_type = 'LR' and report_setting_account.code in ('LR-03')            
            -- menghitung hpp pabrik untuk PT
            union all            
            select y.coa, 'HPP PABRIK', debit, credit, amount, dtmDoc, szBranchId, szDocId, '{$type}' from (
            select 'HPPPT' as coa
                ,do.dtmDoc, do.bCash, do.szBranchId, di.szProductId
                , di.decQty * coalesce((select ppl.price from product_price_log ppl where ppl.product_id = di.szProductId and ppl.start_date <= do.dtmDoc and (ppl.end_date is null or ppl.end_date >= do.dtmDoc) order by id desc limit 1), 0) as debit
                , 0 as credit
                , di.decQty * coalesce((select ppl.price from product_price_log ppl where ppl.product_id = di.szProductId and ppl.start_date <= do.dtmDoc and (ppl.end_date is null or ppl.end_date >= do.dtmDoc) order by id desc limit 1), 0) as amount
                , do.szDocId 
            from dms_sd_docdo do
            join dms_sd_docdoitem di on di.szDocId = do.szDocId
            join dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber and dip.decPrice > 0
            where do.szDocStatus = 'Applied' 
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
            )y
        SQL;
        $this->fromQuery($sql);
    }

}

<?php

namespace App\Models\Accounting;

use App\Models\Base\Setting;
use App\Models\BaseEntity as Model;
use App\Models\Finance\AccountMove;
use App\Models\Finance\AccountMoveLine;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $table = 'journal_account';
    public $fillable = [
        'account_id',
        'branch_id',
        'date',
        'name',
        'description',
        'debit',
        'credit',
        'balance',
        'reference',
        'type',
        'state',
    ];

    /**
     * Validation rules.
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
        'state' => 'nullable|string|max:15',
    ];

    protected $dates = ['deleted_at'];

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
        'state' => 'string',
    ];

    /**
     * Get the account that owns the JournalAccount.
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id', 'code');
    }

    public function manual(): HasManyThrough
    {
        return $this->hasManyThrough(AccountMoveLine::class, AccountMove::class, 'number','account_move_id', 'reference', 'id');
    }
    /**
     * Get the detail associated with the JournalAccount
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail(): HasOne
    {
        return $this->hasOne(JournalAccountDetail::class, 'journal_account_id');
    }

    public function jurnalBiaya($input)
    {        
        $settingCompany = Setting::pluck('value', 'code');
        $coaCashback = $settingCompany['coa_cashback']; // 829220
        $coaBiayaPromosi = $settingCompany['coa_biaya_promosi']; // 829207
        list($startDate, $endDate) = explode('__', $input['period_range']);
        $branchId = $input['branch_id'];
        
        $user = \Auth::user();
        $gudangPusat = config('entity.gudangPusat')[$user->entity_id];
        $dbSource = '';
        if(isset($gudangPusat[$branchId])){
            $dbSource = 'gdpusat.';
        }
        $type = $input['type'];
        $sql = <<<SQL
            insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, reference, type, created_at, description) 
            SELECT szAccountId, account.name, decDebit, decCredit, decAmount, dtmDoc, szBranchId, szDocId, '{$type}' , now(), szDescription
            FROM {$dbSource}dms_cas_cashbalance 
            join account on account.code = {$dbSource}dms_cas_cashbalance.szAccountId
            join report_setting_account_detail on report_setting_account_detail.account_id = account.id
            join report_setting_account on report_setting_account.id = report_setting_account_detail.report_setting_account_id 
                and report_setting_account.group_type = 'LR' and report_setting_account.code in ('LR-06', 'LR-07')
            where szBranchId = '{$branchId}'             
            and dtmDoc between '{$startDate}' and '{$endDate}'
            union all 
            -- account cashback
            SELECT '{$coaCashback}', account.name, decCredit, decDebit, (-1 * decAmount), dtmDoc, szBranchId, szDocId, '{$type}', now(), szDescription
            FROM {$dbSource}dms_cas_cashbalance 
            join account on account.code = {$dbSource}dms_cas_cashbalance.szAccountId
            where szBranchId = '{$branchId}' and szAccountId = '{$coaBiayaPromosi}'
            and dtmDoc between '{$startDate}' and '{$endDate}'
            union all
            -- account kas ke kas dan jaminan pelanggan untuk GL
            SELECT account.code, account.name, decCredit, decDebit, decAmount, dtmDoc, szBranchId, szDocId, '{$type}', now(), szDescription
            FROM {$dbSource}dms_cas_cashbalance 
            join account on account.code = {$dbSource}dms_cas_cashbalance.szAccountId
            where szBranchId = '{$branchId}' and szAccountId in ('110902','311100')
            and dtmDoc between '{$startDate}' and '{$endDate}'
        SQL;
        $this->fromQuery($sql);
    }

    public function jurnalNeraca($input)
    {
        list($startDate, $endDate) = explode('__', $input['period_range']);
        $branchId = $input['branch_id'];
        $type = $input['type'];

        $user = \Auth::user();
        $gudangPusat = config('entity.gudangPusat')[$user->entity_id];
        $dbSource = '';
        if(isset($gudangPusat[$branchId])){
            $dbSource = 'gdpusat.';
        }
        $sql = <<<SQL
            insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, reference, type, created_at, description) 
            SELECT szAccountId, account.name, decDebit, decCredit, decAmount, dtmDoc, szBranchId, szDocId, '{$type}' , now(), szDescription
            FROM {$dbSource}dms_cas_cashbalance 
            join account on account.code = {$dbSource}dms_cas_cashbalance.szAccountId
            join report_setting_account_detail on report_setting_account_detail.account_id = account.id
            join report_setting_account on report_setting_account.id = report_setting_account_detail.report_setting_account_id 
                and report_setting_account.group_type = 'NRC'
            where szBranchId = '{$branchId}'             
            and dtmDoc between '{$startDate}' and '{$endDate}'            
            and szAccountId not in ('130120')
        SQL;
        $this->fromQuery($sql);
    }

    public function jurnalNeracaNonGL($input)
    {
        list($startDate, $endDate) = explode('__', $input['period_range']);
        $branchId = $input['branch_id'];
        $type = $input['type'];

        $user = \Auth::user();
        $gudangPusat = config('entity.gudangPusat')[$user->entity_id];
        $dbSource = '';
        if(isset($gudangPusat[$branchId])){
            $dbSource = 'gdpusat.';
        }
        // gak bisa pakai cara saldo ini, karena saldo itu per account tapi tidak per depo
        $accountCode = '130120';
        $saldoAwal = AccountBalance::whereBalanceDate($startDate)
            ->where('code', $accountCode)
            ->first();
        // $saldoPiutang = $saldoAwal->getRawOriginal('amount') ?? 0;          
        $saldoPiutang = 0;

        $sql = <<<SQL
            insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, reference, type, created_at, description) 
            select '130120','Piutang Dagang Kredit ', sum(SISA_INVOICE) as debit, 0 as credit,sum(SISA_INVOICE) as balance, '{$endDate}',x.szBranchId,'-','{$type}' , now(), 'sisa invoice'  from (
                SELECT
                A.decRemain - (SELECT IFNULL(SUM(A1.decAmount), 0) FROM dms_ar_arhistory AS A1 WHERE A1.szInvoiceId = A.szDocId AND A1.szTrnId <> 'INV' AND A1.dtmDoc >= '{$endDate}') AS 'SISA_INVOICE'                  
                , c.szBranchId
                FROM
                {$dbSource}DMS_AR_ArInvoice AS A  
                 JOIN {$dbSource}dms_sd_docinvoice AS c ON c.szDocId = a.szDocId
                WHERE
                A.bCash = 0
                AND a.dtmDoc < '{$endDate}'                
                AND c.szBranchId = '{$branchId}'     
                AND CASE WHEN (A.decRemain - (SELECT IFNULL(SUM(A1.decAmount), 0) FROM {$dbSource}dms_ar_arhistory AS A1 WHERE A1.szInvoiceId = A.szDocId AND A1.szTrnId <> 'INV' AND A1.dtmDoc >= '{$endDate}')) = 0 THEN '1' ELSE '0' END = 0
                
                )x group by x.szBranchId
                union all
                select '130130', 'Piutang TIV', 0 as debit, abs(dip.decDiscPrinciple) as credit,  dip.decDiscPrinciple as balance , do.dtmDoc, do.szBranchId, do.szDocId,'{$type}' , now(), 'Piutang TIV Discount Principle'
            from dms_sd_docdo do
            join dms_sd_docdoitem di on di.szDocId = do.szDocId
            join dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            -- join bkb_discount_details bkd on bkd.szDocId = do.szDocId and bkd.szProductId = di.szProductId and bkd.szBranchId = '{$branchId}'
            -- where do.szDocStatus = 'Applied' and do.bCash = 0
            where do.szDocStatus = 'Applied' and abs(dip.decDiscPrinciple) > 0
            and do.szBranchId = '{$branchId}'
            and do.dtmDoc between '{$startDate}' and '{$endDate}'
SQL;
        $this->fromQuery($sql);
    }

    public function jurnalPenjualanTunai($input)
    {
        $settingCompany = Setting::pluck('value', 'code');
        $kodeGalon = "'".implode("','", explode(',', $settingCompany['kode_galon']))."'";
        $coaPenjualanTunai = $settingCompany['coa_penjualan_tunai'];
        $coaGalonTunai = $settingCompany['coa_galon_tunai'];
        $coaPotDistTunai = $settingCompany['coa_pot_dist_tunai'];
        $coaPotIntTunai = $settingCompany['coa_pot_int_tunai'];
        $coaPotTivTunai = $settingCompany['coa_pot_tiv_tunai'];
        $coaPotGalonDistTunai = $settingCompany['coa_potgal_int_t'];
        $coaPotGalonIntTunai = $settingCompany['coa_potgal_dist_t'];
        $coaPotGalonTivTunai = $settingCompany['coa_potgal_tiv_t'];

        list($startDate, $endDate) = explode('__', $input['period_range']);
        $branchId = $input['branch_id'];
        $type = $input['type'];

        $user = \Auth::user();
        $gudangPusat = config('entity.gudangPusat')[$user->entity_id];
        $dbSource = '';
        if(isset($gudangPusat[$branchId])){
            $dbSource = 'gdpusat.';
        }
        $sql = <<<SQL
            insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, description, reference, type, created_at) 
            select x.coa, account.name, debit, credit, amount, dtmDoc, szBranchId, szProductId, szDocId, '{$type}', now() from (
            -- penjualan produk
            select case 
                    when di.szProductId in ({$kodeGalon}) then {$coaGalonTunai}                         
                    else {$coaPenjualanTunai}
                end as coa,
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, (abs(dip.decPrice) * di.decQty) as debit, 0 as credit, (dip.decPrice * di.decQty) as amount , do.szDocId 
            from {$dbSource}dms_sd_docdo do
            join {$dbSource}dms_sd_docdoitem di on di.szDocId = do.szDocId and di.szOrderItemTypeId not in ('PRODSUPP')
            join {$dbSource}dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and do.bCash = 1
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
            union all
            -- potongan distributor             
            select case 
                    when di.szProductId in ({$kodeGalon}) then '{$coaPotGalonDistTunai}'
                    else '{$coaPotDistTunai}'
                end as coa,
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, abs(dip.decDiscDistributor) as credit, -1 * dip.decDiscDistributor as amount , do.szDocId 
            from {$dbSource}dms_sd_docdo do
            join {$dbSource}dms_sd_docdoitem di on di.szDocId = do.szDocId
            join {$dbSource}dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and abs(dip.decDiscDistributor) > 0  and do.bCash = 1
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'                
                -- and di.szProductId not in ({$kodeGalon})
            union all
            -- potongan internal
            select case 
                    when di.szProductId in ({$kodeGalon}) then '{$coaPotGalonIntTunai}'
                    else '{$coaPotIntTunai}'
                end as coa,            
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, abs(dip.decDiscInternal) as credit, -1 * dip.decDiscInternal as amount , do.szDocId 
            from {$dbSource}dms_sd_docdo do
            join {$dbSource}dms_sd_docdoitem di on di.szDocId = do.szDocId
            join {$dbSource}dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and abs(dip.decDiscInternal) > 0  and do.bCash = 1 
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
                -- and di.szProductId not in ({$kodeGalon})
            -- potongan TIV
            union all
            select case 
                    when di.szProductId in ({$kodeGalon}) then '{$coaPotGalonTivTunai}'
                    else '{$coaPotTivTunai}'
                end as coa,            
                -- do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, bkd.principle_amount as credit, -1 * bkd.principle_amount as amount , do.szDocId 
                    do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, abs(dip.decDiscPrinciple) as credit, -1 * dip.decDiscPrinciple as amount , do.szDocId 
            from {$dbSource}dms_sd_docdo do
            join {$dbSource}dms_sd_docdoitem di on di.szDocId = do.szDocId
            join {$dbSource}dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            -- join bkb_discount_details bkd on bkd.szDocId = do.szDocId and bkd.szProductId = di.szProductId and bkd.szBranchId = '{$branchId}'
            -- where do.szDocStatus = 'Applied' and do.bCash = 1
             where do.szDocStatus = 'Applied' and do.bCash = 1 and abs(dip.decDiscPrinciple) > 0
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}' 
                -- and di.szProductId not in ({$kodeGalon})           
            )x 
            join account on account.code = x.coa
            join report_setting_account_detail on report_setting_account_detail.account_id = account.id
            join report_setting_account on report_setting_account.id = report_setting_account_detail.report_setting_account_id 
            and report_setting_account.group_type = 'LR' and report_setting_account.code in ('LR-01')
                        
        SQL;
        $this->fromQuery($sql);
    }

    public function jurnalPenjualanKredit($input)
    {
        $settingCompany = Setting::pluck('value', 'code');
        $kodeGalon = "'".implode("','", explode(',', $settingCompany['kode_galon']))."'";
        $coaPenjualanKredit = $settingCompany['coa_penjualan_kredit'];
        $coaGalonKredit = $settingCompany['coa_galon_kredit'];
        $coaPotDistKredit = $settingCompany['coa_pot_dist_kredit'];
        $coaPotIntKredit = $settingCompany['coa_pot_int_kredit'];
        $coaPotTivKredit = $settingCompany['coa_pot_tiv_kredit'];
        $coaPotGalonDistKredit = $settingCompany['coa_potgal_int_k'];
        $coaPotGalonIntKredit = $settingCompany['coa_potgal_dist_k'];
        $coaPotGalonTivKredit = $settingCompany['coa_potgal_tiv_k'];

        list($startDate, $endDate) = explode('__', $input['period_range']);
        $branchId = $input['branch_id'];
        $type = $input['type'];
        
        $user = \Auth::user();
        $gudangPusat = config('entity.gudangPusat')[$user->entity_id];
        $dbSource = '';
        if(isset($gudangPusat[$branchId])){
            $dbSource = 'gdpusat.';
        }
        $sql = <<<SQL
            insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, description, reference, type, created_at) 
            select x.coa, account.name, debit, credit, amount, dtmDoc, szBranchId, szProductId, szDocId, '{$type}', now() from (
            -- penjualan produk
            select case 
                    when di.szProductId in ({$kodeGalon}) then {$coaGalonKredit}
                    else {$coaPenjualanKredit}
                end as coa,
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, (abs(dip.decPrice) * di.decQty) as debit, 0 as credit, (dip.decPrice * di.decQty) as amount , do.szDocId 
            from {$dbSource}dms_sd_docdo do
            join {$dbSource}dms_sd_docdoitem di on di.szDocId = do.szDocId and di.szOrderItemTypeId not in ('PRODSUPP')
            join {$dbSource}dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and do.bCash = 0 
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
            union all
            -- potongan distributor
            select case 
                    when di.szProductId in ({$kodeGalon}) then '{$coaPotGalonDistKredit}'
                    else '{$coaPotDistKredit}'
                end as coa,            
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, abs(dip.decDiscDistributor) as credit, -1 * dip.decDiscDistributor as amount , do.szDocId 
            from {$dbSource}dms_sd_docdo do
            join {$dbSource}dms_sd_docdoitem di on di.szDocId = do.szDocId
            join {$dbSource}dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and abs(dip.decDiscDistributor) > 0  and do.bCash = 0
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
                -- and di.szProductId not in ({$kodeGalon})
            union all
            -- potongan internal
            select case 
                    when di.szProductId in ({$kodeGalon}) then '{$coaPotGalonIntKredit}'
                    else '{$coaPotIntKredit}'
                end as coa,            
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, abs(dip.decDiscInternal) as credit, -1 * dip.decDiscInternal as amount , do.szDocId 
            from {$dbSource}dms_sd_docdo do
            join {$dbSource}dms_sd_docdoitem di on di.szDocId = do.szDocId
            join {$dbSource}dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and abs(dip.decDiscInternal) > 0  and do.bCash = 0
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
                -- and di.szProductId not in ({$kodeGalon})
            -- potongan TIV
            union all
            select case 
                    when di.szProductId in ({$kodeGalon}) then '{$coaPotGalonTivKredit}'
                    else '{$coaPotTivKredit}'
                end as coa,            
              --  do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, bkd.principle_amount as credit, -1 * bkd.principle_amount as amount , do.szDocId 
                  do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 0 as debit, abs(dip.decDiscPrinciple) as credit, -1 * dip.decDiscPrinciple as amount , do.szDocId 
            from {$dbSource}dms_sd_docdo do
            join {$dbSource}dms_sd_docdoitem di on di.szDocId = do.szDocId
            join {$dbSource}dms_sd_docdoitemprice dip on dip.szDocId = do.szDocId and dip.intItemNumber = di.intItemNumber
            -- join bkb_discount_details bkd on bkd.szDocId = do.szDocId and bkd.szProductId = di.szProductId and bkd.szBranchId = '{$branchId}'
            -- where do.szDocStatus = 'Applied' and do.bCash = 0
            where do.szDocStatus = 'Applied' and do.bCash = 0 and abs(dip.decDiscPrinciple) > 0
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
                -- and di.szProductId not in ({$kodeGalon})                
            )x 
            join account on account.code = x.coa
            join report_setting_account_detail on report_setting_account_detail.account_id = account.id
            join report_setting_account on report_setting_account.id = report_setting_account_detail.report_setting_account_id 
            and report_setting_account.group_type = 'LR' and report_setting_account.code in ('LR-02')
                        
        SQL;
        $this->fromQuery($sql);
    }

    public function jurnalPPNKeluaran($input)
    {
        $settingCompany = Setting::pluck('value', 'code');
        $coaGalonKredit = $settingCompany['coa_galon_kredit'];
        $coaGalonTunai = $settingCompany['coa_galon_tunai'];
        $coaPotGalonDistTunai = $settingCompany['coa_potgal_int_t'];
        $coaPotGalonIntTunai = $settingCompany['coa_potgal_dist_t'];
        $coaPotGalonTivTunai = $settingCompany['coa_potgal_tiv_t'];
        $coaPotGalonDistKredit = $settingCompany['coa_potgal_int_k'];
        $coaPotGalonIntKredit = $settingCompany['coa_potgal_dist_k'];
        $coaPotGalonTivKredit = $settingCompany['coa_potgal_tiv_k'];
        $coaGalon = implode("','",[$coaGalonKredit, $coaGalonTunai, $coaPotGalonDistTunai, $coaPotGalonIntTunai, $coaPotGalonTivTunai, $coaPotGalonDistKredit, $coaPotGalonIntKredit, $coaPotGalonTivKredit]);
        // $coaPenjualanKredit = $settingCompany["coa_penjualan_kredit"];
        // $coaPenjualanTunai = $settingCompany['coa_penjualan_tunai'];
        $coaPpnKeluaran = $settingCompany['coa_ppn_keluaran'];   // 213001
        $besarPPN = $settingCompany['ppn_prosentase'];
        $pembagiPPN = $settingCompany['ppn_pembagi'];
        list($startDate, $endDate) = explode('__', $input['period_range']);
        $branchId = $input['branch_id'];
        $type = $input['type'];

        $sql = <<<SQL
            insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, reference, type, created_at)
            select '{$coaPpnKeluaran}' as account_id, name, ({$besarPPN} * debit) as debit, credit,({$besarPPN} * balance) as balance,date, branch_id, reference, type, now()
            from journal_account 
            where type = '{$type}' and branch_id = '{$branchId}' and date between '{$startDate}' and '{$endDate}'
            and account_id in ('{$coaGalon}')
        SQL;
        $this->fromQuery($sql);

        $sql = <<<SQL
            update journal_account set debit = debit / {$pembagiPPN}, balance = balance / {$pembagiPPN}
            where type = '{$type}' and branch_id = '{$branchId}' and date between '{$startDate}' and '{$endDate}'
            and account_id not in ('{$coaGalon}','{$coaPpnKeluaran}')
        SQL;
        $this->fromQuery($sql);
    }

    public function jurnalPembelian($input)
    {
        $settingCompany = Setting::pluck('value', 'code');
        $marginDpp = $settingCompany['margin_dpp'];
        $kodeGalon = "'".implode("','", explode(',', $settingCompany['kode_galon']))."'";
        $pembagiPPN = $settingCompany['ppn_pembagi'];
        list($startDate, $endDate) = explode('__', $input['period_range']);
        $branchId = $input['branch_id'];
        $type = $input['type'];

        $user = \Auth::user();
        $gudangPusat = config('entity.gudangPusat')[$user->entity_id];
        $dbSource = '';
        if(isset($gudangPusat[$branchId])){
            $dbSource = 'gdpusat.';
        }
        $sql = <<<SQL
            insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, description, reference, type, created_at)             
            select x.coa, account.name, debit , credit , amount , dtmDoc, szBranchId, szProductId, szDocId, '{$type}',now() from (
            select case 
                    when di.szProductId in ({$kodeGalon}) then 'HPPGKP'
                    else 'HPPP'
                end as coa,
                do.dtmDoc, do.bCash, do.szBranchId, di.szProductId, 
                case 
                    when di.szProductId in ({$kodeGalon}) then abs(di.decQty * dip.decPrice)
                    else abs(di.decQty * coalesce((select ppl.branch_price from product_price_log ppl where ppl.product_id = di.szProductId and ppl.start_date <= do.dtmDoc and (ppl.end_date is null or ppl.end_date >= do.dtmDoc) order by id desc limit 1) - {$marginDpp},0)) / {$pembagiPPN}
                end as debit,
                0 as credit, 
                case 
                    when di.szProductId in ({$kodeGalon}) then di.decQty * dip.decPrice
                    else di.decQty * coalesce((select ppl.branch_price from product_price_log ppl where ppl.product_id = di.szProductId and ppl.start_date <= do.dtmDoc and (ppl.end_date is null or ppl.end_date >= do.dtmDoc) order by id desc limit 1) - {$marginDpp},0) / {$pembagiPPN}
                end as amount,        
                do.szDocId 
            from {$dbSource}dms_sd_docdo do
            join {$dbSource}dms_sd_docdoitem di on di.szDocId = do.szDocId  and di.szOrderItemTypeId not in ('PRODSUPP')
            join {$dbSource}dms_sd_docdoitemprice dip on dip.szDocId = di.szDocId and dip.intItemNumber = di.intItemNumber
            where do.szDocStatus = 'Applied' and abs(dip.decPrice) > 0
                and do.szBranchId = '{$branchId}'
                and do.dtmDoc between '{$startDate}' and '{$endDate}'
            )x 
            join account on account.code = x.coa
            join report_setting_account_detail on report_setting_account_detail.account_id = account.id
            join report_setting_account on report_setting_account.id = report_setting_account_detail.report_setting_account_id 
            and report_setting_account.group_type = 'LR' and report_setting_account.code in ('LR-03')            
        SQL;
        $this->fromQuery($sql);
    }

    public function jurnalHutangBTB($btbs){
        $settingCompany = Setting::pluck('value', 'code');
        $coaPersediaanGalon = $settingCompany['coa_sedia_galon'];
        $coaPersediaanNonGalon = $settingCompany['coa_sedia_nogalon'];        
        $coaHutangTIV = $settingCompany['coa_hutang_dagang'];
            
        $coaPpnMasukan = $settingCompany['coa_ppn_masukan'];   // 213001
        $besarPPN = $settingCompany['ppn_prosentase'];
        $pembagiPPN = $settingCompany['ppn_pembagi'];
        $kodeGalon = "'".implode("','", explode(',', $settingCompany['kode_galon']))."'";
        $productNonPPnMasukan = "'".implode("','", explode(',', $settingCompany['product_non_ppn']))."'";

        $btbStr = implode("','", $btbs->flatten()->all());
        /** untuk OA perlu didistinct karena perhitungannya hanya sekali saja */
        $sql = <<<SQL
        insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, reference, type, created_at)
        select distinct 825010, 'Biaya Pengangkutan', shipping_cost, 0, shipping_cost, btb_date, branch_id, doc_id, 'JBTB', now()
        from btb_validate 
        where doc_id in ('{$btbStr}')  and shipping_cost > 0
        union all        
        select distinct 211104, 'Hutang ongkos angkut', shipping_cost, 0, shipping_cost, btb_date, branch_id, doc_id, 'JBTB', now()
        from btb_validate 
        where doc_id in ('{$btbStr}')  and shipping_cost > 0                
        -- persediaan galon
        union all        
        select '{$coaPersediaanGalon}', 'Persediaan Galon Botol', abs(price * qty), 0, price * qty, btb_date, branch_id, doc_id, 'JBTB', now()
        from btb_validate 
        where doc_id in ('{$btbStr}')  and price > 0 and product_id in ({$kodeGalon})
        -- persediaan non galon
        union all        
        select '{$coaPersediaanNonGalon}', 'Persediaan Non Galon', abs(price * qty / {$pembagiPPN}), 0, price * qty / {$pembagiPPN}, btb_date, branch_id, doc_id, 'JBTB', now()
        from btb_validate 
        where doc_id in ('{$btbStr}')  and price > 0 and product_id not in ({$kodeGalon})
        -- ppn masukan
        union all        
        select '{$coaPpnMasukan}', 'PPN Masukan', abs((price / {$pembagiPPN}) * qty * {$besarPPN}), 0, (price / {$pembagiPPN}) * qty * {$besarPPN}, btb_date, branch_id, doc_id, 'JBTB', now()
        from btb_validate 
        where doc_id in ('{$btbStr}')  and price > 0 and product_id not in ({$productNonPPnMasukan})
        -- hutang dagang TIV
        union all        
        select '{$coaHutangTIV}', 'Hutang Dagang TIV', abs(price * qty), 0, price * qty, btb_date, branch_id, doc_id, 'JBTB', now()
        from btb_validate 
        where doc_id in ('{$btbStr}')  and price > 0
        -- subsidi OA 
        union all
        insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, reference, type, created_at)
        select distinct 140302, 'Subsidi OA', bs.amount, 0, bs.amount, bv.btb_date, bv.branch_id, bv.doc_id, 'JBTB', now()
        from btb_shipping_cost_subsidies bs
        join btb_validate bv on bv.doc_id = bs.doc_id 
        where bs.doc_in in ('{$btbStr}')
        -- union all
        -- insert into journal_account (account_id, name, debit, credit, balance,date, branch_id, reference, type, created_at)
        -- select distinct 910300, 'Pendapatan Subsidi Oa', bs.amount, 0, bs.amount, bv.btb_date, bv.branch_id, bv.doc_id, 'JBTB', now()
        -- from btb_shipping_cost_subsidies bs
        -- join btb_validate bv on bv.doc_id = bs.doc_id 
        -- where bs.doc_in in ('{$btbStr}')
SQL;
        $this->fromQuery($sql);
    }
}

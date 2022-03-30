-- mutasi in
select x.* from (
select case 
            when didi.szProductId in ('74560G','74559G') then 'HPPGKP'
            else 'HPPP'
        end as coa,
        did.dtmDoc,
        did.szBranchId, didi.szProductId, 
        didi.decQty,
        didi.decQty * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductId and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstockinbranch did 
join dms_inv_docstockinbranchitem didi on didi.szDocId = did.szDocId  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555'
)x order by x.coa, x.dtmDoc

-- mutasi out
select x.* from (
select case 
            when didi.szProductId in ('74560G','74559G') then 'HPPGKP'
            else 'HPPP'
        end as coa,
        did.dtmDoc,
        did.szBranchId, didi.szProductId, 
        didi.decQty,
        didi.decQty * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductId and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstockoutbranch did 
join dms_inv_docstockoutbranchitem didi on didi.szDocId = did.szDocId  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555'
)x order by x.coa, x.dtmDoc

-- distribution in
select x.* from (
select case 
            when didi.szProductId in ('74560G','74559G') then 'HPPGKP'
            else 'HPPP'
        end as coa,
        did.dtmDoc,
        did.szBranchId, didi.szProductId, 
        didi.decQty,
        didi.decQty * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductId and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstockindistribution did 
join dms_inv_docstockindistributionitem didi on didi.szDocId = did.szDocId  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555'
)x order by x.coa, x.dtmDoc

-- distribusi out
select x.* from (
select case 
            when didi.szProductId in ('74560G','74559G') then 'HPPGKP'
            else 'HPPP'
        end as coa,
        did.dtmDoc,
        did.szBranchId, didi.szProductId, 
        didi.decQty,
        didi.decQty * coalesce((select ppl.dpp_price from product_price_log ppl where ppl.product_id = didi.szProductId and ppl.start_date <= did.dtmDoc and (ppl.end_date is null or ppl.end_date >= did.dtmDoc) order by id desc limit 1), 0) as amount
from dms_inv_docstockoutdistribution did 
join dms_inv_docstockoutdistributionitem didi on didi.szDocId = did.szDocId  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555'
)x order by x.coa, x.dtmDoc


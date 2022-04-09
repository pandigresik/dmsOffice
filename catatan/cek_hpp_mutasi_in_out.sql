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



select x.szBranchId,
		x.szProductId,
		sum(case when x.jenis = 'MI' then x.qty else 0 end) as 'MI',
		sum(case when x.jenis = 'MO' then x.qty else 0 end) as 'MO',
		sum(case when x.jenis = 'DI' then x.qty else 0 end) as 'DI',
		sum(case when x.jenis = 'DO' then x.qty else 0 end) as 'DO',
		sum(case when x.jenis = 'SI' then x.qty else 0 end) as 'SI',
		sum(case when x.jenis = 'SO' then x.qty else 0 end) as 'SO'	
from (

select 	did.szBranchId, 
		didi.szProductId, 
        sum(didi.decQty) as qty,
        'MI' as jenis
from dms_inv_docstockinbranch did 
join dms_inv_docstockinbranchitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555'
GROUP  by did.szBranchId ,didi.szProductId 
union all
select 	did.szBranchId, 
		didi.szProductId, 
        sum(didi.decQty) as qty,
        'MO' as jenis
from dms_inv_docstockoutbranch did 
join dms_inv_docstockoutbranchitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555'
GROUP  by did.szBranchId ,didi.szProductId 
union all
select 	did.szBranchId, 
		didi.szProductId, 
        sum(didi.decQty) as qty,
        'DI' as jenis
from dms_inv_docstockindistribution did 
join dms_inv_docstockindistributionitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555'
GROUP  by did.szBranchId ,didi.szProductId 
union all
select 	did.szBranchId, 
		didi.szProductId, 
        sum(didi.decQty) as qty,
        'DO' as jenis
from dms_inv_docstockoutdistribution did 
join dms_inv_docstockoutdistributionitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555'
GROUP  by did.szBranchId ,didi.szProductId 
union all
select 	did.szBranchId, 
		didi.szProductId, 
        sum(didi.decQty) as qty,
        'SO' as jenis
from dms_sd_docdo did 
join dms_sd_docdoitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555' and did.szDocStatus = 'Applied' 
GROUP  by did.szBranchId ,didi.szProductId 
union all
select 	did.szBranchId, 
		didi.szProductId, 
        sum(didi.decQty) as qty,
        'SI' as jenis
from dms_inv_docstockinsupplier did
join dms_inv_docstockinsupplieritem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555' and did.szDocStatus = 'Applied' 
GROUP  by did.szBranchId ,didi.szProductId 
)x GROUP  by x.szBranchId ,x.szProductId



select  dip.szId,
		x.szBranchId,
		x.szProductId,
		sum(case when x.jenis = 'MI' then x.qty else 0 end) as 'MI',
		sum(case when x.jenis = 'MO' then x.qty else 0 end) as 'MO',
		sum(case when x.jenis = 'DI' then x.qty else 0 end) as 'DI',
		sum(case when x.jenis = 'DO' then x.qty else 0 end) as 'DO',
		sum(case when x.jenis = 'SI' then x.qty else 0 end) as 'SI',
		sum(case when x.jenis = 'SO' then x.qty else 0 end) as 'SO'	
from (
select 	did.szBranchId, 
		didi.szProductId, 
        sum(didi.decQty) as qty,
        'MI' as jenis
from dms_inv_docstockinbranch did 
join dms_inv_docstockinbranchitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555'
GROUP  by did.szBranchId ,didi.szProductId 
union all
select 	did.szBranchId, 
		didi.szProductId, 
        sum(didi.decQty) as qty,
        'MO' as jenis
from dms_inv_docstockoutbranch did 
join dms_inv_docstockoutbranchitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555'
GROUP  by did.szBranchId ,didi.szProductId 
union all
select 	did.szBranchId, 
		didi.szProductId, 
        sum(didi.decQty) as qty,
        'DI' as jenis
from dms_inv_docstockindistribution did 
join dms_inv_docstockindistributionitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555'
GROUP  by did.szBranchId ,didi.szProductId 
union all
select 	did.szBranchId, 
		didi.szProductId, 
        sum(didi.decQty) as qty,
        'DO' as jenis
from dms_inv_docstockoutdistribution did 
join dms_inv_docstockoutdistributionitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555'
GROUP  by did.szBranchId ,didi.szProductId 
union all
select 	did.szBranchId, 
		didi.szProductId, 
        sum(didi.decQty) as qty,
        'SO' as jenis
from dms_sd_docdo did 
join dms_sd_docdoitem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555' and did.szDocStatus = 'Applied' 
GROUP  by did.szBranchId ,didi.szProductId 
union all
select 	did.szBranchId, 
		didi.szProductId, 
        sum(didi.decQty) as qty,
        'SI' as jenis
from dms_inv_docstockinsupplier did 
join dms_inv_docstockinsupplieritem didi on didi.szDocId = did.szDocId and didi.szProductId not in ('74560G','74559G')  
where did.dtmDoc BETWEEN '2021-11-01' and '2021-11-30' and did.szBranchId = '555' and did.szDocStatus = 'Applied' 
GROUP  by did.szBranchId ,didi.szProductId 
)x 
right join dms_inv_product dip on dip.szId = x.szProductId
where dip.dtmEndDate > now()
GROUP  by x.szBranchId ,x.szProductId, dip.szId 



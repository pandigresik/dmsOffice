<?php

return [
    'from' => 'production',
    'to' => 'staging',
    'tables' => ['dms_ap_supplier' , 'dms_ar_customer' , 'dms_ar_customercategory' , 'dms_ar_customercategorytype' , 'dms_ar_customerhierarchy' , 'dms_ar_customerrouteinfo' , 'dms_ar_doccustomer' , 'dms_ar_paymentterm' , 'dms_ar_paymenttype' , 'dms_ar_pricesegment' , 'dms_fin_account' , 'dms_fin_subaccount' , 'dms_inv_carrier' , 'dms_inv_product' , 'dms_inv_productcategory' , 'dms_inv_productcategorytype' , 'dms_inv_uom' , 'dms_inv_vehicle' , 'dms_inv_vehicletype' , 'dms_inv_warehouse' , 'dms_sd_pricecatalog' , 'dms_sd_route'],
    'conditions' => ['dms_ap_supplier' => 'dtmLastUpdated', 'dms_ar_customer' => 'dtmLastUpdated', 'dms_ar_customercategory' => 'dtmLastUpdated', 'dms_ar_customercategorytype' => 'dtmLastUpdated', 'dms_ar_customerhierarchy' => 'dtmLastUpdated', 'dms_ar_customerrouteinfo' => 'dtmLastUpdated', 'dms_ar_doccustomer' => 'dtmLastUpdated', 'dms_ar_paymentterm' => 'dtmLastUpdated', 'dms_ar_paymenttype' => 'dtmLastUpdated', 'dms_ar_pricesegment' => 'dtmLastUpdated', 'dms_fin_account' => 'dtmLastUpdated', 'dms_fin_subaccount' => 'dtmLastUpdated', 'dms_inv_carrier' => 'dtmLastUpdated', 'dms_inv_carrierdriver' => 'dtmLastUpdated', 'dms_inv_carriervehicle' => 'dtmLastUpdated', 'dms_inv_product' => 'dtmLastUpdated', 'dms_inv_productcategory' => 'dtmLastUpdated', 'dms_inv_productcategorytype' => 'dtmLastUpdated', 'dms_inv_productitemcategory' => 'dtmLastUpdated', 'dms_inv_productkitinfo' => 'dtmLastUpdated', 'dms_inv_uom' => 'dtmLastUpdated', 'dms_inv_vehicle' => 'dtmLastUpdated', 'dms_inv_vehicletype' => 'dtmLastUpdated', 'dms_inv_warehouse' => 'dtmLastUpdated', 'dms_sd_pricecatalog' => 'dtmLastUpdated', 'dms_sd_route' => 'dtmLastUpdated'],
    'skip_tables' => [],
    'limit' => 5000    
];

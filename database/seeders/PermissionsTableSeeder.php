<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'menu-index',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'menu-create',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'menu-update',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'menu-delete',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'user-index',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'user-create',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'user-update',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'user-delete',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'role-index',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'role-create',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'role-update',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'role-delete',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'permission-index',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'permission-create',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'permission-update',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'name' => 'permission-delete',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'created_at' => '2021-08-10 13:38:08',
                'guard_name' => 'web',
                'name' => 'city-index',
                'updated_at' => '2021-08-10 13:38:08',
            ),
            17 => 
            array (
                'created_at' => '2021-08-10 13:38:09',
                'guard_name' => 'web',
                'name' => 'city-create',
                'updated_at' => '2021-08-10 13:38:09',
            ),
            18 => 
            array (
                'created_at' => '2021-08-10 13:38:09',
                'guard_name' => 'web',
                'name' => 'city-update',
                'updated_at' => '2021-08-10 13:38:09',
            ),
            19 => 
            array (
                'created_at' => '2021-08-10 13:38:09',
                'guard_name' => 'web',
                'name' => 'city-delete',
                'updated_at' => '2021-08-10 13:38:09',
            ),
            20 => 
            array (
                'created_at' => '2021-08-10 13:38:12',
                'guard_name' => 'web',
                'name' => 'vehicle_group-index',
                'updated_at' => '2021-08-10 13:38:12',
            ),
            21 => 
            array (
                'created_at' => '2021-08-10 13:38:12',
                'guard_name' => 'web',
                'name' => 'vehicle_group-create',
                'updated_at' => '2021-08-10 13:38:12',
            ),
            22 => 
            array (
                'created_at' => '2021-08-10 13:38:12',
                'guard_name' => 'web',
                'name' => 'vehicle_group-update',
                'updated_at' => '2021-08-10 13:38:12',
            ),
            23 => 
            array (
                'created_at' => '2021-08-10 13:38:13',
                'guard_name' => 'web',
                'name' => 'vehicle_group-delete',
                'updated_at' => '2021-08-10 13:38:13',
            ),
            24 => 
            array (
                'created_at' => '2021-08-10 13:39:40',
                'guard_name' => 'web',
                'name' => 'vendor-index',
                'updated_at' => '2021-08-10 13:39:40',
            ),
            25 => 
            array (
                'created_at' => '2021-08-10 13:39:40',
                'guard_name' => 'web',
                'name' => 'vendor-create',
                'updated_at' => '2021-08-10 13:39:40',
            ),
            26 => 
            array (
                'created_at' => '2021-08-10 13:39:41',
                'guard_name' => 'web',
                'name' => 'vendor-update',
                'updated_at' => '2021-08-10 13:39:41',
            ),
            27 => 
            array (
                'created_at' => '2021-08-10 13:39:41',
                'guard_name' => 'web',
                'name' => 'vendor-delete',
                'updated_at' => '2021-08-10 13:39:41',
            ),
            28 => 
            array (
                'created_at' => '2021-08-10 13:39:43',
                'guard_name' => 'web',
                'name' => 'route_trip-index',
                'updated_at' => '2021-08-10 13:39:43',
            ),
            29 => 
            array (
                'created_at' => '2021-08-10 13:39:43',
                'guard_name' => 'web',
                'name' => 'route_trip-create',
                'updated_at' => '2021-08-10 13:39:43',
            ),
            30 => 
            array (
                'created_at' => '2021-08-10 13:39:43',
                'guard_name' => 'web',
                'name' => 'route_trip-update',
                'updated_at' => '2021-08-10 13:39:43',
            ),
            31 => 
            array (
                'created_at' => '2021-08-10 13:39:43',
                'guard_name' => 'web',
                'name' => 'route_trip-delete',
                'updated_at' => '2021-08-10 13:39:43',
            ),
            32 => 
            array (
                'created_at' => '2021-08-10 13:39:44',
                'guard_name' => 'web',
                'name' => 'vendor_trip-index',
                'updated_at' => '2021-08-10 13:39:44',
            ),
            33 => 
            array (
                'created_at' => '2021-08-10 13:39:44',
                'guard_name' => 'web',
                'name' => 'vendor_trip-create',
                'updated_at' => '2021-08-10 13:39:44',
            ),
            34 => 
            array (
                'created_at' => '2021-08-10 13:39:44',
                'guard_name' => 'web',
                'name' => 'vendor_trip-update',
                'updated_at' => '2021-08-10 13:39:44',
            ),
            35 => 
            array (
                'created_at' => '2021-08-10 13:39:45',
                'guard_name' => 'web',
                'name' => 'vendor_trip-delete',
                'updated_at' => '2021-08-10 13:39:45',
            ),
            36 => 
            array (
                'created_at' => '2021-08-10 13:39:48',
                'guard_name' => 'web',
                'name' => 'vehicle-index',
                'updated_at' => '2021-08-10 13:39:48',
            ),
            37 => 
            array (
                'created_at' => '2021-08-10 13:39:48',
                'guard_name' => 'web',
                'name' => 'vehicle-create',
                'updated_at' => '2021-08-10 13:39:48',
            ),
            38 => 
            array (
                'created_at' => '2021-08-10 13:39:48',
                'guard_name' => 'web',
                'name' => 'vehicle-update',
                'updated_at' => '2021-08-10 13:39:48',
            ),
            39 => 
            array (
                'created_at' => '2021-08-10 13:39:48',
                'guard_name' => 'web',
                'name' => 'vehicle-delete',
                'updated_at' => '2021-08-10 13:39:48',
            ),
            40 => 
            array (
                'created_at' => '2021-08-15 15:20:27',
                'guard_name' => 'web',
                'name' => 'company-index',
                'updated_at' => '2021-08-15 15:20:27',
            ),
            41 => 
            array (
                'created_at' => '2021-08-15 15:20:27',
                'guard_name' => 'web',
                'name' => 'company-create',
                'updated_at' => '2021-08-15 15:20:27',
            ),
            42 => 
            array (
                'created_at' => '2021-08-15 15:20:27',
                'guard_name' => 'web',
                'name' => 'company-update',
                'updated_at' => '2021-08-15 15:20:27',
            ),
            43 => 
            array (
                'created_at' => '2021-08-15 15:20:27',
                'guard_name' => 'web',
                'name' => 'company-delete',
                'updated_at' => '2021-08-15 15:20:27',
            ),
            44 => 
            array (
                'created_at' => '2021-08-15 15:20:28',
                'guard_name' => 'web',
                'name' => 'uom_category-index',
                'updated_at' => '2021-08-15 15:20:28',
            ),
            45 => 
            array (
                'created_at' => '2021-08-15 15:20:28',
                'guard_name' => 'web',
                'name' => 'uom_category-create',
                'updated_at' => '2021-08-15 15:20:28',
            ),
            46 => 
            array (
                'created_at' => '2021-08-15 15:20:28',
                'guard_name' => 'web',
                'name' => 'uom_category-update',
                'updated_at' => '2021-08-15 15:20:28',
            ),
            47 => 
            array (
                'created_at' => '2021-08-15 15:20:29',
                'guard_name' => 'web',
                'name' => 'uom_category-delete',
                'updated_at' => '2021-08-15 15:20:29',
            ),
            48 => 
            array (
                'created_at' => '2021-08-15 15:20:30',
                'guard_name' => 'web',
                'name' => 'uom-index',
                'updated_at' => '2021-08-15 15:20:30',
            ),
            49 => 
            array (
                'created_at' => '2021-08-15 15:20:30',
                'guard_name' => 'web',
                'name' => 'uom-create',
                'updated_at' => '2021-08-15 15:20:30',
            ),
            50 => 
            array (
                'created_at' => '2021-08-15 15:20:30',
                'guard_name' => 'web',
                'name' => 'uom-update',
                'updated_at' => '2021-08-15 15:20:30',
            ),
            51 => 
            array (
                'created_at' => '2021-08-15 15:20:30',
                'guard_name' => 'web',
                'name' => 'uom-delete',
                'updated_at' => '2021-08-15 15:20:30',
            ),
            52 => 
            array (
                'created_at' => '2021-08-15 15:20:31',
                'guard_name' => 'web',
                'name' => 'setting-index',
                'updated_at' => '2021-08-15 15:20:31',
            ),
            53 => 
            array (
                'created_at' => '2021-08-15 15:20:31',
                'guard_name' => 'web',
                'name' => 'setting-create',
                'updated_at' => '2021-08-15 15:20:31',
            ),
            54 => 
            array (
                'created_at' => '2021-08-15 15:20:31',
                'guard_name' => 'web',
                'name' => 'setting-update',
                'updated_at' => '2021-08-15 15:20:31',
            ),
            55 => 
            array (
                'created_at' => '2021-08-15 15:20:31',
                'guard_name' => 'web',
                'name' => 'setting-delete',
                'updated_at' => '2021-08-15 15:20:31',
            ),
            56 => 
            array (
                'created_at' => '2021-08-15 15:20:32',
                'guard_name' => 'web',
                'name' => 'product-index',
                'updated_at' => '2021-08-15 15:20:32',
            ),
            57 => 
            array (
                'created_at' => '2021-08-15 15:20:32',
                'guard_name' => 'web',
                'name' => 'product-create',
                'updated_at' => '2021-08-15 15:20:32',
            ),
            58 => 
            array (
                'created_at' => '2021-08-15 15:20:32',
                'guard_name' => 'web',
                'name' => 'product-update',
                'updated_at' => '2021-08-15 15:20:32',
            ),
            59 => 
            array (
                'created_at' => '2021-08-15 15:20:32',
                'guard_name' => 'web',
                'name' => 'product-delete',
                'updated_at' => '2021-08-15 15:20:32',
            ),
            60 => 
            array (
                'created_at' => '2021-08-15 15:21:55',
                'guard_name' => 'web',
                'name' => 'warehouse-index',
                'updated_at' => '2021-08-15 15:21:55',
            ),
            61 => 
            array (
                'created_at' => '2021-08-15 15:21:55',
                'guard_name' => 'web',
                'name' => 'warehouse-create',
                'updated_at' => '2021-08-15 15:21:55',
            ),
            62 => 
            array (
                'created_at' => '2021-08-15 15:21:55',
                'guard_name' => 'web',
                'name' => 'warehouse-update',
                'updated_at' => '2021-08-15 15:21:55',
            ),
            63 => 
            array (
                'created_at' => '2021-08-15 15:21:55',
                'guard_name' => 'web',
                'name' => 'warehouse-delete',
                'updated_at' => '2021-08-15 15:21:55',
            ),
            64 => 
            array (
                'created_at' => '2021-08-15 15:22:16',
                'guard_name' => 'web',
                'name' => 'stock_quant-index',
                'updated_at' => '2021-08-15 15:22:16',
            ),
            65 => 
            array (
                'created_at' => '2021-08-15 15:22:16',
                'guard_name' => 'web',
                'name' => 'stock_quant-create',
                'updated_at' => '2021-08-15 15:22:16',
            ),
            66 => 
            array (
                'created_at' => '2021-08-15 15:22:16',
                'guard_name' => 'web',
                'name' => 'stock_quant-update',
                'updated_at' => '2021-08-15 15:22:16',
            ),
            67 => 
            array (
                'created_at' => '2021-08-15 15:22:16',
                'guard_name' => 'web',
                'name' => 'stock_quant-delete',
                'updated_at' => '2021-08-15 15:22:16',
            ),
            68 => 
            array (
                'created_at' => '2021-08-15 15:22:17',
                'guard_name' => 'web',
                'name' => 'stock_inventory-index',
                'updated_at' => '2021-08-15 15:22:17',
            ),
            69 => 
            array (
                'created_at' => '2021-08-15 15:22:17',
                'guard_name' => 'web',
                'name' => 'stock_inventory-create',
                'updated_at' => '2021-08-15 15:22:17',
            ),
            70 => 
            array (
                'created_at' => '2021-08-15 15:22:17',
                'guard_name' => 'web',
                'name' => 'stock_inventory-update',
                'updated_at' => '2021-08-15 15:22:17',
            ),
            71 => 
            array (
                'created_at' => '2021-08-15 15:22:17',
                'guard_name' => 'web',
                'name' => 'stock_inventory-delete',
                'updated_at' => '2021-08-15 15:22:17',
            ),
            72 => 
            array (
                'created_at' => '2021-08-15 15:22:18',
                'guard_name' => 'web',
                'name' => 'stock_picking_type-index',
                'updated_at' => '2021-08-15 15:22:18',
            ),
            73 => 
            array (
                'created_at' => '2021-08-15 15:22:18',
                'guard_name' => 'web',
                'name' => 'stock_picking_type-create',
                'updated_at' => '2021-08-15 15:22:18',
            ),
            74 => 
            array (
                'created_at' => '2021-08-15 15:22:18',
                'guard_name' => 'web',
                'name' => 'stock_picking_type-update',
                'updated_at' => '2021-08-15 15:22:18',
            ),
            75 => 
            array (
                'created_at' => '2021-08-15 15:22:19',
                'guard_name' => 'web',
                'name' => 'stock_picking_type-delete',
                'updated_at' => '2021-08-15 15:22:19',
            ),
            76 => 
            array (
                'created_at' => '2021-08-15 15:22:19',
                'guard_name' => 'web',
                'name' => 'stock_picking-index',
                'updated_at' => '2021-08-15 15:22:19',
            ),
            77 => 
            array (
                'created_at' => '2021-08-15 15:22:19',
                'guard_name' => 'web',
                'name' => 'stock_picking-create',
                'updated_at' => '2021-08-15 15:22:19',
            ),
            78 => 
            array (
                'created_at' => '2021-08-15 15:22:20',
                'guard_name' => 'web',
                'name' => 'stock_picking-update',
                'updated_at' => '2021-08-15 15:22:20',
            ),
            79 => 
            array (
                'created_at' => '2021-08-15 15:22:20',
                'guard_name' => 'web',
                'name' => 'stock_picking-delete',
                'updated_at' => '2021-08-15 15:22:20',
            ),
            80 => 
            array (
                'created_at' => '2021-10-03 14:24:54',
                'guard_name' => 'web',
                'name' => 'btb_view_tmp-index',
                'updated_at' => '2021-10-03 14:24:54',
            ),
            81 => 
            array (
                'created_at' => '2021-10-03 14:24:55',
                'guard_name' => 'web',
                'name' => 'btb_view_tmp-create',
                'updated_at' => '2021-10-03 14:24:55',
            ),
            82 => 
            array (
                'created_at' => '2021-10-03 14:24:56',
                'guard_name' => 'web',
                'name' => 'btb_view_tmp-update',
                'updated_at' => '2021-10-03 14:24:56',
            ),
            83 => 
            array (
                'created_at' => '2021-10-03 14:24:56',
                'guard_name' => 'web',
                'name' => 'btb_view_tmp-delete',
                'updated_at' => '2021-10-03 14:24:56',
            ),
            84 => 
            array (
                'created_at' => '2021-10-21 14:08:06',
                'guard_name' => 'web',
                'name' => 'vendor_contact-index',
                'updated_at' => '2021-10-21 14:08:06',
            ),
            85 => 
            array (
                'created_at' => '2021-10-21 14:08:06',
                'guard_name' => 'web',
                'name' => 'vendor_contact-create',
                'updated_at' => '2021-10-21 14:08:06',
            ),
            86 => 
            array (
                'created_at' => '2021-10-21 14:08:06',
                'guard_name' => 'web',
                'name' => 'vendor_contact-update',
                'updated_at' => '2021-10-21 14:08:06',
            ),
            87 => 
            array (
                'created_at' => '2021-10-21 14:08:07',
                'guard_name' => 'web',
                'name' => 'vendor_contact-delete',
                'updated_at' => '2021-10-21 14:08:07',
            ),
            88 => 
            array (
                'created_at' => '2021-10-21 14:08:08',
                'guard_name' => 'web',
                'name' => 'vendor_location-index',
                'updated_at' => '2021-10-21 14:08:08',
            ),
            89 => 
            array (
                'created_at' => '2021-10-21 14:08:08',
                'guard_name' => 'web',
                'name' => 'vendor_location-create',
                'updated_at' => '2021-10-21 14:08:08',
            ),
            90 => 
            array (
                'created_at' => '2021-10-21 14:08:08',
                'guard_name' => 'web',
                'name' => 'vendor_location-update',
                'updated_at' => '2021-10-21 14:08:08',
            ),
            91 => 
            array (
                'created_at' => '2021-10-21 14:08:08',
                'guard_name' => 'web',
                'name' => 'vendor_location-delete',
                'updated_at' => '2021-10-21 14:08:08',
            ),
            92 => 
            array (
                'created_at' => '2021-10-29 03:56:22',
                'guard_name' => 'web',
                'name' => 'dms_ap_supplier-index',
                'updated_at' => '2021-10-29 03:56:22',
            ),
            93 => 
            array (
                'created_at' => '2021-10-29 03:56:22',
                'guard_name' => 'web',
                'name' => 'dms_ap_supplier-create',
                'updated_at' => '2021-10-29 03:56:22',
            ),
            94 => 
            array (
                'created_at' => '2021-10-29 03:56:22',
                'guard_name' => 'web',
                'name' => 'dms_ap_supplier-update',
                'updated_at' => '2021-10-29 03:56:22',
            ),
            95 => 
            array (
                'created_at' => '2021-10-29 03:56:23',
                'guard_name' => 'web',
                'name' => 'dms_ap_supplier-delete',
                'updated_at' => '2021-10-29 03:56:23',
            ),
            96 => 
            array (
                'created_at' => '2021-10-29 03:56:23',
                'guard_name' => 'web',
                'name' => 'dms_ar_customer-index',
                'updated_at' => '2021-10-29 03:56:23',
            ),
            97 => 
            array (
                'created_at' => '2021-10-29 03:56:23',
                'guard_name' => 'web',
                'name' => 'dms_ar_customer-create',
                'updated_at' => '2021-10-29 03:56:23',
            ),
            98 => 
            array (
                'created_at' => '2021-10-29 03:56:24',
                'guard_name' => 'web',
                'name' => 'dms_ar_customer-update',
                'updated_at' => '2021-10-29 03:56:24',
            ),
            99 => 
            array (
                'created_at' => '2021-10-29 03:56:24',
                'guard_name' => 'web',
                'name' => 'dms_ar_customer-delete',
                'updated_at' => '2021-10-29 03:56:24',
            ),
        ));
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'created_at' => '2021-10-29 03:56:24',
                'guard_name' => 'web',
                'name' => 'dms_ar_customercategory-index',
                'updated_at' => '2021-10-29 03:56:24',
            ),
            1 => 
            array (
                'created_at' => '2021-10-29 03:56:24',
                'guard_name' => 'web',
                'name' => 'dms_ar_customercategory-create',
                'updated_at' => '2021-10-29 03:56:24',
            ),
            2 => 
            array (
                'created_at' => '2021-10-29 03:56:25',
                'guard_name' => 'web',
                'name' => 'dms_ar_customercategory-update',
                'updated_at' => '2021-10-29 03:56:25',
            ),
            3 => 
            array (
                'created_at' => '2021-10-29 03:56:25',
                'guard_name' => 'web',
                'name' => 'dms_ar_customercategory-delete',
                'updated_at' => '2021-10-29 03:56:25',
            ),
            4 => 
            array (
                'created_at' => '2021-10-29 03:56:25',
                'guard_name' => 'web',
                'name' => 'dms_ar_customercategorytype-index',
                'updated_at' => '2021-10-29 03:56:25',
            ),
            5 => 
            array (
                'created_at' => '2021-10-29 03:56:26',
                'guard_name' => 'web',
                'name' => 'dms_ar_customercategorytype-create',
                'updated_at' => '2021-10-29 03:56:26',
            ),
            6 => 
            array (
                'created_at' => '2021-10-29 03:56:26',
                'guard_name' => 'web',
                'name' => 'dms_ar_customercategorytype-update',
                'updated_at' => '2021-10-29 03:56:26',
            ),
            7 => 
            array (
                'created_at' => '2021-10-29 03:56:26',
                'guard_name' => 'web',
                'name' => 'dms_ar_customercategorytype-delete',
                'updated_at' => '2021-10-29 03:56:26',
            ),
            8 => 
            array (
                'created_at' => '2021-10-29 03:56:27',
                'guard_name' => 'web',
                'name' => 'dms_ar_customerhierarchy-index',
                'updated_at' => '2021-10-29 03:56:27',
            ),
            9 => 
            array (
                'created_at' => '2021-10-29 03:56:27',
                'guard_name' => 'web',
                'name' => 'dms_ar_customerhierarchy-create',
                'updated_at' => '2021-10-29 03:56:27',
            ),
            10 => 
            array (
                'created_at' => '2021-10-29 03:56:27',
                'guard_name' => 'web',
                'name' => 'dms_ar_customerhierarchy-update',
                'updated_at' => '2021-10-29 03:56:27',
            ),
            11 => 
            array (
                'created_at' => '2021-10-29 03:56:27',
                'guard_name' => 'web',
                'name' => 'dms_ar_customerhierarchy-delete',
                'updated_at' => '2021-10-29 03:56:27',
            ),
            12 => 
            array (
                'created_at' => '2021-10-29 03:56:28',
                'guard_name' => 'web',
                'name' => 'dms_ar_customerrouteinfo-index',
                'updated_at' => '2021-10-29 03:56:28',
            ),
            13 => 
            array (
                'created_at' => '2021-10-29 03:56:28',
                'guard_name' => 'web',
                'name' => 'dms_ar_customerrouteinfo-create',
                'updated_at' => '2021-10-29 03:56:28',
            ),
            14 => 
            array (
                'created_at' => '2021-10-29 03:56:28',
                'guard_name' => 'web',
                'name' => 'dms_ar_customerrouteinfo-update',
                'updated_at' => '2021-10-29 03:56:28',
            ),
            15 => 
            array (
                'created_at' => '2021-10-29 03:56:28',
                'guard_name' => 'web',
                'name' => 'dms_ar_customerrouteinfo-delete',
                'updated_at' => '2021-10-29 03:56:28',
            ),
            16 => 
            array (
                'created_at' => '2021-10-29 03:56:29',
                'guard_name' => 'web',
                'name' => 'dms_ar_doccustomer-index',
                'updated_at' => '2021-10-29 03:56:29',
            ),
            17 => 
            array (
                'created_at' => '2021-10-29 03:56:29',
                'guard_name' => 'web',
                'name' => 'dms_ar_doccustomer-create',
                'updated_at' => '2021-10-29 03:56:29',
            ),
            18 => 
            array (
                'created_at' => '2021-10-29 03:56:29',
                'guard_name' => 'web',
                'name' => 'dms_ar_doccustomer-update',
                'updated_at' => '2021-10-29 03:56:29',
            ),
            19 => 
            array (
                'created_at' => '2021-10-29 03:56:29',
                'guard_name' => 'web',
                'name' => 'dms_ar_doccustomer-delete',
                'updated_at' => '2021-10-29 03:56:29',
            ),
            20 => 
            array (
                'created_at' => '2021-10-29 03:56:30',
                'guard_name' => 'web',
                'name' => 'dms_ar_paymentterm-index',
                'updated_at' => '2021-10-29 03:56:30',
            ),
            21 => 
            array (
                'created_at' => '2021-10-29 03:56:30',
                'guard_name' => 'web',
                'name' => 'dms_ar_paymentterm-create',
                'updated_at' => '2021-10-29 03:56:30',
            ),
            22 => 
            array (
                'created_at' => '2021-10-29 03:56:30',
                'guard_name' => 'web',
                'name' => 'dms_ar_paymentterm-update',
                'updated_at' => '2021-10-29 03:56:30',
            ),
            23 => 
            array (
                'created_at' => '2021-10-29 03:56:31',
                'guard_name' => 'web',
                'name' => 'dms_ar_paymentterm-delete',
                'updated_at' => '2021-10-29 03:56:31',
            ),
            24 => 
            array (
                'created_at' => '2021-10-29 03:56:31',
                'guard_name' => 'web',
                'name' => 'dms_ar_paymenttype-index',
                'updated_at' => '2021-10-29 03:56:31',
            ),
            25 => 
            array (
                'created_at' => '2021-10-29 03:56:31',
                'guard_name' => 'web',
                'name' => 'dms_ar_paymenttype-create',
                'updated_at' => '2021-10-29 03:56:31',
            ),
            26 => 
            array (
                'created_at' => '2021-10-29 03:56:32',
                'guard_name' => 'web',
                'name' => 'dms_ar_paymenttype-update',
                'updated_at' => '2021-10-29 03:56:32',
            ),
            27 => 
            array (
                'created_at' => '2021-10-29 03:56:32',
                'guard_name' => 'web',
                'name' => 'dms_ar_paymenttype-delete',
                'updated_at' => '2021-10-29 03:56:32',
            ),
            28 => 
            array (
                'created_at' => '2021-10-29 03:56:32',
                'guard_name' => 'web',
                'name' => 'dms_ar_pricesegment-index',
                'updated_at' => '2021-10-29 03:56:32',
            ),
            29 => 
            array (
                'created_at' => '2021-10-29 03:56:33',
                'guard_name' => 'web',
                'name' => 'dms_ar_pricesegment-create',
                'updated_at' => '2021-10-29 03:56:33',
            ),
            30 => 
            array (
                'created_at' => '2021-10-29 03:56:33',
                'guard_name' => 'web',
                'name' => 'dms_ar_pricesegment-update',
                'updated_at' => '2021-10-29 03:56:33',
            ),
            31 => 
            array (
                'created_at' => '2021-10-29 03:56:33',
                'guard_name' => 'web',
                'name' => 'dms_ar_pricesegment-delete',
                'updated_at' => '2021-10-29 03:56:33',
            ),
            32 => 
            array (
                'created_at' => '2021-10-29 03:56:33',
                'guard_name' => 'web',
                'name' => 'dms_fin_account-index',
                'updated_at' => '2021-10-29 03:56:33',
            ),
            33 => 
            array (
                'created_at' => '2021-10-29 03:56:34',
                'guard_name' => 'web',
                'name' => 'dms_fin_account-create',
                'updated_at' => '2021-10-29 03:56:34',
            ),
            34 => 
            array (
                'created_at' => '2021-10-29 03:56:34',
                'guard_name' => 'web',
                'name' => 'dms_fin_account-update',
                'updated_at' => '2021-10-29 03:56:34',
            ),
            35 => 
            array (
                'created_at' => '2021-10-29 03:56:34',
                'guard_name' => 'web',
                'name' => 'dms_fin_account-delete',
                'updated_at' => '2021-10-29 03:56:34',
            ),
            36 => 
            array (
                'created_at' => '2021-10-29 03:56:35',
                'guard_name' => 'web',
                'name' => 'dms_fin_subaccount-index',
                'updated_at' => '2021-10-29 03:56:35',
            ),
            37 => 
            array (
                'created_at' => '2021-10-29 03:56:35',
                'guard_name' => 'web',
                'name' => 'dms_fin_subaccount-create',
                'updated_at' => '2021-10-29 03:56:35',
            ),
            38 => 
            array (
                'created_at' => '2021-10-29 03:56:35',
                'guard_name' => 'web',
                'name' => 'dms_fin_subaccount-update',
                'updated_at' => '2021-10-29 03:56:35',
            ),
            39 => 
            array (
                'created_at' => '2021-10-29 03:56:35',
                'guard_name' => 'web',
                'name' => 'dms_fin_subaccount-delete',
                'updated_at' => '2021-10-29 03:56:35',
            ),
            40 => 
            array (
                'created_at' => '2021-10-29 03:56:36',
                'guard_name' => 'web',
                'name' => 'dms_inv_carrier-index',
                'updated_at' => '2021-10-29 03:56:36',
            ),
            41 => 
            array (
                'created_at' => '2021-10-29 03:56:36',
                'guard_name' => 'web',
                'name' => 'dms_inv_carrier-create',
                'updated_at' => '2021-10-29 03:56:36',
            ),
            42 => 
            array (
                'created_at' => '2021-10-29 03:56:36',
                'guard_name' => 'web',
                'name' => 'dms_inv_carrier-update',
                'updated_at' => '2021-10-29 03:56:36',
            ),
            43 => 
            array (
                'created_at' => '2021-10-29 03:56:36',
                'guard_name' => 'web',
                'name' => 'dms_inv_carrier-delete',
                'updated_at' => '2021-10-29 03:56:36',
            ),
            44 => 
            array (
                'created_at' => '2021-10-29 03:56:37',
                'guard_name' => 'web',
                'name' => 'dms_inv_carrierdriver-index',
                'updated_at' => '2021-10-29 03:56:37',
            ),
            45 => 
            array (
                'created_at' => '2021-10-29 03:56:37',
                'guard_name' => 'web',
                'name' => 'dms_inv_carrierdriver-create',
                'updated_at' => '2021-10-29 03:56:37',
            ),
            46 => 
            array (
                'created_at' => '2021-10-29 03:56:37',
                'guard_name' => 'web',
                'name' => 'dms_inv_carrierdriver-update',
                'updated_at' => '2021-10-29 03:56:37',
            ),
            47 => 
            array (
                'created_at' => '2021-10-29 03:56:37',
                'guard_name' => 'web',
                'name' => 'dms_inv_carrierdriver-delete',
                'updated_at' => '2021-10-29 03:56:37',
            ),
            48 => 
            array (
                'created_at' => '2021-10-29 03:56:38',
                'guard_name' => 'web',
                'name' => 'dms_inv_carriervehicle-index',
                'updated_at' => '2021-10-29 03:56:38',
            ),
            49 => 
            array (
                'created_at' => '2021-10-29 03:56:38',
                'guard_name' => 'web',
                'name' => 'dms_inv_carriervehicle-create',
                'updated_at' => '2021-10-29 03:56:38',
            ),
            50 => 
            array (
                'created_at' => '2021-10-29 03:56:38',
                'guard_name' => 'web',
                'name' => 'dms_inv_carriervehicle-update',
                'updated_at' => '2021-10-29 03:56:38',
            ),
            51 => 
            array (
                'created_at' => '2021-10-29 03:56:38',
                'guard_name' => 'web',
                'name' => 'dms_inv_carriervehicle-delete',
                'updated_at' => '2021-10-29 03:56:38',
            ),
            52 => 
            array (
                'created_at' => '2021-10-29 03:56:39',
                'guard_name' => 'web',
                'name' => 'dms_inv_product-index',
                'updated_at' => '2021-10-29 03:56:39',
            ),
            53 => 
            array (
                'created_at' => '2021-10-29 03:56:39',
                'guard_name' => 'web',
                'name' => 'dms_inv_product-create',
                'updated_at' => '2021-10-29 03:56:39',
            ),
            54 => 
            array (
                'created_at' => '2021-10-29 03:56:39',
                'guard_name' => 'web',
                'name' => 'dms_inv_product-update',
                'updated_at' => '2021-10-29 03:56:39',
            ),
            55 => 
            array (
                'created_at' => '2021-10-29 03:56:39',
                'guard_name' => 'web',
                'name' => 'dms_inv_product-delete',
                'updated_at' => '2021-10-29 03:56:39',
            ),
            56 => 
            array (
                'created_at' => '2021-10-29 03:56:40',
                'guard_name' => 'web',
                'name' => 'dms_inv_productcategory-index',
                'updated_at' => '2021-10-29 03:56:40',
            ),
            57 => 
            array (
                'created_at' => '2021-10-29 03:56:40',
                'guard_name' => 'web',
                'name' => 'dms_inv_productcategory-create',
                'updated_at' => '2021-10-29 03:56:40',
            ),
            58 => 
            array (
                'created_at' => '2021-10-29 03:56:41',
                'guard_name' => 'web',
                'name' => 'dms_inv_productcategory-update',
                'updated_at' => '2021-10-29 03:56:41',
            ),
            59 => 
            array (
                'created_at' => '2021-10-29 03:56:41',
                'guard_name' => 'web',
                'name' => 'dms_inv_productcategory-delete',
                'updated_at' => '2021-10-29 03:56:41',
            ),
            60 => 
            array (
                'created_at' => '2021-10-29 03:56:42',
                'guard_name' => 'web',
                'name' => 'dms_inv_productcategorytype-index',
                'updated_at' => '2021-10-29 03:56:42',
            ),
            61 => 
            array (
                'created_at' => '2021-10-29 03:56:42',
                'guard_name' => 'web',
                'name' => 'dms_inv_productcategorytype-create',
                'updated_at' => '2021-10-29 03:56:42',
            ),
            62 => 
            array (
                'created_at' => '2021-10-29 03:56:42',
                'guard_name' => 'web',
                'name' => 'dms_inv_productcategorytype-update',
                'updated_at' => '2021-10-29 03:56:42',
            ),
            63 => 
            array (
                'created_at' => '2021-10-29 03:56:42',
                'guard_name' => 'web',
                'name' => 'dms_inv_productcategorytype-delete',
                'updated_at' => '2021-10-29 03:56:42',
            ),
            64 => 
            array (
                'created_at' => '2021-10-29 03:56:43',
                'guard_name' => 'web',
                'name' => 'dms_inv_productitemcategory-index',
                'updated_at' => '2021-10-29 03:56:43',
            ),
            65 => 
            array (
                'created_at' => '2021-10-29 03:56:43',
                'guard_name' => 'web',
                'name' => 'dms_inv_productitemcategory-create',
                'updated_at' => '2021-10-29 03:56:43',
            ),
            66 => 
            array (
                'created_at' => '2021-10-29 03:56:43',
                'guard_name' => 'web',
                'name' => 'dms_inv_productitemcategory-update',
                'updated_at' => '2021-10-29 03:56:43',
            ),
            67 => 
            array (
                'created_at' => '2021-10-29 03:56:44',
                'guard_name' => 'web',
                'name' => 'dms_inv_productitemcategory-delete',
                'updated_at' => '2021-10-29 03:56:44',
            ),
            68 => 
            array (
                'created_at' => '2021-10-29 03:56:44',
                'guard_name' => 'web',
                'name' => 'dms_inv_productkitinfo-index',
                'updated_at' => '2021-10-29 03:56:44',
            ),
            69 => 
            array (
                'created_at' => '2021-10-29 03:56:44',
                'guard_name' => 'web',
                'name' => 'dms_inv_productkitinfo-create',
                'updated_at' => '2021-10-29 03:56:44',
            ),
            70 => 
            array (
                'created_at' => '2021-10-29 03:56:44',
                'guard_name' => 'web',
                'name' => 'dms_inv_productkitinfo-update',
                'updated_at' => '2021-10-29 03:56:44',
            ),
            71 => 
            array (
                'created_at' => '2021-10-29 03:56:45',
                'guard_name' => 'web',
                'name' => 'dms_inv_productkitinfo-delete',
                'updated_at' => '2021-10-29 03:56:45',
            ),
            72 => 
            array (
                'created_at' => '2021-10-29 03:56:45',
                'guard_name' => 'web',
                'name' => 'dms_inv_uom-index',
                'updated_at' => '2021-10-29 03:56:45',
            ),
            73 => 
            array (
                'created_at' => '2021-10-29 03:56:45',
                'guard_name' => 'web',
                'name' => 'dms_inv_uom-create',
                'updated_at' => '2021-10-29 03:56:45',
            ),
            74 => 
            array (
                'created_at' => '2021-10-29 03:56:46',
                'guard_name' => 'web',
                'name' => 'dms_inv_uom-update',
                'updated_at' => '2021-10-29 03:56:46',
            ),
            75 => 
            array (
                'created_at' => '2021-10-29 03:56:46',
                'guard_name' => 'web',
                'name' => 'dms_inv_uom-delete',
                'updated_at' => '2021-10-29 03:56:46',
            ),
            76 => 
            array (
                'created_at' => '2021-10-29 03:56:46',
                'guard_name' => 'web',
                'name' => 'dms_inv_vehicle-index',
                'updated_at' => '2021-10-29 03:56:46',
            ),
            77 => 
            array (
                'created_at' => '2021-10-29 03:56:47',
                'guard_name' => 'web',
                'name' => 'dms_inv_vehicle-create',
                'updated_at' => '2021-10-29 03:56:47',
            ),
            78 => 
            array (
                'created_at' => '2021-10-29 03:56:47',
                'guard_name' => 'web',
                'name' => 'dms_inv_vehicle-update',
                'updated_at' => '2021-10-29 03:56:47',
            ),
            79 => 
            array (
                'created_at' => '2021-10-29 03:56:47',
                'guard_name' => 'web',
                'name' => 'dms_inv_vehicle-delete',
                'updated_at' => '2021-10-29 03:56:47',
            ),
            80 => 
            array (
                'created_at' => '2021-10-29 03:56:48',
                'guard_name' => 'web',
                'name' => 'dms_inv_vehicletype-index',
                'updated_at' => '2021-10-29 03:56:48',
            ),
            81 => 
            array (
                'created_at' => '2021-10-29 03:56:48',
                'guard_name' => 'web',
                'name' => 'dms_inv_vehicletype-create',
                'updated_at' => '2021-10-29 03:56:48',
            ),
            82 => 
            array (
                'created_at' => '2021-10-29 03:56:48',
                'guard_name' => 'web',
                'name' => 'dms_inv_vehicletype-update',
                'updated_at' => '2021-10-29 03:56:48',
            ),
            83 => 
            array (
                'created_at' => '2021-10-29 03:56:48',
                'guard_name' => 'web',
                'name' => 'dms_inv_vehicletype-delete',
                'updated_at' => '2021-10-29 03:56:48',
            ),
            84 => 
            array (
                'created_at' => '2021-10-29 03:56:49',
                'guard_name' => 'web',
                'name' => 'dms_inv_warehouse-index',
                'updated_at' => '2021-10-29 03:56:49',
            ),
            85 => 
            array (
                'created_at' => '2021-10-29 03:56:49',
                'guard_name' => 'web',
                'name' => 'dms_inv_warehouse-create',
                'updated_at' => '2021-10-29 03:56:49',
            ),
            86 => 
            array (
                'created_at' => '2021-10-29 03:56:49',
                'guard_name' => 'web',
                'name' => 'dms_inv_warehouse-update',
                'updated_at' => '2021-10-29 03:56:49',
            ),
            87 => 
            array (
                'created_at' => '2021-10-29 03:56:49',
                'guard_name' => 'web',
                'name' => 'dms_inv_warehouse-delete',
                'updated_at' => '2021-10-29 03:56:49',
            ),
            88 => 
            array (
                'created_at' => '2021-10-29 03:56:50',
                'guard_name' => 'web',
                'name' => 'dms_sd_pricecatalog-index',
                'updated_at' => '2021-10-29 03:56:50',
            ),
            89 => 
            array (
                'created_at' => '2021-10-29 03:56:50',
                'guard_name' => 'web',
                'name' => 'dms_sd_pricecatalog-create',
                'updated_at' => '2021-10-29 03:56:50',
            ),
            90 => 
            array (
                'created_at' => '2021-10-29 03:56:50',
                'guard_name' => 'web',
                'name' => 'dms_sd_pricecatalog-update',
                'updated_at' => '2021-10-29 03:56:50',
            ),
            91 => 
            array (
                'created_at' => '2021-10-29 03:56:50',
                'guard_name' => 'web',
                'name' => 'dms_sd_pricecatalog-delete',
                'updated_at' => '2021-10-29 03:56:50',
            ),
            92 => 
            array (
                'created_at' => '2021-10-29 03:56:51',
                'guard_name' => 'web',
                'name' => 'dms_sd_route-index',
                'updated_at' => '2021-10-29 03:56:51',
            ),
            93 => 
            array (
                'created_at' => '2021-10-29 03:56:51',
                'guard_name' => 'web',
                'name' => 'dms_sd_route-create',
                'updated_at' => '2021-10-29 03:56:51',
            ),
            94 => 
            array (
                'created_at' => '2021-10-29 03:56:51',
                'guard_name' => 'web',
                'name' => 'dms_sd_route-update',
                'updated_at' => '2021-10-29 03:56:51',
            ),
            95 => 
            array (
                'created_at' => '2021-10-29 03:56:51',
                'guard_name' => 'web',
                'name' => 'dms_sd_route-delete',
                'updated_at' => '2021-10-29 03:56:51',
            ),
            96 => 
            array (
                'created_at' => '2021-10-29 03:56:52',
                'guard_name' => 'web',
                'name' => 'dms_sd_routeitem-index',
                'updated_at' => '2021-10-29 03:56:52',
            ),
            97 => 
            array (
                'created_at' => '2021-10-29 03:56:52',
                'guard_name' => 'web',
                'name' => 'dms_sd_routeitem-create',
                'updated_at' => '2021-10-29 03:56:52',
            ),
            98 => 
            array (
                'created_at' => '2021-10-29 03:56:52',
                'guard_name' => 'web',
                'name' => 'dms_sd_routeitem-update',
                'updated_at' => '2021-10-29 03:56:52',
            ),
            99 => 
            array (
                'created_at' => '2021-10-29 03:56:52',
                'guard_name' => 'web',
                'name' => 'dms_sd_routeitem-delete',
                'updated_at' => '2021-10-29 03:56:52',
            ),
        ));
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'created_at' => '2021-10-30 05:57:53',
                'guard_name' => 'web',
                'name' => 'vehicle_ekspedisi-index',
                'updated_at' => '2021-10-30 05:57:53',
            ),
            1 => 
            array (
                'created_at' => '2021-10-30 05:57:53',
                'guard_name' => 'web',
                'name' => 'vehicle_ekspedisi-create',
                'updated_at' => '2021-10-30 05:57:53',
            ),
            2 => 
            array (
                'created_at' => '2021-10-30 05:57:53',
                'guard_name' => 'web',
                'name' => 'vehicle_ekspedisi-update',
                'updated_at' => '2021-10-30 05:57:53',
            ),
            3 => 
            array (
                'created_at' => '2021-10-30 05:57:54',
                'guard_name' => 'web',
                'name' => 'vehicle_ekspedisi-delete',
                'updated_at' => '2021-10-30 05:57:54',
            ),
            4 => 
            array (
                'created_at' => '2021-10-30 05:57:54',
                'guard_name' => 'web',
                'name' => 'contact_ekspedisi-index',
                'updated_at' => '2021-10-30 05:57:54',
            ),
            5 => 
            array (
                'created_at' => '2021-10-30 05:57:54',
                'guard_name' => 'web',
                'name' => 'contact_ekspedisi-create',
                'updated_at' => '2021-10-30 05:57:54',
            ),
            6 => 
            array (
                'created_at' => '2021-10-30 05:57:55',
                'guard_name' => 'web',
                'name' => 'contact_ekspedisi-update',
                'updated_at' => '2021-10-30 05:57:55',
            ),
            7 => 
            array (
                'created_at' => '2021-10-30 05:57:55',
                'guard_name' => 'web',
                'name' => 'contact_ekspedisi-delete',
                'updated_at' => '2021-10-30 05:57:55',
            ),
            8 => 
            array (
                'created_at' => '2021-10-30 05:57:55',
                'guard_name' => 'web',
                'name' => 'location_ekspedisi-index',
                'updated_at' => '2021-10-30 05:57:55',
            ),
            9 => 
            array (
                'created_at' => '2021-10-30 05:57:56',
                'guard_name' => 'web',
                'name' => 'location_ekspedisi-create',
                'updated_at' => '2021-10-30 05:57:56',
            ),
            10 => 
            array (
                'created_at' => '2021-10-30 05:57:56',
                'guard_name' => 'web',
                'name' => 'location_ekspedisi-update',
                'updated_at' => '2021-10-30 05:57:56',
            ),
            11 => 
            array (
                'created_at' => '2021-10-30 05:57:56',
                'guard_name' => 'web',
                'name' => 'location_ekspedisi-delete',
                'updated_at' => '2021-10-30 05:57:56',
            ),
            12 => 
            array (
                'created_at' => '2021-10-30 05:59:37',
                'guard_name' => 'web',
                'name' => 'contact_supplier-index',
                'updated_at' => '2021-10-30 05:59:37',
            ),
            13 => 
            array (
                'created_at' => '2021-10-30 05:59:38',
                'guard_name' => 'web',
                'name' => 'contact_supplier-create',
                'updated_at' => '2021-10-30 05:59:38',
            ),
            14 => 
            array (
                'created_at' => '2021-10-30 05:59:38',
                'guard_name' => 'web',
                'name' => 'contact_supplier-update',
                'updated_at' => '2021-10-30 05:59:38',
            ),
            15 => 
            array (
                'created_at' => '2021-10-30 05:59:38',
                'guard_name' => 'web',
                'name' => 'contact_supplier-delete',
                'updated_at' => '2021-10-30 05:59:38',
            ),
            16 => 
            array (
                'created_at' => '2021-10-30 05:59:39',
                'guard_name' => 'web',
                'name' => 'location_supplier-index',
                'updated_at' => '2021-10-30 05:59:39',
            ),
            17 => 
            array (
                'created_at' => '2021-10-30 05:59:39',
                'guard_name' => 'web',
                'name' => 'location_supplier-create',
                'updated_at' => '2021-10-30 05:59:39',
            ),
            18 => 
            array (
                'created_at' => '2021-10-30 05:59:39',
                'guard_name' => 'web',
                'name' => 'location_supplier-update',
                'updated_at' => '2021-10-30 05:59:39',
            ),
            19 => 
            array (
                'created_at' => '2021-10-30 05:59:39',
                'guard_name' => 'web',
                'name' => 'location_supplier-delete',
                'updated_at' => '2021-10-30 05:59:39',
            ),
            20 => 
            array (
                'created_at' => '2021-10-30 05:59:40',
                'guard_name' => 'web',
                'name' => 'contact_customer-index',
                'updated_at' => '2021-10-30 05:59:40',
            ),
            21 => 
            array (
                'created_at' => '2021-10-30 05:59:40',
                'guard_name' => 'web',
                'name' => 'contact_customer-create',
                'updated_at' => '2021-10-30 05:59:40',
            ),
            22 => 
            array (
                'created_at' => '2021-10-30 05:59:40',
                'guard_name' => 'web',
                'name' => 'contact_customer-update',
                'updated_at' => '2021-10-30 05:59:40',
            ),
            23 => 
            array (
                'created_at' => '2021-10-30 05:59:41',
                'guard_name' => 'web',
                'name' => 'contact_customer-delete',
                'updated_at' => '2021-10-30 05:59:41',
            ),
            24 => 
            array (
                'created_at' => '2021-10-30 05:59:42',
                'guard_name' => 'web',
                'name' => 'location_customer-index',
                'updated_at' => '2021-10-30 05:59:42',
            ),
            25 => 
            array (
                'created_at' => '2021-10-30 05:59:42',
                'guard_name' => 'web',
                'name' => 'location_customer-create',
                'updated_at' => '2021-10-30 05:59:42',
            ),
            26 => 
            array (
                'created_at' => '2021-10-30 05:59:42',
                'guard_name' => 'web',
                'name' => 'location_customer-update',
                'updated_at' => '2021-10-30 05:59:42',
            ),
            27 => 
            array (
                'created_at' => '2021-10-30 05:59:42',
                'guard_name' => 'web',
                'name' => 'location_customer-delete',
                'updated_at' => '2021-10-30 05:59:42',
            ),
            28 => 
            array (
                'created_at' => '2021-11-01 06:13:35',
                'guard_name' => 'web',
                'name' => 'entity-index',
                'updated_at' => '2021-11-01 06:13:35',
            ),
            29 => 
            array (
                'created_at' => '2021-11-01 06:13:35',
                'guard_name' => 'web',
                'name' => 'entity-create',
                'updated_at' => '2021-11-01 06:13:35',
            ),
            30 => 
            array (
                'created_at' => '2021-11-01 06:13:35',
                'guard_name' => 'web',
                'name' => 'entity-update',
                'updated_at' => '2021-11-01 06:13:35',
            ),
            31 => 
            array (
                'created_at' => '2021-11-01 06:13:35',
                'guard_name' => 'web',
                'name' => 'entity-delete',
                'updated_at' => '2021-11-01 06:13:35',
            ),
            32 => 
            array (
                'created_at' => '2021-11-01 08:26:05',
                'guard_name' => 'web',
                'name' => 'trip-index',
                'updated_at' => '2021-11-01 08:26:05',
            ),
            33 => 
            array (
                'created_at' => '2021-11-01 08:26:06',
                'guard_name' => 'web',
                'name' => 'trip-create',
                'updated_at' => '2021-11-01 08:26:06',
            ),
            34 => 
            array (
                'created_at' => '2021-11-01 08:26:06',
                'guard_name' => 'web',
                'name' => 'trip-update',
                'updated_at' => '2021-11-01 08:26:06',
            ),
            35 => 
            array (
                'created_at' => '2021-11-01 08:26:06',
                'guard_name' => 'web',
                'name' => 'trip-delete',
                'updated_at' => '2021-11-01 08:26:06',
            ),
        ));
        
        
    }
}
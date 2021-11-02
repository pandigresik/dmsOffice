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
                'id' => 1,
                'name' => 'menu-index',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 2,
                'name' => 'menu-create',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 3,
                'name' => 'menu-update',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 4,
                'name' => 'menu-delete',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 5,
                'name' => 'user-index',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 6,
                'name' => 'user-create',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 7,
                'name' => 'user-update',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 8,
                'name' => 'user-delete',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 9,
                'name' => 'role-index',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 10,
                'name' => 'role-create',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 11,
                'name' => 'role-update',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 12,
                'name' => 'role-delete',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 13,
                'name' => 'permission-index',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 14,
                'name' => 'permission-create',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 15,
                'name' => 'permission-update',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 16,
                'name' => 'permission-delete',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'created_at' => '2021-08-10 13:38:08',
                'guard_name' => 'web',
                'id' => 17,
                'name' => 'city-index',
                'updated_at' => '2021-08-10 13:38:08',
            ),
            17 => 
            array (
                'created_at' => '2021-08-10 13:38:09',
                'guard_name' => 'web',
                'id' => 18,
                'name' => 'city-create',
                'updated_at' => '2021-08-10 13:38:09',
            ),
            18 => 
            array (
                'created_at' => '2021-08-10 13:38:09',
                'guard_name' => 'web',
                'id' => 19,
                'name' => 'city-update',
                'updated_at' => '2021-08-10 13:38:09',
            ),
            19 => 
            array (
                'created_at' => '2021-08-10 13:38:09',
                'guard_name' => 'web',
                'id' => 20,
                'name' => 'city-delete',
                'updated_at' => '2021-08-10 13:38:09',
            ),
            20 => 
            array (
                'created_at' => '2021-08-10 13:38:12',
                'guard_name' => 'web',
                'id' => 21,
                'name' => 'vehicle_group-index',
                'updated_at' => '2021-08-10 13:38:12',
            ),
            21 => 
            array (
                'created_at' => '2021-08-10 13:38:12',
                'guard_name' => 'web',
                'id' => 22,
                'name' => 'vehicle_group-create',
                'updated_at' => '2021-08-10 13:38:12',
            ),
            22 => 
            array (
                'created_at' => '2021-08-10 13:38:12',
                'guard_name' => 'web',
                'id' => 23,
                'name' => 'vehicle_group-update',
                'updated_at' => '2021-08-10 13:38:12',
            ),
            23 => 
            array (
                'created_at' => '2021-08-10 13:38:13',
                'guard_name' => 'web',
                'id' => 24,
                'name' => 'vehicle_group-delete',
                'updated_at' => '2021-08-10 13:38:13',
            ),
            24 => 
            array (
                'created_at' => '2021-08-10 13:39:40',
                'guard_name' => 'web',
                'id' => 25,
                'name' => 'vendor-index',
                'updated_at' => '2021-08-10 13:39:40',
            ),
            25 => 
            array (
                'created_at' => '2021-08-10 13:39:40',
                'guard_name' => 'web',
                'id' => 26,
                'name' => 'vendor-create',
                'updated_at' => '2021-08-10 13:39:40',
            ),
            26 => 
            array (
                'created_at' => '2021-08-10 13:39:41',
                'guard_name' => 'web',
                'id' => 27,
                'name' => 'vendor-update',
                'updated_at' => '2021-08-10 13:39:41',
            ),
            27 => 
            array (
                'created_at' => '2021-08-10 13:39:41',
                'guard_name' => 'web',
                'id' => 28,
                'name' => 'vendor-delete',
                'updated_at' => '2021-08-10 13:39:41',
            ),
            28 => 
            array (
                'created_at' => '2021-08-10 13:39:43',
                'guard_name' => 'web',
                'id' => 29,
                'name' => 'route_trip-index',
                'updated_at' => '2021-08-10 13:39:43',
            ),
            29 => 
            array (
                'created_at' => '2021-08-10 13:39:43',
                'guard_name' => 'web',
                'id' => 30,
                'name' => 'route_trip-create',
                'updated_at' => '2021-08-10 13:39:43',
            ),
            30 => 
            array (
                'created_at' => '2021-08-10 13:39:43',
                'guard_name' => 'web',
                'id' => 31,
                'name' => 'route_trip-update',
                'updated_at' => '2021-08-10 13:39:43',
            ),
            31 => 
            array (
                'created_at' => '2021-08-10 13:39:43',
                'guard_name' => 'web',
                'id' => 32,
                'name' => 'route_trip-delete',
                'updated_at' => '2021-08-10 13:39:43',
            ),
            32 => 
            array (
                'created_at' => '2021-08-10 13:39:44',
                'guard_name' => 'web',
                'id' => 33,
                'name' => 'vendor_trip-index',
                'updated_at' => '2021-08-10 13:39:44',
            ),
            33 => 
            array (
                'created_at' => '2021-08-10 13:39:44',
                'guard_name' => 'web',
                'id' => 34,
                'name' => 'vendor_trip-create',
                'updated_at' => '2021-08-10 13:39:44',
            ),
            34 => 
            array (
                'created_at' => '2021-08-10 13:39:44',
                'guard_name' => 'web',
                'id' => 35,
                'name' => 'vendor_trip-update',
                'updated_at' => '2021-08-10 13:39:44',
            ),
            35 => 
            array (
                'created_at' => '2021-08-10 13:39:45',
                'guard_name' => 'web',
                'id' => 36,
                'name' => 'vendor_trip-delete',
                'updated_at' => '2021-08-10 13:39:45',
            ),
            36 => 
            array (
                'created_at' => '2021-08-10 13:39:48',
                'guard_name' => 'web',
                'id' => 37,
                'name' => 'vehicle-index',
                'updated_at' => '2021-08-10 13:39:48',
            ),
            37 => 
            array (
                'created_at' => '2021-08-10 13:39:48',
                'guard_name' => 'web',
                'id' => 38,
                'name' => 'vehicle-create',
                'updated_at' => '2021-08-10 13:39:48',
            ),
            38 => 
            array (
                'created_at' => '2021-08-10 13:39:48',
                'guard_name' => 'web',
                'id' => 39,
                'name' => 'vehicle-update',
                'updated_at' => '2021-08-10 13:39:48',
            ),
            39 => 
            array (
                'created_at' => '2021-08-10 13:39:48',
                'guard_name' => 'web',
                'id' => 40,
                'name' => 'vehicle-delete',
                'updated_at' => '2021-08-10 13:39:48',
            ),
            40 => 
            array (
                'created_at' => '2021-08-15 15:20:27',
                'guard_name' => 'web',
                'id' => 41,
                'name' => 'company-index',
                'updated_at' => '2021-08-15 15:20:27',
            ),
            41 => 
            array (
                'created_at' => '2021-08-15 15:20:27',
                'guard_name' => 'web',
                'id' => 42,
                'name' => 'company-create',
                'updated_at' => '2021-08-15 15:20:27',
            ),
            42 => 
            array (
                'created_at' => '2021-08-15 15:20:27',
                'guard_name' => 'web',
                'id' => 43,
                'name' => 'company-update',
                'updated_at' => '2021-08-15 15:20:27',
            ),
            43 => 
            array (
                'created_at' => '2021-08-15 15:20:27',
                'guard_name' => 'web',
                'id' => 44,
                'name' => 'company-delete',
                'updated_at' => '2021-08-15 15:20:27',
            ),
            44 => 
            array (
                'created_at' => '2021-08-15 15:20:28',
                'guard_name' => 'web',
                'id' => 45,
                'name' => 'uom_category-index',
                'updated_at' => '2021-08-15 15:20:28',
            ),
            45 => 
            array (
                'created_at' => '2021-08-15 15:20:28',
                'guard_name' => 'web',
                'id' => 46,
                'name' => 'uom_category-create',
                'updated_at' => '2021-08-15 15:20:28',
            ),
            46 => 
            array (
                'created_at' => '2021-08-15 15:20:28',
                'guard_name' => 'web',
                'id' => 47,
                'name' => 'uom_category-update',
                'updated_at' => '2021-08-15 15:20:28',
            ),
            47 => 
            array (
                'created_at' => '2021-08-15 15:20:29',
                'guard_name' => 'web',
                'id' => 48,
                'name' => 'uom_category-delete',
                'updated_at' => '2021-08-15 15:20:29',
            ),
            48 => 
            array (
                'created_at' => '2021-08-15 15:20:30',
                'guard_name' => 'web',
                'id' => 49,
                'name' => 'uom-index',
                'updated_at' => '2021-08-15 15:20:30',
            ),
            49 => 
            array (
                'created_at' => '2021-08-15 15:20:30',
                'guard_name' => 'web',
                'id' => 50,
                'name' => 'uom-create',
                'updated_at' => '2021-08-15 15:20:30',
            ),
            50 => 
            array (
                'created_at' => '2021-08-15 15:20:30',
                'guard_name' => 'web',
                'id' => 51,
                'name' => 'uom-update',
                'updated_at' => '2021-08-15 15:20:30',
            ),
            51 => 
            array (
                'created_at' => '2021-08-15 15:20:30',
                'guard_name' => 'web',
                'id' => 52,
                'name' => 'uom-delete',
                'updated_at' => '2021-08-15 15:20:30',
            ),
            52 => 
            array (
                'created_at' => '2021-08-15 15:20:31',
                'guard_name' => 'web',
                'id' => 53,
                'name' => 'setting-index',
                'updated_at' => '2021-08-15 15:20:31',
            ),
            53 => 
            array (
                'created_at' => '2021-08-15 15:20:31',
                'guard_name' => 'web',
                'id' => 54,
                'name' => 'setting-create',
                'updated_at' => '2021-08-15 15:20:31',
            ),
            54 => 
            array (
                'created_at' => '2021-08-15 15:20:31',
                'guard_name' => 'web',
                'id' => 55,
                'name' => 'setting-update',
                'updated_at' => '2021-08-15 15:20:31',
            ),
            55 => 
            array (
                'created_at' => '2021-08-15 15:20:31',
                'guard_name' => 'web',
                'id' => 56,
                'name' => 'setting-delete',
                'updated_at' => '2021-08-15 15:20:31',
            ),
            56 => 
            array (
                'created_at' => '2021-08-15 15:20:32',
                'guard_name' => 'web',
                'id' => 57,
                'name' => 'product-index',
                'updated_at' => '2021-08-15 15:20:32',
            ),
            57 => 
            array (
                'created_at' => '2021-08-15 15:20:32',
                'guard_name' => 'web',
                'id' => 58,
                'name' => 'product-create',
                'updated_at' => '2021-08-15 15:20:32',
            ),
            58 => 
            array (
                'created_at' => '2021-08-15 15:20:32',
                'guard_name' => 'web',
                'id' => 59,
                'name' => 'product-update',
                'updated_at' => '2021-08-15 15:20:32',
            ),
            59 => 
            array (
                'created_at' => '2021-08-15 15:20:32',
                'guard_name' => 'web',
                'id' => 60,
                'name' => 'product-delete',
                'updated_at' => '2021-08-15 15:20:32',
            ),
            60 => 
            array (
                'created_at' => '2021-08-15 15:21:55',
                'guard_name' => 'web',
                'id' => 61,
                'name' => 'warehouse-index',
                'updated_at' => '2021-08-15 15:21:55',
            ),
            61 => 
            array (
                'created_at' => '2021-08-15 15:21:55',
                'guard_name' => 'web',
                'id' => 62,
                'name' => 'warehouse-create',
                'updated_at' => '2021-08-15 15:21:55',
            ),
            62 => 
            array (
                'created_at' => '2021-08-15 15:21:55',
                'guard_name' => 'web',
                'id' => 63,
                'name' => 'warehouse-update',
                'updated_at' => '2021-08-15 15:21:55',
            ),
            63 => 
            array (
                'created_at' => '2021-08-15 15:21:55',
                'guard_name' => 'web',
                'id' => 64,
                'name' => 'warehouse-delete',
                'updated_at' => '2021-08-15 15:21:55',
            ),
            64 => 
            array (
                'created_at' => '2021-08-15 15:22:16',
                'guard_name' => 'web',
                'id' => 65,
                'name' => 'stock_quant-index',
                'updated_at' => '2021-08-15 15:22:16',
            ),
            65 => 
            array (
                'created_at' => '2021-08-15 15:22:16',
                'guard_name' => 'web',
                'id' => 66,
                'name' => 'stock_quant-create',
                'updated_at' => '2021-08-15 15:22:16',
            ),
            66 => 
            array (
                'created_at' => '2021-08-15 15:22:16',
                'guard_name' => 'web',
                'id' => 67,
                'name' => 'stock_quant-update',
                'updated_at' => '2021-08-15 15:22:16',
            ),
            67 => 
            array (
                'created_at' => '2021-08-15 15:22:16',
                'guard_name' => 'web',
                'id' => 68,
                'name' => 'stock_quant-delete',
                'updated_at' => '2021-08-15 15:22:16',
            ),
            68 => 
            array (
                'created_at' => '2021-08-15 15:22:17',
                'guard_name' => 'web',
                'id' => 69,
                'name' => 'stock_inventory-index',
                'updated_at' => '2021-08-15 15:22:17',
            ),
            69 => 
            array (
                'created_at' => '2021-08-15 15:22:17',
                'guard_name' => 'web',
                'id' => 70,
                'name' => 'stock_inventory-create',
                'updated_at' => '2021-08-15 15:22:17',
            ),
            70 => 
            array (
                'created_at' => '2021-08-15 15:22:17',
                'guard_name' => 'web',
                'id' => 71,
                'name' => 'stock_inventory-update',
                'updated_at' => '2021-08-15 15:22:17',
            ),
            71 => 
            array (
                'created_at' => '2021-08-15 15:22:17',
                'guard_name' => 'web',
                'id' => 72,
                'name' => 'stock_inventory-delete',
                'updated_at' => '2021-08-15 15:22:17',
            ),
            72 => 
            array (
                'created_at' => '2021-08-15 15:22:18',
                'guard_name' => 'web',
                'id' => 73,
                'name' => 'stock_picking_type-index',
                'updated_at' => '2021-08-15 15:22:18',
            ),
            73 => 
            array (
                'created_at' => '2021-08-15 15:22:18',
                'guard_name' => 'web',
                'id' => 74,
                'name' => 'stock_picking_type-create',
                'updated_at' => '2021-08-15 15:22:18',
            ),
            74 => 
            array (
                'created_at' => '2021-08-15 15:22:18',
                'guard_name' => 'web',
                'id' => 75,
                'name' => 'stock_picking_type-update',
                'updated_at' => '2021-08-15 15:22:18',
            ),
            75 => 
            array (
                'created_at' => '2021-08-15 15:22:19',
                'guard_name' => 'web',
                'id' => 76,
                'name' => 'stock_picking_type-delete',
                'updated_at' => '2021-08-15 15:22:19',
            ),
            76 => 
            array (
                'created_at' => '2021-08-15 15:22:19',
                'guard_name' => 'web',
                'id' => 77,
                'name' => 'stock_picking-index',
                'updated_at' => '2021-08-15 15:22:19',
            ),
            77 => 
            array (
                'created_at' => '2021-08-15 15:22:19',
                'guard_name' => 'web',
                'id' => 78,
                'name' => 'stock_picking-create',
                'updated_at' => '2021-08-15 15:22:19',
            ),
            78 => 
            array (
                'created_at' => '2021-08-15 15:22:20',
                'guard_name' => 'web',
                'id' => 79,
                'name' => 'stock_picking-update',
                'updated_at' => '2021-08-15 15:22:20',
            ),
            79 => 
            array (
                'created_at' => '2021-08-15 15:22:20',
                'guard_name' => 'web',
                'id' => 80,
                'name' => 'stock_picking-delete',
                'updated_at' => '2021-08-15 15:22:20',
            ),
            80 => 
            array (
                'created_at' => '2021-10-03 14:24:54',
                'guard_name' => 'web',
                'id' => 129,
                'name' => 'btb_view_tmp-index',
                'updated_at' => '2021-10-03 14:24:54',
            ),
            81 => 
            array (
                'created_at' => '2021-10-03 14:24:55',
                'guard_name' => 'web',
                'id' => 130,
                'name' => 'btb_view_tmp-create',
                'updated_at' => '2021-10-03 14:24:55',
            ),
            82 => 
            array (
                'created_at' => '2021-10-03 14:24:56',
                'guard_name' => 'web',
                'id' => 131,
                'name' => 'btb_view_tmp-update',
                'updated_at' => '2021-10-03 14:24:56',
            ),
            83 => 
            array (
                'created_at' => '2021-10-03 14:24:56',
                'guard_name' => 'web',
                'id' => 132,
                'name' => 'btb_view_tmp-delete',
                'updated_at' => '2021-10-03 14:24:56',
            ),
            84 => 
            array (
                'created_at' => '2021-10-21 14:08:06',
                'guard_name' => 'web',
                'id' => 133,
                'name' => 'vendor_contact-index',
                'updated_at' => '2021-10-21 14:08:06',
            ),
            85 => 
            array (
                'created_at' => '2021-10-21 14:08:06',
                'guard_name' => 'web',
                'id' => 134,
                'name' => 'vendor_contact-create',
                'updated_at' => '2021-10-21 14:08:06',
            ),
            86 => 
            array (
                'created_at' => '2021-10-21 14:08:06',
                'guard_name' => 'web',
                'id' => 135,
                'name' => 'vendor_contact-update',
                'updated_at' => '2021-10-21 14:08:06',
            ),
            87 => 
            array (
                'created_at' => '2021-10-21 14:08:07',
                'guard_name' => 'web',
                'id' => 136,
                'name' => 'vendor_contact-delete',
                'updated_at' => '2021-10-21 14:08:07',
            ),
            88 => 
            array (
                'created_at' => '2021-10-21 14:08:08',
                'guard_name' => 'web',
                'id' => 137,
                'name' => 'vendor_location-index',
                'updated_at' => '2021-10-21 14:08:08',
            ),
            89 => 
            array (
                'created_at' => '2021-10-21 14:08:08',
                'guard_name' => 'web',
                'id' => 138,
                'name' => 'vendor_location-create',
                'updated_at' => '2021-10-21 14:08:08',
            ),
            90 => 
            array (
                'created_at' => '2021-10-21 14:08:08',
                'guard_name' => 'web',
                'id' => 139,
                'name' => 'vendor_location-update',
                'updated_at' => '2021-10-21 14:08:08',
            ),
            91 => 
            array (
                'created_at' => '2021-10-21 14:08:08',
                'guard_name' => 'web',
                'id' => 140,
                'name' => 'vendor_location-delete',
                'updated_at' => '2021-10-21 14:08:08',
            ),
            92 => 
            array (
                'created_at' => '2021-10-29 03:56:22',
                'guard_name' => 'web',
                'id' => 141,
                'name' => 'dms_ap_supplier-index',
                'updated_at' => '2021-10-29 03:56:22',
            ),
            93 => 
            array (
                'created_at' => '2021-10-29 03:56:22',
                'guard_name' => 'web',
                'id' => 142,
                'name' => 'dms_ap_supplier-create',
                'updated_at' => '2021-10-29 03:56:22',
            ),
            94 => 
            array (
                'created_at' => '2021-10-29 03:56:22',
                'guard_name' => 'web',
                'id' => 143,
                'name' => 'dms_ap_supplier-update',
                'updated_at' => '2021-10-29 03:56:22',
            ),
            95 => 
            array (
                'created_at' => '2021-10-29 03:56:23',
                'guard_name' => 'web',
                'id' => 144,
                'name' => 'dms_ap_supplier-delete',
                'updated_at' => '2021-10-29 03:56:23',
            ),
            96 => 
            array (
                'created_at' => '2021-10-29 03:56:23',
                'guard_name' => 'web',
                'id' => 145,
                'name' => 'dms_ar_customer-index',
                'updated_at' => '2021-10-29 03:56:23',
            ),
            97 => 
            array (
                'created_at' => '2021-10-29 03:56:23',
                'guard_name' => 'web',
                'id' => 146,
                'name' => 'dms_ar_customer-create',
                'updated_at' => '2021-10-29 03:56:23',
            ),
            98 => 
            array (
                'created_at' => '2021-10-29 03:56:24',
                'guard_name' => 'web',
                'id' => 147,
                'name' => 'dms_ar_customer-update',
                'updated_at' => '2021-10-29 03:56:24',
            ),
            99 => 
            array (
                'created_at' => '2021-10-29 03:56:24',
                'guard_name' => 'web',
                'id' => 148,
                'name' => 'dms_ar_customer-delete',
                'updated_at' => '2021-10-29 03:56:24',
            ),
        ));
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'created_at' => '2021-10-29 03:56:24',
                'guard_name' => 'web',
                'id' => 149,
                'name' => 'dms_ar_customercategory-index',
                'updated_at' => '2021-10-29 03:56:24',
            ),
            1 => 
            array (
                'created_at' => '2021-10-29 03:56:24',
                'guard_name' => 'web',
                'id' => 150,
                'name' => 'dms_ar_customercategory-create',
                'updated_at' => '2021-10-29 03:56:24',
            ),
            2 => 
            array (
                'created_at' => '2021-10-29 03:56:25',
                'guard_name' => 'web',
                'id' => 151,
                'name' => 'dms_ar_customercategory-update',
                'updated_at' => '2021-10-29 03:56:25',
            ),
            3 => 
            array (
                'created_at' => '2021-10-29 03:56:25',
                'guard_name' => 'web',
                'id' => 152,
                'name' => 'dms_ar_customercategory-delete',
                'updated_at' => '2021-10-29 03:56:25',
            ),
            4 => 
            array (
                'created_at' => '2021-10-29 03:56:25',
                'guard_name' => 'web',
                'id' => 153,
                'name' => 'dms_ar_customercategorytype-index',
                'updated_at' => '2021-10-29 03:56:25',
            ),
            5 => 
            array (
                'created_at' => '2021-10-29 03:56:26',
                'guard_name' => 'web',
                'id' => 154,
                'name' => 'dms_ar_customercategorytype-create',
                'updated_at' => '2021-10-29 03:56:26',
            ),
            6 => 
            array (
                'created_at' => '2021-10-29 03:56:26',
                'guard_name' => 'web',
                'id' => 155,
                'name' => 'dms_ar_customercategorytype-update',
                'updated_at' => '2021-10-29 03:56:26',
            ),
            7 => 
            array (
                'created_at' => '2021-10-29 03:56:26',
                'guard_name' => 'web',
                'id' => 156,
                'name' => 'dms_ar_customercategorytype-delete',
                'updated_at' => '2021-10-29 03:56:26',
            ),
            8 => 
            array (
                'created_at' => '2021-10-29 03:56:27',
                'guard_name' => 'web',
                'id' => 157,
                'name' => 'dms_ar_customerhierarchy-index',
                'updated_at' => '2021-10-29 03:56:27',
            ),
            9 => 
            array (
                'created_at' => '2021-10-29 03:56:27',
                'guard_name' => 'web',
                'id' => 158,
                'name' => 'dms_ar_customerhierarchy-create',
                'updated_at' => '2021-10-29 03:56:27',
            ),
            10 => 
            array (
                'created_at' => '2021-10-29 03:56:27',
                'guard_name' => 'web',
                'id' => 159,
                'name' => 'dms_ar_customerhierarchy-update',
                'updated_at' => '2021-10-29 03:56:27',
            ),
            11 => 
            array (
                'created_at' => '2021-10-29 03:56:27',
                'guard_name' => 'web',
                'id' => 160,
                'name' => 'dms_ar_customerhierarchy-delete',
                'updated_at' => '2021-10-29 03:56:27',
            ),
            12 => 
            array (
                'created_at' => '2021-10-29 03:56:28',
                'guard_name' => 'web',
                'id' => 161,
                'name' => 'dms_ar_customerrouteinfo-index',
                'updated_at' => '2021-10-29 03:56:28',
            ),
            13 => 
            array (
                'created_at' => '2021-10-29 03:56:28',
                'guard_name' => 'web',
                'id' => 162,
                'name' => 'dms_ar_customerrouteinfo-create',
                'updated_at' => '2021-10-29 03:56:28',
            ),
            14 => 
            array (
                'created_at' => '2021-10-29 03:56:28',
                'guard_name' => 'web',
                'id' => 163,
                'name' => 'dms_ar_customerrouteinfo-update',
                'updated_at' => '2021-10-29 03:56:28',
            ),
            15 => 
            array (
                'created_at' => '2021-10-29 03:56:28',
                'guard_name' => 'web',
                'id' => 164,
                'name' => 'dms_ar_customerrouteinfo-delete',
                'updated_at' => '2021-10-29 03:56:28',
            ),
            16 => 
            array (
                'created_at' => '2021-10-29 03:56:29',
                'guard_name' => 'web',
                'id' => 165,
                'name' => 'dms_ar_doccustomer-index',
                'updated_at' => '2021-10-29 03:56:29',
            ),
            17 => 
            array (
                'created_at' => '2021-10-29 03:56:29',
                'guard_name' => 'web',
                'id' => 166,
                'name' => 'dms_ar_doccustomer-create',
                'updated_at' => '2021-10-29 03:56:29',
            ),
            18 => 
            array (
                'created_at' => '2021-10-29 03:56:29',
                'guard_name' => 'web',
                'id' => 167,
                'name' => 'dms_ar_doccustomer-update',
                'updated_at' => '2021-10-29 03:56:29',
            ),
            19 => 
            array (
                'created_at' => '2021-10-29 03:56:29',
                'guard_name' => 'web',
                'id' => 168,
                'name' => 'dms_ar_doccustomer-delete',
                'updated_at' => '2021-10-29 03:56:29',
            ),
            20 => 
            array (
                'created_at' => '2021-10-29 03:56:30',
                'guard_name' => 'web',
                'id' => 169,
                'name' => 'dms_ar_paymentterm-index',
                'updated_at' => '2021-10-29 03:56:30',
            ),
            21 => 
            array (
                'created_at' => '2021-10-29 03:56:30',
                'guard_name' => 'web',
                'id' => 170,
                'name' => 'dms_ar_paymentterm-create',
                'updated_at' => '2021-10-29 03:56:30',
            ),
            22 => 
            array (
                'created_at' => '2021-10-29 03:56:30',
                'guard_name' => 'web',
                'id' => 171,
                'name' => 'dms_ar_paymentterm-update',
                'updated_at' => '2021-10-29 03:56:30',
            ),
            23 => 
            array (
                'created_at' => '2021-10-29 03:56:31',
                'guard_name' => 'web',
                'id' => 172,
                'name' => 'dms_ar_paymentterm-delete',
                'updated_at' => '2021-10-29 03:56:31',
            ),
            24 => 
            array (
                'created_at' => '2021-10-29 03:56:31',
                'guard_name' => 'web',
                'id' => 173,
                'name' => 'dms_ar_paymenttype-index',
                'updated_at' => '2021-10-29 03:56:31',
            ),
            25 => 
            array (
                'created_at' => '2021-10-29 03:56:31',
                'guard_name' => 'web',
                'id' => 174,
                'name' => 'dms_ar_paymenttype-create',
                'updated_at' => '2021-10-29 03:56:31',
            ),
            26 => 
            array (
                'created_at' => '2021-10-29 03:56:32',
                'guard_name' => 'web',
                'id' => 175,
                'name' => 'dms_ar_paymenttype-update',
                'updated_at' => '2021-10-29 03:56:32',
            ),
            27 => 
            array (
                'created_at' => '2021-10-29 03:56:32',
                'guard_name' => 'web',
                'id' => 176,
                'name' => 'dms_ar_paymenttype-delete',
                'updated_at' => '2021-10-29 03:56:32',
            ),
            28 => 
            array (
                'created_at' => '2021-10-29 03:56:32',
                'guard_name' => 'web',
                'id' => 177,
                'name' => 'dms_ar_pricesegment-index',
                'updated_at' => '2021-10-29 03:56:32',
            ),
            29 => 
            array (
                'created_at' => '2021-10-29 03:56:33',
                'guard_name' => 'web',
                'id' => 178,
                'name' => 'dms_ar_pricesegment-create',
                'updated_at' => '2021-10-29 03:56:33',
            ),
            30 => 
            array (
                'created_at' => '2021-10-29 03:56:33',
                'guard_name' => 'web',
                'id' => 179,
                'name' => 'dms_ar_pricesegment-update',
                'updated_at' => '2021-10-29 03:56:33',
            ),
            31 => 
            array (
                'created_at' => '2021-10-29 03:56:33',
                'guard_name' => 'web',
                'id' => 180,
                'name' => 'dms_ar_pricesegment-delete',
                'updated_at' => '2021-10-29 03:56:33',
            ),
            32 => 
            array (
                'created_at' => '2021-10-29 03:56:33',
                'guard_name' => 'web',
                'id' => 181,
                'name' => 'dms_fin_account-index',
                'updated_at' => '2021-10-29 03:56:33',
            ),
            33 => 
            array (
                'created_at' => '2021-10-29 03:56:34',
                'guard_name' => 'web',
                'id' => 182,
                'name' => 'dms_fin_account-create',
                'updated_at' => '2021-10-29 03:56:34',
            ),
            34 => 
            array (
                'created_at' => '2021-10-29 03:56:34',
                'guard_name' => 'web',
                'id' => 183,
                'name' => 'dms_fin_account-update',
                'updated_at' => '2021-10-29 03:56:34',
            ),
            35 => 
            array (
                'created_at' => '2021-10-29 03:56:34',
                'guard_name' => 'web',
                'id' => 184,
                'name' => 'dms_fin_account-delete',
                'updated_at' => '2021-10-29 03:56:34',
            ),
            36 => 
            array (
                'created_at' => '2021-10-29 03:56:35',
                'guard_name' => 'web',
                'id' => 185,
                'name' => 'dms_fin_subaccount-index',
                'updated_at' => '2021-10-29 03:56:35',
            ),
            37 => 
            array (
                'created_at' => '2021-10-29 03:56:35',
                'guard_name' => 'web',
                'id' => 186,
                'name' => 'dms_fin_subaccount-create',
                'updated_at' => '2021-10-29 03:56:35',
            ),
            38 => 
            array (
                'created_at' => '2021-10-29 03:56:35',
                'guard_name' => 'web',
                'id' => 187,
                'name' => 'dms_fin_subaccount-update',
                'updated_at' => '2021-10-29 03:56:35',
            ),
            39 => 
            array (
                'created_at' => '2021-10-29 03:56:35',
                'guard_name' => 'web',
                'id' => 188,
                'name' => 'dms_fin_subaccount-delete',
                'updated_at' => '2021-10-29 03:56:35',
            ),
            40 => 
            array (
                'created_at' => '2021-10-29 03:56:36',
                'guard_name' => 'web',
                'id' => 189,
                'name' => 'dms_inv_carrier-index',
                'updated_at' => '2021-10-29 03:56:36',
            ),
            41 => 
            array (
                'created_at' => '2021-10-29 03:56:36',
                'guard_name' => 'web',
                'id' => 190,
                'name' => 'dms_inv_carrier-create',
                'updated_at' => '2021-10-29 03:56:36',
            ),
            42 => 
            array (
                'created_at' => '2021-10-29 03:56:36',
                'guard_name' => 'web',
                'id' => 191,
                'name' => 'dms_inv_carrier-update',
                'updated_at' => '2021-10-29 03:56:36',
            ),
            43 => 
            array (
                'created_at' => '2021-10-29 03:56:36',
                'guard_name' => 'web',
                'id' => 192,
                'name' => 'dms_inv_carrier-delete',
                'updated_at' => '2021-10-29 03:56:36',
            ),
            44 => 
            array (
                'created_at' => '2021-10-29 03:56:37',
                'guard_name' => 'web',
                'id' => 193,
                'name' => 'dms_inv_carrierdriver-index',
                'updated_at' => '2021-10-29 03:56:37',
            ),
            45 => 
            array (
                'created_at' => '2021-10-29 03:56:37',
                'guard_name' => 'web',
                'id' => 194,
                'name' => 'dms_inv_carrierdriver-create',
                'updated_at' => '2021-10-29 03:56:37',
            ),
            46 => 
            array (
                'created_at' => '2021-10-29 03:56:37',
                'guard_name' => 'web',
                'id' => 195,
                'name' => 'dms_inv_carrierdriver-update',
                'updated_at' => '2021-10-29 03:56:37',
            ),
            47 => 
            array (
                'created_at' => '2021-10-29 03:56:37',
                'guard_name' => 'web',
                'id' => 196,
                'name' => 'dms_inv_carrierdriver-delete',
                'updated_at' => '2021-10-29 03:56:37',
            ),
            48 => 
            array (
                'created_at' => '2021-10-29 03:56:38',
                'guard_name' => 'web',
                'id' => 197,
                'name' => 'dms_inv_carriervehicle-index',
                'updated_at' => '2021-10-29 03:56:38',
            ),
            49 => 
            array (
                'created_at' => '2021-10-29 03:56:38',
                'guard_name' => 'web',
                'id' => 198,
                'name' => 'dms_inv_carriervehicle-create',
                'updated_at' => '2021-10-29 03:56:38',
            ),
            50 => 
            array (
                'created_at' => '2021-10-29 03:56:38',
                'guard_name' => 'web',
                'id' => 199,
                'name' => 'dms_inv_carriervehicle-update',
                'updated_at' => '2021-10-29 03:56:38',
            ),
            51 => 
            array (
                'created_at' => '2021-10-29 03:56:38',
                'guard_name' => 'web',
                'id' => 200,
                'name' => 'dms_inv_carriervehicle-delete',
                'updated_at' => '2021-10-29 03:56:38',
            ),
            52 => 
            array (
                'created_at' => '2021-10-29 03:56:39',
                'guard_name' => 'web',
                'id' => 201,
                'name' => 'dms_inv_product-index',
                'updated_at' => '2021-10-29 03:56:39',
            ),
            53 => 
            array (
                'created_at' => '2021-10-29 03:56:39',
                'guard_name' => 'web',
                'id' => 202,
                'name' => 'dms_inv_product-create',
                'updated_at' => '2021-10-29 03:56:39',
            ),
            54 => 
            array (
                'created_at' => '2021-10-29 03:56:39',
                'guard_name' => 'web',
                'id' => 203,
                'name' => 'dms_inv_product-update',
                'updated_at' => '2021-10-29 03:56:39',
            ),
            55 => 
            array (
                'created_at' => '2021-10-29 03:56:39',
                'guard_name' => 'web',
                'id' => 204,
                'name' => 'dms_inv_product-delete',
                'updated_at' => '2021-10-29 03:56:39',
            ),
            56 => 
            array (
                'created_at' => '2021-10-29 03:56:40',
                'guard_name' => 'web',
                'id' => 205,
                'name' => 'dms_inv_productcategory-index',
                'updated_at' => '2021-10-29 03:56:40',
            ),
            57 => 
            array (
                'created_at' => '2021-10-29 03:56:40',
                'guard_name' => 'web',
                'id' => 206,
                'name' => 'dms_inv_productcategory-create',
                'updated_at' => '2021-10-29 03:56:40',
            ),
            58 => 
            array (
                'created_at' => '2021-10-29 03:56:41',
                'guard_name' => 'web',
                'id' => 207,
                'name' => 'dms_inv_productcategory-update',
                'updated_at' => '2021-10-29 03:56:41',
            ),
            59 => 
            array (
                'created_at' => '2021-10-29 03:56:41',
                'guard_name' => 'web',
                'id' => 208,
                'name' => 'dms_inv_productcategory-delete',
                'updated_at' => '2021-10-29 03:56:41',
            ),
            60 => 
            array (
                'created_at' => '2021-10-29 03:56:42',
                'guard_name' => 'web',
                'id' => 209,
                'name' => 'dms_inv_productcategorytype-index',
                'updated_at' => '2021-10-29 03:56:42',
            ),
            61 => 
            array (
                'created_at' => '2021-10-29 03:56:42',
                'guard_name' => 'web',
                'id' => 210,
                'name' => 'dms_inv_productcategorytype-create',
                'updated_at' => '2021-10-29 03:56:42',
            ),
            62 => 
            array (
                'created_at' => '2021-10-29 03:56:42',
                'guard_name' => 'web',
                'id' => 211,
                'name' => 'dms_inv_productcategorytype-update',
                'updated_at' => '2021-10-29 03:56:42',
            ),
            63 => 
            array (
                'created_at' => '2021-10-29 03:56:42',
                'guard_name' => 'web',
                'id' => 212,
                'name' => 'dms_inv_productcategorytype-delete',
                'updated_at' => '2021-10-29 03:56:42',
            ),
            64 => 
            array (
                'created_at' => '2021-10-29 03:56:43',
                'guard_name' => 'web',
                'id' => 213,
                'name' => 'dms_inv_productitemcategory-index',
                'updated_at' => '2021-10-29 03:56:43',
            ),
            65 => 
            array (
                'created_at' => '2021-10-29 03:56:43',
                'guard_name' => 'web',
                'id' => 214,
                'name' => 'dms_inv_productitemcategory-create',
                'updated_at' => '2021-10-29 03:56:43',
            ),
            66 => 
            array (
                'created_at' => '2021-10-29 03:56:43',
                'guard_name' => 'web',
                'id' => 215,
                'name' => 'dms_inv_productitemcategory-update',
                'updated_at' => '2021-10-29 03:56:43',
            ),
            67 => 
            array (
                'created_at' => '2021-10-29 03:56:44',
                'guard_name' => 'web',
                'id' => 216,
                'name' => 'dms_inv_productitemcategory-delete',
                'updated_at' => '2021-10-29 03:56:44',
            ),
            68 => 
            array (
                'created_at' => '2021-10-29 03:56:44',
                'guard_name' => 'web',
                'id' => 217,
                'name' => 'dms_inv_productkitinfo-index',
                'updated_at' => '2021-10-29 03:56:44',
            ),
            69 => 
            array (
                'created_at' => '2021-10-29 03:56:44',
                'guard_name' => 'web',
                'id' => 218,
                'name' => 'dms_inv_productkitinfo-create',
                'updated_at' => '2021-10-29 03:56:44',
            ),
            70 => 
            array (
                'created_at' => '2021-10-29 03:56:44',
                'guard_name' => 'web',
                'id' => 219,
                'name' => 'dms_inv_productkitinfo-update',
                'updated_at' => '2021-10-29 03:56:44',
            ),
            71 => 
            array (
                'created_at' => '2021-10-29 03:56:45',
                'guard_name' => 'web',
                'id' => 220,
                'name' => 'dms_inv_productkitinfo-delete',
                'updated_at' => '2021-10-29 03:56:45',
            ),
            72 => 
            array (
                'created_at' => '2021-10-29 03:56:45',
                'guard_name' => 'web',
                'id' => 221,
                'name' => 'dms_inv_uom-index',
                'updated_at' => '2021-10-29 03:56:45',
            ),
            73 => 
            array (
                'created_at' => '2021-10-29 03:56:45',
                'guard_name' => 'web',
                'id' => 222,
                'name' => 'dms_inv_uom-create',
                'updated_at' => '2021-10-29 03:56:45',
            ),
            74 => 
            array (
                'created_at' => '2021-10-29 03:56:46',
                'guard_name' => 'web',
                'id' => 223,
                'name' => 'dms_inv_uom-update',
                'updated_at' => '2021-10-29 03:56:46',
            ),
            75 => 
            array (
                'created_at' => '2021-10-29 03:56:46',
                'guard_name' => 'web',
                'id' => 224,
                'name' => 'dms_inv_uom-delete',
                'updated_at' => '2021-10-29 03:56:46',
            ),
            76 => 
            array (
                'created_at' => '2021-10-29 03:56:46',
                'guard_name' => 'web',
                'id' => 225,
                'name' => 'dms_inv_vehicle-index',
                'updated_at' => '2021-10-29 03:56:46',
            ),
            77 => 
            array (
                'created_at' => '2021-10-29 03:56:47',
                'guard_name' => 'web',
                'id' => 226,
                'name' => 'dms_inv_vehicle-create',
                'updated_at' => '2021-10-29 03:56:47',
            ),
            78 => 
            array (
                'created_at' => '2021-10-29 03:56:47',
                'guard_name' => 'web',
                'id' => 227,
                'name' => 'dms_inv_vehicle-update',
                'updated_at' => '2021-10-29 03:56:47',
            ),
            79 => 
            array (
                'created_at' => '2021-10-29 03:56:47',
                'guard_name' => 'web',
                'id' => 228,
                'name' => 'dms_inv_vehicle-delete',
                'updated_at' => '2021-10-29 03:56:47',
            ),
            80 => 
            array (
                'created_at' => '2021-10-29 03:56:48',
                'guard_name' => 'web',
                'id' => 229,
                'name' => 'dms_inv_vehicletype-index',
                'updated_at' => '2021-10-29 03:56:48',
            ),
            81 => 
            array (
                'created_at' => '2021-10-29 03:56:48',
                'guard_name' => 'web',
                'id' => 230,
                'name' => 'dms_inv_vehicletype-create',
                'updated_at' => '2021-10-29 03:56:48',
            ),
            82 => 
            array (
                'created_at' => '2021-10-29 03:56:48',
                'guard_name' => 'web',
                'id' => 231,
                'name' => 'dms_inv_vehicletype-update',
                'updated_at' => '2021-10-29 03:56:48',
            ),
            83 => 
            array (
                'created_at' => '2021-10-29 03:56:48',
                'guard_name' => 'web',
                'id' => 232,
                'name' => 'dms_inv_vehicletype-delete',
                'updated_at' => '2021-10-29 03:56:48',
            ),
            84 => 
            array (
                'created_at' => '2021-10-29 03:56:49',
                'guard_name' => 'web',
                'id' => 233,
                'name' => 'dms_inv_warehouse-index',
                'updated_at' => '2021-10-29 03:56:49',
            ),
            85 => 
            array (
                'created_at' => '2021-10-29 03:56:49',
                'guard_name' => 'web',
                'id' => 234,
                'name' => 'dms_inv_warehouse-create',
                'updated_at' => '2021-10-29 03:56:49',
            ),
            86 => 
            array (
                'created_at' => '2021-10-29 03:56:49',
                'guard_name' => 'web',
                'id' => 235,
                'name' => 'dms_inv_warehouse-update',
                'updated_at' => '2021-10-29 03:56:49',
            ),
            87 => 
            array (
                'created_at' => '2021-10-29 03:56:49',
                'guard_name' => 'web',
                'id' => 236,
                'name' => 'dms_inv_warehouse-delete',
                'updated_at' => '2021-10-29 03:56:49',
            ),
            88 => 
            array (
                'created_at' => '2021-10-29 03:56:50',
                'guard_name' => 'web',
                'id' => 237,
                'name' => 'dms_sd_pricecatalog-index',
                'updated_at' => '2021-10-29 03:56:50',
            ),
            89 => 
            array (
                'created_at' => '2021-10-29 03:56:50',
                'guard_name' => 'web',
                'id' => 238,
                'name' => 'dms_sd_pricecatalog-create',
                'updated_at' => '2021-10-29 03:56:50',
            ),
            90 => 
            array (
                'created_at' => '2021-10-29 03:56:50',
                'guard_name' => 'web',
                'id' => 239,
                'name' => 'dms_sd_pricecatalog-update',
                'updated_at' => '2021-10-29 03:56:50',
            ),
            91 => 
            array (
                'created_at' => '2021-10-29 03:56:50',
                'guard_name' => 'web',
                'id' => 240,
                'name' => 'dms_sd_pricecatalog-delete',
                'updated_at' => '2021-10-29 03:56:50',
            ),
            92 => 
            array (
                'created_at' => '2021-10-29 03:56:51',
                'guard_name' => 'web',
                'id' => 241,
                'name' => 'dms_sd_route-index',
                'updated_at' => '2021-10-29 03:56:51',
            ),
            93 => 
            array (
                'created_at' => '2021-10-29 03:56:51',
                'guard_name' => 'web',
                'id' => 242,
                'name' => 'dms_sd_route-create',
                'updated_at' => '2021-10-29 03:56:51',
            ),
            94 => 
            array (
                'created_at' => '2021-10-29 03:56:51',
                'guard_name' => 'web',
                'id' => 243,
                'name' => 'dms_sd_route-update',
                'updated_at' => '2021-10-29 03:56:51',
            ),
            95 => 
            array (
                'created_at' => '2021-10-29 03:56:51',
                'guard_name' => 'web',
                'id' => 244,
                'name' => 'dms_sd_route-delete',
                'updated_at' => '2021-10-29 03:56:51',
            ),
            96 => 
            array (
                'created_at' => '2021-10-29 03:56:52',
                'guard_name' => 'web',
                'id' => 245,
                'name' => 'dms_sd_routeitem-index',
                'updated_at' => '2021-10-29 03:56:52',
            ),
            97 => 
            array (
                'created_at' => '2021-10-29 03:56:52',
                'guard_name' => 'web',
                'id' => 246,
                'name' => 'dms_sd_routeitem-create',
                'updated_at' => '2021-10-29 03:56:52',
            ),
            98 => 
            array (
                'created_at' => '2021-10-29 03:56:52',
                'guard_name' => 'web',
                'id' => 247,
                'name' => 'dms_sd_routeitem-update',
                'updated_at' => '2021-10-29 03:56:52',
            ),
            99 => 
            array (
                'created_at' => '2021-10-29 03:56:52',
                'guard_name' => 'web',
                'id' => 248,
                'name' => 'dms_sd_routeitem-delete',
                'updated_at' => '2021-10-29 03:56:52',
            ),
        ));
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'created_at' => '2021-10-30 05:57:53',
                'guard_name' => 'web',
                'id' => 249,
                'name' => 'vehicle_ekspedisi-index',
                'updated_at' => '2021-10-30 05:57:53',
            ),
            1 => 
            array (
                'created_at' => '2021-10-30 05:57:53',
                'guard_name' => 'web',
                'id' => 250,
                'name' => 'vehicle_ekspedisi-create',
                'updated_at' => '2021-10-30 05:57:53',
            ),
            2 => 
            array (
                'created_at' => '2021-10-30 05:57:53',
                'guard_name' => 'web',
                'id' => 251,
                'name' => 'vehicle_ekspedisi-update',
                'updated_at' => '2021-10-30 05:57:53',
            ),
            3 => 
            array (
                'created_at' => '2021-10-30 05:57:54',
                'guard_name' => 'web',
                'id' => 252,
                'name' => 'vehicle_ekspedisi-delete',
                'updated_at' => '2021-10-30 05:57:54',
            ),
            4 => 
            array (
                'created_at' => '2021-10-30 05:57:54',
                'guard_name' => 'web',
                'id' => 253,
                'name' => 'contact_ekspedisi-index',
                'updated_at' => '2021-10-30 05:57:54',
            ),
            5 => 
            array (
                'created_at' => '2021-10-30 05:57:54',
                'guard_name' => 'web',
                'id' => 254,
                'name' => 'contact_ekspedisi-create',
                'updated_at' => '2021-10-30 05:57:54',
            ),
            6 => 
            array (
                'created_at' => '2021-10-30 05:57:55',
                'guard_name' => 'web',
                'id' => 255,
                'name' => 'contact_ekspedisi-update',
                'updated_at' => '2021-10-30 05:57:55',
            ),
            7 => 
            array (
                'created_at' => '2021-10-30 05:57:55',
                'guard_name' => 'web',
                'id' => 256,
                'name' => 'contact_ekspedisi-delete',
                'updated_at' => '2021-10-30 05:57:55',
            ),
            8 => 
            array (
                'created_at' => '2021-10-30 05:57:55',
                'guard_name' => 'web',
                'id' => 257,
                'name' => 'location_ekspedisi-index',
                'updated_at' => '2021-10-30 05:57:55',
            ),
            9 => 
            array (
                'created_at' => '2021-10-30 05:57:56',
                'guard_name' => 'web',
                'id' => 258,
                'name' => 'location_ekspedisi-create',
                'updated_at' => '2021-10-30 05:57:56',
            ),
            10 => 
            array (
                'created_at' => '2021-10-30 05:57:56',
                'guard_name' => 'web',
                'id' => 259,
                'name' => 'location_ekspedisi-update',
                'updated_at' => '2021-10-30 05:57:56',
            ),
            11 => 
            array (
                'created_at' => '2021-10-30 05:57:56',
                'guard_name' => 'web',
                'id' => 260,
                'name' => 'location_ekspedisi-delete',
                'updated_at' => '2021-10-30 05:57:56',
            ),
            12 => 
            array (
                'created_at' => '2021-10-30 05:59:37',
                'guard_name' => 'web',
                'id' => 261,
                'name' => 'contact_supplier-index',
                'updated_at' => '2021-10-30 05:59:37',
            ),
            13 => 
            array (
                'created_at' => '2021-10-30 05:59:38',
                'guard_name' => 'web',
                'id' => 262,
                'name' => 'contact_supplier-create',
                'updated_at' => '2021-10-30 05:59:38',
            ),
            14 => 
            array (
                'created_at' => '2021-10-30 05:59:38',
                'guard_name' => 'web',
                'id' => 263,
                'name' => 'contact_supplier-update',
                'updated_at' => '2021-10-30 05:59:38',
            ),
            15 => 
            array (
                'created_at' => '2021-10-30 05:59:38',
                'guard_name' => 'web',
                'id' => 264,
                'name' => 'contact_supplier-delete',
                'updated_at' => '2021-10-30 05:59:38',
            ),
            16 => 
            array (
                'created_at' => '2021-10-30 05:59:39',
                'guard_name' => 'web',
                'id' => 265,
                'name' => 'location_supplier-index',
                'updated_at' => '2021-10-30 05:59:39',
            ),
            17 => 
            array (
                'created_at' => '2021-10-30 05:59:39',
                'guard_name' => 'web',
                'id' => 266,
                'name' => 'location_supplier-create',
                'updated_at' => '2021-10-30 05:59:39',
            ),
            18 => 
            array (
                'created_at' => '2021-10-30 05:59:39',
                'guard_name' => 'web',
                'id' => 267,
                'name' => 'location_supplier-update',
                'updated_at' => '2021-10-30 05:59:39',
            ),
            19 => 
            array (
                'created_at' => '2021-10-30 05:59:39',
                'guard_name' => 'web',
                'id' => 268,
                'name' => 'location_supplier-delete',
                'updated_at' => '2021-10-30 05:59:39',
            ),
            20 => 
            array (
                'created_at' => '2021-10-30 05:59:40',
                'guard_name' => 'web',
                'id' => 269,
                'name' => 'contact_customer-index',
                'updated_at' => '2021-10-30 05:59:40',
            ),
            21 => 
            array (
                'created_at' => '2021-10-30 05:59:40',
                'guard_name' => 'web',
                'id' => 270,
                'name' => 'contact_customer-create',
                'updated_at' => '2021-10-30 05:59:40',
            ),
            22 => 
            array (
                'created_at' => '2021-10-30 05:59:40',
                'guard_name' => 'web',
                'id' => 271,
                'name' => 'contact_customer-update',
                'updated_at' => '2021-10-30 05:59:40',
            ),
            23 => 
            array (
                'created_at' => '2021-10-30 05:59:41',
                'guard_name' => 'web',
                'id' => 272,
                'name' => 'contact_customer-delete',
                'updated_at' => '2021-10-30 05:59:41',
            ),
            24 => 
            array (
                'created_at' => '2021-10-30 05:59:42',
                'guard_name' => 'web',
                'id' => 273,
                'name' => 'location_customer-index',
                'updated_at' => '2021-10-30 05:59:42',
            ),
            25 => 
            array (
                'created_at' => '2021-10-30 05:59:42',
                'guard_name' => 'web',
                'id' => 274,
                'name' => 'location_customer-create',
                'updated_at' => '2021-10-30 05:59:42',
            ),
            26 => 
            array (
                'created_at' => '2021-10-30 05:59:42',
                'guard_name' => 'web',
                'id' => 275,
                'name' => 'location_customer-update',
                'updated_at' => '2021-10-30 05:59:42',
            ),
            27 => 
            array (
                'created_at' => '2021-10-30 05:59:42',
                'guard_name' => 'web',
                'id' => 276,
                'name' => 'location_customer-delete',
                'updated_at' => '2021-10-30 05:59:42',
            ),
            28 => 
            array (
                'created_at' => '2021-11-01 06:13:35',
                'guard_name' => 'web',
                'id' => 277,
                'name' => 'entity-index',
                'updated_at' => '2021-11-01 06:13:35',
            ),
            29 => 
            array (
                'created_at' => '2021-11-01 06:13:35',
                'guard_name' => 'web',
                'id' => 278,
                'name' => 'entity-create',
                'updated_at' => '2021-11-01 06:13:35',
            ),
            30 => 
            array (
                'created_at' => '2021-11-01 06:13:35',
                'guard_name' => 'web',
                'id' => 279,
                'name' => 'entity-update',
                'updated_at' => '2021-11-01 06:13:35',
            ),
            31 => 
            array (
                'created_at' => '2021-11-01 06:13:35',
                'guard_name' => 'web',
                'id' => 280,
                'name' => 'entity-delete',
                'updated_at' => '2021-11-01 06:13:35',
            ),
            32 => 
            array (
                'created_at' => '2021-11-01 08:26:05',
                'guard_name' => 'web',
                'id' => 281,
                'name' => 'trip-index',
                'updated_at' => '2021-11-01 08:26:05',
            ),
            33 => 
            array (
                'created_at' => '2021-11-01 08:26:06',
                'guard_name' => 'web',
                'id' => 282,
                'name' => 'trip-create',
                'updated_at' => '2021-11-01 08:26:06',
            ),
            34 => 
            array (
                'created_at' => '2021-11-01 08:26:06',
                'guard_name' => 'web',
                'id' => 283,
                'name' => 'trip-update',
                'updated_at' => '2021-11-01 08:26:06',
            ),
            35 => 
            array (
                'created_at' => '2021-11-01 08:26:06',
                'guard_name' => 'web',
                'id' => 284,
                'name' => 'trip-delete',
                'updated_at' => '2021-11-01 08:26:06',
            ),
        ));
        
        
    }
}
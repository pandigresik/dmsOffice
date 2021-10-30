<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DmsPermissionsTableSeeder extends Seeder
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
                'name' => 'menu-index',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'name' => 'menu-create',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'name' => 'menu-update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'name' => 'menu-delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'name' => 'user-index',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'name' => 'user-create',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'name' => 'user-update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'name' => 'user-delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'name' => 'role-index',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'name' => 'role-create',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'name' => 'role-update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'name' => 'role-delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'name' => 'permission-index',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'name' => 'permission-create',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'name' => 'permission-update',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'name' => 'permission-delete',
                'guard_name' => 'web',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'name' => 'city-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:38:08',
                'updated_at' => '2021-08-10 13:38:08',
            ),
            17 => 
            array (
                'name' => 'city-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:38:09',
                'updated_at' => '2021-08-10 13:38:09',
            ),
            18 => 
            array (
                'name' => 'city-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:38:09',
                'updated_at' => '2021-08-10 13:38:09',
            ),
            19 => 
            array (
                'name' => 'city-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:38:09',
                'updated_at' => '2021-08-10 13:38:09',
            ),
            20 => 
            array (
                'name' => 'vehicle_group-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:38:12',
                'updated_at' => '2021-08-10 13:38:12',
            ),
            21 => 
            array (
                'name' => 'vehicle_group-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:38:12',
                'updated_at' => '2021-08-10 13:38:12',
            ),
            22 => 
            array (
                'name' => 'vehicle_group-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:38:12',
                'updated_at' => '2021-08-10 13:38:12',
            ),
            23 => 
            array (
                'name' => 'vehicle_group-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:38:13',
                'updated_at' => '2021-08-10 13:38:13',
            ),
            24 => 
            array (
                'name' => 'vendor-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:40',
                'updated_at' => '2021-08-10 13:39:40',
            ),
            25 => 
            array (
                'name' => 'vendor-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:40',
                'updated_at' => '2021-08-10 13:39:40',
            ),
            26 => 
            array (
                'name' => 'vendor-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:41',
                'updated_at' => '2021-08-10 13:39:41',
            ),
            27 => 
            array (
                'name' => 'vendor-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:41',
                'updated_at' => '2021-08-10 13:39:41',
            ),
            28 => 
            array (
                'name' => 'route_trip-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:43',
                'updated_at' => '2021-08-10 13:39:43',
            ),
            29 => 
            array (
                'name' => 'route_trip-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:43',
                'updated_at' => '2021-08-10 13:39:43',
            ),
            30 => 
            array (
                'name' => 'route_trip-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:43',
                'updated_at' => '2021-08-10 13:39:43',
            ),
            31 => 
            array (
                'name' => 'route_trip-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:43',
                'updated_at' => '2021-08-10 13:39:43',
            ),
            32 => 
            array (
                'name' => 'vendor_trip-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:44',
                'updated_at' => '2021-08-10 13:39:44',
            ),
            33 => 
            array (
                'name' => 'vendor_trip-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:44',
                'updated_at' => '2021-08-10 13:39:44',
            ),
            34 => 
            array (
                'name' => 'vendor_trip-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:44',
                'updated_at' => '2021-08-10 13:39:44',
            ),
            35 => 
            array (
                'name' => 'vendor_trip-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:45',
                'updated_at' => '2021-08-10 13:39:45',
            ),
            36 => 
            array (
                'name' => 'vehicle-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:48',
                'updated_at' => '2021-08-10 13:39:48',
            ),
            37 => 
            array (
                'name' => 'vehicle-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:48',
                'updated_at' => '2021-08-10 13:39:48',
            ),
            38 => 
            array (
                'name' => 'vehicle-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:48',
                'updated_at' => '2021-08-10 13:39:48',
            ),
            39 => 
            array (
                'name' => 'vehicle-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-10 13:39:48',
                'updated_at' => '2021-08-10 13:39:48',
            ),
            40 => 
            array (
                'name' => 'company-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:27',
                'updated_at' => '2021-08-15 15:20:27',
            ),
            41 => 
            array (
                'name' => 'company-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:27',
                'updated_at' => '2021-08-15 15:20:27',
            ),
            42 => 
            array (
                'name' => 'company-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:27',
                'updated_at' => '2021-08-15 15:20:27',
            ),
            43 => 
            array (
                'name' => 'company-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:27',
                'updated_at' => '2021-08-15 15:20:27',
            ),
            44 => 
            array (
                'name' => 'uom_category-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:28',
                'updated_at' => '2021-08-15 15:20:28',
            ),
            45 => 
            array (
                'name' => 'uom_category-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:28',
                'updated_at' => '2021-08-15 15:20:28',
            ),
            46 => 
            array (
                'name' => 'uom_category-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:28',
                'updated_at' => '2021-08-15 15:20:28',
            ),
            47 => 
            array (
                'name' => 'uom_category-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:29',
                'updated_at' => '2021-08-15 15:20:29',
            ),
            48 => 
            array (
                'name' => 'uom-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:30',
                'updated_at' => '2021-08-15 15:20:30',
            ),
            49 => 
            array (
                'name' => 'uom-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:30',
                'updated_at' => '2021-08-15 15:20:30',
            ),
            50 => 
            array (
                'name' => 'uom-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:30',
                'updated_at' => '2021-08-15 15:20:30',
            ),
            51 => 
            array (
                'name' => 'uom-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:30',
                'updated_at' => '2021-08-15 15:20:30',
            ),
            52 => 
            array (
                'name' => 'setting-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:31',
                'updated_at' => '2021-08-15 15:20:31',
            ),
            53 => 
            array (
                'name' => 'setting-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:31',
                'updated_at' => '2021-08-15 15:20:31',
            ),
            54 => 
            array (
                'name' => 'setting-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:31',
                'updated_at' => '2021-08-15 15:20:31',
            ),
            55 => 
            array (
                'name' => 'setting-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:31',
                'updated_at' => '2021-08-15 15:20:31',
            ),
            56 => 
            array (
                'name' => 'product-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:32',
                'updated_at' => '2021-08-15 15:20:32',
            ),
            57 => 
            array (
                'name' => 'product-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:32',
                'updated_at' => '2021-08-15 15:20:32',
            ),
            58 => 
            array (
                'name' => 'product-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:32',
                'updated_at' => '2021-08-15 15:20:32',
            ),
            59 => 
            array (
                'name' => 'product-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:20:32',
                'updated_at' => '2021-08-15 15:20:32',
            ),
            60 => 
            array (
                'name' => 'warehouse-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:21:55',
                'updated_at' => '2021-08-15 15:21:55',
            ),
            61 => 
            array (
                'name' => 'warehouse-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:21:55',
                'updated_at' => '2021-08-15 15:21:55',
            ),
            62 => 
            array (
                'name' => 'warehouse-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:21:55',
                'updated_at' => '2021-08-15 15:21:55',
            ),
            63 => 
            array (
                'name' => 'warehouse-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:21:55',
                'updated_at' => '2021-08-15 15:21:55',
            ),
            64 => 
            array (
                'name' => 'stock_quant-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:16',
                'updated_at' => '2021-08-15 15:22:16',
            ),
            65 => 
            array (
                'name' => 'stock_quant-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:16',
                'updated_at' => '2021-08-15 15:22:16',
            ),
            66 => 
            array (
                'name' => 'stock_quant-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:16',
                'updated_at' => '2021-08-15 15:22:16',
            ),
            67 => 
            array (
                'name' => 'stock_quant-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:16',
                'updated_at' => '2021-08-15 15:22:16',
            ),
            68 => 
            array (
                'name' => 'stock_inventory-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:17',
                'updated_at' => '2021-08-15 15:22:17',
            ),
            69 => 
            array (
                'name' => 'stock_inventory-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:17',
                'updated_at' => '2021-08-15 15:22:17',
            ),
            70 => 
            array (
                'name' => 'stock_inventory-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:17',
                'updated_at' => '2021-08-15 15:22:17',
            ),
            71 => 
            array (
                'name' => 'stock_inventory-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:17',
                'updated_at' => '2021-08-15 15:22:17',
            ),
            72 => 
            array (
                'name' => 'stock_picking_type-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:18',
                'updated_at' => '2021-08-15 15:22:18',
            ),
            73 => 
            array (
                'name' => 'stock_picking_type-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:18',
                'updated_at' => '2021-08-15 15:22:18',
            ),
            74 => 
            array (
                'name' => 'stock_picking_type-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:18',
                'updated_at' => '2021-08-15 15:22:18',
            ),
            75 => 
            array (
                'name' => 'stock_picking_type-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:19',
                'updated_at' => '2021-08-15 15:22:19',
            ),
            76 => 
            array (
                'name' => 'stock_picking-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:19',
                'updated_at' => '2021-08-15 15:22:19',
            ),
            77 => 
            array (
                'name' => 'stock_picking-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:19',
                'updated_at' => '2021-08-15 15:22:19',
            ),
            78 => 
            array (
                'name' => 'stock_picking-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:20',
                'updated_at' => '2021-08-15 15:22:20',
            ),
            79 => 
            array (
                'name' => 'stock_picking-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-15 15:22:20',
                'updated_at' => '2021-08-15 15:22:20',
            ),
            80 => 
            array (
                'name' => 'account_account-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-17 22:30:27',
                'updated_at' => '2021-08-17 22:30:27',
            ),
            81 => 
            array (
                'name' => 'account_account-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-17 22:30:27',
                'updated_at' => '2021-08-17 22:30:27',
            ),
            82 => 
            array (
                'name' => 'account_account-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-17 22:30:28',
                'updated_at' => '2021-08-17 22:30:28',
            ),
            83 => 
            array (
                'name' => 'account_account-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-17 22:30:28',
                'updated_at' => '2021-08-17 22:30:28',
            ),
            84 => 
            array (
                'name' => 'account_type-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-17 22:30:30',
                'updated_at' => '2021-08-17 22:30:30',
            ),
            85 => 
            array (
                'name' => 'account_type-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-17 22:30:30',
                'updated_at' => '2021-08-17 22:30:30',
            ),
            86 => 
            array (
                'name' => 'account_type-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-17 22:30:30',
                'updated_at' => '2021-08-17 22:30:30',
            ),
            87 => 
            array (
                'name' => 'account_type-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-17 22:30:30',
                'updated_at' => '2021-08-17 22:30:30',
            ),
            88 => 
            array (
                'name' => 'account_journal-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-21 14:10:57',
                'updated_at' => '2021-08-21 14:10:57',
            ),
            89 => 
            array (
                'name' => 'account_journal-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-21 14:10:58',
                'updated_at' => '2021-08-21 14:10:58',
            ),
            90 => 
            array (
                'name' => 'account_journal-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-21 14:10:58',
                'updated_at' => '2021-08-21 14:10:58',
            ),
            91 => 
            array (
                'name' => 'account_journal-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-21 14:10:58',
                'updated_at' => '2021-08-21 14:10:58',
            ),
            92 => 
            array (
                'name' => 'account_invoice-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-21 14:11:00',
                'updated_at' => '2021-08-21 14:11:00',
            ),
            93 => 
            array (
                'name' => 'account_invoice-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-21 14:11:00',
                'updated_at' => '2021-08-21 14:11:00',
            ),
            94 => 
            array (
                'name' => 'account_invoice-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-21 14:11:00',
                'updated_at' => '2021-08-21 14:11:00',
            ),
            95 => 
            array (
                'name' => 'account_invoice-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-21 14:11:00',
                'updated_at' => '2021-08-21 14:11:00',
            ),
            96 => 
            array (
                'name' => 'account_move-index',
                'guard_name' => 'web',
                'created_at' => '2021-08-21 14:11:02',
                'updated_at' => '2021-08-21 14:11:02',
            ),
            97 => 
            array (
                'name' => 'account_move-create',
                'guard_name' => 'web',
                'created_at' => '2021-08-21 14:11:02',
                'updated_at' => '2021-08-21 14:11:02',
            ),
            98 => 
            array (
                'name' => 'account_move-update',
                'guard_name' => 'web',
                'created_at' => '2021-08-21 14:11:02',
                'updated_at' => '2021-08-21 14:11:02',
            ),
            99 => 
            array (
                'name' => 'account_move-delete',
                'guard_name' => 'web',
                'created_at' => '2021-08-21 14:11:03',
                'updated_at' => '2021-08-21 14:11:03',
            ),
            100 => 
            array (
                'name' => 'ifrs_accounts-index',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:01',
                'updated_at' => '2021-09-11 14:08:01',
            ),
            101 => 
            array (
                'name' => 'ifrs_accounts-create',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:01',
                'updated_at' => '2021-09-11 14:08:01',
            ),
            102 => 
            array (
                'name' => 'ifrs_accounts-update',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:01',
                'updated_at' => '2021-09-11 14:08:01',
            ),
            103 => 
            array (
                'name' => 'ifrs_accounts-delete',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:01',
                'updated_at' => '2021-09-11 14:08:01',
            ),
            104 => 
            array (
                'name' => 'ifrs_categories-index',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:03',
                'updated_at' => '2021-09-11 14:08:03',
            ),
            105 => 
            array (
                'name' => 'ifrs_categories-create',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:04',
                'updated_at' => '2021-09-11 14:08:04',
            ),
            106 => 
            array (
                'name' => 'ifrs_categories-update',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:04',
                'updated_at' => '2021-09-11 14:08:04',
            ),
            107 => 
            array (
                'name' => 'ifrs_categories-delete',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:04',
                'updated_at' => '2021-09-11 14:08:04',
            ),
            108 => 
            array (
                'name' => 'ifrs_entities-index',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:05',
                'updated_at' => '2021-09-11 14:08:05',
            ),
            109 => 
            array (
                'name' => 'ifrs_entities-create',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:05',
                'updated_at' => '2021-09-11 14:08:05',
            ),
            110 => 
            array (
                'name' => 'ifrs_entities-update',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:06',
                'updated_at' => '2021-09-11 14:08:06',
            ),
            111 => 
            array (
                'name' => 'ifrs_entities-delete',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:06',
                'updated_at' => '2021-09-11 14:08:06',
            ),
            112 => 
            array (
                'name' => 'ifrs_currencies-index',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:07',
                'updated_at' => '2021-09-11 14:08:07',
            ),
            113 => 
            array (
                'name' => 'ifrs_currencies-create',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:07',
                'updated_at' => '2021-09-11 14:08:07',
            ),
            114 => 
            array (
                'name' => 'ifrs_currencies-update',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:07',
                'updated_at' => '2021-09-11 14:08:07',
            ),
            115 => 
            array (
                'name' => 'ifrs_currencies-delete',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:07',
                'updated_at' => '2021-09-11 14:08:07',
            ),
            116 => 
            array (
                'name' => 'ifrs_exchange_rates-index',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:09',
                'updated_at' => '2021-09-11 14:08:09',
            ),
            117 => 
            array (
                'name' => 'ifrs_exchange_rates-create',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:09',
                'updated_at' => '2021-09-11 14:08:09',
            ),
            118 => 
            array (
                'name' => 'ifrs_exchange_rates-update',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:09',
                'updated_at' => '2021-09-11 14:08:09',
            ),
            119 => 
            array (
                'name' => 'ifrs_exchange_rates-delete',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:09',
                'updated_at' => '2021-09-11 14:08:09',
            ),
            120 => 
            array (
                'name' => 'ifrs_reporting_periods-index',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:10',
                'updated_at' => '2021-09-11 14:08:10',
            ),
            121 => 
            array (
                'name' => 'ifrs_reporting_periods-create',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:10',
                'updated_at' => '2021-09-11 14:08:10',
            ),
            122 => 
            array (
                'name' => 'ifrs_reporting_periods-update',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:10',
                'updated_at' => '2021-09-11 14:08:10',
            ),
            123 => 
            array (
                'name' => 'ifrs_reporting_periods-delete',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:11',
                'updated_at' => '2021-09-11 14:08:11',
            ),
            124 => 
            array (
                'name' => 'ifrs_vats-index',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:12',
                'updated_at' => '2021-09-11 14:08:12',
            ),
            125 => 
            array (
                'name' => 'ifrs_vats-create',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:12',
                'updated_at' => '2021-09-11 14:08:12',
            ),
            126 => 
            array (
                'name' => 'ifrs_vats-update',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:12',
                'updated_at' => '2021-09-11 14:08:12',
            ),
            127 => 
            array (
                'name' => 'ifrs_vats-delete',
                'guard_name' => 'web',
                'created_at' => '2021-09-11 14:08:12',
                'updated_at' => '2021-09-11 14:08:12',
            ),
            128 => 
            array (
                'name' => 'btb_view_tmp-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-03 14:24:54',
                'updated_at' => '2021-10-03 14:24:54',
            ),
            129 => 
            array (
                'name' => 'btb_view_tmp-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-03 14:24:55',
                'updated_at' => '2021-10-03 14:24:55',
            ),
            130 => 
            array (
                'name' => 'btb_view_tmp-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-03 14:24:56',
                'updated_at' => '2021-10-03 14:24:56',
            ),
            131 => 
            array (
                'name' => 'btb_view_tmp-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-03 14:24:56',
                'updated_at' => '2021-10-03 14:24:56',
            ),
            132 => 
            array (
                'name' => 'vendor_contact-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-21 14:08:06',
                'updated_at' => '2021-10-21 14:08:06',
            ),
            133 => 
            array (
                'name' => 'vendor_contact-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-21 14:08:06',
                'updated_at' => '2021-10-21 14:08:06',
            ),
            134 => 
            array (
                'name' => 'vendor_contact-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-21 14:08:06',
                'updated_at' => '2021-10-21 14:08:06',
            ),
            135 => 
            array (
                'name' => 'vendor_contact-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-21 14:08:07',
                'updated_at' => '2021-10-21 14:08:07',
            ),
            136 => 
            array (
                'name' => 'vendor_location-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-21 14:08:08',
                'updated_at' => '2021-10-21 14:08:08',
            ),
            137 => 
            array (
                'name' => 'vendor_location-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-21 14:08:08',
                'updated_at' => '2021-10-21 14:08:08',
            ),
            138 => 
            array (
                'name' => 'vendor_location-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-21 14:08:08',
                'updated_at' => '2021-10-21 14:08:08',
            ),
            139 => 
            array (
                'name' => 'vendor_location-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-21 14:08:08',
                'updated_at' => '2021-10-21 14:08:08',
            ),
            140 => 
            array (
                'name' => 'dms_ap_supplier-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:22',
                'updated_at' => '2021-10-29 03:56:22',
            ),
            141 => 
            array (
                'name' => 'dms_ap_supplier-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:22',
                'updated_at' => '2021-10-29 03:56:22',
            ),
            142 => 
            array (
                'name' => 'dms_ap_supplier-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:22',
                'updated_at' => '2021-10-29 03:56:22',
            ),
            143 => 
            array (
                'name' => 'dms_ap_supplier-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:23',
                'updated_at' => '2021-10-29 03:56:23',
            ),
            144 => 
            array (
                'name' => 'dms_ar_customer-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:23',
                'updated_at' => '2021-10-29 03:56:23',
            ),
            145 => 
            array (
                'name' => 'dms_ar_customer-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:23',
                'updated_at' => '2021-10-29 03:56:23',
            ),
            146 => 
            array (
                'name' => 'dms_ar_customer-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:24',
                'updated_at' => '2021-10-29 03:56:24',
            ),
            147 => 
            array (
                'name' => 'dms_ar_customer-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:24',
                'updated_at' => '2021-10-29 03:56:24',
            ),
            148 => 
            array (
                'name' => 'dms_ar_customercategory-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:24',
                'updated_at' => '2021-10-29 03:56:24',
            ),
            149 => 
            array (
                'name' => 'dms_ar_customercategory-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:24',
                'updated_at' => '2021-10-29 03:56:24',
            ),
            150 => 
            array (
                'name' => 'dms_ar_customercategory-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:25',
                'updated_at' => '2021-10-29 03:56:25',
            ),
            151 => 
            array (
                'name' => 'dms_ar_customercategory-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:25',
                'updated_at' => '2021-10-29 03:56:25',
            ),
            152 => 
            array (
                'name' => 'dms_ar_customercategorytype-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:25',
                'updated_at' => '2021-10-29 03:56:25',
            ),
            153 => 
            array (
                'name' => 'dms_ar_customercategorytype-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:26',
                'updated_at' => '2021-10-29 03:56:26',
            ),
            154 => 
            array (
                'name' => 'dms_ar_customercategorytype-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:26',
                'updated_at' => '2021-10-29 03:56:26',
            ),
            155 => 
            array (
                'name' => 'dms_ar_customercategorytype-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:26',
                'updated_at' => '2021-10-29 03:56:26',
            ),
            156 => 
            array (
                'name' => 'dms_ar_customerhierarchy-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:27',
                'updated_at' => '2021-10-29 03:56:27',
            ),
            157 => 
            array (
                'name' => 'dms_ar_customerhierarchy-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:27',
                'updated_at' => '2021-10-29 03:56:27',
            ),
            158 => 
            array (
                'name' => 'dms_ar_customerhierarchy-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:27',
                'updated_at' => '2021-10-29 03:56:27',
            ),
            159 => 
            array (
                'name' => 'dms_ar_customerhierarchy-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:27',
                'updated_at' => '2021-10-29 03:56:27',
            ),
            160 => 
            array (
                'name' => 'dms_ar_customerrouteinfo-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:28',
                'updated_at' => '2021-10-29 03:56:28',
            ),
            161 => 
            array (
                'name' => 'dms_ar_customerrouteinfo-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:28',
                'updated_at' => '2021-10-29 03:56:28',
            ),
            162 => 
            array (
                'name' => 'dms_ar_customerrouteinfo-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:28',
                'updated_at' => '2021-10-29 03:56:28',
            ),
            163 => 
            array (
                'name' => 'dms_ar_customerrouteinfo-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:28',
                'updated_at' => '2021-10-29 03:56:28',
            ),
            164 => 
            array (
                'name' => 'dms_ar_doccustomer-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:29',
                'updated_at' => '2021-10-29 03:56:29',
            ),
            165 => 
            array (
                'name' => 'dms_ar_doccustomer-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:29',
                'updated_at' => '2021-10-29 03:56:29',
            ),
            166 => 
            array (
                'name' => 'dms_ar_doccustomer-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:29',
                'updated_at' => '2021-10-29 03:56:29',
            ),
            167 => 
            array (
                'name' => 'dms_ar_doccustomer-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:29',
                'updated_at' => '2021-10-29 03:56:29',
            ),
            168 => 
            array (
                'name' => 'dms_ar_paymentterm-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:30',
                'updated_at' => '2021-10-29 03:56:30',
            ),
            169 => 
            array (
                'name' => 'dms_ar_paymentterm-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:30',
                'updated_at' => '2021-10-29 03:56:30',
            ),
            170 => 
            array (
                'name' => 'dms_ar_paymentterm-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:30',
                'updated_at' => '2021-10-29 03:56:30',
            ),
            171 => 
            array (
                'name' => 'dms_ar_paymentterm-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:31',
                'updated_at' => '2021-10-29 03:56:31',
            ),
            172 => 
            array (
                'name' => 'dms_ar_paymenttype-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:31',
                'updated_at' => '2021-10-29 03:56:31',
            ),
            173 => 
            array (
                'name' => 'dms_ar_paymenttype-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:31',
                'updated_at' => '2021-10-29 03:56:31',
            ),
            174 => 
            array (
                'name' => 'dms_ar_paymenttype-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:32',
                'updated_at' => '2021-10-29 03:56:32',
            ),
            175 => 
            array (
                'name' => 'dms_ar_paymenttype-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:32',
                'updated_at' => '2021-10-29 03:56:32',
            ),
            176 => 
            array (
                'name' => 'dms_ar_pricesegment-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:32',
                'updated_at' => '2021-10-29 03:56:32',
            ),
            177 => 
            array (
                'name' => 'dms_ar_pricesegment-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:33',
                'updated_at' => '2021-10-29 03:56:33',
            ),
            178 => 
            array (
                'name' => 'dms_ar_pricesegment-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:33',
                'updated_at' => '2021-10-29 03:56:33',
            ),
            179 => 
            array (
                'name' => 'dms_ar_pricesegment-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:33',
                'updated_at' => '2021-10-29 03:56:33',
            ),
            180 => 
            array (
                'name' => 'dms_fin_account-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:33',
                'updated_at' => '2021-10-29 03:56:33',
            ),
            181 => 
            array (
                'name' => 'dms_fin_account-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:34',
                'updated_at' => '2021-10-29 03:56:34',
            ),
            182 => 
            array (
                'name' => 'dms_fin_account-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:34',
                'updated_at' => '2021-10-29 03:56:34',
            ),
            183 => 
            array (
                'name' => 'dms_fin_account-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:34',
                'updated_at' => '2021-10-29 03:56:34',
            ),
            184 => 
            array (
                'name' => 'dms_fin_subaccount-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:35',
                'updated_at' => '2021-10-29 03:56:35',
            ),
            185 => 
            array (
                'name' => 'dms_fin_subaccount-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:35',
                'updated_at' => '2021-10-29 03:56:35',
            ),
            186 => 
            array (
                'name' => 'dms_fin_subaccount-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:35',
                'updated_at' => '2021-10-29 03:56:35',
            ),
            187 => 
            array (
                'name' => 'dms_fin_subaccount-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:35',
                'updated_at' => '2021-10-29 03:56:35',
            ),
            188 => 
            array (
                'name' => 'dms_inv_carrier-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:36',
                'updated_at' => '2021-10-29 03:56:36',
            ),
            189 => 
            array (
                'name' => 'dms_inv_carrier-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:36',
                'updated_at' => '2021-10-29 03:56:36',
            ),
            190 => 
            array (
                'name' => 'dms_inv_carrier-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:36',
                'updated_at' => '2021-10-29 03:56:36',
            ),
            191 => 
            array (
                'name' => 'dms_inv_carrier-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:36',
                'updated_at' => '2021-10-29 03:56:36',
            ),
            192 => 
            array (
                'name' => 'dms_inv_carrierdriver-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:37',
                'updated_at' => '2021-10-29 03:56:37',
            ),
            193 => 
            array (
                'name' => 'dms_inv_carrierdriver-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:37',
                'updated_at' => '2021-10-29 03:56:37',
            ),
            194 => 
            array (
                'name' => 'dms_inv_carrierdriver-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:37',
                'updated_at' => '2021-10-29 03:56:37',
            ),
            195 => 
            array (
                'name' => 'dms_inv_carrierdriver-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:37',
                'updated_at' => '2021-10-29 03:56:37',
            ),
            196 => 
            array (
                'name' => 'dms_inv_carriervehicle-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:38',
                'updated_at' => '2021-10-29 03:56:38',
            ),
            197 => 
            array (
                'name' => 'dms_inv_carriervehicle-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:38',
                'updated_at' => '2021-10-29 03:56:38',
            ),
            198 => 
            array (
                'name' => 'dms_inv_carriervehicle-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:38',
                'updated_at' => '2021-10-29 03:56:38',
            ),
            199 => 
            array (
                'name' => 'dms_inv_carriervehicle-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:38',
                'updated_at' => '2021-10-29 03:56:38',
            ),
            200 => 
            array (
                'name' => 'dms_inv_product-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:39',
                'updated_at' => '2021-10-29 03:56:39',
            ),
            201 => 
            array (
                'name' => 'dms_inv_product-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:39',
                'updated_at' => '2021-10-29 03:56:39',
            ),
            202 => 
            array (
                'name' => 'dms_inv_product-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:39',
                'updated_at' => '2021-10-29 03:56:39',
            ),
            203 => 
            array (
                'name' => 'dms_inv_product-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:39',
                'updated_at' => '2021-10-29 03:56:39',
            ),
            204 => 
            array (
                'name' => 'dms_inv_productcategory-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:40',
                'updated_at' => '2021-10-29 03:56:40',
            ),
            205 => 
            array (
                'name' => 'dms_inv_productcategory-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:40',
                'updated_at' => '2021-10-29 03:56:40',
            ),
            206 => 
            array (
                'name' => 'dms_inv_productcategory-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:41',
                'updated_at' => '2021-10-29 03:56:41',
            ),
            207 => 
            array (
                'name' => 'dms_inv_productcategory-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:41',
                'updated_at' => '2021-10-29 03:56:41',
            ),
            208 => 
            array (
                'name' => 'dms_inv_productcategorytype-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:42',
                'updated_at' => '2021-10-29 03:56:42',
            ),
            209 => 
            array (
                'name' => 'dms_inv_productcategorytype-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:42',
                'updated_at' => '2021-10-29 03:56:42',
            ),
            210 => 
            array (
                'name' => 'dms_inv_productcategorytype-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:42',
                'updated_at' => '2021-10-29 03:56:42',
            ),
            211 => 
            array (
                'name' => 'dms_inv_productcategorytype-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:42',
                'updated_at' => '2021-10-29 03:56:42',
            ),
            212 => 
            array (
                'name' => 'dms_inv_productitemcategory-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:43',
                'updated_at' => '2021-10-29 03:56:43',
            ),
            213 => 
            array (
                'name' => 'dms_inv_productitemcategory-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:43',
                'updated_at' => '2021-10-29 03:56:43',
            ),
            214 => 
            array (
                'name' => 'dms_inv_productitemcategory-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:43',
                'updated_at' => '2021-10-29 03:56:43',
            ),
            215 => 
            array (
                'name' => 'dms_inv_productitemcategory-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:44',
                'updated_at' => '2021-10-29 03:56:44',
            ),
            216 => 
            array (
                'name' => 'dms_inv_productkitinfo-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:44',
                'updated_at' => '2021-10-29 03:56:44',
            ),
            217 => 
            array (
                'name' => 'dms_inv_productkitinfo-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:44',
                'updated_at' => '2021-10-29 03:56:44',
            ),
            218 => 
            array (
                'name' => 'dms_inv_productkitinfo-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:44',
                'updated_at' => '2021-10-29 03:56:44',
            ),
            219 => 
            array (
                'name' => 'dms_inv_productkitinfo-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:45',
                'updated_at' => '2021-10-29 03:56:45',
            ),
            220 => 
            array (
                'name' => 'dms_inv_uom-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:45',
                'updated_at' => '2021-10-29 03:56:45',
            ),
            221 => 
            array (
                'name' => 'dms_inv_uom-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:45',
                'updated_at' => '2021-10-29 03:56:45',
            ),
            222 => 
            array (
                'name' => 'dms_inv_uom-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:46',
                'updated_at' => '2021-10-29 03:56:46',
            ),
            223 => 
            array (
                'name' => 'dms_inv_uom-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:46',
                'updated_at' => '2021-10-29 03:56:46',
            ),
            224 => 
            array (
                'name' => 'dms_inv_vehicle-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:46',
                'updated_at' => '2021-10-29 03:56:46',
            ),
            225 => 
            array (
                'name' => 'dms_inv_vehicle-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:47',
                'updated_at' => '2021-10-29 03:56:47',
            ),
            226 => 
            array (
                'name' => 'dms_inv_vehicle-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:47',
                'updated_at' => '2021-10-29 03:56:47',
            ),
            227 => 
            array (
                'name' => 'dms_inv_vehicle-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:47',
                'updated_at' => '2021-10-29 03:56:47',
            ),
            228 => 
            array (
                'name' => 'dms_inv_vehicletype-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:48',
                'updated_at' => '2021-10-29 03:56:48',
            ),
            229 => 
            array (
                'name' => 'dms_inv_vehicletype-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:48',
                'updated_at' => '2021-10-29 03:56:48',
            ),
            230 => 
            array (
                'name' => 'dms_inv_vehicletype-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:48',
                'updated_at' => '2021-10-29 03:56:48',
            ),
            231 => 
            array (
                'name' => 'dms_inv_vehicletype-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:48',
                'updated_at' => '2021-10-29 03:56:48',
            ),
            232 => 
            array (
                'name' => 'dms_inv_warehouse-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:49',
                'updated_at' => '2021-10-29 03:56:49',
            ),
            233 => 
            array (
                'name' => 'dms_inv_warehouse-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:49',
                'updated_at' => '2021-10-29 03:56:49',
            ),
            234 => 
            array (
                'name' => 'dms_inv_warehouse-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:49',
                'updated_at' => '2021-10-29 03:56:49',
            ),
            235 => 
            array (
                'name' => 'dms_inv_warehouse-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:49',
                'updated_at' => '2021-10-29 03:56:49',
            ),
            236 => 
            array (
                'name' => 'dms_sd_pricecatalog-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:50',
                'updated_at' => '2021-10-29 03:56:50',
            ),
            237 => 
            array (
                'name' => 'dms_sd_pricecatalog-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:50',
                'updated_at' => '2021-10-29 03:56:50',
            ),
            238 => 
            array (
                'name' => 'dms_sd_pricecatalog-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:50',
                'updated_at' => '2021-10-29 03:56:50',
            ),
            239 => 
            array (
                'name' => 'dms_sd_pricecatalog-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:50',
                'updated_at' => '2021-10-29 03:56:50',
            ),
            240 => 
            array (
                'name' => 'dms_sd_route-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:51',
                'updated_at' => '2021-10-29 03:56:51',
            ),
            241 => 
            array (
                'name' => 'dms_sd_route-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:51',
                'updated_at' => '2021-10-29 03:56:51',
            ),
            242 => 
            array (
                'name' => 'dms_sd_route-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:51',
                'updated_at' => '2021-10-29 03:56:51',
            ),
            243 => 
            array (
                'name' => 'dms_sd_route-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:51',
                'updated_at' => '2021-10-29 03:56:51',
            ),
            244 => 
            array (
                'name' => 'dms_sd_routeitem-index',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:52',
                'updated_at' => '2021-10-29 03:56:52',
            ),
            245 => 
            array (
                'name' => 'dms_sd_routeitem-create',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:52',
                'updated_at' => '2021-10-29 03:56:52',
            ),
            246 => 
            array (
                'name' => 'dms_sd_routeitem-update',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:52',
                'updated_at' => '2021-10-29 03:56:52',
            ),
            247 => 
            array (
                'name' => 'dms_sd_routeitem-delete',
                'guard_name' => 'web',
                'created_at' => '2021-10-29 03:56:52',
                'updated_at' => '2021-10-29 03:56:52',
            ),
        ));
        
        
    }
}
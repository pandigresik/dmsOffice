<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                '_lft' => 9,
                '_rgt' => 40,
                'created_at' => '2021-08-09 08:10:07',
                'description' => 'Header menu master',
                'icon' => 'cil-address-book',
                'id' => 1,
                'name' => 'Master Data',
                'parent_id' => NULL,
                'route' => NULL,
                'seq_number' => 1,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:54',
            ),
            1 => 
            array (
                '_lft' => 41,
                '_rgt' => 58,
                'created_at' => '2021-08-09 08:10:07',
                'description' => 'Header menu accounting',
                'icon' => 'cil-address-book',
                'id' => 2,
                'name' => 'Accounting',
                'parent_id' => NULL,
                'route' => NULL,
                'seq_number' => 2,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:57',
            ),
            2 => 
            array (
                '_lft' => 59,
                '_rgt' => 74,
                'created_at' => '2021-08-09 08:10:07',
                'description' => 'Header menu inventory',
                'icon' => 'cil-address-book',
                'id' => 3,
                'name' => 'Inventory',
                'parent_id' => NULL,
                'route' => NULL,
                'seq_number' => 3,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:59',
            ),
            3 => 
            array (
                '_lft' => 32,
                '_rgt' => 33,
                'created_at' => '2021-08-09 08:10:07',
                'description' => 'Manage menu',
                'icon' => 'cil-address-book',
                'id' => 4,
                'name' => 'Menu',
                'parent_id' => 1,
                'route' => 'base/menus',
                'seq_number' => 1,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:53',
            ),
            4 => 
            array (
                '_lft' => 34,
                '_rgt' => 35,
                'created_at' => '2021-08-09 08:10:07',
                'description' => 'Manage users',
                'icon' => 'cil-address-book',
                'id' => 5,
                'name' => 'User',
                'parent_id' => 1,
                'route' => 'base/users',
                'seq_number' => 2,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:54',
            ),
            5 => 
            array (
                '_lft' => 36,
                '_rgt' => 37,
                'created_at' => '2021-08-09 08:10:07',
                'description' => 'Manage role',
                'icon' => 'cil-address-book',
                'id' => 6,
                'name' => 'Role',
                'parent_id' => 1,
                'route' => 'base/roles',
                'seq_number' => 3,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:54',
            ),
            6 => 
            array (
                '_lft' => 38,
                '_rgt' => 39,
                'created_at' => '2021-08-09 08:10:07',
                'description' => 'Manage users',
                'icon' => 'cil-address-book',
                'id' => 7,
                'name' => 'Permission',
                'parent_id' => 1,
                'route' => 'base/permissions',
                'seq_number' => 1,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:54',
            ),
            7 => 
            array (
                '_lft' => 30,
                '_rgt' => 31,
                'created_at' => '2021-08-10 13:44:02',
                'description' => 'Manage vehicle group',
                'icon' => 'cil-truck',
                'id' => 8,
                'name' => 'Vehicle Group',
                'parent_id' => 1,
                'route' => 'inventory/dmsInvVehicletypes',
                'seq_number' => 5,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:53',
            ),
            8 => 
            array (
                '_lft' => 28,
                '_rgt' => 29,
                'created_at' => '2021-08-10 13:48:39',
                'description' => 'Manage city',
                'icon' => 'cil-building',
                'id' => 9,
                'name' => 'City',
                'parent_id' => 1,
                'route' => 'base/cities',
                'seq_number' => 12,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:53',
            ),
            9 => 
            array (
                '_lft' => 26,
                '_rgt' => 27,
                'created_at' => '2021-08-10 13:50:15',
                'description' => 'manage trip',
                'icon' => 'cil-transfer',
                'id' => 10,
                'name' => 'Trip',
                'parent_id' => 1,
                'route' => 'base/trips',
                'seq_number' => 13,
                'status' => '1',
                'updated_at' => '2021-11-01 08:50:37',
            ),
            10 => 
            array (
                '_lft' => 24,
                '_rgt' => 25,
                'created_at' => '2021-08-10 13:52:37',
                'description' => 'Manage supplier',
                'icon' => 'cil-cart',
                'id' => 11,
                'name' => 'Supplier',
                'parent_id' => 1,
                'route' => 'base/dmsApSuppliers',
                'seq_number' => 9,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:52',
            ),
            11 => 
            array (
                '_lft' => 7,
                '_rgt' => 8,
                'created_at' => '2021-08-12 14:21:01',
                'description' => 'purchasing',
                'icon' => 'cil-baby-carriage',
                'id' => 12,
                'name' => 'Purchase',
                'parent_id' => NULL,
                'route' => NULL,
                'seq_number' => 4,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:50',
            ),
            12 => 
            array (
                '_lft' => 5,
                '_rgt' => 6,
                'created_at' => '2021-08-12 14:22:07',
                'description' => 'keuangan',
                'icon' => 'cil-money',
                'id' => 13,
                'name' => 'Finance',
                'parent_id' => NULL,
                'route' => NULL,
                'seq_number' => 5,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:50',
            ),
            13 => 
            array (
                '_lft' => 22,
                '_rgt' => 23,
                'created_at' => '2021-08-15 15:30:18',
                'description' => 'Master perusahaan',
                'icon' => 'cil-building',
                'id' => 14,
                'name' => 'Company',
                'parent_id' => 1,
                'route' => 'base/entities',
                'seq_number' => 1,
                'status' => '1',
                'updated_at' => '2021-11-01 06:25:56',
            ),
            14 => 
            array (
                '_lft' => 72,
                '_rgt' => 73,
                'created_at' => '2021-08-15 15:32:14',
                'description' => 'Data Warehouse',
                'icon' => 'cil-library-building',
                'id' => 15,
                'name' => 'Warehouse',
                'parent_id' => 3,
                'route' => 'inventory/dmsInvWarehouses',
                'seq_number' => 1,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:58',
            ),
            15 => 
            array (
                '_lft' => 20,
                '_rgt' => 21,
                'created_at' => '2021-08-16 07:23:57',
                'description' => 'Master Ekspedisi',
                'icon' => 'cil-truck',
                'id' => 16,
                'name' => 'Ekspedisi',
                'parent_id' => 1,
                'route' => 'inventory/dmsInvCarriers',
                'seq_number' => 8,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:52',
            ),
            16 => 
            array (
                '_lft' => 18,
                '_rgt' => 19,
                'created_at' => '2021-08-16 07:25:08',
                'description' => 'Unit of measure',
                'icon' => 'cil-3d',
                'id' => 17,
                'name' => 'UOM',
                'parent_id' => 1,
                'route' => 'inventory/dmsInvUoms',
                'seq_number' => 11,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:52',
            ),
            17 => 
            array (
                '_lft' => 16,
                '_rgt' => 17,
                'created_at' => '2021-08-16 07:26:24',
                'description' => 'Product',
                'icon' => 'cil-command',
                'id' => 18,
                'name' => 'Product',
                'parent_id' => 1,
                'route' => 'inventory/dmsInvProducts',
                'seq_number' => 12,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:51',
            ),
            18 => 
            array (
                '_lft' => 62,
                '_rgt' => 63,
                'created_at' => '2021-08-17 15:18:23',
                'description' => 'Sinkronisasi BTB',
                'icon' => 'cil-data-transfer-down',
                'id' => 23,
                'name' => 'BTB Synchronize',
                'parent_id' => 3,
                'route' => 'inventory/synchronizeInStockPickings',
                'seq_number' => 6,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:57',
            ),
            19 => 
            array (
                '_lft' => 60,
                '_rgt' => 61,
                'created_at' => '2021-08-17 15:19:20',
                'description' => 'BKB Synchronize',
                'icon' => 'cil-data-transfer-up',
                'id' => 24,
                'name' => 'BKB Synchronize',
                'parent_id' => 3,
                'route' => 'inventory/synchronizeOutStockPickings',
                'seq_number' => 7,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:57',
            ),
            20 => 
            array (
                '_lft' => 56,
                '_rgt' => 57,
                'created_at' => '2021-08-17 22:37:51',
                'description' => 'Chart Of Account',
                'icon' => 'cil-book',
                'id' => 25,
                'name' => 'Chart Of Account',
                'parent_id' => 2,
                'route' => 'accounting/dmsFinAccounts',
                'seq_number' => 1,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:56',
            ),
            21 => 
            array (
                '_lft' => 52,
                '_rgt' => 53,
                'created_at' => '2021-08-21 14:30:12',
                'description' => 'Invoice',
                'icon' => 'cil-calendar-check',
                'id' => 27,
                'name' => 'Invoice',
                'parent_id' => 2,
                'route' => 'accounting/accountInvoices',
                'seq_number' => 4,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:56',
            ),
            22 => 
            array (
                '_lft' => 50,
                '_rgt' => 51,
                'created_at' => '2021-08-21 14:31:20',
                'description' => 'jurnal entri manual',
                'icon' => 'cil-money',
                'id' => 28,
                'name' => 'Journal Entry',
                'parent_id' => 2,
                'route' => 'accounting/accountMoves',
                'seq_number' => 5,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:56',
            ),
            23 => 
            array (
                '_lft' => 12,
                '_rgt' => 13,
                'created_at' => '2021-10-29 13:48:43',
                'description' => 'Manage Vehicle',
                'icon' => 'cil-truck',
                'id' => 32,
                'name' => 'Vehicle',
                'parent_id' => 1,
                'route' => 'inventory/dmsInvVehicles',
                'seq_number' => 6,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:51',
            ),
            24 => 
            array (
                '_lft' => 44,
                '_rgt' => 45,
                'created_at' => '2021-10-29 14:40:06',
                'description' => 'payment term',
                'icon' => 'cil-money',
                'id' => 33,
                'name' => 'Payment Term',
                'parent_id' => 2,
                'route' => 'base/dmsArPaymentterms',
                'seq_number' => 3,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:55',
            ),
            25 => 
            array (
                '_lft' => 42,
                '_rgt' => 43,
                'created_at' => '2021-10-29 14:41:33',
                'description' => 'Payment type',
                'icon' => 'cil-diamond',
                'id' => 34,
                'name' => 'Payment type',
                'parent_id' => 2,
                'route' => 'base/dmsArPaymenttypes',
                'seq_number' => 2,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:55',
            ),
            26 => 
            array (
                '_lft' => 10,
                '_rgt' => 11,
                'created_at' => '2021-10-29 14:44:55',
                'description' => 'Master Customer',
                'icon' => 'cil-address-book',
                'id' => 35,
                'name' => 'Customer',
                'parent_id' => 1,
                'route' => 'base/dmsArCustomers',
                'seq_number' => 9,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:50',
            ),
            27 => 
            array (
                '_lft' => 1,
                '_rgt' => 4,
                'created_at' => '2021-10-29 14:50:38',
                'description' => 'Group log',
                'icon' => 'cil-notes',
                'id' => 36,
                'name' => 'Log',
                'parent_id' => NULL,
                'route' => NULL,
                'seq_number' => 6,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:50',
            ),
            28 => 
            array (
                '_lft' => 2,
                '_rgt' => 3,
                'created_at' => '2021-10-29 14:51:49',
                'description' => 'Histori perubahan harga barang',
                'icon' => 'cil-alarm',
                'id' => 37,
                'name' => 'Histori Harga',
                'parent_id' => 36,
                'route' => '/',
                'seq_number' => 1,
                'status' => '1',
                'updated_at' => '2021-10-29 14:51:49',
            ),
        ));
        
        
    }
}
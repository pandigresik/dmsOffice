<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DmsDmsInvWarehouseTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dms_inv_warehouse')->delete();
        
        \DB::table('dms_inv_warehouse')->insert(array (
            0 => 
            array (
                'iId' => '92ece55a-c7b1-41dd-a881-1d981398dc7b',
                'szId' => '371-W01',
                'szName' => 'GUDANG GENTENG',
                'szDescription' => '',
                'szBranchId' => '371',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'SA371',
                'szUserUpdatedId' => 'SA371',
                'dtmCreated' => '2018-11-17 08:23:04',
                'dtmLastUpdated' => '2018-11-17 08:23:04',
            ),
            1 => 
            array (
                'iId' => '7873a7e3-c085-400d-ae40-14bacf00efb1',
                'szId' => '080-W01',
                'szName' => 'GUDANG SEJATI BWI',
                'szDescription' => '',
                'szBranchId' => '080',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-11-28 00:26:43',
                'dtmLastUpdated' => '2018-11-28 00:26:43',
            ),
            2 => 
            array (
                'iId' => '42fa4c71-a0d4-4b30-8c94-50b4a02915d6',
                'szId' => '745-W01',
                'szName' => 'GUDANG BONDOWOSO',
                'szDescription' => '',
                'szBranchId' => '745',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-11-28 05:36:43',
                'dtmLastUpdated' => '2018-11-28 05:36:43',
            ),
            3 => 
            array (
                'iId' => '9d51f502-017f-4ed5-ae26-ce1b0d91e927',
                'szId' => '899-W01',
                'szName' => 'GUDANG SJT SITUBONDO',
                'szDescription' => '',
                'szBranchId' => '899',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-11-28 19:44:17',
                'dtmLastUpdated' => '2018-11-28 19:44:17',
            ),
            4 => 
            array (
                'iId' => '25b20e53-2bc3-4ca9-a455-ea7f10668a45',
                'szId' => '369-W01',
                'szName' => 'GUDANG SEJATI JEMBER',
                'szDescription' => '',
                'szBranchId' => '369',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-11-28 21:26:14',
                'dtmLastUpdated' => '2018-11-28 21:26:14',
            ),
            5 => 
            array (
                'iId' => '9e4780a9-1ec8-466a-bcbe-e10d26912de7',
                'szId' => '369-W02',
                'szName' => 'GUDANG MILKUAT JEMBER',
                'szDescription' => '',
                'szBranchId' => '369',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-11-28 21:26:14',
                'dtmLastUpdated' => '2018-11-28 21:26:14',
            ),
            6 => 
            array (
                'iId' => 'ccf5e0e9-9918-4cf9-b201-57843e447697',
                'szId' => '369-W03',
                'szName' => 'GUDANG BARU JEMBER',
                'szDescription' => '',
                'szBranchId' => '369',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-11-28 21:26:14',
                'dtmLastUpdated' => '2018-11-28 21:26:14',
            ),
            7 => 
            array (
                'iId' => '27a709d0-71b9-4cf6-8c73-44a5b183e5a9',
                'szId' => '079-W01',
                'szName' => 'GUDANG LUMAJANG AQUA',
                'szDescription' => '',
                'szBranchId' => '079',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-12-03 21:38:34',
                'dtmLastUpdated' => '2018-12-03 21:38:34',
            ),
            8 => 
            array (
                'iId' => '369968d0-da54-4609-b9f1-1b9695d21424',
                'szId' => '079-W02',
                'szName' => 'GUDANG MILKUAT LUMAJANG',
                'szDescription' => '',
                'szBranchId' => '079',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-12-03 21:38:34',
                'dtmLastUpdated' => '2018-12-03 21:38:34',
            ),
            9 => 
            array (
                'iId' => '7e9fc539-adc4-45a4-84b6-0a3629edb219',
                'szId' => '370-W01',
                'szName' => 'GUDANG PAITON',
                'szDescription' => '',
                'szBranchId' => '370',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-12-04 20:38:06',
                'dtmLastUpdated' => '2018-12-04 20:38:06',
            ),
            10 => 
            array (
                'iId' => 'a75ff8db-455f-49c8-ad45-ea950722b6cd',
                'szId' => '889-W01',
                'szName' => 'GUDANG SEJATI PROBOLINGGO',
                'szDescription' => '',
                'szBranchId' => '889',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-12-04 22:06:12',
                'dtmLastUpdated' => '2018-12-04 22:06:12',
            ),
            11 => 
            array (
                'iId' => 'a935bce7-ad2a-4834-a0c4-25b227089adc',
                'szId' => '889-W02',
                'szName' => 'GUDANG MILKUAT PROBOLINGGO',
                'szDescription' => '',
                'szBranchId' => '889',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-12-04 22:06:12',
                'dtmLastUpdated' => '2018-12-04 22:06:12',
            ),
            12 => 
            array (
                'iId' => '50ee3d0f-2169-4fe7-92ce-c5ee7f5d6009',
                'szId' => '555-W01',
                'szName' => 'GUDANG SEJATI PASURUAN',
                'szDescription' => '',
                'szBranchId' => '555',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-12-05 23:07:44',
                'dtmLastUpdated' => '2018-12-05 23:07:44',
            ),
            13 => 
            array (
                'iId' => '661cfdc9-0311-471d-873a-544c56557e08',
                'szId' => '555-W02',
                'szName' => 'GUDANG PASURUAN II',
                'szDescription' => '',
                'szBranchId' => '555',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-12-05 23:07:44',
                'dtmLastUpdated' => '2018-12-05 23:07:44',
            ),
            14 => 
            array (
                'iId' => 'f575f18a-07e6-4246-b6a0-0e5793b1e09d',
                'szId' => '555-W03',
                'szName' => 'GUDANG MILKUAT PASURUAN',
                'szDescription' => '',
                'szBranchId' => '555',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-12-05 23:07:44',
                'dtmLastUpdated' => '2018-12-05 23:07:44',
            ),
            15 => 
            array (
                'iId' => 'ecbe0ac8-2857-4f01-932e-0b7bdb4d28bb',
                'szId' => '569-W01',
                'szName' => 'GUDANG SUKOREJO',
                'szDescription' => '',
                'szBranchId' => '569',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-12-11 20:47:28',
                'dtmLastUpdated' => '2018-12-11 20:47:28',
            ),
            16 => 
            array (
                'iId' => '9bca2e19-a443-4300-ae33-ffb91e73bb19',
                'szId' => '558-W01',
                'szName' => 'GUDANG LMS',
                'szDescription' => '',
                'szBranchId' => '558',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-12-12 21:02:57',
                'dtmLastUpdated' => '2018-12-12 21:02:57',
            ),
            17 => 
            array (
                'iId' => '3346c4b1-9a99-423b-8596-d4f76098025f',
                'szId' => '558-W02',
                'szName' => 'GUDANG BORNEO',
                'szDescription' => '',
                'szBranchId' => '558',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'DataMigration',
                'szUserUpdatedId' => 'DataMigration',
                'dtmCreated' => '2018-12-12 21:02:57',
                'dtmLastUpdated' => '2018-12-12 21:02:57',
            ),
            18 => 
            array (
                'iId' => '62364239-b5b3-42f7-9a00-49ebc3fd04a5',
                'szId' => '501-W01',
                'szName' => 'GUDANG LMS CARAT',
                'szDescription' => '',
                'szBranchId' => '501',
                'bAllowForSalesTransaction' => 0,
                'szUserCreatedId' => 'SA501',
                'szUserUpdatedId' => 'SA501',
                'dtmCreated' => '2019-07-29 09:02:54',
                'dtmLastUpdated' => '2019-07-29 09:02:54',
            ),
            19 => 
            array (
                'iId' => 'd05fef37-a0b5-48cd-b9d0-7d84ebce7438',
                'szId' => '558-W03',
                'szName' => 'GUDANG BARU',
                'szDescription' => '',
                'szBranchId' => '558',
                'bAllowForSalesTransaction' => 1,
                'szUserCreatedId' => 'SA558',
                'szUserUpdatedId' => 'SA558',
                'dtmCreated' => '2020-01-07 13:31:54',
                'dtmLastUpdated' => '2020-01-07 13:31:54',
            ),
        ));
        
        
    }
}
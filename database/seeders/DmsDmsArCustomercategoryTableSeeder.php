<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DmsDmsArCustomercategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dms_ar_customercategory')->delete();
        
        \DB::table('dms_ar_customercategory')->insert(array (
            0 => 
            array (
                'iId' => 'd500ab0b-dd3a-4075-91dd-3ddd9caf482e',
                'szId' => 'GOLD',
                'szName' => 'GOLD',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_01',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'NORAH',
                'dtmCreated' => '2017-12-23 23:39:15',
                'dtmLastUpdated' => '2017-12-23 23:39:15',
            ),
            1 => 
            array (
                'iId' => 'aed4b322-17b8-4bd3-8a84-855d3fd2856f',
                'szId' => 'DIAMOND',
                'szName' => 'DIAMOND',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_01',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:39:55',
                'dtmLastUpdated' => '2017-12-23 23:39:55',
            ),
            2 => 
            array (
                'iId' => 'e28ac2d0-80e7-4e41-bfb7-8f8e6d656eca',
                'szId' => 'SILVER',
                'szName' => 'SILVER',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_01',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:40:08',
                'dtmLastUpdated' => '2017-12-23 23:40:08',
            ),
            3 => 
            array (
                'iId' => '9a1d563e-bc83-4121-8e6f-340836eac413',
                'szId' => 'ADP',
                'szName' => 'ADP',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:41:44',
                'dtmLastUpdated' => '2017-12-23 23:41:44',
            ),
            4 => 
            array (
                'iId' => 'e3045cf3-ebd0-41b7-8244-af11ea0957a8',
                'szId' => 'AFH',
                'szName' => 'AFH',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:41:53',
                'dtmLastUpdated' => '2017-12-23 23:46:57',
            ),
            5 => 
            array (
                'iId' => '60286d1b-acf4-44c2-8a78-a92ba7bddeeb',
                'szId' => 'AHS',
                'szName' => 'AHS',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:42:05',
                'dtmLastUpdated' => '2017-12-23 23:42:05',
            ),
            6 => 
            array (
                'iId' => '086a02b1-ad8b-4238-b582-e90becb6eeb0',
                'szId' => 'ALFAMART',
                'szName' => 'ALFAMART',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:42:23',
                'dtmLastUpdated' => '2017-12-23 23:42:23',
            ),
            7 => 
            array (
                'iId' => '2f3256b0-afa1-423b-805a-9031ac331d5d',
                'szId' => 'ASC',
                'szName' => 'ASC',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:42:34',
                'dtmLastUpdated' => '2017-12-23 23:42:34',
            ),
            8 => 
            array (
                'iId' => '5aeb6bb3-2e87-4d4f-a7f8-02c03ba459fb',
                'szId' => 'CAD',
                'szName' => 'CAD',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:42:46',
                'dtmLastUpdated' => '2017-12-23 23:42:46',
            ),
            9 => 
            array (
                'iId' => 'bd6be5e1-ae2a-48b1-8c89-84d41991116b',
                'szId' => 'HO',
                'szName' => 'HO',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:42:59',
                'dtmLastUpdated' => '2017-12-23 23:42:59',
            ),
            10 => 
            array (
                'iId' => '55d1e5b1-bd42-4ef0-879b-5cf47472ff17',
                'szId' => 'HOD',
                'szName' => 'HOD',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:43:07',
                'dtmLastUpdated' => '2017-12-23 23:43:07',
            ),
            11 => 
            array (
                'iId' => 'c20c5025-b643-49aa-8263-ec124fdf203a',
                'szId' => 'INDOMARET',
                'szName' => 'INDOMARET',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:43:23',
                'dtmLastUpdated' => '2017-12-23 23:43:23',
            ),
            12 => 
            array (
                'iId' => '36724d59-7df8-47ff-b378-9d7886b0cdfe',
                'szId' => 'INTERN',
                'szName' => 'INTERN',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:43:35',
                'dtmLastUpdated' => '2017-12-23 23:43:35',
            ),
            13 => 
            array (
                'iId' => '323cbb71-b351-472a-9b7a-cd2d6a34fb67',
                'szId' => 'MINI MARKET',
                'szName' => 'MINI MARKET',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:43:52',
                'dtmLastUpdated' => '2017-12-23 23:43:52',
            ),
            14 => 
            array (
                'iId' => '1b540541-f92d-4a4a-80b3-f8c98d8b8991',
                'szId' => 'RETAIL',
                'szName' => 'RETAIL',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:44:04',
                'dtmLastUpdated' => '2017-12-23 23:44:04',
            ),
            15 => 
            array (
                'iId' => '7704ed5a-9498-49c4-8552-e9d5cd1e4246',
                'szId' => 'SO',
                'szName' => 'SO',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:44:15',
                'dtmLastUpdated' => '2017-12-23 23:44:15',
            ),
            16 => 
            array (
                'iId' => '8d7c8fb2-1b9b-48d7-adcb-12f4a82dea29',
                'szId' => 'SWALAYAN',
                'szName' => 'SWALAYAN',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:44:28',
                'dtmLastUpdated' => '2017-12-23 23:44:28',
            ),
            17 => 
            array (
                'iId' => '5978e5fc-3ae5-43a3-82b5-d10dabed44b5',
                'szId' => 'VITSA',
                'szName' => 'VITSA',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:44:42',
                'dtmLastUpdated' => '2017-12-23 23:44:42',
            ),
            18 => 
            array (
                'iId' => '39a880d7-cc49-48e9-a19b-749894d22988',
                'szId' => 'WET MARKET',
                'szName' => 'WET MARKET',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:44:55',
                'dtmLastUpdated' => '2017-12-23 23:44:55',
            ),
            19 => 
            array (
                'iId' => '9e3af411-011b-45c3-87fc-2530b9bf895d',
                'szId' => 'WS',
                'szName' => 'WS',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2017-12-23 23:45:04',
                'dtmLastUpdated' => '2017-12-23 23:45:04',
            ),
            20 => 
            array (
                'iId' => 'c8ea174a-3289-469c-9767-a5b9ebb4d9d4',
                'szId' => 'ON-PREMISE',
                'szName' => 'ON-PREMISE',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_02',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2018-09-14 10:03:43',
                'dtmLastUpdated' => '2018-09-14 10:03:43',
            ),
            21 => 
            array (
                'iId' => 'ae175642-ceb8-4a2e-a245-db9cdd25ece5',
                'szId' => 'LKA',
                'szName' => 'LOCAL KEY ACCOUNT',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_03',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2019-02-01 14:35:36',
                'dtmLastUpdated' => '2019-02-01 14:35:36',
            ),
            22 => 
            array (
                'iId' => 'dcddab57-75c3-43b1-b60e-e83f68f3c44c',
                'szId' => 'NKA',
                'szName' => 'NATIONAL KEY ACCOUNT',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_03',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2019-02-01 14:35:52',
                'dtmLastUpdated' => '2019-02-01 14:35:52',
            ),
            23 => 
            array (
                'iId' => '2b327518-fe61-4aef-8456-69d341e21980',
                'szId' => 'MTI',
                'szName' => 'MODERN TRADE INDEPENDENT',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_03',
                'szUserCreatedId' => 'ADMIN',
                'szUserUpdatedId' => 'ADMIN',
                'dtmCreated' => '2019-02-01 14:38:39',
                'dtmLastUpdated' => '2019-02-01 14:42:03',
            ),
        ));
        
        
    }
}
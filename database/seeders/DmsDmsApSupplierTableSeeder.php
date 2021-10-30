<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DmsDmsApSupplierTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dms_ap_supplier')->delete();
        
        \DB::table('dms_ap_supplier')->insert(array (
            0 => 
            array (
                'iId' => '0db14087-3a5d-41b6-aa42-8ef2f0f7c8f5',
                'szId' => 'TIV',
                'szName' => 'PT.TIRTA INVESTAMA',
                'szDescription' => 'PT.TIRTA INVESTAMA',
                'szUserCreatedId' => 'ANTA',
                'szUserUpdatedId' => 'ANTA',
                'dtmCreated' => '2017-05-24 14:26:38',
                'dtmLastUpdated' => '2017-05-24 14:26:38',
            ),
            1 => 
            array (
                'iId' => '1b379eac-771e-4488-b2d8-5b2bc3ef19f8',
                'szId' => 'WJ',
                'szName' => 'CV.WAHYU JAYA',
                'szDescription' => '',
                'szUserCreatedId' => 'ANTA',
                'szUserUpdatedId' => 'ANTA',
                'dtmCreated' => '2017-05-24 13:55:02',
                'dtmLastUpdated' => '2017-05-24 13:55:02',
            ),
            2 => 
            array (
                'iId' => '1ed92bb9-cda7-427c-b678-04626a2c68c2',
                'szId' => '200',
                'szName' => 'BAYUADJI NUSANTARA INDUSTRIES',
                'szDescription' => '',
                'szUserCreatedId' => 'ANTA',
                'szUserUpdatedId' => 'ANTA',
                'dtmCreated' => '2017-05-24 13:54:32',
                'dtmLastUpdated' => '2017-05-24 13:54:32',
            ),
            3 => 
            array (
                'iId' => '216f2972-eb1c-4fd8-95f4-ad9570a1c4b5',
                'szId' => '120',
                'szName' => 'PT. TIV-PROD KLATEN',
                'szDescription' => 'PT. TIV-PROD KLATEN',
                'szUserCreatedId' => 'admin',
                'szUserUpdatedId' => 'ANTA',
                'dtmCreated' => '2017-05-24 13:56:05',
                'dtmLastUpdated' => '2017-05-24 13:56:05',
            ),
            4 => 
            array (
                'iId' => '2c06dcb2-84fe-493f-b9ab-8a820ff7e9cd',
                'szId' => '000',
                'szName' => 'Danone',
                'szDescription' => 'Danone Group',
                'szUserCreatedId' => 'admin',
                'szUserUpdatedId' => 'admin',
                'dtmCreated' => '2017-05-22 08:27:22',
                'dtmLastUpdated' => '2017-05-22 08:27:22',
            ),
            5 => 
            array (
                'iId' => '845e126e-a6a9-42bf-80a0-53349c5ab200',
                'szId' => '121',
                'szName' => 'PT. TIV-PROD KLATEN',
                'szDescription' => 'PLANT KLATEN',
                'szUserCreatedId' => 'admin',
                'szUserUpdatedId' => 'admin',
                'dtmCreated' => '2017-05-22 08:28:43',
                'dtmLastUpdated' => '2017-05-22 08:28:43',
            ),
            6 => 
            array (
                'iId' => '999eb642-0072-4939-9af6-38eb1af855f6',
                'szId' => '115',
                'szName' => 'PT. TIV-PROD WONOSOBO',
                'szDescription' => 'PT. TIV-PROD WONOSOBO',
                'szUserCreatedId' => 'ANTA',
                'szUserUpdatedId' => 'ANTA',
                'dtmCreated' => '2017-05-24 13:55:42',
                'dtmLastUpdated' => '2017-05-24 13:55:42',
            ),
            7 => 
            array (
                'iId' => 'c226ac8c-dc60-45a3-9f11-35a51161d9e1',
                'szId' => '118',
                'szName' => 'PT. TIV-PROD PANDAAN',
                'szDescription' => '',
                'szUserCreatedId' => 'ACHMAD',
                'szUserUpdatedId' => 'ACHMAD',
                'dtmCreated' => '2018-04-16 10:30:27',
                'dtmLastUpdated' => '2018-04-16 10:30:27',
            ),
            8 => 
            array (
                'iId' => 'a5cbc588-d903-4ed8-87b3-7d90f64fd4cb',
                'szId' => '119',
                'szName' => 'PT. TIV-PROD MAMBAL',
                'szDescription' => '',
                'szUserCreatedId' => 'ACHMAD',
                'szUserUpdatedId' => 'ACHMAD',
                'dtmCreated' => '2018-04-16 10:30:42',
                'dtmLastUpdated' => '2018-04-16 10:30:42',
            ),
            9 => 
            array (
                'iId' => '40811481-625a-40d1-b549-66194cfbd62d',
                'szId' => '164',
                'szName' => 'PT. TIV-PROD KEBUN CANDI',
                'szDescription' => '',
                'szUserCreatedId' => 'ACHMAD',
                'szUserUpdatedId' => 'ACHMAD',
                'dtmCreated' => '2018-04-16 10:31:12',
                'dtmLastUpdated' => '2018-04-16 10:31:12',
            ),
            10 => 
            array (
                'iId' => 'c1aa3418-c303-4a72-a2fc-a3f0912babf4',
                'szId' => '179',
                'szName' => 'PT. TIV-PROD RUNGKUT SBY',
                'szDescription' => '',
                'szUserCreatedId' => 'ACHMAD',
                'szUserUpdatedId' => 'ACHMAD',
                'dtmCreated' => '2018-04-16 10:31:34',
                'dtmLastUpdated' => '2018-04-16 10:31:34',
            ),
            11 => 
            array (
                'iId' => 'ab2a61e7-00c2-45cf-9ddd-2ca25cf9b96d',
                'szId' => '233',
                'szName' => 'PT. TIV-PROD CITEREUP',
                'szDescription' => '',
                'szUserCreatedId' => 'ACHMAD',
                'szUserUpdatedId' => 'ACHMAD',
                'dtmCreated' => '2018-04-16 10:32:04',
                'dtmLastUpdated' => '2018-04-16 10:32:04',
            ),
            12 => 
            array (
                'iId' => '0da3a23b-ecdf-483a-ba06-976dc584eeb9',
                'szId' => '55-049',
                'szName' => 'PT. SUMBER BENING LESTARI',
                'szDescription' => '',
                'szUserCreatedId' => 'ACHMAD',
                'szUserUpdatedId' => 'ACHMAD',
                'dtmCreated' => '2018-04-16 10:32:35',
                'dtmLastUpdated' => '2018-04-16 10:32:35',
            ),
            13 => 
            array (
                'iId' => '3f98d71e-836e-49a7-aa6e-1a7e3e587316',
                'szId' => '55-050',
                'szName' => 'PT. TIRTAMAS LESTARI',
                'szDescription' => '',
                'szUserCreatedId' => 'ACHMAD',
                'szUserUpdatedId' => 'ACHMAD',
                'dtmCreated' => '2018-04-16 10:32:52',
                'dtmLastUpdated' => '2018-04-16 10:32:52',
            ),
            14 => 
            array (
                'iId' => 'c5331732-b40c-4aac-b32a-8d7a34b32f1b',
                'szId' => '55-051',
                'szName' => 'PT. GRAHAMAS INTITIRTA',
                'szDescription' => '',
                'szUserCreatedId' => 'ACHMAD',
                'szUserUpdatedId' => 'ACHMAD',
                'dtmCreated' => '2018-04-16 10:33:14',
                'dtmLastUpdated' => '2018-04-16 10:33:14',
            ),
            15 => 
            array (
                'iId' => '41e6a148-9da1-4b39-96b9-d73bed89555a',
                'szId' => '9000',
                'szName' => 'PT. TIV-PROD CIANJUR',
                'szDescription' => '',
                'szUserCreatedId' => 'ACHMAD',
                'szUserUpdatedId' => 'ACHMAD',
                'dtmCreated' => '2018-04-16 10:33:34',
                'dtmLastUpdated' => '2018-04-16 10:33:34',
            ),
            16 => 
            array (
                'iId' => 'bb7c05e2-2fbc-4721-b05b-05f8c1f9fdb3',
                'szId' => '9063',
                'szName' => 'PT. TIV-PROD BINJAI',
                'szDescription' => '',
                'szUserCreatedId' => 'ACHMAD',
                'szUserUpdatedId' => 'ACHMAD',
                'dtmCreated' => '2018-04-16 10:34:06',
                'dtmLastUpdated' => '2018-04-16 10:34:06',
            ),
            17 => 
            array (
                'iId' => '644b0986-f706-449f-b643-ed7a466e5116',
                'szId' => '9100',
                'szName' => 'PT. TIV-PROD MEKARSARI',
                'szDescription' => '',
                'szUserCreatedId' => 'ACHMAD',
                'szUserUpdatedId' => 'ACHMAD',
                'dtmCreated' => '2018-04-16 10:34:29',
                'dtmLastUpdated' => '2018-04-16 10:34:29',
            ),
            18 => 
            array (
                'iId' => '72438cf9-5bbb-495d-a622-f4da3ac81074',
                'szId' => '55-052',
                'szName' => 'PT. TIRTA YAKIN SEJAHTERA',
                'szDescription' => '',
                'szUserCreatedId' => 'ACHMAD',
                'szUserUpdatedId' => 'DJALIL',
                'dtmCreated' => '2018-04-27 14:11:18',
                'dtmLastUpdated' => '2019-01-09 10:14:14',
            ),
            19 => 
            array (
                'iId' => 'aafc3156-2d85-4b8f-ad48-fa266578405e',
                'szId' => '90A8',
                'szName' => 'PT. TIV-PROD BANYUWANGI',
                'szDescription' => '',
                'szUserCreatedId' => 'DJALIL',
                'szUserUpdatedId' => 'DJALIL',
                'dtmCreated' => '2020-03-24 09:41:34',
                'dtmLastUpdated' => '2020-03-24 09:42:04',
            ),
        ));
        
        
    }
}
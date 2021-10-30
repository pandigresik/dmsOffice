<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DmsDmsInvProductcategorytypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dms_inv_productcategorytype')->delete();
        
        \DB::table('dms_inv_productcategorytype')->insert(array (
            0 => 
            array (
                'iId' => '20fb2c77-b79e-4f9d-a05c-25c963cd569b',
                'szId' => 'CATEGORY_05',
                'szName' => '<NOT SET>',
                'szDescription' => '',
                'bUseForPriceCalc' => 0,
                'szUserCreatedId' => 'WJS-KUDUS',
                'szUserUpdatedId' => 'WJS-KUDUS',
                'dtmCreated' => '2017-05-22 06:27:59',
                'dtmLastUpdated' => '2017-05-22 06:27:59',
            ),
            1 => 
            array (
                'iId' => '52fd8378-3422-4725-a282-fe60e88448c2',
                'szId' => 'CATEGORY_01',
                'szName' => 'SEGMENTASI HARGA',
                'szDescription' => '',
                'bUseForPriceCalc' => 1,
                'szUserCreatedId' => 'WJS-KUDUS',
                'szUserUpdatedId' => 'WJS-KUDUS',
                'dtmCreated' => '2017-05-22 06:27:59',
                'dtmLastUpdated' => '2017-05-22 06:27:59',
            ),
            2 => 
            array (
                'iId' => '54019160-c73b-4803-bbc4-ed18be95d81d',
                'szId' => 'CATEGORY_10',
                'szName' => '<NOT SET>',
                'szDescription' => '',
                'bUseForPriceCalc' => 0,
                'szUserCreatedId' => 'WJS-KUDUS',
                'szUserUpdatedId' => 'WJS-KUDUS',
                'dtmCreated' => '2017-05-22 06:27:59',
                'dtmLastUpdated' => '2017-05-22 06:27:59',
            ),
            3 => 
            array (
                'iId' => '8d46c160-8575-404a-869c-1cef65b63b54',
                'szId' => 'CATEGORY_03',
                'szName' => '<NOT SET>',
                'szDescription' => '',
                'bUseForPriceCalc' => 0,
                'szUserCreatedId' => 'WJS-KUDUS',
                'szUserUpdatedId' => 'WJS-KUDUS',
                'dtmCreated' => '2017-05-22 06:27:59',
                'dtmLastUpdated' => '2017-05-22 06:27:59',
            ),
            4 => 
            array (
                'iId' => 'c51b2c5d-e78e-42ee-9e2c-74f31844ab84',
                'szId' => 'CATEGORY_08',
                'szName' => '<NOT SET>',
                'szDescription' => '',
                'bUseForPriceCalc' => 0,
                'szUserCreatedId' => 'WJS-KUDUS',
                'szUserUpdatedId' => 'WJS-KUDUS',
                'dtmCreated' => '2017-05-22 06:27:59',
                'dtmLastUpdated' => '2017-05-22 06:27:59',
            ),
            5 => 
            array (
                'iId' => 'c5d38ccc-5d5b-4b7d-bd5e-593b24141f46',
                'szId' => 'CATEGORY_02',
                'szName' => '<NOT SET>',
                'szDescription' => '',
                'bUseForPriceCalc' => 0,
                'szUserCreatedId' => 'WJS-KUDUS',
                'szUserUpdatedId' => 'WJS-KUDUS',
                'dtmCreated' => '2017-05-22 06:27:59',
                'dtmLastUpdated' => '2017-05-22 06:27:59',
            ),
            6 => 
            array (
                'iId' => 'ccfc4f65-9a41-4b85-88a7-39a7df8a225a',
                'szId' => 'CATEGORY_07',
                'szName' => '<NOT SET>',
                'szDescription' => '',
                'bUseForPriceCalc' => 0,
                'szUserCreatedId' => 'WJS-KUDUS',
                'szUserUpdatedId' => 'WJS-KUDUS',
                'dtmCreated' => '2017-05-22 06:27:59',
                'dtmLastUpdated' => '2017-05-22 06:27:59',
            ),
            7 => 
            array (
                'iId' => 'd7c7e8be-677e-4461-a8d4-4e160e4c2bb0',
                'szId' => 'CATEGORY_09',
                'szName' => '<NOT SET>',
                'szDescription' => '',
                'bUseForPriceCalc' => 0,
                'szUserCreatedId' => 'WJS-KUDUS',
                'szUserUpdatedId' => 'WJS-KUDUS',
                'dtmCreated' => '2017-05-22 06:27:59',
                'dtmLastUpdated' => '2017-05-22 06:27:59',
            ),
            8 => 
            array (
                'iId' => 'e92bfc17-aa58-481f-826b-3cba150355ac',
                'szId' => 'CATEGORY_04',
                'szName' => '<NOT SET>',
                'szDescription' => '',
                'bUseForPriceCalc' => 0,
                'szUserCreatedId' => 'WJS-KUDUS',
                'szUserUpdatedId' => 'WJS-KUDUS',
                'dtmCreated' => '2017-05-22 06:27:59',
                'dtmLastUpdated' => '2017-05-22 06:27:59',
            ),
            9 => 
            array (
                'iId' => 'fcc49133-9543-41ad-b366-e6e41dc5ee4b',
                'szId' => 'CATEGORY_06',
                'szName' => '<NOT SET>',
                'szDescription' => '',
                'bUseForPriceCalc' => 0,
                'szUserCreatedId' => 'WJS-KUDUS',
                'szUserUpdatedId' => 'WJS-KUDUS',
                'dtmCreated' => '2017-05-22 06:27:59',
                'dtmLastUpdated' => '2017-05-22 06:27:59',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DmsDmsArPaymenttypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dms_ar_paymenttype')->delete();
        
        \DB::table('dms_ar_paymenttype')->insert(array (
            0 => 
            array (
                'iId' => '7588c0b1-90cc-4d67-85ab-84580cb2db33',
                'szId' => 'TUNAI',
                'szName' => 'TUNAI',
                'szDescription' => '',
                'szPaymentTypeId' => 'CASH',
                'szUserCreatedId' => 'admin',
                'szUserUpdatedId' => 'admin',
                'dtmCreated' => '2017-05-22 11:11:22',
                'dtmLastUpdated' => '2017-05-22 11:11:22',
            ),
            1 => 
            array (
                'iId' => '7f5aaf35-6b44-42c7-95eb-3353e2c9faea',
                'szId' => 'TRANSFER',
                'szName' => 'TRANSFER',
                'szDescription' => '',
                'szPaymentTypeId' => 'BG',
                'szUserCreatedId' => 'admin',
                'szUserUpdatedId' => 'admin',
                'dtmCreated' => '2017-05-22 11:12:05',
                'dtmLastUpdated' => '2017-05-22 11:12:05',
            ),
            2 => 
            array (
                'iId' => 'd7a74563-4705-49f5-93da-e4de62a0322e',
                'szId' => 'GIRO',
                'szName' => 'GIRO',
                'szDescription' => '',
                'szPaymentTypeId' => 'BG',
                'szUserCreatedId' => 'admin',
                'szUserUpdatedId' => 'admin',
                'dtmCreated' => '2017-05-22 11:11:47',
                'dtmLastUpdated' => '2017-05-22 11:11:47',
            ),
            3 => 
            array (
                'iId' => 'd744ac16-9f9e-4630-85fe-1038eea9c6d7',
                'szId' => '001',
                'szName' => 'Credit',
                'szDescription' => 'Pembayaran tipe credit',
                'szPaymentTypeId' => 'BG',
                'szUserCreatedId' => 'admin',
                'szUserUpdatedId' => 'admin',
                'dtmCreated' => '2017-07-13 15:53:33',
                'dtmLastUpdated' => '2017-07-13 15:53:33',
            ),
        ));
        
        
    }
}
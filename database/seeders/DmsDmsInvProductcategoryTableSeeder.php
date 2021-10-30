<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DmsDmsInvProductcategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dms_inv_productcategory')->delete();
        
        \DB::table('dms_inv_productcategory')->insert(array (
            0 => 
            array (
                'iId' => '57a4b3ff-1ffa-4060-a28e-20c36d7cf400',
                'szId' => '99-00001',
                'szName' => 'ALL BRAND',
                'szDescription' => '',
                'szCategoryTypeId' => 'CATEGORY_01',
                'szUserCreatedId' => 'WJS-KUDUS',
                'szUserUpdatedId' => 'WJS-KUDUS',
                'dtmCreated' => '2017-05-22 06:29:28',
                'dtmLastUpdated' => '2017-05-22 06:29:28',
            ),
        ));
        
        
    }
}
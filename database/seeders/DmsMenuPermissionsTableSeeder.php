<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DmsMenuPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_permissions')->delete();
        
        \DB::table('menu_permissions')->insert(array (
            0 => 
            array (
                'menu_id' => 8,
                'permission_id' => 229,
                'status' => '1',
            ),
            1 => 
            array (
                'menu_id' => 11,
                'permission_id' => 141,
                'status' => '1',
            ),
            2 => 
            array (
                'menu_id' => 15,
                'permission_id' => 233,
                'status' => '1',
            ),
            3 => 
            array (
                'menu_id' => 16,
                'permission_id' => 189,
                'status' => '1',
            ),
            4 => 
            array (
                'menu_id' => 17,
                'permission_id' => 221,
                'status' => '1',
            ),
            5 => 
            array (
                'menu_id' => 18,
                'permission_id' => 201,
                'status' => '1',
            ),
            6 => 
            array (
                'menu_id' => 25,
                'permission_id' => 181,
                'status' => '1',
            ),
            7 => 
            array (
                'menu_id' => 32,
                'permission_id' => 225,
                'status' => '1',
            ),
            8 => 
            array (
                'menu_id' => 33,
                'permission_id' => 169,
                'status' => '1',
            ),
            9 => 
            array (
                'menu_id' => 34,
                'permission_id' => 173,
                'status' => '1',
            ),
            10 => 
            array (
                'menu_id' => 35,
                'permission_id' => 145,
                'status' => '1',
            ),
        ));
        
        
    }
}
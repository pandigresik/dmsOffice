<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuPermissionsTableSeeder extends Seeder
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
                'menu_id' => 4,
                'permission_id' => 1,
                'status' => '1',
            ),
            1 => 
            array (
                'menu_id' => 5,
                'permission_id' => 5,
                'status' => '1',
            ),
            2 => 
            array (
                'menu_id' => 6,
                'permission_id' => 9,
                'status' => '1',
            ),
            3 => 
            array (
                'menu_id' => 7,
                'permission_id' => 13,
                'status' => '1',
            ),
            4 => 
            array (
                'menu_id' => 8,
                'permission_id' => 229,
                'status' => '1',
            ),
            5 => 
            array (
                'menu_id' => 9,
                'permission_id' => 17,
                'status' => '1',
            ),
            6 => 
            array (
                'menu_id' => 10,
                'permission_id' => 281,
                'status' => '1',
            ),
            7 => 
            array (
                'menu_id' => 11,
                'permission_id' => 141,
                'status' => '1',
            ),
            8 => 
            array (
                'menu_id' => 14,
                'permission_id' => 277,
                'status' => '1',
            ),
            9 => 
            array (
                'menu_id' => 15,
                'permission_id' => 233,
                'status' => '1',
            ),
            10 => 
            array (
                'menu_id' => 16,
                'permission_id' => 189,
                'status' => '1',
            ),
            11 => 
            array (
                'menu_id' => 17,
                'permission_id' => 221,
                'status' => '1',
            ),
            12 => 
            array (
                'menu_id' => 18,
                'permission_id' => 201,
                'status' => '1',
            ),
            13 => 
            array (
                'menu_id' => 25,
                'permission_id' => 181,
                'status' => '1',
            ),
            14 => 
            array (
                'menu_id' => 32,
                'permission_id' => 225,
                'status' => '1',
            ),
            15 => 
            array (
                'menu_id' => 33,
                'permission_id' => 169,
                'status' => '1',
            ),
            16 => 
            array (
                'menu_id' => 34,
                'permission_id' => 173,
                'status' => '1',
            ),
            17 => 
            array (
                'menu_id' => 35,
                'permission_id' => 145,
                'status' => '1',
            ),
        ));
        
        
    }
}
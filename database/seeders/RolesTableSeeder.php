<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'created_at' => '2021-10-26 22:21:21',
                'guard_name' => 'web',
                'id' => 1,
                'name' => 'administrator',
                'updated_at' => '2021-10-26 22:21:21',
            ),
            1 => 
            array (
                'created_at' => '2021-11-01 06:31:19',
                'guard_name' => 'web',
                'id' => 2,
                'name' => 'Admin Company',
                'updated_at' => '2021-11-01 06:31:19',
            ),
        ));
        
        
    }
}
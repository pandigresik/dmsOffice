<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DmsRolesTableSeeder extends Seeder
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
                'name' => 'administrator',
                'guard_name' => 'web',
                'created_at' => '2021-10-26 22:21:21',
                'updated_at' => '2021-10-26 22:21:21',
            ),
        ));
        
        
    }
}
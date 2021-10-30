<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DmsUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$0ohKGj.S7F4i0f9bp0bVK.Mv3KqRsdff3wkcCEg.5SBgKo4V1G4om',
                'remember_token' => NULL,
                'created_at' => '2021-10-26 22:21:17',
                'updated_at' => '2021-10-26 22:21:17',
                'entity_id' => NULL,
                'destroyed_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
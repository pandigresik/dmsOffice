<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'created_at' => '2021-10-26 22:21:17',
                'deleted_at' => NULL,
                'destroyed_at' => NULL,
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'entity_id' => NULL,
                'name' => 'Administrator',
                'password' => '$2y$10$0ohKGj.S7F4i0f9bp0bVK.Mv3KqRsdff3wkcCEg.5SBgKo4V1G4om',
                'remember_token' => NULL,
                'updated_at' => '2021-10-26 22:21:17',
            ),
            1 => 
            array (
                'created_at' => '2021-11-01 06:35:30',
                'deleted_at' => NULL,
                'destroyed_at' => NULL,
                'email' => 'admin@sejati.com',
                'email_verified_at' => NULL,
                'entity_id' => 1,
                'name' => 'Mujiono',
                'password' => '$2y$10$.5RNOGVuVlBGKN6lShPhF.KALvNIP9w8UGn9GUuJeMLuEfA4gvJpS',
                'remember_token' => NULL,
                'updated_at' => '2021-11-01 06:43:05',
            ),
        ));
        
        
    }
}
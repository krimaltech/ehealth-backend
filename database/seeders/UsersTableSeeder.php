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
                'id' => 1,
                'global_form_id' => NULL,
                'user_name' => NULL,
                'first_name' => 'SuperAdmin',
                'middle_name' => NULL,
                'last_name' => 'SuperAdmin',
                'phone' => NULL,
                'is_verified' => 1,
                'email' => 'jaruwaproduction@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$VsuSigX/sSJRbKIFshDg7OqCW0.kRBXf4GLfVqlzsUcuyaUgn4biq',
                'referrer_id' => NULL,
                'remember_token' => NULL,
                'created_at' => '2022-12-02 11:48:27',
                'updated_at' => '2022-12-02 11:48:27',
                'subrole' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'global_form_id' => NULL,
                'user_name' => NULL,
                'first_name' => 'Admin',
                'middle_name' => NULL,
                'last_name' => "Admin",
                'phone' => NULL,
                'is_verified' => 1,
                'email' => 'jaruwanepal@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$I75/hC.IvjitQDdqU4xOQeax6xV5fClv2e9raXJTChP/NHCgHD8AC',
                'referrer_id' => NULL,
                'remember_token' => NULL,
                'created_at' => '2022-12-02 11:48:28',
                'updated_at' => '2022-12-02 11:48:28',
                'subrole' => NULL,
            ),
        ));
        
        
    }
}
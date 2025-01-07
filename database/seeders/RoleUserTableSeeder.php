<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_user')->delete();
        
        \DB::table('role_user')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'role_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2023-02-01 11:09:06',
                'updated_at' => '2023-02-01 11:09:06',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'role_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2023-02-01 11:09:06',
                'updated_at' => '2023-02-01 11:09:06',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LabProfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lab_profiles')->delete();
        
        \DB::table('lab_profiles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'department_id' => 1,
                'profile_name' => 'Liver Test',
                'price' => '100',
                'created_at' => '2023-02-07 12:05:00',
                'updated_at' => '2023-02-09 12:45:34',
            ),
        ));
        
        
    }
}
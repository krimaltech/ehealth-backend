<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LabDepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lab_departments')->delete();
        
        \DB::table('lab_departments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'department' => 'Biochemistry',
                'created_at' => '2023-02-07 12:04:40',
                'updated_at' => '2023-02-07 12:04:40',
            ),
            1 => 
            array (
                'id' => 2,
                'department' => 'Virology',
                'created_at' => '2023-02-07 12:04:47',
                'updated_at' => '2023-02-07 12:04:47',
            ),
            2 => 
            array (
                'id' => 3,
                'department' => 'Hematology',
                'created_at' => '2023-02-07 12:04:52',
                'updated_at' => '2023-02-07 12:04:52',
            ),
        ));
        
        
    }
}
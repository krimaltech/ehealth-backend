<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LabValuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lab_values')->delete();
        
        \DB::table('lab_values')->insert(array (
            0 => 
            array (
                'id' => 1,
                'labtest_id' => 4,
                'result_name' => 'Result',
                'created_at' => '2023-02-07 12:07:26',
                'updated_at' => '2023-02-07 12:07:26',
            ),
            1 => 
            array (
                'id' => 2,
                'labtest_id' => 4,
                'result_name' => 'Value',
                'created_at' => '2023-02-07 12:07:26',
                'updated_at' => '2023-02-07 12:07:26',
            ),
            2 => 
            array (
                'id' => 3,
                'labtest_id' => 7,
                'result_name' => 'Blood Group',
                'created_at' => '2023-02-09 14:08:45',
                'updated_at' => '2023-02-09 14:08:45',
            ),
            3 => 
            array (
                'id' => 4,
                'labtest_id' => 7,
                'result_name' => 'RH Type',
                'created_at' => '2023-02-09 14:08:46',
                'updated_at' => '2023-02-09 14:08:46',
            ),
        ));
        
        
    }
}
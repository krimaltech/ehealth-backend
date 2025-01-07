<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PackageScreeningsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('package_screenings')->delete();
        
        \DB::table('package_screenings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'package_id' => 1,
                'screening_id' => 1,
                'category' => 'Detail Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-08 16:42:15',
                'updated_at' => '2023-06-08 16:42:15',
            ),
            1 => 
            array (
                'id' => 2,
                'package_id' => 1,
                'screening_id' => 2,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-08 16:42:15',
                'updated_at' => '2023-06-08 16:42:15',
            ),
            2 => 
            array (
                'id' => 3,
                'package_id' => 2,
                'screening_id' => 1,
                'category' => 'Detail Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:00:08',
                'updated_at' => '2023-06-09 12:00:08',
            ),
            3 => 
            array (
                'id' => 4,
                'package_id' => 2,
                'screening_id' => 2,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:00:08',
                'updated_at' => '2023-06-09 12:00:08',
            ),
            4 => 
            array (
                'id' => 5,
                'package_id' => 3,
                'screening_id' => 1,
                'category' => 'Detail Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:11:19',
                'updated_at' => '2023-06-09 12:11:19',
            ),
            5 => 
            array (
                'id' => 6,
                'package_id' => 3,
                'screening_id' => 2,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:11:19',
                'updated_at' => '2023-06-09 12:11:19',
            ),
            6 => 
            array (
                'id' => 7,
                'package_id' => 4,
                'screening_id' => 1,
                'category' => 'Detail Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:13:27',
                'updated_at' => '2023-06-09 12:13:27',
            ),
            7 => 
            array (
                'id' => 8,
                'package_id' => 4,
                'screening_id' => 2,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:13:27',
                'updated_at' => '2023-06-09 12:13:27',
            ),
            8 => 
            array (
                'id' => 9,
                'package_id' => 4,
                'screening_id' => 3,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:13:27',
                'updated_at' => '2023-06-09 12:13:27',
            ),
            9 => 
            array (
                'id' => 10,
                'package_id' => 5,
                'screening_id' => 1,
                'category' => 'Detail Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:15:33',
                'updated_at' => '2023-06-09 12:15:33',
            ),
            10 => 
            array (
                'id' => 11,
                'package_id' => 5,
                'screening_id' => 2,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:15:33',
                'updated_at' => '2023-06-09 12:15:33',
            ),
            11 => 
            array (
                'id' => 12,
                'package_id' => 5,
                'screening_id' => 3,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:15:33',
                'updated_at' => '2023-06-09 12:15:33',
            ),
            12 => 
            array (
                'id' => 13,
                'package_id' => 6,
                'screening_id' => 1,
                'category' => 'Detail Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:17:07',
                'updated_at' => '2023-06-09 12:17:07',
            ),
            13 => 
            array (
                'id' => 14,
                'package_id' => 6,
                'screening_id' => 2,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:17:07',
                'updated_at' => '2023-06-09 12:17:07',
            ),
            14 => 
            array (
                'id' => 15,
                'package_id' => 6,
                'screening_id' => 3,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:17:07',
                'updated_at' => '2023-06-09 12:17:07',
            ),
            15 => 
            array (
                'id' => 16,
                'package_id' => 6,
                'screening_id' => 4,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:17:08',
                'updated_at' => '2023-06-09 12:17:08',
            ),
            16 => 
            array (
                'id' => 17,
                'package_id' => 7,
                'screening_id' => 1,
                'category' => 'Detail Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:19:06',
                'updated_at' => '2023-06-09 12:19:06',
            ),
            17 => 
            array (
                'id' => 18,
                'package_id' => 7,
                'screening_id' => 2,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:19:06',
                'updated_at' => '2023-06-09 12:19:06',
            ),
            18 => 
            array (
                'id' => 19,
                'package_id' => 8,
                'screening_id' => 1,
                'category' => 'Detail Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:20:01',
                'updated_at' => '2023-06-09 12:20:01',
            ),
            19 => 
            array (
                'id' => 20,
                'package_id' => 8,
                'screening_id' => 2,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:20:01',
                'updated_at' => '2023-06-09 12:20:01',
            ),
            20 => 
            array (
                'id' => 21,
                'package_id' => 9,
                'screening_id' => 1,
                'category' => 'Detail Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:21:13',
                'updated_at' => '2023-06-09 12:21:13',
            ),
            21 => 
            array (
                'id' => 22,
                'package_id' => 9,
                'screening_id' => 2,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:21:13',
                'updated_at' => '2023-06-09 12:21:13',
            ),
            22 => 
            array (
                'id' => 23,
                'package_id' => 9,
                'screening_id' => 3,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:21:13',
                'updated_at' => '2023-06-09 12:21:13',
            ),
            23 => 
            array (
                'id' => 24,
                'package_id' => 10,
                'screening_id' => 1,
                'category' => 'Detail Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:25:40',
                'updated_at' => '2023-06-09 12:25:40',
            ),
            24 => 
            array (
                'id' => 25,
                'package_id' => 10,
                'screening_id' => 2,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:25:40',
                'updated_at' => '2023-06-09 12:25:40',
            ),
            25 => 
            array (
                'id' => 26,
                'package_id' => 10,
                'screening_id' => 3,
                'category' => 'Follow Up Screening',
                'consultation_type' => NULL,
                'created_at' => '2023-06-09 12:25:40',
                'updated_at' => '2023-06-09 12:25:40',
            ),
        ));
        
        
    }
}
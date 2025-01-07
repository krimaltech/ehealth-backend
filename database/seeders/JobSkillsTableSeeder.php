<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobSkillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('job_skills')->delete();
        
        \DB::table('job_skills')->insert(array (
            0 => 
            array (
                'id' => 1,
                'skill' => 'Communication',
                'created_at' => '2023-04-02 20:19:05',
                'updated_at' => '2023-04-02 20:19:05',
            ),
            1 => 
            array (
                'id' => 2,
                'skill' => 'Decision Making',
                'created_at' => '2023-04-02 20:19:08',
                'updated_at' => '2023-04-02 20:19:08',
            ),
            2 => 
            array (
                'id' => 3,
                'skill' => 'Problem Solving',
                'created_at' => '2023-04-02 20:19:14',
                'updated_at' => '2023-04-02 20:19:14',
            ),
            3 => 
            array (
                'id' => 4,
                'skill' => 'SEO/SEM',
                'created_at' => '2023-04-03 15:46:06',
                'updated_at' => '2023-04-03 15:46:06',
            ),
            4 => 
            array (
                'id' => 5,
                'skill' => 'Graphics',
                'created_at' => '2023-04-03 18:34:04',
                'updated_at' => '2023-04-03 18:34:04',
            ),
            5 => 
            array (
                'id' => 6,
                'skill' => 'Video Making',
                'created_at' => '2023-04-03 18:34:20',
                'updated_at' => '2023-04-03 18:34:20',
            ),
            6 => 
            array (
                'id' => 7,
                'skill' => 'Adobe Photoshop',
                'created_at' => '2023-04-03 18:34:32',
                'updated_at' => '2023-04-03 18:34:32',
            ),
            7 => 
            array (
                'id' => 8,
                'skill' => 'Canva',
                'created_at' => '2023-04-03 18:34:40',
                'updated_at' => '2023-04-03 18:34:40',
            ),
            8 => 
            array (
                'id' => 9,
                'skill' => 'Illustrator',
                'created_at' => '2023-04-03 18:34:48',
                'updated_at' => '2023-04-03 18:34:48',
            ),
            9 => 
            array (
                'id' => 10,
                'skill' => 'Creative',
                'created_at' => '2023-04-03 18:35:14',
                'updated_at' => '2023-04-03 18:35:14',
            ),
            10 => 
            array (
                'id' => 11,
                'skill' => 'Innovative',
                'created_at' => '2023-04-03 18:35:21',
                'updated_at' => '2023-04-03 18:35:21',
            ),
            11 => 
            array (
                'id' => 12,
                'skill' => 'Designing',
                'created_at' => '2023-04-03 18:36:27',
                'updated_at' => '2023-04-03 18:36:27',
            ),
            12 => 
            array (
                'id' => 13,
                'skill' => 'Sales',
                'created_at' => '2023-04-03 18:37:05',
                'updated_at' => '2023-04-03 18:37:05',
            ),
            13 => 
            array (
                'id' => 14,
                'skill' => 'Social Media Handling',
                'created_at' => '2023-04-03 18:38:18',
                'updated_at' => '2023-04-03 18:38:18',
            ),
            14 => 
            array (
                'id' => 15,
                'skill' => 'Paid and Organic Campaigns',
                'created_at' => '2023-04-03 18:38:54',
                'updated_at' => '2023-04-03 18:38:54',
            ),
            15 => 
            array (
                'id' => 16,
                'skill' => 'Google Ads',
                'created_at' => '2023-04-03 18:39:01',
                'updated_at' => '2023-04-03 18:39:01',
            ),
            16 => 
            array (
                'id' => 17,
                'skill' => 'Facebook Pixel',
                'created_at' => '2023-04-03 18:39:09',
                'updated_at' => '2023-04-03 18:39:09',
            ),
            17 => 
            array (
                'id' => 18,
                'skill' => 'In App Promotions',
                'created_at' => '2023-04-03 18:39:20',
                'updated_at' => '2023-04-03 18:39:20',
            ),
            18 => 
            array (
                'id' => 19,
                'skill' => 'Content Marketing',
                'created_at' => '2023-04-03 18:39:28',
                'updated_at' => '2023-04-03 18:39:28',
            ),
            19 => 
            array (
                'id' => 20,
                'skill' => 'Online and Offline Page',
                'created_at' => '2023-04-03 18:39:39',
                'updated_at' => '2023-04-03 18:39:39',
            ),
            20 => 
            array (
                'id' => 21,
                'skill' => 'Time Management',
                'created_at' => '2023-04-28 19:26:16',
                'updated_at' => '2023-04-28 19:26:16',
            ),
            21 => 
            array (
                'id' => 22,
                'skill' => 'Excellent Communications',
                'created_at' => '2023-04-28 19:27:19',
                'updated_at' => '2023-04-28 19:27:19',
            ),
            22 => 
            array (
                'id' => 23,
                'skill' => 'Facilitations',
                'created_at' => '2023-04-28 19:27:37',
                'updated_at' => '2023-04-28 19:27:37',
            ),
            23 => 
            array (
                'id' => 24,
                'skill' => 'Decision Making',
                'created_at' => '2023-04-28 19:27:55',
                'updated_at' => '2023-04-28 19:27:55',
            ),
            24 => 
            array (
                'id' => 25,
                'skill' => 'Technology Friendly',
                'created_at' => '2023-04-28 19:28:23',
                'updated_at' => '2023-04-28 19:28:23',
            ),
            25 => 
            array (
                'id' => 26,
                'skill' => 'Counselling',
                'created_at' => '2023-05-04 17:48:42',
                'updated_at' => '2023-05-04 17:48:42',
            ),
            26 => 
            array (
                'id' => 27,
                'skill' => 'Motivating',
                'created_at' => '2023-05-04 17:49:16',
                'updated_at' => '2023-05-04 17:49:16',
            ),
        ));
        
        
    }
}
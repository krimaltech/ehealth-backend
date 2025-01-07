<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VacancySkillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vacancy_skills')->delete();
        
        \DB::table('vacancy_skills')->insert(array (
            0 => 
            array (
                'id' => 1,
                'vacancy_id' => 1,
                'skill_id' => 1,
                'created_at' => '2023-04-12 18:33:28',
                'updated_at' => '2023-04-12 18:33:28',
            ),
            1 => 
            array (
                'id' => 2,
                'vacancy_id' => 1,
                'skill_id' => 2,
                'created_at' => '2023-04-12 18:33:28',
                'updated_at' => '2023-04-12 18:33:28',
            ),
            2 => 
            array (
                'id' => 3,
                'vacancy_id' => 1,
                'skill_id' => 3,
                'created_at' => '2023-04-12 18:33:28',
                'updated_at' => '2023-04-12 18:33:28',
            ),
            3 => 
            array (
                'id' => 4,
                'vacancy_id' => 1,
                'skill_id' => 4,
                'created_at' => '2023-04-12 18:33:28',
                'updated_at' => '2023-04-12 18:33:28',
            ),
            4 => 
            array (
                'id' => 5,
                'vacancy_id' => 2,
                'skill_id' => 1,
                'created_at' => '2023-04-12 18:33:51',
                'updated_at' => '2023-04-12 18:33:51',
            ),
            5 => 
            array (
                'id' => 6,
                'vacancy_id' => 2,
                'skill_id' => 2,
                'created_at' => '2023-04-12 18:33:51',
                'updated_at' => '2023-04-12 18:33:51',
            ),
            6 => 
            array (
                'id' => 7,
                'vacancy_id' => 2,
                'skill_id' => 3,
                'created_at' => '2023-04-12 18:33:51',
                'updated_at' => '2023-04-12 18:33:51',
            ),
            7 => 
            array (
                'id' => 8,
                'vacancy_id' => 3,
                'skill_id' => 1,
                'created_at' => '2023-04-12 18:34:24',
                'updated_at' => '2023-04-12 18:34:24',
            ),
            8 => 
            array (
                'id' => 9,
                'vacancy_id' => 3,
                'skill_id' => 2,
                'created_at' => '2023-04-12 18:34:24',
                'updated_at' => '2023-04-12 18:34:24',
            ),
            9 => 
            array (
                'id' => 10,
                'vacancy_id' => 3,
                'skill_id' => 3,
                'created_at' => '2023-04-12 18:34:24',
                'updated_at' => '2023-04-12 18:34:24',
            ),
            10 => 
            array (
                'id' => 11,
                'vacancy_id' => 3,
                'skill_id' => 4,
                'created_at' => '2023-04-12 18:34:24',
                'updated_at' => '2023-04-12 18:34:24',
            ),
            11 => 
            array (
                'id' => 12,
                'vacancy_id' => 1,
                'skill_id' => 5,
                'created_at' => '2023-04-12 18:34:36',
                'updated_at' => '2023-04-12 18:34:36',
            ),
            12 => 
            array (
                'id' => 13,
                'vacancy_id' => 1,
                'skill_id' => 6,
                'created_at' => '2023-04-12 18:34:36',
                'updated_at' => '2023-04-12 18:34:36',
            ),
            13 => 
            array (
                'id' => 14,
                'vacancy_id' => 4,
                'skill_id' => 1,
                'created_at' => '2023-04-28 19:35:05',
                'updated_at' => '2023-04-28 19:35:05',
            ),
            14 => 
            array (
                'id' => 15,
                'vacancy_id' => 4,
                'skill_id' => 2,
                'created_at' => '2023-04-28 19:35:05',
                'updated_at' => '2023-04-28 19:35:05',
            ),
            15 => 
            array (
                'id' => 16,
                'vacancy_id' => 4,
                'skill_id' => 3,
                'created_at' => '2023-04-28 19:35:05',
                'updated_at' => '2023-04-28 19:35:05',
            ),
            16 => 
            array (
                'id' => 17,
                'vacancy_id' => 4,
                'skill_id' => 10,
                'created_at' => '2023-04-28 19:35:05',
                'updated_at' => '2023-04-28 19:35:05',
            ),
            17 => 
            array (
                'id' => 18,
                'vacancy_id' => 4,
                'skill_id' => 21,
                'created_at' => '2023-04-28 19:35:05',
                'updated_at' => '2023-04-28 19:35:05',
            ),
            18 => 
            array (
                'id' => 19,
                'vacancy_id' => 4,
                'skill_id' => 22,
                'created_at' => '2023-04-28 19:35:05',
                'updated_at' => '2023-04-28 19:35:05',
            ),
            19 => 
            array (
                'id' => 20,
                'vacancy_id' => 4,
                'skill_id' => 23,
                'created_at' => '2023-04-28 19:35:05',
                'updated_at' => '2023-04-28 19:35:05',
            ),
            20 => 
            array (
                'id' => 21,
                'vacancy_id' => 4,
                'skill_id' => 24,
                'created_at' => '2023-04-28 19:35:05',
                'updated_at' => '2023-04-28 19:35:05',
            ),
            21 => 
            array (
                'id' => 22,
                'vacancy_id' => 4,
                'skill_id' => 25,
                'created_at' => '2023-04-28 19:35:05',
                'updated_at' => '2023-04-28 19:35:05',
            ),
            22 => 
            array (
                'id' => 23,
                'vacancy_id' => 5,
                'skill_id' => 1,
                'created_at' => '2023-04-28 20:51:06',
                'updated_at' => '2023-04-28 20:51:06',
            ),
            23 => 
            array (
                'id' => 24,
                'vacancy_id' => 5,
                'skill_id' => 2,
                'created_at' => '2023-04-28 20:51:06',
                'updated_at' => '2023-04-28 20:51:06',
            ),
            24 => 
            array (
                'id' => 25,
                'vacancy_id' => 5,
                'skill_id' => 3,
                'created_at' => '2023-04-28 20:51:06',
                'updated_at' => '2023-04-28 20:51:06',
            ),
            25 => 
            array (
                'id' => 26,
                'vacancy_id' => 5,
                'skill_id' => 11,
                'created_at' => '2023-04-28 20:51:06',
                'updated_at' => '2023-04-28 20:51:06',
            ),
            26 => 
            array (
                'id' => 27,
                'vacancy_id' => 5,
                'skill_id' => 21,
                'created_at' => '2023-04-28 20:51:06',
                'updated_at' => '2023-04-28 20:51:06',
            ),
            27 => 
            array (
                'id' => 28,
                'vacancy_id' => 5,
                'skill_id' => 22,
                'created_at' => '2023-04-28 20:51:06',
                'updated_at' => '2023-04-28 20:51:06',
            ),
            28 => 
            array (
                'id' => 29,
                'vacancy_id' => 5,
                'skill_id' => 25,
                'created_at' => '2023-04-28 20:51:06',
                'updated_at' => '2023-04-28 20:51:06',
            ),
            29 => 
            array (
                'id' => 30,
                'vacancy_id' => 6,
                'skill_id' => 2,
                'created_at' => '2023-04-30 19:13:34',
                'updated_at' => '2023-04-30 19:13:34',
            ),
            30 => 
            array (
                'id' => 31,
                'vacancy_id' => 6,
                'skill_id' => 3,
                'created_at' => '2023-04-30 19:13:34',
                'updated_at' => '2023-04-30 19:13:34',
            ),
            31 => 
            array (
                'id' => 32,
                'vacancy_id' => 6,
                'skill_id' => 11,
                'created_at' => '2023-04-30 19:13:34',
                'updated_at' => '2023-04-30 19:13:34',
            ),
            32 => 
            array (
                'id' => 33,
                'vacancy_id' => 6,
                'skill_id' => 21,
                'created_at' => '2023-04-30 19:13:34',
                'updated_at' => '2023-04-30 19:13:34',
            ),
            33 => 
            array (
                'id' => 34,
                'vacancy_id' => 6,
                'skill_id' => 22,
                'created_at' => '2023-04-30 19:13:34',
                'updated_at' => '2023-04-30 19:13:34',
            ),
            34 => 
            array (
                'id' => 35,
                'vacancy_id' => 6,
                'skill_id' => 23,
                'created_at' => '2023-04-30 19:13:34',
                'updated_at' => '2023-04-30 19:13:34',
            ),
            35 => 
            array (
                'id' => 36,
                'vacancy_id' => 6,
                'skill_id' => 24,
                'created_at' => '2023-04-30 19:13:34',
                'updated_at' => '2023-04-30 19:13:34',
            ),
            36 => 
            array (
                'id' => 37,
                'vacancy_id' => 6,
                'skill_id' => 25,
                'created_at' => '2023-04-30 19:13:34',
                'updated_at' => '2023-04-30 19:13:34',
            ),
            37 => 
            array (
                'id' => 38,
                'vacancy_id' => 7,
                'skill_id' => 1,
                'created_at' => '2023-04-30 20:03:12',
                'updated_at' => '2023-04-30 20:03:12',
            ),
            38 => 
            array (
                'id' => 39,
                'vacancy_id' => 7,
                'skill_id' => 2,
                'created_at' => '2023-04-30 20:03:12',
                'updated_at' => '2023-04-30 20:03:12',
            ),
            39 => 
            array (
                'id' => 40,
                'vacancy_id' => 7,
                'skill_id' => 3,
                'created_at' => '2023-04-30 20:03:12',
                'updated_at' => '2023-04-30 20:03:12',
            ),
            40 => 
            array (
                'id' => 41,
                'vacancy_id' => 7,
                'skill_id' => 10,
                'created_at' => '2023-04-30 20:03:12',
                'updated_at' => '2023-04-30 20:03:12',
            ),
            41 => 
            array (
                'id' => 42,
                'vacancy_id' => 7,
                'skill_id' => 21,
                'created_at' => '2023-04-30 20:03:12',
                'updated_at' => '2023-04-30 20:03:12',
            ),
            42 => 
            array (
                'id' => 43,
                'vacancy_id' => 7,
                'skill_id' => 22,
                'created_at' => '2023-04-30 20:03:12',
                'updated_at' => '2023-04-30 20:03:12',
            ),
            43 => 
            array (
                'id' => 44,
                'vacancy_id' => 7,
                'skill_id' => 23,
                'created_at' => '2023-04-30 20:03:12',
                'updated_at' => '2023-04-30 20:03:12',
            ),
            44 => 
            array (
                'id' => 45,
                'vacancy_id' => 7,
                'skill_id' => 24,
                'created_at' => '2023-04-30 20:03:12',
                'updated_at' => '2023-04-30 20:03:12',
            ),
            45 => 
            array (
                'id' => 46,
                'vacancy_id' => 7,
                'skill_id' => 25,
                'created_at' => '2023-04-30 20:03:12',
                'updated_at' => '2023-04-30 20:03:12',
            ),
            46 => 
            array (
                'id' => 47,
                'vacancy_id' => 8,
                'skill_id' => 2,
                'created_at' => '2023-05-04 18:45:26',
                'updated_at' => '2023-05-04 18:45:26',
            ),
            47 => 
            array (
                'id' => 48,
                'vacancy_id' => 8,
                'skill_id' => 3,
                'created_at' => '2023-05-04 18:45:26',
                'updated_at' => '2023-05-04 18:45:26',
            ),
            48 => 
            array (
                'id' => 49,
                'vacancy_id' => 8,
                'skill_id' => 21,
                'created_at' => '2023-05-04 18:45:26',
                'updated_at' => '2023-05-04 18:45:26',
            ),
            49 => 
            array (
                'id' => 50,
                'vacancy_id' => 8,
                'skill_id' => 22,
                'created_at' => '2023-05-04 18:45:26',
                'updated_at' => '2023-05-04 18:45:26',
            ),
            50 => 
            array (
                'id' => 51,
                'vacancy_id' => 8,
                'skill_id' => 23,
                'created_at' => '2023-05-04 18:45:26',
                'updated_at' => '2023-05-04 18:45:26',
            ),
            51 => 
            array (
                'id' => 52,
                'vacancy_id' => 8,
                'skill_id' => 25,
                'created_at' => '2023-05-04 18:45:26',
                'updated_at' => '2023-05-04 18:45:26',
            ),
            52 => 
            array (
                'id' => 53,
                'vacancy_id' => 8,
                'skill_id' => 26,
                'created_at' => '2023-05-04 18:45:26',
                'updated_at' => '2023-05-04 18:45:26',
            ),
            53 => 
            array (
                'id' => 54,
                'vacancy_id' => 8,
                'skill_id' => 27,
                'created_at' => '2023-05-04 18:45:26',
                'updated_at' => '2023-05-04 18:45:26',
            ),
            54 => 
            array (
                'id' => 55,
                'vacancy_id' => 9,
                'skill_id' => 2,
                'created_at' => '2023-05-04 18:59:10',
                'updated_at' => '2023-05-04 18:59:10',
            ),
            55 => 
            array (
                'id' => 56,
                'vacancy_id' => 9,
                'skill_id' => 3,
                'created_at' => '2023-05-04 18:59:10',
                'updated_at' => '2023-05-04 18:59:10',
            ),
            56 => 
            array (
                'id' => 57,
                'vacancy_id' => 9,
                'skill_id' => 10,
                'created_at' => '2023-05-04 18:59:10',
                'updated_at' => '2023-05-04 18:59:10',
            ),
            57 => 
            array (
                'id' => 58,
                'vacancy_id' => 9,
                'skill_id' => 21,
                'created_at' => '2023-05-04 18:59:10',
                'updated_at' => '2023-05-04 18:59:10',
            ),
            58 => 
            array (
                'id' => 59,
                'vacancy_id' => 9,
                'skill_id' => 22,
                'created_at' => '2023-05-04 18:59:10',
                'updated_at' => '2023-05-04 18:59:10',
            ),
            59 => 
            array (
                'id' => 60,
                'vacancy_id' => 9,
                'skill_id' => 23,
                'created_at' => '2023-05-04 18:59:10',
                'updated_at' => '2023-05-04 18:59:10',
            ),
            60 => 
            array (
                'id' => 61,
                'vacancy_id' => 9,
                'skill_id' => 25,
                'created_at' => '2023-05-04 18:59:10',
                'updated_at' => '2023-05-04 18:59:10',
            ),
            61 => 
            array (
                'id' => 62,
                'vacancy_id' => 9,
                'skill_id' => 26,
                'created_at' => '2023-05-04 18:59:10',
                'updated_at' => '2023-05-04 18:59:10',
            ),
            62 => 
            array (
                'id' => 63,
                'vacancy_id' => 9,
                'skill_id' => 27,
                'created_at' => '2023-05-04 18:59:10',
                'updated_at' => '2023-05-04 18:59:10',
            ),
            63 => 
            array (
                'id' => 64,
                'vacancy_id' => 10,
                'skill_id' => 22,
                'created_at' => '2023-05-12 15:09:54',
                'updated_at' => '2023-05-12 15:09:54',
            ),
            64 => 
            array (
                'id' => 65,
                'vacancy_id' => 10,
                'skill_id' => 23,
                'created_at' => '2023-05-12 15:09:54',
                'updated_at' => '2023-05-12 15:09:54',
            ),
            65 => 
            array (
                'id' => 66,
                'vacancy_id' => 10,
                'skill_id' => 24,
                'created_at' => '2023-05-12 15:09:54',
                'updated_at' => '2023-05-12 15:09:54',
            ),
            66 => 
            array (
                'id' => 67,
                'vacancy_id' => 10,
                'skill_id' => 25,
                'created_at' => '2023-05-12 15:09:54',
                'updated_at' => '2023-05-12 15:09:54',
            ),
            67 => 
            array (
                'id' => 68,
                'vacancy_id' => 10,
                'skill_id' => 26,
                'created_at' => '2023-05-12 15:09:54',
                'updated_at' => '2023-05-12 15:09:54',
            ),
            68 => 
            array (
                'id' => 69,
                'vacancy_id' => 10,
                'skill_id' => 27,
                'created_at' => '2023-05-12 15:09:54',
                'updated_at' => '2023-05-12 15:09:54',
            ),
            69 => 
            array (
                'id' => 70,
                'vacancy_id' => 11,
                'skill_id' => 1,
                'created_at' => '2023-07-09 11:17:00',
                'updated_at' => '2023-07-09 11:17:00',
            ),
            70 => 
            array (
                'id' => 71,
                'vacancy_id' => 11,
                'skill_id' => 2,
                'created_at' => '2023-07-09 11:17:00',
                'updated_at' => '2023-07-09 11:17:00',
            ),
            71 => 
            array (
                'id' => 72,
                'vacancy_id' => 11,
                'skill_id' => 3,
                'created_at' => '2023-07-09 11:17:00',
                'updated_at' => '2023-07-09 11:17:00',
            ),
            72 => 
            array (
                'id' => 73,
                'vacancy_id' => 11,
                'skill_id' => 10,
                'created_at' => '2023-07-09 11:17:00',
                'updated_at' => '2023-07-09 11:17:00',
            ),
            73 => 
            array (
                'id' => 74,
                'vacancy_id' => 11,
                'skill_id' => 13,
                'created_at' => '2023-07-09 11:17:00',
                'updated_at' => '2023-07-09 11:17:00',
            ),
            74 => 
            array (
                'id' => 75,
                'vacancy_id' => 11,
                'skill_id' => 21,
                'created_at' => '2023-07-09 11:17:00',
                'updated_at' => '2023-07-09 11:17:00',
            ),
            75 => 
            array (
                'id' => 76,
                'vacancy_id' => 11,
                'skill_id' => 22,
                'created_at' => '2023-07-09 11:17:00',
                'updated_at' => '2023-07-09 11:17:00',
            ),
            76 => 
            array (
                'id' => 77,
                'vacancy_id' => 11,
                'skill_id' => 25,
                'created_at' => '2023-07-09 11:17:00',
                'updated_at' => '2023-07-09 11:17:00',
            ),
            77 => 
            array (
                'id' => 78,
                'vacancy_id' => 11,
                'skill_id' => 27,
                'created_at' => '2023-07-09 11:17:00',
                'updated_at' => '2023-07-09 11:17:00',
            ),
        ));
        
        
    }
}
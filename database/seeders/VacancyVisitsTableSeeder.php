<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VacancyVisitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vacancy_visits')->delete();
        
        \DB::table('vacancy_visits')->insert(array (
            0 => 
            array (
                'id' => 1,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 0,
                'created_at' => '2023-05-08 23:12:21',
                'updated_at' => '2023-05-08 23:12:21',
            ),
            1 => 
            array (
                'id' => 2,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 0,
                'created_at' => '2023-05-08 23:16:52',
                'updated_at' => '2023-05-08 23:16:52',
            ),
            2 => 
            array (
                'id' => 3,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 0,
                'created_at' => '2023-05-08 23:17:01',
                'updated_at' => '2023-05-08 23:17:01',
            ),
            3 => 
            array (
                'id' => 4,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-08 23:18:33',
                'updated_at' => '2023-05-08 23:18:33',
            ),
            4 => 
            array (
                'id' => 5,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-08 23:18:42',
                'updated_at' => '2023-05-08 23:18:42',
            ),
            5 => 
            array (
                'id' => 6,
                'vacancy_id' => 6,
                'ip_address' => '172.69.77.27',
                'visit_status' => 0,
                'created_at' => '2023-05-09 00:28:24',
                'updated_at' => '2023-05-09 00:28:24',
            ),
            6 => 
            array (
                'id' => 7,
                'vacancy_id' => 6,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-09 00:28:42',
                'updated_at' => '2023-05-09 00:28:42',
            ),
            7 => 
            array (
                'id' => 8,
                'vacancy_id' => 6,
                'ip_address' => '172.69.77.32',
                'visit_status' => 0,
                'created_at' => '2023-05-09 16:23:08',
                'updated_at' => '2023-05-09 16:23:08',
            ),
            8 => 
            array (
                'id' => 9,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.137',
                'visit_status' => 0,
                'created_at' => '2023-05-09 16:32:33',
                'updated_at' => '2023-05-09 16:32:33',
            ),
            9 => 
            array (
                'id' => 10,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.136',
                'visit_status' => 0,
                'created_at' => '2023-05-09 16:32:50',
                'updated_at' => '2023-05-09 16:32:50',
            ),
            10 => 
            array (
                'id' => 11,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.137',
                'visit_status' => 1,
                'created_at' => '2023-05-09 17:28:29',
                'updated_at' => '2023-05-09 17:28:29',
            ),
            11 => 
            array (
                'id' => 12,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 0,
                'created_at' => '2023-05-11 16:45:57',
                'updated_at' => '2023-05-11 16:45:57',
            ),
            12 => 
            array (
                'id' => 13,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-11 16:46:28',
                'updated_at' => '2023-05-11 16:46:28',
            ),
            13 => 
            array (
                'id' => 14,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-11 16:46:29',
                'updated_at' => '2023-05-11 16:46:29',
            ),
            14 => 
            array (
                'id' => 15,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-11 16:47:01',
                'updated_at' => '2023-05-11 16:47:01',
            ),
            15 => 
            array (
                'id' => 16,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-11 16:47:41',
                'updated_at' => '2023-05-11 16:47:41',
            ),
            16 => 
            array (
                'id' => 17,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-11 16:48:00',
                'updated_at' => '2023-05-11 16:48:00',
            ),
            17 => 
            array (
                'id' => 18,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.30',
                'visit_status' => 0,
                'created_at' => '2023-05-11 16:58:03',
                'updated_at' => '2023-05-11 16:58:03',
            ),
            18 => 
            array (
                'id' => 19,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-11 17:02:15',
                'updated_at' => '2023-05-11 17:02:15',
            ),
            19 => 
            array (
                'id' => 20,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.43',
                'visit_status' => 0,
                'created_at' => '2023-05-11 17:58:53',
                'updated_at' => '2023-05-11 17:58:53',
            ),
            20 => 
            array (
                'id' => 21,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.143',
                'visit_status' => 0,
                'created_at' => '2023-05-12 01:21:13',
                'updated_at' => '2023-05-12 01:21:13',
            ),
            21 => 
            array (
                'id' => 22,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.139',
                'visit_status' => 0,
                'created_at' => '2023-05-12 02:24:41',
                'updated_at' => '2023-05-12 02:24:41',
            ),
            22 => 
            array (
                'id' => 23,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.42',
                'visit_status' => 0,
                'created_at' => '2023-05-12 14:07:55',
                'updated_at' => '2023-05-12 14:07:55',
            ),
            23 => 
            array (
                'id' => 24,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.33',
                'visit_status' => 0,
                'created_at' => '2023-05-12 14:08:12',
                'updated_at' => '2023-05-12 14:08:12',
            ),
            24 => 
            array (
                'id' => 25,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.42',
                'visit_status' => 0,
                'created_at' => '2023-05-12 14:09:02',
                'updated_at' => '2023-05-12 14:09:02',
            ),
            25 => 
            array (
                'id' => 26,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.31',
                'visit_status' => 0,
                'created_at' => '2023-05-12 14:09:12',
                'updated_at' => '2023-05-12 14:09:12',
            ),
            26 => 
            array (
                'id' => 27,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-12 14:23:14',
                'updated_at' => '2023-05-12 14:23:14',
            ),
            27 => 
            array (
                'id' => 28,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.26',
                'visit_status' => 0,
                'created_at' => '2023-05-12 16:02:55',
                'updated_at' => '2023-05-12 16:02:55',
            ),
            28 => 
            array (
                'id' => 29,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.27',
                'visit_status' => 0,
                'created_at' => '2023-05-12 16:03:29',
                'updated_at' => '2023-05-12 16:03:29',
            ),
            29 => 
            array (
                'id' => 30,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-12 16:03:33',
                'updated_at' => '2023-05-12 16:03:33',
            ),
            30 => 
            array (
                'id' => 31,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.31',
                'visit_status' => 0,
                'created_at' => '2023-05-12 16:04:01',
                'updated_at' => '2023-05-12 16:04:01',
            ),
            31 => 
            array (
                'id' => 32,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.27',
                'visit_status' => 0,
                'created_at' => '2023-05-12 16:04:52',
                'updated_at' => '2023-05-12 16:04:52',
            ),
            32 => 
            array (
                'id' => 33,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-12 16:05:00',
                'updated_at' => '2023-05-12 16:05:00',
            ),
            33 => 
            array (
                'id' => 34,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.26',
                'visit_status' => 0,
                'created_at' => '2023-05-12 17:52:41',
                'updated_at' => '2023-05-12 17:52:41',
            ),
            34 => 
            array (
                'id' => 35,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-12 17:53:18',
                'updated_at' => '2023-05-12 17:53:18',
            ),
            35 => 
            array (
                'id' => 36,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.42',
                'visit_status' => 0,
                'created_at' => '2023-05-12 17:53:21',
                'updated_at' => '2023-05-12 17:53:21',
            ),
            36 => 
            array (
                'id' => 37,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-12 17:53:21',
                'updated_at' => '2023-05-12 17:53:21',
            ),
            37 => 
            array (
                'id' => 38,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-12 17:53:43',
                'updated_at' => '2023-05-12 17:53:43',
            ),
            38 => 
            array (
                'id' => 39,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.43',
                'visit_status' => 0,
                'created_at' => '2023-05-12 17:53:56',
                'updated_at' => '2023-05-12 17:53:56',
            ),
            39 => 
            array (
                'id' => 40,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.42',
                'visit_status' => 0,
                'created_at' => '2023-05-12 17:54:02',
                'updated_at' => '2023-05-12 17:54:02',
            ),
            40 => 
            array (
                'id' => 41,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-12 17:54:02',
                'updated_at' => '2023-05-12 17:54:02',
            ),
            41 => 
            array (
                'id' => 42,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-12 17:54:04',
                'updated_at' => '2023-05-12 17:54:04',
            ),
            42 => 
            array (
                'id' => 43,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-12 17:54:07',
                'updated_at' => '2023-05-12 17:54:07',
            ),
            43 => 
            array (
                'id' => 44,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-12 17:54:29',
                'updated_at' => '2023-05-12 17:54:29',
            ),
            44 => 
            array (
                'id' => 45,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-12 17:54:43',
                'updated_at' => '2023-05-12 17:54:43',
            ),
            45 => 
            array (
                'id' => 46,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-12 17:56:49',
                'updated_at' => '2023-05-12 17:56:49',
            ),
            46 => 
            array (
                'id' => 47,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 17:58:23',
                'updated_at' => '2023-05-12 17:58:23',
            ),
            47 => 
            array (
                'id' => 48,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-12 17:58:24',
                'updated_at' => '2023-05-12 17:58:24',
            ),
            48 => 
            array (
                'id' => 49,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:04:47',
                'updated_at' => '2023-05-12 18:04:47',
            ),
            49 => 
            array (
                'id' => 50,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:07:17',
                'updated_at' => '2023-05-12 18:07:17',
            ),
            50 => 
            array (
                'id' => 51,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:07:41',
                'updated_at' => '2023-05-12 18:07:41',
            ),
            51 => 
            array (
                'id' => 52,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:07:49',
                'updated_at' => '2023-05-12 18:07:49',
            ),
            52 => 
            array (
                'id' => 53,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:08:03',
                'updated_at' => '2023-05-12 18:08:03',
            ),
            53 => 
            array (
                'id' => 54,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:08:07',
                'updated_at' => '2023-05-12 18:08:07',
            ),
            54 => 
            array (
                'id' => 55,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:10:01',
                'updated_at' => '2023-05-12 18:10:01',
            ),
            55 => 
            array (
                'id' => 56,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:10:31',
                'updated_at' => '2023-05-12 18:10:31',
            ),
            56 => 
            array (
                'id' => 57,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.30',
                'visit_status' => 0,
                'created_at' => '2023-05-12 18:10:43',
                'updated_at' => '2023-05-12 18:10:43',
            ),
            57 => 
            array (
                'id' => 58,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.30',
                'visit_status' => 0,
                'created_at' => '2023-05-12 18:10:44',
                'updated_at' => '2023-05-12 18:10:44',
            ),
            58 => 
            array (
                'id' => 59,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:13:51',
                'updated_at' => '2023-05-12 18:13:51',
            ),
            59 => 
            array (
                'id' => 60,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:16:36',
                'updated_at' => '2023-05-12 18:16:36',
            ),
            60 => 
            array (
                'id' => 61,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.32',
                'visit_status' => 0,
                'created_at' => '2023-05-12 18:16:53',
                'updated_at' => '2023-05-12 18:16:53',
            ),
            61 => 
            array (
                'id' => 62,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.32',
                'visit_status' => 0,
                'created_at' => '2023-05-12 18:16:54',
                'updated_at' => '2023-05-12 18:16:54',
            ),
            62 => 
            array (
                'id' => 63,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:16:55',
                'updated_at' => '2023-05-12 18:16:55',
            ),
            63 => 
            array (
                'id' => 64,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.33',
                'visit_status' => 0,
                'created_at' => '2023-05-12 18:17:02',
                'updated_at' => '2023-05-12 18:17:02',
            ),
            64 => 
            array (
                'id' => 65,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.33',
                'visit_status' => 0,
                'created_at' => '2023-05-12 18:17:03',
                'updated_at' => '2023-05-12 18:17:03',
            ),
            65 => 
            array (
                'id' => 66,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 0,
                'created_at' => '2023-05-12 18:17:10',
                'updated_at' => '2023-05-12 18:17:10',
            ),
            66 => 
            array (
                'id' => 67,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:17:51',
                'updated_at' => '2023-05-12 18:17:51',
            ),
            67 => 
            array (
                'id' => 68,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:17:54',
                'updated_at' => '2023-05-12 18:17:54',
            ),
            68 => 
            array (
                'id' => 69,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:18:17',
                'updated_at' => '2023-05-12 18:18:17',
            ),
            69 => 
            array (
                'id' => 70,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:18:23',
                'updated_at' => '2023-05-12 18:18:23',
            ),
            70 => 
            array (
                'id' => 71,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:18:28',
                'updated_at' => '2023-05-12 18:18:28',
            ),
            71 => 
            array (
                'id' => 72,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 0,
                'created_at' => '2023-05-12 18:18:35',
                'updated_at' => '2023-05-12 18:18:35',
            ),
            72 => 
            array (
                'id' => 73,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:18:43',
                'updated_at' => '2023-05-12 18:18:43',
            ),
            73 => 
            array (
                'id' => 74,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:19:19',
                'updated_at' => '2023-05-12 18:19:19',
            ),
            74 => 
            array (
                'id' => 75,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:20:05',
                'updated_at' => '2023-05-12 18:20:05',
            ),
            75 => 
            array (
                'id' => 76,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:20:07',
                'updated_at' => '2023-05-12 18:20:07',
            ),
            76 => 
            array (
                'id' => 77,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:20:09',
                'updated_at' => '2023-05-12 18:20:09',
            ),
            77 => 
            array (
                'id' => 78,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:20:39',
                'updated_at' => '2023-05-12 18:20:39',
            ),
            78 => 
            array (
                'id' => 79,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:20:41',
                'updated_at' => '2023-05-12 18:20:41',
            ),
            79 => 
            array (
                'id' => 80,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:21:00',
                'updated_at' => '2023-05-12 18:21:00',
            ),
            80 => 
            array (
                'id' => 81,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:21:01',
                'updated_at' => '2023-05-12 18:21:01',
            ),
            81 => 
            array (
                'id' => 82,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:21:02',
                'updated_at' => '2023-05-12 18:21:02',
            ),
            82 => 
            array (
                'id' => 83,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:21:09',
                'updated_at' => '2023-05-12 18:21:09',
            ),
            83 => 
            array (
                'id' => 84,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:22:12',
                'updated_at' => '2023-05-12 18:22:12',
            ),
            84 => 
            array (
                'id' => 85,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:22:13',
                'updated_at' => '2023-05-12 18:22:13',
            ),
            85 => 
            array (
                'id' => 86,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:23:17',
                'updated_at' => '2023-05-12 18:23:17',
            ),
            86 => 
            array (
                'id' => 87,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:23:51',
                'updated_at' => '2023-05-12 18:23:51',
            ),
            87 => 
            array (
                'id' => 88,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:23:54',
                'updated_at' => '2023-05-12 18:23:54',
            ),
            88 => 
            array (
                'id' => 89,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:23:56',
                'updated_at' => '2023-05-12 18:23:56',
            ),
            89 => 
            array (
                'id' => 90,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:24:12',
                'updated_at' => '2023-05-12 18:24:12',
            ),
            90 => 
            array (
                'id' => 91,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:27:23',
                'updated_at' => '2023-05-12 18:27:23',
            ),
            91 => 
            array (
                'id' => 92,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:28:57',
                'updated_at' => '2023-05-12 18:28:57',
            ),
            92 => 
            array (
                'id' => 93,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:29:03',
                'updated_at' => '2023-05-12 18:29:03',
            ),
            93 => 
            array (
                'id' => 94,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:32:26',
                'updated_at' => '2023-05-12 18:32:26',
            ),
            94 => 
            array (
                'id' => 95,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:33:32',
                'updated_at' => '2023-05-12 18:33:32',
            ),
            95 => 
            array (
                'id' => 96,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:34:13',
                'updated_at' => '2023-05-12 18:34:13',
            ),
            96 => 
            array (
                'id' => 97,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:34:24',
                'updated_at' => '2023-05-12 18:34:24',
            ),
            97 => 
            array (
                'id' => 98,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:34:36',
                'updated_at' => '2023-05-12 18:34:36',
            ),
            98 => 
            array (
                'id' => 99,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:35:07',
                'updated_at' => '2023-05-12 18:35:07',
            ),
            99 => 
            array (
                'id' => 100,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:42:33',
                'updated_at' => '2023-05-12 18:42:33',
            ),
            100 => 
            array (
                'id' => 101,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:42:48',
                'updated_at' => '2023-05-12 18:42:48',
            ),
            101 => 
            array (
                'id' => 102,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:44:18',
                'updated_at' => '2023-05-12 18:44:18',
            ),
            102 => 
            array (
                'id' => 103,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.31',
                'visit_status' => 0,
                'created_at' => '2023-05-12 18:44:19',
                'updated_at' => '2023-05-12 18:44:19',
            ),
            103 => 
            array (
                'id' => 104,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:44:21',
                'updated_at' => '2023-05-12 18:44:21',
            ),
            104 => 
            array (
                'id' => 105,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:44:38',
                'updated_at' => '2023-05-12 18:44:38',
            ),
            105 => 
            array (
                'id' => 106,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:45:33',
                'updated_at' => '2023-05-12 18:45:33',
            ),
            106 => 
            array (
                'id' => 107,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:45:34',
                'updated_at' => '2023-05-12 18:45:34',
            ),
            107 => 
            array (
                'id' => 108,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:46:44',
                'updated_at' => '2023-05-12 18:46:44',
            ),
            108 => 
            array (
                'id' => 109,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:47:55',
                'updated_at' => '2023-05-12 18:47:55',
            ),
            109 => 
            array (
                'id' => 110,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:48:12',
                'updated_at' => '2023-05-12 18:48:12',
            ),
            110 => 
            array (
                'id' => 111,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:52:37',
                'updated_at' => '2023-05-12 18:52:37',
            ),
            111 => 
            array (
                'id' => 112,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:52:48',
                'updated_at' => '2023-05-12 18:52:48',
            ),
            112 => 
            array (
                'id' => 113,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:52:49',
                'updated_at' => '2023-05-12 18:52:49',
            ),
            113 => 
            array (
                'id' => 114,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:52:49',
                'updated_at' => '2023-05-12 18:52:49',
            ),
            114 => 
            array (
                'id' => 115,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-12 18:52:57',
                'updated_at' => '2023-05-12 18:52:57',
            ),
            115 => 
            array (
                'id' => 116,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-12 19:46:00',
                'updated_at' => '2023-05-12 19:46:00',
            ),
            116 => 
            array (
                'id' => 117,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.42',
                'visit_status' => 0,
                'created_at' => '2023-05-12 19:47:00',
                'updated_at' => '2023-05-12 19:47:00',
            ),
            117 => 
            array (
                'id' => 118,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.142',
                'visit_status' => 0,
                'created_at' => '2023-05-13 22:41:57',
                'updated_at' => '2023-05-13 22:41:57',
            ),
            118 => 
            array (
                'id' => 119,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.142',
                'visit_status' => 1,
                'created_at' => '2023-05-13 22:42:25',
                'updated_at' => '2023-05-13 22:42:25',
            ),
            119 => 
            array (
                'id' => 120,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.142',
                'visit_status' => 1,
                'created_at' => '2023-05-13 22:42:42',
                'updated_at' => '2023-05-13 22:42:42',
            ),
            120 => 
            array (
                'id' => 121,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.142',
                'visit_status' => 1,
                'created_at' => '2023-05-13 22:43:12',
                'updated_at' => '2023-05-13 22:43:12',
            ),
            121 => 
            array (
                'id' => 122,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.139',
                'visit_status' => 1,
                'created_at' => '2023-05-13 22:59:58',
                'updated_at' => '2023-05-13 22:59:58',
            ),
            122 => 
            array (
                'id' => 123,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.139',
                'visit_status' => 1,
                'created_at' => '2023-05-13 23:00:09',
                'updated_at' => '2023-05-13 23:00:09',
            ),
            123 => 
            array (
                'id' => 124,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.143',
                'visit_status' => 1,
                'created_at' => '2023-05-13 23:00:51',
                'updated_at' => '2023-05-13 23:00:51',
            ),
            124 => 
            array (
                'id' => 125,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.142',
                'visit_status' => 1,
                'created_at' => '2023-05-13 23:01:19',
                'updated_at' => '2023-05-13 23:01:19',
            ),
            125 => 
            array (
                'id' => 126,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.136',
                'visit_status' => 1,
                'created_at' => '2023-05-13 23:04:17',
                'updated_at' => '2023-05-13 23:04:17',
            ),
            126 => 
            array (
                'id' => 127,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.138',
                'visit_status' => 0,
                'created_at' => '2023-05-13 23:08:57',
                'updated_at' => '2023-05-13 23:08:57',
            ),
            127 => 
            array (
                'id' => 128,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.136',
                'visit_status' => 1,
                'created_at' => '2023-05-13 23:11:18',
                'updated_at' => '2023-05-13 23:11:18',
            ),
            128 => 
            array (
                'id' => 129,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-14 13:47:41',
                'updated_at' => '2023-05-14 13:47:41',
            ),
            129 => 
            array (
                'id' => 130,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-14 13:47:46',
                'updated_at' => '2023-05-14 13:47:46',
            ),
            130 => 
            array (
                'id' => 131,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-14 13:54:56',
                'updated_at' => '2023-05-14 13:54:56',
            ),
            131 => 
            array (
                'id' => 132,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-14 13:56:28',
                'updated_at' => '2023-05-14 13:56:28',
            ),
            132 => 
            array (
                'id' => 133,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:04:45',
                'updated_at' => '2023-05-14 14:04:45',
            ),
            133 => 
            array (
                'id' => 134,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:05:22',
                'updated_at' => '2023-05-14 14:05:22',
            ),
            134 => 
            array (
                'id' => 135,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:05:28',
                'updated_at' => '2023-05-14 14:05:28',
            ),
            135 => 
            array (
                'id' => 136,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:06:18',
                'updated_at' => '2023-05-14 14:06:18',
            ),
            136 => 
            array (
                'id' => 137,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:18:28',
                'updated_at' => '2023-05-14 14:18:28',
            ),
            137 => 
            array (
                'id' => 138,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:18:38',
                'updated_at' => '2023-05-14 14:18:38',
            ),
            138 => 
            array (
                'id' => 139,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:21:12',
                'updated_at' => '2023-05-14 14:21:12',
            ),
            139 => 
            array (
                'id' => 140,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:25:35',
                'updated_at' => '2023-05-14 14:25:35',
            ),
            140 => 
            array (
                'id' => 141,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:25:36',
                'updated_at' => '2023-05-14 14:25:36',
            ),
            141 => 
            array (
                'id' => 142,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:36:39',
                'updated_at' => '2023-05-14 14:36:39',
            ),
            142 => 
            array (
                'id' => 143,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:36:49',
                'updated_at' => '2023-05-14 14:36:49',
            ),
            143 => 
            array (
                'id' => 144,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:37:54',
                'updated_at' => '2023-05-14 14:37:54',
            ),
            144 => 
            array (
                'id' => 145,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:38:54',
                'updated_at' => '2023-05-14 14:38:54',
            ),
            145 => 
            array (
                'id' => 146,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:39:11',
                'updated_at' => '2023-05-14 14:39:11',
            ),
            146 => 
            array (
                'id' => 147,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.43',
                'visit_status' => 0,
                'created_at' => '2023-05-14 14:44:37',
                'updated_at' => '2023-05-14 14:44:37',
            ),
            147 => 
            array (
                'id' => 148,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:45:13',
                'updated_at' => '2023-05-14 14:45:13',
            ),
            148 => 
            array (
                'id' => 149,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-14 14:45:17',
                'updated_at' => '2023-05-14 14:45:17',
            ),
            149 => 
            array (
                'id' => 150,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.27',
                'visit_status' => 0,
                'created_at' => '2023-05-14 16:16:57',
                'updated_at' => '2023-05-14 16:16:57',
            ),
            150 => 
            array (
                'id' => 151,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.26',
                'visit_status' => 0,
                'created_at' => '2023-05-14 16:27:18',
                'updated_at' => '2023-05-14 16:27:18',
            ),
            151 => 
            array (
                'id' => 152,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.32',
                'visit_status' => 0,
                'created_at' => '2023-05-14 16:27:48',
                'updated_at' => '2023-05-14 16:27:48',
            ),
            152 => 
            array (
                'id' => 153,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-14 16:30:17',
                'updated_at' => '2023-05-14 16:30:17',
            ),
            153 => 
            array (
                'id' => 154,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-14 16:34:41',
                'updated_at' => '2023-05-14 16:34:41',
            ),
            154 => 
            array (
                'id' => 155,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:27:00',
                'updated_at' => '2023-05-14 18:27:00',
            ),
            155 => 
            array (
                'id' => 156,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:27:19',
                'updated_at' => '2023-05-14 18:27:19',
            ),
            156 => 
            array (
                'id' => 157,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:28:04',
                'updated_at' => '2023-05-14 18:28:04',
            ),
            157 => 
            array (
                'id' => 158,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:28:20',
                'updated_at' => '2023-05-14 18:28:20',
            ),
            158 => 
            array (
                'id' => 159,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:28:27',
                'updated_at' => '2023-05-14 18:28:27',
            ),
            159 => 
            array (
                'id' => 160,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:30:10',
                'updated_at' => '2023-05-14 18:30:10',
            ),
            160 => 
            array (
                'id' => 161,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:33:09',
                'updated_at' => '2023-05-14 18:33:09',
            ),
            161 => 
            array (
                'id' => 162,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:38:26',
                'updated_at' => '2023-05-14 18:38:26',
            ),
            162 => 
            array (
                'id' => 163,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:38:46',
                'updated_at' => '2023-05-14 18:38:46',
            ),
            163 => 
            array (
                'id' => 164,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:40:10',
                'updated_at' => '2023-05-14 18:40:10',
            ),
            164 => 
            array (
                'id' => 165,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:40:10',
                'updated_at' => '2023-05-14 18:40:10',
            ),
            165 => 
            array (
                'id' => 166,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:41:42',
                'updated_at' => '2023-05-14 18:41:42',
            ),
            166 => 
            array (
                'id' => 167,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:46:09',
                'updated_at' => '2023-05-14 18:46:09',
            ),
            167 => 
            array (
                'id' => 168,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-14 18:46:25',
                'updated_at' => '2023-05-14 18:46:25',
            ),
            168 => 
            array (
                'id' => 169,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.32',
                'visit_status' => 0,
                'created_at' => '2023-05-14 18:59:02',
                'updated_at' => '2023-05-14 18:59:02',
            ),
            169 => 
            array (
                'id' => 170,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:05:57',
                'updated_at' => '2023-05-14 19:05:57',
            ),
            170 => 
            array (
                'id' => 171,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:07:14',
                'updated_at' => '2023-05-14 19:07:14',
            ),
            171 => 
            array (
                'id' => 172,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:10:06',
                'updated_at' => '2023-05-14 19:10:06',
            ),
            172 => 
            array (
                'id' => 173,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:10:23',
                'updated_at' => '2023-05-14 19:10:23',
            ),
            173 => 
            array (
                'id' => 174,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:15:53',
                'updated_at' => '2023-05-14 19:15:53',
            ),
            174 => 
            array (
                'id' => 175,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:26:33',
                'updated_at' => '2023-05-14 19:26:33',
            ),
            175 => 
            array (
                'id' => 176,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:26:42',
                'updated_at' => '2023-05-14 19:26:42',
            ),
            176 => 
            array (
                'id' => 177,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:27:00',
                'updated_at' => '2023-05-14 19:27:00',
            ),
            177 => 
            array (
                'id' => 178,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:31:52',
                'updated_at' => '2023-05-14 19:31:52',
            ),
            178 => 
            array (
                'id' => 179,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:33:18',
                'updated_at' => '2023-05-14 19:33:18',
            ),
            179 => 
            array (
                'id' => 180,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:34:47',
                'updated_at' => '2023-05-14 19:34:47',
            ),
            180 => 
            array (
                'id' => 181,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:36:56',
                'updated_at' => '2023-05-14 19:36:56',
            ),
            181 => 
            array (
                'id' => 182,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:37:14',
                'updated_at' => '2023-05-14 19:37:14',
            ),
            182 => 
            array (
                'id' => 183,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:38:20',
                'updated_at' => '2023-05-14 19:38:20',
            ),
            183 => 
            array (
                'id' => 184,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:42:49',
                'updated_at' => '2023-05-14 19:42:49',
            ),
            184 => 
            array (
                'id' => 185,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:44:17',
                'updated_at' => '2023-05-14 19:44:17',
            ),
            185 => 
            array (
                'id' => 186,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-14 19:51:41',
                'updated_at' => '2023-05-14 19:51:41',
            ),
            186 => 
            array (
                'id' => 187,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-14 21:03:22',
                'updated_at' => '2023-05-14 21:03:22',
            ),
            187 => 
            array (
                'id' => 188,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-14 21:09:35',
                'updated_at' => '2023-05-14 21:09:35',
            ),
            188 => 
            array (
                'id' => 189,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-14 21:09:37',
                'updated_at' => '2023-05-14 21:09:37',
            ),
            189 => 
            array (
                'id' => 190,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-14 21:10:58',
                'updated_at' => '2023-05-14 21:10:58',
            ),
            190 => 
            array (
                'id' => 191,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-14 21:17:38',
                'updated_at' => '2023-05-14 21:17:38',
            ),
            191 => 
            array (
                'id' => 192,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-14 21:20:45',
                'updated_at' => '2023-05-14 21:20:45',
            ),
            192 => 
            array (
                'id' => 193,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-15 11:55:39',
                'updated_at' => '2023-05-15 11:55:39',
            ),
            193 => 
            array (
                'id' => 194,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-15 11:55:44',
                'updated_at' => '2023-05-15 11:55:44',
            ),
            194 => 
            array (
                'id' => 195,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-15 14:15:14',
                'updated_at' => '2023-05-15 14:15:14',
            ),
            195 => 
            array (
                'id' => 196,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:13:45',
                'updated_at' => '2023-05-15 15:13:45',
            ),
            196 => 
            array (
                'id' => 197,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:13:54',
                'updated_at' => '2023-05-15 15:13:54',
            ),
            197 => 
            array (
                'id' => 198,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:15:07',
                'updated_at' => '2023-05-15 15:15:07',
            ),
            198 => 
            array (
                'id' => 199,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:15:12',
                'updated_at' => '2023-05-15 15:15:12',
            ),
            199 => 
            array (
                'id' => 200,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:15:21',
                'updated_at' => '2023-05-15 15:15:21',
            ),
            200 => 
            array (
                'id' => 201,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:15:25',
                'updated_at' => '2023-05-15 15:15:25',
            ),
            201 => 
            array (
                'id' => 202,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:16:33',
                'updated_at' => '2023-05-15 15:16:33',
            ),
            202 => 
            array (
                'id' => 203,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:16:33',
                'updated_at' => '2023-05-15 15:16:33',
            ),
            203 => 
            array (
                'id' => 204,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:26:06',
                'updated_at' => '2023-05-15 15:26:06',
            ),
            204 => 
            array (
                'id' => 205,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:26:08',
                'updated_at' => '2023-05-15 15:26:08',
            ),
            205 => 
            array (
                'id' => 206,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:26:11',
                'updated_at' => '2023-05-15 15:26:11',
            ),
            206 => 
            array (
                'id' => 207,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:26:13',
                'updated_at' => '2023-05-15 15:26:13',
            ),
            207 => 
            array (
                'id' => 208,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:26:58',
                'updated_at' => '2023-05-15 15:26:58',
            ),
            208 => 
            array (
                'id' => 209,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-15 15:39:07',
                'updated_at' => '2023-05-15 15:39:07',
            ),
            209 => 
            array (
                'id' => 210,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-15 16:47:24',
                'updated_at' => '2023-05-15 16:47:24',
            ),
            210 => 
            array (
                'id' => 211,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-15 16:52:50',
                'updated_at' => '2023-05-15 16:52:50',
            ),
            211 => 
            array (
                'id' => 212,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-15 16:57:23',
                'updated_at' => '2023-05-15 16:57:23',
            ),
            212 => 
            array (
                'id' => 213,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-15 16:58:06',
                'updated_at' => '2023-05-15 16:58:06',
            ),
            213 => 
            array (
                'id' => 214,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-15 16:58:13',
                'updated_at' => '2023-05-15 16:58:13',
            ),
            214 => 
            array (
                'id' => 215,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-15 17:29:47',
                'updated_at' => '2023-05-15 17:29:47',
            ),
            215 => 
            array (
                'id' => 216,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-15 17:30:27',
                'updated_at' => '2023-05-15 17:30:27',
            ),
            216 => 
            array (
                'id' => 217,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-15 17:32:47',
                'updated_at' => '2023-05-15 17:32:47',
            ),
            217 => 
            array (
                'id' => 218,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-15 17:38:13',
                'updated_at' => '2023-05-15 17:38:13',
            ),
            218 => 
            array (
                'id' => 219,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-15 17:40:46',
                'updated_at' => '2023-05-15 17:40:46',
            ),
            219 => 
            array (
                'id' => 220,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-15 17:40:51',
                'updated_at' => '2023-05-15 17:40:51',
            ),
            220 => 
            array (
                'id' => 221,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-15 17:47:25',
                'updated_at' => '2023-05-15 17:47:25',
            ),
            221 => 
            array (
                'id' => 222,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-15 17:48:07',
                'updated_at' => '2023-05-15 17:48:07',
            ),
            222 => 
            array (
                'id' => 223,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-15 17:53:45',
                'updated_at' => '2023-05-15 17:53:45',
            ),
            223 => 
            array (
                'id' => 224,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-15 17:58:49',
                'updated_at' => '2023-05-15 17:58:49',
            ),
            224 => 
            array (
                'id' => 225,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-15 18:00:36',
                'updated_at' => '2023-05-15 18:00:36',
            ),
            225 => 
            array (
                'id' => 226,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-15 18:22:02',
                'updated_at' => '2023-05-15 18:22:02',
            ),
            226 => 
            array (
                'id' => 227,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-15 18:23:20',
                'updated_at' => '2023-05-15 18:23:20',
            ),
            227 => 
            array (
                'id' => 228,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-15 18:49:39',
                'updated_at' => '2023-05-15 18:49:39',
            ),
            228 => 
            array (
                'id' => 229,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-15 18:55:04',
                'updated_at' => '2023-05-15 18:55:04',
            ),
            229 => 
            array (
                'id' => 230,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-15 19:26:55',
                'updated_at' => '2023-05-15 19:26:55',
            ),
            230 => 
            array (
                'id' => 231,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-15 19:37:34',
                'updated_at' => '2023-05-15 19:37:34',
            ),
            231 => 
            array (
                'id' => 232,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-15 19:46:40',
                'updated_at' => '2023-05-15 19:46:40',
            ),
            232 => 
            array (
                'id' => 233,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-15 19:52:02',
                'updated_at' => '2023-05-15 19:52:02',
            ),
            233 => 
            array (
                'id' => 234,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-15 20:30:18',
                'updated_at' => '2023-05-15 20:30:18',
            ),
            234 => 
            array (
                'id' => 235,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-15 20:48:12',
                'updated_at' => '2023-05-15 20:48:12',
            ),
            235 => 
            array (
                'id' => 236,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-15 21:10:21',
                'updated_at' => '2023-05-15 21:10:21',
            ),
            236 => 
            array (
                'id' => 237,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-16 00:38:50',
                'updated_at' => '2023-05-16 00:38:50',
            ),
            237 => 
            array (
                'id' => 238,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-16 14:08:41',
                'updated_at' => '2023-05-16 14:08:41',
            ),
            238 => 
            array (
                'id' => 239,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-16 14:29:38',
                'updated_at' => '2023-05-16 14:29:38',
            ),
            239 => 
            array (
                'id' => 240,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-16 16:04:57',
                'updated_at' => '2023-05-16 16:04:57',
            ),
            240 => 
            array (
                'id' => 241,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-16 16:06:37',
                'updated_at' => '2023-05-16 16:06:37',
            ),
            241 => 
            array (
                'id' => 242,
                'vacancy_id' => 5,
                'ip_address' => '172.71.202.153',
                'visit_status' => 0,
                'created_at' => '2023-05-16 16:13:02',
                'updated_at' => '2023-05-16 16:13:02',
            ),
            242 => 
            array (
                'id' => 243,
                'vacancy_id' => 5,
                'ip_address' => '162.158.235.78',
                'visit_status' => 0,
                'created_at' => '2023-05-16 16:32:15',
                'updated_at' => '2023-05-16 16:32:15',
            ),
            243 => 
            array (
                'id' => 244,
                'vacancy_id' => 5,
                'ip_address' => '162.158.235.73',
                'visit_status' => 0,
                'created_at' => '2023-05-16 16:38:41',
                'updated_at' => '2023-05-16 16:38:41',
            ),
            244 => 
            array (
                'id' => 245,
                'vacancy_id' => 4,
                'ip_address' => '162.158.235.73',
                'visit_status' => 0,
                'created_at' => '2023-05-16 16:38:45',
                'updated_at' => '2023-05-16 16:38:45',
            ),
            245 => 
            array (
                'id' => 246,
                'vacancy_id' => 4,
                'ip_address' => '162.158.235.74',
                'visit_status' => 0,
                'created_at' => '2023-05-16 16:38:57',
                'updated_at' => '2023-05-16 16:38:57',
            ),
            246 => 
            array (
                'id' => 247,
                'vacancy_id' => 10,
                'ip_address' => '162.158.235.73',
                'visit_status' => 0,
                'created_at' => '2023-05-16 16:39:02',
                'updated_at' => '2023-05-16 16:39:02',
            ),
            247 => 
            array (
                'id' => 248,
                'vacancy_id' => 10,
                'ip_address' => '162.158.235.73',
                'visit_status' => 1,
                'created_at' => '2023-05-16 16:39:16',
                'updated_at' => '2023-05-16 16:39:16',
            ),
            248 => 
            array (
                'id' => 249,
                'vacancy_id' => 5,
                'ip_address' => '162.158.235.74',
                'visit_status' => 0,
                'created_at' => '2023-05-16 16:39:19',
                'updated_at' => '2023-05-16 16:39:19',
            ),
            249 => 
            array (
                'id' => 250,
                'vacancy_id' => 5,
                'ip_address' => '172.71.198.180',
                'visit_status' => 0,
                'created_at' => '2023-05-16 16:40:14',
                'updated_at' => '2023-05-16 16:40:14',
            ),
            250 => 
            array (
                'id' => 251,
                'vacancy_id' => 5,
                'ip_address' => '162.158.48.75',
                'visit_status' => 0,
                'created_at' => '2023-05-16 16:41:16',
                'updated_at' => '2023-05-16 16:41:16',
            ),
            251 => 
            array (
                'id' => 252,
                'vacancy_id' => 5,
                'ip_address' => '172.71.202.138',
                'visit_status' => 0,
                'created_at' => '2023-05-16 16:46:24',
                'updated_at' => '2023-05-16 16:46:24',
            ),
            252 => 
            array (
                'id' => 253,
                'vacancy_id' => 4,
                'ip_address' => '172.70.219.151',
                'visit_status' => 0,
                'created_at' => '2023-05-16 17:28:21',
                'updated_at' => '2023-05-16 17:28:21',
            ),
            253 => 
            array (
                'id' => 254,
                'vacancy_id' => 10,
                'ip_address' => '172.70.219.147',
                'visit_status' => 0,
                'created_at' => '2023-05-16 17:34:16',
                'updated_at' => '2023-05-16 17:34:16',
            ),
            254 => 
            array (
                'id' => 255,
                'vacancy_id' => 10,
                'ip_address' => '172.70.219.148',
                'visit_status' => 0,
                'created_at' => '2023-05-16 17:34:17',
                'updated_at' => '2023-05-16 17:34:17',
            ),
            255 => 
            array (
                'id' => 256,
                'vacancy_id' => 10,
                'ip_address' => '162.158.163.60',
                'visit_status' => 0,
                'created_at' => '2023-05-16 17:43:33',
                'updated_at' => '2023-05-16 17:43:33',
            ),
            256 => 
            array (
                'id' => 257,
                'vacancy_id' => 4,
                'ip_address' => '162.158.227.125',
                'visit_status' => 0,
                'created_at' => '2023-05-16 18:27:19',
                'updated_at' => '2023-05-16 18:27:19',
            ),
            257 => 
            array (
                'id' => 258,
                'vacancy_id' => 4,
                'ip_address' => '172.71.202.117',
                'visit_status' => 0,
                'created_at' => '2023-05-16 18:30:37',
                'updated_at' => '2023-05-16 18:30:37',
            ),
            258 => 
            array (
                'id' => 259,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.140',
                'visit_status' => 0,
                'created_at' => '2023-05-16 19:01:19',
                'updated_at' => '2023-05-16 19:01:19',
            ),
            259 => 
            array (
                'id' => 260,
                'vacancy_id' => 4,
                'ip_address' => '172.70.218.99',
                'visit_status' => 0,
                'created_at' => '2023-05-16 19:28:31',
                'updated_at' => '2023-05-16 19:28:31',
            ),
            260 => 
            array (
                'id' => 261,
                'vacancy_id' => 10,
                'ip_address' => '172.71.202.139',
                'visit_status' => 0,
                'created_at' => '2023-05-16 19:30:35',
                'updated_at' => '2023-05-16 19:30:35',
            ),
            261 => 
            array (
                'id' => 262,
                'vacancy_id' => 10,
                'ip_address' => '162.158.235.153',
                'visit_status' => 0,
                'created_at' => '2023-05-16 19:49:51',
                'updated_at' => '2023-05-16 19:49:51',
            ),
            262 => 
            array (
                'id' => 263,
                'vacancy_id' => 10,
                'ip_address' => '162.158.235.46',
                'visit_status' => 0,
                'created_at' => '2023-05-16 19:51:32',
                'updated_at' => '2023-05-16 19:51:32',
            ),
            263 => 
            array (
                'id' => 264,
                'vacancy_id' => 10,
                'ip_address' => '172.71.198.63',
                'visit_status' => 0,
                'created_at' => '2023-05-16 19:54:32',
                'updated_at' => '2023-05-16 19:54:32',
            ),
            264 => 
            array (
                'id' => 265,
                'vacancy_id' => 4,
                'ip_address' => '172.70.218.98',
                'visit_status' => 0,
                'created_at' => '2023-05-16 19:55:15',
                'updated_at' => '2023-05-16 19:55:15',
            ),
            265 => 
            array (
                'id' => 266,
                'vacancy_id' => 10,
                'ip_address' => '172.70.219.148',
                'visit_status' => 1,
                'created_at' => '2023-05-16 19:58:23',
                'updated_at' => '2023-05-16 19:58:23',
            ),
            266 => 
            array (
                'id' => 267,
                'vacancy_id' => 4,
                'ip_address' => '162.158.235.73',
                'visit_status' => 1,
                'created_at' => '2023-05-16 20:23:13',
                'updated_at' => '2023-05-16 20:23:13',
            ),
            267 => 
            array (
                'id' => 268,
                'vacancy_id' => 4,
                'ip_address' => '162.158.235.74',
                'visit_status' => 1,
                'created_at' => '2023-05-16 20:23:21',
                'updated_at' => '2023-05-16 20:23:21',
            ),
            268 => 
            array (
                'id' => 269,
                'vacancy_id' => 10,
                'ip_address' => '172.71.198.181',
                'visit_status' => 0,
                'created_at' => '2023-05-16 20:37:14',
                'updated_at' => '2023-05-16 20:37:14',
            ),
            269 => 
            array (
                'id' => 270,
                'vacancy_id' => 4,
                'ip_address' => '172.70.218.111',
                'visit_status' => 0,
                'created_at' => '2023-05-16 20:39:32',
                'updated_at' => '2023-05-16 20:39:32',
            ),
            270 => 
            array (
                'id' => 271,
                'vacancy_id' => 4,
                'ip_address' => '172.70.218.111',
                'visit_status' => 1,
                'created_at' => '2023-05-16 20:39:33',
                'updated_at' => '2023-05-16 20:39:33',
            ),
            271 => 
            array (
                'id' => 272,
                'vacancy_id' => 4,
                'ip_address' => '172.71.198.180',
                'visit_status' => 0,
                'created_at' => '2023-05-16 20:43:10',
                'updated_at' => '2023-05-16 20:43:10',
            ),
            272 => 
            array (
                'id' => 273,
                'vacancy_id' => 10,
                'ip_address' => '172.70.218.98',
                'visit_status' => 0,
                'created_at' => '2023-05-16 20:57:56',
                'updated_at' => '2023-05-16 20:57:56',
            ),
            273 => 
            array (
                'id' => 274,
                'vacancy_id' => 10,
                'ip_address' => '172.70.218.99',
                'visit_status' => 0,
                'created_at' => '2023-05-16 20:58:06',
                'updated_at' => '2023-05-16 20:58:06',
            ),
            274 => 
            array (
                'id' => 275,
                'vacancy_id' => 10,
                'ip_address' => '172.70.218.98',
                'visit_status' => 1,
                'created_at' => '2023-05-16 20:58:10',
                'updated_at' => '2023-05-16 20:58:10',
            ),
            275 => 
            array (
                'id' => 276,
                'vacancy_id' => 4,
                'ip_address' => '172.71.231.136',
                'visit_status' => 0,
                'created_at' => '2023-05-17 12:05:08',
                'updated_at' => '2023-05-17 12:05:08',
            ),
            276 => 
            array (
                'id' => 277,
                'vacancy_id' => 4,
                'ip_address' => '172.71.231.140',
                'visit_status' => 0,
                'created_at' => '2023-05-17 12:05:15',
                'updated_at' => '2023-05-17 12:05:15',
            ),
            277 => 
            array (
                'id' => 278,
                'vacancy_id' => 4,
                'ip_address' => '172.71.202.3',
                'visit_status' => 0,
                'created_at' => '2023-05-17 14:15:25',
                'updated_at' => '2023-05-17 14:15:25',
            ),
            278 => 
            array (
                'id' => 279,
                'vacancy_id' => 4,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-17 20:07:48',
                'updated_at' => '2023-05-17 20:07:48',
            ),
            279 => 
            array (
                'id' => 280,
                'vacancy_id' => 7,
                'ip_address' => '172.69.77.32',
                'visit_status' => 0,
                'created_at' => '2023-05-18 13:18:40',
                'updated_at' => '2023-05-18 13:18:40',
            ),
            280 => 
            array (
                'id' => 281,
                'vacancy_id' => 6,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-18 13:19:02',
                'updated_at' => '2023-05-18 13:19:02',
            ),
            281 => 
            array (
                'id' => 282,
                'vacancy_id' => 7,
                'ip_address' => '172.69.77.26',
                'visit_status' => 0,
                'created_at' => '2023-05-18 13:19:17',
                'updated_at' => '2023-05-18 13:19:17',
            ),
            282 => 
            array (
                'id' => 283,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.26',
                'visit_status' => 0,
                'created_at' => '2023-05-18 13:19:32',
                'updated_at' => '2023-05-18 13:19:32',
            ),
            283 => 
            array (
                'id' => 284,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.33',
                'visit_status' => 0,
                'created_at' => '2023-05-18 13:20:51',
                'updated_at' => '2023-05-18 13:20:51',
            ),
            284 => 
            array (
                'id' => 285,
                'vacancy_id' => 1,
                'ip_address' => '172.69.77.30',
                'visit_status' => 0,
                'created_at' => '2023-05-18 13:25:22',
                'updated_at' => '2023-05-18 13:25:22',
            ),
            285 => 
            array (
                'id' => 286,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.138',
                'visit_status' => 0,
                'created_at' => '2023-05-18 13:25:44',
                'updated_at' => '2023-05-18 13:25:44',
            ),
            286 => 
            array (
                'id' => 287,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.145',
                'visit_status' => 0,
                'created_at' => '2023-05-18 13:26:23',
                'updated_at' => '2023-05-18 13:26:23',
            ),
            287 => 
            array (
                'id' => 288,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.144',
                'visit_status' => 0,
                'created_at' => '2023-05-18 13:38:21',
                'updated_at' => '2023-05-18 13:38:21',
            ),
            288 => 
            array (
                'id' => 289,
                'vacancy_id' => 4,
                'ip_address' => '172.68.203.144',
                'visit_status' => 0,
                'created_at' => '2023-05-18 13:38:39',
                'updated_at' => '2023-05-18 13:38:39',
            ),
            289 => 
            array (
                'id' => 290,
                'vacancy_id' => 5,
                'ip_address' => '172.68.203.145',
                'visit_status' => 0,
                'created_at' => '2023-05-18 13:38:54',
                'updated_at' => '2023-05-18 13:38:54',
            ),
            290 => 
            array (
                'id' => 291,
                'vacancy_id' => 4,
                'ip_address' => '172.68.203.139',
                'visit_status' => 0,
                'created_at' => '2023-05-18 13:39:42',
                'updated_at' => '2023-05-18 13:39:42',
            ),
            291 => 
            array (
                'id' => 292,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'created_at' => '2023-05-18 13:46:24',
                'updated_at' => '2023-05-18 13:46:24',
            ),
            292 => 
            array (
                'id' => 293,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.145',
                'visit_status' => 1,
                'created_at' => '2023-05-18 13:54:37',
                'updated_at' => '2023-05-18 13:54:37',
            ),
            293 => 
            array (
                'id' => 294,
                'vacancy_id' => 5,
                'ip_address' => '172.68.203.144',
                'visit_status' => 0,
                'created_at' => '2023-05-18 14:06:03',
                'updated_at' => '2023-05-18 14:06:03',
            ),
            294 => 
            array (
                'id' => 295,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.145',
                'visit_status' => 1,
                'created_at' => '2023-05-18 15:13:52',
                'updated_at' => '2023-05-18 15:13:52',
            ),
            295 => 
            array (
                'id' => 296,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.145',
                'visit_status' => 1,
                'created_at' => '2023-05-18 15:13:55',
                'updated_at' => '2023-05-18 15:13:55',
            ),
            296 => 
            array (
                'id' => 297,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.43',
                'visit_status' => 0,
                'created_at' => '2023-05-19 14:09:38',
                'updated_at' => '2023-05-19 14:09:38',
            ),
            297 => 
            array (
                'id' => 298,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-19 14:11:03',
                'updated_at' => '2023-05-19 14:11:03',
            ),
            298 => 
            array (
                'id' => 299,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-19 14:23:40',
                'updated_at' => '2023-05-19 14:23:40',
            ),
            299 => 
            array (
                'id' => 300,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-19 14:24:11',
                'updated_at' => '2023-05-19 14:24:11',
            ),
            300 => 
            array (
                'id' => 301,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-19 14:24:27',
                'updated_at' => '2023-05-19 14:24:27',
            ),
            301 => 
            array (
                'id' => 302,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-19 16:00:05',
                'updated_at' => '2023-05-19 16:00:05',
            ),
            302 => 
            array (
                'id' => 303,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.32',
                'visit_status' => 0,
                'created_at' => '2023-05-19 19:44:16',
                'updated_at' => '2023-05-19 19:44:16',
            ),
            303 => 
            array (
                'id' => 304,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.33',
                'visit_status' => 0,
                'created_at' => '2023-05-19 19:44:37',
                'updated_at' => '2023-05-19 19:44:37',
            ),
            304 => 
            array (
                'id' => 305,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-19 19:45:03',
                'updated_at' => '2023-05-19 19:45:03',
            ),
            305 => 
            array (
                'id' => 306,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-19 19:45:12',
                'updated_at' => '2023-05-19 19:45:12',
            ),
            306 => 
            array (
                'id' => 307,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-19 19:45:15',
                'updated_at' => '2023-05-19 19:45:15',
            ),
            307 => 
            array (
                'id' => 308,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-19 19:45:40',
                'updated_at' => '2023-05-19 19:45:40',
            ),
            308 => 
            array (
                'id' => 309,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-19 19:45:51',
                'updated_at' => '2023-05-19 19:45:51',
            ),
            309 => 
            array (
                'id' => 310,
                'vacancy_id' => 1,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-20 14:33:28',
                'updated_at' => '2023-05-20 14:33:28',
            ),
            310 => 
            array (
                'id' => 311,
                'vacancy_id' => 1,
                'ip_address' => '172.69.77.33',
                'visit_status' => 0,
                'created_at' => '2023-05-20 14:34:22',
                'updated_at' => '2023-05-20 14:34:22',
            ),
            311 => 
            array (
                'id' => 312,
                'vacancy_id' => 1,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-20 14:34:41',
                'updated_at' => '2023-05-20 14:34:41',
            ),
            312 => 
            array (
                'id' => 313,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-20 14:41:07',
                'updated_at' => '2023-05-20 14:41:07',
            ),
            313 => 
            array (
                'id' => 314,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-20 14:43:01',
                'updated_at' => '2023-05-20 14:43:01',
            ),
            314 => 
            array (
                'id' => 315,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-20 14:43:07',
                'updated_at' => '2023-05-20 14:43:07',
            ),
            315 => 
            array (
                'id' => 316,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-20 14:43:46',
                'updated_at' => '2023-05-20 14:43:46',
            ),
            316 => 
            array (
                'id' => 317,
                'vacancy_id' => 1,
                'ip_address' => '172.69.77.27',
                'visit_status' => 0,
                'created_at' => '2023-05-20 14:56:15',
                'updated_at' => '2023-05-20 14:56:15',
            ),
            317 => 
            array (
                'id' => 318,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.30',
                'visit_status' => 0,
                'created_at' => '2023-05-20 15:04:00',
                'updated_at' => '2023-05-20 15:04:00',
            ),
            318 => 
            array (
                'id' => 319,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-20 15:04:02',
                'updated_at' => '2023-05-20 15:04:02',
            ),
            319 => 
            array (
                'id' => 320,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-20 15:17:14',
                'updated_at' => '2023-05-20 15:17:14',
            ),
            320 => 
            array (
                'id' => 321,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-20 15:37:51',
                'updated_at' => '2023-05-20 15:37:51',
            ),
            321 => 
            array (
                'id' => 322,
                'vacancy_id' => 1,
                'ip_address' => '172.69.77.26',
                'visit_status' => 0,
                'created_at' => '2023-05-20 17:16:38',
                'updated_at' => '2023-05-20 17:16:38',
            ),
            322 => 
            array (
                'id' => 323,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'created_at' => '2023-05-20 17:34:25',
                'updated_at' => '2023-05-20 17:34:25',
            ),
            323 => 
            array (
                'id' => 324,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'created_at' => '2023-05-20 17:34:30',
                'updated_at' => '2023-05-20 17:34:30',
            ),
            324 => 
            array (
                'id' => 325,
                'vacancy_id' => 1,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-20 18:01:52',
                'updated_at' => '2023-05-20 18:01:52',
            ),
            325 => 
            array (
                'id' => 326,
                'vacancy_id' => 1,
                'ip_address' => '172.69.77.31',
                'visit_status' => 0,
                'created_at' => '2023-05-20 19:36:57',
                'updated_at' => '2023-05-20 19:36:57',
            ),
            326 => 
            array (
                'id' => 327,
                'vacancy_id' => 3,
                'ip_address' => '172.69.77.33',
                'visit_status' => 0,
                'created_at' => '2023-05-21 14:08:36',
                'updated_at' => '2023-05-21 14:08:36',
            ),
            327 => 
            array (
                'id' => 328,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-21 16:16:06',
                'updated_at' => '2023-05-21 16:16:06',
            ),
            328 => 
            array (
                'id' => 329,
                'vacancy_id' => 1,
                'ip_address' => '172.68.203.145',
                'visit_status' => 0,
                'created_at' => '2023-05-21 17:16:07',
                'updated_at' => '2023-05-21 17:16:07',
            ),
            329 => 
            array (
                'id' => 330,
                'vacancy_id' => 2,
                'ip_address' => '172.68.203.145',
                'visit_status' => 0,
                'created_at' => '2023-05-21 17:16:29',
                'updated_at' => '2023-05-21 17:16:29',
            ),
            330 => 
            array (
                'id' => 331,
                'vacancy_id' => 2,
                'ip_address' => '172.68.203.144',
                'visit_status' => 0,
                'created_at' => '2023-05-21 17:17:11',
                'updated_at' => '2023-05-21 17:17:11',
            ),
            331 => 
            array (
                'id' => 332,
                'vacancy_id' => 2,
                'ip_address' => '172.68.203.139',
                'visit_status' => 0,
                'created_at' => '2023-05-21 17:17:43',
                'updated_at' => '2023-05-21 17:17:43',
            ),
            332 => 
            array (
                'id' => 333,
                'vacancy_id' => 2,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'created_at' => '2023-05-21 17:28:02',
                'updated_at' => '2023-05-21 17:28:02',
            ),
            333 => 
            array (
                'id' => 334,
                'vacancy_id' => 2,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'created_at' => '2023-05-22 12:22:01',
                'updated_at' => '2023-05-22 12:22:01',
            ),
            334 => 
            array (
                'id' => 335,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.43',
                'visit_status' => 0,
                'created_at' => '2023-05-22 13:24:51',
                'updated_at' => '2023-05-22 13:24:51',
            ),
            335 => 
            array (
                'id' => 336,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.27',
                'visit_status' => 0,
                'created_at' => '2023-05-22 13:34:44',
                'updated_at' => '2023-05-22 13:34:44',
            ),
            336 => 
            array (
                'id' => 337,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-22 14:45:53',
                'updated_at' => '2023-05-22 14:45:53',
            ),
            337 => 
            array (
                'id' => 338,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-22 14:49:15',
                'updated_at' => '2023-05-22 14:49:15',
            ),
            338 => 
            array (
                'id' => 339,
                'vacancy_id' => 6,
                'ip_address' => '172.69.183.138',
                'visit_status' => 0,
                'created_at' => '2023-05-22 14:49:23',
                'updated_at' => '2023-05-22 14:49:23',
            ),
            339 => 
            array (
                'id' => 340,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.30',
                'visit_status' => 0,
                'created_at' => '2023-05-22 14:50:20',
                'updated_at' => '2023-05-22 14:50:20',
            ),
            340 => 
            array (
                'id' => 341,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-22 15:06:48',
                'updated_at' => '2023-05-22 15:06:48',
            ),
            341 => 
            array (
                'id' => 342,
                'vacancy_id' => 6,
                'ip_address' => '172.69.183.137',
                'visit_status' => 0,
                'created_at' => '2023-05-22 15:20:56',
                'updated_at' => '2023-05-22 15:20:56',
            ),
            342 => 
            array (
                'id' => 343,
                'vacancy_id' => 6,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-05-22 15:24:31',
                'updated_at' => '2023-05-22 15:24:31',
            ),
            343 => 
            array (
                'id' => 344,
                'vacancy_id' => 6,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-22 18:06:56',
                'updated_at' => '2023-05-22 18:06:56',
            ),
            344 => 
            array (
                'id' => 345,
                'vacancy_id' => 6,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-22 18:07:08',
                'updated_at' => '2023-05-22 18:07:08',
            ),
            345 => 
            array (
                'id' => 346,
                'vacancy_id' => 6,
                'ip_address' => '172.69.77.26',
                'visit_status' => 0,
                'created_at' => '2023-05-22 18:07:17',
                'updated_at' => '2023-05-22 18:07:17',
            ),
            346 => 
            array (
                'id' => 347,
                'vacancy_id' => 6,
                'ip_address' => '172.69.77.43',
                'visit_status' => 0,
                'created_at' => '2023-05-22 18:08:35',
                'updated_at' => '2023-05-22 18:08:35',
            ),
            347 => 
            array (
                'id' => 348,
                'vacancy_id' => 7,
                'ip_address' => '172.69.77.31',
                'visit_status' => 0,
                'created_at' => '2023-05-22 18:08:40',
                'updated_at' => '2023-05-22 18:08:40',
            ),
            348 => 
            array (
                'id' => 349,
                'vacancy_id' => 7,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-22 18:09:32',
                'updated_at' => '2023-05-22 18:09:32',
            ),
            349 => 
            array (
                'id' => 350,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.31',
                'visit_status' => 0,
                'created_at' => '2023-05-22 18:09:37',
                'updated_at' => '2023-05-22 18:09:37',
            ),
            350 => 
            array (
                'id' => 351,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-22 18:09:45',
                'updated_at' => '2023-05-22 18:09:45',
            ),
            351 => 
            array (
                'id' => 352,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-22 18:09:49',
                'updated_at' => '2023-05-22 18:09:49',
            ),
            352 => 
            array (
                'id' => 353,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-05-22 18:10:31',
                'updated_at' => '2023-05-22 18:10:31',
            ),
            353 => 
            array (
                'id' => 354,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.43',
                'visit_status' => 0,
                'created_at' => '2023-05-22 18:10:39',
                'updated_at' => '2023-05-22 18:10:39',
            ),
            354 => 
            array (
                'id' => 355,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-22 19:01:42',
                'updated_at' => '2023-05-22 19:01:42',
            ),
            355 => 
            array (
                'id' => 356,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-22 19:03:54',
                'updated_at' => '2023-05-22 19:03:54',
            ),
            356 => 
            array (
                'id' => 357,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-22 19:03:56',
                'updated_at' => '2023-05-22 19:03:56',
            ),
            357 => 
            array (
                'id' => 358,
                'vacancy_id' => 6,
                'ip_address' => '172.69.77.33',
                'visit_status' => 0,
                'created_at' => '2023-05-22 20:20:57',
                'updated_at' => '2023-05-22 20:20:57',
            ),
            358 => 
            array (
                'id' => 359,
                'vacancy_id' => 6,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-22 20:21:20',
                'updated_at' => '2023-05-22 20:21:20',
            ),
            359 => 
            array (
                'id' => 360,
                'vacancy_id' => 8,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-22 20:21:27',
                'updated_at' => '2023-05-22 20:21:27',
            ),
            360 => 
            array (
                'id' => 361,
                'vacancy_id' => 7,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-22 20:21:56',
                'updated_at' => '2023-05-22 20:21:56',
            ),
            361 => 
            array (
                'id' => 362,
                'vacancy_id' => 7,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-22 20:22:13',
                'updated_at' => '2023-05-22 20:22:13',
            ),
            362 => 
            array (
                'id' => 363,
                'vacancy_id' => 7,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-22 20:22:29',
                'updated_at' => '2023-05-22 20:22:29',
            ),
            363 => 
            array (
                'id' => 364,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-22 20:22:35',
                'updated_at' => '2023-05-22 20:22:35',
            ),
            364 => 
            array (
                'id' => 365,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-22 20:23:02',
                'updated_at' => '2023-05-22 20:23:02',
            ),
            365 => 
            array (
                'id' => 366,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-05-22 20:23:06',
                'updated_at' => '2023-05-22 20:23:06',
            ),
            366 => 
            array (
                'id' => 367,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-24 22:17:48',
                'updated_at' => '2023-05-24 22:17:48',
            ),
            367 => 
            array (
                'id' => 368,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-24 22:19:51',
                'updated_at' => '2023-05-24 22:19:51',
            ),
            368 => 
            array (
                'id' => 369,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-05-25 13:47:39',
                'updated_at' => '2023-05-25 13:47:39',
            ),
            369 => 
            array (
                'id' => 370,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-25 13:48:14',
                'updated_at' => '2023-05-25 13:48:14',
            ),
            370 => 
            array (
                'id' => 371,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-25 13:50:08',
                'updated_at' => '2023-05-25 13:50:08',
            ),
            371 => 
            array (
                'id' => 372,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-25 13:55:13',
                'updated_at' => '2023-05-25 13:55:13',
            ),
            372 => 
            array (
                'id' => 373,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-25 13:59:22',
                'updated_at' => '2023-05-25 13:59:22',
            ),
            373 => 
            array (
                'id' => 374,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-05-25 13:59:35',
                'updated_at' => '2023-05-25 13:59:35',
            ),
            374 => 
            array (
                'id' => 375,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-05-25 15:07:05',
                'updated_at' => '2023-05-25 15:07:05',
            ),
            375 => 
            array (
                'id' => 376,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-05-25 15:08:13',
                'updated_at' => '2023-05-25 15:08:13',
            ),
            376 => 
            array (
                'id' => 377,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-05-25 15:08:28',
                'updated_at' => '2023-05-25 15:08:28',
            ),
            377 => 
            array (
                'id' => 378,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'created_at' => '2023-05-25 15:15:04',
                'updated_at' => '2023-05-25 15:15:04',
            ),
            378 => 
            array (
                'id' => 379,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'created_at' => '2023-05-25 15:24:52',
                'updated_at' => '2023-05-25 15:24:52',
            ),
            379 => 
            array (
                'id' => 380,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.138',
                'visit_status' => 1,
                'created_at' => '2023-05-25 15:25:01',
                'updated_at' => '2023-05-25 15:25:01',
            ),
            380 => 
            array (
                'id' => 381,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.134',
                'visit_status' => 0,
                'created_at' => '2023-05-25 17:29:40',
                'updated_at' => '2023-05-25 17:29:40',
            ),
            381 => 
            array (
                'id' => 382,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.145',
                'visit_status' => 1,
                'created_at' => '2023-05-25 17:35:06',
                'updated_at' => '2023-05-25 17:35:06',
            ),
            382 => 
            array (
                'id' => 383,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.145',
                'visit_status' => 1,
                'created_at' => '2023-05-25 17:35:40',
                'updated_at' => '2023-05-25 17:35:40',
            ),
            383 => 
            array (
                'id' => 384,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.138',
                'visit_status' => 1,
                'created_at' => '2023-05-25 17:41:41',
                'updated_at' => '2023-05-25 17:41:41',
            ),
            384 => 
            array (
                'id' => 385,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'created_at' => '2023-05-25 17:45:35',
                'updated_at' => '2023-05-25 17:45:35',
            ),
            385 => 
            array (
                'id' => 386,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.145',
                'visit_status' => 1,
                'created_at' => '2023-05-25 17:54:32',
                'updated_at' => '2023-05-25 17:54:32',
            ),
            386 => 
            array (
                'id' => 387,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.145',
                'visit_status' => 1,
                'created_at' => '2023-05-25 17:54:41',
                'updated_at' => '2023-05-25 17:54:41',
            ),
            387 => 
            array (
                'id' => 388,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.139',
                'visit_status' => 0,
                'created_at' => '2023-05-25 17:55:12',
                'updated_at' => '2023-05-25 17:55:12',
            ),
            388 => 
            array (
                'id' => 389,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.138',
                'visit_status' => 1,
                'created_at' => '2023-05-25 17:55:19',
                'updated_at' => '2023-05-25 17:55:19',
            ),
            389 => 
            array (
                'id' => 390,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.135',
                'visit_status' => 0,
                'created_at' => '2023-05-25 17:57:52',
                'updated_at' => '2023-05-25 17:57:52',
            ),
            390 => 
            array (
                'id' => 391,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.135',
                'visit_status' => 1,
                'created_at' => '2023-05-25 19:20:46',
                'updated_at' => '2023-05-25 19:20:46',
            ),
            391 => 
            array (
                'id' => 392,
                'vacancy_id' => 8,
                'ip_address' => '172.68.203.134',
                'visit_status' => 1,
                'created_at' => '2023-05-25 19:20:50',
                'updated_at' => '2023-05-25 19:20:50',
            ),
            392 => 
            array (
                'id' => 393,
                'vacancy_id' => 2,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-05-25 20:14:10',
                'updated_at' => '2023-05-25 20:14:10',
            ),
            393 => 
            array (
                'id' => 394,
                'vacancy_id' => 2,
                'ip_address' => '162.158.94.75',
                'visit_status' => 0,
                'created_at' => '2023-05-30 12:07:41',
                'updated_at' => '2023-05-30 12:07:41',
            ),
            394 => 
            array (
                'id' => 395,
                'vacancy_id' => 8,
                'ip_address' => '172.71.231.138',
                'visit_status' => 1,
                'created_at' => '2023-05-30 16:13:17',
                'updated_at' => '2023-05-30 16:13:17',
            ),
            395 => 
            array (
                'id' => 396,
                'vacancy_id' => 2,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'created_at' => '2023-05-30 16:14:18',
                'updated_at' => '2023-05-30 16:14:18',
            ),
            396 => 
            array (
                'id' => 397,
                'vacancy_id' => 2,
                'ip_address' => '172.68.203.134',
                'visit_status' => 0,
                'created_at' => '2023-05-30 17:10:41',
                'updated_at' => '2023-05-30 17:10:41',
            ),
            397 => 
            array (
                'id' => 398,
                'vacancy_id' => 2,
                'ip_address' => '172.68.203.139',
                'visit_status' => 1,
                'created_at' => '2023-05-30 17:58:54',
                'updated_at' => '2023-05-30 17:58:54',
            ),
            398 => 
            array (
                'id' => 399,
                'vacancy_id' => 2,
                'ip_address' => '172.68.203.135',
                'visit_status' => 0,
                'created_at' => '2023-05-30 18:22:14',
                'updated_at' => '2023-05-30 18:22:14',
            ),
            399 => 
            array (
                'id' => 400,
                'vacancy_id' => 2,
                'ip_address' => '172.68.203.134',
                'visit_status' => 1,
                'created_at' => '2023-05-30 18:22:18',
                'updated_at' => '2023-05-30 18:22:18',
            ),
            400 => 
            array (
                'id' => 401,
                'vacancy_id' => 2,
                'ip_address' => '172.68.203.135',
                'visit_status' => 1,
                'created_at' => '2023-05-30 18:22:19',
                'updated_at' => '2023-05-30 18:22:19',
            ),
            401 => 
            array (
                'id' => 402,
                'vacancy_id' => 2,
                'ip_address' => '172.68.203.134',
                'visit_status' => 1,
                'created_at' => '2023-05-30 18:22:21',
                'updated_at' => '2023-05-30 18:22:21',
            ),
            402 => 
            array (
                'id' => 403,
                'vacancy_id' => 2,
                'ip_address' => '172.68.203.135',
                'visit_status' => 1,
                'created_at' => '2023-05-30 18:22:39',
                'updated_at' => '2023-05-30 18:22:39',
            ),
            403 => 
            array (
                'id' => 404,
                'vacancy_id' => 8,
                'ip_address' => '172.70.218.125',
                'visit_status' => 0,
                'created_at' => '2023-06-02 11:50:49',
                'updated_at' => '2023-06-02 11:50:49',
            ),
            404 => 
            array (
                'id' => 405,
                'vacancy_id' => 9,
                'ip_address' => '172.70.218.124',
                'visit_status' => 0,
                'created_at' => '2023-06-02 11:51:15',
                'updated_at' => '2023-06-02 11:51:15',
            ),
            405 => 
            array (
                'id' => 406,
                'vacancy_id' => 8,
                'ip_address' => '172.70.218.164',
                'visit_status' => 0,
                'created_at' => '2023-06-02 19:51:06',
                'updated_at' => '2023-06-02 19:51:06',
            ),
            406 => 
            array (
                'id' => 407,
                'vacancy_id' => 8,
                'ip_address' => '172.70.218.164',
                'visit_status' => 1,
                'created_at' => '2023-06-02 19:51:13',
                'updated_at' => '2023-06-02 19:51:13',
            ),
            407 => 
            array (
                'id' => 408,
                'vacancy_id' => 9,
                'ip_address' => '172.70.218.164',
                'visit_status' => 0,
                'created_at' => '2023-06-02 19:51:20',
                'updated_at' => '2023-06-02 19:51:20',
            ),
            408 => 
            array (
                'id' => 409,
                'vacancy_id' => 8,
                'ip_address' => '172.70.218.164',
                'visit_status' => 1,
                'created_at' => '2023-06-02 19:51:25',
                'updated_at' => '2023-06-02 19:51:25',
            ),
            409 => 
            array (
                'id' => 410,
                'vacancy_id' => 10,
                'ip_address' => '172.70.218.165',
                'visit_status' => 0,
                'created_at' => '2023-06-02 19:51:26',
                'updated_at' => '2023-06-02 19:51:26',
            ),
            410 => 
            array (
                'id' => 411,
                'vacancy_id' => 8,
                'ip_address' => '172.70.250.121',
                'visit_status' => 0,
                'created_at' => '2023-06-03 01:30:34',
                'updated_at' => '2023-06-03 01:30:34',
            ),
            411 => 
            array (
                'id' => 412,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-06-05 15:49:15',
                'updated_at' => '2023-06-05 15:49:15',
            ),
            412 => 
            array (
                'id' => 413,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-06-05 16:03:01',
                'updated_at' => '2023-06-05 16:03:01',
            ),
            413 => 
            array (
                'id' => 414,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-06-07 15:34:23',
                'updated_at' => '2023-06-07 15:34:23',
            ),
            414 => 
            array (
                'id' => 415,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-06-07 15:35:09',
                'updated_at' => '2023-06-07 15:35:09',
            ),
            415 => 
            array (
                'id' => 416,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-06-08 22:33:14',
                'updated_at' => '2023-06-08 22:33:14',
            ),
            416 => 
            array (
                'id' => 417,
                'vacancy_id' => 10,
                'ip_address' => '172.68.203.134',
                'visit_status' => 0,
                'created_at' => '2023-06-09 10:03:40',
                'updated_at' => '2023-06-09 10:03:40',
            ),
            417 => 
            array (
                'id' => 418,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-06-09 12:36:25',
                'updated_at' => '2023-06-09 12:36:25',
            ),
            418 => 
            array (
                'id' => 419,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-06-09 12:37:08',
                'updated_at' => '2023-06-09 12:37:08',
            ),
            419 => 
            array (
                'id' => 420,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-06-09 12:38:24',
                'updated_at' => '2023-06-09 12:38:24',
            ),
            420 => 
            array (
                'id' => 421,
                'vacancy_id' => 10,
                'ip_address' => '172.68.203.138',
                'visit_status' => 0,
                'created_at' => '2023-06-09 22:16:53',
                'updated_at' => '2023-06-09 22:16:53',
            ),
            421 => 
            array (
                'id' => 422,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-06-11 12:22:17',
                'updated_at' => '2023-06-11 12:22:17',
            ),
            422 => 
            array (
                'id' => 423,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-06-11 12:22:28',
                'updated_at' => '2023-06-11 12:22:28',
            ),
            423 => 
            array (
                'id' => 424,
                'vacancy_id' => 10,
                'ip_address' => '172.70.243.3',
                'visit_status' => 0,
                'created_at' => '2023-06-11 19:54:38',
                'updated_at' => '2023-06-11 19:54:38',
            ),
            424 => 
            array (
                'id' => 425,
                'vacancy_id' => 8,
                'ip_address' => '172.70.250.23',
                'visit_status' => 0,
                'created_at' => '2023-06-12 13:44:58',
                'updated_at' => '2023-06-12 13:44:58',
            ),
            425 => 
            array (
                'id' => 426,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 0,
                'created_at' => '2023-06-13 12:21:28',
                'updated_at' => '2023-06-13 12:21:28',
            ),
            426 => 
            array (
                'id' => 427,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 0,
                'created_at' => '2023-06-13 12:29:04',
                'updated_at' => '2023-06-13 12:29:04',
            ),
            427 => 
            array (
                'id' => 428,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-13 12:30:15',
                'updated_at' => '2023-06-13 12:30:15',
            ),
            428 => 
            array (
                'id' => 429,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-06-13 15:01:28',
                'updated_at' => '2023-06-13 15:01:28',
            ),
            429 => 
            array (
                'id' => 430,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-06-13 20:12:28',
                'updated_at' => '2023-06-13 20:12:28',
            ),
            430 => 
            array (
                'id' => 431,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-06-13 20:13:37',
                'updated_at' => '2023-06-13 20:13:37',
            ),
            431 => 
            array (
                'id' => 432,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.132',
                'visit_status' => 0,
                'created_at' => '2023-06-14 12:07:33',
                'updated_at' => '2023-06-14 12:07:33',
            ),
            432 => 
            array (
                'id' => 433,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.133',
                'visit_status' => 0,
                'created_at' => '2023-06-14 12:07:53',
                'updated_at' => '2023-06-14 12:07:53',
            ),
            433 => 
            array (
                'id' => 434,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.133',
                'visit_status' => 1,
                'created_at' => '2023-06-14 12:08:19',
                'updated_at' => '2023-06-14 12:08:19',
            ),
            434 => 
            array (
                'id' => 435,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.133',
                'visit_status' => 1,
                'created_at' => '2023-06-14 12:08:27',
                'updated_at' => '2023-06-14 12:08:27',
            ),
            435 => 
            array (
                'id' => 436,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.132',
                'visit_status' => 1,
                'created_at' => '2023-06-14 12:08:35',
                'updated_at' => '2023-06-14 12:08:35',
            ),
            436 => 
            array (
                'id' => 437,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.132',
                'visit_status' => 1,
                'created_at' => '2023-06-14 12:08:43',
                'updated_at' => '2023-06-14 12:08:43',
            ),
            437 => 
            array (
                'id' => 438,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 0,
                'created_at' => '2023-06-14 12:20:05',
                'updated_at' => '2023-06-14 12:20:05',
            ),
            438 => 
            array (
                'id' => 439,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 12:20:30',
                'updated_at' => '2023-06-14 12:20:30',
            ),
            439 => 
            array (
                'id' => 440,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 12:26:09',
                'updated_at' => '2023-06-14 12:26:09',
            ),
            440 => 
            array (
                'id' => 441,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 0,
                'created_at' => '2023-06-14 12:26:18',
                'updated_at' => '2023-06-14 12:26:18',
            ),
            441 => 
            array (
                'id' => 442,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 12:26:56',
                'updated_at' => '2023-06-14 12:26:56',
            ),
            442 => 
            array (
                'id' => 443,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:11:23',
                'updated_at' => '2023-06-14 21:11:23',
            ),
            443 => 
            array (
                'id' => 444,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:11:25',
                'updated_at' => '2023-06-14 21:11:25',
            ),
            444 => 
            array (
                'id' => 445,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:11:52',
                'updated_at' => '2023-06-14 21:11:52',
            ),
            445 => 
            array (
                'id' => 446,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:12:09',
                'updated_at' => '2023-06-14 21:12:09',
            ),
            446 => 
            array (
                'id' => 447,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:12:15',
                'updated_at' => '2023-06-14 21:12:15',
            ),
            447 => 
            array (
                'id' => 448,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:12:26',
                'updated_at' => '2023-06-14 21:12:26',
            ),
            448 => 
            array (
                'id' => 449,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:12:37',
                'updated_at' => '2023-06-14 21:12:37',
            ),
            449 => 
            array (
                'id' => 450,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:13:06',
                'updated_at' => '2023-06-14 21:13:06',
            ),
            450 => 
            array (
                'id' => 451,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:13:21',
                'updated_at' => '2023-06-14 21:13:21',
            ),
            451 => 
            array (
                'id' => 452,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:13:29',
                'updated_at' => '2023-06-14 21:13:29',
            ),
            452 => 
            array (
                'id' => 453,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:13:45',
                'updated_at' => '2023-06-14 21:13:45',
            ),
            453 => 
            array (
                'id' => 454,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:14:13',
                'updated_at' => '2023-06-14 21:14:13',
            ),
            454 => 
            array (
                'id' => 455,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:14:17',
                'updated_at' => '2023-06-14 21:14:17',
            ),
            455 => 
            array (
                'id' => 456,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:14:31',
                'updated_at' => '2023-06-14 21:14:31',
            ),
            456 => 
            array (
                'id' => 457,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:14:32',
                'updated_at' => '2023-06-14 21:14:32',
            ),
            457 => 
            array (
                'id' => 458,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:15:00',
                'updated_at' => '2023-06-14 21:15:00',
            ),
            458 => 
            array (
                'id' => 459,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:15:02',
                'updated_at' => '2023-06-14 21:15:02',
            ),
            459 => 
            array (
                'id' => 460,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:15:15',
                'updated_at' => '2023-06-14 21:15:15',
            ),
            460 => 
            array (
                'id' => 461,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:15:43',
                'updated_at' => '2023-06-14 21:15:43',
            ),
            461 => 
            array (
                'id' => 462,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:15:47',
                'updated_at' => '2023-06-14 21:15:47',
            ),
            462 => 
            array (
                'id' => 463,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:15:48',
                'updated_at' => '2023-06-14 21:15:48',
            ),
            463 => 
            array (
                'id' => 464,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:15:59',
                'updated_at' => '2023-06-14 21:15:59',
            ),
            464 => 
            array (
                'id' => 465,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.132',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:16:33',
                'updated_at' => '2023-06-14 21:16:33',
            ),
            465 => 
            array (
                'id' => 466,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.132',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:16:49',
                'updated_at' => '2023-06-14 21:16:49',
            ),
            466 => 
            array (
                'id' => 467,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.132',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:16:52',
                'updated_at' => '2023-06-14 21:16:52',
            ),
            467 => 
            array (
                'id' => 468,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.132',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:16:54',
                'updated_at' => '2023-06-14 21:16:54',
            ),
            468 => 
            array (
                'id' => 469,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:17:30',
                'updated_at' => '2023-06-14 21:17:30',
            ),
            469 => 
            array (
                'id' => 470,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:17:35',
                'updated_at' => '2023-06-14 21:17:35',
            ),
            470 => 
            array (
                'id' => 471,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:18:02',
                'updated_at' => '2023-06-14 21:18:02',
            ),
            471 => 
            array (
                'id' => 472,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:18:15',
                'updated_at' => '2023-06-14 21:18:15',
            ),
            472 => 
            array (
                'id' => 473,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:18:36',
                'updated_at' => '2023-06-14 21:18:36',
            ),
            473 => 
            array (
                'id' => 474,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:18:48',
                'updated_at' => '2023-06-14 21:18:48',
            ),
            474 => 
            array (
                'id' => 475,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:20:04',
                'updated_at' => '2023-06-14 21:20:04',
            ),
            475 => 
            array (
                'id' => 476,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:20:12',
                'updated_at' => '2023-06-14 21:20:12',
            ),
            476 => 
            array (
                'id' => 477,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:20:36',
                'updated_at' => '2023-06-14 21:20:36',
            ),
            477 => 
            array (
                'id' => 478,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:20:47',
                'updated_at' => '2023-06-14 21:20:47',
            ),
            478 => 
            array (
                'id' => 479,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:20:56',
                'updated_at' => '2023-06-14 21:20:56',
            ),
            479 => 
            array (
                'id' => 480,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:21:13',
                'updated_at' => '2023-06-14 21:21:13',
            ),
            480 => 
            array (
                'id' => 481,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:21:14',
                'updated_at' => '2023-06-14 21:21:14',
            ),
            481 => 
            array (
                'id' => 482,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:22:30',
                'updated_at' => '2023-06-14 21:22:30',
            ),
            482 => 
            array (
                'id' => 483,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:23:01',
                'updated_at' => '2023-06-14 21:23:01',
            ),
            483 => 
            array (
                'id' => 484,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:23:17',
                'updated_at' => '2023-06-14 21:23:17',
            ),
            484 => 
            array (
                'id' => 485,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:23:25',
                'updated_at' => '2023-06-14 21:23:25',
            ),
            485 => 
            array (
                'id' => 486,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:23:34',
                'updated_at' => '2023-06-14 21:23:34',
            ),
            486 => 
            array (
                'id' => 487,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:23:55',
                'updated_at' => '2023-06-14 21:23:55',
            ),
            487 => 
            array (
                'id' => 488,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:25:28',
                'updated_at' => '2023-06-14 21:25:28',
            ),
            488 => 
            array (
                'id' => 489,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.132',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:26:06',
                'updated_at' => '2023-06-14 21:26:06',
            ),
            489 => 
            array (
                'id' => 490,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.133',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:26:09',
                'updated_at' => '2023-06-14 21:26:09',
            ),
            490 => 
            array (
                'id' => 491,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.133',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:26:34',
                'updated_at' => '2023-06-14 21:26:34',
            ),
            491 => 
            array (
                'id' => 492,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:27:17',
                'updated_at' => '2023-06-14 21:27:17',
            ),
            492 => 
            array (
                'id' => 493,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:27:18',
                'updated_at' => '2023-06-14 21:27:18',
            ),
            493 => 
            array (
                'id' => 494,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:28:26',
                'updated_at' => '2023-06-14 21:28:26',
            ),
            494 => 
            array (
                'id' => 495,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:28:30',
                'updated_at' => '2023-06-14 21:28:30',
            ),
            495 => 
            array (
                'id' => 496,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:28:39',
                'updated_at' => '2023-06-14 21:28:39',
            ),
            496 => 
            array (
                'id' => 497,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:29:04',
                'updated_at' => '2023-06-14 21:29:04',
            ),
            497 => 
            array (
                'id' => 498,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:29:07',
                'updated_at' => '2023-06-14 21:29:07',
            ),
            498 => 
            array (
                'id' => 499,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:32:40',
                'updated_at' => '2023-06-14 21:32:40',
            ),
            499 => 
            array (
                'id' => 500,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:32:46',
                'updated_at' => '2023-06-14 21:32:46',
            ),
        ));
        \DB::table('vacancy_visits')->insert(array (
            0 => 
            array (
                'id' => 501,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:33:18',
                'updated_at' => '2023-06-14 21:33:18',
            ),
            1 => 
            array (
                'id' => 502,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:33:21',
                'updated_at' => '2023-06-14 21:33:21',
            ),
            2 => 
            array (
                'id' => 503,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:33:27',
                'updated_at' => '2023-06-14 21:33:27',
            ),
            3 => 
            array (
                'id' => 504,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:33:32',
                'updated_at' => '2023-06-14 21:33:32',
            ),
            4 => 
            array (
                'id' => 505,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:33:37',
                'updated_at' => '2023-06-14 21:33:37',
            ),
            5 => 
            array (
                'id' => 506,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:33:49',
                'updated_at' => '2023-06-14 21:33:49',
            ),
            6 => 
            array (
                'id' => 507,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:33:58',
                'updated_at' => '2023-06-14 21:33:58',
            ),
            7 => 
            array (
                'id' => 508,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:34:01',
                'updated_at' => '2023-06-14 21:34:01',
            ),
            8 => 
            array (
                'id' => 509,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:34:14',
                'updated_at' => '2023-06-14 21:34:14',
            ),
            9 => 
            array (
                'id' => 510,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:34:15',
                'updated_at' => '2023-06-14 21:34:15',
            ),
            10 => 
            array (
                'id' => 511,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:34:18',
                'updated_at' => '2023-06-14 21:34:18',
            ),
            11 => 
            array (
                'id' => 512,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:34:27',
                'updated_at' => '2023-06-14 21:34:27',
            ),
            12 => 
            array (
                'id' => 513,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:34:37',
                'updated_at' => '2023-06-14 21:34:37',
            ),
            13 => 
            array (
                'id' => 514,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:34:40',
                'updated_at' => '2023-06-14 21:34:40',
            ),
            14 => 
            array (
                'id' => 515,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:34:44',
                'updated_at' => '2023-06-14 21:34:44',
            ),
            15 => 
            array (
                'id' => 516,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:34:46',
                'updated_at' => '2023-06-14 21:34:46',
            ),
            16 => 
            array (
                'id' => 517,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:34:48',
                'updated_at' => '2023-06-14 21:34:48',
            ),
            17 => 
            array (
                'id' => 518,
                'vacancy_id' => 10,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'created_at' => '2023-06-14 21:35:45',
                'updated_at' => '2023-06-14 21:35:45',
            ),
            18 => 
            array (
                'id' => 519,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-06-15 16:26:37',
                'updated_at' => '2023-06-15 16:26:37',
            ),
            19 => 
            array (
                'id' => 520,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-06-15 16:27:09',
                'updated_at' => '2023-06-15 16:27:09',
            ),
            20 => 
            array (
                'id' => 521,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.139',
                'visit_status' => 0,
                'created_at' => '2023-06-16 19:15:01',
                'updated_at' => '2023-06-16 19:15:01',
            ),
            21 => 
            array (
                'id' => 522,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.138',
                'visit_status' => 0,
                'created_at' => '2023-06-16 19:15:22',
                'updated_at' => '2023-06-16 19:15:22',
            ),
            22 => 
            array (
                'id' => 523,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.139',
                'visit_status' => 1,
                'created_at' => '2023-06-16 19:16:21',
                'updated_at' => '2023-06-16 19:16:21',
            ),
            23 => 
            array (
                'id' => 524,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.138',
                'visit_status' => 1,
                'created_at' => '2023-06-16 19:16:26',
                'updated_at' => '2023-06-16 19:16:26',
            ),
            24 => 
            array (
                'id' => 525,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.138',
                'visit_status' => 1,
                'created_at' => '2023-06-16 19:16:41',
                'updated_at' => '2023-06-16 19:16:41',
            ),
            25 => 
            array (
                'id' => 526,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.139',
                'visit_status' => 1,
                'created_at' => '2023-06-16 19:17:47',
                'updated_at' => '2023-06-16 19:17:47',
            ),
            26 => 
            array (
                'id' => 527,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.136',
                'visit_status' => 0,
                'created_at' => '2023-06-16 21:58:02',
                'updated_at' => '2023-06-16 21:58:02',
            ),
            27 => 
            array (
                'id' => 528,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.136',
                'visit_status' => 1,
                'created_at' => '2023-06-16 21:58:41',
                'updated_at' => '2023-06-16 21:58:41',
            ),
            28 => 
            array (
                'id' => 529,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.137',
                'visit_status' => 0,
                'created_at' => '2023-06-16 21:59:42',
                'updated_at' => '2023-06-16 21:59:42',
            ),
            29 => 
            array (
                'id' => 530,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.137',
                'visit_status' => 1,
                'created_at' => '2023-06-16 21:59:44',
                'updated_at' => '2023-06-16 21:59:44',
            ),
            30 => 
            array (
                'id' => 531,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.137',
                'visit_status' => 1,
                'created_at' => '2023-06-16 22:01:23',
                'updated_at' => '2023-06-16 22:01:23',
            ),
            31 => 
            array (
                'id' => 532,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.137',
                'visit_status' => 1,
                'created_at' => '2023-06-16 22:02:10',
                'updated_at' => '2023-06-16 22:02:10',
            ),
            32 => 
            array (
                'id' => 533,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.137',
                'visit_status' => 1,
                'created_at' => '2023-06-16 22:02:11',
                'updated_at' => '2023-06-16 22:02:11',
            ),
            33 => 
            array (
                'id' => 534,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.136',
                'visit_status' => 1,
                'created_at' => '2023-06-16 22:02:48',
                'updated_at' => '2023-06-16 22:02:48',
            ),
            34 => 
            array (
                'id' => 535,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.136',
                'visit_status' => 1,
                'created_at' => '2023-06-16 22:02:53',
                'updated_at' => '2023-06-16 22:02:53',
            ),
            35 => 
            array (
                'id' => 536,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.136',
                'visit_status' => 1,
                'created_at' => '2023-06-16 22:04:23',
                'updated_at' => '2023-06-16 22:04:23',
            ),
            36 => 
            array (
                'id' => 537,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.136',
                'visit_status' => 1,
                'created_at' => '2023-06-16 22:09:16',
                'updated_at' => '2023-06-16 22:09:16',
            ),
            37 => 
            array (
                'id' => 538,
                'vacancy_id' => 10,
                'ip_address' => '172.71.231.136',
                'visit_status' => 1,
                'created_at' => '2023-06-16 22:11:44',
                'updated_at' => '2023-06-16 22:11:44',
            ),
            38 => 
            array (
                'id' => 539,
                'vacancy_id' => 10,
                'ip_address' => '172.68.203.145',
                'visit_status' => 0,
                'created_at' => '2023-06-18 19:02:31',
                'updated_at' => '2023-06-18 19:02:31',
            ),
            39 => 
            array (
                'id' => 540,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-06-19 07:55:47',
                'updated_at' => '2023-06-19 07:55:47',
            ),
            40 => 
            array (
                'id' => 541,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-06-19 07:55:59',
                'updated_at' => '2023-06-19 07:55:59',
            ),
            41 => 
            array (
                'id' => 542,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-06-19 11:49:45',
                'updated_at' => '2023-06-19 11:49:45',
            ),
            42 => 
            array (
                'id' => 543,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-06-19 11:50:35',
                'updated_at' => '2023-06-19 11:50:35',
            ),
            43 => 
            array (
                'id' => 544,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-06-19 11:51:01',
                'updated_at' => '2023-06-19 11:51:01',
            ),
            44 => 
            array (
                'id' => 545,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-06-19 11:51:52',
                'updated_at' => '2023-06-19 11:51:52',
            ),
            45 => 
            array (
                'id' => 546,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-06-19 11:52:09',
                'updated_at' => '2023-06-19 11:52:09',
            ),
            46 => 
            array (
                'id' => 547,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-06-23 12:15:49',
                'updated_at' => '2023-06-23 12:15:49',
            ),
            47 => 
            array (
                'id' => 548,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-06-23 12:16:24',
                'updated_at' => '2023-06-23 12:16:24',
            ),
            48 => 
            array (
                'id' => 549,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'created_at' => '2023-06-25 14:42:43',
                'updated_at' => '2023-06-25 14:42:43',
            ),
            49 => 
            array (
                'id' => 550,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-06-25 14:42:59',
                'updated_at' => '2023-06-25 14:42:59',
            ),
            50 => 
            array (
                'id' => 551,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-06-25 14:43:41',
                'updated_at' => '2023-06-25 14:43:41',
            ),
            51 => 
            array (
                'id' => 552,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'created_at' => '2023-06-25 14:43:43',
                'updated_at' => '2023-06-25 14:43:43',
            ),
            52 => 
            array (
                'id' => 553,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'created_at' => '2023-06-26 13:33:09',
                'updated_at' => '2023-06-26 13:33:09',
            ),
            53 => 
            array (
                'id' => 554,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-06-26 13:34:05',
                'updated_at' => '2023-06-26 13:34:05',
            ),
            54 => 
            array (
                'id' => 555,
                'vacancy_id' => 5,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'created_at' => '2023-06-28 09:02:28',
                'updated_at' => '2023-06-28 09:02:28',
            ),
            55 => 
            array (
                'id' => 556,
                'vacancy_id' => 5,
                'ip_address' => '172.69.183.132',
                'visit_status' => 0,
                'created_at' => '2023-06-29 12:57:58',
                'updated_at' => '2023-06-29 12:57:58',
            ),
            56 => 
            array (
                'id' => 557,
                'vacancy_id' => 5,
                'ip_address' => '172.69.183.133',
                'visit_status' => 0,
                'created_at' => '2023-06-29 12:58:35',
                'updated_at' => '2023-06-29 12:58:35',
            ),
            57 => 
            array (
                'id' => 558,
                'vacancy_id' => 5,
                'ip_address' => '172.69.183.132',
                'visit_status' => 1,
                'created_at' => '2023-06-29 12:58:59',
                'updated_at' => '2023-06-29 12:58:59',
            ),
            58 => 
            array (
                'id' => 559,
                'vacancy_id' => 5,
                'ip_address' => '172.69.183.132',
                'visit_status' => 1,
                'created_at' => '2023-06-29 12:59:14',
                'updated_at' => '2023-06-29 12:59:14',
            ),
            59 => 
            array (
                'id' => 560,
                'vacancy_id' => 5,
                'ip_address' => '172.69.183.132',
                'visit_status' => 1,
                'created_at' => '2023-06-29 12:59:43',
                'updated_at' => '2023-06-29 12:59:43',
            ),
            60 => 
            array (
                'id' => 561,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'created_at' => '2023-07-02 10:10:50',
                'updated_at' => '2023-07-02 10:10:50',
            ),
            61 => 
            array (
                'id' => 562,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-07-04 20:14:23',
                'updated_at' => '2023-07-04 20:14:23',
            ),
            62 => 
            array (
                'id' => 563,
                'vacancy_id' => 10,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'created_at' => '2023-07-04 20:14:47',
                'updated_at' => '2023-07-04 20:14:47',
            ),
            63 => 
            array (
                'id' => 564,
                'vacancy_id' => 10,
                'ip_address' => '162.158.158.209',
                'visit_status' => 0,
                'created_at' => '2023-07-05 03:41:57',
                'updated_at' => '2023-07-05 03:41:57',
            ),
            64 => 
            array (
                'id' => 565,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-07-09 10:58:48',
                'updated_at' => '2023-07-09 10:58:48',
            ),
            65 => 
            array (
                'id' => 566,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'created_at' => '2023-07-09 11:01:13',
                'updated_at' => '2023-07-09 11:01:13',
            ),
            66 => 
            array (
                'id' => 567,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-07-09 11:01:46',
                'updated_at' => '2023-07-09 11:01:46',
            ),
            67 => 
            array (
                'id' => 568,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-07-09 11:01:53',
                'updated_at' => '2023-07-09 11:01:53',
            ),
            68 => 
            array (
                'id' => 569,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'created_at' => '2023-07-09 11:02:01',
                'updated_at' => '2023-07-09 11:02:01',
            ),
            69 => 
            array (
                'id' => 570,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.31',
                'visit_status' => 0,
                'created_at' => '2023-07-09 11:06:28',
                'updated_at' => '2023-07-09 11:06:28',
            ),
            70 => 
            array (
                'id' => 571,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.30',
                'visit_status' => 0,
                'created_at' => '2023-07-09 11:06:54',
                'updated_at' => '2023-07-09 11:06:54',
            ),
            71 => 
            array (
                'id' => 572,
                'vacancy_id' => 9,
                'ip_address' => '172.69.77.27',
                'visit_status' => 0,
                'created_at' => '2023-07-09 11:13:25',
                'updated_at' => '2023-07-09 11:13:25',
            ),
        ));
        
        
    }
}
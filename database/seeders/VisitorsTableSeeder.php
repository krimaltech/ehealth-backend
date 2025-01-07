<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VisitorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('visitors')->delete();
        
        \DB::table('visitors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ip_address' => '172.69.77.33',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-08 19:54:49',
                'updated_at' => '2023-05-08 19:54:49',
            ),
            1 => 
            array (
                'id' => 2,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-08 19:55:07',
                'updated_at' => '2023-05-08 19:55:07',
            ),
            2 => 
            array (
                'id' => 3,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-08 19:55:22',
                'updated_at' => '2023-05-08 19:55:22',
            ),
            3 => 
            array (
                'id' => 4,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-08 19:55:27',
                'updated_at' => '2023-05-08 19:55:27',
            ),
            4 => 
            array (
                'id' => 5,
                'ip_address' => '172.69.77.32',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-08 19:55:40',
                'updated_at' => '2023-05-08 19:55:40',
            ),
            5 => 
            array (
                'id' => 6,
                'ip_address' => '172.69.77.43',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-08 19:59:12',
                'updated_at' => '2023-05-08 19:59:12',
            ),
            6 => 
            array (
                'id' => 7,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-08 19:59:24',
                'updated_at' => '2023-05-08 19:59:24',
            ),
            7 => 
            array (
                'id' => 8,
                'ip_address' => '172.69.77.30',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-08 20:05:16',
                'updated_at' => '2023-05-08 20:05:16',
            ),
            8 => 
            array (
                'id' => 9,
                'ip_address' => '172.69.77.26',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-08 20:06:46',
                'updated_at' => '2023-05-08 20:06:46',
            ),
            9 => 
            array (
                'id' => 10,
                'ip_address' => '172.69.77.27',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-08 20:07:26',
                'updated_at' => '2023-05-08 20:07:26',
            ),
            10 => 
            array (
                'id' => 11,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-08 20:07:36',
                'updated_at' => '2023-05-08 20:07:36',
            ),
            11 => 
            array (
                'id' => 12,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-08 20:07:42',
                'updated_at' => '2023-05-08 20:07:42',
            ),
            12 => 
            array (
                'id' => 13,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-08 20:07:44',
                'updated_at' => '2023-05-08 20:07:44',
            ),
            13 => 
            array (
                'id' => 14,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-08 20:07:45',
                'updated_at' => '2023-05-08 20:07:45',
            ),
            14 => 
            array (
                'id' => 15,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-08 20:07:46',
                'updated_at' => '2023-05-08 20:07:46',
            ),
            15 => 
            array (
                'id' => 16,
                'ip_address' => '172.69.77.31',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-08 20:13:21',
                'updated_at' => '2023-05-08 20:13:21',
            ),
            16 => 
            array (
                'id' => 17,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-08 20:14:38',
                'updated_at' => '2023-05-08 20:14:38',
            ),
            17 => 
            array (
                'id' => 18,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-08 20:15:31',
                'updated_at' => '2023-05-08 20:15:31',
            ),
            18 => 
            array (
                'id' => 19,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-08 20:37:26',
                'updated_at' => '2023-05-08 20:37:26',
            ),
            19 => 
            array (
                'id' => 20,
                'ip_address' => '172.69.183.133',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-08 21:36:02',
                'updated_at' => '2023-05-08 21:36:02',
            ),
            20 => 
            array (
                'id' => 21,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-08 23:11:46',
                'updated_at' => '2023-05-08 23:11:46',
            ),
            21 => 
            array (
                'id' => 22,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 00:18:20',
                'updated_at' => '2023-05-09 00:18:20',
            ),
            22 => 
            array (
                'id' => 23,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 00:19:03',
                'updated_at' => '2023-05-09 00:19:03',
            ),
            23 => 
            array (
                'id' => 24,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 00:21:11',
                'updated_at' => '2023-05-09 00:21:11',
            ),
            24 => 
            array (
                'id' => 25,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 00:26:04',
                'updated_at' => '2023-05-09 00:26:04',
            ),
            25 => 
            array (
                'id' => 26,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 00:26:32',
                'updated_at' => '2023-05-09 00:26:32',
            ),
            26 => 
            array (
                'id' => 27,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 00:33:22',
                'updated_at' => '2023-05-09 00:33:22',
            ),
            27 => 
            array (
                'id' => 28,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 00:40:25',
                'updated_at' => '2023-05-09 00:40:25',
            ),
            28 => 
            array (
                'id' => 29,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 01:05:45',
                'updated_at' => '2023-05-09 01:05:45',
            ),
            29 => 
            array (
                'id' => 30,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 01:05:47',
                'updated_at' => '2023-05-09 01:05:47',
            ),
            30 => 
            array (
                'id' => 31,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 01:05:48',
                'updated_at' => '2023-05-09 01:05:48',
            ),
            31 => 
            array (
                'id' => 32,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 01:05:48',
                'updated_at' => '2023-05-09 01:05:48',
            ),
            32 => 
            array (
                'id' => 33,
                'ip_address' => '172.69.183.137',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-09 02:31:05',
                'updated_at' => '2023-05-09 02:31:05',
            ),
            33 => 
            array (
                'id' => 34,
                'ip_address' => '172.71.246.97',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-09 07:25:17',
                'updated_at' => '2023-05-09 07:25:17',
            ),
            34 => 
            array (
                'id' => 35,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 13:53:10',
                'updated_at' => '2023-05-09 13:53:10',
            ),
            35 => 
            array (
                'id' => 36,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 13:54:22',
                'updated_at' => '2023-05-09 13:54:22',
            ),
            36 => 
            array (
                'id' => 37,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 13:54:24',
                'updated_at' => '2023-05-09 13:54:24',
            ),
            37 => 
            array (
                'id' => 38,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 13:54:33',
                'updated_at' => '2023-05-09 13:54:33',
            ),
            38 => 
            array (
                'id' => 39,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 14:36:27',
                'updated_at' => '2023-05-09 14:36:27',
            ),
            39 => 
            array (
                'id' => 40,
                'ip_address' => '172.69.183.136',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-09 14:42:26',
                'updated_at' => '2023-05-09 14:42:26',
            ),
            40 => 
            array (
                'id' => 41,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 14:45:24',
                'updated_at' => '2023-05-09 14:45:24',
            ),
            41 => 
            array (
                'id' => 42,
                'ip_address' => '172.69.183.138',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-09 14:45:32',
                'updated_at' => '2023-05-09 14:45:32',
            ),
            42 => 
            array (
                'id' => 43,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 14:51:27',
                'updated_at' => '2023-05-09 14:51:27',
            ),
            43 => 
            array (
                'id' => 44,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 14:54:11',
                'updated_at' => '2023-05-09 14:54:11',
            ),
            44 => 
            array (
                'id' => 45,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 14:55:42',
                'updated_at' => '2023-05-09 14:55:42',
            ),
            45 => 
            array (
                'id' => 46,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 14:55:56',
                'updated_at' => '2023-05-09 14:55:56',
            ),
            46 => 
            array (
                'id' => 47,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 14:56:02',
                'updated_at' => '2023-05-09 14:56:02',
            ),
            47 => 
            array (
                'id' => 48,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 15:09:33',
                'updated_at' => '2023-05-09 15:09:33',
            ),
            48 => 
            array (
                'id' => 49,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 15:10:18',
                'updated_at' => '2023-05-09 15:10:18',
            ),
            49 => 
            array (
                'id' => 50,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 15:12:04',
                'updated_at' => '2023-05-09 15:12:04',
            ),
            50 => 
            array (
                'id' => 51,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 16:19:56',
                'updated_at' => '2023-05-09 16:19:56',
            ),
            51 => 
            array (
                'id' => 52,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 16:20:16',
                'updated_at' => '2023-05-09 16:20:16',
            ),
            52 => 
            array (
                'id' => 53,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 16:20:22',
                'updated_at' => '2023-05-09 16:20:22',
            ),
            53 => 
            array (
                'id' => 54,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 16:20:41',
                'updated_at' => '2023-05-09 16:20:41',
            ),
            54 => 
            array (
                'id' => 55,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 16:21:09',
                'updated_at' => '2023-05-09 16:21:09',
            ),
            55 => 
            array (
                'id' => 56,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 16:21:25',
                'updated_at' => '2023-05-09 16:21:25',
            ),
            56 => 
            array (
                'id' => 57,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 16:22:56',
                'updated_at' => '2023-05-09 16:22:56',
            ),
            57 => 
            array (
                'id' => 58,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 16:23:15',
                'updated_at' => '2023-05-09 16:23:15',
            ),
            58 => 
            array (
                'id' => 59,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 16:23:20',
                'updated_at' => '2023-05-09 16:23:20',
            ),
            59 => 
            array (
                'id' => 60,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 16:23:56',
                'updated_at' => '2023-05-09 16:23:56',
            ),
            60 => 
            array (
                'id' => 61,
                'ip_address' => '172.69.77.42',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-09 16:24:13',
                'updated_at' => '2023-05-09 16:24:13',
            ),
            61 => 
            array (
                'id' => 62,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 16:25:59',
                'updated_at' => '2023-05-09 16:25:59',
            ),
            62 => 
            array (
                'id' => 63,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 16:27:23',
                'updated_at' => '2023-05-09 16:27:23',
            ),
            63 => 
            array (
                'id' => 64,
                'ip_address' => '172.71.231.138',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-09 16:32:21',
                'updated_at' => '2023-05-09 16:32:21',
            ),
            64 => 
            array (
                'id' => 65,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 16:59:38',
                'updated_at' => '2023-05-09 16:59:38',
            ),
            65 => 
            array (
                'id' => 66,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 17:01:07',
                'updated_at' => '2023-05-09 17:01:07',
            ),
            66 => 
            array (
                'id' => 67,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 17:13:11',
                'updated_at' => '2023-05-09 17:13:11',
            ),
            67 => 
            array (
                'id' => 68,
                'ip_address' => '172.71.231.137',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-09 17:28:29',
                'updated_at' => '2023-05-09 17:28:29',
            ),
            68 => 
            array (
                'id' => 69,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 17:32:46',
                'updated_at' => '2023-05-09 17:32:46',
            ),
            69 => 
            array (
                'id' => 70,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:03:29',
                'updated_at' => '2023-05-09 18:03:29',
            ),
            70 => 
            array (
                'id' => 71,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:10:42',
                'updated_at' => '2023-05-09 18:10:42',
            ),
            71 => 
            array (
                'id' => 72,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:21:22',
                'updated_at' => '2023-05-09 18:21:22',
            ),
            72 => 
            array (
                'id' => 73,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:24:33',
                'updated_at' => '2023-05-09 18:24:33',
            ),
            73 => 
            array (
                'id' => 74,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:28:46',
                'updated_at' => '2023-05-09 18:28:46',
            ),
            74 => 
            array (
                'id' => 75,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:31:44',
                'updated_at' => '2023-05-09 18:31:44',
            ),
            75 => 
            array (
                'id' => 76,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:34:59',
                'updated_at' => '2023-05-09 18:34:59',
            ),
            76 => 
            array (
                'id' => 77,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:37:39',
                'updated_at' => '2023-05-09 18:37:39',
            ),
            77 => 
            array (
                'id' => 78,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:37:48',
                'updated_at' => '2023-05-09 18:37:48',
            ),
            78 => 
            array (
                'id' => 79,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:38:49',
                'updated_at' => '2023-05-09 18:38:49',
            ),
            79 => 
            array (
                'id' => 80,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:41:54',
                'updated_at' => '2023-05-09 18:41:54',
            ),
            80 => 
            array (
                'id' => 81,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:42:23',
                'updated_at' => '2023-05-09 18:42:23',
            ),
            81 => 
            array (
                'id' => 82,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:46:35',
                'updated_at' => '2023-05-09 18:46:35',
            ),
            82 => 
            array (
                'id' => 83,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 18:53:16',
                'updated_at' => '2023-05-09 18:53:16',
            ),
            83 => 
            array (
                'id' => 84,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 19:09:17',
                'updated_at' => '2023-05-09 19:09:17',
            ),
            84 => 
            array (
                'id' => 85,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 19:24:50',
                'updated_at' => '2023-05-09 19:24:50',
            ),
            85 => 
            array (
                'id' => 86,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 19:35:40',
                'updated_at' => '2023-05-09 19:35:40',
            ),
            86 => 
            array (
                'id' => 87,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 19:40:08',
                'updated_at' => '2023-05-09 19:40:08',
            ),
            87 => 
            array (
                'id' => 88,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 20:20:34',
                'updated_at' => '2023-05-09 20:20:34',
            ),
            88 => 
            array (
                'id' => 89,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 20:22:43',
                'updated_at' => '2023-05-09 20:22:43',
            ),
            89 => 
            array (
                'id' => 90,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 20:23:10',
                'updated_at' => '2023-05-09 20:23:10',
            ),
            90 => 
            array (
                'id' => 91,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 20:28:48',
                'updated_at' => '2023-05-09 20:28:48',
            ),
            91 => 
            array (
                'id' => 92,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 20:36:47',
                'updated_at' => '2023-05-09 20:36:47',
            ),
            92 => 
            array (
                'id' => 93,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 20:46:18',
                'updated_at' => '2023-05-09 20:46:18',
            ),
            93 => 
            array (
                'id' => 94,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 20:53:36',
                'updated_at' => '2023-05-09 20:53:36',
            ),
            94 => 
            array (
                'id' => 95,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 21:20:51',
                'updated_at' => '2023-05-09 21:20:51',
            ),
            95 => 
            array (
                'id' => 96,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 21:21:35',
                'updated_at' => '2023-05-09 21:21:35',
            ),
            96 => 
            array (
                'id' => 97,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 21:22:23',
                'updated_at' => '2023-05-09 21:22:23',
            ),
            97 => 
            array (
                'id' => 98,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-09 21:22:58',
                'updated_at' => '2023-05-09 21:22:58',
            ),
            98 => 
            array (
                'id' => 99,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 01:04:17',
                'updated_at' => '2023-05-10 01:04:17',
            ),
            99 => 
            array (
                'id' => 100,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 01:04:36',
                'updated_at' => '2023-05-10 01:04:36',
            ),
            100 => 
            array (
                'id' => 101,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 01:04:50',
                'updated_at' => '2023-05-10 01:04:50',
            ),
            101 => 
            array (
                'id' => 102,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 01:22:12',
                'updated_at' => '2023-05-10 01:22:12',
            ),
            102 => 
            array (
                'id' => 103,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 01:25:38',
                'updated_at' => '2023-05-10 01:25:38',
            ),
            103 => 
            array (
                'id' => 104,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 01:30:03',
                'updated_at' => '2023-05-10 01:30:03',
            ),
            104 => 
            array (
                'id' => 105,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 02:37:32',
                'updated_at' => '2023-05-10 02:37:32',
            ),
            105 => 
            array (
                'id' => 106,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 02:40:33',
                'updated_at' => '2023-05-10 02:40:33',
            ),
            106 => 
            array (
                'id' => 107,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 02:40:51',
                'updated_at' => '2023-05-10 02:40:51',
            ),
            107 => 
            array (
                'id' => 108,
                'ip_address' => '172.70.243.136',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-10 11:09:02',
                'updated_at' => '2023-05-10 11:09:02',
            ),
            108 => 
            array (
                'id' => 109,
                'ip_address' => '172.70.34.152',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-10 12:46:04',
                'updated_at' => '2023-05-10 12:46:04',
            ),
            109 => 
            array (
                'id' => 110,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 14:29:19',
                'updated_at' => '2023-05-10 14:29:19',
            ),
            110 => 
            array (
                'id' => 111,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 15:32:27',
                'updated_at' => '2023-05-10 15:32:27',
            ),
            111 => 
            array (
                'id' => 112,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 16:22:29',
                'updated_at' => '2023-05-10 16:22:29',
            ),
            112 => 
            array (
                'id' => 113,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 17:05:04',
                'updated_at' => '2023-05-10 17:05:04',
            ),
            113 => 
            array (
                'id' => 114,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 17:07:22',
                'updated_at' => '2023-05-10 17:07:22',
            ),
            114 => 
            array (
                'id' => 115,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 19:30:26',
                'updated_at' => '2023-05-10 19:30:26',
            ),
            115 => 
            array (
                'id' => 116,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 19:31:59',
                'updated_at' => '2023-05-10 19:31:59',
            ),
            116 => 
            array (
                'id' => 117,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 19:32:03',
                'updated_at' => '2023-05-10 19:32:03',
            ),
            117 => 
            array (
                'id' => 118,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 19:32:10',
                'updated_at' => '2023-05-10 19:32:10',
            ),
            118 => 
            array (
                'id' => 119,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 19:32:21',
                'updated_at' => '2023-05-10 19:32:21',
            ),
            119 => 
            array (
                'id' => 120,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 19:43:04',
                'updated_at' => '2023-05-10 19:43:04',
            ),
            120 => 
            array (
                'id' => 121,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 20:16:57',
                'updated_at' => '2023-05-10 20:16:57',
            ),
            121 => 
            array (
                'id' => 122,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 20:27:03',
                'updated_at' => '2023-05-10 20:27:03',
            ),
            122 => 
            array (
                'id' => 123,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-10 22:10:02',
                'updated_at' => '2023-05-10 22:10:02',
            ),
            123 => 
            array (
                'id' => 124,
                'ip_address' => '172.70.243.16',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-11 01:17:03',
                'updated_at' => '2023-05-11 01:17:03',
            ),
            124 => 
            array (
                'id' => 125,
                'ip_address' => '172.71.146.44',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-11 09:33:02',
                'updated_at' => '2023-05-11 09:33:02',
            ),
            125 => 
            array (
                'id' => 126,
                'ip_address' => '172.71.223.86',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-11 10:03:22',
                'updated_at' => '2023-05-11 10:03:22',
            ),
            126 => 
            array (
                'id' => 127,
                'ip_address' => '172.71.151.88',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-11 10:11:50',
                'updated_at' => '2023-05-11 10:11:50',
            ),
            127 => 
            array (
                'id' => 128,
                'ip_address' => '108.162.245.243',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-11 10:50:50',
                'updated_at' => '2023-05-11 10:50:50',
            ),
            128 => 
            array (
                'id' => 129,
                'ip_address' => '172.71.151.87',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-11 11:29:53',
                'updated_at' => '2023-05-11 11:29:53',
            ),
            129 => 
            array (
                'id' => 130,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 13:31:36',
                'updated_at' => '2023-05-11 13:31:36',
            ),
            130 => 
            array (
                'id' => 131,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 14:00:57',
                'updated_at' => '2023-05-11 14:00:57',
            ),
            131 => 
            array (
                'id' => 132,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 14:32:30',
                'updated_at' => '2023-05-11 14:32:30',
            ),
            132 => 
            array (
                'id' => 133,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 14:33:36',
                'updated_at' => '2023-05-11 14:33:36',
            ),
            133 => 
            array (
                'id' => 134,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 14:53:20',
                'updated_at' => '2023-05-11 14:53:20',
            ),
            134 => 
            array (
                'id' => 135,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 15:42:41',
                'updated_at' => '2023-05-11 15:42:41',
            ),
            135 => 
            array (
                'id' => 136,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 15:57:46',
                'updated_at' => '2023-05-11 15:57:46',
            ),
            136 => 
            array (
                'id' => 137,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 16:45:45',
                'updated_at' => '2023-05-11 16:45:45',
            ),
            137 => 
            array (
                'id' => 138,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 16:47:22',
                'updated_at' => '2023-05-11 16:47:22',
            ),
            138 => 
            array (
                'id' => 139,
                'ip_address' => '172.71.230.130',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-11 16:51:58',
                'updated_at' => '2023-05-11 16:51:58',
            ),
            139 => 
            array (
                'id' => 140,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 17:02:15',
                'updated_at' => '2023-05-11 17:02:15',
            ),
            140 => 
            array (
                'id' => 141,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 17:39:06',
                'updated_at' => '2023-05-11 17:39:06',
            ),
            141 => 
            array (
                'id' => 142,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 17:52:57',
                'updated_at' => '2023-05-11 17:52:57',
            ),
            142 => 
            array (
                'id' => 143,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 17:58:52',
                'updated_at' => '2023-05-11 17:58:52',
            ),
            143 => 
            array (
                'id' => 144,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 17:58:57',
                'updated_at' => '2023-05-11 17:58:57',
            ),
            144 => 
            array (
                'id' => 145,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:03:05',
                'updated_at' => '2023-05-11 19:03:05',
            ),
            145 => 
            array (
                'id' => 146,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:03:39',
                'updated_at' => '2023-05-11 19:03:39',
            ),
            146 => 
            array (
                'id' => 147,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:06:28',
                'updated_at' => '2023-05-11 19:06:28',
            ),
            147 => 
            array (
                'id' => 148,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:26:33',
                'updated_at' => '2023-05-11 19:26:33',
            ),
            148 => 
            array (
                'id' => 149,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:33:19',
                'updated_at' => '2023-05-11 19:33:19',
            ),
            149 => 
            array (
                'id' => 150,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:33:41',
                'updated_at' => '2023-05-11 19:33:41',
            ),
            150 => 
            array (
                'id' => 151,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:40:31',
                'updated_at' => '2023-05-11 19:40:31',
            ),
            151 => 
            array (
                'id' => 152,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:47:45',
                'updated_at' => '2023-05-11 19:47:45',
            ),
            152 => 
            array (
                'id' => 153,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:49:38',
                'updated_at' => '2023-05-11 19:49:38',
            ),
            153 => 
            array (
                'id' => 154,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:51:59',
                'updated_at' => '2023-05-11 19:51:59',
            ),
            154 => 
            array (
                'id' => 155,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:52:59',
                'updated_at' => '2023-05-11 19:52:59',
            ),
            155 => 
            array (
                'id' => 156,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:58:12',
                'updated_at' => '2023-05-11 19:58:12',
            ),
            156 => 
            array (
                'id' => 157,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:58:38',
                'updated_at' => '2023-05-11 19:58:38',
            ),
            157 => 
            array (
                'id' => 158,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:58:52',
                'updated_at' => '2023-05-11 19:58:52',
            ),
            158 => 
            array (
                'id' => 159,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 19:59:19',
                'updated_at' => '2023-05-11 19:59:19',
            ),
            159 => 
            array (
                'id' => 160,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 20:11:17',
                'updated_at' => '2023-05-11 20:11:17',
            ),
            160 => 
            array (
                'id' => 161,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 20:41:53',
                'updated_at' => '2023-05-11 20:41:53',
            ),
            161 => 
            array (
                'id' => 162,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 20:41:57',
                'updated_at' => '2023-05-11 20:41:57',
            ),
            162 => 
            array (
                'id' => 163,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 20:42:05',
                'updated_at' => '2023-05-11 20:42:05',
            ),
            163 => 
            array (
                'id' => 164,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 20:44:17',
                'updated_at' => '2023-05-11 20:44:17',
            ),
            164 => 
            array (
                'id' => 165,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-11 21:13:31',
                'updated_at' => '2023-05-11 21:13:31',
            ),
            165 => 
            array (
                'id' => 166,
                'ip_address' => '172.71.231.139',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-12 00:38:09',
                'updated_at' => '2023-05-12 00:38:09',
            ),
            166 => 
            array (
                'id' => 167,
                'ip_address' => '172.71.231.143',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-12 00:38:17',
                'updated_at' => '2023-05-12 00:38:17',
            ),
            167 => 
            array (
                'id' => 168,
                'ip_address' => '172.71.231.137',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 01:19:27',
                'updated_at' => '2023-05-12 01:19:27',
            ),
            168 => 
            array (
                'id' => 169,
                'ip_address' => '172.71.131.175',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-12 10:35:50',
                'updated_at' => '2023-05-12 10:35:50',
            ),
            169 => 
            array (
                'id' => 170,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 13:55:04',
                'updated_at' => '2023-05-12 13:55:04',
            ),
            170 => 
            array (
                'id' => 171,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 14:04:16',
                'updated_at' => '2023-05-12 14:04:16',
            ),
            171 => 
            array (
                'id' => 172,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 14:16:45',
                'updated_at' => '2023-05-12 14:16:45',
            ),
            172 => 
            array (
                'id' => 173,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 14:17:08',
                'updated_at' => '2023-05-12 14:17:08',
            ),
            173 => 
            array (
                'id' => 174,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 14:18:59',
                'updated_at' => '2023-05-12 14:18:59',
            ),
            174 => 
            array (
                'id' => 175,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 14:45:30',
                'updated_at' => '2023-05-12 14:45:30',
            ),
            175 => 
            array (
                'id' => 176,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 14:46:14',
                'updated_at' => '2023-05-12 14:46:14',
            ),
            176 => 
            array (
                'id' => 177,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 14:47:49',
                'updated_at' => '2023-05-12 14:47:49',
            ),
            177 => 
            array (
                'id' => 178,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 15:21:54',
                'updated_at' => '2023-05-12 15:21:54',
            ),
            178 => 
            array (
                'id' => 179,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 15:50:11',
                'updated_at' => '2023-05-12 15:50:11',
            ),
            179 => 
            array (
                'id' => 180,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 16:04:52',
                'updated_at' => '2023-05-12 16:04:52',
            ),
            180 => 
            array (
                'id' => 181,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 16:11:11',
                'updated_at' => '2023-05-12 16:11:11',
            ),
            181 => 
            array (
                'id' => 182,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 17:51:41',
                'updated_at' => '2023-05-12 17:51:41',
            ),
            182 => 
            array (
                'id' => 183,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 17:53:19',
                'updated_at' => '2023-05-12 17:53:19',
            ),
            183 => 
            array (
                'id' => 184,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 17:54:02',
                'updated_at' => '2023-05-12 17:54:02',
            ),
            184 => 
            array (
                'id' => 185,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 18:13:51',
                'updated_at' => '2023-05-12 18:13:51',
            ),
            185 => 
            array (
                'id' => 186,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 18:19:22',
                'updated_at' => '2023-05-12 18:19:22',
            ),
            186 => 
            array (
                'id' => 187,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 18:42:20',
                'updated_at' => '2023-05-12 18:42:20',
            ),
            187 => 
            array (
                'id' => 188,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 18:53:53',
                'updated_at' => '2023-05-12 18:53:53',
            ),
            188 => 
            array (
                'id' => 189,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 18:56:22',
                'updated_at' => '2023-05-12 18:56:22',
            ),
            189 => 
            array (
                'id' => 190,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 19:42:04',
                'updated_at' => '2023-05-12 19:42:04',
            ),
            190 => 
            array (
                'id' => 191,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 19:42:08',
                'updated_at' => '2023-05-12 19:42:08',
            ),
            191 => 
            array (
                'id' => 192,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 19:43:31',
                'updated_at' => '2023-05-12 19:43:31',
            ),
            192 => 
            array (
                'id' => 193,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 19:43:36',
                'updated_at' => '2023-05-12 19:43:36',
            ),
            193 => 
            array (
                'id' => 194,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 19:46:42',
                'updated_at' => '2023-05-12 19:46:42',
            ),
            194 => 
            array (
                'id' => 195,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 19:54:38',
                'updated_at' => '2023-05-12 19:54:38',
            ),
            195 => 
            array (
                'id' => 196,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 20:12:55',
                'updated_at' => '2023-05-12 20:12:55',
            ),
            196 => 
            array (
                'id' => 197,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 20:21:24',
                'updated_at' => '2023-05-12 20:21:24',
            ),
            197 => 
            array (
                'id' => 198,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 20:53:44',
                'updated_at' => '2023-05-12 20:53:44',
            ),
            198 => 
            array (
                'id' => 199,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 20:55:45',
                'updated_at' => '2023-05-12 20:55:45',
            ),
            199 => 
            array (
                'id' => 200,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 20:56:09',
                'updated_at' => '2023-05-12 20:56:09',
            ),
            200 => 
            array (
                'id' => 201,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 20:58:41',
                'updated_at' => '2023-05-12 20:58:41',
            ),
            201 => 
            array (
                'id' => 202,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 21:01:20',
                'updated_at' => '2023-05-12 21:01:20',
            ),
            202 => 
            array (
                'id' => 203,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 21:04:18',
                'updated_at' => '2023-05-12 21:04:18',
            ),
            203 => 
            array (
                'id' => 204,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 21:06:16',
                'updated_at' => '2023-05-12 21:06:16',
            ),
            204 => 
            array (
                'id' => 205,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-12 21:06:21',
                'updated_at' => '2023-05-12 21:06:21',
            ),
            205 => 
            array (
                'id' => 206,
                'ip_address' => '172.70.251.88',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-13 00:17:42',
                'updated_at' => '2023-05-13 00:17:42',
            ),
            206 => 
            array (
                'id' => 207,
                'ip_address' => '162.158.95.140',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-13 16:35:19',
                'updated_at' => '2023-05-13 16:35:19',
            ),
            207 => 
            array (
                'id' => 208,
                'ip_address' => '172.71.231.141',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-13 22:41:06',
                'updated_at' => '2023-05-13 22:41:06',
            ),
            208 => 
            array (
                'id' => 209,
                'ip_address' => '172.71.231.138',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-13 22:42:58',
                'updated_at' => '2023-05-13 22:42:58',
            ),
            209 => 
            array (
                'id' => 210,
                'ip_address' => '172.69.58.14',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-14 01:58:55',
                'updated_at' => '2023-05-14 01:58:55',
            ),
            210 => 
            array (
                'id' => 211,
                'ip_address' => '172.68.203.138',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-14 12:41:36',
                'updated_at' => '2023-05-14 12:41:36',
            ),
            211 => 
            array (
                'id' => 212,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 13:29:14',
                'updated_at' => '2023-05-14 13:29:14',
            ),
            212 => 
            array (
                'id' => 213,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 13:36:56',
                'updated_at' => '2023-05-14 13:36:56',
            ),
            213 => 
            array (
                'id' => 214,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 13:47:40',
                'updated_at' => '2023-05-14 13:47:40',
            ),
            214 => 
            array (
                'id' => 215,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 13:47:46',
                'updated_at' => '2023-05-14 13:47:46',
            ),
            215 => 
            array (
                'id' => 216,
                'ip_address' => '172.71.22.18',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-14 14:04:59',
                'updated_at' => '2023-05-14 14:04:59',
            ),
            216 => 
            array (
                'id' => 217,
                'ip_address' => '172.69.58.14',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 14:50:53',
                'updated_at' => '2023-05-14 14:50:53',
            ),
            217 => 
            array (
                'id' => 218,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 15:05:17',
                'updated_at' => '2023-05-14 15:05:17',
            ),
            218 => 
            array (
                'id' => 219,
                'ip_address' => '172.69.58.15',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-14 15:40:25',
                'updated_at' => '2023-05-14 15:40:25',
            ),
            219 => 
            array (
                'id' => 220,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 16:16:15',
                'updated_at' => '2023-05-14 16:16:15',
            ),
            220 => 
            array (
                'id' => 221,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 16:30:27',
                'updated_at' => '2023-05-14 16:30:27',
            ),
            221 => 
            array (
                'id' => 222,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 16:30:36',
                'updated_at' => '2023-05-14 16:30:36',
            ),
            222 => 
            array (
                'id' => 223,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 16:31:23',
                'updated_at' => '2023-05-14 16:31:23',
            ),
            223 => 
            array (
                'id' => 224,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 16:31:29',
                'updated_at' => '2023-05-14 16:31:29',
            ),
            224 => 
            array (
                'id' => 225,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 16:31:51',
                'updated_at' => '2023-05-14 16:31:51',
            ),
            225 => 
            array (
                'id' => 226,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 16:34:45',
                'updated_at' => '2023-05-14 16:34:45',
            ),
            226 => 
            array (
                'id' => 227,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 16:35:25',
                'updated_at' => '2023-05-14 16:35:25',
            ),
            227 => 
            array (
                'id' => 228,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 16:37:40',
                'updated_at' => '2023-05-14 16:37:40',
            ),
            228 => 
            array (
                'id' => 229,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 16:39:18',
                'updated_at' => '2023-05-14 16:39:18',
            ),
            229 => 
            array (
                'id' => 230,
                'ip_address' => '172.70.85.45',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-14 18:19:17',
                'updated_at' => '2023-05-14 18:19:17',
            ),
            230 => 
            array (
                'id' => 231,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 18:26:47',
                'updated_at' => '2023-05-14 18:26:47',
            ),
            231 => 
            array (
                'id' => 232,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 18:38:16',
                'updated_at' => '2023-05-14 18:38:16',
            ),
            232 => 
            array (
                'id' => 233,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 18:58:04',
                'updated_at' => '2023-05-14 18:58:04',
            ),
            233 => 
            array (
                'id' => 234,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 19:07:14',
                'updated_at' => '2023-05-14 19:07:14',
            ),
            234 => 
            array (
                'id' => 235,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 19:12:32',
                'updated_at' => '2023-05-14 19:12:32',
            ),
            235 => 
            array (
                'id' => 236,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 19:25:34',
                'updated_at' => '2023-05-14 19:25:34',
            ),
            236 => 
            array (
                'id' => 237,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 19:26:32',
                'updated_at' => '2023-05-14 19:26:32',
            ),
            237 => 
            array (
                'id' => 238,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 19:26:42',
                'updated_at' => '2023-05-14 19:26:42',
            ),
            238 => 
            array (
                'id' => 239,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 19:27:01',
                'updated_at' => '2023-05-14 19:27:01',
            ),
            239 => 
            array (
                'id' => 240,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 19:31:45',
                'updated_at' => '2023-05-14 19:31:45',
            ),
            240 => 
            array (
                'id' => 241,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 19:33:03',
                'updated_at' => '2023-05-14 19:33:03',
            ),
            241 => 
            array (
                'id' => 242,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 19:36:56',
                'updated_at' => '2023-05-14 19:36:56',
            ),
            242 => 
            array (
                'id' => 243,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 19:37:14',
                'updated_at' => '2023-05-14 19:37:14',
            ),
            243 => 
            array (
                'id' => 244,
                'ip_address' => '141.101.69.45',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-14 19:50:14',
                'updated_at' => '2023-05-14 19:50:14',
            ),
            244 => 
            array (
                'id' => 245,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 21:03:15',
                'updated_at' => '2023-05-14 21:03:15',
            ),
            245 => 
            array (
                'id' => 246,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-14 21:57:52',
                'updated_at' => '2023-05-14 21:57:52',
            ),
            246 => 
            array (
                'id' => 247,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 03:41:39',
                'updated_at' => '2023-05-15 03:41:39',
            ),
            247 => 
            array (
                'id' => 248,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 12:02:21',
                'updated_at' => '2023-05-15 12:02:21',
            ),
            248 => 
            array (
                'id' => 249,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 12:11:45',
                'updated_at' => '2023-05-15 12:11:45',
            ),
            249 => 
            array (
                'id' => 250,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 13:44:57',
                'updated_at' => '2023-05-15 13:44:57',
            ),
            250 => 
            array (
                'id' => 251,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 14:15:14',
                'updated_at' => '2023-05-15 14:15:14',
            ),
            251 => 
            array (
                'id' => 252,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 14:23:00',
                'updated_at' => '2023-05-15 14:23:00',
            ),
            252 => 
            array (
                'id' => 253,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 15:04:50',
                'updated_at' => '2023-05-15 15:04:50',
            ),
            253 => 
            array (
                'id' => 254,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 15:39:07',
                'updated_at' => '2023-05-15 15:39:07',
            ),
            254 => 
            array (
                'id' => 255,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 16:47:05',
                'updated_at' => '2023-05-15 16:47:05',
            ),
            255 => 
            array (
                'id' => 256,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 16:57:16',
                'updated_at' => '2023-05-15 16:57:16',
            ),
            256 => 
            array (
                'id' => 257,
                'ip_address' => '172.70.175.99',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-15 17:08:50',
                'updated_at' => '2023-05-15 17:08:50',
            ),
            257 => 
            array (
                'id' => 258,
                'ip_address' => '172.68.203.138',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 17:25:06',
                'updated_at' => '2023-05-15 17:25:06',
            ),
            258 => 
            array (
                'id' => 259,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 17:29:47',
                'updated_at' => '2023-05-15 17:29:47',
            ),
            259 => 
            array (
                'id' => 260,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 17:40:38',
                'updated_at' => '2023-05-15 17:40:38',
            ),
            260 => 
            array (
                'id' => 261,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 17:46:12',
                'updated_at' => '2023-05-15 17:46:12',
            ),
            261 => 
            array (
                'id' => 262,
                'ip_address' => '172.70.135.159',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-15 17:47:52',
                'updated_at' => '2023-05-15 17:47:52',
            ),
            262 => 
            array (
                'id' => 263,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 18:13:03',
                'updated_at' => '2023-05-15 18:13:03',
            ),
            263 => 
            array (
                'id' => 264,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 19:00:42',
                'updated_at' => '2023-05-15 19:00:42',
            ),
            264 => 
            array (
                'id' => 265,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 19:10:16',
                'updated_at' => '2023-05-15 19:10:16',
            ),
            265 => 
            array (
                'id' => 266,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 19:26:55',
                'updated_at' => '2023-05-15 19:26:55',
            ),
            266 => 
            array (
                'id' => 267,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 19:37:19',
                'updated_at' => '2023-05-15 19:37:19',
            ),
            267 => 
            array (
                'id' => 268,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 20:28:37',
                'updated_at' => '2023-05-15 20:28:37',
            ),
            268 => 
            array (
                'id' => 269,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 20:33:15',
                'updated_at' => '2023-05-15 20:33:15',
            ),
            269 => 
            array (
                'id' => 270,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 20:48:11',
                'updated_at' => '2023-05-15 20:48:11',
            ),
            270 => 
            array (
                'id' => 271,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-15 21:12:06',
                'updated_at' => '2023-05-15 21:12:06',
            ),
            271 => 
            array (
                'id' => 272,
                'ip_address' => '172.68.203.135',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-15 23:05:06',
                'updated_at' => '2023-05-15 23:05:06',
            ),
            272 => 
            array (
                'id' => 273,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 00:30:11',
                'updated_at' => '2023-05-16 00:30:11',
            ),
            273 => 
            array (
                'id' => 274,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 00:30:44',
                'updated_at' => '2023-05-16 00:30:44',
            ),
            274 => 
            array (
                'id' => 275,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 00:30:52',
                'updated_at' => '2023-05-16 00:30:52',
            ),
            275 => 
            array (
                'id' => 276,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 00:31:57',
                'updated_at' => '2023-05-16 00:31:57',
            ),
            276 => 
            array (
                'id' => 277,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 00:37:46',
                'updated_at' => '2023-05-16 00:37:46',
            ),
            277 => 
            array (
                'id' => 278,
                'ip_address' => '172.68.203.145',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 01:12:19',
                'updated_at' => '2023-05-16 01:12:19',
            ),
            278 => 
            array (
                'id' => 279,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 01:16:00',
                'updated_at' => '2023-05-16 01:16:00',
            ),
            279 => 
            array (
                'id' => 280,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 01:59:46',
                'updated_at' => '2023-05-16 01:59:46',
            ),
            280 => 
            array (
                'id' => 281,
                'ip_address' => '172.71.254.213',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 03:38:41',
                'updated_at' => '2023-05-16 03:38:41',
            ),
            281 => 
            array (
                'id' => 282,
                'ip_address' => '172.70.126.28',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 04:23:36',
                'updated_at' => '2023-05-16 04:23:36',
            ),
            282 => 
            array (
                'id' => 283,
                'ip_address' => '172.70.251.88',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 08:35:26',
                'updated_at' => '2023-05-16 08:35:26',
            ),
            283 => 
            array (
                'id' => 284,
                'ip_address' => '172.68.203.144',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 09:50:00',
                'updated_at' => '2023-05-16 09:50:00',
            ),
            284 => 
            array (
                'id' => 285,
                'ip_address' => '172.71.202.138',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 10:44:09',
                'updated_at' => '2023-05-16 10:44:09',
            ),
            285 => 
            array (
                'id' => 286,
                'ip_address' => '172.69.183.139',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 13:13:33',
                'updated_at' => '2023-05-16 13:13:33',
            ),
            286 => 
            array (
                'id' => 287,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 13:13:42',
                'updated_at' => '2023-05-16 13:13:42',
            ),
            287 => 
            array (
                'id' => 288,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 13:23:19',
                'updated_at' => '2023-05-16 13:23:19',
            ),
            288 => 
            array (
                'id' => 289,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 13:35:23',
                'updated_at' => '2023-05-16 13:35:23',
            ),
            289 => 
            array (
                'id' => 290,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 13:42:31',
                'updated_at' => '2023-05-16 13:42:31',
            ),
            290 => 
            array (
                'id' => 291,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 13:50:18',
                'updated_at' => '2023-05-16 13:50:18',
            ),
            291 => 
            array (
                'id' => 292,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 14:08:41',
                'updated_at' => '2023-05-16 14:08:41',
            ),
            292 => 
            array (
                'id' => 293,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 14:29:38',
                'updated_at' => '2023-05-16 14:29:38',
            ),
            293 => 
            array (
                'id' => 294,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 15:42:24',
                'updated_at' => '2023-05-16 15:42:24',
            ),
            294 => 
            array (
                'id' => 295,
                'ip_address' => '162.158.235.153',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 16:10:11',
                'updated_at' => '2023-05-16 16:10:11',
            ),
            295 => 
            array (
                'id' => 296,
                'ip_address' => '172.71.202.138',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 16:47:31',
                'updated_at' => '2023-05-16 16:47:31',
            ),
            296 => 
            array (
                'id' => 297,
                'ip_address' => '162.158.227.124',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 16:48:29',
                'updated_at' => '2023-05-16 16:48:29',
            ),
            297 => 
            array (
                'id' => 298,
                'ip_address' => '172.70.218.99',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 16:49:08',
                'updated_at' => '2023-05-16 16:49:08',
            ),
            298 => 
            array (
                'id' => 299,
                'ip_address' => '162.158.235.45',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 16:50:02',
                'updated_at' => '2023-05-16 16:50:02',
            ),
            299 => 
            array (
                'id' => 300,
                'ip_address' => '172.71.198.63',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 17:02:30',
                'updated_at' => '2023-05-16 17:02:30',
            ),
            300 => 
            array (
                'id' => 301,
                'ip_address' => '162.158.227.125',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 17:26:44',
                'updated_at' => '2023-05-16 17:26:44',
            ),
            301 => 
            array (
                'id' => 302,
                'ip_address' => '172.71.202.117',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 17:28:28',
                'updated_at' => '2023-05-16 17:28:28',
            ),
            302 => 
            array (
                'id' => 303,
                'ip_address' => '162.158.163.60',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 17:43:33',
                'updated_at' => '2023-05-16 17:43:33',
            ),
            303 => 
            array (
                'id' => 304,
                'ip_address' => '172.70.219.147',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 18:22:40',
                'updated_at' => '2023-05-16 18:22:40',
            ),
            304 => 
            array (
                'id' => 305,
                'ip_address' => '162.158.48.124',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 18:27:58',
                'updated_at' => '2023-05-16 18:27:58',
            ),
            305 => 
            array (
                'id' => 306,
                'ip_address' => '172.71.231.138',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-16 19:00:48',
                'updated_at' => '2023-05-16 19:00:48',
            ),
            306 => 
            array (
                'id' => 307,
                'ip_address' => '162.158.227.189',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 19:17:14',
                'updated_at' => '2023-05-16 19:17:14',
            ),
            307 => 
            array (
                'id' => 308,
                'ip_address' => '162.158.48.100',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 19:30:29',
                'updated_at' => '2023-05-16 19:30:29',
            ),
            308 => 
            array (
                'id' => 309,
                'ip_address' => '172.71.198.180',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-16 20:43:10',
                'updated_at' => '2023-05-16 20:43:10',
            ),
            309 => 
            array (
                'id' => 310,
                'ip_address' => '172.70.218.98',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-17 01:21:54',
                'updated_at' => '2023-05-17 01:21:54',
            ),
            310 => 
            array (
                'id' => 311,
                'ip_address' => '162.158.227.124',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 01:24:07',
                'updated_at' => '2023-05-17 01:24:07',
            ),
            311 => 
            array (
                'id' => 312,
                'ip_address' => '162.158.227.124',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 01:24:31',
                'updated_at' => '2023-05-17 01:24:31',
            ),
            312 => 
            array (
                'id' => 313,
                'ip_address' => '162.158.110.244',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-17 11:48:42',
                'updated_at' => '2023-05-17 11:48:42',
            ),
            313 => 
            array (
                'id' => 314,
                'ip_address' => '172.71.231.136',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-17 12:05:08',
                'updated_at' => '2023-05-17 12:05:08',
            ),
            314 => 
            array (
                'id' => 315,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 12:58:28',
                'updated_at' => '2023-05-17 12:58:28',
            ),
            315 => 
            array (
                'id' => 316,
                'ip_address' => '162.158.235.77',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-17 13:35:16',
                'updated_at' => '2023-05-17 13:35:16',
            ),
            316 => 
            array (
                'id' => 317,
                'ip_address' => '172.70.219.152',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-17 13:36:44',
                'updated_at' => '2023-05-17 13:36:44',
            ),
            317 => 
            array (
                'id' => 318,
                'ip_address' => '162.158.235.78',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-17 13:38:12',
                'updated_at' => '2023-05-17 13:38:12',
            ),
            318 => 
            array (
                'id' => 319,
                'ip_address' => '162.158.48.124',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 13:38:22',
                'updated_at' => '2023-05-17 13:38:22',
            ),
            319 => 
            array (
                'id' => 320,
                'ip_address' => '172.71.202.2',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-17 14:15:25',
                'updated_at' => '2023-05-17 14:15:25',
            ),
            320 => 
            array (
                'id' => 321,
                'ip_address' => '172.71.202.2',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 15:00:01',
                'updated_at' => '2023-05-17 15:00:01',
            ),
            321 => 
            array (
                'id' => 322,
                'ip_address' => '172.71.202.152',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-17 15:16:30',
                'updated_at' => '2023-05-17 15:16:30',
            ),
            322 => 
            array (
                'id' => 323,
                'ip_address' => '172.71.250.149',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-17 16:07:03',
                'updated_at' => '2023-05-17 16:07:03',
            ),
            323 => 
            array (
                'id' => 324,
                'ip_address' => '172.71.178.160',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-17 16:20:08',
                'updated_at' => '2023-05-17 16:20:08',
            ),
            324 => 
            array (
                'id' => 325,
                'ip_address' => '172.71.242.151',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-17 16:20:57',
                'updated_at' => '2023-05-17 16:20:57',
            ),
            325 => 
            array (
                'id' => 326,
                'ip_address' => '172.71.242.151',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 16:21:31',
                'updated_at' => '2023-05-17 16:21:31',
            ),
            326 => 
            array (
                'id' => 327,
                'ip_address' => '172.71.202.138',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 16:33:39',
                'updated_at' => '2023-05-17 16:33:39',
            ),
            327 => 
            array (
                'id' => 328,
                'ip_address' => '162.158.235.78',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 16:47:22',
                'updated_at' => '2023-05-17 16:47:22',
            ),
            328 => 
            array (
                'id' => 329,
                'ip_address' => '162.158.227.189',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 17:01:43',
                'updated_at' => '2023-05-17 17:01:43',
            ),
            329 => 
            array (
                'id' => 330,
                'ip_address' => '172.70.219.151',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-17 17:03:32',
                'updated_at' => '2023-05-17 17:03:32',
            ),
            330 => 
            array (
                'id' => 331,
                'ip_address' => '172.70.218.98',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 17:10:12',
                'updated_at' => '2023-05-17 17:10:12',
            ),
            331 => 
            array (
                'id' => 332,
                'ip_address' => '172.70.246.133',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-17 17:22:36',
                'updated_at' => '2023-05-17 17:22:36',
            ),
            332 => 
            array (
                'id' => 333,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 19:01:05',
                'updated_at' => '2023-05-17 19:01:05',
            ),
            333 => 
            array (
                'id' => 334,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 19:02:31',
                'updated_at' => '2023-05-17 19:02:31',
            ),
            334 => 
            array (
                'id' => 335,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 19:07:24',
                'updated_at' => '2023-05-17 19:07:24',
            ),
            335 => 
            array (
                'id' => 336,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 20:04:57',
                'updated_at' => '2023-05-17 20:04:57',
            ),
            336 => 
            array (
                'id' => 337,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 20:05:00',
                'updated_at' => '2023-05-17 20:05:00',
            ),
            337 => 
            array (
                'id' => 338,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 20:13:57',
                'updated_at' => '2023-05-17 20:13:57',
            ),
            338 => 
            array (
                'id' => 339,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 20:32:17',
                'updated_at' => '2023-05-17 20:32:17',
            ),
            339 => 
            array (
                'id' => 340,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-17 20:32:28',
                'updated_at' => '2023-05-17 20:32:28',
            ),
            340 => 
            array (
                'id' => 341,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 13:16:43',
                'updated_at' => '2023-05-18 13:16:43',
            ),
            341 => 
            array (
                'id' => 342,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 13:24:49',
                'updated_at' => '2023-05-18 13:24:49',
            ),
            342 => 
            array (
                'id' => 343,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 13:37:32',
                'updated_at' => '2023-05-18 13:37:32',
            ),
            343 => 
            array (
                'id' => 344,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 13:43:27',
                'updated_at' => '2023-05-18 13:43:27',
            ),
            344 => 
            array (
                'id' => 345,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 13:55:25',
                'updated_at' => '2023-05-18 13:55:25',
            ),
            345 => 
            array (
                'id' => 346,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 14:05:25',
                'updated_at' => '2023-05-18 14:05:25',
            ),
            346 => 
            array (
                'id' => 347,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 14:21:29',
                'updated_at' => '2023-05-18 14:21:29',
            ),
            347 => 
            array (
                'id' => 348,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 14:21:36',
                'updated_at' => '2023-05-18 14:21:36',
            ),
            348 => 
            array (
                'id' => 349,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 14:41:13',
                'updated_at' => '2023-05-18 14:41:13',
            ),
            349 => 
            array (
                'id' => 350,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 14:51:30',
                'updated_at' => '2023-05-18 14:51:30',
            ),
            350 => 
            array (
                'id' => 351,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 14:53:36',
                'updated_at' => '2023-05-18 14:53:36',
            ),
            351 => 
            array (
                'id' => 352,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 15:00:17',
                'updated_at' => '2023-05-18 15:00:17',
            ),
            352 => 
            array (
                'id' => 353,
                'ip_address' => '172.71.215.63',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 15:04:31',
                'updated_at' => '2023-05-18 15:04:31',
            ),
            353 => 
            array (
                'id' => 354,
                'ip_address' => '172.71.218.34',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 15:04:31',
                'updated_at' => '2023-05-18 15:04:31',
            ),
            354 => 
            array (
                'id' => 355,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 15:08:12',
                'updated_at' => '2023-05-18 15:08:12',
            ),
            355 => 
            array (
                'id' => 356,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 15:09:11',
                'updated_at' => '2023-05-18 15:09:11',
            ),
            356 => 
            array (
                'id' => 357,
                'ip_address' => '172.68.203.145',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 15:13:52',
                'updated_at' => '2023-05-18 15:13:52',
            ),
            357 => 
            array (
                'id' => 358,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 15:29:57',
                'updated_at' => '2023-05-18 15:29:57',
            ),
            358 => 
            array (
                'id' => 359,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 16:17:31',
                'updated_at' => '2023-05-18 16:17:31',
            ),
            359 => 
            array (
                'id' => 360,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 16:51:15',
                'updated_at' => '2023-05-18 16:51:15',
            ),
            360 => 
            array (
                'id' => 361,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 16:52:33',
                'updated_at' => '2023-05-18 16:52:33',
            ),
            361 => 
            array (
                'id' => 362,
                'ip_address' => '172.70.130.66',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 17:13:05',
                'updated_at' => '2023-05-18 17:13:05',
            ),
            362 => 
            array (
                'id' => 363,
                'ip_address' => '172.70.130.66',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 17:13:07',
                'updated_at' => '2023-05-18 17:13:07',
            ),
            363 => 
            array (
                'id' => 364,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 17:49:20',
                'updated_at' => '2023-05-18 17:49:20',
            ),
            364 => 
            array (
                'id' => 365,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 17:57:04',
                'updated_at' => '2023-05-18 17:57:04',
            ),
            365 => 
            array (
                'id' => 366,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 18:01:47',
                'updated_at' => '2023-05-18 18:01:47',
            ),
            366 => 
            array (
                'id' => 367,
                'ip_address' => '172.71.215.63',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 18:06:39',
                'updated_at' => '2023-05-18 18:06:39',
            ),
            367 => 
            array (
                'id' => 368,
                'ip_address' => '162.158.179.141',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 18:06:40',
                'updated_at' => '2023-05-18 18:06:40',
            ),
            368 => 
            array (
                'id' => 369,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 18:50:56',
                'updated_at' => '2023-05-18 18:50:56',
            ),
            369 => 
            array (
                'id' => 370,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 18:52:15',
                'updated_at' => '2023-05-18 18:52:15',
            ),
            370 => 
            array (
                'id' => 371,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 19:18:48',
                'updated_at' => '2023-05-18 19:18:48',
            ),
            371 => 
            array (
                'id' => 372,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 19:33:35',
                'updated_at' => '2023-05-18 19:33:35',
            ),
            372 => 
            array (
                'id' => 373,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 19:35:26',
                'updated_at' => '2023-05-18 19:35:26',
            ),
            373 => 
            array (
                'id' => 374,
                'ip_address' => '172.69.134.91',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 19:35:46',
                'updated_at' => '2023-05-18 19:35:46',
            ),
            374 => 
            array (
                'id' => 375,
                'ip_address' => '162.158.166.250',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 19:35:48',
                'updated_at' => '2023-05-18 19:35:48',
            ),
            375 => 
            array (
                'id' => 376,
                'ip_address' => '172.71.151.87',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 19:35:52',
                'updated_at' => '2023-05-18 19:35:52',
            ),
            376 => 
            array (
                'id' => 377,
                'ip_address' => '172.71.151.88',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 19:35:53',
                'updated_at' => '2023-05-18 19:35:53',
            ),
            377 => 
            array (
                'id' => 378,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 19:38:01',
                'updated_at' => '2023-05-18 19:38:01',
            ),
            378 => 
            array (
                'id' => 379,
                'ip_address' => '162.158.86.181',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 19:53:15',
                'updated_at' => '2023-05-18 19:53:15',
            ),
            379 => 
            array (
                'id' => 380,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 19:53:43',
                'updated_at' => '2023-05-18 19:53:43',
            ),
            380 => 
            array (
                'id' => 381,
                'ip_address' => '162.158.110.244',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 19:58:05',
                'updated_at' => '2023-05-18 19:58:05',
            ),
            381 => 
            array (
                'id' => 382,
                'ip_address' => '172.70.251.88',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 19:58:05',
                'updated_at' => '2023-05-18 19:58:05',
            ),
            382 => 
            array (
                'id' => 383,
                'ip_address' => '162.158.95.11',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 19:58:07',
                'updated_at' => '2023-05-18 19:58:07',
            ),
            383 => 
            array (
                'id' => 384,
                'ip_address' => '162.158.95.11',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 19:58:17',
                'updated_at' => '2023-05-18 19:58:17',
            ),
            384 => 
            array (
                'id' => 385,
                'ip_address' => '172.69.135.34',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 19:58:29',
                'updated_at' => '2023-05-18 19:58:29',
            ),
            385 => 
            array (
                'id' => 386,
                'ip_address' => '162.158.94.133',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 19:59:16',
                'updated_at' => '2023-05-18 19:59:16',
            ),
            386 => 
            array (
                'id' => 387,
                'ip_address' => '172.70.246.23',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 19:59:21',
                'updated_at' => '2023-05-18 19:59:21',
            ),
            387 => 
            array (
                'id' => 388,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 20:00:16',
                'updated_at' => '2023-05-18 20:00:16',
            ),
            388 => 
            array (
                'id' => 389,
                'ip_address' => '172.70.85.82',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 20:00:58',
                'updated_at' => '2023-05-18 20:00:58',
            ),
            389 => 
            array (
                'id' => 390,
                'ip_address' => '172.70.85.83',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 20:00:58',
                'updated_at' => '2023-05-18 20:00:58',
            ),
            390 => 
            array (
                'id' => 391,
                'ip_address' => '162.158.158.48',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 20:08:46',
                'updated_at' => '2023-05-18 20:08:46',
            ),
            391 => 
            array (
                'id' => 392,
                'ip_address' => '162.158.158.49',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 20:09:05',
                'updated_at' => '2023-05-18 20:09:05',
            ),
            392 => 
            array (
                'id' => 393,
                'ip_address' => '162.158.158.48',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 20:09:24',
                'updated_at' => '2023-05-18 20:09:24',
            ),
            393 => 
            array (
                'id' => 394,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 20:18:36',
                'updated_at' => '2023-05-18 20:18:36',
            ),
            394 => 
            array (
                'id' => 395,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 20:27:45',
                'updated_at' => '2023-05-18 20:27:45',
            ),
            395 => 
            array (
                'id' => 396,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 20:27:59',
                'updated_at' => '2023-05-18 20:27:59',
            ),
            396 => 
            array (
                'id' => 397,
                'ip_address' => '172.71.170.138',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-18 20:28:34',
                'updated_at' => '2023-05-18 20:28:34',
            ),
            397 => 
            array (
                'id' => 398,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 20:36:32',
                'updated_at' => '2023-05-18 20:36:32',
            ),
            398 => 
            array (
                'id' => 399,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 20:37:07',
                'updated_at' => '2023-05-18 20:37:07',
            ),
            399 => 
            array (
                'id' => 400,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 20:53:47',
                'updated_at' => '2023-05-18 20:53:47',
            ),
            400 => 
            array (
                'id' => 401,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 20:53:54',
                'updated_at' => '2023-05-18 20:53:54',
            ),
            401 => 
            array (
                'id' => 402,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 20:53:58',
                'updated_at' => '2023-05-18 20:53:58',
            ),
            402 => 
            array (
                'id' => 403,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 20:54:07',
                'updated_at' => '2023-05-18 20:54:07',
            ),
            403 => 
            array (
                'id' => 404,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 21:20:34',
                'updated_at' => '2023-05-18 21:20:34',
            ),
            404 => 
            array (
                'id' => 405,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 21:22:22',
                'updated_at' => '2023-05-18 21:22:22',
            ),
            405 => 
            array (
                'id' => 406,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-18 21:29:05',
                'updated_at' => '2023-05-18 21:29:05',
            ),
            406 => 
            array (
                'id' => 407,
                'ip_address' => '172.71.231.136',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 00:06:32',
                'updated_at' => '2023-05-19 00:06:32',
            ),
            407 => 
            array (
                'id' => 408,
                'ip_address' => '172.71.174.233',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-19 01:08:32',
                'updated_at' => '2023-05-19 01:08:32',
            ),
            408 => 
            array (
                'id' => 409,
                'ip_address' => '172.71.167.137',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-19 01:52:13',
                'updated_at' => '2023-05-19 01:52:13',
            ),
            409 => 
            array (
                'id' => 410,
                'ip_address' => '172.71.174.232',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-19 06:14:07',
                'updated_at' => '2023-05-19 06:14:07',
            ),
            410 => 
            array (
                'id' => 411,
                'ip_address' => '172.71.170.139',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-19 07:36:58',
                'updated_at' => '2023-05-19 07:36:58',
            ),
            411 => 
            array (
                'id' => 412,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 12:11:54',
                'updated_at' => '2023-05-19 12:11:54',
            ),
            412 => 
            array (
                'id' => 413,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 13:30:52',
                'updated_at' => '2023-05-19 13:30:52',
            ),
            413 => 
            array (
                'id' => 414,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 14:08:56',
                'updated_at' => '2023-05-19 14:08:56',
            ),
            414 => 
            array (
                'id' => 415,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 14:22:13',
                'updated_at' => '2023-05-19 14:22:13',
            ),
            415 => 
            array (
                'id' => 416,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 14:23:39',
                'updated_at' => '2023-05-19 14:23:39',
            ),
            416 => 
            array (
                'id' => 417,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 14:32:10',
                'updated_at' => '2023-05-19 14:32:10',
            ),
            417 => 
            array (
                'id' => 418,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 15:11:14',
                'updated_at' => '2023-05-19 15:11:14',
            ),
            418 => 
            array (
                'id' => 419,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 15:11:22',
                'updated_at' => '2023-05-19 15:11:22',
            ),
            419 => 
            array (
                'id' => 420,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 15:11:33',
                'updated_at' => '2023-05-19 15:11:33',
            ),
            420 => 
            array (
                'id' => 421,
                'ip_address' => '172.69.65.98',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-19 15:28:35',
                'updated_at' => '2023-05-19 15:28:35',
            ),
            421 => 
            array (
                'id' => 422,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 16:00:05',
                'updated_at' => '2023-05-19 16:00:05',
            ),
            422 => 
            array (
                'id' => 423,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 16:20:22',
                'updated_at' => '2023-05-19 16:20:22',
            ),
            423 => 
            array (
                'id' => 424,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 16:20:43',
                'updated_at' => '2023-05-19 16:20:43',
            ),
            424 => 
            array (
                'id' => 425,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 16:21:05',
                'updated_at' => '2023-05-19 16:21:05',
            ),
            425 => 
            array (
                'id' => 426,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 16:23:01',
                'updated_at' => '2023-05-19 16:23:01',
            ),
            426 => 
            array (
                'id' => 427,
                'ip_address' => '172.69.65.97',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-19 16:24:30',
                'updated_at' => '2023-05-19 16:24:30',
            ),
            427 => 
            array (
                'id' => 428,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 16:48:40',
                'updated_at' => '2023-05-19 16:48:40',
            ),
            428 => 
            array (
                'id' => 429,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 16:54:11',
                'updated_at' => '2023-05-19 16:54:11',
            ),
            429 => 
            array (
                'id' => 430,
                'ip_address' => '162.158.78.36',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-19 17:48:41',
                'updated_at' => '2023-05-19 17:48:41',
            ),
            430 => 
            array (
                'id' => 431,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 18:17:17',
                'updated_at' => '2023-05-19 18:17:17',
            ),
            431 => 
            array (
                'id' => 432,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 18:18:09',
                'updated_at' => '2023-05-19 18:18:09',
            ),
            432 => 
            array (
                'id' => 433,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 18:20:49',
                'updated_at' => '2023-05-19 18:20:49',
            ),
            433 => 
            array (
                'id' => 434,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 18:33:18',
                'updated_at' => '2023-05-19 18:33:18',
            ),
            434 => 
            array (
                'id' => 435,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 18:42:19',
                'updated_at' => '2023-05-19 18:42:19',
            ),
            435 => 
            array (
                'id' => 436,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 18:50:22',
                'updated_at' => '2023-05-19 18:50:22',
            ),
            436 => 
            array (
                'id' => 437,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 18:54:15',
                'updated_at' => '2023-05-19 18:54:15',
            ),
            437 => 
            array (
                'id' => 438,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 18:55:21',
                'updated_at' => '2023-05-19 18:55:21',
            ),
            438 => 
            array (
                'id' => 439,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 19:32:19',
                'updated_at' => '2023-05-19 19:32:19',
            ),
            439 => 
            array (
                'id' => 440,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 19:33:03',
                'updated_at' => '2023-05-19 19:33:03',
            ),
            440 => 
            array (
                'id' => 441,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 19:43:59',
                'updated_at' => '2023-05-19 19:43:59',
            ),
            441 => 
            array (
                'id' => 442,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 19:48:14',
                'updated_at' => '2023-05-19 19:48:14',
            ),
            442 => 
            array (
                'id' => 443,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 19:50:03',
                'updated_at' => '2023-05-19 19:50:03',
            ),
            443 => 
            array (
                'id' => 444,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 19:50:19',
                'updated_at' => '2023-05-19 19:50:19',
            ),
            444 => 
            array (
                'id' => 445,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 19:56:28',
                'updated_at' => '2023-05-19 19:56:28',
            ),
            445 => 
            array (
                'id' => 446,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 19:57:13',
                'updated_at' => '2023-05-19 19:57:13',
            ),
            446 => 
            array (
                'id' => 447,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 19:59:34',
                'updated_at' => '2023-05-19 19:59:34',
            ),
            447 => 
            array (
                'id' => 448,
                'ip_address' => '162.158.158.80',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-19 20:00:11',
                'updated_at' => '2023-05-19 20:00:11',
            ),
            448 => 
            array (
                'id' => 449,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 20:24:06',
                'updated_at' => '2023-05-19 20:24:06',
            ),
            449 => 
            array (
                'id' => 450,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 21:06:04',
                'updated_at' => '2023-05-19 21:06:04',
            ),
            450 => 
            array (
                'id' => 451,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-19 21:32:19',
                'updated_at' => '2023-05-19 21:32:19',
            ),
            451 => 
            array (
                'id' => 452,
                'ip_address' => '141.101.68.109',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-20 05:09:13',
                'updated_at' => '2023-05-20 05:09:13',
            ),
            452 => 
            array (
                'id' => 453,
                'ip_address' => '172.68.203.135',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 10:27:26',
                'updated_at' => '2023-05-20 10:27:26',
            ),
            453 => 
            array (
                'id' => 454,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 13:11:42',
                'updated_at' => '2023-05-20 13:11:42',
            ),
            454 => 
            array (
                'id' => 455,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 13:41:41',
                'updated_at' => '2023-05-20 13:41:41',
            ),
            455 => 
            array (
                'id' => 456,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 14:14:00',
                'updated_at' => '2023-05-20 14:14:00',
            ),
            456 => 
            array (
                'id' => 457,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 14:17:58',
                'updated_at' => '2023-05-20 14:17:58',
            ),
            457 => 
            array (
                'id' => 458,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 14:33:08',
                'updated_at' => '2023-05-20 14:33:08',
            ),
            458 => 
            array (
                'id' => 459,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 14:40:43',
                'updated_at' => '2023-05-20 14:40:43',
            ),
            459 => 
            array (
                'id' => 460,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 14:45:22',
                'updated_at' => '2023-05-20 14:45:22',
            ),
            460 => 
            array (
                'id' => 461,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 15:02:06',
                'updated_at' => '2023-05-20 15:02:06',
            ),
            461 => 
            array (
                'id' => 462,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 15:02:40',
                'updated_at' => '2023-05-20 15:02:40',
            ),
            462 => 
            array (
                'id' => 463,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 15:02:57',
                'updated_at' => '2023-05-20 15:02:57',
            ),
            463 => 
            array (
                'id' => 464,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 15:03:21',
                'updated_at' => '2023-05-20 15:03:21',
            ),
            464 => 
            array (
                'id' => 465,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 15:31:44',
                'updated_at' => '2023-05-20 15:31:44',
            ),
            465 => 
            array (
                'id' => 466,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 17:33:30',
                'updated_at' => '2023-05-20 17:33:30',
            ),
            466 => 
            array (
                'id' => 467,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 17:33:38',
                'updated_at' => '2023-05-20 17:33:38',
            ),
            467 => 
            array (
                'id' => 468,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 18:15:51',
                'updated_at' => '2023-05-20 18:15:51',
            ),
            468 => 
            array (
                'id' => 469,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 18:17:58',
                'updated_at' => '2023-05-20 18:17:58',
            ),
            469 => 
            array (
                'id' => 470,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 18:20:38',
                'updated_at' => '2023-05-20 18:20:38',
            ),
            470 => 
            array (
                'id' => 471,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 19:36:38',
                'updated_at' => '2023-05-20 19:36:38',
            ),
            471 => 
            array (
                'id' => 472,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 20:02:21',
                'updated_at' => '2023-05-20 20:02:21',
            ),
            472 => 
            array (
                'id' => 473,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 20:07:05',
                'updated_at' => '2023-05-20 20:07:05',
            ),
            473 => 
            array (
                'id' => 474,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 20:07:38',
                'updated_at' => '2023-05-20 20:07:38',
            ),
            474 => 
            array (
                'id' => 475,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 20:12:00',
                'updated_at' => '2023-05-20 20:12:00',
            ),
            475 => 
            array (
                'id' => 476,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 20:12:16',
                'updated_at' => '2023-05-20 20:12:16',
            ),
            476 => 
            array (
                'id' => 477,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 20:12:26',
                'updated_at' => '2023-05-20 20:12:26',
            ),
            477 => 
            array (
                'id' => 478,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 20:27:30',
                'updated_at' => '2023-05-20 20:27:30',
            ),
            478 => 
            array (
                'id' => 479,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-20 22:11:21',
                'updated_at' => '2023-05-20 22:11:21',
            ),
            479 => 
            array (
                'id' => 480,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 00:40:55',
                'updated_at' => '2023-05-21 00:40:55',
            ),
            480 => 
            array (
                'id' => 481,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 00:46:29',
                'updated_at' => '2023-05-21 00:46:29',
            ),
            481 => 
            array (
                'id' => 482,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 13:54:10',
                'updated_at' => '2023-05-21 13:54:10',
            ),
            482 => 
            array (
                'id' => 483,
                'ip_address' => '172.68.203.135',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 14:01:59',
                'updated_at' => '2023-05-21 14:01:59',
            ),
            483 => 
            array (
                'id' => 484,
                'ip_address' => '172.68.203.144',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 14:05:29',
                'updated_at' => '2023-05-21 14:05:29',
            ),
            484 => 
            array (
                'id' => 485,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 14:08:55',
                'updated_at' => '2023-05-21 14:08:55',
            ),
            485 => 
            array (
                'id' => 486,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 14:08:57',
                'updated_at' => '2023-05-21 14:08:57',
            ),
            486 => 
            array (
                'id' => 487,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 14:23:48',
                'updated_at' => '2023-05-21 14:23:48',
            ),
            487 => 
            array (
                'id' => 488,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 14:25:42',
                'updated_at' => '2023-05-21 14:25:42',
            ),
            488 => 
            array (
                'id' => 489,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 14:29:50',
                'updated_at' => '2023-05-21 14:29:50',
            ),
            489 => 
            array (
                'id' => 490,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 14:30:02',
                'updated_at' => '2023-05-21 14:30:02',
            ),
            490 => 
            array (
                'id' => 491,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 15:25:03',
                'updated_at' => '2023-05-21 15:25:03',
            ),
            491 => 
            array (
                'id' => 492,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 16:16:06',
                'updated_at' => '2023-05-21 16:16:06',
            ),
            492 => 
            array (
                'id' => 493,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 16:32:52',
                'updated_at' => '2023-05-21 16:32:52',
            ),
            493 => 
            array (
                'id' => 494,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 16:41:55',
                'updated_at' => '2023-05-21 16:41:55',
            ),
            494 => 
            array (
                'id' => 495,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 16:45:20',
                'updated_at' => '2023-05-21 16:45:20',
            ),
            495 => 
            array (
                'id' => 496,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 16:48:44',
                'updated_at' => '2023-05-21 16:48:44',
            ),
            496 => 
            array (
                'id' => 497,
                'ip_address' => '172.68.203.145',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 16:52:42',
                'updated_at' => '2023-05-21 16:52:42',
            ),
            497 => 
            array (
                'id' => 498,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 17:10:09',
                'updated_at' => '2023-05-21 17:10:09',
            ),
            498 => 
            array (
                'id' => 499,
                'ip_address' => '172.68.203.138',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 17:14:43',
                'updated_at' => '2023-05-21 17:14:43',
            ),
            499 => 
            array (
                'id' => 500,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 18:42:36',
                'updated_at' => '2023-05-21 18:42:36',
            ),
        ));
        \DB::table('visitors')->insert(array (
            0 => 
            array (
                'id' => 501,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 18:52:27',
                'updated_at' => '2023-05-21 18:52:27',
            ),
            1 => 
            array (
                'id' => 502,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 19:11:14',
                'updated_at' => '2023-05-21 19:11:14',
            ),
            2 => 
            array (
                'id' => 503,
                'ip_address' => '162.158.95.139',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-21 19:58:45',
                'updated_at' => '2023-05-21 19:58:45',
            ),
            3 => 
            array (
                'id' => 504,
                'ip_address' => '162.158.110.132',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-21 19:58:51',
                'updated_at' => '2023-05-21 19:58:51',
            ),
            4 => 
            array (
                'id' => 505,
                'ip_address' => '162.158.87.112',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-21 19:59:11',
                'updated_at' => '2023-05-21 19:59:11',
            ),
            5 => 
            array (
                'id' => 506,
                'ip_address' => '162.158.95.12',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-21 19:59:13',
                'updated_at' => '2023-05-21 19:59:13',
            ),
            6 => 
            array (
                'id' => 507,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 20:11:46',
                'updated_at' => '2023-05-21 20:11:46',
            ),
            7 => 
            array (
                'id' => 508,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 20:22:40',
                'updated_at' => '2023-05-21 20:22:40',
            ),
            8 => 
            array (
                'id' => 509,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 21:06:24',
                'updated_at' => '2023-05-21 21:06:24',
            ),
            9 => 
            array (
                'id' => 510,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 21:20:15',
                'updated_at' => '2023-05-21 21:20:15',
            ),
            10 => 
            array (
                'id' => 511,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-21 22:01:24',
                'updated_at' => '2023-05-21 22:01:24',
            ),
            11 => 
            array (
                'id' => 512,
                'ip_address' => '162.158.111.57',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-22 01:58:18',
                'updated_at' => '2023-05-22 01:58:18',
            ),
            12 => 
            array (
                'id' => 513,
                'ip_address' => '172.70.251.22',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-22 03:01:41',
                'updated_at' => '2023-05-22 03:01:41',
            ),
            13 => 
            array (
                'id' => 514,
                'ip_address' => '172.70.135.159',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 03:12:32',
                'updated_at' => '2023-05-22 03:12:32',
            ),
            14 => 
            array (
                'id' => 515,
                'ip_address' => '172.70.175.100',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-22 03:25:41',
                'updated_at' => '2023-05-22 03:25:41',
            ),
            15 => 
            array (
                'id' => 516,
                'ip_address' => '172.70.242.134',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-22 06:32:17',
                'updated_at' => '2023-05-22 06:32:17',
            ),
            16 => 
            array (
                'id' => 517,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 11:51:09',
                'updated_at' => '2023-05-22 11:51:09',
            ),
            17 => 
            array (
                'id' => 518,
                'ip_address' => '172.68.203.145',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 12:22:01',
                'updated_at' => '2023-05-22 12:22:01',
            ),
            18 => 
            array (
                'id' => 519,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 12:37:14',
                'updated_at' => '2023-05-22 12:37:14',
            ),
            19 => 
            array (
                'id' => 520,
                'ip_address' => '172.70.243.16',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 13:20:03',
                'updated_at' => '2023-05-22 13:20:03',
            ),
            20 => 
            array (
                'id' => 521,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 13:21:22',
                'updated_at' => '2023-05-22 13:21:22',
            ),
            21 => 
            array (
                'id' => 522,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 13:26:20',
                'updated_at' => '2023-05-22 13:26:20',
            ),
            22 => 
            array (
                'id' => 523,
                'ip_address' => '172.70.135.160',
                'visit_status' => 0,
                'location' => NULL,
                'created_at' => '2023-05-22 14:17:09',
                'updated_at' => '2023-05-22 14:17:09',
            ),
            23 => 
            array (
                'id' => 524,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 14:22:21',
                'updated_at' => '2023-05-22 14:22:21',
            ),
            24 => 
            array (
                'id' => 525,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 14:43:31',
                'updated_at' => '2023-05-22 14:43:31',
            ),
            25 => 
            array (
                'id' => 526,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 14:47:44',
                'updated_at' => '2023-05-22 14:47:44',
            ),
            26 => 
            array (
                'id' => 527,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 14:57:44',
                'updated_at' => '2023-05-22 14:57:44',
            ),
            27 => 
            array (
                'id' => 528,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 15:20:56',
                'updated_at' => '2023-05-22 15:20:56',
            ),
            28 => 
            array (
                'id' => 529,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 15:51:18',
                'updated_at' => '2023-05-22 15:51:18',
            ),
            29 => 
            array (
                'id' => 530,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 15:52:45',
                'updated_at' => '2023-05-22 15:52:45',
            ),
            30 => 
            array (
                'id' => 531,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 16:20:44',
                'updated_at' => '2023-05-22 16:20:44',
            ),
            31 => 
            array (
                'id' => 532,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 16:34:42',
                'updated_at' => '2023-05-22 16:34:42',
            ),
            32 => 
            array (
                'id' => 533,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 16:37:35',
                'updated_at' => '2023-05-22 16:37:35',
            ),
            33 => 
            array (
                'id' => 534,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 16:46:08',
                'updated_at' => '2023-05-22 16:46:08',
            ),
            34 => 
            array (
                'id' => 535,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 16:48:56',
                'updated_at' => '2023-05-22 16:48:56',
            ),
            35 => 
            array (
                'id' => 536,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 16:49:24',
                'updated_at' => '2023-05-22 16:49:24',
            ),
            36 => 
            array (
                'id' => 537,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 18:06:26',
                'updated_at' => '2023-05-22 18:06:26',
            ),
            37 => 
            array (
                'id' => 538,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 18:12:15',
                'updated_at' => '2023-05-22 18:12:15',
            ),
            38 => 
            array (
                'id' => 539,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 18:12:49',
                'updated_at' => '2023-05-22 18:12:49',
            ),
            39 => 
            array (
                'id' => 540,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 18:35:45',
                'updated_at' => '2023-05-22 18:35:45',
            ),
            40 => 
            array (
                'id' => 541,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 18:51:14',
                'updated_at' => '2023-05-22 18:51:14',
            ),
            41 => 
            array (
                'id' => 542,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 18:59:09',
                'updated_at' => '2023-05-22 18:59:09',
            ),
            42 => 
            array (
                'id' => 543,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 18:59:34',
                'updated_at' => '2023-05-22 18:59:34',
            ),
            43 => 
            array (
                'id' => 544,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Koteshwor, Kathmandu',
                'created_at' => '2023-05-22 19:04:23',
                'updated_at' => '2023-05-22 19:04:23',
            ),
            44 => 
            array (
                'id' => 545,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Bafal Chowk, Kathmandu',
                'created_at' => '2023-05-22 19:05:10',
                'updated_at' => '2023-05-22 19:05:10',
            ),
            45 => 
            array (
                'id' => 546,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Bafal Chowk, Kathmandu',
                'created_at' => '2023-05-22 19:06:13',
                'updated_at' => '2023-05-22 19:06:13',
            ),
            46 => 
            array (
                'id' => 547,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Koteshwor, Kathmandu',
                'created_at' => '2023-05-22 19:06:55',
                'updated_at' => '2023-05-22 19:06:55',
            ),
            47 => 
            array (
                'id' => 548,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Koteshwor, Kathmandu',
                'created_at' => '2023-05-22 19:06:56',
                'updated_at' => '2023-05-22 19:06:56',
            ),
            48 => 
            array (
                'id' => 549,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => NULL,
                'created_at' => '2023-05-22 19:06:57',
                'updated_at' => '2023-05-22 19:06:57',
            ),
            49 => 
            array (
                'id' => 550,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Bafal Chowk, Kathmandu',
                'created_at' => '2023-05-22 20:06:13',
                'updated_at' => '2023-05-22 20:06:13',
            ),
            50 => 
            array (
                'id' => 551,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Tokha, Tokha',
                'created_at' => '2023-05-23 14:05:12',
                'updated_at' => '2023-05-23 14:05:12',
            ),
            51 => 
            array (
                'id' => 552,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Tokha, Tokha',
                'created_at' => '2023-05-23 14:09:52',
                'updated_at' => '2023-05-23 14:09:52',
            ),
            52 => 
            array (
                'id' => 553,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Tokha, Tokha',
                'created_at' => '2023-05-23 14:17:36',
                'updated_at' => '2023-05-23 14:17:36',
            ),
            53 => 
            array (
                'id' => 554,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Tokha, Tokha',
                'created_at' => '2023-05-23 15:50:53',
                'updated_at' => '2023-05-23 15:50:53',
            ),
            54 => 
            array (
                'id' => 555,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Tokha, Tokha',
                'created_at' => '2023-05-23 15:56:51',
                'updated_at' => '2023-05-23 15:56:51',
            ),
            55 => 
            array (
                'id' => 556,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Tokha, Tokha',
                'created_at' => '2023-05-23 15:57:10',
                'updated_at' => '2023-05-23 15:57:10',
            ),
            56 => 
            array (
                'id' => 557,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Tokha, Tokha',
                'created_at' => '2023-05-23 15:57:10',
                'updated_at' => '2023-05-23 15:57:10',
            ),
            57 => 
            array (
                'id' => 558,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Tokha, Tokha',
                'created_at' => '2023-05-23 16:13:10',
                'updated_at' => '2023-05-23 16:13:10',
            ),
            58 => 
            array (
                'id' => 559,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Tokha, Tokha',
                'created_at' => '2023-05-23 16:14:38',
                'updated_at' => '2023-05-23 16:14:38',
            ),
            59 => 
            array (
                'id' => 560,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Tokha, Tokha',
                'created_at' => '2023-05-23 16:34:05',
                'updated_at' => '2023-05-23 16:34:05',
            ),
            60 => 
            array (
                'id' => 561,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Tokha, Tokha',
                'created_at' => '2023-05-23 16:35:16',
                'updated_at' => '2023-05-23 16:35:16',
            ),
            61 => 
            array (
                'id' => 562,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-23 16:42:40',
                'updated_at' => '2023-05-23 16:42:40',
            ),
            62 => 
            array (
                'id' => 563,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-23 16:42:47',
                'updated_at' => '2023-05-23 16:42:47',
            ),
            63 => 
            array (
                'id' => 564,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-23 16:43:52',
                'updated_at' => '2023-05-23 16:43:52',
            ),
            64 => 
            array (
                'id' => 565,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-23 16:44:19',
                'updated_at' => '2023-05-23 16:44:19',
            ),
            65 => 
            array (
                'id' => 566,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Paknajol, Kathmandu',
                'created_at' => '2023-05-23 16:46:26',
                'updated_at' => '2023-05-23 16:46:26',
            ),
            66 => 
            array (
                'id' => 567,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Tokha, Tokha',
                'created_at' => '2023-05-23 16:46:29',
                'updated_at' => '2023-05-23 16:46:29',
            ),
            67 => 
            array (
                'id' => 568,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Tokha, Tokha',
                'created_at' => '2023-05-23 17:06:21',
                'updated_at' => '2023-05-23 17:06:21',
            ),
            68 => 
            array (
                'id' => 569,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Matatirtha, Chandragiri',
                'created_at' => '2023-05-25 14:16:34',
                'updated_at' => '2023-05-25 14:16:34',
            ),
            69 => 
            array (
                'id' => 570,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Matatirtha, Chandragiri',
                'created_at' => '2023-05-25 14:27:36',
                'updated_at' => '2023-05-25 14:27:36',
            ),
            70 => 
            array (
                'id' => 571,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-25 14:52:12',
                'updated_at' => '2023-05-25 14:52:12',
            ),
            71 => 
            array (
                'id' => 572,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-25 14:52:39',
                'updated_at' => '2023-05-25 14:52:39',
            ),
            72 => 
            array (
                'id' => 573,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-25 14:53:14',
                'updated_at' => '2023-05-25 14:53:14',
            ),
            73 => 
            array (
                'id' => 574,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Matatirtha, Chandragiri',
                'created_at' => '2023-05-25 14:54:02',
                'updated_at' => '2023-05-25 14:54:02',
            ),
            74 => 
            array (
                'id' => 575,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Matatirtha, Chandragiri',
                'created_at' => '2023-05-25 16:17:06',
                'updated_at' => '2023-05-25 16:17:06',
            ),
            75 => 
            array (
                'id' => 576,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Matatirtha, Chandragiri',
                'created_at' => '2023-05-25 16:22:40',
                'updated_at' => '2023-05-25 16:22:40',
            ),
            76 => 
            array (
                'id' => 577,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Matatirtha, Chandragiri',
                'created_at' => '2023-05-25 17:55:35',
                'updated_at' => '2023-05-25 17:55:35',
            ),
            77 => 
            array (
                'id' => 578,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-25 19:06:19',
                'updated_at' => '2023-05-25 19:06:19',
            ),
            78 => 
            array (
                'id' => 579,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Matatirtha, Chandragiri',
                'created_at' => '2023-05-25 19:12:24',
                'updated_at' => '2023-05-25 19:12:24',
            ),
            79 => 
            array (
                'id' => 580,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-25 19:50:17',
                'updated_at' => '2023-05-25 19:50:17',
            ),
            80 => 
            array (
                'id' => 581,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Matatirtha, Chandragiri',
                'created_at' => '2023-05-25 19:54:59',
                'updated_at' => '2023-05-25 19:54:59',
            ),
            81 => 
            array (
                'id' => 582,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-25 20:02:03',
                'updated_at' => '2023-05-25 20:02:03',
            ),
            82 => 
            array (
                'id' => 583,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Matatirtha, Chandragiri',
                'created_at' => '2023-05-25 20:02:32',
                'updated_at' => '2023-05-25 20:02:32',
            ),
            83 => 
            array (
                'id' => 584,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Matatirtha, Chandragiri',
                'created_at' => '2023-05-25 20:02:45',
                'updated_at' => '2023-05-25 20:02:45',
            ),
            84 => 
            array (
                'id' => 585,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Matatirtha, Chandragiri',
                'created_at' => '2023-05-25 20:03:18',
                'updated_at' => '2023-05-25 20:03:18',
            ),
            85 => 
            array (
                'id' => 586,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Matatirtha, Chandragiri',
                'created_at' => '2023-05-25 20:04:01',
                'updated_at' => '2023-05-25 20:04:01',
            ),
            86 => 
            array (
                'id' => 587,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-25 20:10:12',
                'updated_at' => '2023-05-25 20:10:12',
            ),
            87 => 
            array (
                'id' => 588,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-25 20:13:01',
                'updated_at' => '2023-05-25 20:13:01',
            ),
            88 => 
            array (
                'id' => 589,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-25 20:13:17',
                'updated_at' => '2023-05-25 20:13:17',
            ),
            89 => 
            array (
                'id' => 590,
                'ip_address' => '162.158.235.78',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 14:12:44',
                'updated_at' => '2023-05-28 14:12:44',
            ),
            90 => 
            array (
                'id' => 591,
                'ip_address' => '172.70.218.45',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 14:22:35',
                'updated_at' => '2023-05-28 14:22:35',
            ),
            91 => 
            array (
                'id' => 592,
                'ip_address' => '172.71.202.184',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 14:25:04',
                'updated_at' => '2023-05-28 14:25:04',
            ),
            92 => 
            array (
                'id' => 593,
                'ip_address' => '172.71.202.185',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 14:31:52',
                'updated_at' => '2023-05-28 14:31:52',
            ),
            93 => 
            array (
                'id' => 594,
                'ip_address' => '172.71.202.94',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 15:20:16',
                'updated_at' => '2023-05-28 15:20:16',
            ),
            94 => 
            array (
                'id' => 595,
                'ip_address' => '162.158.48.125',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 15:28:16',
                'updated_at' => '2023-05-28 15:28:16',
            ),
            95 => 
            array (
                'id' => 596,
                'ip_address' => '172.70.219.33',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 15:58:11',
                'updated_at' => '2023-05-28 15:58:11',
            ),
            96 => 
            array (
                'id' => 597,
                'ip_address' => '172.70.219.34',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 15:59:10',
                'updated_at' => '2023-05-28 15:59:10',
            ),
            97 => 
            array (
                'id' => 598,
                'ip_address' => '172.70.219.34',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 15:59:32',
                'updated_at' => '2023-05-28 15:59:32',
            ),
            98 => 
            array (
                'id' => 599,
                'ip_address' => '172.70.219.34',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 16:07:35',
                'updated_at' => '2023-05-28 16:07:35',
            ),
            99 => 
            array (
                'id' => 600,
                'ip_address' => '172.71.202.114',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 16:18:38',
                'updated_at' => '2023-05-28 16:18:38',
            ),
            100 => 
            array (
                'id' => 601,
                'ip_address' => '172.70.218.235',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 16:19:53',
                'updated_at' => '2023-05-28 16:19:53',
            ),
            101 => 
            array (
                'id' => 602,
                'ip_address' => '172.70.218.235',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 16:20:19',
                'updated_at' => '2023-05-28 16:20:19',
            ),
            102 => 
            array (
                'id' => 603,
                'ip_address' => '172.71.202.19',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 16:36:57',
                'updated_at' => '2023-05-28 16:36:57',
            ),
            103 => 
            array (
                'id' => 604,
                'ip_address' => '172.71.202.19',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 16:37:13',
                'updated_at' => '2023-05-28 16:37:13',
            ),
            104 => 
            array (
                'id' => 605,
                'ip_address' => '172.71.202.19',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 16:37:17',
                'updated_at' => '2023-05-28 16:37:17',
            ),
            105 => 
            array (
                'id' => 606,
                'ip_address' => '172.71.202.18',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 16:37:46',
                'updated_at' => '2023-05-28 16:37:46',
            ),
            106 => 
            array (
                'id' => 607,
                'ip_address' => '172.70.219.21',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 16:38:56',
                'updated_at' => '2023-05-28 16:38:56',
            ),
            107 => 
            array (
                'id' => 608,
                'ip_address' => '172.70.219.22',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 16:39:48',
                'updated_at' => '2023-05-28 16:39:48',
            ),
            108 => 
            array (
                'id' => 609,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 16:45:08',
                'updated_at' => '2023-05-28 16:45:08',
            ),
            109 => 
            array (
                'id' => 610,
                'ip_address' => '172.69.183.132',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 17:00:37',
                'updated_at' => '2023-05-28 17:00:37',
            ),
            110 => 
            array (
                'id' => 611,
                'ip_address' => '172.69.183.133',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 17:00:59',
                'updated_at' => '2023-05-28 17:00:59',
            ),
            111 => 
            array (
                'id' => 612,
                'ip_address' => '172.71.198.136',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 17:10:27',
                'updated_at' => '2023-05-28 17:10:27',
            ),
            112 => 
            array (
                'id' => 613,
                'ip_address' => '172.70.218.234',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 17:41:46',
                'updated_at' => '2023-05-28 17:41:46',
            ),
            113 => 
            array (
                'id' => 614,
                'ip_address' => '172.71.198.189',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 17:42:33',
                'updated_at' => '2023-05-28 17:42:33',
            ),
            114 => 
            array (
                'id' => 615,
                'ip_address' => '172.71.198.19',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 17:45:05',
                'updated_at' => '2023-05-28 17:45:05',
            ),
            115 => 
            array (
                'id' => 616,
                'ip_address' => '172.70.218.206',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 17:48:35',
                'updated_at' => '2023-05-28 17:48:35',
            ),
            116 => 
            array (
                'id' => 617,
                'ip_address' => '172.70.218.207',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 17:48:51',
                'updated_at' => '2023-05-28 17:48:51',
            ),
            117 => 
            array (
                'id' => 618,
                'ip_address' => '172.70.218.207',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 17:50:57',
                'updated_at' => '2023-05-28 17:50:57',
            ),
            118 => 
            array (
                'id' => 619,
                'ip_address' => '172.71.198.145',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 17:52:03',
                'updated_at' => '2023-05-28 17:52:03',
            ),
            119 => 
            array (
                'id' => 620,
                'ip_address' => '172.70.219.11',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 18:14:29',
                'updated_at' => '2023-05-28 18:14:29',
            ),
            120 => 
            array (
                'id' => 621,
                'ip_address' => '172.70.219.11',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 18:14:31',
                'updated_at' => '2023-05-28 18:14:31',
            ),
            121 => 
            array (
                'id' => 622,
                'ip_address' => '172.71.198.179',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 18:46:53',
                'updated_at' => '2023-05-28 18:46:53',
            ),
            122 => 
            array (
                'id' => 623,
                'ip_address' => '162.158.235.73',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 18:47:29',
                'updated_at' => '2023-05-28 18:47:29',
            ),
            123 => 
            array (
                'id' => 624,
                'ip_address' => '162.158.235.73',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 18:48:05',
                'updated_at' => '2023-05-28 18:48:05',
            ),
            124 => 
            array (
                'id' => 625,
                'ip_address' => '172.71.202.72',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 18:50:56',
                'updated_at' => '2023-05-28 18:50:56',
            ),
            125 => 
            array (
                'id' => 626,
                'ip_address' => '172.70.218.206',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 18:55:36',
                'updated_at' => '2023-05-28 18:55:36',
            ),
            126 => 
            array (
                'id' => 627,
                'ip_address' => '172.71.198.109',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 18:55:52',
                'updated_at' => '2023-05-28 18:55:52',
            ),
            127 => 
            array (
                'id' => 628,
                'ip_address' => '172.71.198.109',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 18:55:58',
                'updated_at' => '2023-05-28 18:55:58',
            ),
            128 => 
            array (
                'id' => 629,
                'ip_address' => '172.70.218.207',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 18:56:00',
                'updated_at' => '2023-05-28 18:56:00',
            ),
            129 => 
            array (
                'id' => 630,
                'ip_address' => '172.70.218.234',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 18:56:40',
                'updated_at' => '2023-05-28 18:56:40',
            ),
            130 => 
            array (
                'id' => 631,
                'ip_address' => '172.71.202.6',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 18:56:40',
                'updated_at' => '2023-05-28 18:56:40',
            ),
            131 => 
            array (
                'id' => 632,
                'ip_address' => '172.70.218.124',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 18:57:25',
                'updated_at' => '2023-05-28 18:57:25',
            ),
            132 => 
            array (
                'id' => 633,
                'ip_address' => '172.71.202.6',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 18:57:27',
                'updated_at' => '2023-05-28 18:57:27',
            ),
            133 => 
            array (
                'id' => 634,
                'ip_address' => '162.158.235.153',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 18:58:14',
                'updated_at' => '2023-05-28 18:58:14',
            ),
            134 => 
            array (
                'id' => 635,
                'ip_address' => '172.71.198.137',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 18:58:15',
                'updated_at' => '2023-05-28 18:58:15',
            ),
            135 => 
            array (
                'id' => 636,
                'ip_address' => '172.71.198.136',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 18:58:31',
                'updated_at' => '2023-05-28 18:58:31',
            ),
            136 => 
            array (
                'id' => 637,
                'ip_address' => '162.158.235.154',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 18:58:32',
                'updated_at' => '2023-05-28 18:58:32',
            ),
            137 => 
            array (
                'id' => 638,
                'ip_address' => '162.158.235.154',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 18:58:54',
                'updated_at' => '2023-05-28 18:58:54',
            ),
            138 => 
            array (
                'id' => 639,
                'ip_address' => '172.71.198.137',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 18:58:54',
                'updated_at' => '2023-05-28 18:58:54',
            ),
            139 => 
            array (
                'id' => 640,
                'ip_address' => '172.71.198.136',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 18:59:16',
                'updated_at' => '2023-05-28 18:59:16',
            ),
            140 => 
            array (
                'id' => 641,
                'ip_address' => '162.158.235.153',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 18:59:18',
                'updated_at' => '2023-05-28 18:59:18',
            ),
            141 => 
            array (
                'id' => 642,
                'ip_address' => '172.71.198.19',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 19:20:35',
                'updated_at' => '2023-05-28 19:20:35',
            ),
            142 => 
            array (
                'id' => 643,
                'ip_address' => '172.71.198.147',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 19:38:04',
                'updated_at' => '2023-05-28 19:38:04',
            ),
            143 => 
            array (
                'id' => 644,
                'ip_address' => '172.71.202.94',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 19:39:36',
                'updated_at' => '2023-05-28 19:39:36',
            ),
            144 => 
            array (
                'id' => 645,
                'ip_address' => '172.71.202.94',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 19:39:51',
                'updated_at' => '2023-05-28 19:39:51',
            ),
            145 => 
            array (
                'id' => 646,
                'ip_address' => '162.158.48.101',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 19:45:20',
                'updated_at' => '2023-05-28 19:45:20',
            ),
            146 => 
            array (
                'id' => 647,
                'ip_address' => '172.71.198.109',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 19:50:15',
                'updated_at' => '2023-05-28 19:50:15',
            ),
            147 => 
            array (
                'id' => 648,
                'ip_address' => '162.158.235.74',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-28 19:51:33',
                'updated_at' => '2023-05-28 19:51:33',
            ),
            148 => 
            array (
                'id' => 649,
                'ip_address' => '172.71.198.106',
                'visit_status' => 0,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 20:00:39',
                'updated_at' => '2023-05-28 20:00:39',
            ),
            149 => 
            array (
                'id' => 650,
                'ip_address' => '172.71.198.106',
                'visit_status' => 1,
                'location' => 'Safal Tol, Lalitpur Metropolitan City',
                'created_at' => '2023-05-28 20:00:45',
                'updated_at' => '2023-05-28 20:00:45',
            ),
            150 => 
            array (
                'id' => 651,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 14:00:55',
                'updated_at' => '2023-05-29 14:00:55',
            ),
            151 => 
            array (
                'id' => 652,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-29 14:03:17',
                'updated_at' => '2023-05-29 14:03:17',
            ),
            152 => 
            array (
                'id' => 653,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 14:05:09',
                'updated_at' => '2023-05-29 14:05:09',
            ),
            153 => 
            array (
                'id' => 654,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 14:11:11',
                'updated_at' => '2023-05-29 14:11:11',
            ),
            154 => 
            array (
                'id' => 655,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-29 14:13:41',
                'updated_at' => '2023-05-29 14:13:41',
            ),
            155 => 
            array (
                'id' => 656,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 14:14:57',
                'updated_at' => '2023-05-29 14:14:57',
            ),
            156 => 
            array (
                'id' => 657,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 14:17:40',
                'updated_at' => '2023-05-29 14:17:40',
            ),
            157 => 
            array (
                'id' => 658,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 14:17:56',
                'updated_at' => '2023-05-29 14:17:56',
            ),
            158 => 
            array (
                'id' => 659,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 14:18:34',
                'updated_at' => '2023-05-29 14:18:34',
            ),
            159 => 
            array (
                'id' => 660,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Hotel Northfield, Kathmandu',
                'created_at' => '2023-05-29 14:20:03',
                'updated_at' => '2023-05-29 14:20:03',
            ),
            160 => 
            array (
                'id' => 661,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-29 14:22:02',
                'updated_at' => '2023-05-29 14:22:02',
            ),
            161 => 
            array (
                'id' => 662,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 14:29:52',
                'updated_at' => '2023-05-29 14:29:52',
            ),
            162 => 
            array (
                'id' => 663,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 15:05:46',
                'updated_at' => '2023-05-29 15:05:46',
            ),
            163 => 
            array (
                'id' => 664,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 15:27:35',
                'updated_at' => '2023-05-29 15:27:35',
            ),
            164 => 
            array (
                'id' => 665,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 15:27:37',
                'updated_at' => '2023-05-29 15:27:37',
            ),
            165 => 
            array (
                'id' => 666,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 15:27:38',
                'updated_at' => '2023-05-29 15:27:38',
            ),
            166 => 
            array (
                'id' => 667,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 15:27:42',
                'updated_at' => '2023-05-29 15:27:42',
            ),
            167 => 
            array (
                'id' => 668,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 15:28:11',
                'updated_at' => '2023-05-29 15:28:11',
            ),
            168 => 
            array (
                'id' => 669,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 15:28:16',
                'updated_at' => '2023-05-29 15:28:16',
            ),
            169 => 
            array (
                'id' => 670,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 15:29:00',
                'updated_at' => '2023-05-29 15:29:00',
            ),
            170 => 
            array (
                'id' => 671,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 15:29:05',
                'updated_at' => '2023-05-29 15:29:05',
            ),
            171 => 
            array (
                'id' => 672,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 15:29:43',
                'updated_at' => '2023-05-29 15:29:43',
            ),
            172 => 
            array (
                'id' => 673,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 15:44:15',
                'updated_at' => '2023-05-29 15:44:15',
            ),
            173 => 
            array (
                'id' => 674,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 15:44:19',
                'updated_at' => '2023-05-29 15:44:19',
            ),
            174 => 
            array (
                'id' => 675,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-29 16:10:29',
                'updated_at' => '2023-05-29 16:10:29',
            ),
            175 => 
            array (
                'id' => 676,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Hotel Northfield, Kathmandu',
                'created_at' => '2023-05-29 16:12:25',
                'updated_at' => '2023-05-29 16:12:25',
            ),
            176 => 
            array (
                'id' => 677,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 16:14:33',
                'updated_at' => '2023-05-29 16:14:33',
            ),
            177 => 
            array (
                'id' => 678,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 16:14:38',
                'updated_at' => '2023-05-29 16:14:38',
            ),
            178 => 
            array (
                'id' => 679,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 16:28:47',
                'updated_at' => '2023-05-29 16:28:47',
            ),
            179 => 
            array (
                'id' => 680,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 17:32:14',
                'updated_at' => '2023-05-29 17:32:14',
            ),
            180 => 
            array (
                'id' => 681,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 18:20:53',
                'updated_at' => '2023-05-29 18:20:53',
            ),
            181 => 
            array (
                'id' => 682,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 18:21:44',
                'updated_at' => '2023-05-29 18:21:44',
            ),
            182 => 
            array (
                'id' => 683,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 18:21:47',
                'updated_at' => '2023-05-29 18:21:47',
            ),
            183 => 
            array (
                'id' => 684,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 19:00:34',
                'updated_at' => '2023-05-29 19:00:34',
            ),
            184 => 
            array (
                'id' => 685,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 19:05:25',
                'updated_at' => '2023-05-29 19:05:25',
            ),
            185 => 
            array (
                'id' => 686,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-29 19:05:43',
                'updated_at' => '2023-05-29 19:05:43',
            ),
            186 => 
            array (
                'id' => 687,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-29 19:06:40',
                'updated_at' => '2023-05-29 19:06:40',
            ),
            187 => 
            array (
                'id' => 688,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-29 19:06:49',
                'updated_at' => '2023-05-29 19:06:49',
            ),
            188 => 
            array (
                'id' => 689,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 19:09:39',
                'updated_at' => '2023-05-29 19:09:39',
            ),
            189 => 
            array (
                'id' => 690,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 19:10:07',
                'updated_at' => '2023-05-29 19:10:07',
            ),
            190 => 
            array (
                'id' => 691,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 19:23:39',
                'updated_at' => '2023-05-29 19:23:39',
            ),
            191 => 
            array (
                'id' => 692,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 19:52:37',
                'updated_at' => '2023-05-29 19:52:37',
            ),
            192 => 
            array (
                'id' => 693,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-29 20:05:06',
                'updated_at' => '2023-05-29 20:05:06',
            ),
            193 => 
            array (
                'id' => 694,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 20:17:09',
                'updated_at' => '2023-05-29 20:17:09',
            ),
            194 => 
            array (
                'id' => 695,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 20:22:40',
                'updated_at' => '2023-05-29 20:22:40',
            ),
            195 => 
            array (
                'id' => 696,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Radisson Hotel Kathmandu, Kathmandu',
                'created_at' => '2023-05-29 20:22:44',
                'updated_at' => '2023-05-29 20:22:44',
            ),
            196 => 
            array (
                'id' => 697,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-29 20:37:11',
                'updated_at' => '2023-05-29 20:37:11',
            ),
            197 => 
            array (
                'id' => 698,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-29 20:37:20',
                'updated_at' => '2023-05-29 20:37:20',
            ),
            198 => 
            array (
                'id' => 699,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 14:09:34',
                'updated_at' => '2023-05-30 14:09:34',
            ),
            199 => 
            array (
                'id' => 700,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 14:10:13',
                'updated_at' => '2023-05-30 14:10:13',
            ),
            200 => 
            array (
                'id' => 701,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 14:50:12',
                'updated_at' => '2023-05-30 14:50:12',
            ),
            201 => 
            array (
                'id' => 702,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 14:50:15',
                'updated_at' => '2023-05-30 14:50:15',
            ),
            202 => 
            array (
                'id' => 703,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 14:50:19',
                'updated_at' => '2023-05-30 14:50:19',
            ),
            203 => 
            array (
                'id' => 704,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 15:11:45',
                'updated_at' => '2023-05-30 15:11:45',
            ),
            204 => 
            array (
                'id' => 705,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 15:11:45',
                'updated_at' => '2023-05-30 15:11:45',
            ),
            205 => 
            array (
                'id' => 706,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 15:11:53',
                'updated_at' => '2023-05-30 15:11:53',
            ),
            206 => 
            array (
                'id' => 707,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 15:53:05',
                'updated_at' => '2023-05-30 15:53:05',
            ),
            207 => 
            array (
                'id' => 708,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 15:54:46',
                'updated_at' => '2023-05-30 15:54:46',
            ),
            208 => 
            array (
                'id' => 709,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 15:56:33',
                'updated_at' => '2023-05-30 15:56:33',
            ),
            209 => 
            array (
                'id' => 710,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 15:56:44',
                'updated_at' => '2023-05-30 15:56:44',
            ),
            210 => 
            array (
                'id' => 711,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 15:56:55',
                'updated_at' => '2023-05-30 15:56:55',
            ),
            211 => 
            array (
                'id' => 712,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 15:56:59',
                'updated_at' => '2023-05-30 15:56:59',
            ),
            212 => 
            array (
                'id' => 713,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 15:57:03',
                'updated_at' => '2023-05-30 15:57:03',
            ),
            213 => 
            array (
                'id' => 714,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 16:07:50',
                'updated_at' => '2023-05-30 16:07:50',
            ),
            214 => 
            array (
                'id' => 715,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 16:08:58',
                'updated_at' => '2023-05-30 16:08:58',
            ),
            215 => 
            array (
                'id' => 716,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 16:09:22',
                'updated_at' => '2023-05-30 16:09:22',
            ),
            216 => 
            array (
                'id' => 717,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 16:23:15',
                'updated_at' => '2023-05-30 16:23:15',
            ),
            217 => 
            array (
                'id' => 718,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 16:24:46',
                'updated_at' => '2023-05-30 16:24:46',
            ),
            218 => 
            array (
                'id' => 719,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 16:31:40',
                'updated_at' => '2023-05-30 16:31:40',
            ),
            219 => 
            array (
                'id' => 720,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 16:35:56',
                'updated_at' => '2023-05-30 16:35:56',
            ),
            220 => 
            array (
                'id' => 721,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 17:47:38',
                'updated_at' => '2023-05-30 17:47:38',
            ),
            221 => 
            array (
                'id' => 722,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 17:47:40',
                'updated_at' => '2023-05-30 17:47:40',
            ),
            222 => 
            array (
                'id' => 723,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 17:51:18',
                'updated_at' => '2023-05-30 17:51:18',
            ),
            223 => 
            array (
                'id' => 724,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 17:51:18',
                'updated_at' => '2023-05-30 17:51:18',
            ),
            224 => 
            array (
                'id' => 725,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 17:55:29',
                'updated_at' => '2023-05-30 17:55:29',
            ),
            225 => 
            array (
                'id' => 726,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 17:56:08',
                'updated_at' => '2023-05-30 17:56:08',
            ),
            226 => 
            array (
                'id' => 727,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 17:56:28',
                'updated_at' => '2023-05-30 17:56:28',
            ),
            227 => 
            array (
                'id' => 728,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 17:56:29',
                'updated_at' => '2023-05-30 17:56:29',
            ),
            228 => 
            array (
                'id' => 729,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 17:56:41',
                'updated_at' => '2023-05-30 17:56:41',
            ),
            229 => 
            array (
                'id' => 730,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 17:58:34',
                'updated_at' => '2023-05-30 17:58:34',
            ),
            230 => 
            array (
                'id' => 731,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 18:06:37',
                'updated_at' => '2023-05-30 18:06:37',
            ),
            231 => 
            array (
                'id' => 732,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 18:08:05',
                'updated_at' => '2023-05-30 18:08:05',
            ),
            232 => 
            array (
                'id' => 733,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 18:10:56',
                'updated_at' => '2023-05-30 18:10:56',
            ),
            233 => 
            array (
                'id' => 734,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 18:15:29',
                'updated_at' => '2023-05-30 18:15:29',
            ),
            234 => 
            array (
                'id' => 735,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 18:15:29',
                'updated_at' => '2023-05-30 18:15:29',
            ),
            235 => 
            array (
                'id' => 736,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 18:17:51',
                'updated_at' => '2023-05-30 18:17:51',
            ),
            236 => 
            array (
                'id' => 737,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 18:17:51',
                'updated_at' => '2023-05-30 18:17:51',
            ),
            237 => 
            array (
                'id' => 738,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 18:18:13',
                'updated_at' => '2023-05-30 18:18:13',
            ),
            238 => 
            array (
                'id' => 739,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-30 18:18:19',
                'updated_at' => '2023-05-30 18:18:19',
            ),
            239 => 
            array (
                'id' => 740,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 18:18:30',
                'updated_at' => '2023-05-30 18:18:30',
            ),
            240 => 
            array (
                'id' => 741,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 18:24:41',
                'updated_at' => '2023-05-30 18:24:41',
            ),
            241 => 
            array (
                'id' => 742,
                'ip_address' => '172.70.218.165',
                'visit_status' => 0,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 18:33:44',
                'updated_at' => '2023-05-30 18:33:44',
            ),
            242 => 
            array (
                'id' => 743,
                'ip_address' => '172.70.188.112',
                'visit_status' => 0,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 19:09:24',
                'updated_at' => '2023-05-30 19:09:24',
            ),
            243 => 
            array (
                'id' => 744,
                'ip_address' => '162.158.235.45',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 19:14:05',
                'updated_at' => '2023-05-30 19:14:05',
            ),
            244 => 
            array (
                'id' => 745,
                'ip_address' => '162.158.235.45',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 19:14:05',
                'updated_at' => '2023-05-30 19:14:05',
            ),
            245 => 
            array (
                'id' => 746,
                'ip_address' => '162.158.235.45',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 19:14:05',
                'updated_at' => '2023-05-30 19:14:05',
            ),
            246 => 
            array (
                'id' => 747,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-05-30 16:25:11',
                'updated_at' => '2023-05-30 16:25:11',
            ),
            247 => 
            array (
                'id' => 748,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 10:16:49',
                'updated_at' => '2023-05-31 10:16:49',
            ),
            248 => 
            array (
                'id' => 749,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 10:30:16',
                'updated_at' => '2023-05-31 10:30:16',
            ),
            249 => 
            array (
                'id' => 750,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 10:34:29',
                'updated_at' => '2023-05-31 10:34:29',
            ),
            250 => 
            array (
                'id' => 751,
                'ip_address' => '172.71.198.175',
                'visit_status' => 0,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 10:37:50',
                'updated_at' => '2023-05-31 10:37:50',
            ),
            251 => 
            array (
                'id' => 752,
                'ip_address' => '172.71.198.174',
                'visit_status' => 0,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 10:38:15',
                'updated_at' => '2023-05-31 10:38:15',
            ),
            252 => 
            array (
                'id' => 753,
                'ip_address' => '172.71.198.174',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 10:38:28',
                'updated_at' => '2023-05-31 10:38:28',
            ),
            253 => 
            array (
                'id' => 754,
                'ip_address' => '172.71.198.175',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 10:38:41',
                'updated_at' => '2023-05-31 10:38:41',
            ),
            254 => 
            array (
                'id' => 755,
                'ip_address' => '172.71.198.174',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 10:39:30',
                'updated_at' => '2023-05-31 10:39:30',
            ),
            255 => 
            array (
                'id' => 756,
                'ip_address' => '162.158.235.73',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-31 10:42:52',
                'updated_at' => '2023-05-31 10:42:52',
            ),
            256 => 
            array (
                'id' => 757,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 11:39:37',
                'updated_at' => '2023-05-31 11:39:37',
            ),
            257 => 
            array (
                'id' => 758,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-31 11:52:25',
                'updated_at' => '2023-05-31 11:52:25',
            ),
            258 => 
            array (
                'id' => 759,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-31 11:53:08',
                'updated_at' => '2023-05-31 11:53:08',
            ),
            259 => 
            array (
                'id' => 760,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 11:54:15',
                'updated_at' => '2023-05-31 11:54:15',
            ),
            260 => 
            array (
                'id' => 761,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 11:54:24',
                'updated_at' => '2023-05-31 11:54:24',
            ),
            261 => 
            array (
                'id' => 762,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 11:54:45',
                'updated_at' => '2023-05-31 11:54:45',
            ),
            262 => 
            array (
                'id' => 763,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-31 12:13:06',
                'updated_at' => '2023-05-31 12:13:06',
            ),
            263 => 
            array (
                'id' => 764,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 12:23:55',
                'updated_at' => '2023-05-31 12:23:55',
            ),
            264 => 
            array (
                'id' => 765,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 12:26:04',
                'updated_at' => '2023-05-31 12:26:04',
            ),
            265 => 
            array (
                'id' => 766,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 12:26:31',
                'updated_at' => '2023-05-31 12:26:31',
            ),
            266 => 
            array (
                'id' => 767,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 12:48:39',
                'updated_at' => '2023-05-31 12:48:39',
            ),
            267 => 
            array (
                'id' => 768,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 12:54:30',
                'updated_at' => '2023-05-31 12:54:30',
            ),
            268 => 
            array (
                'id' => 769,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 13:08:40',
                'updated_at' => '2023-05-31 13:08:40',
            ),
            269 => 
            array (
                'id' => 770,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-31 13:52:29',
                'updated_at' => '2023-05-31 13:52:29',
            ),
            270 => 
            array (
                'id' => 771,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 14:02:50',
                'updated_at' => '2023-05-31 14:02:50',
            ),
            271 => 
            array (
                'id' => 772,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 14:03:28',
                'updated_at' => '2023-05-31 14:03:28',
            ),
            272 => 
            array (
                'id' => 773,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 14:09:46',
                'updated_at' => '2023-05-31 14:09:46',
            ),
            273 => 
            array (
                'id' => 774,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 14:21:51',
                'updated_at' => '2023-05-31 14:21:51',
            ),
            274 => 
            array (
                'id' => 775,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 14:28:09',
                'updated_at' => '2023-05-31 14:28:09',
            ),
            275 => 
            array (
                'id' => 776,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 14:28:17',
                'updated_at' => '2023-05-31 14:28:17',
            ),
            276 => 
            array (
                'id' => 777,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 14:28:29',
                'updated_at' => '2023-05-31 14:28:29',
            ),
            277 => 
            array (
                'id' => 778,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'My sweet Home, Kathmandu',
                'created_at' => '2023-05-31 14:28:44',
                'updated_at' => '2023-05-31 14:28:44',
            ),
            278 => 
            array (
                'id' => 779,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 14:59:10',
                'updated_at' => '2023-05-31 14:59:10',
            ),
            279 => 
            array (
                'id' => 780,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 15:10:46',
                'updated_at' => '2023-05-31 15:10:46',
            ),
            280 => 
            array (
                'id' => 781,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 15:10:52',
                'updated_at' => '2023-05-31 15:10:52',
            ),
            281 => 
            array (
                'id' => 782,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 15:10:58',
                'updated_at' => '2023-05-31 15:10:58',
            ),
            282 => 
            array (
                'id' => 783,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 15:14:13',
                'updated_at' => '2023-05-31 15:14:13',
            ),
            283 => 
            array (
                'id' => 784,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 15:14:25',
                'updated_at' => '2023-05-31 15:14:25',
            ),
            284 => 
            array (
                'id' => 785,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 15:24:21',
                'updated_at' => '2023-05-31 15:24:21',
            ),
            285 => 
            array (
                'id' => 786,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-31 15:24:42',
                'updated_at' => '2023-05-31 15:24:42',
            ),
            286 => 
            array (
                'id' => 787,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-31 15:35:08',
                'updated_at' => '2023-05-31 15:35:08',
            ),
            287 => 
            array (
                'id' => 788,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 16:04:27',
                'updated_at' => '2023-05-31 16:04:27',
            ),
            288 => 
            array (
                'id' => 789,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 16:08:20',
                'updated_at' => '2023-05-31 16:08:20',
            ),
            289 => 
            array (
                'id' => 790,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-05-31 16:25:40',
                'updated_at' => '2023-05-31 16:25:40',
            ),
            290 => 
            array (
                'id' => 791,
                'ip_address' => '162.158.227.171',
                'visit_status' => 0,
                'location' => 'Tri Chandra Campus, Kathmandu',
                'created_at' => '2023-05-31 16:41:33',
                'updated_at' => '2023-05-31 16:41:33',
            ),
            291 => 
            array (
                'id' => 792,
                'ip_address' => '172.70.218.44',
                'visit_status' => 0,
                'location' => 'Noyel stay and liquore store, undefined',
                'created_at' => '2023-05-31 16:48:32',
                'updated_at' => '2023-05-31 16:48:32',
            ),
            292 => 
            array (
                'id' => 793,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Nepal Oil Corporation, Kathmandu',
                'created_at' => '2023-06-01 10:30:28',
                'updated_at' => '2023-06-01 10:30:28',
            ),
            293 => 
            array (
                'id' => 794,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Nepal Oil Corporation, Kathmandu',
                'created_at' => '2023-06-01 10:30:30',
                'updated_at' => '2023-06-01 10:30:30',
            ),
            294 => 
            array (
                'id' => 795,
                'ip_address' => '162.158.227.125',
                'visit_status' => 1,
                'location' => 'Nepal Oil Corporation, Kathmandu',
                'created_at' => '2023-06-01 10:41:18',
                'updated_at' => '2023-06-01 10:41:18',
            ),
            295 => 
            array (
                'id' => 796,
                'ip_address' => '162.158.48.74',
                'visit_status' => 0,
                'location' => 'Nepal Oil Corporation, Kathmandu',
                'created_at' => '2023-06-01 10:51:15',
                'updated_at' => '2023-06-01 10:51:15',
            ),
            296 => 
            array (
                'id' => 797,
                'ip_address' => '172.70.218.207',
                'visit_status' => 1,
                'location' => 'Nepal Oil Corporation, Kathmandu',
                'created_at' => '2023-06-01 10:54:13',
                'updated_at' => '2023-06-01 10:54:13',
            ),
            297 => 
            array (
                'id' => 798,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-01 11:31:47',
                'updated_at' => '2023-06-01 11:31:47',
            ),
            298 => 
            array (
                'id' => 799,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-01 11:34:31',
                'updated_at' => '2023-06-01 11:34:31',
            ),
            299 => 
            array (
                'id' => 800,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-01 11:34:51',
                'updated_at' => '2023-06-01 11:34:51',
            ),
            300 => 
            array (
                'id' => 801,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-01 11:35:24',
                'updated_at' => '2023-06-01 11:35:24',
            ),
            301 => 
            array (
                'id' => 802,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-01 12:05:55',
                'updated_at' => '2023-06-01 12:05:55',
            ),
            302 => 
            array (
                'id' => 803,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-01 12:32:14',
                'updated_at' => '2023-06-01 12:32:14',
            ),
            303 => 
            array (
                'id' => 804,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-01 12:44:57',
                'updated_at' => '2023-06-01 12:44:57',
            ),
            304 => 
            array (
                'id' => 805,
                'ip_address' => '172.71.202.94',
                'visit_status' => 1,
                'location' => 'Nepal Oil Corporation, Kathmandu',
                'created_at' => '2023-06-01 15:53:45',
                'updated_at' => '2023-06-01 15:53:45',
            ),
            305 => 
            array (
                'id' => 806,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 10:10:53',
                'updated_at' => '2023-06-02 10:10:53',
            ),
            306 => 
            array (
                'id' => 807,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:19:18',
                'updated_at' => '2023-06-02 11:19:18',
            ),
            307 => 
            array (
                'id' => 808,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:19:22',
                'updated_at' => '2023-06-02 11:19:22',
            ),
            308 => 
            array (
                'id' => 809,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:19:25',
                'updated_at' => '2023-06-02 11:19:25',
            ),
            309 => 
            array (
                'id' => 810,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:19:29',
                'updated_at' => '2023-06-02 11:19:29',
            ),
            310 => 
            array (
                'id' => 811,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:19:33',
                'updated_at' => '2023-06-02 11:19:33',
            ),
            311 => 
            array (
                'id' => 812,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:27:20',
                'updated_at' => '2023-06-02 11:27:20',
            ),
            312 => 
            array (
                'id' => 813,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:27:23',
                'updated_at' => '2023-06-02 11:27:23',
            ),
            313 => 
            array (
                'id' => 814,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:27:26',
                'updated_at' => '2023-06-02 11:27:26',
            ),
            314 => 
            array (
                'id' => 815,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:29:37',
                'updated_at' => '2023-06-02 11:29:37',
            ),
            315 => 
            array (
                'id' => 816,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:40:04',
                'updated_at' => '2023-06-02 11:40:04',
            ),
            316 => 
            array (
                'id' => 817,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:40:34',
                'updated_at' => '2023-06-02 11:40:34',
            ),
            317 => 
            array (
                'id' => 818,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:40:38',
                'updated_at' => '2023-06-02 11:40:38',
            ),
            318 => 
            array (
                'id' => 819,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:40:43',
                'updated_at' => '2023-06-02 11:40:43',
            ),
            319 => 
            array (
                'id' => 820,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:41:02',
                'updated_at' => '2023-06-02 11:41:02',
            ),
            320 => 
            array (
                'id' => 821,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:41:12',
                'updated_at' => '2023-06-02 11:41:12',
            ),
            321 => 
            array (
                'id' => 822,
                'ip_address' => '172.71.198.62',
                'visit_status' => 0,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:43:46',
                'updated_at' => '2023-06-02 11:43:46',
            ),
            322 => 
            array (
                'id' => 823,
                'ip_address' => '172.71.198.62',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:43:51',
                'updated_at' => '2023-06-02 11:43:51',
            ),
            323 => 
            array (
                'id' => 824,
                'ip_address' => '172.71.198.63',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 11:44:00',
                'updated_at' => '2023-06-02 11:44:00',
            ),
            324 => 
            array (
                'id' => 825,
                'ip_address' => '172.70.218.206',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-02 11:47:31',
                'updated_at' => '2023-06-02 11:47:31',
            ),
            325 => 
            array (
                'id' => 826,
                'ip_address' => '172.70.219.11',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 12:34:03',
                'updated_at' => '2023-06-02 12:34:03',
            ),
            326 => 
            array (
                'id' => 827,
                'ip_address' => '172.70.218.182',
                'visit_status' => 0,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 12:52:48',
                'updated_at' => '2023-06-02 12:52:48',
            ),
            327 => 
            array (
                'id' => 828,
                'ip_address' => '172.70.218.183',
                'visit_status' => 0,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 12:52:56',
                'updated_at' => '2023-06-02 12:52:56',
            ),
            328 => 
            array (
                'id' => 829,
                'ip_address' => '172.71.198.63',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 13:00:51',
                'updated_at' => '2023-06-02 13:00:51',
            ),
            329 => 
            array (
                'id' => 830,
                'ip_address' => '172.71.198.62',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 13:00:53',
                'updated_at' => '2023-06-02 13:00:53',
            ),
            330 => 
            array (
                'id' => 831,
                'ip_address' => '172.71.198.63',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 13:00:57',
                'updated_at' => '2023-06-02 13:00:57',
            ),
            331 => 
            array (
                'id' => 832,
                'ip_address' => '172.71.198.63',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 13:01:26',
                'updated_at' => '2023-06-02 13:01:26',
            ),
            332 => 
            array (
                'id' => 833,
                'ip_address' => '172.70.218.125',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-02 13:42:57',
                'updated_at' => '2023-06-02 13:42:57',
            ),
            333 => 
            array (
                'id' => 834,
                'ip_address' => '172.70.218.124',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-02 13:43:01',
                'updated_at' => '2023-06-02 13:43:01',
            ),
            334 => 
            array (
                'id' => 835,
                'ip_address' => '172.70.218.124',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-02 13:43:08',
                'updated_at' => '2023-06-02 13:43:08',
            ),
            335 => 
            array (
                'id' => 836,
                'ip_address' => '172.70.218.124',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-02 13:43:12',
                'updated_at' => '2023-06-02 13:43:12',
            ),
            336 => 
            array (
                'id' => 837,
                'ip_address' => '172.70.218.125',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-02 13:43:16',
                'updated_at' => '2023-06-02 13:43:16',
            ),
            337 => 
            array (
                'id' => 838,
                'ip_address' => '172.70.218.182',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-02 13:44:24',
                'updated_at' => '2023-06-02 13:44:24',
            ),
            338 => 
            array (
                'id' => 839,
                'ip_address' => '172.70.218.182',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-02 13:44:51',
                'updated_at' => '2023-06-02 13:44:51',
            ),
            339 => 
            array (
                'id' => 840,
                'ip_address' => '172.71.198.188',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-02 13:46:14',
                'updated_at' => '2023-06-02 13:46:14',
            ),
            340 => 
            array (
                'id' => 841,
                'ip_address' => '162.158.235.46',
                'visit_status' => 0,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 13:48:19',
                'updated_at' => '2023-06-02 13:48:19',
            ),
            341 => 
            array (
                'id' => 842,
                'ip_address' => '162.158.235.46',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 13:48:50',
                'updated_at' => '2023-06-02 13:48:50',
            ),
            342 => 
            array (
                'id' => 843,
                'ip_address' => '162.158.235.46',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 13:49:02',
                'updated_at' => '2023-06-02 13:49:02',
            ),
            343 => 
            array (
                'id' => 844,
                'ip_address' => '172.71.202.73',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-02 13:56:02',
                'updated_at' => '2023-06-02 13:56:02',
            ),
            344 => 
            array (
                'id' => 845,
                'ip_address' => '172.71.198.19',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 14:29:25',
                'updated_at' => '2023-06-02 14:29:25',
            ),
            345 => 
            array (
                'id' => 846,
                'ip_address' => '162.158.235.77',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 14:32:06',
                'updated_at' => '2023-06-02 14:32:06',
            ),
            346 => 
            array (
                'id' => 847,
                'ip_address' => '172.70.219.21',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-02 14:35:38',
                'updated_at' => '2023-06-02 14:35:38',
            ),
            347 => 
            array (
                'id' => 848,
                'ip_address' => '172.71.202.73',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 14:49:59',
                'updated_at' => '2023-06-02 14:49:59',
            ),
            348 => 
            array (
                'id' => 849,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 15:27:42',
                'updated_at' => '2023-06-02 15:27:42',
            ),
            349 => 
            array (
                'id' => 850,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 15:30:47',
                'updated_at' => '2023-06-02 15:30:47',
            ),
            350 => 
            array (
                'id' => 851,
                'ip_address' => '172.71.198.124',
                'visit_status' => 0,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 15:57:14',
                'updated_at' => '2023-06-02 15:57:14',
            ),
            351 => 
            array (
                'id' => 852,
                'ip_address' => '172.71.198.125',
                'visit_status' => 0,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 15:57:50',
                'updated_at' => '2023-06-02 15:57:50',
            ),
            352 => 
            array (
                'id' => 853,
                'ip_address' => '172.71.198.125',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 15:57:57',
                'updated_at' => '2023-06-02 15:57:57',
            ),
            353 => 
            array (
                'id' => 854,
                'ip_address' => '172.71.198.188',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 16:00:25',
                'updated_at' => '2023-06-02 16:00:25',
            ),
            354 => 
            array (
                'id' => 855,
                'ip_address' => '172.71.198.188',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 16:00:37',
                'updated_at' => '2023-06-02 16:00:37',
            ),
            355 => 
            array (
                'id' => 856,
                'ip_address' => '172.71.198.189',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 16:01:08',
                'updated_at' => '2023-06-02 16:01:08',
            ),
            356 => 
            array (
                'id' => 857,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Bagmati Marg, Kathmandu',
                'created_at' => '2023-06-02 16:37:07',
                'updated_at' => '2023-06-02 16:37:07',
            ),
            357 => 
            array (
                'id' => 858,
                'ip_address' => '172.71.198.125',
                'visit_status' => 1,
                'location' => 'Sallaghari Chaur, Bhaktapur',
                'created_at' => '2023-06-03 13:27:21',
                'updated_at' => '2023-06-03 13:27:21',
            ),
            358 => 
            array (
                'id' => 859,
                'ip_address' => '172.70.218.183',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 11:05:29',
                'updated_at' => '2023-06-04 11:05:29',
            ),
            359 => 
            array (
                'id' => 860,
                'ip_address' => '172.70.218.183',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 11:14:17',
                'updated_at' => '2023-06-04 11:14:17',
            ),
            360 => 
            array (
                'id' => 861,
                'ip_address' => '162.158.48.125',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 11:19:09',
                'updated_at' => '2023-06-04 11:19:09',
            ),
            361 => 
            array (
                'id' => 862,
                'ip_address' => '162.158.48.125',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 11:20:05',
                'updated_at' => '2023-06-04 11:20:05',
            ),
            362 => 
            array (
                'id' => 863,
                'ip_address' => '162.158.235.154',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 11:32:34',
                'updated_at' => '2023-06-04 11:32:34',
            ),
            363 => 
            array (
                'id' => 864,
                'ip_address' => '162.158.235.154',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 11:32:37',
                'updated_at' => '2023-06-04 11:32:37',
            ),
            364 => 
            array (
                'id' => 865,
                'ip_address' => '172.71.198.63',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 11:48:49',
                'updated_at' => '2023-06-04 11:48:49',
            ),
            365 => 
            array (
                'id' => 866,
                'ip_address' => '172.71.198.63',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 11:49:08',
                'updated_at' => '2023-06-04 11:49:08',
            ),
            366 => 
            array (
                'id' => 867,
                'ip_address' => '172.71.198.63',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 11:49:16',
                'updated_at' => '2023-06-04 11:49:16',
            ),
            367 => 
            array (
                'id' => 868,
                'ip_address' => '172.71.202.63',
                'visit_status' => 0,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:04:15',
                'updated_at' => '2023-06-04 12:04:15',
            ),
            368 => 
            array (
                'id' => 869,
                'ip_address' => '162.158.235.78',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:29:05',
                'updated_at' => '2023-06-04 12:29:05',
            ),
            369 => 
            array (
                'id' => 870,
                'ip_address' => '162.158.235.77',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:29:08',
                'updated_at' => '2023-06-04 12:29:08',
            ),
            370 => 
            array (
                'id' => 871,
                'ip_address' => '172.71.202.150',
                'visit_status' => 0,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:38:46',
                'updated_at' => '2023-06-04 12:38:46',
            ),
            371 => 
            array (
                'id' => 872,
                'ip_address' => '172.71.202.150',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:39:21',
                'updated_at' => '2023-06-04 12:39:21',
            ),
            372 => 
            array (
                'id' => 873,
                'ip_address' => '172.71.202.150',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:39:34',
                'updated_at' => '2023-06-04 12:39:34',
            ),
            373 => 
            array (
                'id' => 874,
                'ip_address' => '172.71.202.151',
                'visit_status' => 0,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:39:46',
                'updated_at' => '2023-06-04 12:39:46',
            ),
            374 => 
            array (
                'id' => 875,
                'ip_address' => '172.71.202.150',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 12:40:01',
                'updated_at' => '2023-06-04 12:40:01',
            ),
            375 => 
            array (
                'id' => 876,
                'ip_address' => '172.71.202.150',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 12:40:15',
                'updated_at' => '2023-06-04 12:40:15',
            ),
            376 => 
            array (
                'id' => 877,
                'ip_address' => '172.71.202.150',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 12:40:32',
                'updated_at' => '2023-06-04 12:40:32',
            ),
            377 => 
            array (
                'id' => 878,
                'ip_address' => '172.71.202.150',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 12:40:51',
                'updated_at' => '2023-06-04 12:40:51',
            ),
            378 => 
            array (
                'id' => 879,
                'ip_address' => '172.71.202.151',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 12:41:04',
                'updated_at' => '2023-06-04 12:41:04',
            ),
            379 => 
            array (
                'id' => 880,
                'ip_address' => '172.70.219.22',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:43:58',
                'updated_at' => '2023-06-04 12:43:58',
            ),
            380 => 
            array (
                'id' => 881,
                'ip_address' => '172.70.219.22',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:44:10',
                'updated_at' => '2023-06-04 12:44:10',
            ),
            381 => 
            array (
                'id' => 882,
                'ip_address' => '172.70.219.21',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:44:19',
                'updated_at' => '2023-06-04 12:44:19',
            ),
            382 => 
            array (
                'id' => 883,
                'ip_address' => '172.70.219.22',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:44:31',
                'updated_at' => '2023-06-04 12:44:31',
            ),
            383 => 
            array (
                'id' => 884,
                'ip_address' => '172.70.219.22',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:44:41',
                'updated_at' => '2023-06-04 12:44:41',
            ),
            384 => 
            array (
                'id' => 885,
                'ip_address' => '172.70.219.22',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:44:52',
                'updated_at' => '2023-06-04 12:44:52',
            ),
            385 => 
            array (
                'id' => 886,
                'ip_address' => '172.70.219.22',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:45:01',
                'updated_at' => '2023-06-04 12:45:01',
            ),
            386 => 
            array (
                'id' => 887,
                'ip_address' => '172.70.219.21',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:45:13',
                'updated_at' => '2023-06-04 12:45:13',
            ),
            387 => 
            array (
                'id' => 888,
                'ip_address' => '172.70.219.22',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:45:20',
                'updated_at' => '2023-06-04 12:45:20',
            ),
            388 => 
            array (
                'id' => 889,
                'ip_address' => '172.70.219.21',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:45:34',
                'updated_at' => '2023-06-04 12:45:34',
            ),
            389 => 
            array (
                'id' => 890,
                'ip_address' => '172.70.219.22',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:46:27',
                'updated_at' => '2023-06-04 12:46:27',
            ),
            390 => 
            array (
                'id' => 891,
                'ip_address' => '172.71.202.73',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:54:44',
                'updated_at' => '2023-06-04 12:54:44',
            ),
            391 => 
            array (
                'id' => 892,
                'ip_address' => '172.71.202.73',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 12:55:01',
                'updated_at' => '2023-06-04 12:55:01',
            ),
            392 => 
            array (
                'id' => 893,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 13:54:05',
                'updated_at' => '2023-06-04 13:54:05',
            ),
            393 => 
            array (
                'id' => 894,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 13:56:26',
                'updated_at' => '2023-06-04 13:56:26',
            ),
            394 => 
            array (
                'id' => 895,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 13:56:36',
                'updated_at' => '2023-06-04 13:56:36',
            ),
            395 => 
            array (
                'id' => 896,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 13:57:28',
                'updated_at' => '2023-06-04 13:57:28',
            ),
            396 => 
            array (
                'id' => 897,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 13:57:37',
                'updated_at' => '2023-06-04 13:57:37',
            ),
            397 => 
            array (
                'id' => 898,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 13:57:53',
                'updated_at' => '2023-06-04 13:57:53',
            ),
            398 => 
            array (
                'id' => 899,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 14:04:16',
                'updated_at' => '2023-06-04 14:04:16',
            ),
            399 => 
            array (
                'id' => 900,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 14:04:47',
                'updated_at' => '2023-06-04 14:04:47',
            ),
            400 => 
            array (
                'id' => 901,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 14:05:40',
                'updated_at' => '2023-06-04 14:05:40',
            ),
            401 => 
            array (
                'id' => 902,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 14:06:19',
                'updated_at' => '2023-06-04 14:06:19',
            ),
            402 => 
            array (
                'id' => 903,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 14:06:40',
                'updated_at' => '2023-06-04 14:06:40',
            ),
            403 => 
            array (
                'id' => 904,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 14:06:59',
                'updated_at' => '2023-06-04 14:06:59',
            ),
            404 => 
            array (
                'id' => 905,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 14:07:21',
                'updated_at' => '2023-06-04 14:07:21',
            ),
            405 => 
            array (
                'id' => 906,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 14:07:43',
                'updated_at' => '2023-06-04 14:07:43',
            ),
            406 => 
            array (
                'id' => 907,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 14:07:56',
                'updated_at' => '2023-06-04 14:07:56',
            ),
            407 => 
            array (
                'id' => 908,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 14:09:24',
                'updated_at' => '2023-06-04 14:09:24',
            ),
            408 => 
            array (
                'id' => 909,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 14:13:35',
                'updated_at' => '2023-06-04 14:13:35',
            ),
            409 => 
            array (
                'id' => 910,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 14:26:29',
                'updated_at' => '2023-06-04 14:26:29',
            ),
            410 => 
            array (
                'id' => 911,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 14:26:41',
                'updated_at' => '2023-06-04 14:26:41',
            ),
            411 => 
            array (
                'id' => 912,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 14:37:22',
                'updated_at' => '2023-06-04 14:37:22',
            ),
            412 => 
            array (
                'id' => 913,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 14:41:16',
                'updated_at' => '2023-06-04 14:41:16',
            ),
            413 => 
            array (
                'id' => 914,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 14:51:17',
                'updated_at' => '2023-06-04 14:51:17',
            ),
            414 => 
            array (
                'id' => 915,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 15:28:41',
                'updated_at' => '2023-06-04 15:28:41',
            ),
            415 => 
            array (
                'id' => 916,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-04 15:29:24',
                'updated_at' => '2023-06-04 15:29:24',
            ),
            416 => 
            array (
                'id' => 917,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 15:32:34',
                'updated_at' => '2023-06-04 15:32:34',
            ),
            417 => 
            array (
                'id' => 918,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:38:41',
                'updated_at' => '2023-06-04 15:38:41',
            ),
            418 => 
            array (
                'id' => 919,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:40:19',
                'updated_at' => '2023-06-04 15:40:19',
            ),
            419 => 
            array (
                'id' => 920,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:44:18',
                'updated_at' => '2023-06-04 15:44:18',
            ),
            420 => 
            array (
                'id' => 921,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:45:11',
                'updated_at' => '2023-06-04 15:45:11',
            ),
            421 => 
            array (
                'id' => 922,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:45:16',
                'updated_at' => '2023-06-04 15:45:16',
            ),
            422 => 
            array (
                'id' => 923,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:45:23',
                'updated_at' => '2023-06-04 15:45:23',
            ),
            423 => 
            array (
                'id' => 924,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:45:28',
                'updated_at' => '2023-06-04 15:45:28',
            ),
            424 => 
            array (
                'id' => 925,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:48:53',
                'updated_at' => '2023-06-04 15:48:53',
            ),
            425 => 
            array (
                'id' => 926,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:49:43',
                'updated_at' => '2023-06-04 15:49:43',
            ),
            426 => 
            array (
                'id' => 927,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:49:46',
                'updated_at' => '2023-06-04 15:49:46',
            ),
            427 => 
            array (
                'id' => 928,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:49:49',
                'updated_at' => '2023-06-04 15:49:49',
            ),
            428 => 
            array (
                'id' => 929,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:50:04',
                'updated_at' => '2023-06-04 15:50:04',
            ),
            429 => 
            array (
                'id' => 930,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:50:09',
                'updated_at' => '2023-06-04 15:50:09',
            ),
            430 => 
            array (
                'id' => 931,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:50:33',
                'updated_at' => '2023-06-04 15:50:33',
            ),
            431 => 
            array (
                'id' => 932,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:51:01',
                'updated_at' => '2023-06-04 15:51:01',
            ),
            432 => 
            array (
                'id' => 933,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 15:55:26',
                'updated_at' => '2023-06-04 15:55:26',
            ),
            433 => 
            array (
                'id' => 934,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Mahalaxmi, Mahalaxmi',
                'created_at' => '2023-06-04 16:09:41',
                'updated_at' => '2023-06-04 16:09:41',
            ),
            434 => 
            array (
                'id' => 935,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Hotel Northfield, Kathmandu',
                'created_at' => '2023-06-04 16:24:27',
                'updated_at' => '2023-06-04 16:24:27',
            ),
            435 => 
            array (
                'id' => 936,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Hotel Northfield, Kathmandu',
                'created_at' => '2023-06-04 16:30:12',
                'updated_at' => '2023-06-04 16:30:12',
            ),
            436 => 
            array (
                'id' => 937,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 16:31:18',
                'updated_at' => '2023-06-04 16:31:18',
            ),
            437 => 
            array (
                'id' => 938,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-04 16:34:22',
                'updated_at' => '2023-06-04 16:34:22',
            ),
            438 => 
            array (
                'id' => 939,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-05 10:25:38',
                'updated_at' => '2023-06-05 10:25:38',
            ),
            439 => 
            array (
                'id' => 940,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:10:18',
                'updated_at' => '2023-06-05 11:10:18',
            ),
            440 => 
            array (
                'id' => 941,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:41:20',
                'updated_at' => '2023-06-05 11:41:20',
            ),
            441 => 
            array (
                'id' => 942,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:48:25',
                'updated_at' => '2023-06-05 11:48:25',
            ),
            442 => 
            array (
                'id' => 943,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:48:34',
                'updated_at' => '2023-06-05 11:48:34',
            ),
            443 => 
            array (
                'id' => 944,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:48:38',
                'updated_at' => '2023-06-05 11:48:38',
            ),
            444 => 
            array (
                'id' => 945,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:51:04',
                'updated_at' => '2023-06-05 11:51:04',
            ),
            445 => 
            array (
                'id' => 946,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:51:23',
                'updated_at' => '2023-06-05 11:51:23',
            ),
            446 => 
            array (
                'id' => 947,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:51:42',
                'updated_at' => '2023-06-05 11:51:42',
            ),
            447 => 
            array (
                'id' => 948,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:51:53',
                'updated_at' => '2023-06-05 11:51:53',
            ),
            448 => 
            array (
                'id' => 949,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:52:36',
                'updated_at' => '2023-06-05 11:52:36',
            ),
            449 => 
            array (
                'id' => 950,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:52:52',
                'updated_at' => '2023-06-05 11:52:52',
            ),
            450 => 
            array (
                'id' => 951,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:53:04',
                'updated_at' => '2023-06-05 11:53:04',
            ),
            451 => 
            array (
                'id' => 952,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:55:08',
                'updated_at' => '2023-06-05 11:55:08',
            ),
            452 => 
            array (
                'id' => 953,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:55:23',
                'updated_at' => '2023-06-05 11:55:23',
            ),
            453 => 
            array (
                'id' => 954,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 11:55:27',
                'updated_at' => '2023-06-05 11:55:27',
            ),
            454 => 
            array (
                'id' => 955,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:02:50',
                'updated_at' => '2023-06-05 12:02:50',
            ),
            455 => 
            array (
                'id' => 956,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:02:56',
                'updated_at' => '2023-06-05 12:02:56',
            ),
            456 => 
            array (
                'id' => 957,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:02:59',
                'updated_at' => '2023-06-05 12:02:59',
            ),
            457 => 
            array (
                'id' => 958,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:03:02',
                'updated_at' => '2023-06-05 12:03:02',
            ),
            458 => 
            array (
                'id' => 959,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:03:05',
                'updated_at' => '2023-06-05 12:03:05',
            ),
            459 => 
            array (
                'id' => 960,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:03:08',
                'updated_at' => '2023-06-05 12:03:08',
            ),
            460 => 
            array (
                'id' => 961,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:03:11',
                'updated_at' => '2023-06-05 12:03:11',
            ),
            461 => 
            array (
                'id' => 962,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:03:16',
                'updated_at' => '2023-06-05 12:03:16',
            ),
            462 => 
            array (
                'id' => 963,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:17:51',
                'updated_at' => '2023-06-05 12:17:51',
            ),
            463 => 
            array (
                'id' => 964,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:17:53',
                'updated_at' => '2023-06-05 12:17:53',
            ),
            464 => 
            array (
                'id' => 965,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:17:56',
                'updated_at' => '2023-06-05 12:17:56',
            ),
            465 => 
            array (
                'id' => 966,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:18:00',
                'updated_at' => '2023-06-05 12:18:00',
            ),
            466 => 
            array (
                'id' => 967,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:21:19',
                'updated_at' => '2023-06-05 12:21:19',
            ),
            467 => 
            array (
                'id' => 968,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:23:36',
                'updated_at' => '2023-06-05 12:23:36',
            ),
            468 => 
            array (
                'id' => 969,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 12:37:38',
                'updated_at' => '2023-06-05 12:37:38',
            ),
            469 => 
            array (
                'id' => 970,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Hotel Northfield, Kathmandu',
                'created_at' => '2023-06-05 12:41:31',
                'updated_at' => '2023-06-05 12:41:31',
            ),
            470 => 
            array (
                'id' => 971,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 14:08:45',
                'updated_at' => '2023-06-05 14:08:45',
            ),
            471 => 
            array (
                'id' => 972,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 14:08:56',
                'updated_at' => '2023-06-05 14:08:56',
            ),
            472 => 
            array (
                'id' => 973,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 14:15:14',
                'updated_at' => '2023-06-05 14:15:14',
            ),
            473 => 
            array (
                'id' => 974,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 14:20:40',
                'updated_at' => '2023-06-05 14:20:40',
            ),
            474 => 
            array (
                'id' => 975,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 14:25:48',
                'updated_at' => '2023-06-05 14:25:48',
            ),
            475 => 
            array (
                'id' => 976,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 14:27:21',
                'updated_at' => '2023-06-05 14:27:21',
            ),
            476 => 
            array (
                'id' => 977,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:13:59',
                'updated_at' => '2023-06-05 15:13:59',
            ),
            477 => 
            array (
                'id' => 978,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-05 15:20:55',
                'updated_at' => '2023-06-05 15:20:55',
            ),
            478 => 
            array (
                'id' => 979,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:21:57',
                'updated_at' => '2023-06-05 15:21:57',
            ),
            479 => 
            array (
                'id' => 980,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:22:46',
                'updated_at' => '2023-06-05 15:22:46',
            ),
            480 => 
            array (
                'id' => 981,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:24:06',
                'updated_at' => '2023-06-05 15:24:06',
            ),
            481 => 
            array (
                'id' => 982,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:24:17',
                'updated_at' => '2023-06-05 15:24:17',
            ),
            482 => 
            array (
                'id' => 983,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:25:37',
                'updated_at' => '2023-06-05 15:25:37',
            ),
            483 => 
            array (
                'id' => 984,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:26:04',
                'updated_at' => '2023-06-05 15:26:04',
            ),
            484 => 
            array (
                'id' => 985,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:26:06',
                'updated_at' => '2023-06-05 15:26:06',
            ),
            485 => 
            array (
                'id' => 986,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:26:10',
                'updated_at' => '2023-06-05 15:26:10',
            ),
            486 => 
            array (
                'id' => 987,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:26:17',
                'updated_at' => '2023-06-05 15:26:17',
            ),
            487 => 
            array (
                'id' => 988,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:27:01',
                'updated_at' => '2023-06-05 15:27:01',
            ),
            488 => 
            array (
                'id' => 989,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:28:13',
                'updated_at' => '2023-06-05 15:28:13',
            ),
            489 => 
            array (
                'id' => 990,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-05 15:29:07',
                'updated_at' => '2023-06-05 15:29:07',
            ),
            490 => 
            array (
                'id' => 991,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-05 15:29:13',
                'updated_at' => '2023-06-05 15:29:13',
            ),
            491 => 
            array (
                'id' => 992,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-05 15:30:29',
                'updated_at' => '2023-06-05 15:30:29',
            ),
            492 => 
            array (
                'id' => 993,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-05 15:30:31',
                'updated_at' => '2023-06-05 15:30:31',
            ),
            493 => 
            array (
                'id' => 994,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-05 15:30:45',
                'updated_at' => '2023-06-05 15:30:45',
            ),
            494 => 
            array (
                'id' => 995,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-05 15:30:49',
                'updated_at' => '2023-06-05 15:30:49',
            ),
            495 => 
            array (
                'id' => 996,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:31:52',
                'updated_at' => '2023-06-05 15:31:52',
            ),
            496 => 
            array (
                'id' => 997,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:32:01',
                'updated_at' => '2023-06-05 15:32:01',
            ),
            497 => 
            array (
                'id' => 998,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:32:22',
                'updated_at' => '2023-06-05 15:32:22',
            ),
            498 => 
            array (
                'id' => 999,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:32:27',
                'updated_at' => '2023-06-05 15:32:27',
            ),
            499 => 
            array (
                'id' => 1000,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:32:31',
                'updated_at' => '2023-06-05 15:32:31',
            ),
        ));
        \DB::table('visitors')->insert(array (
            0 => 
            array (
                'id' => 1001,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:34:00',
                'updated_at' => '2023-06-05 15:34:00',
            ),
            1 => 
            array (
                'id' => 1002,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:34:06',
                'updated_at' => '2023-06-05 15:34:06',
            ),
            2 => 
            array (
                'id' => 1003,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:34:12',
                'updated_at' => '2023-06-05 15:34:12',
            ),
            3 => 
            array (
                'id' => 1004,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:34:16',
                'updated_at' => '2023-06-05 15:34:16',
            ),
            4 => 
            array (
                'id' => 1005,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:34:26',
                'updated_at' => '2023-06-05 15:34:26',
            ),
            5 => 
            array (
                'id' => 1006,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:35:02',
                'updated_at' => '2023-06-05 15:35:02',
            ),
            6 => 
            array (
                'id' => 1007,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:37:39',
                'updated_at' => '2023-06-05 15:37:39',
            ),
            7 => 
            array (
                'id' => 1008,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:43:11',
                'updated_at' => '2023-06-05 15:43:11',
            ),
            8 => 
            array (
                'id' => 1009,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 15:43:57',
                'updated_at' => '2023-06-05 15:43:57',
            ),
            9 => 
            array (
                'id' => 1010,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 16:03:56',
                'updated_at' => '2023-06-05 16:03:56',
            ),
            10 => 
            array (
                'id' => 1011,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 16:04:05',
                'updated_at' => '2023-06-05 16:04:05',
            ),
            11 => 
            array (
                'id' => 1012,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 16:04:09',
                'updated_at' => '2023-06-05 16:04:09',
            ),
            12 => 
            array (
                'id' => 1013,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 16:04:16',
                'updated_at' => '2023-06-05 16:04:16',
            ),
            13 => 
            array (
                'id' => 1014,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 16:04:29',
                'updated_at' => '2023-06-05 16:04:29',
            ),
            14 => 
            array (
                'id' => 1015,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 16:04:33',
                'updated_at' => '2023-06-05 16:04:33',
            ),
            15 => 
            array (
                'id' => 1016,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 16:04:37',
                'updated_at' => '2023-06-05 16:04:37',
            ),
            16 => 
            array (
                'id' => 1017,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 16:04:41',
                'updated_at' => '2023-06-05 16:04:41',
            ),
            17 => 
            array (
                'id' => 1018,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 16:04:49',
                'updated_at' => '2023-06-05 16:04:49',
            ),
            18 => 
            array (
                'id' => 1019,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 16:05:00',
                'updated_at' => '2023-06-05 16:05:00',
            ),
            19 => 
            array (
                'id' => 1020,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'hiledole 1, Kathmandu',
                'created_at' => '2023-06-05 16:15:23',
                'updated_at' => '2023-06-05 16:15:23',
            ),
            20 => 
            array (
                'id' => 1021,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-05 16:45:12',
                'updated_at' => '2023-06-05 16:45:12',
            ),
            21 => 
            array (
                'id' => 1022,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-05 16:45:40',
                'updated_at' => '2023-06-05 16:45:40',
            ),
            22 => 
            array (
                'id' => 1023,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Chonga Ganesh Cold Store, Bhaktapur',
                'created_at' => '2023-06-05 20:38:00',
                'updated_at' => '2023-06-05 20:38:00',
            ),
            23 => 
            array (
                'id' => 1024,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Jagati, Bhaktapur',
                'created_at' => '2023-06-05 21:05:00',
                'updated_at' => '2023-06-05 21:05:00',
            ),
            24 => 
            array (
                'id' => 1025,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 10:27:34',
                'updated_at' => '2023-06-06 10:27:34',
            ),
            25 => 
            array (
                'id' => 1026,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 10:41:07',
                'updated_at' => '2023-06-06 10:41:07',
            ),
            26 => 
            array (
                'id' => 1027,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 11:01:58',
                'updated_at' => '2023-06-06 11:01:58',
            ),
            27 => 
            array (
                'id' => 1028,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 11:04:56',
                'updated_at' => '2023-06-06 11:04:56',
            ),
            28 => 
            array (
                'id' => 1029,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 11:05:37',
                'updated_at' => '2023-06-06 11:05:37',
            ),
            29 => 
            array (
                'id' => 1030,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 11:57:13',
                'updated_at' => '2023-06-06 11:57:13',
            ),
            30 => 
            array (
                'id' => 1031,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 11:59:25',
                'updated_at' => '2023-06-06 11:59:25',
            ),
            31 => 
            array (
                'id' => 1032,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 11:59:51',
                'updated_at' => '2023-06-06 11:59:51',
            ),
            32 => 
            array (
                'id' => 1033,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-06 12:00:12',
                'updated_at' => '2023-06-06 12:00:12',
            ),
            33 => 
            array (
                'id' => 1034,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-06 12:01:49',
                'updated_at' => '2023-06-06 12:01:49',
            ),
            34 => 
            array (
                'id' => 1035,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 12:03:27',
                'updated_at' => '2023-06-06 12:03:27',
            ),
            35 => 
            array (
                'id' => 1036,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 12:03:51',
                'updated_at' => '2023-06-06 12:03:51',
            ),
            36 => 
            array (
                'id' => 1037,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 12:04:15',
                'updated_at' => '2023-06-06 12:04:15',
            ),
            37 => 
            array (
                'id' => 1038,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 12:04:18',
                'updated_at' => '2023-06-06 12:04:18',
            ),
            38 => 
            array (
                'id' => 1039,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 12:04:53',
                'updated_at' => '2023-06-06 12:04:53',
            ),
            39 => 
            array (
                'id' => 1040,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 12:04:59',
                'updated_at' => '2023-06-06 12:04:59',
            ),
            40 => 
            array (
                'id' => 1041,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 12:23:40',
                'updated_at' => '2023-06-06 12:23:40',
            ),
            41 => 
            array (
                'id' => 1042,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 12:30:35',
                'updated_at' => '2023-06-06 12:30:35',
            ),
            42 => 
            array (
                'id' => 1043,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 12:45:07',
                'updated_at' => '2023-06-06 12:45:07',
            ),
            43 => 
            array (
                'id' => 1044,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 13:07:36',
                'updated_at' => '2023-06-06 13:07:36',
            ),
            44 => 
            array (
                'id' => 1045,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 13:55:01',
                'updated_at' => '2023-06-06 13:55:01',
            ),
            45 => 
            array (
                'id' => 1046,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-06 13:56:47',
                'updated_at' => '2023-06-06 13:56:47',
            ),
            46 => 
            array (
                'id' => 1047,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-06 14:15:58',
                'updated_at' => '2023-06-06 14:15:58',
            ),
            47 => 
            array (
                'id' => 1048,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 14:25:21',
                'updated_at' => '2023-06-06 14:25:21',
            ),
            48 => 
            array (
                'id' => 1049,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 15:02:40',
                'updated_at' => '2023-06-06 15:02:40',
            ),
            49 => 
            array (
                'id' => 1050,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 15:04:23',
                'updated_at' => '2023-06-06 15:04:23',
            ),
            50 => 
            array (
                'id' => 1051,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 15:04:33',
                'updated_at' => '2023-06-06 15:04:33',
            ),
            51 => 
            array (
                'id' => 1052,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 15:04:43',
                'updated_at' => '2023-06-06 15:04:43',
            ),
            52 => 
            array (
                'id' => 1053,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 15:49:06',
                'updated_at' => '2023-06-06 15:49:06',
            ),
            53 => 
            array (
                'id' => 1054,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 16:39:13',
                'updated_at' => '2023-06-06 16:39:13',
            ),
            54 => 
            array (
                'id' => 1055,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 16:39:37',
                'updated_at' => '2023-06-06 16:39:37',
            ),
            55 => 
            array (
                'id' => 1056,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 16:40:06',
                'updated_at' => '2023-06-06 16:40:06',
            ),
            56 => 
            array (
                'id' => 1057,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 16:40:11',
                'updated_at' => '2023-06-06 16:40:11',
            ),
            57 => 
            array (
                'id' => 1058,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-06 16:46:12',
                'updated_at' => '2023-06-06 16:46:12',
            ),
            58 => 
            array (
                'id' => 1059,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 16:50:53',
                'updated_at' => '2023-06-06 16:50:53',
            ),
            59 => 
            array (
                'id' => 1060,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 16:50:56',
                'updated_at' => '2023-06-06 16:50:56',
            ),
            60 => 
            array (
                'id' => 1061,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 16:50:59',
                'updated_at' => '2023-06-06 16:50:59',
            ),
            61 => 
            array (
                'id' => 1062,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-06 16:51:22',
                'updated_at' => '2023-06-06 16:51:22',
            ),
            62 => 
            array (
                'id' => 1063,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Jagati, Bhaktapur',
                'created_at' => '2023-06-06 19:40:47',
                'updated_at' => '2023-06-06 19:40:47',
            ),
            63 => 
            array (
                'id' => 1064,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Jagati, Bhaktapur',
                'created_at' => '2023-06-06 19:41:48',
                'updated_at' => '2023-06-06 19:41:48',
            ),
            64 => 
            array (
                'id' => 1065,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 10:39:12',
                'updated_at' => '2023-06-07 10:39:12',
            ),
            65 => 
            array (
                'id' => 1066,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 10:40:27',
                'updated_at' => '2023-06-07 10:40:27',
            ),
            66 => 
            array (
                'id' => 1067,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 10:42:12',
                'updated_at' => '2023-06-07 10:42:12',
            ),
            67 => 
            array (
                'id' => 1068,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 10:43:50',
                'updated_at' => '2023-06-07 10:43:50',
            ),
            68 => 
            array (
                'id' => 1069,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 10:45:03',
                'updated_at' => '2023-06-07 10:45:03',
            ),
            69 => 
            array (
                'id' => 1070,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 10:45:19',
                'updated_at' => '2023-06-07 10:45:19',
            ),
            70 => 
            array (
                'id' => 1071,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 11:01:37',
                'updated_at' => '2023-06-07 11:01:37',
            ),
            71 => 
            array (
                'id' => 1072,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 11:06:49',
                'updated_at' => '2023-06-07 11:06:49',
            ),
            72 => 
            array (
                'id' => 1073,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 11:21:45',
                'updated_at' => '2023-06-07 11:21:45',
            ),
            73 => 
            array (
                'id' => 1074,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 11:27:43',
                'updated_at' => '2023-06-07 11:27:43',
            ),
            74 => 
            array (
                'id' => 1075,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 11:31:14',
                'updated_at' => '2023-06-07 11:31:14',
            ),
            75 => 
            array (
                'id' => 1076,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 11:45:57',
                'updated_at' => '2023-06-07 11:45:57',
            ),
            76 => 
            array (
                'id' => 1077,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 11:56:38',
                'updated_at' => '2023-06-07 11:56:38',
            ),
            77 => 
            array (
                'id' => 1078,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 14:11:31',
                'updated_at' => '2023-06-07 14:11:31',
            ),
            78 => 
            array (
                'id' => 1079,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 14:12:37',
                'updated_at' => '2023-06-07 14:12:37',
            ),
            79 => 
            array (
                'id' => 1080,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 14:26:50',
                'updated_at' => '2023-06-07 14:26:50',
            ),
            80 => 
            array (
                'id' => 1081,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 14:37:00',
                'updated_at' => '2023-06-07 14:37:00',
            ),
            81 => 
            array (
                'id' => 1082,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 14:37:06',
                'updated_at' => '2023-06-07 14:37:06',
            ),
            82 => 
            array (
                'id' => 1083,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 14:43:13',
                'updated_at' => '2023-06-07 14:43:13',
            ),
            83 => 
            array (
                'id' => 1084,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 14:43:18',
                'updated_at' => '2023-06-07 14:43:18',
            ),
            84 => 
            array (
                'id' => 1085,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 14:49:31',
                'updated_at' => '2023-06-07 14:49:31',
            ),
            85 => 
            array (
                'id' => 1086,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 14:49:35',
                'updated_at' => '2023-06-07 14:49:35',
            ),
            86 => 
            array (
                'id' => 1087,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:01:49',
                'updated_at' => '2023-06-07 15:01:49',
            ),
            87 => 
            array (
                'id' => 1088,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:02:49',
                'updated_at' => '2023-06-07 15:02:49',
            ),
            88 => 
            array (
                'id' => 1089,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:02:52',
                'updated_at' => '2023-06-07 15:02:52',
            ),
            89 => 
            array (
                'id' => 1090,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:02:55',
                'updated_at' => '2023-06-07 15:02:55',
            ),
            90 => 
            array (
                'id' => 1091,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:02:58',
                'updated_at' => '2023-06-07 15:02:58',
            ),
            91 => 
            array (
                'id' => 1092,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:03:02',
                'updated_at' => '2023-06-07 15:03:02',
            ),
            92 => 
            array (
                'id' => 1093,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:03:27',
                'updated_at' => '2023-06-07 15:03:27',
            ),
            93 => 
            array (
                'id' => 1094,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:03:31',
                'updated_at' => '2023-06-07 15:03:31',
            ),
            94 => 
            array (
                'id' => 1095,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:03:34',
                'updated_at' => '2023-06-07 15:03:34',
            ),
            95 => 
            array (
                'id' => 1096,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 15:06:15',
                'updated_at' => '2023-06-07 15:06:15',
            ),
            96 => 
            array (
                'id' => 1097,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 15:06:18',
                'updated_at' => '2023-06-07 15:06:18',
            ),
            97 => 
            array (
                'id' => 1098,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 15:06:23',
                'updated_at' => '2023-06-07 15:06:23',
            ),
            98 => 
            array (
                'id' => 1099,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 15:06:26',
                'updated_at' => '2023-06-07 15:06:26',
            ),
            99 => 
            array (
                'id' => 1100,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:18:25',
                'updated_at' => '2023-06-07 15:18:25',
            ),
            100 => 
            array (
                'id' => 1101,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:20:51',
                'updated_at' => '2023-06-07 15:20:51',
            ),
            101 => 
            array (
                'id' => 1102,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:21:03',
                'updated_at' => '2023-06-07 15:21:03',
            ),
            102 => 
            array (
                'id' => 1103,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:25:25',
                'updated_at' => '2023-06-07 15:25:25',
            ),
            103 => 
            array (
                'id' => 1104,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:25:32',
                'updated_at' => '2023-06-07 15:25:32',
            ),
            104 => 
            array (
                'id' => 1105,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:25:39',
                'updated_at' => '2023-06-07 15:25:39',
            ),
            105 => 
            array (
                'id' => 1106,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:25:50',
                'updated_at' => '2023-06-07 15:25:50',
            ),
            106 => 
            array (
                'id' => 1107,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 15:26:04',
                'updated_at' => '2023-06-07 15:26:04',
            ),
            107 => 
            array (
                'id' => 1108,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:30:51',
                'updated_at' => '2023-06-07 15:30:51',
            ),
            108 => 
            array (
                'id' => 1109,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 15:30:56',
                'updated_at' => '2023-06-07 15:30:56',
            ),
            109 => 
            array (
                'id' => 1110,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 16:14:38',
                'updated_at' => '2023-06-07 16:14:38',
            ),
            110 => 
            array (
                'id' => 1111,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 16:27:25',
                'updated_at' => '2023-06-07 16:27:25',
            ),
            111 => 
            array (
                'id' => 1112,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 16:29:44',
                'updated_at' => '2023-06-07 16:29:44',
            ),
            112 => 
            array (
                'id' => 1113,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 16:30:31',
                'updated_at' => '2023-06-07 16:30:31',
            ),
            113 => 
            array (
                'id' => 1114,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 16:31:08',
                'updated_at' => '2023-06-07 16:31:08',
            ),
            114 => 
            array (
                'id' => 1115,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 16:31:31',
                'updated_at' => '2023-06-07 16:31:31',
            ),
            115 => 
            array (
                'id' => 1116,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 16:31:38',
                'updated_at' => '2023-06-07 16:31:38',
            ),
            116 => 
            array (
                'id' => 1117,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 16:37:24',
                'updated_at' => '2023-06-07 16:37:24',
            ),
            117 => 
            array (
                'id' => 1118,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 16:37:29',
                'updated_at' => '2023-06-07 16:37:29',
            ),
            118 => 
            array (
                'id' => 1119,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 16:45:13',
                'updated_at' => '2023-06-07 16:45:13',
            ),
            119 => 
            array (
                'id' => 1120,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 16:54:18',
                'updated_at' => '2023-06-07 16:54:18',
            ),
            120 => 
            array (
                'id' => 1121,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 16:54:22',
                'updated_at' => '2023-06-07 16:54:22',
            ),
            121 => 
            array (
                'id' => 1122,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 16:56:10',
                'updated_at' => '2023-06-07 16:56:10',
            ),
            122 => 
            array (
                'id' => 1123,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-07 16:56:17',
                'updated_at' => '2023-06-07 16:56:17',
            ),
            123 => 
            array (
                'id' => 1124,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 16:56:21',
                'updated_at' => '2023-06-07 16:56:21',
            ),
            124 => 
            array (
                'id' => 1125,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 16:56:23',
                'updated_at' => '2023-06-07 16:56:23',
            ),
            125 => 
            array (
                'id' => 1126,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 16:56:28',
                'updated_at' => '2023-06-07 16:56:28',
            ),
            126 => 
            array (
                'id' => 1127,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 16:56:53',
                'updated_at' => '2023-06-07 16:56:53',
            ),
            127 => 
            array (
                'id' => 1128,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-07 16:56:58',
                'updated_at' => '2023-06-07 16:56:58',
            ),
            128 => 
            array (
                'id' => 1129,
                'ip_address' => '162.158.162.20',
                'visit_status' => 0,
                'location' => 'Jagati, Bhaktapur',
                'created_at' => '2023-06-07 18:34:32',
                'updated_at' => '2023-06-07 18:34:32',
            ),
            129 => 
            array (
                'id' => 1130,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Jagati, Bhaktapur',
                'created_at' => '2023-06-07 19:10:31',
                'updated_at' => '2023-06-07 19:10:31',
            ),
            130 => 
            array (
                'id' => 1131,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-08 10:26:41',
                'updated_at' => '2023-06-08 10:26:41',
            ),
            131 => 
            array (
                'id' => 1132,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 10:27:41',
                'updated_at' => '2023-06-08 10:27:41',
            ),
            132 => 
            array (
                'id' => 1133,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 10:28:00',
                'updated_at' => '2023-06-08 10:28:00',
            ),
            133 => 
            array (
                'id' => 1134,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 10:30:01',
                'updated_at' => '2023-06-08 10:30:01',
            ),
            134 => 
            array (
                'id' => 1135,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 10:30:01',
                'updated_at' => '2023-06-08 10:30:01',
            ),
            135 => 
            array (
                'id' => 1136,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 10:30:04',
                'updated_at' => '2023-06-08 10:30:04',
            ),
            136 => 
            array (
                'id' => 1137,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 10:30:07',
                'updated_at' => '2023-06-08 10:30:07',
            ),
            137 => 
            array (
                'id' => 1138,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-08 10:47:08',
                'updated_at' => '2023-06-08 10:47:08',
            ),
            138 => 
            array (
                'id' => 1139,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 10:48:52',
                'updated_at' => '2023-06-08 10:48:52',
            ),
            139 => 
            array (
                'id' => 1140,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 11:00:32',
                'updated_at' => '2023-06-08 11:00:32',
            ),
            140 => 
            array (
                'id' => 1141,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 11:24:28',
                'updated_at' => '2023-06-08 11:24:28',
            ),
            141 => 
            array (
                'id' => 1142,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 11:24:38',
                'updated_at' => '2023-06-08 11:24:38',
            ),
            142 => 
            array (
                'id' => 1143,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 11:24:45',
                'updated_at' => '2023-06-08 11:24:45',
            ),
            143 => 
            array (
                'id' => 1144,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 11:24:48',
                'updated_at' => '2023-06-08 11:24:48',
            ),
            144 => 
            array (
                'id' => 1145,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 11:26:19',
                'updated_at' => '2023-06-08 11:26:19',
            ),
            145 => 
            array (
                'id' => 1146,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 11:29:00',
                'updated_at' => '2023-06-08 11:29:00',
            ),
            146 => 
            array (
                'id' => 1147,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 11:36:00',
                'updated_at' => '2023-06-08 11:36:00',
            ),
            147 => 
            array (
                'id' => 1148,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 11:56:55',
                'updated_at' => '2023-06-08 11:56:55',
            ),
            148 => 
            array (
                'id' => 1149,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 12:15:42',
                'updated_at' => '2023-06-08 12:15:42',
            ),
            149 => 
            array (
                'id' => 1150,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 14:22:22',
                'updated_at' => '2023-06-08 14:22:22',
            ),
            150 => 
            array (
                'id' => 1151,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-08 14:49:44',
                'updated_at' => '2023-06-08 14:49:44',
            ),
            151 => 
            array (
                'id' => 1152,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-08 14:49:51',
                'updated_at' => '2023-06-08 14:49:51',
            ),
            152 => 
            array (
                'id' => 1153,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-08 15:42:41',
                'updated_at' => '2023-06-08 15:42:41',
            ),
            153 => 
            array (
                'id' => 1154,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 15:43:02',
                'updated_at' => '2023-06-08 15:43:02',
            ),
            154 => 
            array (
                'id' => 1155,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 15:43:38',
                'updated_at' => '2023-06-08 15:43:38',
            ),
            155 => 
            array (
                'id' => 1156,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 16:43:21',
                'updated_at' => '2023-06-08 16:43:21',
            ),
            156 => 
            array (
                'id' => 1157,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Banasthali, Kathmandu',
                'created_at' => '2023-06-08 16:49:54',
                'updated_at' => '2023-06-08 16:49:54',
            ),
            157 => 
            array (
                'id' => 1158,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-09 10:16:14',
                'updated_at' => '2023-06-09 10:16:14',
            ),
            158 => 
            array (
                'id' => 1159,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 11:17:59',
                'updated_at' => '2023-06-09 11:17:59',
            ),
            159 => 
            array (
                'id' => 1160,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 11:25:35',
                'updated_at' => '2023-06-09 11:25:35',
            ),
            160 => 
            array (
                'id' => 1161,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 12:00:22',
                'updated_at' => '2023-06-09 12:00:22',
            ),
            161 => 
            array (
                'id' => 1162,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 12:02:33',
                'updated_at' => '2023-06-09 12:02:33',
            ),
            162 => 
            array (
                'id' => 1163,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-09 12:02:59',
                'updated_at' => '2023-06-09 12:02:59',
            ),
            163 => 
            array (
                'id' => 1164,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 12:03:37',
                'updated_at' => '2023-06-09 12:03:37',
            ),
            164 => 
            array (
                'id' => 1165,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 12:05:28',
                'updated_at' => '2023-06-09 12:05:28',
            ),
            165 => 
            array (
                'id' => 1166,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 12:26:02',
                'updated_at' => '2023-06-09 12:26:02',
            ),
            166 => 
            array (
                'id' => 1167,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 12:31:21',
                'updated_at' => '2023-06-09 12:31:21',
            ),
            167 => 
            array (
                'id' => 1168,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Koteshwor, Kathmandu',
                'created_at' => '2023-06-09 12:31:29',
                'updated_at' => '2023-06-09 12:31:29',
            ),
            168 => 
            array (
                'id' => 1169,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Koteshwor, Kathmandu',
                'created_at' => '2023-06-09 12:32:35',
                'updated_at' => '2023-06-09 12:32:35',
            ),
            169 => 
            array (
                'id' => 1170,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Koteshwor, Kathmandu',
                'created_at' => '2023-06-09 12:33:10',
                'updated_at' => '2023-06-09 12:33:10',
            ),
            170 => 
            array (
                'id' => 1171,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Koteshwor, Kathmandu',
                'created_at' => '2023-06-09 12:34:17',
                'updated_at' => '2023-06-09 12:34:17',
            ),
            171 => 
            array (
                'id' => 1172,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Koteshwor, Kathmandu',
                'created_at' => '2023-06-09 12:34:31',
                'updated_at' => '2023-06-09 12:34:31',
            ),
            172 => 
            array (
                'id' => 1173,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Koteshwor, Kathmandu',
                'created_at' => '2023-06-09 12:38:20',
                'updated_at' => '2023-06-09 12:38:20',
            ),
            173 => 
            array (
                'id' => 1174,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 12:38:50',
                'updated_at' => '2023-06-09 12:38:50',
            ),
            174 => 
            array (
                'id' => 1175,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 12:40:18',
                'updated_at' => '2023-06-09 12:40:18',
            ),
            175 => 
            array (
                'id' => 1176,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-09 12:40:41',
                'updated_at' => '2023-06-09 12:40:41',
            ),
            176 => 
            array (
                'id' => 1177,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-09 12:41:29',
                'updated_at' => '2023-06-09 12:41:29',
            ),
            177 => 
            array (
                'id' => 1178,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-09 12:44:24',
                'updated_at' => '2023-06-09 12:44:24',
            ),
            178 => 
            array (
                'id' => 1179,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 12:51:01',
                'updated_at' => '2023-06-09 12:51:01',
            ),
            179 => 
            array (
                'id' => 1180,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 12:54:46',
                'updated_at' => '2023-06-09 12:54:46',
            ),
            180 => 
            array (
                'id' => 1181,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 13:11:14',
                'updated_at' => '2023-06-09 13:11:14',
            ),
            181 => 
            array (
                'id' => 1182,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-09 13:28:20',
                'updated_at' => '2023-06-09 13:28:20',
            ),
            182 => 
            array (
                'id' => 1183,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 13:45:24',
                'updated_at' => '2023-06-09 13:45:24',
            ),
            183 => 
            array (
                'id' => 1184,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 13:45:30',
                'updated_at' => '2023-06-09 13:45:30',
            ),
            184 => 
            array (
                'id' => 1185,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-09 13:49:49',
                'updated_at' => '2023-06-09 13:49:49',
            ),
            185 => 
            array (
                'id' => 1186,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-09 16:22:56',
                'updated_at' => '2023-06-09 16:22:56',
            ),
            186 => 
            array (
                'id' => 1187,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-09 16:22:59',
                'updated_at' => '2023-06-09 16:22:59',
            ),
            187 => 
            array (
                'id' => 1188,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-11 10:43:30',
                'updated_at' => '2023-06-11 10:43:30',
            ),
            188 => 
            array (
                'id' => 1189,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-11 10:48:30',
                'updated_at' => '2023-06-11 10:48:30',
            ),
            189 => 
            array (
                'id' => 1190,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-11 10:49:57',
                'updated_at' => '2023-06-11 10:49:57',
            ),
            190 => 
            array (
                'id' => 1191,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-11 11:23:03',
                'updated_at' => '2023-06-11 11:23:03',
            ),
            191 => 
            array (
                'id' => 1192,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Thaikot, Thaikot',
                'created_at' => '2023-06-11 11:24:00',
                'updated_at' => '2023-06-11 11:24:00',
            ),
            192 => 
            array (
                'id' => 1193,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-11 11:51:49',
                'updated_at' => '2023-06-11 11:51:49',
            ),
            193 => 
            array (
                'id' => 1194,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-11 12:17:20',
                'updated_at' => '2023-06-11 12:17:20',
            ),
            194 => 
            array (
                'id' => 1195,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-11 12:19:29',
                'updated_at' => '2023-06-11 12:19:29',
            ),
            195 => 
            array (
                'id' => 1196,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-11 12:30:42',
                'updated_at' => '2023-06-11 12:30:42',
            ),
            196 => 
            array (
                'id' => 1197,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-11 14:44:54',
                'updated_at' => '2023-06-11 14:44:54',
            ),
            197 => 
            array (
                'id' => 1198,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-11 14:49:20',
                'updated_at' => '2023-06-11 14:49:20',
            ),
            198 => 
            array (
                'id' => 1199,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-11 15:05:34',
                'updated_at' => '2023-06-11 15:05:34',
            ),
            199 => 
            array (
                'id' => 1200,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-12 10:34:54',
                'updated_at' => '2023-06-12 10:34:54',
            ),
            200 => 
            array (
                'id' => 1201,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-12 11:53:08',
                'updated_at' => '2023-06-12 11:53:08',
            ),
            201 => 
            array (
                'id' => 1202,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-12 11:54:13',
                'updated_at' => '2023-06-12 11:54:13',
            ),
            202 => 
            array (
                'id' => 1203,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-12 11:54:15',
                'updated_at' => '2023-06-12 11:54:15',
            ),
            203 => 
            array (
                'id' => 1204,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-12 11:54:24',
                'updated_at' => '2023-06-12 11:54:24',
            ),
            204 => 
            array (
                'id' => 1205,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-12 11:54:50',
                'updated_at' => '2023-06-12 11:54:50',
            ),
            205 => 
            array (
                'id' => 1206,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-12 11:57:35',
                'updated_at' => '2023-06-12 11:57:35',
            ),
            206 => 
            array (
                'id' => 1207,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-12 11:58:24',
                'updated_at' => '2023-06-12 11:58:24',
            ),
            207 => 
            array (
                'id' => 1208,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-12 11:59:01',
                'updated_at' => '2023-06-12 11:59:01',
            ),
            208 => 
            array (
                'id' => 1209,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-12 12:32:29',
                'updated_at' => '2023-06-12 12:32:29',
            ),
            209 => 
            array (
                'id' => 1210,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Department of Urban Development and Building Construction, Kathmandu',
                'created_at' => '2023-06-12 14:12:58',
                'updated_at' => '2023-06-12 14:12:58',
            ),
            210 => 
            array (
                'id' => 1211,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'B&G Kids Wear, Kathmandu',
                'created_at' => '2023-06-13 11:42:46',
                'updated_at' => '2023-06-13 11:42:46',
            ),
            211 => 
            array (
                'id' => 1212,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 11:48:53',
                'updated_at' => '2023-06-13 11:48:53',
            ),
            212 => 
            array (
                'id' => 1213,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 11:51:38',
                'updated_at' => '2023-06-13 11:51:38',
            ),
            213 => 
            array (
                'id' => 1214,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 11:53:17',
                'updated_at' => '2023-06-13 11:53:17',
            ),
            214 => 
            array (
                'id' => 1215,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 11:55:19',
                'updated_at' => '2023-06-13 11:55:19',
            ),
            215 => 
            array (
                'id' => 1216,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 11:55:40',
                'updated_at' => '2023-06-13 11:55:40',
            ),
            216 => 
            array (
                'id' => 1217,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 12:13:59',
                'updated_at' => '2023-06-13 12:13:59',
            ),
            217 => 
            array (
                'id' => 1218,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 12:14:57',
                'updated_at' => '2023-06-13 12:14:57',
            ),
            218 => 
            array (
                'id' => 1219,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 12:34:37',
                'updated_at' => '2023-06-13 12:34:37',
            ),
            219 => 
            array (
                'id' => 1220,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 12:37:16',
                'updated_at' => '2023-06-13 12:37:16',
            ),
            220 => 
            array (
                'id' => 1221,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 12:43:51',
                'updated_at' => '2023-06-13 12:43:51',
            ),
            221 => 
            array (
                'id' => 1222,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 12:47:16',
                'updated_at' => '2023-06-13 12:47:16',
            ),
            222 => 
            array (
                'id' => 1223,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 12:59:10',
                'updated_at' => '2023-06-13 12:59:10',
            ),
            223 => 
            array (
                'id' => 1224,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 14:14:17',
                'updated_at' => '2023-06-13 14:14:17',
            ),
            224 => 
            array (
                'id' => 1225,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 14:18:23',
                'updated_at' => '2023-06-13 14:18:23',
            ),
            225 => 
            array (
                'id' => 1226,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 14:18:27',
                'updated_at' => '2023-06-13 14:18:27',
            ),
            226 => 
            array (
                'id' => 1227,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 14:18:35',
                'updated_at' => '2023-06-13 14:18:35',
            ),
            227 => 
            array (
                'id' => 1228,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 14:20:03',
                'updated_at' => '2023-06-13 14:20:03',
            ),
            228 => 
            array (
                'id' => 1229,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 14:42:24',
                'updated_at' => '2023-06-13 14:42:24',
            ),
            229 => 
            array (
                'id' => 1230,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 15:02:30',
                'updated_at' => '2023-06-13 15:02:30',
            ),
            230 => 
            array (
                'id' => 1231,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 15:12:35',
                'updated_at' => '2023-06-13 15:12:35',
            ),
            231 => 
            array (
                'id' => 1232,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 15:12:48',
                'updated_at' => '2023-06-13 15:12:48',
            ),
            232 => 
            array (
                'id' => 1233,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'B&G Kids Wear, Kathmandu',
                'created_at' => '2023-06-13 15:14:33',
                'updated_at' => '2023-06-13 15:14:33',
            ),
            233 => 
            array (
                'id' => 1234,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'B&G Kids Wear, Kathmandu',
                'created_at' => '2023-06-13 15:17:40',
                'updated_at' => '2023-06-13 15:17:40',
            ),
            234 => 
            array (
                'id' => 1235,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 16:05:48',
                'updated_at' => '2023-06-13 16:05:48',
            ),
            235 => 
            array (
                'id' => 1236,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 16:15:55',
                'updated_at' => '2023-06-13 16:15:55',
            ),
            236 => 
            array (
                'id' => 1237,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 16:16:15',
                'updated_at' => '2023-06-13 16:16:15',
            ),
            237 => 
            array (
                'id' => 1238,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 16:17:04',
                'updated_at' => '2023-06-13 16:17:04',
            ),
            238 => 
            array (
                'id' => 1239,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 16:20:58',
                'updated_at' => '2023-06-13 16:20:58',
            ),
            239 => 
            array (
                'id' => 1240,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 16:24:10',
                'updated_at' => '2023-06-13 16:24:10',
            ),
            240 => 
            array (
                'id' => 1241,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 16:31:10',
                'updated_at' => '2023-06-13 16:31:10',
            ),
            241 => 
            array (
                'id' => 1242,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 16:31:17',
                'updated_at' => '2023-06-13 16:31:17',
            ),
            242 => 
            array (
                'id' => 1243,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 16:31:24',
                'updated_at' => '2023-06-13 16:31:24',
            ),
            243 => 
            array (
                'id' => 1244,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-13 16:33:42',
                'updated_at' => '2023-06-13 16:33:42',
            ),
            244 => 
            array (
                'id' => 1245,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'B&G Kids Wear, Kathmandu',
                'created_at' => '2023-06-13 16:41:54',
                'updated_at' => '2023-06-13 16:41:54',
            ),
            245 => 
            array (
                'id' => 1246,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Vishwa Niketan Higher Secondary School, Kathmandu',
                'created_at' => '2023-06-13 16:52:22',
                'updated_at' => '2023-06-13 16:52:22',
            ),
            246 => 
            array (
                'id' => 1247,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'B&G Kids Wear, Kathmandu',
                'created_at' => '2023-06-13 16:53:38',
                'updated_at' => '2023-06-13 16:53:38',
            ),
            247 => 
            array (
                'id' => 1248,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'B&G Kids Wear, Kathmandu',
                'created_at' => '2023-06-13 16:53:47',
                'updated_at' => '2023-06-13 16:53:47',
            ),
            248 => 
            array (
                'id' => 1249,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 10:49:07',
                'updated_at' => '2023-06-14 10:49:07',
            ),
            249 => 
            array (
                'id' => 1250,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 10:52:05',
                'updated_at' => '2023-06-14 10:52:05',
            ),
            250 => 
            array (
                'id' => 1251,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 10:53:09',
                'updated_at' => '2023-06-14 10:53:09',
            ),
            251 => 
            array (
                'id' => 1252,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 10:54:59',
                'updated_at' => '2023-06-14 10:54:59',
            ),
            252 => 
            array (
                'id' => 1253,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 10:55:28',
                'updated_at' => '2023-06-14 10:55:28',
            ),
            253 => 
            array (
                'id' => 1254,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 10:57:11',
                'updated_at' => '2023-06-14 10:57:11',
            ),
            254 => 
            array (
                'id' => 1255,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 10:57:17',
                'updated_at' => '2023-06-14 10:57:17',
            ),
            255 => 
            array (
                'id' => 1256,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 10:57:23',
                'updated_at' => '2023-06-14 10:57:23',
            ),
            256 => 
            array (
                'id' => 1257,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 10:57:27',
                'updated_at' => '2023-06-14 10:57:27',
            ),
            257 => 
            array (
                'id' => 1258,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 11:59:47',
                'updated_at' => '2023-06-14 11:59:47',
            ),
            258 => 
            array (
                'id' => 1259,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 14:10:28',
                'updated_at' => '2023-06-14 14:10:28',
            ),
            259 => 
            array (
                'id' => 1260,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 14:24:14',
                'updated_at' => '2023-06-14 14:24:14',
            ),
            260 => 
            array (
                'id' => 1261,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 14:25:50',
                'updated_at' => '2023-06-14 14:25:50',
            ),
            261 => 
            array (
                'id' => 1262,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 14:53:05',
                'updated_at' => '2023-06-14 14:53:05',
            ),
            262 => 
            array (
                'id' => 1263,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Greyfort International School, Kathmandu',
                'created_at' => '2023-06-14 15:13:30',
                'updated_at' => '2023-06-14 15:13:30',
            ),
            263 => 
            array (
                'id' => 1264,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Greyfort International School, Kathmandu',
                'created_at' => '2023-06-14 15:35:02',
                'updated_at' => '2023-06-14 15:35:02',
            ),
            264 => 
            array (
                'id' => 1265,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Greyfort International School, Kathmandu',
                'created_at' => '2023-06-14 15:38:27',
                'updated_at' => '2023-06-14 15:38:27',
            ),
            265 => 
            array (
                'id' => 1266,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Greyfort International School, Kathmandu',
                'created_at' => '2023-06-14 15:38:50',
                'updated_at' => '2023-06-14 15:38:50',
            ),
            266 => 
            array (
                'id' => 1267,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 15:43:41',
                'updated_at' => '2023-06-14 15:43:41',
            ),
            267 => 
            array (
                'id' => 1268,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 16:02:03',
                'updated_at' => '2023-06-14 16:02:03',
            ),
            268 => 
            array (
                'id' => 1269,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 16:32:56',
                'updated_at' => '2023-06-14 16:32:56',
            ),
            269 => 
            array (
                'id' => 1270,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 16:33:05',
                'updated_at' => '2023-06-14 16:33:05',
            ),
            270 => 
            array (
                'id' => 1271,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-14 16:36:53',
                'updated_at' => '2023-06-14 16:36:53',
            ),
            271 => 
            array (
                'id' => 1272,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 10:33:16',
                'updated_at' => '2023-06-15 10:33:16',
            ),
            272 => 
            array (
                'id' => 1273,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 11:14:11',
                'updated_at' => '2023-06-15 11:14:11',
            ),
            273 => 
            array (
                'id' => 1274,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 11:15:54',
                'updated_at' => '2023-06-15 11:15:54',
            ),
            274 => 
            array (
                'id' => 1275,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 11:16:00',
                'updated_at' => '2023-06-15 11:16:00',
            ),
            275 => 
            array (
                'id' => 1276,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 11:29:39',
                'updated_at' => '2023-06-15 11:29:39',
            ),
            276 => 
            array (
                'id' => 1277,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 11:32:37',
                'updated_at' => '2023-06-15 11:32:37',
            ),
            277 => 
            array (
                'id' => 1278,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 11:32:40',
                'updated_at' => '2023-06-15 11:32:40',
            ),
            278 => 
            array (
                'id' => 1279,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 11:34:24',
                'updated_at' => '2023-06-15 11:34:24',
            ),
            279 => 
            array (
                'id' => 1280,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 11:34:25',
                'updated_at' => '2023-06-15 11:34:25',
            ),
            280 => 
            array (
                'id' => 1281,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 11:36:33',
                'updated_at' => '2023-06-15 11:36:33',
            ),
            281 => 
            array (
                'id' => 1282,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 11:36:35',
                'updated_at' => '2023-06-15 11:36:35',
            ),
            282 => 
            array (
                'id' => 1283,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 11:51:03',
                'updated_at' => '2023-06-15 11:51:03',
            ),
            283 => 
            array (
                'id' => 1284,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 11:53:18',
                'updated_at' => '2023-06-15 11:53:18',
            ),
            284 => 
            array (
                'id' => 1285,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 12:40:45',
                'updated_at' => '2023-06-15 12:40:45',
            ),
            285 => 
            array (
                'id' => 1286,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 12:40:45',
                'updated_at' => '2023-06-15 12:40:45',
            ),
            286 => 
            array (
                'id' => 1287,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 12:40:56',
                'updated_at' => '2023-06-15 12:40:56',
            ),
            287 => 
            array (
                'id' => 1288,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 12:42:29',
                'updated_at' => '2023-06-15 12:42:29',
            ),
            288 => 
            array (
                'id' => 1289,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 14:59:50',
                'updated_at' => '2023-06-15 14:59:50',
            ),
            289 => 
            array (
                'id' => 1290,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:23:10',
                'updated_at' => '2023-06-15 15:23:10',
            ),
            290 => 
            array (
                'id' => 1291,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:23:26',
                'updated_at' => '2023-06-15 15:23:26',
            ),
            291 => 
            array (
                'id' => 1292,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:24:22',
                'updated_at' => '2023-06-15 15:24:22',
            ),
            292 => 
            array (
                'id' => 1293,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:24:51',
                'updated_at' => '2023-06-15 15:24:51',
            ),
            293 => 
            array (
                'id' => 1294,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:26:57',
                'updated_at' => '2023-06-15 15:26:57',
            ),
            294 => 
            array (
                'id' => 1295,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:30:59',
                'updated_at' => '2023-06-15 15:30:59',
            ),
            295 => 
            array (
                'id' => 1296,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:32:35',
                'updated_at' => '2023-06-15 15:32:35',
            ),
            296 => 
            array (
                'id' => 1297,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:33:09',
                'updated_at' => '2023-06-15 15:33:09',
            ),
            297 => 
            array (
                'id' => 1298,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:34:14',
                'updated_at' => '2023-06-15 15:34:14',
            ),
            298 => 
            array (
                'id' => 1299,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:34:22',
                'updated_at' => '2023-06-15 15:34:22',
            ),
            299 => 
            array (
                'id' => 1300,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:34:36',
                'updated_at' => '2023-06-15 15:34:36',
            ),
            300 => 
            array (
                'id' => 1301,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:34:48',
                'updated_at' => '2023-06-15 15:34:48',
            ),
            301 => 
            array (
                'id' => 1302,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:46:39',
                'updated_at' => '2023-06-15 15:46:39',
            ),
            302 => 
            array (
                'id' => 1303,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:46:45',
                'updated_at' => '2023-06-15 15:46:45',
            ),
            303 => 
            array (
                'id' => 1304,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:46:48',
                'updated_at' => '2023-06-15 15:46:48',
            ),
            304 => 
            array (
                'id' => 1305,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:46:53',
                'updated_at' => '2023-06-15 15:46:53',
            ),
            305 => 
            array (
                'id' => 1306,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:47:05',
                'updated_at' => '2023-06-15 15:47:05',
            ),
            306 => 
            array (
                'id' => 1307,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-15 15:47:10',
                'updated_at' => '2023-06-15 15:47:10',
            ),
            307 => 
            array (
                'id' => 1308,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-16 11:31:48',
                'updated_at' => '2023-06-16 11:31:48',
            ),
            308 => 
            array (
                'id' => 1309,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-16 12:03:23',
                'updated_at' => '2023-06-16 12:03:23',
            ),
            309 => 
            array (
                'id' => 1310,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-16 12:04:12',
                'updated_at' => '2023-06-16 12:04:12',
            ),
            310 => 
            array (
                'id' => 1311,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-16 12:10:53',
                'updated_at' => '2023-06-16 12:10:53',
            ),
            311 => 
            array (
                'id' => 1312,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-16 14:37:17',
                'updated_at' => '2023-06-16 14:37:17',
            ),
            312 => 
            array (
                'id' => 1313,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-16 15:20:38',
                'updated_at' => '2023-06-16 15:20:38',
            ),
            313 => 
            array (
                'id' => 1314,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-16 15:27:27',
                'updated_at' => '2023-06-16 15:27:27',
            ),
            314 => 
            array (
                'id' => 1315,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 10:31:01',
                'updated_at' => '2023-06-18 10:31:01',
            ),
            315 => 
            array (
                'id' => 1316,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 11:04:47',
                'updated_at' => '2023-06-18 11:04:47',
            ),
            316 => 
            array (
                'id' => 1317,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 11:05:01',
                'updated_at' => '2023-06-18 11:05:01',
            ),
            317 => 
            array (
                'id' => 1318,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 12:14:00',
                'updated_at' => '2023-06-18 12:14:00',
            ),
            318 => 
            array (
                'id' => 1319,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:21:41',
                'updated_at' => '2023-06-18 14:21:41',
            ),
            319 => 
            array (
                'id' => 1320,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:33:27',
                'updated_at' => '2023-06-18 14:33:27',
            ),
            320 => 
            array (
                'id' => 1321,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:47:06',
                'updated_at' => '2023-06-18 14:47:06',
            ),
            321 => 
            array (
                'id' => 1322,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:51:06',
                'updated_at' => '2023-06-18 14:51:06',
            ),
            322 => 
            array (
                'id' => 1323,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:51:12',
                'updated_at' => '2023-06-18 14:51:12',
            ),
            323 => 
            array (
                'id' => 1324,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:51:15',
                'updated_at' => '2023-06-18 14:51:15',
            ),
            324 => 
            array (
                'id' => 1325,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:51:29',
                'updated_at' => '2023-06-18 14:51:29',
            ),
            325 => 
            array (
                'id' => 1326,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:51:32',
                'updated_at' => '2023-06-18 14:51:32',
            ),
            326 => 
            array (
                'id' => 1327,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:51:41',
                'updated_at' => '2023-06-18 14:51:41',
            ),
            327 => 
            array (
                'id' => 1328,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:51:44',
                'updated_at' => '2023-06-18 14:51:44',
            ),
            328 => 
            array (
                'id' => 1329,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:52:20',
                'updated_at' => '2023-06-18 14:52:20',
            ),
            329 => 
            array (
                'id' => 1330,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:52:25',
                'updated_at' => '2023-06-18 14:52:25',
            ),
            330 => 
            array (
                'id' => 1331,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:52:27',
                'updated_at' => '2023-06-18 14:52:27',
            ),
            331 => 
            array (
                'id' => 1332,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:52:30',
                'updated_at' => '2023-06-18 14:52:30',
            ),
            332 => 
            array (
                'id' => 1333,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:52:41',
                'updated_at' => '2023-06-18 14:52:41',
            ),
            333 => 
            array (
                'id' => 1334,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:52:45',
                'updated_at' => '2023-06-18 14:52:45',
            ),
            334 => 
            array (
                'id' => 1335,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:52:48',
                'updated_at' => '2023-06-18 14:52:48',
            ),
            335 => 
            array (
                'id' => 1336,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 14:52:59',
                'updated_at' => '2023-06-18 14:52:59',
            ),
            336 => 
            array (
                'id' => 1337,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 15:25:51',
                'updated_at' => '2023-06-18 15:25:51',
            ),
            337 => 
            array (
                'id' => 1338,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 15:34:55',
                'updated_at' => '2023-06-18 15:34:55',
            ),
            338 => 
            array (
                'id' => 1339,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 15:34:57',
                'updated_at' => '2023-06-18 15:34:57',
            ),
            339 => 
            array (
                'id' => 1340,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 16:17:57',
                'updated_at' => '2023-06-18 16:17:57',
            ),
            340 => 
            array (
                'id' => 1341,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-18 16:38:59',
                'updated_at' => '2023-06-18 16:38:59',
            ),
            341 => 
            array (
                'id' => 1342,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-19 08:17:04',
                'updated_at' => '2023-06-19 08:17:04',
            ),
            342 => 
            array (
                'id' => 1343,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-19 11:22:10',
                'updated_at' => '2023-06-19 11:22:10',
            ),
            343 => 
            array (
                'id' => 1344,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-19 11:35:21',
                'updated_at' => '2023-06-19 11:35:21',
            ),
            344 => 
            array (
                'id' => 1345,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-19 11:38:20',
                'updated_at' => '2023-06-19 11:38:20',
            ),
            345 => 
            array (
                'id' => 1346,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-19 12:51:09',
                'updated_at' => '2023-06-19 12:51:09',
            ),
            346 => 
            array (
                'id' => 1347,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-19 12:51:44',
                'updated_at' => '2023-06-19 12:51:44',
            ),
            347 => 
            array (
                'id' => 1348,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-19 12:52:49',
                'updated_at' => '2023-06-19 12:52:49',
            ),
            348 => 
            array (
                'id' => 1349,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 10:16:55',
                'updated_at' => '2023-06-20 10:16:55',
            ),
            349 => 
            array (
                'id' => 1350,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 10:27:59',
                'updated_at' => '2023-06-20 10:27:59',
            ),
            350 => 
            array (
                'id' => 1351,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 10:40:13',
                'updated_at' => '2023-06-20 10:40:13',
            ),
            351 => 
            array (
                'id' => 1352,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 11:37:46',
                'updated_at' => '2023-06-20 11:37:46',
            ),
            352 => 
            array (
                'id' => 1353,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 11:39:33',
                'updated_at' => '2023-06-20 11:39:33',
            ),
            353 => 
            array (
                'id' => 1354,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 12:03:52',
                'updated_at' => '2023-06-20 12:03:52',
            ),
            354 => 
            array (
                'id' => 1355,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 12:28:53',
                'updated_at' => '2023-06-20 12:28:53',
            ),
            355 => 
            array (
                'id' => 1356,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:09:29',
                'updated_at' => '2023-06-20 14:09:29',
            ),
            356 => 
            array (
                'id' => 1357,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:11:50',
                'updated_at' => '2023-06-20 14:11:50',
            ),
            357 => 
            array (
                'id' => 1358,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:12:15',
                'updated_at' => '2023-06-20 14:12:15',
            ),
            358 => 
            array (
                'id' => 1359,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:26:54',
                'updated_at' => '2023-06-20 14:26:54',
            ),
            359 => 
            array (
                'id' => 1360,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:34:12',
                'updated_at' => '2023-06-20 14:34:12',
            ),
            360 => 
            array (
                'id' => 1361,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:34:15',
                'updated_at' => '2023-06-20 14:34:15',
            ),
            361 => 
            array (
                'id' => 1362,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:44:25',
                'updated_at' => '2023-06-20 14:44:25',
            ),
            362 => 
            array (
                'id' => 1363,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:49:51',
                'updated_at' => '2023-06-20 14:49:51',
            ),
            363 => 
            array (
                'id' => 1364,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:50:32',
                'updated_at' => '2023-06-20 14:50:32',
            ),
            364 => 
            array (
                'id' => 1365,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:50:48',
                'updated_at' => '2023-06-20 14:50:48',
            ),
            365 => 
            array (
                'id' => 1366,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:51:02',
                'updated_at' => '2023-06-20 14:51:02',
            ),
            366 => 
            array (
                'id' => 1367,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:51:25',
                'updated_at' => '2023-06-20 14:51:25',
            ),
            367 => 
            array (
                'id' => 1368,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:51:51',
                'updated_at' => '2023-06-20 14:51:51',
            ),
            368 => 
            array (
                'id' => 1369,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 14:52:14',
                'updated_at' => '2023-06-20 14:52:14',
            ),
            369 => 
            array (
                'id' => 1370,
                'ip_address' => '172.70.246.166',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-20 19:44:54',
                'updated_at' => '2023-06-20 19:44:54',
            ),
            370 => 
            array (
                'id' => 1371,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 10:44:31',
                'updated_at' => '2023-06-21 10:44:31',
            ),
            371 => 
            array (
                'id' => 1372,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 10:47:37',
                'updated_at' => '2023-06-21 10:47:37',
            ),
            372 => 
            array (
                'id' => 1373,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 10:48:30',
                'updated_at' => '2023-06-21 10:48:30',
            ),
            373 => 
            array (
                'id' => 1374,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 10:57:51',
                'updated_at' => '2023-06-21 10:57:51',
            ),
            374 => 
            array (
                'id' => 1375,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 11:14:33',
                'updated_at' => '2023-06-21 11:14:33',
            ),
            375 => 
            array (
                'id' => 1376,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 11:15:38',
                'updated_at' => '2023-06-21 11:15:38',
            ),
            376 => 
            array (
                'id' => 1377,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 11:15:40',
                'updated_at' => '2023-06-21 11:15:40',
            ),
            377 => 
            array (
                'id' => 1378,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 11:15:44',
                'updated_at' => '2023-06-21 11:15:44',
            ),
            378 => 
            array (
                'id' => 1379,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 11:25:03',
                'updated_at' => '2023-06-21 11:25:03',
            ),
            379 => 
            array (
                'id' => 1380,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 11:29:40',
                'updated_at' => '2023-06-21 11:29:40',
            ),
            380 => 
            array (
                'id' => 1381,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 11:51:28',
                'updated_at' => '2023-06-21 11:51:28',
            ),
            381 => 
            array (
                'id' => 1382,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 11:51:30',
                'updated_at' => '2023-06-21 11:51:30',
            ),
            382 => 
            array (
                'id' => 1383,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 11:51:33',
                'updated_at' => '2023-06-21 11:51:33',
            ),
            383 => 
            array (
                'id' => 1384,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 11:51:37',
                'updated_at' => '2023-06-21 11:51:37',
            ),
            384 => 
            array (
                'id' => 1385,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 11:51:44',
                'updated_at' => '2023-06-21 11:51:44',
            ),
            385 => 
            array (
                'id' => 1386,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 11:53:10',
                'updated_at' => '2023-06-21 11:53:10',
            ),
            386 => 
            array (
                'id' => 1387,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 12:20:14',
                'updated_at' => '2023-06-21 12:20:14',
            ),
            387 => 
            array (
                'id' => 1388,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 12:21:04',
                'updated_at' => '2023-06-21 12:21:04',
            ),
            388 => 
            array (
                'id' => 1389,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 12:26:35',
                'updated_at' => '2023-06-21 12:26:35',
            ),
            389 => 
            array (
                'id' => 1390,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 12:37:17',
                'updated_at' => '2023-06-21 12:37:17',
            ),
            390 => 
            array (
                'id' => 1391,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 12:44:46',
                'updated_at' => '2023-06-21 12:44:46',
            ),
            391 => 
            array (
                'id' => 1392,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 12:51:26',
                'updated_at' => '2023-06-21 12:51:26',
            ),
            392 => 
            array (
                'id' => 1393,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 13:59:43',
                'updated_at' => '2023-06-21 13:59:43',
            ),
            393 => 
            array (
                'id' => 1394,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 14:05:45',
                'updated_at' => '2023-06-21 14:05:45',
            ),
            394 => 
            array (
                'id' => 1395,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 14:19:50',
                'updated_at' => '2023-06-21 14:19:50',
            ),
            395 => 
            array (
                'id' => 1396,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 14:24:58',
                'updated_at' => '2023-06-21 14:24:58',
            ),
            396 => 
            array (
                'id' => 1397,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 14:32:35',
                'updated_at' => '2023-06-21 14:32:35',
            ),
            397 => 
            array (
                'id' => 1398,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 15:13:32',
                'updated_at' => '2023-06-21 15:13:32',
            ),
            398 => 
            array (
                'id' => 1399,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 15:45:47',
                'updated_at' => '2023-06-21 15:45:47',
            ),
            399 => 
            array (
                'id' => 1400,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 16:03:11',
                'updated_at' => '2023-06-21 16:03:11',
            ),
            400 => 
            array (
                'id' => 1401,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 16:03:58',
                'updated_at' => '2023-06-21 16:03:58',
            ),
            401 => 
            array (
                'id' => 1402,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 16:07:06',
                'updated_at' => '2023-06-21 16:07:06',
            ),
            402 => 
            array (
                'id' => 1403,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-21 16:33:47',
                'updated_at' => '2023-06-21 16:33:47',
            ),
            403 => 
            array (
                'id' => 1404,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-22 10:21:15',
                'updated_at' => '2023-06-22 10:21:15',
            ),
            404 => 
            array (
                'id' => 1405,
                'ip_address' => '172.70.250.153',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-22 11:09:05',
                'updated_at' => '2023-06-22 11:09:05',
            ),
            405 => 
            array (
                'id' => 1406,
                'ip_address' => '172.70.251.179',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-22 11:10:00',
                'updated_at' => '2023-06-22 11:10:00',
            ),
            406 => 
            array (
                'id' => 1407,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-22 11:12:20',
                'updated_at' => '2023-06-22 11:12:20',
            ),
            407 => 
            array (
                'id' => 1408,
                'ip_address' => '172.70.251.66',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-22 11:14:09',
                'updated_at' => '2023-06-22 11:14:09',
            ),
            408 => 
            array (
                'id' => 1409,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-22 11:14:21',
                'updated_at' => '2023-06-22 11:14:21',
            ),
            409 => 
            array (
                'id' => 1410,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-22 14:35:30',
                'updated_at' => '2023-06-22 14:35:30',
            ),
            410 => 
            array (
                'id' => 1411,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-22 15:04:09',
                'updated_at' => '2023-06-22 15:04:09',
            ),
            411 => 
            array (
                'id' => 1412,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-22 15:04:18',
                'updated_at' => '2023-06-22 15:04:18',
            ),
            412 => 
            array (
                'id' => 1413,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-22 15:07:19',
                'updated_at' => '2023-06-22 15:07:19',
            ),
            413 => 
            array (
                'id' => 1414,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-23 12:15:03',
                'updated_at' => '2023-06-23 12:15:03',
            ),
            414 => 
            array (
                'id' => 1415,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-23 12:15:31',
                'updated_at' => '2023-06-23 12:15:31',
            ),
            415 => 
            array (
                'id' => 1416,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-23 12:19:57',
                'updated_at' => '2023-06-23 12:19:57',
            ),
            416 => 
            array (
                'id' => 1417,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-23 12:54:46',
                'updated_at' => '2023-06-23 12:54:46',
            ),
            417 => 
            array (
                'id' => 1418,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-23 14:07:28',
                'updated_at' => '2023-06-23 14:07:28',
            ),
            418 => 
            array (
                'id' => 1419,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-24 17:20:18',
                'updated_at' => '2023-06-24 17:20:18',
            ),
            419 => 
            array (
                'id' => 1420,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-25 10:27:10',
                'updated_at' => '2023-06-25 10:27:10',
            ),
            420 => 
            array (
                'id' => 1421,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-25 10:51:21',
                'updated_at' => '2023-06-25 10:51:21',
            ),
            421 => 
            array (
                'id' => 1422,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-25 11:12:35',
                'updated_at' => '2023-06-25 11:12:35',
            ),
            422 => 
            array (
                'id' => 1423,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-25 11:12:55',
                'updated_at' => '2023-06-25 11:12:55',
            ),
            423 => 
            array (
                'id' => 1424,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-25 11:13:42',
                'updated_at' => '2023-06-25 11:13:42',
            ),
            424 => 
            array (
                'id' => 1425,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-25 12:50:44',
                'updated_at' => '2023-06-25 12:50:44',
            ),
            425 => 
            array (
                'id' => 1426,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-25 13:57:10',
                'updated_at' => '2023-06-25 13:57:10',
            ),
            426 => 
            array (
                'id' => 1427,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-25 14:05:31',
                'updated_at' => '2023-06-25 14:05:31',
            ),
            427 => 
            array (
                'id' => 1428,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-25 16:27:44',
                'updated_at' => '2023-06-25 16:27:44',
            ),
            428 => 
            array (
                'id' => 1429,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 10:27:34',
                'updated_at' => '2023-06-26 10:27:34',
            ),
            429 => 
            array (
                'id' => 1430,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 10:41:31',
                'updated_at' => '2023-06-26 10:41:31',
            ),
            430 => 
            array (
                'id' => 1431,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 10:41:34',
                'updated_at' => '2023-06-26 10:41:34',
            ),
            431 => 
            array (
                'id' => 1432,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 10:41:34',
                'updated_at' => '2023-06-26 10:41:34',
            ),
            432 => 
            array (
                'id' => 1433,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 10:42:38',
                'updated_at' => '2023-06-26 10:42:38',
            ),
            433 => 
            array (
                'id' => 1434,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 12:16:31',
                'updated_at' => '2023-06-26 12:16:31',
            ),
            434 => 
            array (
                'id' => 1435,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 12:16:53',
                'updated_at' => '2023-06-26 12:16:53',
            ),
            435 => 
            array (
                'id' => 1436,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 12:28:24',
                'updated_at' => '2023-06-26 12:28:24',
            ),
            436 => 
            array (
                'id' => 1437,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 13:12:38',
                'updated_at' => '2023-06-26 13:12:38',
            ),
            437 => 
            array (
                'id' => 1438,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 13:17:44',
                'updated_at' => '2023-06-26 13:17:44',
            ),
            438 => 
            array (
                'id' => 1439,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 13:17:48',
                'updated_at' => '2023-06-26 13:17:48',
            ),
            439 => 
            array (
                'id' => 1440,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 13:19:36',
                'updated_at' => '2023-06-26 13:19:36',
            ),
            440 => 
            array (
                'id' => 1441,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 13:20:06',
                'updated_at' => '2023-06-26 13:20:06',
            ),
            441 => 
            array (
                'id' => 1442,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 13:49:44',
                'updated_at' => '2023-06-26 13:49:44',
            ),
            442 => 
            array (
                'id' => 1443,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 13:49:53',
                'updated_at' => '2023-06-26 13:49:53',
            ),
            443 => 
            array (
                'id' => 1444,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 13:53:14',
                'updated_at' => '2023-06-26 13:53:14',
            ),
            444 => 
            array (
                'id' => 1445,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 13:53:17',
                'updated_at' => '2023-06-26 13:53:17',
            ),
            445 => 
            array (
                'id' => 1446,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 13:53:44',
                'updated_at' => '2023-06-26 13:53:44',
            ),
            446 => 
            array (
                'id' => 1447,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 13:55:05',
                'updated_at' => '2023-06-26 13:55:05',
            ),
            447 => 
            array (
                'id' => 1448,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 13:57:28',
                'updated_at' => '2023-06-26 13:57:28',
            ),
            448 => 
            array (
                'id' => 1449,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 13:57:53',
                'updated_at' => '2023-06-26 13:57:53',
            ),
            449 => 
            array (
                'id' => 1450,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 14:01:10',
                'updated_at' => '2023-06-26 14:01:10',
            ),
            450 => 
            array (
                'id' => 1451,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 14:01:53',
                'updated_at' => '2023-06-26 14:01:53',
            ),
            451 => 
            array (
                'id' => 1452,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 14:09:01',
                'updated_at' => '2023-06-26 14:09:01',
            ),
            452 => 
            array (
                'id' => 1453,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 14:17:01',
                'updated_at' => '2023-06-26 14:17:01',
            ),
            453 => 
            array (
                'id' => 1454,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 14:25:13',
                'updated_at' => '2023-06-26 14:25:13',
            ),
            454 => 
            array (
                'id' => 1455,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 14:28:16',
                'updated_at' => '2023-06-26 14:28:16',
            ),
            455 => 
            array (
                'id' => 1456,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 14:38:35',
                'updated_at' => '2023-06-26 14:38:35',
            ),
            456 => 
            array (
                'id' => 1457,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 14:38:58',
                'updated_at' => '2023-06-26 14:38:58',
            ),
            457 => 
            array (
                'id' => 1458,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 15:07:23',
                'updated_at' => '2023-06-26 15:07:23',
            ),
            458 => 
            array (
                'id' => 1459,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 15:07:37',
                'updated_at' => '2023-06-26 15:07:37',
            ),
            459 => 
            array (
                'id' => 1460,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 15:11:35',
                'updated_at' => '2023-06-26 15:11:35',
            ),
            460 => 
            array (
                'id' => 1461,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 15:30:19',
                'updated_at' => '2023-06-26 15:30:19',
            ),
            461 => 
            array (
                'id' => 1462,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 15:35:18',
                'updated_at' => '2023-06-26 15:35:18',
            ),
            462 => 
            array (
                'id' => 1463,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 15:36:37',
                'updated_at' => '2023-06-26 15:36:37',
            ),
            463 => 
            array (
                'id' => 1464,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 16:20:49',
                'updated_at' => '2023-06-26 16:20:49',
            ),
            464 => 
            array (
                'id' => 1465,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 16:20:52',
                'updated_at' => '2023-06-26 16:20:52',
            ),
            465 => 
            array (
                'id' => 1466,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 16:22:33',
                'updated_at' => '2023-06-26 16:22:33',
            ),
            466 => 
            array (
                'id' => 1467,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 16:40:47',
                'updated_at' => '2023-06-26 16:40:47',
            ),
            467 => 
            array (
                'id' => 1468,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 16:43:56',
                'updated_at' => '2023-06-26 16:43:56',
            ),
            468 => 
            array (
                'id' => 1469,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-26 16:55:31',
                'updated_at' => '2023-06-26 16:55:31',
            ),
            469 => 
            array (
                'id' => 1470,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 10:17:48',
                'updated_at' => '2023-06-27 10:17:48',
            ),
            470 => 
            array (
                'id' => 1471,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 10:41:57',
                'updated_at' => '2023-06-27 10:41:57',
            ),
            471 => 
            array (
                'id' => 1472,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 10:42:05',
                'updated_at' => '2023-06-27 10:42:05',
            ),
            472 => 
            array (
                'id' => 1473,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 10:55:21',
                'updated_at' => '2023-06-27 10:55:21',
            ),
            473 => 
            array (
                'id' => 1474,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 10:56:47',
                'updated_at' => '2023-06-27 10:56:47',
            ),
            474 => 
            array (
                'id' => 1475,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 10:59:12',
                'updated_at' => '2023-06-27 10:59:12',
            ),
            475 => 
            array (
                'id' => 1476,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 10:59:19',
                'updated_at' => '2023-06-27 10:59:19',
            ),
            476 => 
            array (
                'id' => 1477,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 11:12:23',
                'updated_at' => '2023-06-27 11:12:23',
            ),
            477 => 
            array (
                'id' => 1478,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 11:20:40',
                'updated_at' => '2023-06-27 11:20:40',
            ),
            478 => 
            array (
                'id' => 1479,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 11:20:54',
                'updated_at' => '2023-06-27 11:20:54',
            ),
            479 => 
            array (
                'id' => 1480,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 11:21:33',
                'updated_at' => '2023-06-27 11:21:33',
            ),
            480 => 
            array (
                'id' => 1481,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 11:33:55',
                'updated_at' => '2023-06-27 11:33:55',
            ),
            481 => 
            array (
                'id' => 1482,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 11:34:01',
                'updated_at' => '2023-06-27 11:34:01',
            ),
            482 => 
            array (
                'id' => 1483,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 11:34:08',
                'updated_at' => '2023-06-27 11:34:08',
            ),
            483 => 
            array (
                'id' => 1484,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 11:36:57',
                'updated_at' => '2023-06-27 11:36:57',
            ),
            484 => 
            array (
                'id' => 1485,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 11:50:04',
                'updated_at' => '2023-06-27 11:50:04',
            ),
            485 => 
            array (
                'id' => 1486,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 11:54:35',
                'updated_at' => '2023-06-27 11:54:35',
            ),
            486 => 
            array (
                'id' => 1487,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:06:51',
                'updated_at' => '2023-06-27 12:06:51',
            ),
            487 => 
            array (
                'id' => 1488,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:21:38',
                'updated_at' => '2023-06-27 12:21:38',
            ),
            488 => 
            array (
                'id' => 1489,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:21:49',
                'updated_at' => '2023-06-27 12:21:49',
            ),
            489 => 
            array (
                'id' => 1490,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:21:52',
                'updated_at' => '2023-06-27 12:21:52',
            ),
            490 => 
            array (
                'id' => 1491,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:22:14',
                'updated_at' => '2023-06-27 12:22:14',
            ),
            491 => 
            array (
                'id' => 1492,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:23:08',
                'updated_at' => '2023-06-27 12:23:08',
            ),
            492 => 
            array (
                'id' => 1493,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:24:21',
                'updated_at' => '2023-06-27 12:24:21',
            ),
            493 => 
            array (
                'id' => 1494,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:27:25',
                'updated_at' => '2023-06-27 12:27:25',
            ),
            494 => 
            array (
                'id' => 1495,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:27:45',
                'updated_at' => '2023-06-27 12:27:45',
            ),
            495 => 
            array (
                'id' => 1496,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:32:50',
                'updated_at' => '2023-06-27 12:32:50',
            ),
            496 => 
            array (
                'id' => 1497,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:35:19',
                'updated_at' => '2023-06-27 12:35:19',
            ),
            497 => 
            array (
                'id' => 1498,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:35:33',
                'updated_at' => '2023-06-27 12:35:33',
            ),
            498 => 
            array (
                'id' => 1499,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:37:05',
                'updated_at' => '2023-06-27 12:37:05',
            ),
            499 => 
            array (
                'id' => 1500,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:43:09',
                'updated_at' => '2023-06-27 12:43:09',
            ),
        ));
        \DB::table('visitors')->insert(array (
            0 => 
            array (
                'id' => 1501,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:44:12',
                'updated_at' => '2023-06-27 12:44:12',
            ),
            1 => 
            array (
                'id' => 1502,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:51:10',
                'updated_at' => '2023-06-27 12:51:10',
            ),
            2 => 
            array (
                'id' => 1503,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:51:52',
                'updated_at' => '2023-06-27 12:51:52',
            ),
            3 => 
            array (
                'id' => 1504,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:55:51',
                'updated_at' => '2023-06-27 12:55:51',
            ),
            4 => 
            array (
                'id' => 1505,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 12:58:05',
                'updated_at' => '2023-06-27 12:58:05',
            ),
            5 => 
            array (
                'id' => 1506,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 13:25:00',
                'updated_at' => '2023-06-27 13:25:00',
            ),
            6 => 
            array (
                'id' => 1507,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 13:25:12',
                'updated_at' => '2023-06-27 13:25:12',
            ),
            7 => 
            array (
                'id' => 1508,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 13:25:34',
                'updated_at' => '2023-06-27 13:25:34',
            ),
            8 => 
            array (
                'id' => 1509,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 13:31:52',
                'updated_at' => '2023-06-27 13:31:52',
            ),
            9 => 
            array (
                'id' => 1510,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 13:36:49',
                'updated_at' => '2023-06-27 13:36:49',
            ),
            10 => 
            array (
                'id' => 1511,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 13:39:35',
                'updated_at' => '2023-06-27 13:39:35',
            ),
            11 => 
            array (
                'id' => 1512,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 13:44:00',
                'updated_at' => '2023-06-27 13:44:00',
            ),
            12 => 
            array (
                'id' => 1513,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 13:44:07',
                'updated_at' => '2023-06-27 13:44:07',
            ),
            13 => 
            array (
                'id' => 1514,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 13:44:09',
                'updated_at' => '2023-06-27 13:44:09',
            ),
            14 => 
            array (
                'id' => 1515,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 13:44:56',
                'updated_at' => '2023-06-27 13:44:56',
            ),
            15 => 
            array (
                'id' => 1516,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 13:53:06',
                'updated_at' => '2023-06-27 13:53:06',
            ),
            16 => 
            array (
                'id' => 1517,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 13:53:11',
                'updated_at' => '2023-06-27 13:53:11',
            ),
            17 => 
            array (
                'id' => 1518,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 13:58:32',
                'updated_at' => '2023-06-27 13:58:32',
            ),
            18 => 
            array (
                'id' => 1519,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 14:07:57',
                'updated_at' => '2023-06-27 14:07:57',
            ),
            19 => 
            array (
                'id' => 1520,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 14:08:58',
                'updated_at' => '2023-06-27 14:08:58',
            ),
            20 => 
            array (
                'id' => 1521,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 14:09:28',
                'updated_at' => '2023-06-27 14:09:28',
            ),
            21 => 
            array (
                'id' => 1522,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 14:10:04',
                'updated_at' => '2023-06-27 14:10:04',
            ),
            22 => 
            array (
                'id' => 1523,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 14:14:49',
                'updated_at' => '2023-06-27 14:14:49',
            ),
            23 => 
            array (
                'id' => 1524,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 14:14:51',
                'updated_at' => '2023-06-27 14:14:51',
            ),
            24 => 
            array (
                'id' => 1525,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 14:16:23',
                'updated_at' => '2023-06-27 14:16:23',
            ),
            25 => 
            array (
                'id' => 1526,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 14:33:10',
                'updated_at' => '2023-06-27 14:33:10',
            ),
            26 => 
            array (
                'id' => 1527,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 14:33:48',
                'updated_at' => '2023-06-27 14:33:48',
            ),
            27 => 
            array (
                'id' => 1528,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 14:40:00',
                'updated_at' => '2023-06-27 14:40:00',
            ),
            28 => 
            array (
                'id' => 1529,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 14:40:54',
                'updated_at' => '2023-06-27 14:40:54',
            ),
            29 => 
            array (
                'id' => 1530,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 14:55:59',
                'updated_at' => '2023-06-27 14:55:59',
            ),
            30 => 
            array (
                'id' => 1531,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:04:25',
                'updated_at' => '2023-06-27 15:04:25',
            ),
            31 => 
            array (
                'id' => 1532,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:25:57',
                'updated_at' => '2023-06-27 15:25:57',
            ),
            32 => 
            array (
                'id' => 1533,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:30:24',
                'updated_at' => '2023-06-27 15:30:24',
            ),
            33 => 
            array (
                'id' => 1534,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:34:46',
                'updated_at' => '2023-06-27 15:34:46',
            ),
            34 => 
            array (
                'id' => 1535,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:36:32',
                'updated_at' => '2023-06-27 15:36:32',
            ),
            35 => 
            array (
                'id' => 1536,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:36:56',
                'updated_at' => '2023-06-27 15:36:56',
            ),
            36 => 
            array (
                'id' => 1537,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:45:48',
                'updated_at' => '2023-06-27 15:45:48',
            ),
            37 => 
            array (
                'id' => 1538,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:50:20',
                'updated_at' => '2023-06-27 15:50:20',
            ),
            38 => 
            array (
                'id' => 1539,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:50:38',
                'updated_at' => '2023-06-27 15:50:38',
            ),
            39 => 
            array (
                'id' => 1540,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:51:00',
                'updated_at' => '2023-06-27 15:51:00',
            ),
            40 => 
            array (
                'id' => 1541,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:51:04',
                'updated_at' => '2023-06-27 15:51:04',
            ),
            41 => 
            array (
                'id' => 1542,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:51:47',
                'updated_at' => '2023-06-27 15:51:47',
            ),
            42 => 
            array (
                'id' => 1543,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:53:47',
                'updated_at' => '2023-06-27 15:53:47',
            ),
            43 => 
            array (
                'id' => 1544,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:54:15',
                'updated_at' => '2023-06-27 15:54:15',
            ),
            44 => 
            array (
                'id' => 1545,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 15:55:31',
                'updated_at' => '2023-06-27 15:55:31',
            ),
            45 => 
            array (
                'id' => 1546,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 16:00:57',
                'updated_at' => '2023-06-27 16:00:57',
            ),
            46 => 
            array (
                'id' => 1547,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 16:03:45',
                'updated_at' => '2023-06-27 16:03:45',
            ),
            47 => 
            array (
                'id' => 1548,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 16:18:10',
                'updated_at' => '2023-06-27 16:18:10',
            ),
            48 => 
            array (
                'id' => 1549,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 16:18:43',
                'updated_at' => '2023-06-27 16:18:43',
            ),
            49 => 
            array (
                'id' => 1550,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 16:19:33',
                'updated_at' => '2023-06-27 16:19:33',
            ),
            50 => 
            array (
                'id' => 1551,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 16:24:56',
                'updated_at' => '2023-06-27 16:24:56',
            ),
            51 => 
            array (
                'id' => 1552,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 16:52:28',
                'updated_at' => '2023-06-27 16:52:28',
            ),
            52 => 
            array (
                'id' => 1553,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 16:53:08',
                'updated_at' => '2023-06-27 16:53:08',
            ),
            53 => 
            array (
                'id' => 1554,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 16:54:55',
                'updated_at' => '2023-06-27 16:54:55',
            ),
            54 => 
            array (
                'id' => 1555,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:02:00',
                'updated_at' => '2023-06-27 17:02:00',
            ),
            55 => 
            array (
                'id' => 1556,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:03:32',
                'updated_at' => '2023-06-27 17:03:32',
            ),
            56 => 
            array (
                'id' => 1557,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:08:46',
                'updated_at' => '2023-06-27 17:08:46',
            ),
            57 => 
            array (
                'id' => 1558,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:08:53',
                'updated_at' => '2023-06-27 17:08:53',
            ),
            58 => 
            array (
                'id' => 1559,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:09:58',
                'updated_at' => '2023-06-27 17:09:58',
            ),
            59 => 
            array (
                'id' => 1560,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:12:21',
                'updated_at' => '2023-06-27 17:12:21',
            ),
            60 => 
            array (
                'id' => 1561,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:12:22',
                'updated_at' => '2023-06-27 17:12:22',
            ),
            61 => 
            array (
                'id' => 1562,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:16:59',
                'updated_at' => '2023-06-27 17:16:59',
            ),
            62 => 
            array (
                'id' => 1563,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:16:59',
                'updated_at' => '2023-06-27 17:16:59',
            ),
            63 => 
            array (
                'id' => 1564,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:17:09',
                'updated_at' => '2023-06-27 17:17:09',
            ),
            64 => 
            array (
                'id' => 1565,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:17:53',
                'updated_at' => '2023-06-27 17:17:53',
            ),
            65 => 
            array (
                'id' => 1566,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:17:54',
                'updated_at' => '2023-06-27 17:17:54',
            ),
            66 => 
            array (
                'id' => 1567,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:28:43',
                'updated_at' => '2023-06-27 17:28:43',
            ),
            67 => 
            array (
                'id' => 1568,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:29:12',
                'updated_at' => '2023-06-27 17:29:12',
            ),
            68 => 
            array (
                'id' => 1569,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:29:23',
                'updated_at' => '2023-06-27 17:29:23',
            ),
            69 => 
            array (
                'id' => 1570,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:29:58',
                'updated_at' => '2023-06-27 17:29:58',
            ),
            70 => 
            array (
                'id' => 1571,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:30:03',
                'updated_at' => '2023-06-27 17:30:03',
            ),
            71 => 
            array (
                'id' => 1572,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:30:23',
                'updated_at' => '2023-06-27 17:30:23',
            ),
            72 => 
            array (
                'id' => 1573,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:33:01',
                'updated_at' => '2023-06-27 17:33:01',
            ),
            73 => 
            array (
                'id' => 1574,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:33:06',
                'updated_at' => '2023-06-27 17:33:06',
            ),
            74 => 
            array (
                'id' => 1575,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:34:17',
                'updated_at' => '2023-06-27 17:34:17',
            ),
            75 => 
            array (
                'id' => 1576,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:35:50',
                'updated_at' => '2023-06-27 17:35:50',
            ),
            76 => 
            array (
                'id' => 1577,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:35:51',
                'updated_at' => '2023-06-27 17:35:51',
            ),
            77 => 
            array (
                'id' => 1578,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:36:10',
                'updated_at' => '2023-06-27 17:36:10',
            ),
            78 => 
            array (
                'id' => 1579,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:37:48',
                'updated_at' => '2023-06-27 17:37:48',
            ),
            79 => 
            array (
                'id' => 1580,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:38:57',
                'updated_at' => '2023-06-27 17:38:57',
            ),
            80 => 
            array (
                'id' => 1581,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:41:16',
                'updated_at' => '2023-06-27 17:41:16',
            ),
            81 => 
            array (
                'id' => 1582,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:41:20',
                'updated_at' => '2023-06-27 17:41:20',
            ),
            82 => 
            array (
                'id' => 1583,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:41:20',
                'updated_at' => '2023-06-27 17:41:20',
            ),
            83 => 
            array (
                'id' => 1584,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:48:23',
                'updated_at' => '2023-06-27 17:48:23',
            ),
            84 => 
            array (
                'id' => 1585,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:50:58',
                'updated_at' => '2023-06-27 17:50:58',
            ),
            85 => 
            array (
                'id' => 1586,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:51:01',
                'updated_at' => '2023-06-27 17:51:01',
            ),
            86 => 
            array (
                'id' => 1587,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:51:02',
                'updated_at' => '2023-06-27 17:51:02',
            ),
            87 => 
            array (
                'id' => 1588,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:51:03',
                'updated_at' => '2023-06-27 17:51:03',
            ),
            88 => 
            array (
                'id' => 1589,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:52:10',
                'updated_at' => '2023-06-27 17:52:10',
            ),
            89 => 
            array (
                'id' => 1590,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:53:21',
                'updated_at' => '2023-06-27 17:53:21',
            ),
            90 => 
            array (
                'id' => 1591,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:54:04',
                'updated_at' => '2023-06-27 17:54:04',
            ),
            91 => 
            array (
                'id' => 1592,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:54:05',
                'updated_at' => '2023-06-27 17:54:05',
            ),
            92 => 
            array (
                'id' => 1593,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:54:06',
                'updated_at' => '2023-06-27 17:54:06',
            ),
            93 => 
            array (
                'id' => 1594,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:54:19',
                'updated_at' => '2023-06-27 17:54:19',
            ),
            94 => 
            array (
                'id' => 1595,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:54:19',
                'updated_at' => '2023-06-27 17:54:19',
            ),
            95 => 
            array (
                'id' => 1596,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:54:19',
                'updated_at' => '2023-06-27 17:54:19',
            ),
            96 => 
            array (
                'id' => 1597,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:54:57',
                'updated_at' => '2023-06-27 17:54:57',
            ),
            97 => 
            array (
                'id' => 1598,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:54:57',
                'updated_at' => '2023-06-27 17:54:57',
            ),
            98 => 
            array (
                'id' => 1599,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:54:57',
                'updated_at' => '2023-06-27 17:54:57',
            ),
            99 => 
            array (
                'id' => 1600,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:57:53',
                'updated_at' => '2023-06-27 17:57:53',
            ),
            100 => 
            array (
                'id' => 1601,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:58:34',
                'updated_at' => '2023-06-27 17:58:34',
            ),
            101 => 
            array (
                'id' => 1602,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:58:51',
                'updated_at' => '2023-06-27 17:58:51',
            ),
            102 => 
            array (
                'id' => 1603,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:58:53',
                'updated_at' => '2023-06-27 17:58:53',
            ),
            103 => 
            array (
                'id' => 1604,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:58:54',
                'updated_at' => '2023-06-27 17:58:54',
            ),
            104 => 
            array (
                'id' => 1605,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:59:15',
                'updated_at' => '2023-06-27 17:59:15',
            ),
            105 => 
            array (
                'id' => 1606,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:59:27',
                'updated_at' => '2023-06-27 17:59:27',
            ),
            106 => 
            array (
                'id' => 1607,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:59:43',
                'updated_at' => '2023-06-27 17:59:43',
            ),
            107 => 
            array (
                'id' => 1608,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:59:45',
                'updated_at' => '2023-06-27 17:59:45',
            ),
            108 => 
            array (
                'id' => 1609,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 17:59:46',
                'updated_at' => '2023-06-27 17:59:46',
            ),
            109 => 
            array (
                'id' => 1610,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:00:48',
                'updated_at' => '2023-06-27 18:00:48',
            ),
            110 => 
            array (
                'id' => 1611,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:01:14',
                'updated_at' => '2023-06-27 18:01:14',
            ),
            111 => 
            array (
                'id' => 1612,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:01:18',
                'updated_at' => '2023-06-27 18:01:18',
            ),
            112 => 
            array (
                'id' => 1613,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:01:19',
                'updated_at' => '2023-06-27 18:01:19',
            ),
            113 => 
            array (
                'id' => 1614,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:02:55',
                'updated_at' => '2023-06-27 18:02:55',
            ),
            114 => 
            array (
                'id' => 1615,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:03:01',
                'updated_at' => '2023-06-27 18:03:01',
            ),
            115 => 
            array (
                'id' => 1616,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:03:03',
                'updated_at' => '2023-06-27 18:03:03',
            ),
            116 => 
            array (
                'id' => 1617,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:03:04',
                'updated_at' => '2023-06-27 18:03:04',
            ),
            117 => 
            array (
                'id' => 1618,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:03:15',
                'updated_at' => '2023-06-27 18:03:15',
            ),
            118 => 
            array (
                'id' => 1619,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:03:21',
                'updated_at' => '2023-06-27 18:03:21',
            ),
            119 => 
            array (
                'id' => 1620,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:04:25',
                'updated_at' => '2023-06-27 18:04:25',
            ),
            120 => 
            array (
                'id' => 1621,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:04:37',
                'updated_at' => '2023-06-27 18:04:37',
            ),
            121 => 
            array (
                'id' => 1622,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:05:48',
                'updated_at' => '2023-06-27 18:05:48',
            ),
            122 => 
            array (
                'id' => 1623,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:07:14',
                'updated_at' => '2023-06-27 18:07:14',
            ),
            123 => 
            array (
                'id' => 1624,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:09:29',
                'updated_at' => '2023-06-27 18:09:29',
            ),
            124 => 
            array (
                'id' => 1625,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:09:30',
                'updated_at' => '2023-06-27 18:09:30',
            ),
            125 => 
            array (
                'id' => 1626,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:09:30',
                'updated_at' => '2023-06-27 18:09:30',
            ),
            126 => 
            array (
                'id' => 1627,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:11:00',
                'updated_at' => '2023-06-27 18:11:00',
            ),
            127 => 
            array (
                'id' => 1628,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:11:02',
                'updated_at' => '2023-06-27 18:11:02',
            ),
            128 => 
            array (
                'id' => 1629,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:11:02',
                'updated_at' => '2023-06-27 18:11:02',
            ),
            129 => 
            array (
                'id' => 1630,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:11:02',
                'updated_at' => '2023-06-27 18:11:02',
            ),
            130 => 
            array (
                'id' => 1631,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:11:36',
                'updated_at' => '2023-06-27 18:11:36',
            ),
            131 => 
            array (
                'id' => 1632,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:11:36',
                'updated_at' => '2023-06-27 18:11:36',
            ),
            132 => 
            array (
                'id' => 1633,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:11:36',
                'updated_at' => '2023-06-27 18:11:36',
            ),
            133 => 
            array (
                'id' => 1634,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:12:02',
                'updated_at' => '2023-06-27 18:12:02',
            ),
            134 => 
            array (
                'id' => 1635,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:12:05',
                'updated_at' => '2023-06-27 18:12:05',
            ),
            135 => 
            array (
                'id' => 1636,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:12:06',
                'updated_at' => '2023-06-27 18:12:06',
            ),
            136 => 
            array (
                'id' => 1637,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:12:10',
                'updated_at' => '2023-06-27 18:12:10',
            ),
            137 => 
            array (
                'id' => 1638,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:12:11',
                'updated_at' => '2023-06-27 18:12:11',
            ),
            138 => 
            array (
                'id' => 1639,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:12:12',
                'updated_at' => '2023-06-27 18:12:12',
            ),
            139 => 
            array (
                'id' => 1640,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:12:40',
                'updated_at' => '2023-06-27 18:12:40',
            ),
            140 => 
            array (
                'id' => 1641,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:12:41',
                'updated_at' => '2023-06-27 18:12:41',
            ),
            141 => 
            array (
                'id' => 1642,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:12:41',
                'updated_at' => '2023-06-27 18:12:41',
            ),
            142 => 
            array (
                'id' => 1643,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:12:44',
                'updated_at' => '2023-06-27 18:12:44',
            ),
            143 => 
            array (
                'id' => 1644,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:12:57',
                'updated_at' => '2023-06-27 18:12:57',
            ),
            144 => 
            array (
                'id' => 1645,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:12:58',
                'updated_at' => '2023-06-27 18:12:58',
            ),
            145 => 
            array (
                'id' => 1646,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:13:01',
                'updated_at' => '2023-06-27 18:13:01',
            ),
            146 => 
            array (
                'id' => 1647,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:13:22',
                'updated_at' => '2023-06-27 18:13:22',
            ),
            147 => 
            array (
                'id' => 1648,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:13:22',
                'updated_at' => '2023-06-27 18:13:22',
            ),
            148 => 
            array (
                'id' => 1649,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:13:22',
                'updated_at' => '2023-06-27 18:13:22',
            ),
            149 => 
            array (
                'id' => 1650,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:13:28',
                'updated_at' => '2023-06-27 18:13:28',
            ),
            150 => 
            array (
                'id' => 1651,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:13:39',
                'updated_at' => '2023-06-27 18:13:39',
            ),
            151 => 
            array (
                'id' => 1652,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:13:39',
                'updated_at' => '2023-06-27 18:13:39',
            ),
            152 => 
            array (
                'id' => 1653,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:13:41',
                'updated_at' => '2023-06-27 18:13:41',
            ),
            153 => 
            array (
                'id' => 1654,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:13:47',
                'updated_at' => '2023-06-27 18:13:47',
            ),
            154 => 
            array (
                'id' => 1655,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:13:47',
                'updated_at' => '2023-06-27 18:13:47',
            ),
            155 => 
            array (
                'id' => 1656,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:13:47',
                'updated_at' => '2023-06-27 18:13:47',
            ),
            156 => 
            array (
                'id' => 1657,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:13:51',
                'updated_at' => '2023-06-27 18:13:51',
            ),
            157 => 
            array (
                'id' => 1658,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:14:02',
                'updated_at' => '2023-06-27 18:14:02',
            ),
            158 => 
            array (
                'id' => 1659,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:14:02',
                'updated_at' => '2023-06-27 18:14:02',
            ),
            159 => 
            array (
                'id' => 1660,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:14:02',
                'updated_at' => '2023-06-27 18:14:02',
            ),
            160 => 
            array (
                'id' => 1661,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:14:09',
                'updated_at' => '2023-06-27 18:14:09',
            ),
            161 => 
            array (
                'id' => 1662,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:14:09',
                'updated_at' => '2023-06-27 18:14:09',
            ),
            162 => 
            array (
                'id' => 1663,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:14:09',
                'updated_at' => '2023-06-27 18:14:09',
            ),
            163 => 
            array (
                'id' => 1664,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:14:18',
                'updated_at' => '2023-06-27 18:14:18',
            ),
            164 => 
            array (
                'id' => 1665,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:14:28',
                'updated_at' => '2023-06-27 18:14:28',
            ),
            165 => 
            array (
                'id' => 1666,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:14:31',
                'updated_at' => '2023-06-27 18:14:31',
            ),
            166 => 
            array (
                'id' => 1667,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:14:32',
                'updated_at' => '2023-06-27 18:14:32',
            ),
            167 => 
            array (
                'id' => 1668,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:14:35',
                'updated_at' => '2023-06-27 18:14:35',
            ),
            168 => 
            array (
                'id' => 1669,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:15:36',
                'updated_at' => '2023-06-27 18:15:36',
            ),
            169 => 
            array (
                'id' => 1670,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:15:39',
                'updated_at' => '2023-06-27 18:15:39',
            ),
            170 => 
            array (
                'id' => 1671,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:15:40',
                'updated_at' => '2023-06-27 18:15:40',
            ),
            171 => 
            array (
                'id' => 1672,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:15:40',
                'updated_at' => '2023-06-27 18:15:40',
            ),
            172 => 
            array (
                'id' => 1673,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:19:35',
                'updated_at' => '2023-06-27 18:19:35',
            ),
            173 => 
            array (
                'id' => 1674,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:19:43',
                'updated_at' => '2023-06-27 18:19:43',
            ),
            174 => 
            array (
                'id' => 1675,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:19:44',
                'updated_at' => '2023-06-27 18:19:44',
            ),
            175 => 
            array (
                'id' => 1676,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:19:49',
                'updated_at' => '2023-06-27 18:19:49',
            ),
            176 => 
            array (
                'id' => 1677,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:19:56',
                'updated_at' => '2023-06-27 18:19:56',
            ),
            177 => 
            array (
                'id' => 1678,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:20:13',
                'updated_at' => '2023-06-27 18:20:13',
            ),
            178 => 
            array (
                'id' => 1679,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:20:14',
                'updated_at' => '2023-06-27 18:20:14',
            ),
            179 => 
            array (
                'id' => 1680,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:20:17',
                'updated_at' => '2023-06-27 18:20:17',
            ),
            180 => 
            array (
                'id' => 1681,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:20:17',
                'updated_at' => '2023-06-27 18:20:17',
            ),
            181 => 
            array (
                'id' => 1682,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:20:18',
                'updated_at' => '2023-06-27 18:20:18',
            ),
            182 => 
            array (
                'id' => 1683,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:20:24',
                'updated_at' => '2023-06-27 18:20:24',
            ),
            183 => 
            array (
                'id' => 1684,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:20:24',
                'updated_at' => '2023-06-27 18:20:24',
            ),
            184 => 
            array (
                'id' => 1685,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:20:27',
                'updated_at' => '2023-06-27 18:20:27',
            ),
            185 => 
            array (
                'id' => 1686,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:20:27',
                'updated_at' => '2023-06-27 18:20:27',
            ),
            186 => 
            array (
                'id' => 1687,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:20:28',
                'updated_at' => '2023-06-27 18:20:28',
            ),
            187 => 
            array (
                'id' => 1688,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:21:26',
                'updated_at' => '2023-06-27 18:21:26',
            ),
            188 => 
            array (
                'id' => 1689,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:21:29',
                'updated_at' => '2023-06-27 18:21:29',
            ),
            189 => 
            array (
                'id' => 1690,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:22:31',
                'updated_at' => '2023-06-27 18:22:31',
            ),
            190 => 
            array (
                'id' => 1691,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:22:31',
                'updated_at' => '2023-06-27 18:22:31',
            ),
            191 => 
            array (
                'id' => 1692,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:23:11',
                'updated_at' => '2023-06-27 18:23:11',
            ),
            192 => 
            array (
                'id' => 1693,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:23:12',
                'updated_at' => '2023-06-27 18:23:12',
            ),
            193 => 
            array (
                'id' => 1694,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:23:18',
                'updated_at' => '2023-06-27 18:23:18',
            ),
            194 => 
            array (
                'id' => 1695,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:24:06',
                'updated_at' => '2023-06-27 18:24:06',
            ),
            195 => 
            array (
                'id' => 1696,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:24:06',
                'updated_at' => '2023-06-27 18:24:06',
            ),
            196 => 
            array (
                'id' => 1697,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:24:12',
                'updated_at' => '2023-06-27 18:24:12',
            ),
            197 => 
            array (
                'id' => 1698,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:24:42',
                'updated_at' => '2023-06-27 18:24:42',
            ),
            198 => 
            array (
                'id' => 1699,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:24:43',
                'updated_at' => '2023-06-27 18:24:43',
            ),
            199 => 
            array (
                'id' => 1700,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:24:44',
                'updated_at' => '2023-06-27 18:24:44',
            ),
            200 => 
            array (
                'id' => 1701,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:24:45',
                'updated_at' => '2023-06-27 18:24:45',
            ),
            201 => 
            array (
                'id' => 1702,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 18:25:11',
                'updated_at' => '2023-06-27 18:25:11',
            ),
            202 => 
            array (
                'id' => 1703,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 21:17:42',
                'updated_at' => '2023-06-27 21:17:42',
            ),
            203 => 
            array (
                'id' => 1704,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-27 22:27:34',
                'updated_at' => '2023-06-27 22:27:34',
            ),
            204 => 
            array (
                'id' => 1705,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:12:53',
                'updated_at' => '2023-06-28 10:12:53',
            ),
            205 => 
            array (
                'id' => 1706,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:15:19',
                'updated_at' => '2023-06-28 10:15:19',
            ),
            206 => 
            array (
                'id' => 1707,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:17:58',
                'updated_at' => '2023-06-28 10:17:58',
            ),
            207 => 
            array (
                'id' => 1708,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:25:02',
                'updated_at' => '2023-06-28 10:25:02',
            ),
            208 => 
            array (
                'id' => 1709,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:25:32',
                'updated_at' => '2023-06-28 10:25:32',
            ),
            209 => 
            array (
                'id' => 1710,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:25:52',
                'updated_at' => '2023-06-28 10:25:52',
            ),
            210 => 
            array (
                'id' => 1711,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:25:59',
                'updated_at' => '2023-06-28 10:25:59',
            ),
            211 => 
            array (
                'id' => 1712,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:27:12',
                'updated_at' => '2023-06-28 10:27:12',
            ),
            212 => 
            array (
                'id' => 1713,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:36:45',
                'updated_at' => '2023-06-28 10:36:45',
            ),
            213 => 
            array (
                'id' => 1714,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:38:16',
                'updated_at' => '2023-06-28 10:38:16',
            ),
            214 => 
            array (
                'id' => 1715,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:41:22',
                'updated_at' => '2023-06-28 10:41:22',
            ),
            215 => 
            array (
                'id' => 1716,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:41:47',
                'updated_at' => '2023-06-28 10:41:47',
            ),
            216 => 
            array (
                'id' => 1717,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:41:53',
                'updated_at' => '2023-06-28 10:41:53',
            ),
            217 => 
            array (
                'id' => 1718,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:44:16',
                'updated_at' => '2023-06-28 10:44:16',
            ),
            218 => 
            array (
                'id' => 1719,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:44:38',
                'updated_at' => '2023-06-28 10:44:38',
            ),
            219 => 
            array (
                'id' => 1720,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:44:50',
                'updated_at' => '2023-06-28 10:44:50',
            ),
            220 => 
            array (
                'id' => 1721,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:47:31',
                'updated_at' => '2023-06-28 10:47:31',
            ),
            221 => 
            array (
                'id' => 1722,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:50:26',
                'updated_at' => '2023-06-28 10:50:26',
            ),
            222 => 
            array (
                'id' => 1723,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:50:42',
                'updated_at' => '2023-06-28 10:50:42',
            ),
            223 => 
            array (
                'id' => 1724,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:51:51',
                'updated_at' => '2023-06-28 10:51:51',
            ),
            224 => 
            array (
                'id' => 1725,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:53:11',
                'updated_at' => '2023-06-28 10:53:11',
            ),
            225 => 
            array (
                'id' => 1726,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:57:11',
                'updated_at' => '2023-06-28 10:57:11',
            ),
            226 => 
            array (
                'id' => 1727,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 10:57:26',
                'updated_at' => '2023-06-28 10:57:26',
            ),
            227 => 
            array (
                'id' => 1728,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:04:34',
                'updated_at' => '2023-06-28 11:04:34',
            ),
            228 => 
            array (
                'id' => 1729,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:05:44',
                'updated_at' => '2023-06-28 11:05:44',
            ),
            229 => 
            array (
                'id' => 1730,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:06:42',
                'updated_at' => '2023-06-28 11:06:42',
            ),
            230 => 
            array (
                'id' => 1731,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:11:19',
                'updated_at' => '2023-06-28 11:11:19',
            ),
            231 => 
            array (
                'id' => 1732,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:12:25',
                'updated_at' => '2023-06-28 11:12:25',
            ),
            232 => 
            array (
                'id' => 1733,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:15:05',
                'updated_at' => '2023-06-28 11:15:05',
            ),
            233 => 
            array (
                'id' => 1734,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:16:48',
                'updated_at' => '2023-06-28 11:16:48',
            ),
            234 => 
            array (
                'id' => 1735,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:19:43',
                'updated_at' => '2023-06-28 11:19:43',
            ),
            235 => 
            array (
                'id' => 1736,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:29:54',
                'updated_at' => '2023-06-28 11:29:54',
            ),
            236 => 
            array (
                'id' => 1737,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:32:14',
                'updated_at' => '2023-06-28 11:32:14',
            ),
            237 => 
            array (
                'id' => 1738,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:37:21',
                'updated_at' => '2023-06-28 11:37:21',
            ),
            238 => 
            array (
                'id' => 1739,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:42:30',
                'updated_at' => '2023-06-28 11:42:30',
            ),
            239 => 
            array (
                'id' => 1740,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:42:35',
                'updated_at' => '2023-06-28 11:42:35',
            ),
            240 => 
            array (
                'id' => 1741,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:43:58',
                'updated_at' => '2023-06-28 11:43:58',
            ),
            241 => 
            array (
                'id' => 1742,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:46:02',
                'updated_at' => '2023-06-28 11:46:02',
            ),
            242 => 
            array (
                'id' => 1743,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:46:07',
                'updated_at' => '2023-06-28 11:46:07',
            ),
            243 => 
            array (
                'id' => 1744,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:46:37',
                'updated_at' => '2023-06-28 11:46:37',
            ),
            244 => 
            array (
                'id' => 1745,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:48:10',
                'updated_at' => '2023-06-28 11:48:10',
            ),
            245 => 
            array (
                'id' => 1746,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:48:16',
                'updated_at' => '2023-06-28 11:48:16',
            ),
            246 => 
            array (
                'id' => 1747,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:48:26',
                'updated_at' => '2023-06-28 11:48:26',
            ),
            247 => 
            array (
                'id' => 1748,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:48:48',
                'updated_at' => '2023-06-28 11:48:48',
            ),
            248 => 
            array (
                'id' => 1749,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:49:51',
                'updated_at' => '2023-06-28 11:49:51',
            ),
            249 => 
            array (
                'id' => 1750,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:49:56',
                'updated_at' => '2023-06-28 11:49:56',
            ),
            250 => 
            array (
                'id' => 1751,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:50:19',
                'updated_at' => '2023-06-28 11:50:19',
            ),
            251 => 
            array (
                'id' => 1752,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:50:41',
                'updated_at' => '2023-06-28 11:50:41',
            ),
            252 => 
            array (
                'id' => 1753,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:50:43',
                'updated_at' => '2023-06-28 11:50:43',
            ),
            253 => 
            array (
                'id' => 1754,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:51:43',
                'updated_at' => '2023-06-28 11:51:43',
            ),
            254 => 
            array (
                'id' => 1755,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:52:24',
                'updated_at' => '2023-06-28 11:52:24',
            ),
            255 => 
            array (
                'id' => 1756,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:53:06',
                'updated_at' => '2023-06-28 11:53:06',
            ),
            256 => 
            array (
                'id' => 1757,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:53:22',
                'updated_at' => '2023-06-28 11:53:22',
            ),
            257 => 
            array (
                'id' => 1758,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:53:47',
                'updated_at' => '2023-06-28 11:53:47',
            ),
            258 => 
            array (
                'id' => 1759,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:54:05',
                'updated_at' => '2023-06-28 11:54:05',
            ),
            259 => 
            array (
                'id' => 1760,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:55:06',
                'updated_at' => '2023-06-28 11:55:06',
            ),
            260 => 
            array (
                'id' => 1761,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:55:32',
                'updated_at' => '2023-06-28 11:55:32',
            ),
            261 => 
            array (
                'id' => 1762,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:56:11',
                'updated_at' => '2023-06-28 11:56:11',
            ),
            262 => 
            array (
                'id' => 1763,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:56:34',
                'updated_at' => '2023-06-28 11:56:34',
            ),
            263 => 
            array (
                'id' => 1764,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:57:10',
                'updated_at' => '2023-06-28 11:57:10',
            ),
            264 => 
            array (
                'id' => 1765,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:57:56',
                'updated_at' => '2023-06-28 11:57:56',
            ),
            265 => 
            array (
                'id' => 1766,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 11:58:20',
                'updated_at' => '2023-06-28 11:58:20',
            ),
            266 => 
            array (
                'id' => 1767,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:00:12',
                'updated_at' => '2023-06-28 12:00:12',
            ),
            267 => 
            array (
                'id' => 1768,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:00:29',
                'updated_at' => '2023-06-28 12:00:29',
            ),
            268 => 
            array (
                'id' => 1769,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:01:22',
                'updated_at' => '2023-06-28 12:01:22',
            ),
            269 => 
            array (
                'id' => 1770,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:01:34',
                'updated_at' => '2023-06-28 12:01:34',
            ),
            270 => 
            array (
                'id' => 1771,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:01:43',
                'updated_at' => '2023-06-28 12:01:43',
            ),
            271 => 
            array (
                'id' => 1772,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:01:56',
                'updated_at' => '2023-06-28 12:01:56',
            ),
            272 => 
            array (
                'id' => 1773,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:03:08',
                'updated_at' => '2023-06-28 12:03:08',
            ),
            273 => 
            array (
                'id' => 1774,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:04:00',
                'updated_at' => '2023-06-28 12:04:00',
            ),
            274 => 
            array (
                'id' => 1775,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:04:07',
                'updated_at' => '2023-06-28 12:04:07',
            ),
            275 => 
            array (
                'id' => 1776,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:17:15',
                'updated_at' => '2023-06-28 12:17:15',
            ),
            276 => 
            array (
                'id' => 1777,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:19:20',
                'updated_at' => '2023-06-28 12:19:20',
            ),
            277 => 
            array (
                'id' => 1778,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:20:37',
                'updated_at' => '2023-06-28 12:20:37',
            ),
            278 => 
            array (
                'id' => 1779,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:20:54',
                'updated_at' => '2023-06-28 12:20:54',
            ),
            279 => 
            array (
                'id' => 1780,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:28:13',
                'updated_at' => '2023-06-28 12:28:13',
            ),
            280 => 
            array (
                'id' => 1781,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:29:03',
                'updated_at' => '2023-06-28 12:29:03',
            ),
            281 => 
            array (
                'id' => 1782,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:30:03',
                'updated_at' => '2023-06-28 12:30:03',
            ),
            282 => 
            array (
                'id' => 1783,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:31:44',
                'updated_at' => '2023-06-28 12:31:44',
            ),
            283 => 
            array (
                'id' => 1784,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:33:03',
                'updated_at' => '2023-06-28 12:33:03',
            ),
            284 => 
            array (
                'id' => 1785,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:33:26',
                'updated_at' => '2023-06-28 12:33:26',
            ),
            285 => 
            array (
                'id' => 1786,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:33:32',
                'updated_at' => '2023-06-28 12:33:32',
            ),
            286 => 
            array (
                'id' => 1787,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:38:31',
                'updated_at' => '2023-06-28 12:38:31',
            ),
            287 => 
            array (
                'id' => 1788,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:41:07',
                'updated_at' => '2023-06-28 12:41:07',
            ),
            288 => 
            array (
                'id' => 1789,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:42:35',
                'updated_at' => '2023-06-28 12:42:35',
            ),
            289 => 
            array (
                'id' => 1790,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:42:45',
                'updated_at' => '2023-06-28 12:42:45',
            ),
            290 => 
            array (
                'id' => 1791,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:42:56',
                'updated_at' => '2023-06-28 12:42:56',
            ),
            291 => 
            array (
                'id' => 1792,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:43:02',
                'updated_at' => '2023-06-28 12:43:02',
            ),
            292 => 
            array (
                'id' => 1793,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:43:12',
                'updated_at' => '2023-06-28 12:43:12',
            ),
            293 => 
            array (
                'id' => 1794,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:44:07',
                'updated_at' => '2023-06-28 12:44:07',
            ),
            294 => 
            array (
                'id' => 1795,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:54:53',
                'updated_at' => '2023-06-28 12:54:53',
            ),
            295 => 
            array (
                'id' => 1796,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 12:55:06',
                'updated_at' => '2023-06-28 12:55:06',
            ),
            296 => 
            array (
                'id' => 1797,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:00:11',
                'updated_at' => '2023-06-28 13:00:11',
            ),
            297 => 
            array (
                'id' => 1798,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:03:43',
                'updated_at' => '2023-06-28 13:03:43',
            ),
            298 => 
            array (
                'id' => 1799,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:04:50',
                'updated_at' => '2023-06-28 13:04:50',
            ),
            299 => 
            array (
                'id' => 1800,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:06:04',
                'updated_at' => '2023-06-28 13:06:04',
            ),
            300 => 
            array (
                'id' => 1801,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:06:34',
                'updated_at' => '2023-06-28 13:06:34',
            ),
            301 => 
            array (
                'id' => 1802,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:06:55',
                'updated_at' => '2023-06-28 13:06:55',
            ),
            302 => 
            array (
                'id' => 1803,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:07:00',
                'updated_at' => '2023-06-28 13:07:00',
            ),
            303 => 
            array (
                'id' => 1804,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:07:07',
                'updated_at' => '2023-06-28 13:07:07',
            ),
            304 => 
            array (
                'id' => 1805,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:07:10',
                'updated_at' => '2023-06-28 13:07:10',
            ),
            305 => 
            array (
                'id' => 1806,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:07:13',
                'updated_at' => '2023-06-28 13:07:13',
            ),
            306 => 
            array (
                'id' => 1807,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:07:24',
                'updated_at' => '2023-06-28 13:07:24',
            ),
            307 => 
            array (
                'id' => 1808,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:07:45',
                'updated_at' => '2023-06-28 13:07:45',
            ),
            308 => 
            array (
                'id' => 1809,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:08:17',
                'updated_at' => '2023-06-28 13:08:17',
            ),
            309 => 
            array (
                'id' => 1810,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:08:59',
                'updated_at' => '2023-06-28 13:08:59',
            ),
            310 => 
            array (
                'id' => 1811,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:11:40',
                'updated_at' => '2023-06-28 13:11:40',
            ),
            311 => 
            array (
                'id' => 1812,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:11:49',
                'updated_at' => '2023-06-28 13:11:49',
            ),
            312 => 
            array (
                'id' => 1813,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:14:11',
                'updated_at' => '2023-06-28 13:14:11',
            ),
            313 => 
            array (
                'id' => 1814,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:14:15',
                'updated_at' => '2023-06-28 13:14:15',
            ),
            314 => 
            array (
                'id' => 1815,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:14:21',
                'updated_at' => '2023-06-28 13:14:21',
            ),
            315 => 
            array (
                'id' => 1816,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:16:42',
                'updated_at' => '2023-06-28 13:16:42',
            ),
            316 => 
            array (
                'id' => 1817,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:17:24',
                'updated_at' => '2023-06-28 13:17:24',
            ),
            317 => 
            array (
                'id' => 1818,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:17:37',
                'updated_at' => '2023-06-28 13:17:37',
            ),
            318 => 
            array (
                'id' => 1819,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:18:41',
                'updated_at' => '2023-06-28 13:18:41',
            ),
            319 => 
            array (
                'id' => 1820,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:19:25',
                'updated_at' => '2023-06-28 13:19:25',
            ),
            320 => 
            array (
                'id' => 1821,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:20:07',
                'updated_at' => '2023-06-28 13:20:07',
            ),
            321 => 
            array (
                'id' => 1822,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:20:45',
                'updated_at' => '2023-06-28 13:20:45',
            ),
            322 => 
            array (
                'id' => 1823,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:21:18',
                'updated_at' => '2023-06-28 13:21:18',
            ),
            323 => 
            array (
                'id' => 1824,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:21:29',
                'updated_at' => '2023-06-28 13:21:29',
            ),
            324 => 
            array (
                'id' => 1825,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:50:24',
                'updated_at' => '2023-06-28 13:50:24',
            ),
            325 => 
            array (
                'id' => 1826,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:50:50',
                'updated_at' => '2023-06-28 13:50:50',
            ),
            326 => 
            array (
                'id' => 1827,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:51:36',
                'updated_at' => '2023-06-28 13:51:36',
            ),
            327 => 
            array (
                'id' => 1828,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:52:27',
                'updated_at' => '2023-06-28 13:52:27',
            ),
            328 => 
            array (
                'id' => 1829,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:52:50',
                'updated_at' => '2023-06-28 13:52:50',
            ),
            329 => 
            array (
                'id' => 1830,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:53:12',
                'updated_at' => '2023-06-28 13:53:12',
            ),
            330 => 
            array (
                'id' => 1831,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:53:24',
                'updated_at' => '2023-06-28 13:53:24',
            ),
            331 => 
            array (
                'id' => 1832,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:53:37',
                'updated_at' => '2023-06-28 13:53:37',
            ),
            332 => 
            array (
                'id' => 1833,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 13:53:54',
                'updated_at' => '2023-06-28 13:53:54',
            ),
            333 => 
            array (
                'id' => 1834,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:05:15',
                'updated_at' => '2023-06-28 14:05:15',
            ),
            334 => 
            array (
                'id' => 1835,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:06:11',
                'updated_at' => '2023-06-28 14:06:11',
            ),
            335 => 
            array (
                'id' => 1836,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:06:15',
                'updated_at' => '2023-06-28 14:06:15',
            ),
            336 => 
            array (
                'id' => 1837,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:07:10',
                'updated_at' => '2023-06-28 14:07:10',
            ),
            337 => 
            array (
                'id' => 1838,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:08:35',
                'updated_at' => '2023-06-28 14:08:35',
            ),
            338 => 
            array (
                'id' => 1839,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:10:22',
                'updated_at' => '2023-06-28 14:10:22',
            ),
            339 => 
            array (
                'id' => 1840,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:11:10',
                'updated_at' => '2023-06-28 14:11:10',
            ),
            340 => 
            array (
                'id' => 1841,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:11:46',
                'updated_at' => '2023-06-28 14:11:46',
            ),
            341 => 
            array (
                'id' => 1842,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:12:26',
                'updated_at' => '2023-06-28 14:12:26',
            ),
            342 => 
            array (
                'id' => 1843,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:14:36',
                'updated_at' => '2023-06-28 14:14:36',
            ),
            343 => 
            array (
                'id' => 1844,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:15:51',
                'updated_at' => '2023-06-28 14:15:51',
            ),
            344 => 
            array (
                'id' => 1845,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:17:42',
                'updated_at' => '2023-06-28 14:17:42',
            ),
            345 => 
            array (
                'id' => 1846,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:18:02',
                'updated_at' => '2023-06-28 14:18:02',
            ),
            346 => 
            array (
                'id' => 1847,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:23:00',
                'updated_at' => '2023-06-28 14:23:00',
            ),
            347 => 
            array (
                'id' => 1848,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:23:26',
                'updated_at' => '2023-06-28 14:23:26',
            ),
            348 => 
            array (
                'id' => 1849,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:24:24',
                'updated_at' => '2023-06-28 14:24:24',
            ),
            349 => 
            array (
                'id' => 1850,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:27:19',
                'updated_at' => '2023-06-28 14:27:19',
            ),
            350 => 
            array (
                'id' => 1851,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:29:28',
                'updated_at' => '2023-06-28 14:29:28',
            ),
            351 => 
            array (
                'id' => 1852,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:29:45',
                'updated_at' => '2023-06-28 14:29:45',
            ),
            352 => 
            array (
                'id' => 1853,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:31:19',
                'updated_at' => '2023-06-28 14:31:19',
            ),
            353 => 
            array (
                'id' => 1854,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:32:04',
                'updated_at' => '2023-06-28 14:32:04',
            ),
            354 => 
            array (
                'id' => 1855,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:33:01',
                'updated_at' => '2023-06-28 14:33:01',
            ),
            355 => 
            array (
                'id' => 1856,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:45:35',
                'updated_at' => '2023-06-28 14:45:35',
            ),
            356 => 
            array (
                'id' => 1857,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:46:08',
                'updated_at' => '2023-06-28 14:46:08',
            ),
            357 => 
            array (
                'id' => 1858,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:47:31',
                'updated_at' => '2023-06-28 14:47:31',
            ),
            358 => 
            array (
                'id' => 1859,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:49:32',
                'updated_at' => '2023-06-28 14:49:32',
            ),
            359 => 
            array (
                'id' => 1860,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:50:54',
                'updated_at' => '2023-06-28 14:50:54',
            ),
            360 => 
            array (
                'id' => 1861,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:51:03',
                'updated_at' => '2023-06-28 14:51:03',
            ),
            361 => 
            array (
                'id' => 1862,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:55:01',
                'updated_at' => '2023-06-28 14:55:01',
            ),
            362 => 
            array (
                'id' => 1863,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:55:57',
                'updated_at' => '2023-06-28 14:55:57',
            ),
            363 => 
            array (
                'id' => 1864,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:56:43',
                'updated_at' => '2023-06-28 14:56:43',
            ),
            364 => 
            array (
                'id' => 1865,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:57:17',
                'updated_at' => '2023-06-28 14:57:17',
            ),
            365 => 
            array (
                'id' => 1866,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:58:25',
                'updated_at' => '2023-06-28 14:58:25',
            ),
            366 => 
            array (
                'id' => 1867,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 14:59:32',
                'updated_at' => '2023-06-28 14:59:32',
            ),
            367 => 
            array (
                'id' => 1868,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:05:10',
                'updated_at' => '2023-06-28 15:05:10',
            ),
            368 => 
            array (
                'id' => 1869,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:08:26',
                'updated_at' => '2023-06-28 15:08:26',
            ),
            369 => 
            array (
                'id' => 1870,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:09:34',
                'updated_at' => '2023-06-28 15:09:34',
            ),
            370 => 
            array (
                'id' => 1871,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:09:37',
                'updated_at' => '2023-06-28 15:09:37',
            ),
            371 => 
            array (
                'id' => 1872,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:13:00',
                'updated_at' => '2023-06-28 15:13:00',
            ),
            372 => 
            array (
                'id' => 1873,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:13:16',
                'updated_at' => '2023-06-28 15:13:16',
            ),
            373 => 
            array (
                'id' => 1874,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:15:41',
                'updated_at' => '2023-06-28 15:15:41',
            ),
            374 => 
            array (
                'id' => 1875,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:16:39',
                'updated_at' => '2023-06-28 15:16:39',
            ),
            375 => 
            array (
                'id' => 1876,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:19:02',
                'updated_at' => '2023-06-28 15:19:02',
            ),
            376 => 
            array (
                'id' => 1877,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:19:07',
                'updated_at' => '2023-06-28 15:19:07',
            ),
            377 => 
            array (
                'id' => 1878,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:19:40',
                'updated_at' => '2023-06-28 15:19:40',
            ),
            378 => 
            array (
                'id' => 1879,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:19:45',
                'updated_at' => '2023-06-28 15:19:45',
            ),
            379 => 
            array (
                'id' => 1880,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:20:20',
                'updated_at' => '2023-06-28 15:20:20',
            ),
            380 => 
            array (
                'id' => 1881,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:21:35',
                'updated_at' => '2023-06-28 15:21:35',
            ),
            381 => 
            array (
                'id' => 1882,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:32:36',
                'updated_at' => '2023-06-28 15:32:36',
            ),
            382 => 
            array (
                'id' => 1883,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:37:13',
                'updated_at' => '2023-06-28 15:37:13',
            ),
            383 => 
            array (
                'id' => 1884,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:48:27',
                'updated_at' => '2023-06-28 15:48:27',
            ),
            384 => 
            array (
                'id' => 1885,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 15:55:55',
                'updated_at' => '2023-06-28 15:55:55',
            ),
            385 => 
            array (
                'id' => 1886,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 16:26:59',
                'updated_at' => '2023-06-28 16:26:59',
            ),
            386 => 
            array (
                'id' => 1887,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 16:27:09',
                'updated_at' => '2023-06-28 16:27:09',
            ),
            387 => 
            array (
                'id' => 1888,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 16:28:16',
                'updated_at' => '2023-06-28 16:28:16',
            ),
            388 => 
            array (
                'id' => 1889,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 16:35:31',
                'updated_at' => '2023-06-28 16:35:31',
            ),
            389 => 
            array (
                'id' => 1890,
                'ip_address' => '172.69.183.133',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 17:05:43',
                'updated_at' => '2023-06-28 17:05:43',
            ),
            390 => 
            array (
                'id' => 1891,
                'ip_address' => '172.69.183.133',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 17:10:14',
                'updated_at' => '2023-06-28 17:10:14',
            ),
            391 => 
            array (
                'id' => 1892,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 17:22:44',
                'updated_at' => '2023-06-28 17:22:44',
            ),
            392 => 
            array (
                'id' => 1893,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 17:23:27',
                'updated_at' => '2023-06-28 17:23:27',
            ),
            393 => 
            array (
                'id' => 1894,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 17:39:35',
                'updated_at' => '2023-06-28 17:39:35',
            ),
            394 => 
            array (
                'id' => 1895,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 17:45:44',
                'updated_at' => '2023-06-28 17:45:44',
            ),
            395 => 
            array (
                'id' => 1896,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 17:45:56',
                'updated_at' => '2023-06-28 17:45:56',
            ),
            396 => 
            array (
                'id' => 1897,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 17:49:07',
                'updated_at' => '2023-06-28 17:49:07',
            ),
            397 => 
            array (
                'id' => 1898,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 17:51:02',
                'updated_at' => '2023-06-28 17:51:02',
            ),
            398 => 
            array (
                'id' => 1899,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 17:51:42',
                'updated_at' => '2023-06-28 17:51:42',
            ),
            399 => 
            array (
                'id' => 1900,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 17:51:54',
                'updated_at' => '2023-06-28 17:51:54',
            ),
            400 => 
            array (
                'id' => 1901,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 17:52:25',
                'updated_at' => '2023-06-28 17:52:25',
            ),
            401 => 
            array (
                'id' => 1902,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 17:52:36',
                'updated_at' => '2023-06-28 17:52:36',
            ),
            402 => 
            array (
                'id' => 1903,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 18:51:29',
                'updated_at' => '2023-06-28 18:51:29',
            ),
            403 => 
            array (
                'id' => 1904,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 21:15:57',
                'updated_at' => '2023-06-28 21:15:57',
            ),
            404 => 
            array (
                'id' => 1905,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 21:16:58',
                'updated_at' => '2023-06-28 21:16:58',
            ),
            405 => 
            array (
                'id' => 1906,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 21:17:11',
                'updated_at' => '2023-06-28 21:17:11',
            ),
            406 => 
            array (
                'id' => 1907,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 21:17:38',
                'updated_at' => '2023-06-28 21:17:38',
            ),
            407 => 
            array (
                'id' => 1908,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:19:30',
                'updated_at' => '2023-06-28 23:19:30',
            ),
            408 => 
            array (
                'id' => 1909,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:22:19',
                'updated_at' => '2023-06-28 23:22:19',
            ),
            409 => 
            array (
                'id' => 1910,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:22:20',
                'updated_at' => '2023-06-28 23:22:20',
            ),
            410 => 
            array (
                'id' => 1911,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:23:47',
                'updated_at' => '2023-06-28 23:23:47',
            ),
            411 => 
            array (
                'id' => 1912,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:26:24',
                'updated_at' => '2023-06-28 23:26:24',
            ),
            412 => 
            array (
                'id' => 1913,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:27:52',
                'updated_at' => '2023-06-28 23:27:52',
            ),
            413 => 
            array (
                'id' => 1914,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:28:33',
                'updated_at' => '2023-06-28 23:28:33',
            ),
            414 => 
            array (
                'id' => 1915,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:32:15',
                'updated_at' => '2023-06-28 23:32:15',
            ),
            415 => 
            array (
                'id' => 1916,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:34:44',
                'updated_at' => '2023-06-28 23:34:44',
            ),
            416 => 
            array (
                'id' => 1917,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:35:38',
                'updated_at' => '2023-06-28 23:35:38',
            ),
            417 => 
            array (
                'id' => 1918,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:36:40',
                'updated_at' => '2023-06-28 23:36:40',
            ),
            418 => 
            array (
                'id' => 1919,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:40:31',
                'updated_at' => '2023-06-28 23:40:31',
            ),
            419 => 
            array (
                'id' => 1920,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:40:53',
                'updated_at' => '2023-06-28 23:40:53',
            ),
            420 => 
            array (
                'id' => 1921,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-28 23:41:09',
                'updated_at' => '2023-06-28 23:41:09',
            ),
            421 => 
            array (
                'id' => 1922,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 10:14:10',
                'updated_at' => '2023-06-29 10:14:10',
            ),
            422 => 
            array (
                'id' => 1923,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 10:14:43',
                'updated_at' => '2023-06-29 10:14:43',
            ),
            423 => 
            array (
                'id' => 1924,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 10:17:08',
                'updated_at' => '2023-06-29 10:17:08',
            ),
            424 => 
            array (
                'id' => 1925,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 10:27:44',
                'updated_at' => '2023-06-29 10:27:44',
            ),
            425 => 
            array (
                'id' => 1926,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 10:30:47',
                'updated_at' => '2023-06-29 10:30:47',
            ),
            426 => 
            array (
                'id' => 1927,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 10:35:29',
                'updated_at' => '2023-06-29 10:35:29',
            ),
            427 => 
            array (
                'id' => 1928,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 10:44:48',
                'updated_at' => '2023-06-29 10:44:48',
            ),
            428 => 
            array (
                'id' => 1929,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 10:49:31',
                'updated_at' => '2023-06-29 10:49:31',
            ),
            429 => 
            array (
                'id' => 1930,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 11:03:17',
                'updated_at' => '2023-06-29 11:03:17',
            ),
            430 => 
            array (
                'id' => 1931,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 11:09:06',
                'updated_at' => '2023-06-29 11:09:06',
            ),
            431 => 
            array (
                'id' => 1932,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 11:17:41',
                'updated_at' => '2023-06-29 11:17:41',
            ),
            432 => 
            array (
                'id' => 1933,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 11:20:44',
                'updated_at' => '2023-06-29 11:20:44',
            ),
            433 => 
            array (
                'id' => 1934,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 11:37:49',
                'updated_at' => '2023-06-29 11:37:49',
            ),
            434 => 
            array (
                'id' => 1935,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 11:40:45',
                'updated_at' => '2023-06-29 11:40:45',
            ),
            435 => 
            array (
                'id' => 1936,
                'ip_address' => '172.69.183.133',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 12:01:06',
                'updated_at' => '2023-06-29 12:01:06',
            ),
            436 => 
            array (
                'id' => 1937,
                'ip_address' => '172.69.183.133',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 12:03:10',
                'updated_at' => '2023-06-29 12:03:10',
            ),
            437 => 
            array (
                'id' => 1938,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 12:07:09',
                'updated_at' => '2023-06-29 12:07:09',
            ),
            438 => 
            array (
                'id' => 1939,
                'ip_address' => '172.69.183.133',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 12:21:08',
                'updated_at' => '2023-06-29 12:21:08',
            ),
            439 => 
            array (
                'id' => 1940,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 12:34:07',
                'updated_at' => '2023-06-29 12:34:07',
            ),
            440 => 
            array (
                'id' => 1941,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 12:57:06',
                'updated_at' => '2023-06-29 12:57:06',
            ),
            441 => 
            array (
                'id' => 1942,
                'ip_address' => '172.70.246.11',
                'visit_status' => 0,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 13:44:46',
                'updated_at' => '2023-06-29 13:44:46',
            ),
            442 => 
            array (
                'id' => 1943,
                'ip_address' => '172.69.183.132',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 13:46:00',
                'updated_at' => '2023-06-29 13:46:00',
            ),
            443 => 
            array (
                'id' => 1944,
                'ip_address' => '172.69.183.136',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 13:55:45',
                'updated_at' => '2023-06-29 13:55:45',
            ),
            444 => 
            array (
                'id' => 1945,
                'ip_address' => '172.70.246.10',
                'visit_status' => 0,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 13:59:16',
                'updated_at' => '2023-06-29 13:59:16',
            ),
            445 => 
            array (
                'id' => 1946,
                'ip_address' => '172.69.183.132',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 14:03:10',
                'updated_at' => '2023-06-29 14:03:10',
            ),
            446 => 
            array (
                'id' => 1947,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 14:06:20',
                'updated_at' => '2023-06-29 14:06:20',
            ),
            447 => 
            array (
                'id' => 1948,
                'ip_address' => '172.70.247.75',
                'visit_status' => 0,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:10:58',
                'updated_at' => '2023-06-29 14:10:58',
            ),
            448 => 
            array (
                'id' => 1949,
                'ip_address' => '172.70.246.11',
                'visit_status' => 1,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:13:41',
                'updated_at' => '2023-06-29 14:13:41',
            ),
            449 => 
            array (
                'id' => 1950,
                'ip_address' => '162.158.111.146',
                'visit_status' => 0,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:16:24',
                'updated_at' => '2023-06-29 14:16:24',
            ),
            450 => 
            array (
                'id' => 1951,
                'ip_address' => '172.70.246.10',
                'visit_status' => 1,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:18:10',
                'updated_at' => '2023-06-29 14:18:10',
            ),
            451 => 
            array (
                'id' => 1952,
                'ip_address' => '172.70.246.10',
                'visit_status' => 1,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:18:50',
                'updated_at' => '2023-06-29 14:18:50',
            ),
            452 => 
            array (
                'id' => 1953,
                'ip_address' => '172.70.246.11',
                'visit_status' => 1,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:19:19',
                'updated_at' => '2023-06-29 14:19:19',
            ),
            453 => 
            array (
                'id' => 1954,
                'ip_address' => '172.70.246.10',
                'visit_status' => 1,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:19:31',
                'updated_at' => '2023-06-29 14:19:31',
            ),
            454 => 
            array (
                'id' => 1955,
                'ip_address' => '172.70.246.11',
                'visit_status' => 1,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:22:16',
                'updated_at' => '2023-06-29 14:22:16',
            ),
            455 => 
            array (
                'id' => 1956,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 14:22:55',
                'updated_at' => '2023-06-29 14:22:55',
            ),
            456 => 
            array (
                'id' => 1957,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 14:23:17',
                'updated_at' => '2023-06-29 14:23:17',
            ),
            457 => 
            array (
                'id' => 1958,
                'ip_address' => '172.70.246.10',
                'visit_status' => 1,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:23:25',
                'updated_at' => '2023-06-29 14:23:25',
            ),
            458 => 
            array (
                'id' => 1959,
                'ip_address' => '172.70.246.10',
                'visit_status' => 1,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:25:59',
                'updated_at' => '2023-06-29 14:25:59',
            ),
            459 => 
            array (
                'id' => 1960,
                'ip_address' => '172.70.246.10',
                'visit_status' => 1,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:41:29',
                'updated_at' => '2023-06-29 14:41:29',
            ),
            460 => 
            array (
                'id' => 1961,
                'ip_address' => '172.70.246.11',
                'visit_status' => 1,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:42:50',
                'updated_at' => '2023-06-29 14:42:50',
            ),
            461 => 
            array (
                'id' => 1962,
                'ip_address' => '172.70.246.182',
                'visit_status' => 0,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:52:26',
                'updated_at' => '2023-06-29 14:52:26',
            ),
            462 => 
            array (
                'id' => 1963,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 14:53:01',
                'updated_at' => '2023-06-29 14:53:01',
            ),
            463 => 
            array (
                'id' => 1964,
                'ip_address' => '172.70.246.182',
                'visit_status' => 1,
                'location' => 'Prithvi Highway, Byas',
                'created_at' => '2023-06-29 14:53:05',
                'updated_at' => '2023-06-29 14:53:05',
            ),
            464 => 
            array (
                'id' => 1965,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 14:54:00',
                'updated_at' => '2023-06-29 14:54:00',
            ),
            465 => 
            array (
                'id' => 1966,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:06:41',
                'updated_at' => '2023-06-29 15:06:41',
            ),
            466 => 
            array (
                'id' => 1967,
                'ip_address' => '172.69.183.138',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:18:13',
                'updated_at' => '2023-06-29 15:18:13',
            ),
            467 => 
            array (
                'id' => 1968,
                'ip_address' => '172.69.183.139',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:23:23',
                'updated_at' => '2023-06-29 15:23:23',
            ),
            468 => 
            array (
                'id' => 1969,
                'ip_address' => '172.69.183.137',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:23:24',
                'updated_at' => '2023-06-29 15:23:24',
            ),
            469 => 
            array (
                'id' => 1970,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:32:28',
                'updated_at' => '2023-06-29 15:32:28',
            ),
            470 => 
            array (
                'id' => 1971,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:32:45',
                'updated_at' => '2023-06-29 15:32:45',
            ),
            471 => 
            array (
                'id' => 1972,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:33:43',
                'updated_at' => '2023-06-29 15:33:43',
            ),
            472 => 
            array (
                'id' => 1973,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:35:32',
                'updated_at' => '2023-06-29 15:35:32',
            ),
            473 => 
            array (
                'id' => 1974,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:35:57',
                'updated_at' => '2023-06-29 15:35:57',
            ),
            474 => 
            array (
                'id' => 1975,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:42:05',
                'updated_at' => '2023-06-29 15:42:05',
            ),
            475 => 
            array (
                'id' => 1976,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:42:27',
                'updated_at' => '2023-06-29 15:42:27',
            ),
            476 => 
            array (
                'id' => 1977,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:42:43',
                'updated_at' => '2023-06-29 15:42:43',
            ),
            477 => 
            array (
                'id' => 1978,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:45:49',
                'updated_at' => '2023-06-29 15:45:49',
            ),
            478 => 
            array (
                'id' => 1979,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:53:19',
                'updated_at' => '2023-06-29 15:53:19',
            ),
            479 => 
            array (
                'id' => 1980,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:55:08',
                'updated_at' => '2023-06-29 15:55:08',
            ),
            480 => 
            array (
                'id' => 1981,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:55:15',
                'updated_at' => '2023-06-29 15:55:15',
            ),
            481 => 
            array (
                'id' => 1982,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 15:59:44',
                'updated_at' => '2023-06-29 15:59:44',
            ),
            482 => 
            array (
                'id' => 1983,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 16:37:53',
                'updated_at' => '2023-06-29 16:37:53',
            ),
            483 => 
            array (
                'id' => 1984,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 16:50:25',
                'updated_at' => '2023-06-29 16:50:25',
            ),
            484 => 
            array (
                'id' => 1985,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-29 18:03:10',
                'updated_at' => '2023-06-29 18:03:10',
            ),
            485 => 
            array (
                'id' => 1986,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 10:27:34',
                'updated_at' => '2023-06-30 10:27:34',
            ),
            486 => 
            array (
                'id' => 1987,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 10:54:11',
                'updated_at' => '2023-06-30 10:54:11',
            ),
            487 => 
            array (
                'id' => 1988,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 11:30:16',
                'updated_at' => '2023-06-30 11:30:16',
            ),
            488 => 
            array (
                'id' => 1989,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 11:34:02',
                'updated_at' => '2023-06-30 11:34:02',
            ),
            489 => 
            array (
                'id' => 1990,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 11:42:03',
                'updated_at' => '2023-06-30 11:42:03',
            ),
            490 => 
            array (
                'id' => 1991,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 11:51:47',
                'updated_at' => '2023-06-30 11:51:47',
            ),
            491 => 
            array (
                'id' => 1992,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 11:54:36',
                'updated_at' => '2023-06-30 11:54:36',
            ),
            492 => 
            array (
                'id' => 1993,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 12:21:39',
                'updated_at' => '2023-06-30 12:21:39',
            ),
            493 => 
            array (
                'id' => 1994,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 12:21:55',
                'updated_at' => '2023-06-30 12:21:55',
            ),
            494 => 
            array (
                'id' => 1995,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 12:25:07',
                'updated_at' => '2023-06-30 12:25:07',
            ),
            495 => 
            array (
                'id' => 1996,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 12:38:40',
                'updated_at' => '2023-06-30 12:38:40',
            ),
            496 => 
            array (
                'id' => 1997,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 14:16:09',
                'updated_at' => '2023-06-30 14:16:09',
            ),
            497 => 
            array (
                'id' => 1998,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 14:26:54',
                'updated_at' => '2023-06-30 14:26:54',
            ),
            498 => 
            array (
                'id' => 1999,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 14:59:54',
                'updated_at' => '2023-06-30 14:59:54',
            ),
            499 => 
            array (
                'id' => 2000,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 14:59:57',
                'updated_at' => '2023-06-30 14:59:57',
            ),
        ));
        \DB::table('visitors')->insert(array (
            0 => 
            array (
                'id' => 2001,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:02:32',
                'updated_at' => '2023-06-30 15:02:32',
            ),
            1 => 
            array (
                'id' => 2002,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:03:55',
                'updated_at' => '2023-06-30 15:03:55',
            ),
            2 => 
            array (
                'id' => 2003,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:05:08',
                'updated_at' => '2023-06-30 15:05:08',
            ),
            3 => 
            array (
                'id' => 2004,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:09:13',
                'updated_at' => '2023-06-30 15:09:13',
            ),
            4 => 
            array (
                'id' => 2005,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:10:25',
                'updated_at' => '2023-06-30 15:10:25',
            ),
            5 => 
            array (
                'id' => 2006,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:14:03',
                'updated_at' => '2023-06-30 15:14:03',
            ),
            6 => 
            array (
                'id' => 2007,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:15:10',
                'updated_at' => '2023-06-30 15:15:10',
            ),
            7 => 
            array (
                'id' => 2008,
                'ip_address' => '172.69.77.27',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:17:03',
                'updated_at' => '2023-06-30 15:17:03',
            ),
            8 => 
            array (
                'id' => 2009,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:19:18',
                'updated_at' => '2023-06-30 15:19:18',
            ),
            9 => 
            array (
                'id' => 2010,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:22:11',
                'updated_at' => '2023-06-30 15:22:11',
            ),
            10 => 
            array (
                'id' => 2011,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:22:20',
                'updated_at' => '2023-06-30 15:22:20',
            ),
            11 => 
            array (
                'id' => 2012,
                'ip_address' => '172.69.77.32',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:22:49',
                'updated_at' => '2023-06-30 15:22:49',
            ),
            12 => 
            array (
                'id' => 2013,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:23:15',
                'updated_at' => '2023-06-30 15:23:15',
            ),
            13 => 
            array (
                'id' => 2014,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:25:21',
                'updated_at' => '2023-06-30 15:25:21',
            ),
            14 => 
            array (
                'id' => 2015,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:29:15',
                'updated_at' => '2023-06-30 15:29:15',
            ),
            15 => 
            array (
                'id' => 2016,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:32:29',
                'updated_at' => '2023-06-30 15:32:29',
            ),
            16 => 
            array (
                'id' => 2017,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:40:45',
                'updated_at' => '2023-06-30 15:40:45',
            ),
            17 => 
            array (
                'id' => 2018,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:41:07',
                'updated_at' => '2023-06-30 15:41:07',
            ),
            18 => 
            array (
                'id' => 2019,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:41:51',
                'updated_at' => '2023-06-30 15:41:51',
            ),
            19 => 
            array (
                'id' => 2020,
                'ip_address' => '172.69.77.33',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 15:49:03',
                'updated_at' => '2023-06-30 15:49:03',
            ),
            20 => 
            array (
                'id' => 2021,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 16:02:53',
                'updated_at' => '2023-06-30 16:02:53',
            ),
            21 => 
            array (
                'id' => 2022,
                'ip_address' => '172.69.77.42',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 16:28:22',
                'updated_at' => '2023-06-30 16:28:22',
            ),
            22 => 
            array (
                'id' => 2023,
                'ip_address' => '172.69.77.26',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 16:30:44',
                'updated_at' => '2023-06-30 16:30:44',
            ),
            23 => 
            array (
                'id' => 2024,
                'ip_address' => '172.69.77.31',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 17:00:32',
                'updated_at' => '2023-06-30 17:00:32',
            ),
            24 => 
            array (
                'id' => 2025,
                'ip_address' => '172.69.77.30',
                'visit_status' => 1,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-06-30 17:00:33',
                'updated_at' => '2023-06-30 17:00:33',
            ),
            25 => 
            array (
                'id' => 2026,
                'ip_address' => '172.68.203.134',
                'visit_status' => 0,
                'location' => 'Ghattekulo, Kathmandu',
                'created_at' => '2023-07-01 14:13:05',
                'updated_at' => '2023-07-01 14:13:05',
            ),
            26 => 
            array (
                'id' => 2027,
                'ip_address' => '172.69.77.43',
                'visit_status' => 1,
                'location' => 'Bhaktapur Glass House, Bhaktapur',
                'created_at' => '2023-07-01 17:57:09',
                'updated_at' => '2023-07-01 17:57:09',
            ),
        ));
        
        
    }
}
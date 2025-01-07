<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IncentiveManagersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('incentive_managers')->delete();
        
        \DB::table('incentive_managers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'incentive_receiver' => 12,
                'incentive_percentage' => '40',
                'minimum' => 5,
                'package_type' => 'individual',
                'maximum' => '10',
                'created_at' => '2023-06-29 12:25:05',
                'updated_at' => '2023-06-29 12:25:05',
            ),
            1 => 
            array (
                'id' => 2,
                'incentive_receiver' => 12,
                'incentive_percentage' => '0.2',
                'minimum' => 11,
                'package_type' => 'individual',
                'maximum' => '35',
                'created_at' => '2023-07-06 11:13:04',
                'updated_at' => '2023-07-06 11:13:04',
            ),
            2 => 
            array (
                'id' => 3,
                'incentive_receiver' => 12,
                'incentive_percentage' => '0.4',
                'minimum' => 36,
                'package_type' => 'individual',
                'maximum' => '45',
                'created_at' => '2023-07-06 11:13:39',
                'updated_at' => '2023-07-06 11:13:39',
            ),
            3 => 
            array (
                'id' => 4,
                'incentive_receiver' => 12,
                'incentive_percentage' => '0.5',
                'minimum' => 46,
                'package_type' => 'individual',
                'maximum' => '53',
                'created_at' => '2023-07-06 11:14:15',
                'updated_at' => '2023-07-06 11:14:15',
            ),
            4 => 
            array (
                'id' => 5,
                'incentive_receiver' => 12,
                'incentive_percentage' => '53',
                'minimum' => 53,
                'package_type' => 'individual',
                'maximum' => '1000',
                'created_at' => '2023-07-06 11:14:43',
                'updated_at' => '2023-07-06 11:14:43',
            ),
            5 => 
            array (
                'id' => 6,
                'incentive_receiver' => 12,
                'incentive_percentage' => '4',
                'minimum' => 1,
                'package_type' => 'corporate',
                'maximum' => '5',
                'created_at' => '2023-07-06 11:38:37',
                'updated_at' => '2023-07-06 11:38:37',
            ),
            6 => 
            array (
                'id' => 7,
                'incentive_receiver' => 12,
                'incentive_percentage' => '0.1',
                'minimum' => 6,
                'package_type' => 'corporate',
                'maximum' => '15',
                'created_at' => '2023-07-06 11:39:01',
                'updated_at' => '2023-07-06 11:39:01',
            ),
            7 => 
            array (
                'id' => 8,
                'incentive_receiver' => 12,
                'incentive_percentage' => '0.1',
                'minimum' => 15,
                'package_type' => 'corporate',
                'maximum' => '25',
                'created_at' => '2023-07-06 11:39:37',
                'updated_at' => '2023-07-06 11:39:37',
            ),
            8 => 
            array (
                'id' => 9,
                'incentive_receiver' => 12,
                'incentive_percentage' => '7',
                'minimum' => 26,
                'package_type' => 'corporate',
                'maximum' => '1000',
                'created_at' => '2023-07-06 11:40:10',
                'updated_at' => '2023-07-06 11:40:10',
            ),
        ));
        
        
    }
}
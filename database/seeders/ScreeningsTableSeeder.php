<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ScreeningsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('screenings')->delete();
        
        \DB::table('screenings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'screening' => 'First Screening',
                'color' => '#A3E88B',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'screening' => 'Second Screening',
                'color' => '#FDA591',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'screening' => 'Third Screening',
                'color' => '#D6C672',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'screening' => 'Fourth Screening',
                'color' => '#E68989',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'screening' => 'Fifth Screening',
                'color' => '#8998E6',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'screening' => 'Sixth Screening',
                'color' => '#E887EA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'screening' => 'Seventh Screening',
                'color' => '#7DBCA9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'screening' => 'Eighth Screening',
                'color' => '#A389DA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'screening' => 'Ninth Screening',
                'color' => '#318544',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'screening' => 'Tenth Screening',
                'color' => '#DA7C7C',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'screening' => 'Eleventh Screening',
                'color' => '#7DBCA9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'screening' => 'Twelfth Screening',
                'color' => '#AAAAAA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
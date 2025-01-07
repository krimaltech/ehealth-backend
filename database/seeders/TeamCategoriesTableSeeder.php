<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('team_categories')->delete();
        
        \DB::table('team_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'ADVISORS-4ey',
                'category_name' => 'ADVISORS',
                'created_at' => '2022-12-02 12:48:44',
                'updated_at' => '2022-12-02 12:48:44',
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'MEDICAL-ADVISORS-C0H',
                'category_name' => 'MEDICAL ADVISORS',
                'created_at' => '2022-12-02 12:48:50',
                'updated_at' => '2022-12-02 12:48:50',
            ),
            2 => 
            array (
                'id' => 3,
                'slug' => 'EXPERTISE-ADVISORS-Ci3',
                'category_name' => 'EXPERTISE ADVISORS',
                'created_at' => '2022-12-02 12:48:56',
                'updated_at' => '2022-12-02 12:48:56',
            ),
            3 => 
            array (
                'id' => 4,
                'slug' => 'GD-CHARIOTEERS-wMo',
                'category_name' => 'GD CHARIOTEERS',
                'created_at' => '2022-12-02 12:49:04',
                'updated_at' => '2022-12-02 12:49:04',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'permission_title' => 'Vendor Advertisement',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'permission_title' => 'Global Form',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'permission_title' => 'Our Doctor',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => 15,
            ),
            3 => 
            array (
                'id' => 4,
                'permission_title' => 'Our Vendor',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => 15,
            ),
            4 => 
            array (
                'id' => 5,
                'permission_title' => 'Our Nurse',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => 15,
            ),
            5 => 
            array (
                'id' => 6,
                'permission_title' => 'Our Driver',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => 15,
            ),
            6 => 
            array (
                'id' => 7,
                'permission_title' => 'Sub Roles',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'permission_title' => 'Authentication Logs',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'permission_title' => 'Role And Permission',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'permission_title' => 'Incentive Manager',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'permission_title' => 'Incentive Calculation',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'permission_title' => 'Remove Role',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'permission_title' => 'Our Relationship Officer',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => 15,
            ),
            13 => 
            array (
                'id' => 14,
                'permission_title' => 'Company Profile',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'permission_title' => 'Our Partners',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'permission_title' => 'News Portal',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'permission_title' => 'Ecommerce',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'permission_title' => 'Settings',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'permission_title' => 'Career',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'permission_title' => 'Lab Setup
',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'permission_title' => 'Packages',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'permission_title' => 'Reports
',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'permission_title' => 'User Packages',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'permission_title' => 'Family Settings',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'permission_title' => 'Doctor Department',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'permission_title' => 'Insurance',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'permission_title' => 'Ambulance',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'permission_title' => 'Feedback',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'permission_title' => 'Report Problem',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => NULL,
                'sub_category' => NULL,
            ),
        ));
        
        
    }
}
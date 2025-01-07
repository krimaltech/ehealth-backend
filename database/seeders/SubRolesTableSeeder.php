<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sub_roles')->delete();
        
        \DB::table('sub_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 3,
                'subrole' => 'GD Staff',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 3,
                'subrole' => 'Lab Technician',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 3,
                'subrole' => 'Doctor Dept Head',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 3,
                'subrole' => 'Nurse Dept Head',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 5,
                'subrole' => 'Fitness',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'role_id' => 3,
                'subrole' => 'GD Doctor',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'role_id' => 3,
                'subrole' => 'GD Nurse',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'role_id' => 3,
                'subrole' => 'DCEO/CEO',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'role_id' => 3,
                'subrole' => 'Business Development Officer',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'role_id' => 3,
                'subrole' => 'Marketing Supervisor',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'role_id' => 3,
                'subrole' => 'Relationship Manager',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'role_id' => 3,
                'subrole' => 'Relationship Officer',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'role_id' => 3,
                'subrole' => 'Insurance Department',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'role_id' => 3,
                'subrole' => 'Fitness Trainer',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'role_id' => 3,
                'subrole' => 'Lab Dept Head',
                'percentage' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
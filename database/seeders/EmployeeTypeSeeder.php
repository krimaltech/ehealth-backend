<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_types')->insert([
            [
                'employee_type' => 'GD Staff'
            ],
            [
                'employee_type' => 'Lab Technician'
            ],
        ]);
    }
}

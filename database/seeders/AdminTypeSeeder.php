<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_types')->insert([
            [
                'admin_type' => 'Advisor'
            ],
            [
                'admin_type' => 'Sasthapak'
            ],
        ]);
    }
}

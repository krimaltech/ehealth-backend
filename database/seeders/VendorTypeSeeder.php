<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendor_types')->insert([
            [
                'vendor_type' => 'Healthy Food'
            ],
            [
                'vendor_type' => 'Pharmacy'
            ],
            [
                'vendor_type' => 'Fitness Center'
            ],
        ]);
    }
}

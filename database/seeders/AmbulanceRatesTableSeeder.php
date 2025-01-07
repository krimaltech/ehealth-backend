<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AmbulanceRatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ambulance_rates')->delete();
        
        \DB::table('ambulance_rates')->insert(array (
            0 => 
            array (
                'id' => 1,
                'base_rate' => 30,
                'amount_per_km_per_hr' => 70,
                'amount_per_minute' => 2,
                'created_at' => '2022-12-02 15:35:53',
                'updated_at' => '2022-12-02 15:35:53',
            )
        ));
        
    }
}
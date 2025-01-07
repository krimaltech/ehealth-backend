<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AmbulancesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ambulances')->delete();
        
        \DB::table('ambulances')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Ambulance 1',
                'phone' => '9860123654',
                'price' => 500,
                'address' => 'Kathmandu',
                'latitude' => '27.71905483151249',
                'longitude' => '85.30911684036255',
                'created_at' => '2022-12-02 15:35:53',
                'updated_at' => '2022-12-02 15:35:53',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Ambulance 2',
                'phone' => '9841298596',
                'price' => 500,
                'address' => 'Kathmandu',
                'latitude' => '27.71232558568163',
                'longitude' => '85.31513035297395',
                'created_at' => '2022-12-02 15:36:26',
                'updated_at' => '2022-12-02 15:36:26',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Ambulance 3',
                'phone' => '9841297896',
                'price' => 500,
                'address' => 'Kathmandu',
                'latitude' => '27.695184791543955',
                'longitude' => '85.32772064208986',
                'created_at' => '2022-12-02 16:27:07',
                'updated_at' => '2022-12-02 16:27:07',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Ambulance 4',
                'phone' => '9860145896',
                'price' => 500,
                'address' => 'Kathmandu',
                'latitude' => '27.712434814581695',
                'longitude' => '85.31513035297395',
                'created_at' => '2022-12-02 16:27:37',
                'updated_at' => '2022-12-02 16:27:37',
            ),
        ));
        
        
    }
}
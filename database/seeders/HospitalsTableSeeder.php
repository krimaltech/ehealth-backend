<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HospitalsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hospitals')->delete();
        
        \DB::table('hospitals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'B & B',
                'address' => 'Kathmandu',
                'latitude' => '27.696690477610815',
                'longitude' => '85.30442833900453',
                'created_at' => '2022-12-30 12:22:24',
                'updated_at' => '2022-12-30 12:22:24',
                'email' => 'user@gmail.com',
                'phone' => '9860145032',
                'image' => 'image.fc8e23954e7cc780c245_1672382244.png',
                'image_path' => 'http://localhost:8000/storage/images/image.fc8e23954e7cc780c245_1672382244.png',
            ),
        ));
        
        
    }
}
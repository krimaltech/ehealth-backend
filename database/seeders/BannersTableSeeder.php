<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('banners')->delete();
        
        \DB::table('banners')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'slider-Preventive-Healthcare-Tailored-for-All-Your-Needs-9fY',
                'banner_title' => 'Preventive Healthcare Tailored for All Your Needs',
                'banner_body' => 'Access all health care services easily from our platform',
                'image' => 'slider final-100_1682328540.jpg',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/slider final-100_1682328540.jpg',
                'created_at' => '2023-03-31 17:10:07',
                'updated_at' => '2023-04-24 18:59:00',
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'slider-Find-Specialist-Doctors-Near-You-PhH',
                'banner_title' => 'Find Specialist Doctors Near You',
                'banner_body' => 'Get in touch with top doctors of Nepal for treatment from our platform',
                'image' => 'Artboard 1@2x-100_1681278844.jpg',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Artboard 1@2x-100_1681278844.jpg',
                'created_at' => '2023-03-31 17:11:17',
                'updated_at' => '2023-04-12 15:24:04',
            ),
        ));
        
        
    }
}
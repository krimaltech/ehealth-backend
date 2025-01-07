<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinces')->delete();
        
        \DB::table('provinces')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nepali_name' => 'प्रदेश न. १',
                'english_name' => 'Province No. 1',
                'created_at' => '2022-03-27 08:29:52',
                'updated_at' => '2022-03-27 08:29:52',
            ),
            1 => 
            array (
                'id' => 2,
                'nepali_name' => 'मधेश प्रदेश',
                'english_name' => 'Madhesh Province',
                'created_at' => '2022-03-27 08:29:52',
                'updated_at' => '2022-03-27 08:29:52',
            ),
            2 => 
            array (
                'id' => 3,
                'nepali_name' => 'बाग्मती प्रदेश',
                'english_name' => 'Bagmati Province',
                'created_at' => '2022-03-27 08:29:52',
                'updated_at' => '2022-03-27 08:29:52',
            ),
            3 => 
            array (
                'id' => 4,
                'nepali_name' => 'गण्डकी प्रदेश',
                'english_name' => 'Gandaki Province',
                'created_at' => '2022-03-27 08:29:52',
                'updated_at' => '2022-03-27 08:29:52',
            ),
            4 => 
            array (
                'id' => 5,
                'nepali_name' => 'लुम्बिनी प्रदेश',
                'english_name' => 'Lumbini Province',
                'created_at' => '2022-03-27 08:29:53',
                'updated_at' => '2022-03-27 08:29:53',
            ),
            5 => 
            array (
                'id' => 6,
                'nepali_name' => 'कर्णाली प्रदेश',
                'english_name' => 'Karnali Province',
                'created_at' => '2022-03-27 08:29:53',
                'updated_at' => '2022-03-27 08:29:53',
            ),
            6 => 
            array (
                'id' => 7,
                'nepali_name' => 'सुदुरपश्चिम प्रदेश',
                'english_name' => 'Sudurpashchim Province',
                'created_at' => '2022-03-27 08:29:53',
                'updated_at' => '2022-03-27 08:29:53',
            ),
        ));
        
        
    }
}
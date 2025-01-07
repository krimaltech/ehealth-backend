<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SymptomsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('symptoms')->delete();
        
        \DB::table('symptoms')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Back Pain',
                'name_nepali' => 'ढाड दुख्नु',
                'image' => 'Back Pain-01_1669961898.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Back Pain-01_1669961898.png',
                'created_at' => '2022-12-02 16:48:18',
                'updated_at' => '2022-12-18 19:45:21',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Breathing Problem',
                'name_nepali' => 'श्वासप्रश्वासमा समस्या',
                'image' => 'Breathing Problem-01_1669961913.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Breathing Problem-01_1669961913.png',
                'created_at' => '2022-12-02 16:48:33',
                'updated_at' => '2022-12-18 19:45:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Chest Pain',
                'name_nepali' => 'छातीको दुखाइ',
                'image' => 'Chest Pain-01_1669961978.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Chest Pain-01_1669961978.png',
                'created_at' => '2022-12-02 16:49:38',
                'updated_at' => '2022-12-18 19:45:42',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Chills',
                'name_nepali' => 'चिसो',
                'image' => 'Chills-01_1669962044.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Chills-01_1669962044.png',
                'created_at' => '2022-12-02 16:50:44',
                'updated_at' => '2022-12-18 19:45:56',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Difficulty In Hearing',
                'name_nepali' => 'सुन्नमा कठिनाई',
                'image' => 'Difficulty in Hearing-01_1669962124.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Difficulty in Hearing-01_1669962124.png',
                'created_at' => '2022-12-02 16:52:04',
                'updated_at' => '2022-12-18 19:46:10',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Dizziness',
                'name_nepali' => 'चक्कर आउनु',
                'image' => 'Dizziness-01_1669962155.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Dizziness-01_1669962155.png',
                'created_at' => '2022-12-02 16:52:35',
                'updated_at' => '2022-12-18 19:48:01',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Dizziness',
                'name_nepali' => 'चक्कर आउनु',
                'image' => 'Dizziness-01_1669962155.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Dizziness-01_1669962155.png',
                'created_at' => '2022-12-02 16:52:35',
                'updated_at' => '2022-12-02 16:52:35',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Dry Mouth',
                'name_nepali' => 'सुख्खा मुख',
                'image' => 'Dry Mouth-01_1669962194.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Dry Mouth-01_1669962194.png',
                'created_at' => '2022-12-02 16:53:14',
                'updated_at' => '2022-12-18 19:48:26',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Ear Pain',
                'name_nepali' => 'कान दुख्ने',
                'image' => 'Ear Pain-01_1669962239.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Ear Pain-01_1669962239.png',
                'created_at' => '2022-12-02 16:53:59',
                'updated_at' => '2022-12-18 19:48:40',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Fever',
                'name_nepali' => 'ज्वरो',
                'image' => 'Fever-01_1669962266.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Fever-01_1669962266.png',
                'created_at' => '2022-12-02 16:54:26',
                'updated_at' => '2022-12-18 19:48:52',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Flu',
                'name_nepali' => 'रुघा',
                'image' => 'Flu-01_1669962285.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Flu-01_1669962285.png',
                'created_at' => '2022-12-02 16:54:45',
                'updated_at' => '2022-12-18 19:49:12',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Headache',
                'name_nepali' => 'टाउको दुख्ने',
                'image' => 'Headache-01_1669962320.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Headache-01_1669962320.png',
                'created_at' => '2022-12-02 16:55:20',
                'updated_at' => '2022-12-18 19:49:30',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Hip Pain',
                'name_nepali' => 'हिप दुखाइ',
                'image' => 'Hip pain-01_1669962543.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Hip pain-01_1669962543.png',
                'created_at' => '2022-12-02 16:59:03',
                'updated_at' => '2022-12-18 19:51:22',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Join Pain',
                'name_nepali' => 'जोर्नी दुखाइ',
                'image' => 'Joint Pain-01_1669962562.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Joint Pain-01_1669962562.png',
                'created_at' => '2022-12-02 16:59:22',
                'updated_at' => '2022-12-18 19:51:46',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Poor Eyesight',
                'name_nepali' => 'कमजोर दृष्टि',
                'image' => 'Poor Eyesight-01_1669962592.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Poor Eyesight-01_1669962592.png',
                'created_at' => '2022-12-02 16:59:52',
                'updated_at' => '2022-12-18 19:52:01',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Skin Itches',
                'name_nepali' => 'छाला चिलाउने',
                'image' => 'Skin Itches-01_1669962645.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Skin Itches-01_1669962645.png',
                'created_at' => '2022-12-02 17:00:45',
                'updated_at' => '2022-12-18 19:52:16',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Sleepy',
                'name_nepali' => 'निद्रा लाग्ने',
                'image' => 'Sleepy-01_1669962665.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Sleepy-01_1669962665.png',
                'created_at' => '2022-12-02 17:01:05',
                'updated_at' => '2022-12-18 19:52:33',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Stomach Ache',
                'name_nepali' => 'पेट दुख्ने',
                'image' => 'Stomach Ache-01_1669962743.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Stomach Ache-01_1669962743.png',
                'created_at' => '2022-12-02 17:02:23',
                'updated_at' => '2022-12-18 19:52:49',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Thirstiness',
                'name_nepali' => 'तिर्खा लाग्नु',
                'image' => 'Thirstiness-01_1669962758.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Thirstiness-01_1669962758.png',
                'created_at' => '2022-12-02 17:02:38',
                'updated_at' => '2022-12-18 19:54:17',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Tiredness',
                'name_nepali' => 'थकान',
                'image' => 'Thirstiness-01_1669962775.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Thirstiness-01_1669962775.png',
                'created_at' => '2022-12-02 17:02:55',
                'updated_at' => '2022-12-18 19:54:35',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Toothache',
                'name_nepali' => 'दाँतको दुखाइ',
                'image' => 'Toothache-01_1669962795.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Toothache-01_1669962795.png',
                'created_at' => '2022-12-02 17:03:15',
                'updated_at' => '2022-12-18 19:54:51',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Weakness',
                'name_nepali' => 'कमजोरी',
                'image' => 'Weakness-01_1669962813.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Weakness-01_1669962813.png',
                'created_at' => '2022-12-02 17:03:33',
                'updated_at' => '2022-12-18 19:55:05',
            ),
        ));
        
        
    }
}
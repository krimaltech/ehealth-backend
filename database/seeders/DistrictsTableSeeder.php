<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('districts')->delete();
        
        \DB::table('districts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'province_id' => '1',
                'nepali_name' => 'भोजपुर',
                'english_name' => 'Bhojpur',
                'created_at' => '2022-03-27 08:29:53',
                'updated_at' => '2022-03-27 08:29:53',
            ),
            1 => 
            array (
                'id' => 2,
                'province_id' => '1',
                'nepali_name' => 'धनकुटा',
                'english_name' => 'Dhankuta',
                'created_at' => '2022-03-27 08:29:53',
                'updated_at' => '2022-03-27 08:29:53',
            ),
            2 => 
            array (
                'id' => 3,
                'province_id' => '1',
                'nepali_name' => 'इलाम',
                'english_name' => 'Illam',
                'created_at' => '2022-03-27 08:29:54',
                'updated_at' => '2022-03-27 08:29:54',
            ),
            3 => 
            array (
                'id' => 4,
                'province_id' => '1',
                'nepali_name' => 'झापा',
                'english_name' => 'Jhapa',
                'created_at' => '2022-03-27 08:29:54',
                'updated_at' => '2022-03-27 08:29:54',
            ),
            4 => 
            array (
                'id' => 5,
                'province_id' => '1',
                'nepali_name' => 'खोटाँग',
                'english_name' => 'Khotang',
                'created_at' => '2022-03-27 08:29:54',
                'updated_at' => '2022-03-27 08:29:54',
            ),
            5 => 
            array (
                'id' => 6,
                'province_id' => '1',
                'nepali_name' => 'मोरंग',
                'english_name' => 'Morang',
                'created_at' => '2022-03-27 08:29:54',
                'updated_at' => '2022-03-27 08:29:54',
            ),
            6 => 
            array (
                'id' => 7,
                'province_id' => '1',
                'nepali_name' => 'ओखलढुंगा',
                'english_name' => 'Okhaldhunga',
                'created_at' => '2022-03-27 08:29:55',
                'updated_at' => '2022-03-27 08:29:55',
            ),
            7 => 
            array (
                'id' => 8,
                'province_id' => '1',
                'nepali_name' => 'पांचथर',
                'english_name' => 'Panchthar',
                'created_at' => '2022-03-27 08:29:55',
                'updated_at' => '2022-03-27 08:29:55',
            ),
            8 => 
            array (
                'id' => 9,
                'province_id' => '1',
                'nepali_name' => 'संखुवासभा',
                'english_name' => 'Sankhuwasabha',
                'created_at' => '2022-03-27 08:29:55',
                'updated_at' => '2022-03-27 08:29:55',
            ),
            9 => 
            array (
                'id' => 10,
                'province_id' => '1',
                'nepali_name' => 'सोलुखुम्बू',
                'english_name' => 'Solukhumbu',
                'created_at' => '2022-03-27 08:29:55',
                'updated_at' => '2022-03-27 08:29:55',
            ),
            10 => 
            array (
                'id' => 11,
                'province_id' => '1',
                'nepali_name' => 'सुनसरी',
                'english_name' => 'Sunsari',
                'created_at' => '2022-03-27 08:29:55',
                'updated_at' => '2022-03-27 08:29:55',
            ),
            11 => 
            array (
                'id' => 12,
                'province_id' => '1',
                'nepali_name' => 'ताप्लेजुंग',
                'english_name' => 'Taplejung',
                'created_at' => '2022-03-27 08:29:56',
                'updated_at' => '2022-03-27 08:29:56',
            ),
            12 => 
            array (
                'id' => 13,
                'province_id' => '1',
                'nepali_name' => 'तेह्रथुम',
                'english_name' => 'Terhathum',
                'created_at' => '2022-03-27 08:29:56',
                'updated_at' => '2022-03-27 08:29:56',
            ),
            13 => 
            array (
                'id' => 14,
                'province_id' => '1',
                'nepali_name' => 'उदयपुर',
                'english_name' => 'Udayapur',
                'created_at' => '2022-03-27 08:29:56',
                'updated_at' => '2022-03-27 08:29:56',
            ),
            14 => 
            array (
                'id' => 15,
                'province_id' => '2',
                'nepali_name' => 'पर्सा',
                'english_name' => 'Parsa',
                'created_at' => '2022-03-27 08:29:57',
                'updated_at' => '2022-03-27 08:29:57',
            ),
            15 => 
            array (
                'id' => 16,
                'province_id' => '2',
                'nepali_name' => 'बारा',
                'english_name' => 'Bara',
                'created_at' => '2022-03-27 08:29:57',
                'updated_at' => '2022-03-27 08:29:57',
            ),
            16 => 
            array (
                'id' => 17,
                'province_id' => '2',
                'nepali_name' => 'रौतहट',
                'english_name' => 'Rautahat',
                'created_at' => '2022-03-27 08:29:57',
                'updated_at' => '2022-03-27 08:29:57',
            ),
            17 => 
            array (
                'id' => 18,
                'province_id' => '2',
                'nepali_name' => 'सर्लाही',
                'english_name' => 'Sarlahi',
                'created_at' => '2022-03-27 08:29:57',
                'updated_at' => '2022-03-27 08:29:57',
            ),
            18 => 
            array (
                'id' => 19,
                'province_id' => '2',
                'nepali_name' => 'सिराहा',
                'english_name' => 'Siraha',
                'created_at' => '2022-03-27 08:29:57',
                'updated_at' => '2022-03-27 08:29:57',
            ),
            19 => 
            array (
                'id' => 20,
                'province_id' => '2',
                'nepali_name' => 'धनुषा',
                'english_name' => 'Dhanusha',
                'created_at' => '2022-03-27 08:29:58',
                'updated_at' => '2022-03-27 08:29:58',
            ),
            20 => 
            array (
                'id' => 21,
                'province_id' => '2',
                'nepali_name' => 'सप्तरी',
                'english_name' => 'Saptari',
                'created_at' => '2022-03-27 08:29:58',
                'updated_at' => '2022-03-27 08:29:58',
            ),
            21 => 
            array (
                'id' => 22,
                'province_id' => '2',
                'nepali_name' => 'महोत्तरी',
                'english_name' => 'Mahottari',
                'created_at' => '2022-03-27 08:29:58',
                'updated_at' => '2022-03-27 08:29:58',
            ),
            22 => 
            array (
                'id' => 23,
                'province_id' => '3',
                'nepali_name' => 'भक्तपुर',
                'english_name' => 'Bhaktapur',
                'created_at' => '2022-03-27 08:29:58',
                'updated_at' => '2022-03-27 08:29:58',
            ),
            23 => 
            array (
                'id' => 24,
                'province_id' => '3',
                'nepali_name' => 'चितवन',
                'english_name' => 'Chitwan',
                'created_at' => '2022-03-27 08:29:58',
                'updated_at' => '2022-03-27 08:29:58',
            ),
            24 => 
            array (
                'id' => 25,
                'province_id' => '3',
                'nepali_name' => 'धादिंङ्ग',
                'english_name' => 'Dhading',
                'created_at' => '2022-03-27 08:29:58',
                'updated_at' => '2022-03-27 08:29:58',
            ),
            25 => 
            array (
                'id' => 26,
                'province_id' => '3',
                'nepali_name' => 'दोलखा',
                'english_name' => 'Dolakha',
                'created_at' => '2022-03-27 08:29:59',
                'updated_at' => '2022-03-27 08:29:59',
            ),
            26 => 
            array (
                'id' => 27,
                'province_id' => '3',
                'nepali_name' => 'काठमाडौँ',
                'english_name' => 'Kathmandu',
                'created_at' => '2022-03-27 08:29:59',
                'updated_at' => '2022-03-27 08:29:59',
            ),
            27 => 
            array (
                'id' => 28,
                'province_id' => '3',
                'nepali_name' => 'काभ्रेपलान्चोक',
                'english_name' => 'Kavrepalanchok',
                'created_at' => '2022-03-27 08:29:59',
                'updated_at' => '2022-03-27 08:29:59',
            ),
            28 => 
            array (
                'id' => 29,
                'province_id' => '3',
                'nepali_name' => 'ललितपुर',
                'english_name' => 'Lalitpur',
                'created_at' => '2022-03-27 08:29:59',
                'updated_at' => '2022-03-27 08:29:59',
            ),
            29 => 
            array (
                'id' => 30,
                'province_id' => '3',
                'nepali_name' => 'मकवानपुर',
                'english_name' => 'Makwanpur',
                'created_at' => '2022-03-27 08:29:59',
                'updated_at' => '2022-03-27 08:29:59',
            ),
            30 => 
            array (
                'id' => 31,
                'province_id' => '3',
                'nepali_name' => 'नुवाकोट',
                'english_name' => 'Nuwakot',
                'created_at' => '2022-03-27 08:29:59',
                'updated_at' => '2022-03-27 08:29:59',
            ),
            31 => 
            array (
                'id' => 32,
                'province_id' => '3',
                'nepali_name' => 'रामेछाप',
                'english_name' => 'Ramechhap',
                'created_at' => '2022-03-27 08:29:59',
                'updated_at' => '2022-03-27 08:29:59',
            ),
            32 => 
            array (
                'id' => 33,
                'province_id' => '3',
                'nepali_name' => 'रसुवा',
                'english_name' => 'Rasuwa',
                'created_at' => '2022-03-27 08:30:00',
                'updated_at' => '2022-03-27 08:30:00',
            ),
            33 => 
            array (
                'id' => 34,
                'province_id' => '3',
                'nepali_name' => 'सिन्धुली',
                'english_name' => 'Sindhuli',
                'created_at' => '2022-03-27 08:30:00',
                'updated_at' => '2022-03-27 08:30:00',
            ),
            34 => 
            array (
                'id' => 35,
                'province_id' => '3',
                'nepali_name' => 'सिन्धुपाल्चोक',
                'english_name' => 'Sindhupalchok',
                'created_at' => '2022-03-27 08:30:00',
                'updated_at' => '2022-03-27 08:30:00',
            ),
            35 => 
            array (
                'id' => 36,
                'province_id' => '4',
                'nepali_name' => 'बागलुङ',
                'english_name' => 'Baglung',
                'created_at' => '2022-03-27 08:30:00',
                'updated_at' => '2022-03-27 08:30:00',
            ),
            36 => 
            array (
                'id' => 37,
                'province_id' => '4',
                'nepali_name' => 'गोरखा',
                'english_name' => 'Gorkha',
                'created_at' => '2022-03-27 08:30:00',
                'updated_at' => '2022-03-27 08:30:00',
            ),
            37 => 
            array (
                'id' => 38,
                'province_id' => '4',
                'nepali_name' => 'कास्की',
                'english_name' => 'Kaski',
                'created_at' => '2022-03-27 08:30:00',
                'updated_at' => '2022-03-27 08:30:00',
            ),
            38 => 
            array (
                'id' => 39,
                'province_id' => '4',
                'nepali_name' => 'लमजुङ',
                'english_name' => 'Lamjung',
                'created_at' => '2022-03-27 08:30:00',
                'updated_at' => '2022-03-27 08:30:00',
            ),
            39 => 
            array (
                'id' => 40,
                'province_id' => '4',
                'nepali_name' => 'मनाङ',
                'english_name' => 'Manang',
                'created_at' => '2022-03-27 08:30:01',
                'updated_at' => '2022-03-27 08:30:01',
            ),
            40 => 
            array (
                'id' => 41,
                'province_id' => '4',
                'nepali_name' => 'मुस्ताङ',
                'english_name' => 'Mustang',
                'created_at' => '2022-03-27 08:30:01',
                'updated_at' => '2022-03-27 08:30:01',
            ),
            41 => 
            array (
                'id' => 42,
                'province_id' => '4',
                'nepali_name' => 'म्याग्दी',
                'english_name' => 'Myagdi',
                'created_at' => '2022-03-27 08:30:01',
                'updated_at' => '2022-03-27 08:30:01',
            ),
            42 => 
            array (
                'id' => 43,
                'province_id' => '4',
                'nepali_name' => 'नवलपुर',
                'english_name' => 'Nawalpur',
                'created_at' => '2022-03-27 08:30:01',
                'updated_at' => '2022-03-27 08:30:01',
            ),
            43 => 
            array (
                'id' => 44,
                'province_id' => '4',
                'nepali_name' => 'पर्वत',
                'english_name' => 'Parbat',
                'created_at' => '2022-03-27 08:30:01',
                'updated_at' => '2022-03-27 08:30:01',
            ),
            44 => 
            array (
                'id' => 45,
                'province_id' => '4',
                'nepali_name' => 'स्याङग्जा',
                'english_name' => 'Syangja',
                'created_at' => '2022-03-27 08:30:02',
                'updated_at' => '2022-03-27 08:30:02',
            ),
            45 => 
            array (
                'id' => 46,
                'province_id' => '4',
                'nepali_name' => 'तनहुँ',
                'english_name' => 'Tanahu',
                'created_at' => '2022-03-27 08:30:02',
                'updated_at' => '2022-03-27 08:30:02',
            ),
            46 => 
            array (
                'id' => 47,
                'province_id' => '5',
                'nepali_name' => 'कपिलवस्तु',
                'english_name' => 'Kapilvastu',
                'created_at' => '2022-03-27 08:30:02',
                'updated_at' => '2022-03-27 08:30:02',
            ),
            47 => 
            array (
                'id' => 48,
                'province_id' => '5',
                'nepali_name' => 'परासी',
                'english_name' => 'Parasi',
                'created_at' => '2022-03-27 08:30:02',
                'updated_at' => '2022-03-27 08:30:02',
            ),
            48 => 
            array (
                'id' => 49,
                'province_id' => '5',
                'nepali_name' => 'रुपन्देही',
                'english_name' => 'Rupandehi',
                'created_at' => '2022-03-27 08:30:02',
                'updated_at' => '2022-03-27 08:30:02',
            ),
            49 => 
            array (
                'id' => 50,
                'province_id' => '5',
                'nepali_name' => 'अर्घाखाँची',
                'english_name' => 'Arghakhanchi',
                'created_at' => '2022-03-27 08:30:02',
                'updated_at' => '2022-03-27 08:30:02',
            ),
            50 => 
            array (
                'id' => 51,
                'province_id' => '5',
                'nepali_name' => 'गुल्मी',
                'english_name' => 'Gulmi',
                'created_at' => '2022-03-27 08:30:02',
                'updated_at' => '2022-03-27 08:30:02',
            ),
            51 => 
            array (
                'id' => 52,
                'province_id' => '5',
                'nepali_name' => 'पाल्पा',
                'english_name' => 'Palpa',
                'created_at' => '2022-03-27 08:30:03',
                'updated_at' => '2022-03-27 08:30:03',
            ),
            52 => 
            array (
                'id' => 53,
                'province_id' => '5',
                'nepali_name' => 'दाङ',
                'english_name' => 'Dang',
                'created_at' => '2022-03-27 08:30:03',
                'updated_at' => '2022-03-27 08:30:03',
            ),
            53 => 
            array (
                'id' => 54,
                'province_id' => '5',
                'nepali_name' => 'प्युठान',
                'english_name' => 'Pyuthan',
                'created_at' => '2022-03-27 08:30:03',
                'updated_at' => '2022-03-27 08:30:03',
            ),
            54 => 
            array (
                'id' => 55,
                'province_id' => '5',
                'nepali_name' => 'रोल्पा',
                'english_name' => 'Rolpa',
                'created_at' => '2022-03-27 08:30:03',
                'updated_at' => '2022-03-27 08:30:03',
            ),
            55 => 
            array (
                'id' => 56,
                'province_id' => '5',
                'nepali_name' => 'पूर्वी रूकुम',
                'english_name' => 'Purbi Rukum',
                'created_at' => '2022-03-27 08:30:03',
                'updated_at' => '2022-03-27 08:30:03',
            ),
            56 => 
            array (
                'id' => 57,
                'province_id' => '5',
                'nepali_name' => 'बाँके',
                'english_name' => 'Banke',
                'created_at' => '2022-03-27 08:30:04',
                'updated_at' => '2022-03-27 08:30:04',
            ),
            57 => 
            array (
                'id' => 58,
                'province_id' => '5',
                'nepali_name' => 'बर्दिया',
                'english_name' => 'Bardiya',
                'created_at' => '2022-03-27 08:30:04',
                'updated_at' => '2022-03-27 08:30:04',
            ),
            58 => 
            array (
                'id' => 59,
                'province_id' => '6',
                'nepali_name' => 'रुकुम पश्चिम',
                'english_name' => 'Rukum Paschim',
                'created_at' => '2022-03-27 08:30:04',
                'updated_at' => '2022-03-27 08:30:04',
            ),
            59 => 
            array (
                'id' => 60,
                'province_id' => '6',
                'nepali_name' => 'सल्यान',
                'english_name' => 'Salyan',
                'created_at' => '2022-03-27 08:30:04',
                'updated_at' => '2022-03-27 08:30:04',
            ),
            60 => 
            array (
                'id' => 61,
                'province_id' => '6',
                'nepali_name' => 'डोल्पा',
                'english_name' => 'Dolpa',
                'created_at' => '2022-03-27 08:30:04',
                'updated_at' => '2022-03-27 08:30:04',
            ),
            61 => 
            array (
                'id' => 62,
                'province_id' => '6',
                'nepali_name' => 'हुम्ला',
                'english_name' => 'Humla',
                'created_at' => '2022-03-27 08:30:05',
                'updated_at' => '2022-03-27 08:30:05',
            ),
            62 => 
            array (
                'id' => 63,
                'province_id' => '6',
                'nepali_name' => 'जुम्ला',
                'english_name' => 'Jumla',
                'created_at' => '2022-03-27 08:30:05',
                'updated_at' => '2022-03-27 08:30:05',
            ),
            63 => 
            array (
                'id' => 64,
                'province_id' => '6',
                'nepali_name' => 'कालिकोट',
                'english_name' => 'Kalikot',
                'created_at' => '2022-03-27 08:30:05',
                'updated_at' => '2022-03-27 08:30:05',
            ),
            64 => 
            array (
                'id' => 65,
                'province_id' => '6',
                'nepali_name' => 'मुगु',
                'english_name' => 'Mugu',
                'created_at' => '2022-03-27 08:30:05',
                'updated_at' => '2022-03-27 08:30:05',
            ),
            65 => 
            array (
                'id' => 66,
                'province_id' => '6',
                'nepali_name' => 'सुर्खेत',
                'english_name' => 'Surkhet',
                'created_at' => '2022-03-27 08:30:05',
                'updated_at' => '2022-03-27 08:30:05',
            ),
            66 => 
            array (
                'id' => 67,
                'province_id' => '6',
                'nepali_name' => 'दैलेख',
                'english_name' => 'Dailekh',
                'created_at' => '2022-03-27 08:30:05',
                'updated_at' => '2022-03-27 08:30:05',
            ),
            67 => 
            array (
                'id' => 68,
                'province_id' => '6',
                'nepali_name' => 'जाजरकोट',
                'english_name' => 'Jajarkot',
                'created_at' => '2022-03-27 08:30:05',
                'updated_at' => '2022-03-27 08:30:05',
            ),
            68 => 
            array (
                'id' => 69,
                'province_id' => '7',
                'nepali_name' => 'दार्चुला',
                'english_name' => 'Darchula',
                'created_at' => '2022-03-27 08:30:06',
                'updated_at' => '2022-03-27 08:30:06',
            ),
            69 => 
            array (
                'id' => 70,
                'province_id' => '7',
                'nepali_name' => 'बझाङ',
                'english_name' => 'Bajhang',
                'created_at' => '2022-03-27 08:30:06',
                'updated_at' => '2022-03-27 08:30:06',
            ),
            70 => 
            array (
                'id' => 71,
                'province_id' => '7',
                'nepali_name' => 'बाजुरा',
                'english_name' => 'Bajura',
                'created_at' => '2022-03-27 08:30:06',
                'updated_at' => '2022-03-27 08:30:06',
            ),
            71 => 
            array (
                'id' => 72,
                'province_id' => '7',
                'nepali_name' => 'बैतडी',
                'english_name' => 'Baitadi',
                'created_at' => '2022-03-27 08:30:06',
                'updated_at' => '2022-03-27 08:30:06',
            ),
            72 => 
            array (
                'id' => 73,
                'province_id' => '7',
                'nepali_name' => 'डोटी',
                'english_name' => 'Doti',
                'created_at' => '2022-03-27 08:30:06',
                'updated_at' => '2022-03-27 08:30:06',
            ),
            73 => 
            array (
                'id' => 74,
                'province_id' => '7',
                'nepali_name' => 'अछाम',
                'english_name' => 'Achham',
                'created_at' => '2022-03-27 08:30:07',
                'updated_at' => '2022-03-27 08:30:07',
            ),
            74 => 
            array (
                'id' => 75,
                'province_id' => '7',
                'nepali_name' => 'डडेलधुरा',
                'english_name' => 'Dadeldhura',
                'created_at' => '2022-03-27 08:30:07',
                'updated_at' => '2022-03-27 08:30:07',
            ),
            75 => 
            array (
                'id' => 76,
                'province_id' => '7',
                'nepali_name' => 'कञ्चनपुर',
                'english_name' => 'Kanchanpur',
                'created_at' => '2022-03-27 08:30:07',
                'updated_at' => '2022-03-27 08:30:07',
            ),
            76 => 
            array (
                'id' => 77,
                'province_id' => '7',
                'nepali_name' => 'कैलाली',
                'english_name' => 'Kailali',
                'created_at' => '2022-03-27 08:30:07',
                'updated_at' => '2022-03-27 08:30:07',
            ),
        ));
        
        
    }
}
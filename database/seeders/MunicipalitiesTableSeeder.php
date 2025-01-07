<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MunicipalitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('municipalities')->delete();
        
        \DB::table('municipalities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'district_id' => 1,
                'nepali_name' => 'षडानन्द नगरपालिका',
                'english_name' => 'Shadanand Municipality',
                'created_at' => '2022-03-27 08:32:52',
                'updated_at' => '2022-03-27 08:32:52',
            ),
            1 => 
            array (
                'id' => 2,
                'district_id' => 1,
                'nepali_name' => 'भोजपुर नगरपालिका',
                'english_name' => 'Bhojpur Municipality',
                'created_at' => '2022-03-27 08:32:53',
                'updated_at' => '2022-03-27 08:32:53',
            ),
            2 => 
            array (
                'id' => 3,
                'district_id' => 1,
                'nepali_name' => 'हतुवागढी गाउँपालिका',
                'english_name' => 'Hatuwagadhi Rural Municipality',
                'created_at' => '2022-03-27 08:32:53',
                'updated_at' => '2022-03-27 08:32:53',
            ),
            3 => 
            array (
                'id' => 4,
                'district_id' => 1,
                'nepali_name' => 'रामप्रसाद राई गाउँपालिका',
                'english_name' => 'Ramprasad Rai Rural Municipality',
                'created_at' => '2022-03-27 08:32:53',
                'updated_at' => '2022-03-27 08:32:53',
            ),
            4 => 
            array (
                'id' => 5,
                'district_id' => 1,
                'nepali_name' => 'आमचोक गाउँपालिका',
                'english_name' => 'Aamchok Rural Municipality',
                'created_at' => '2022-03-27 08:32:54',
                'updated_at' => '2022-03-27 08:32:54',
            ),
            5 => 
            array (
                'id' => 6,
                'district_id' => 1,
                'nepali_name' => 'टेम्केमैयुङ गाउँपालिका',
                'english_name' => 'Temkemayung village municipality',
                'created_at' => '2022-03-27 08:32:54',
                'updated_at' => '2022-03-27 08:32:54',
            ),
            6 => 
            array (
                'id' => 7,
                'district_id' => 1,
                'nepali_name' => 'अरुण गाउँपालिका',
                'english_name' => 'Arun Rural Municipality',
                'created_at' => '2022-03-27 08:32:54',
                'updated_at' => '2022-03-27 08:32:54',
            ),
            7 => 
            array (
                'id' => 8,
                'district_id' => 1,
                'nepali_name' => 'पौवादुङमा गाउँपालिका',
                'english_name' => 'Pauwadungma Rural Municipality',
                'created_at' => '2022-03-27 08:32:55',
                'updated_at' => '2022-03-27 08:32:55',
            ),
            8 => 
            array (
                'id' => 9,
                'district_id' => 1,
                'nepali_name' => 'साल्पासिलिछो गाउँपालिका',
                'english_name' => 'Salpasilichho Rural Municipality',
                'created_at' => '2022-03-27 08:32:55',
                'updated_at' => '2022-03-27 08:32:55',
            ),
            9 => 
            array (
                'id' => 10,
                'district_id' => 2,
                'nepali_name' => 'धनकुटा नगरपालिका',
                'english_name' => 'Dhankuta Municipality',
                'created_at' => '2022-03-27 08:32:56',
                'updated_at' => '2022-03-27 08:32:56',
            ),
            10 => 
            array (
                'id' => 11,
                'district_id' => 2,
                'nepali_name' => 'पाख्रिबास नगरपालिका',
                'english_name' => 'Pakhribas Municipality',
                'created_at' => '2022-03-27 08:32:56',
                'updated_at' => '2022-03-27 08:32:56',
            ),
            11 => 
            array (
                'id' => 12,
                'district_id' => 2,
                'nepali_name' => 'महालक्ष्मी नगरपालिका',
                'english_name' => 'Mahalaxmi Municipality',
                'created_at' => '2022-03-27 08:32:56',
                'updated_at' => '2022-03-27 08:32:56',
            ),
            12 => 
            array (
                'id' => 13,
                'district_id' => 2,
                'nepali_name' => 'साँगुरीगढी गाउँपालिका',
                'english_name' => 'Sangurigadhi Rural Municipality',
                'created_at' => '2022-03-27 08:32:57',
                'updated_at' => '2022-03-27 08:32:57',
            ),
            13 => 
            array (
                'id' => 14,
                'district_id' => 2,
                'nepali_name' => 'चौविसे गाउँपालिका',
                'english_name' => 'Chaubise Rural Municipality',
                'created_at' => '2022-03-27 08:32:57',
                'updated_at' => '2022-03-27 08:32:57',
            ),
            14 => 
            array (
                'id' => 15,
                'district_id' => 2,
                'nepali_name' => 'सहिदभूमि गाउँपालिका',
                'english_name' => 'Sahidbhumi Rural Municipality',
                'created_at' => '2022-03-27 08:32:58',
                'updated_at' => '2022-03-27 08:32:58',
            ),
            15 => 
            array (
                'id' => 16,
                'district_id' => 2,
                'nepali_name' => 'छथर जोरपाटी गाउँपालिका',
                'english_name' => 'Chhathar Jorpati Rural Municipality',
                'created_at' => '2022-03-27 08:32:58',
                'updated_at' => '2022-03-27 08:32:58',
            ),
            16 => 
            array (
                'id' => 17,
                'district_id' => 3,
                'nepali_name' => 'सूर्योदय नगरपालिका',
                'english_name' => 'Suryodaya Municipality',
                'created_at' => '2022-03-27 08:32:58',
                'updated_at' => '2022-03-27 08:32:58',
            ),
            17 => 
            array (
                'id' => 18,
                'district_id' => 3,
                'nepali_name' => 'ईलाम नगरपालिका',
                'english_name' => 'Ilam Municipality',
                'created_at' => '2022-03-27 08:32:59',
                'updated_at' => '2022-03-27 08:32:59',
            ),
            18 => 
            array (
                'id' => 19,
                'district_id' => 3,
                'nepali_name' => 'देउमाई नगरपालिका',
                'english_name' => 'Deumai Municipality',
                'created_at' => '2022-03-27 08:32:59',
                'updated_at' => '2022-03-27 08:32:59',
            ),
            19 => 
            array (
                'id' => 20,
                'district_id' => 3,
                'nepali_name' => 'माईजोगमाई गाउँपालिका',
                'english_name' => 'Maijogmai Rural Municipality',
                'created_at' => '2022-03-27 08:33:00',
                'updated_at' => '2022-03-27 08:33:00',
            ),
            20 => 
            array (
                'id' => 21,
                'district_id' => 3,
                'nepali_name' => 'फाकफोकथुम गाउँपालिका',
                'english_name' => 'Phakphokthum Rural Municipality',
                'created_at' => '2022-03-27 08:33:00',
                'updated_at' => '2022-03-27 08:33:00',
            ),
            21 => 
            array (
                'id' => 22,
                'district_id' => 3,
                'nepali_name' => 'माई नगरपालिका',
                'english_name' => 'Mai Municipality',
                'created_at' => '2022-03-27 08:33:01',
                'updated_at' => '2022-03-27 08:33:01',
            ),
            22 => 
            array (
                'id' => 23,
                'district_id' => 3,
                'nepali_name' => 'चुलाचुली गाउँपालिका',
                'english_name' => 'Chulachuli Rural Municipality',
                'created_at' => '2022-03-27 08:33:01',
                'updated_at' => '2022-03-27 08:33:01',
            ),
            23 => 
            array (
                'id' => 24,
                'district_id' => 3,
                'nepali_name' => 'रोङ गाउँपालिका',
                'english_name' => 'Rong Rural Municipality',
                'created_at' => '2022-03-27 08:33:01',
                'updated_at' => '2022-03-27 08:33:01',
            ),
            24 => 
            array (
                'id' => 25,
                'district_id' => 3,
                'nepali_name' => 'मङ्सेबुङ गाउँपालिका',
                'english_name' => 'Mangsebung Rural Municipalit',
                'created_at' => '2022-03-27 08:33:02',
                'updated_at' => '2022-03-27 08:33:02',
            ),
            25 => 
            array (
                'id' => 26,
                'district_id' => 3,
                'nepali_name' => 'सन्दकपुर गाउँपालिका',
                'english_name' => 'Sandakpur Rural Municipality',
                'created_at' => '2022-03-27 08:33:02',
                'updated_at' => '2022-03-27 08:33:02',
            ),
            26 => 
            array (
                'id' => 27,
                'district_id' => 4,
                'nepali_name' => 'मेचीनगर नगरपालिका',
                'english_name' => 'Mechinagar Municipality',
                'created_at' => '2022-03-27 08:33:02',
                'updated_at' => '2022-03-27 08:33:02',
            ),
            27 => 
            array (
                'id' => 28,
                'district_id' => 4,
                'nepali_name' => 'विर्तामोड नगरपालिका',
                'english_name' => 'Birtamod Municipality',
                'created_at' => '2022-03-27 08:33:03',
                'updated_at' => '2022-03-27 08:33:03',
            ),
            28 => 
            array (
                'id' => 29,
                'district_id' => 4,
                'nepali_name' => 'दमक नगरपालिका',
                'english_name' => 'Damak Municipality',
                'created_at' => '2022-03-27 08:33:03',
                'updated_at' => '2022-03-27 08:33:03',
            ),
            29 => 
            array (
                'id' => 30,
                'district_id' => 4,
                'nepali_name' => 'भद्रपुर नगरपालिका',
                'english_name' => 'Bhadrapur Municipality',
                'created_at' => '2022-03-27 08:33:04',
                'updated_at' => '2022-03-27 08:33:04',
            ),
            30 => 
            array (
                'id' => 31,
                'district_id' => 4,
                'nepali_name' => 'शिवशताक्षी नगरपालिका',
                'english_name' => 'Shivasatakshi Municipality',
                'created_at' => '2022-03-27 08:33:04',
                'updated_at' => '2022-03-27 08:33:04',
            ),
            31 => 
            array (
                'id' => 32,
                'district_id' => 4,
                'nepali_name' => 'अर्जुनधारा नगरपालिका',
                'english_name' => 'Arjundhara Municipality',
                'created_at' => '2022-03-27 08:33:04',
                'updated_at' => '2022-03-27 08:33:04',
            ),
            32 => 
            array (
                'id' => 33,
                'district_id' => 4,
                'nepali_name' => 'गौरादह नगरपालिका',
                'english_name' => 'Gauradaha Municipality',
                'created_at' => '2022-03-27 08:33:05',
                'updated_at' => '2022-03-27 08:33:05',
            ),
            33 => 
            array (
                'id' => 34,
                'district_id' => 4,
                'nepali_name' => 'कन्काई नगरपालिका',
                'english_name' => 'Kankai Municipality',
                'created_at' => '2022-03-27 08:33:05',
                'updated_at' => '2022-03-27 08:33:05',
            ),
            34 => 
            array (
                'id' => 35,
                'district_id' => 4,
                'nepali_name' => 'कमल गाउँपालिका',
                'english_name' => 'Kamal Rural Municipality',
                'created_at' => '2022-03-27 08:33:05',
                'updated_at' => '2022-03-27 08:33:05',
            ),
            35 => 
            array (
                'id' => 36,
                'district_id' => 4,
                'nepali_name' => 'बुद्धशान्ति गाउँपालिका',
                'english_name' => 'Buddha Shanti Rural Municipality',
                'created_at' => '2022-03-27 08:33:06',
                'updated_at' => '2022-03-27 08:33:06',
            ),
            36 => 
            array (
                'id' => 37,
                'district_id' => 4,
                'nepali_name' => 'कचनकवल गाउँपालिका',
                'english_name' => 'Kachankawal Rural Municipality',
                'created_at' => '2022-03-27 08:33:06',
                'updated_at' => '2022-03-27 08:33:06',
            ),
            37 => 
            array (
                'id' => 38,
                'district_id' => 4,
                'nepali_name' => 'झापा गाउँपालिका',
                'english_name' => 'Jhapa Rural Municipality',
                'created_at' => '2022-03-27 08:33:06',
                'updated_at' => '2022-03-27 08:33:06',
            ),
            38 => 
            array (
                'id' => 39,
                'district_id' => 4,
                'nepali_name' => 'बाह्रदशी गाउँपालिका',
                'english_name' => 'Barhadashi Rural Municipality',
                'created_at' => '2022-03-27 08:33:07',
                'updated_at' => '2022-03-27 08:33:07',
            ),
            39 => 
            array (
                'id' => 40,
                'district_id' => 4,
                'nepali_name' => 'गौरीगंज गाउँपालिका',
                'english_name' => 'Gaurigunj Rural Municipality',
                'created_at' => '2022-03-27 08:33:07',
                'updated_at' => '2022-03-27 08:33:07',
            ),
            40 => 
            array (
                'id' => 41,
                'district_id' => 4,
                'nepali_name' => 'हल्दिवारी गाउँपालिका',
                'english_name' => 'Haldibari Rural Municipality',
                'created_at' => '2022-03-27 08:33:07',
                'updated_at' => '2022-03-27 08:33:07',
            ),
            41 => 
            array (
                'id' => 42,
                'district_id' => 5,
                'nepali_name' => 'दिक्तेल रुपाकोट मझुवागढी नगरपालिका',
                'english_name' => 'Diktel Rupakot Majhuwagadhi Municipality',
                'created_at' => '2022-03-27 08:33:08',
                'updated_at' => '2022-03-27 08:33:08',
            ),
            42 => 
            array (
                'id' => 43,
                'district_id' => 5,
                'nepali_name' => 'हलेसी तुवाचुङ नगरपालिका',
                'english_name' => 'Halesi Tuwachung Municipality',
                'created_at' => '2022-03-27 08:33:08',
                'updated_at' => '2022-03-27 08:33:08',
            ),
            43 => 
            array (
                'id' => 44,
                'district_id' => 5,
                'nepali_name' => 'खोटेहाङ गाउँपालिका',
                'english_name' => 'Khotehang Rural Municipality',
                'created_at' => '2022-03-27 08:33:08',
                'updated_at' => '2022-03-27 08:33:08',
            ),
            44 => 
            array (
                'id' => 45,
                'district_id' => 5,
                'nepali_name' => 'दिप्रुङ चुइचुम्मा गाउँपालिका',
                'english_name' => 'Diprung Chuichumma Rural Municipality',
                'created_at' => '2022-03-27 08:33:09',
                'updated_at' => '2022-03-27 08:33:09',
            ),
            45 => 
            array (
                'id' => 46,
                'district_id' => 5,
                'nepali_name' => 'ऐसेलुखर्क गाउँपालिका',
                'english_name' => 'Aiselukharka Rural Municipality',
                'created_at' => '2022-03-27 08:33:09',
                'updated_at' => '2022-03-27 08:33:09',
            ),
            46 => 
            array (
                'id' => 47,
                'district_id' => 5,
                'nepali_name' => 'जन्तेढुंगा गाउँपालिका',
                'english_name' => 'Jantedhunga Rural Municipality',
                'created_at' => '2022-03-27 08:33:10',
                'updated_at' => '2022-03-27 08:33:10',
            ),
            47 => 
            array (
                'id' => 48,
                'district_id' => 5,
                'nepali_name' => 'केपिलासगढी गाउँपालिका',
                'english_name' => 'Kepilasgadhi Rural Municipality',
                'created_at' => '2022-03-27 08:33:10',
                'updated_at' => '2022-03-27 08:33:10',
            ),
            48 => 
            array (
                'id' => 49,
                'district_id' => 5,
                'nepali_name' => 'वराहपोखरी गाउँपालिका',
                'english_name' => 'Barahpokhari Rural Municipality',
                'created_at' => '2022-03-27 08:33:10',
                'updated_at' => '2022-03-27 08:33:10',
            ),
            49 => 
            array (
                'id' => 50,
                'district_id' => 5,
                'nepali_name' => 'रावा बेसी गाउँपालिका',
                'english_name' => 'Rawa Besi Rural Municipality',
                'created_at' => '2022-03-27 08:33:11',
                'updated_at' => '2022-03-27 08:33:11',
            ),
            50 => 
            array (
                'id' => 51,
                'district_id' => 5,
                'nepali_name' => 'साकेला गाउँपालिका',
                'english_name' => 'Sakela Rural Municipality',
                'created_at' => '2022-03-27 08:33:11',
                'updated_at' => '2022-03-27 08:33:11',
            ),
            51 => 
            array (
                'id' => 52,
                'district_id' => 6,
                'nepali_name' => 'सुन्दरहरैचा नगरपालिका',
                'english_name' => 'Sundar Haraicha Municipality',
                'created_at' => '2022-03-27 08:33:11',
                'updated_at' => '2022-03-27 08:33:11',
            ),
            52 => 
            array (
                'id' => 53,
                'district_id' => 6,
                'nepali_name' => 'बेलवारी नगरपालिका',
                'english_name' => 'Belbari Municipality',
                'created_at' => '2022-03-27 08:33:12',
                'updated_at' => '2022-03-27 08:33:12',
            ),
            53 => 
            array (
                'id' => 54,
                'district_id' => 6,
                'nepali_name' => 'पथरी शनिश्चरे नगरपालिका',
                'english_name' => 'Pathari Shanischare Municipality',
                'created_at' => '2022-03-27 08:33:12',
                'updated_at' => '2022-03-27 08:33:12',
            ),
            54 => 
            array (
                'id' => 55,
                'district_id' => 6,
                'nepali_name' => 'रतुवामाई नगरपालिका',
                'english_name' => 'Ratuwamai Municipality',
                'created_at' => '2022-03-27 08:33:13',
                'updated_at' => '2022-03-27 08:33:13',
            ),
            55 => 
            array (
                'id' => 56,
                'district_id' => 6,
                'nepali_name' => 'उर्लावारी नगरपालिका',
                'english_name' => 'Urlabari Municipality',
                'created_at' => '2022-03-27 08:33:13',
                'updated_at' => '2022-03-27 08:33:13',
            ),
            56 => 
            array (
                'id' => 57,
                'district_id' => 6,
                'nepali_name' => 'रंगेली नगरपालिका',
                'english_name' => 'Rangeli Municipality',
                'created_at' => '2022-03-27 08:33:13',
                'updated_at' => '2022-03-27 08:33:13',
            ),
            57 => 
            array (
                'id' => 58,
                'district_id' => 6,
                'nepali_name' => 'सुनवर्षि नगरपालिका',
                'english_name' => 'Sunawarshi Municipality',
                'created_at' => '2022-03-27 08:33:14',
                'updated_at' => '2022-03-27 08:33:14',
            ),
            58 => 
            array (
                'id' => 59,
                'district_id' => 6,
                'nepali_name' => 'लेटाङ नगरपालिका',
                'english_name' => 'Letang Municipality',
                'created_at' => '2022-03-27 08:33:14',
                'updated_at' => '2022-03-27 08:33:14',
            ),
            59 => 
            array (
                'id' => 60,
                'district_id' => 6,
                'nepali_name' => 'विराटनगर महानगरपालिका',
                'english_name' => 'Biratnagar Metropolitan City',
                'created_at' => '2022-03-27 08:33:14',
                'updated_at' => '2022-03-27 08:33:14',
            ),
            60 => 
            array (
                'id' => 61,
                'district_id' => 6,
                'nepali_name' => 'जहदा गाउँपालिका',
                'english_name' => 'Jahada Rural Municipality',
                'created_at' => '2022-03-27 08:33:14',
                'updated_at' => '2022-03-27 08:33:14',
            ),
            61 => 
            array (
                'id' => 62,
                'district_id' => 6,
                'nepali_name' => 'बुढीगंगा गाउँपालिका',
                'english_name' => 'Budi Ganga Rural Municipality',
                'created_at' => '2022-03-27 08:33:15',
                'updated_at' => '2022-03-27 08:33:15',
            ),
            62 => 
            array (
                'id' => 63,
                'district_id' => 6,
                'nepali_name' => 'कटहरी गाउँपालिका',
                'english_name' => 'Katahari Rural Municipality',
                'created_at' => '2022-03-27 08:33:15',
                'updated_at' => '2022-03-27 08:33:15',
            ),
            63 => 
            array (
                'id' => 64,
                'district_id' => 6,
                'nepali_name' => 'धनपालथान गाउँपालिका',
                'english_name' => 'Dhanpalthan Rural Municipality',
                'created_at' => '2022-03-27 08:33:16',
                'updated_at' => '2022-03-27 08:33:16',
            ),
            64 => 
            array (
                'id' => 65,
                'district_id' => 6,
                'nepali_name' => 'कानेपोखरी गाउँपालिका',
                'english_name' => 'Kanepokhari Rural Municipality',
                'created_at' => '2022-03-27 08:33:16',
                'updated_at' => '2022-03-27 08:33:16',
            ),
            65 => 
            array (
                'id' => 66,
                'district_id' => 6,
                'nepali_name' => 'ग्रामथान गाउँपालिका',
                'english_name' => 'Gramthan Rural Municipality',
                'created_at' => '2022-03-27 08:33:17',
                'updated_at' => '2022-03-27 08:33:17',
            ),
            66 => 
            array (
                'id' => 67,
                'district_id' => 6,
                'nepali_name' => 'केरावारी गाउँपालिका',
                'english_name' => 'Kerabari Rural Municipality',
                'created_at' => '2022-03-27 08:33:17',
                'updated_at' => '2022-03-27 08:33:17',
            ),
            67 => 
            array (
                'id' => 68,
                'district_id' => 6,
                'nepali_name' => 'मिक्लाजुङ गाउँपालिका',
                'english_name' => 'Miklajung Rural Municipality',
                'created_at' => '2022-03-27 08:33:18',
                'updated_at' => '2022-03-27 08:33:18',
            ),
            68 => 
            array (
                'id' => 69,
                'district_id' => 7,
                'nepali_name' => 'सिद्दिचरण नगरपालिका',
                'english_name' => 'Siddhicharan Municipality',
                'created_at' => '2022-03-27 08:33:18',
                'updated_at' => '2022-03-27 08:33:18',
            ),
            69 => 
            array (
                'id' => 70,
                'district_id' => 7,
                'nepali_name' => 'खिजिदेम्बा गाउँपालिका',
                'english_name' => 'Khiji Demba Rural Municipality',
                'created_at' => '2022-03-27 08:33:18',
                'updated_at' => '2022-03-27 08:33:18',
            ),
            70 => 
            array (
                'id' => 71,
                'district_id' => 7,
                'nepali_name' => 'चिशंखुगढी गाउँपालिका',
                'english_name' => 'Chisankhugadhi Rural Municipality',
                'created_at' => '2022-03-27 08:33:19',
                'updated_at' => '2022-03-27 08:33:19',
            ),
            71 => 
            array (
                'id' => 72,
                'district_id' => 7,
                'nepali_name' => 'मोलुङ गाउँपालिका',
                'english_name' => 'Molung Rural Municipality',
                'created_at' => '2022-03-27 08:33:19',
                'updated_at' => '2022-03-27 08:33:19',
            ),
            72 => 
            array (
                'id' => 73,
                'district_id' => 7,
                'nepali_name' => 'सुनकोशी गाउँपालिका',
                'english_name' => 'Sunkoshi Rural Municipality',
                'created_at' => '2022-03-27 08:33:19',
                'updated_at' => '2022-03-27 08:33:19',
            ),
            73 => 
            array (
                'id' => 74,
                'district_id' => 7,
                'nepali_name' => 'चम्पादेवी गाउँपालिका',
                'english_name' => 'Champadevi Rural Municipality',
                'created_at' => '2022-03-27 08:33:20',
                'updated_at' => '2022-03-27 08:33:20',
            ),
            74 => 
            array (
                'id' => 75,
                'district_id' => 7,
                'nepali_name' => 'मानेभञ्याङ गाउँपालिका',
                'english_name' => 'Manebhanjyang Rural Municipality',
                'created_at' => '2022-03-27 08:33:20',
                'updated_at' => '2022-03-27 08:33:20',
            ),
            75 => 
            array (
                'id' => 76,
                'district_id' => 7,
                'nepali_name' => 'लिखु गाउँपालिका',
                'english_name' => 'Likhu Rural Municipality',
                'created_at' => '2022-03-27 08:33:20',
                'updated_at' => '2022-03-27 08:33:20',
            ),
            76 => 
            array (
                'id' => 77,
                'district_id' => 8,
                'nepali_name' => 'फिदिम नगरपालिका',
                'english_name' => 'Phidim Municipality',
                'created_at' => '2022-03-27 08:33:21',
                'updated_at' => '2022-03-27 08:33:21',
            ),
            77 => 
            array (
                'id' => 78,
                'district_id' => 8,
                'nepali_name' => 'मिक्लाजुङ गाउँपालिका',
                'english_name' => 'Miklajung Rural Municipality',
                'created_at' => '2022-03-27 08:33:21',
                'updated_at' => '2022-03-27 08:33:21',
            ),
            78 => 
            array (
                'id' => 79,
                'district_id' => 8,
                'nepali_name' => 'फाल्गुनन्द गाउँपालिका',
                'english_name' => 'Phalgunanda Rural Municipality',
                'created_at' => '2022-03-27 08:33:21',
                'updated_at' => '2022-03-27 08:33:21',
            ),
            79 => 
            array (
                'id' => 80,
                'district_id' => 8,
                'nepali_name' => 'हिलिहाङ गाउँपालिका',
                'english_name' => 'Hilihang Rural Municipality',
                'created_at' => '2022-03-27 08:33:22',
                'updated_at' => '2022-03-27 08:33:22',
            ),
            80 => 
            array (
                'id' => 81,
                'district_id' => 8,
                'nepali_name' => 'फालेलुङ गाउँपालिका',
                'english_name' => 'Phalelung Rural Municipality',
                'created_at' => '2022-03-27 08:33:22',
                'updated_at' => '2022-03-27 08:33:22',
            ),
            81 => 
            array (
                'id' => 82,
                'district_id' => 8,
                'nepali_name' => 'याङवरक गाउँपालिका',
                'english_name' => 'Yangwarak Rural Municipality',
                'created_at' => '2022-03-27 08:33:23',
                'updated_at' => '2022-03-27 08:33:23',
            ),
            82 => 
            array (
                'id' => 83,
                'district_id' => 8,
                'nepali_name' => 'कुम्मायक गाउँपालिका',
                'english_name' => 'Kummayak Rural Municipality',
                'created_at' => '2022-03-27 08:33:23',
                'updated_at' => '2022-03-27 08:33:23',
            ),
            83 => 
            array (
                'id' => 84,
                'district_id' => 8,
                'nepali_name' => 'तुम्बेवा गाउँपालिका',
                'english_name' => 'Tumbewa Rural Municipality',
                'created_at' => '2022-03-27 08:33:23',
                'updated_at' => '2022-03-27 08:33:23',
            ),
            84 => 
            array (
                'id' => 85,
                'district_id' => 9,
                'nepali_name' => 'खाँदवारी नगरपालिका',
                'english_name' => 'Khandbari Municipality',
                'created_at' => '2022-03-27 08:33:24',
                'updated_at' => '2022-03-27 08:33:24',
            ),
            85 => 
            array (
                'id' => 86,
                'district_id' => 9,
                'nepali_name' => 'चैनपुर नगरपालिका',
                'english_name' => 'Chainpur Municipality',
                'created_at' => '2022-03-27 08:33:24',
                'updated_at' => '2022-03-27 08:33:24',
            ),
            86 => 
            array (
                'id' => 87,
                'district_id' => 9,
                'nepali_name' => 'धर्मदेवी नगरपालिका',
                'english_name' => 'Dharmadevi Municipality',
                'created_at' => '2022-03-27 08:33:24',
                'updated_at' => '2022-03-27 08:33:24',
            ),
            87 => 
            array (
                'id' => 88,
                'district_id' => 9,
                'nepali_name' => 'पाँचखपन नगरपालिका',
                'english_name' => 'Panchkhapan Municipality',
                'created_at' => '2022-03-27 08:33:25',
                'updated_at' => '2022-03-27 08:33:25',
            ),
            88 => 
            array (
                'id' => 89,
                'district_id' => 9,
                'nepali_name' => 'मादी नगरपालिका',
                'english_name' => 'Madi Municipality',
                'created_at' => '2022-03-27 08:33:25',
                'updated_at' => '2022-03-27 08:33:25',
            ),
            89 => 
            array (
                'id' => 90,
                'district_id' => 9,
                'nepali_name' => 'मकालु गाउँपालिका',
                'english_name' => 'Makalu Rural Municipality',
                'created_at' => '2022-03-27 08:33:26',
                'updated_at' => '2022-03-27 08:33:26',
            ),
            90 => 
            array (
                'id' => 91,
                'district_id' => 9,
                'nepali_name' => 'सिलीचोङ गाउँपालिका',
                'english_name' => 'Silichong Rural Municipality',
                'created_at' => '2022-03-27 08:33:26',
                'updated_at' => '2022-03-27 08:33:26',
            ),
            91 => 
            array (
                'id' => 92,
                'district_id' => 9,
                'nepali_name' => 'सभापोखरी गाउँपालिका',
                'english_name' => 'Sabhapokhari Rural Municipality',
                'created_at' => '2022-03-27 08:33:26',
                'updated_at' => '2022-03-27 08:33:26',
            ),
            92 => 
            array (
                'id' => 93,
                'district_id' => 9,
                'nepali_name' => 'चिचिला गाउँपालिका',
                'english_name' => 'Chichila Rural Municipality',
                'created_at' => '2022-03-27 08:33:27',
                'updated_at' => '2022-03-27 08:33:27',
            ),
            93 => 
            array (
                'id' => 94,
                'district_id' => 9,
                'nepali_name' => 'भोटखोला गाउँपालिका',
                'english_name' => 'BhotKhola Rural Municipality',
                'created_at' => '2022-03-27 08:33:27',
                'updated_at' => '2022-03-27 08:33:27',
            ),
            94 => 
            array (
                'id' => 95,
                'district_id' => 10,
                'nepali_name' => 'सोलुदुधकुण्ड नगरपालिका',
                'english_name' => 'Solu Dudhkunda Municipality',
                'created_at' => '2022-03-27 08:33:27',
                'updated_at' => '2022-03-27 08:33:27',
            ),
            95 => 
            array (
                'id' => 96,
                'district_id' => 10,
                'nepali_name' => 'माप्य दुधकोशी गाउँपालिका',
                'english_name' => 'Mapya Dudhkoshi Rural Municipality',
                'created_at' => '2022-03-27 08:33:28',
                'updated_at' => '2022-03-27 08:33:28',
            ),
            96 => 
            array (
                'id' => 97,
                'district_id' => 10,
                'nepali_name' => 'नेचासल्यान गाउँपालिका',
                'english_name' => 'Necha Salyan Rural Municipality',
                'created_at' => '2022-03-27 08:33:28',
                'updated_at' => '2022-03-27 08:33:28',
            ),
            97 => 
            array (
                'id' => 98,
                'district_id' => 10,
                'nepali_name' => 'थुलुङ दुधकोशी गाउँपालिका',
                'english_name' => 'Thulung Dudhkoshi Rural Municipality',
                'created_at' => '2022-03-27 08:33:29',
                'updated_at' => '2022-03-27 08:33:29',
            ),
            98 => 
            array (
                'id' => 99,
                'district_id' => 10,
                'nepali_name' => 'माहाकुलुङ गाउँपालिका',
                'english_name' => 'Maha Kulung Rural Municipality',
                'created_at' => '2022-03-27 08:33:29',
                'updated_at' => '2022-03-27 08:33:29',
            ),
            99 => 
            array (
                'id' => 100,
                'district_id' => 10,
                'nepali_name' => 'सोताङ गाउँपालिका',
                'english_name' => 'Sotang Rural Municipality',
                'created_at' => '2022-03-27 08:33:29',
                'updated_at' => '2022-03-27 08:33:29',
            ),
            100 => 
            array (
                'id' => 101,
                'district_id' => 10,
                'nepali_name' => 'खुम्वु पासाङल्हमु गाउँपालिका',
                'english_name' => 'Khumbu PasangLhamu Rural Municipality',
                'created_at' => '2022-03-27 08:33:30',
                'updated_at' => '2022-03-27 08:33:30',
            ),
            101 => 
            array (
                'id' => 102,
                'district_id' => 10,
                'nepali_name' => 'लिखु पिके गाउँपालिका',
                'english_name' => 'Likhu Pike Rural Municipality',
                'created_at' => '2022-03-27 08:33:30',
                'updated_at' => '2022-03-27 08:33:30',
            ),
            102 => 
            array (
                'id' => 103,
                'district_id' => 11,
                'nepali_name' => 'बराहक्षेत्र नगरपालिका',
                'english_name' => 'BarahaKshetra Municipality',
                'created_at' => '2022-03-27 08:33:31',
                'updated_at' => '2022-03-27 08:33:31',
            ),
            103 => 
            array (
                'id' => 104,
                'district_id' => 11,
                'nepali_name' => 'ईनरुवा नगरपालिका',
                'english_name' => 'Inaruwa Municipality',
                'created_at' => '2022-03-27 08:33:31',
                'updated_at' => '2022-03-27 08:33:31',
            ),
            104 => 
            array (
                'id' => 105,
                'district_id' => 11,
                'nepali_name' => 'दुहवी नगरपालिका',
                'english_name' => 'Duhabi Municipality',
                'created_at' => '2022-03-27 08:33:31',
                'updated_at' => '2022-03-27 08:33:31',
            ),
            105 => 
            array (
                'id' => 106,
                'district_id' => 11,
                'nepali_name' => 'रामधुनी नगरपालिका',
                'english_name' => 'Ramdhuni Municipality',
                'created_at' => '2022-03-27 08:33:32',
                'updated_at' => '2022-03-27 08:33:32',
            ),
            106 => 
            array (
                'id' => 107,
                'district_id' => 11,
                'nepali_name' => 'ईटहरी उपमहानगरपालिका',
                'english_name' => 'Itahari Sub-Metropolitan City',
                'created_at' => '2022-03-27 08:33:32',
                'updated_at' => '2022-03-27 08:33:32',
            ),
            107 => 
            array (
                'id' => 108,
                'district_id' => 11,
                'nepali_name' => 'धरान उपमहानगरपालिका',
                'english_name' => 'Dharan Sub-Metropolitan City',
                'created_at' => '2022-03-27 08:33:33',
                'updated_at' => '2022-03-27 08:33:33',
            ),
            108 => 
            array (
                'id' => 109,
                'district_id' => 11,
                'nepali_name' => 'कोशी गाउँपालिका',
                'english_name' => 'Koshi Rural Municipality',
                'created_at' => '2022-03-27 08:33:33',
                'updated_at' => '2022-03-27 08:33:33',
            ),
            109 => 
            array (
                'id' => 110,
                'district_id' => 11,
                'nepali_name' => 'हरिनगर गाउँपालिका',
                'english_name' => 'Harinagar Rural Municipality',
                'created_at' => '2022-03-27 08:33:34',
                'updated_at' => '2022-03-27 08:33:34',
            ),
            110 => 
            array (
                'id' => 111,
                'district_id' => 11,
                'nepali_name' => 'भोक्राहा नरसिंह गाउँपालिका',
                'english_name' => 'Bhokraha Narsingh Rural Municipalit',
                'created_at' => '2022-03-27 08:33:34',
                'updated_at' => '2022-03-27 08:33:34',
            ),
            111 => 
            array (
                'id' => 112,
                'district_id' => 11,
                'nepali_name' => 'देवानगञ्ज गाउँपालिका',
                'english_name' => 'Dewangunj Rural Municipality',
                'created_at' => '2022-03-27 08:33:34',
                'updated_at' => '2022-03-27 08:33:34',
            ),
            112 => 
            array (
                'id' => 113,
                'district_id' => 11,
                'nepali_name' => 'गढी गाउँपालिका',
                'english_name' => 'Gadhi Rural Municipality',
                'created_at' => '2022-03-27 08:33:35',
                'updated_at' => '2022-03-27 08:33:35',
            ),
            113 => 
            array (
                'id' => 114,
                'district_id' => 11,
                'nepali_name' => 'बर्जु गाउँपालिका',
                'english_name' => 'Barju Rural Municipality',
                'created_at' => '2022-03-27 08:33:35',
                'updated_at' => '2022-03-27 08:33:35',
            ),
            114 => 
            array (
                'id' => 115,
                'district_id' => 12,
                'nepali_name' => 'फुङलिङ नगरपालिका',
                'english_name' => 'Phungling Municipality',
                'created_at' => '2022-03-27 08:33:36',
                'updated_at' => '2022-03-27 08:33:36',
            ),
            115 => 
            array (
                'id' => 116,
                'district_id' => 12,
                'nepali_name' => 'सिरीजङ्घा गाउँपालिका',
                'english_name' => 'Sirijangha Rural Municipality',
                'created_at' => '2022-03-27 08:33:36',
                'updated_at' => '2022-03-27 08:33:36',
            ),
            116 => 
            array (
                'id' => 117,
                'district_id' => 12,
                'nepali_name' => 'आठराई त्रिवेणी गाउँपालिका',
                'english_name' => 'Aathrai Triveni Rural Municipality',
                'created_at' => '2022-03-27 08:33:36',
                'updated_at' => '2022-03-27 08:33:36',
            ),
            117 => 
            array (
                'id' => 118,
                'district_id' => 12,
                'nepali_name' => 'पाथीभरा याङवरक गाउँपालिका',
                'english_name' => 'Pathibhara Yangwarak Rural Municipality',
                'created_at' => '2022-03-27 08:33:36',
                'updated_at' => '2022-03-27 08:33:36',
            ),
            118 => 
            array (
                'id' => 119,
                'district_id' => 12,
                'nepali_name' => 'मेरिङदेन गाउँपालिका',
                'english_name' => 'Meringden Rural Municipality',
                'created_at' => '2022-03-27 08:33:37',
                'updated_at' => '2022-03-27 08:33:37',
            ),
            119 => 
            array (
                'id' => 120,
                'district_id' => 12,
                'nepali_name' => 'सिदिङ्वा गाउँपालिका',
                'english_name' => 'Sidingwa Rural Municipality',
                'created_at' => '2022-03-27 08:33:37',
                'updated_at' => '2022-03-27 08:33:37',
            ),
            120 => 
            array (
                'id' => 121,
                'district_id' => 12,
                'nepali_name' => 'फक्ताङलुङ गाउँपालिका',
                'english_name' => 'Phaktanglung Rural Municipality',
                'created_at' => '2022-03-27 08:33:37',
                'updated_at' => '2022-03-27 08:33:37',
            ),
            121 => 
            array (
                'id' => 122,
                'district_id' => 12,
                'nepali_name' => 'मैवाखोला गाउँपालिका',
                'english_name' => 'Maiwa Khola Rural Municipality',
                'created_at' => '2022-03-27 08:33:38',
                'updated_at' => '2022-03-27 08:33:38',
            ),
            122 => 
            array (
                'id' => 123,
                'district_id' => 12,
                'nepali_name' => 'मिक्वाखोला गाउँपालिका',
                'english_name' => 'Mikwa Khola Rural Municipality',
                'created_at' => '2022-03-27 08:33:38',
                'updated_at' => '2022-03-27 08:33:38',
            ),
            123 => 
            array (
                'id' => 124,
                'district_id' => 13,
                'nepali_name' => 'म्याङलुङ नगरपालिका',
                'english_name' => 'Myanglung Municipality',
                'created_at' => '2022-03-27 08:33:39',
                'updated_at' => '2022-03-27 08:33:39',
            ),
            124 => 
            array (
                'id' => 125,
                'district_id' => 13,
                'nepali_name' => 'लालीगुराँस नगरपालिका',
                'english_name' => 'Laligurans Municipality',
                'created_at' => '2022-03-27 08:33:39',
                'updated_at' => '2022-03-27 08:33:39',
            ),
            125 => 
            array (
                'id' => 126,
                'district_id' => 13,
                'nepali_name' => 'आठराई गाउँपालिका',
                'english_name' => 'Aathrai Rural Municipality',
                'created_at' => '2022-03-27 08:33:39',
                'updated_at' => '2022-03-27 08:33:39',
            ),
            126 => 
            array (
                'id' => 127,
                'district_id' => 13,
                'nepali_name' => 'फेदाप गाउँपालिका',
                'english_name' => 'Phedap Rural Municipality',
                'created_at' => '2022-03-27 08:33:40',
                'updated_at' => '2022-03-27 08:33:40',
            ),
            127 => 
            array (
                'id' => 128,
                'district_id' => 13,
                'nepali_name' => 'छथर गाउँपालिका',
                'english_name' => 'Chhathar Rural Municipality',
                'created_at' => '2022-03-27 08:33:40',
                'updated_at' => '2022-03-27 08:33:40',
            ),
            128 => 
            array (
                'id' => 129,
                'district_id' => 13,
                'nepali_name' => 'मेन्छयायेम गाउँपालिका',
                'english_name' => 'Menchayayem Rural Municipality',
                'created_at' => '2022-03-27 08:33:41',
                'updated_at' => '2022-03-27 08:33:41',
            ),
            129 => 
            array (
                'id' => 130,
                'district_id' => 14,
                'nepali_name' => 'त्रियुगा नगरपालिका',
                'english_name' => 'Triyuga Municipality',
                'created_at' => '2022-03-27 08:33:41',
                'updated_at' => '2022-03-27 08:33:41',
            ),
            130 => 
            array (
                'id' => 131,
                'district_id' => 14,
                'nepali_name' => 'कटारी नगरपालिका',
                'english_name' => 'Katari Municipality',
                'created_at' => '2022-03-27 08:33:41',
                'updated_at' => '2022-03-27 08:33:41',
            ),
            131 => 
            array (
                'id' => 132,
                'district_id' => 14,
                'nepali_name' => 'चौदण्डीगढी नगरपालिका',
                'english_name' => 'Chaudandigadhi Municipality',
                'created_at' => '2022-03-27 08:33:41',
                'updated_at' => '2022-03-27 08:33:41',
            ),
            132 => 
            array (
                'id' => 133,
                'district_id' => 14,
                'nepali_name' => 'वेलका नगरपालिका',
                'english_name' => 'Belaka Municipality',
                'created_at' => '2022-03-27 08:33:42',
                'updated_at' => '2022-03-27 08:33:42',
            ),
            133 => 
            array (
                'id' => 134,
                'district_id' => 14,
                'nepali_name' => 'उदयपुरगढी गाउँपालिका',
                'english_name' => 'Udayapurgadhi Rural Municipality',
                'created_at' => '2022-03-27 08:33:42',
                'updated_at' => '2022-03-27 08:33:42',
            ),
            134 => 
            array (
                'id' => 135,
                'district_id' => 14,
                'nepali_name' => 'रौतामाई गाउँपालिका',
                'english_name' => 'Rautamai Rural Municipality',
                'created_at' => '2022-03-27 08:33:42',
                'updated_at' => '2022-03-27 08:33:42',
            ),
            135 => 
            array (
                'id' => 136,
                'district_id' => 14,
                'nepali_name' => 'ताप्ली गाउँपालिका',
                'english_name' => 'Tapli Rural Municipality',
                'created_at' => '2022-03-27 08:33:43',
                'updated_at' => '2022-03-27 08:33:43',
            ),
            136 => 
            array (
                'id' => 137,
                'district_id' => 14,
                'nepali_name' => 'लिम्चुङ्बुङ गाउँपालिका',
                'english_name' => 'Limchungbung Rural Municipality',
                'created_at' => '2022-03-27 08:33:43',
                'updated_at' => '2022-03-27 08:33:43',
            ),
            137 => 
            array (
                'id' => 138,
                'district_id' => 15,
                'nepali_name' => 'बिरगंज महानगरपालिका',
                'english_name' => 'Birgunj Metropolitan City',
                'created_at' => '2022-03-27 08:33:43',
                'updated_at' => '2022-03-27 08:33:43',
            ),
            138 => 
            array (
                'id' => 139,
                'district_id' => 15,
                'nepali_name' => 'बहुदरमाई नगरपालिका',
                'english_name' => 'Bahudarmai Municipality',
                'created_at' => '2022-03-27 08:33:44',
                'updated_at' => '2022-03-27 08:33:44',
            ),
            139 => 
            array (
                'id' => 140,
                'district_id' => 15,
                'nepali_name' => 'पर्सागढी नगरपालिका',
                'english_name' => 'Parsagadhi Municipality',
                'created_at' => '2022-03-27 08:33:44',
                'updated_at' => '2022-03-27 08:33:44',
            ),
            140 => 
            array (
                'id' => 141,
                'district_id' => 15,
                'nepali_name' => 'पोखरिया नगरपालिका',
                'english_name' => 'Pokhariya Municipality',
                'created_at' => '2022-03-27 08:33:44',
                'updated_at' => '2022-03-27 08:33:44',
            ),
            141 => 
            array (
                'id' => 142,
                'district_id' => 15,
                'nepali_name' => 'बिन्दबासिनी गाउँपालिका',
                'english_name' => 'Bindabasini Rural Municipality',
                'created_at' => '2022-03-27 08:33:45',
                'updated_at' => '2022-03-27 08:33:45',
            ),
            142 => 
            array (
                'id' => 143,
                'district_id' => 15,
                'nepali_name' => 'धोबीनी गाउँपालिका',
                'english_name' => 'Dhobini Rural Municipality',
                'created_at' => '2022-03-27 08:33:45',
                'updated_at' => '2022-03-27 08:33:45',
            ),
            143 => 
            array (
                'id' => 144,
                'district_id' => 15,
                'nepali_name' => 'छिपहरमाई गाउँपालिका',
                'english_name' => 'Chhipaharmai Rural Municipality',
                'created_at' => '2022-03-27 08:33:46',
                'updated_at' => '2022-03-27 08:33:46',
            ),
            144 => 
            array (
                'id' => 145,
                'district_id' => 15,
                'nepali_name' => 'जगरनाथपुर गाउँपालिका',
                'english_name' => 'Jagarnathpur Rural Municipality',
                'created_at' => '2022-03-27 08:33:46',
                'updated_at' => '2022-03-27 08:33:46',
            ),
            145 => 
            array (
                'id' => 146,
                'district_id' => 15,
                'nepali_name' => 'जिरा भवानी गाउँपालिका',
                'english_name' => 'Jirabhawani Rural Municipality',
                'created_at' => '2022-03-27 08:33:46',
                'updated_at' => '2022-03-27 08:33:46',
            ),
            146 => 
            array (
                'id' => 147,
                'district_id' => 15,
                'nepali_name' => 'कालिकामाई गाउँपालिका',
                'english_name' => 'Kalikamai Rural Municipality',
                'created_at' => '2022-03-27 08:33:46',
                'updated_at' => '2022-03-27 08:33:46',
            ),
            147 => 
            array (
                'id' => 148,
                'district_id' => 15,
                'nepali_name' => 'पकाहा मैनपुर गाउँपालिका',
                'english_name' => 'Pakaha Mainpur Rural Municipality',
                'created_at' => '2022-03-27 08:33:47',
                'updated_at' => '2022-03-27 08:33:47',
            ),
            148 => 
            array (
                'id' => 149,
                'district_id' => 15,
                'nepali_name' => 'पटेर्वा सुगौली गाउँपालिका',
                'english_name' => 'Paterwa Sugauli Rural Municipality',
                'created_at' => '2022-03-27 08:33:47',
                'updated_at' => '2022-03-27 08:33:47',
            ),
            149 => 
            array (
                'id' => 150,
                'district_id' => 15,
                'nepali_name' => 'सखुवा प्रसौनी गाउँपालिका',
                'english_name' => 'Sakhuwa Prasauni Rural Municipality',
                'created_at' => '2022-03-27 08:33:47',
                'updated_at' => '2022-03-27 08:33:47',
            ),
            150 => 
            array (
                'id' => 151,
                'district_id' => 15,
                'nepali_name' => 'ठोरी गाउँपालिका',
                'english_name' => 'Thori Rural Municipality',
                'created_at' => '2022-03-27 08:33:48',
                'updated_at' => '2022-03-27 08:33:48',
            ),
            151 => 
            array (
                'id' => 152,
                'district_id' => 16,
                'nepali_name' => 'कलैया उपमहानगरपालिका',
                'english_name' => 'Kalaiya Sub-Metropolitan City',
                'created_at' => '2022-03-27 08:33:48',
                'updated_at' => '2022-03-27 08:33:48',
            ),
            152 => 
            array (
                'id' => 153,
                'district_id' => 16,
                'nepali_name' => 'जीतपुर सिमरा उपमहानगरपालिका',
                'english_name' => 'Jitpur Simara Sub-Metropolitan City',
                'created_at' => '2022-03-27 08:33:48',
                'updated_at' => '2022-03-27 08:33:48',
            ),
            153 => 
            array (
                'id' => 154,
                'district_id' => 16,
                'nepali_name' => 'कोल्हवी नगरपालिका',
                'english_name' => 'Kolhabi Municipality',
                'created_at' => '2022-03-27 08:33:49',
                'updated_at' => '2022-03-27 08:33:49',
            ),
            154 => 
            array (
                'id' => 155,
                'district_id' => 16,
                'nepali_name' => 'निजगढ नगरपालिका',
                'english_name' => 'Nijgadh Municipality',
                'created_at' => '2022-03-27 08:33:49',
                'updated_at' => '2022-03-27 08:33:49',
            ),
            155 => 
            array (
                'id' => 156,
                'district_id' => 16,
                'nepali_name' => 'महागढीमाई नगरपालिका',
                'english_name' => 'Mahagadhimai Municipality',
                'created_at' => '2022-03-27 08:33:49',
                'updated_at' => '2022-03-27 08:33:49',
            ),
            156 => 
            array (
                'id' => 157,
                'district_id' => 16,
                'nepali_name' => 'सिम्रौनगढ नगरपालिका',
                'english_name' => 'Simaraungadh Municipality',
                'created_at' => '2022-03-27 08:33:50',
                'updated_at' => '2022-03-27 08:33:50',
            ),
            157 => 
            array (
                'id' => 158,
                'district_id' => 16,
                'nepali_name' => 'पचरौता',
                'english_name' => 'Pacharauta Municipality',
                'created_at' => '2022-03-27 08:33:50',
                'updated_at' => '2022-03-27 08:33:50',
            ),
            158 => 
            array (
                'id' => 159,
                'district_id' => 16,
                'nepali_name' => 'फेटा गाउँपालिका',
                'english_name' => 'Pheta Rural Municipality',
                'created_at' => '2022-03-27 08:33:51',
                'updated_at' => '2022-03-27 08:33:51',
            ),
            159 => 
            array (
                'id' => 160,
                'district_id' => 16,
                'nepali_name' => 'विश्रामपुर गाउँपालिका',
                'english_name' => 'Bishrampur Rural Municipality',
                'created_at' => '2022-03-27 08:33:51',
                'updated_at' => '2022-03-27 08:33:51',
            ),
            160 => 
            array (
                'id' => 161,
                'district_id' => 16,
                'nepali_name' => 'प्रसौनी गाउँपालिका',
                'english_name' => 'Prasauni Rural Municipality',
                'created_at' => '2022-03-27 08:33:51',
                'updated_at' => '2022-03-27 08:33:51',
            ),
            161 => 
            array (
                'id' => 162,
                'district_id' => 16,
                'nepali_name' => 'आदर्श कोटवाल गाउँपालिका',
                'english_name' => 'Adarsh Kotwal Rural Municipality',
                'created_at' => '2022-03-27 08:33:52',
                'updated_at' => '2022-03-27 08:33:52',
            ),
            162 => 
            array (
                'id' => 163,
                'district_id' => 16,
                'nepali_name' => 'करैयामाई गाउँपालिका',
                'english_name' => 'Karaiyamai Rural Municipality',
                'created_at' => '2022-03-27 08:33:52',
                'updated_at' => '2022-03-27 08:33:52',
            ),
            163 => 
            array (
                'id' => 164,
                'district_id' => 16,
                'nepali_name' => 'देवताल गाउँपालिका',
                'english_name' => 'Devtal Rural Municipality',
                'created_at' => '2022-03-27 08:33:53',
                'updated_at' => '2022-03-27 08:33:53',
            ),
            164 => 
            array (
                'id' => 165,
                'district_id' => 16,
                'nepali_name' => 'परवानीपुर गाउँपालिका',
                'english_name' => 'Parwanipur Rural Municipality',
                'created_at' => '2022-03-27 08:33:53',
                'updated_at' => '2022-03-27 08:33:53',
            ),
            165 => 
            array (
                'id' => 166,
                'district_id' => 16,
                'nepali_name' => 'बारागढी गाउँपालिका',
                'english_name' => 'Baragadhi Rural Municipality',
                'created_at' => '2022-03-27 08:33:54',
                'updated_at' => '2022-03-27 08:33:54',
            ),
            166 => 
            array (
                'id' => 167,
                'district_id' => 16,
                'nepali_name' => 'सुवर्ण गाउँपालिका',
                'english_name' => 'Suwarna Rural Municipality',
                'created_at' => '2022-03-27 08:33:54',
                'updated_at' => '2022-03-27 08:33:54',
            ),
            167 => 
            array (
                'id' => 168,
                'district_id' => 17,
                'nepali_name' => 'बौधीमाई नगरपालिका',
                'english_name' => 'Baudhimai Municipality',
                'created_at' => '2022-03-27 08:33:55',
                'updated_at' => '2022-03-27 08:33:55',
            ),
            168 => 
            array (
                'id' => 169,
                'district_id' => 17,
                'nepali_name' => 'बृन्दावन नगरपालिका',
                'english_name' => 'Brindaban Municipality',
                'created_at' => '2022-03-27 08:33:55',
                'updated_at' => '2022-03-27 08:33:55',
            ),
            169 => 
            array (
                'id' => 170,
                'district_id' => 17,
                'nepali_name' => 'चन्द्रपुर नगरपालिका',
                'english_name' => 'Chandrapur Municipality',
                'created_at' => '2022-03-27 08:33:55',
                'updated_at' => '2022-03-27 08:33:55',
            ),
            170 => 
            array (
                'id' => 171,
                'district_id' => 17,
                'nepali_name' => 'देवाही गोनाही नगरपालिका',
                'english_name' => 'Dewahi Gonahi Municipality',
                'created_at' => '2022-03-27 08:33:56',
                'updated_at' => '2022-03-27 08:33:56',
            ),
            171 => 
            array (
                'id' => 172,
                'district_id' => 17,
                'nepali_name' => 'गढीमाई नगरपालिका',
                'english_name' => 'Gadhimai Municipality',
                'created_at' => '2022-03-27 08:33:56',
                'updated_at' => '2022-03-27 08:33:56',
            ),
            172 => 
            array (
                'id' => 173,
                'district_id' => 17,
                'nepali_name' => 'गरुडा नगरपालिका',
                'english_name' => 'Guruda Municipality',
                'created_at' => '2022-03-27 08:33:56',
                'updated_at' => '2022-03-27 08:33:56',
            ),
            173 => 
            array (
                'id' => 174,
                'district_id' => 17,
                'nepali_name' => 'गौर नगरपालिका',
                'english_name' => 'Gaur Municipality',
                'created_at' => '2022-03-27 08:33:57',
                'updated_at' => '2022-03-27 08:33:57',
            ),
            174 => 
            array (
                'id' => 175,
                'district_id' => 17,
                'nepali_name' => 'गुजरा नगरपालिका',
                'english_name' => 'Gujara Municipality',
                'created_at' => '2022-03-27 08:33:57',
                'updated_at' => '2022-03-27 08:33:57',
            ),
            175 => 
            array (
                'id' => 176,
                'district_id' => 17,
                'nepali_name' => 'ईशनाथ नगरपालिका',
                'english_name' => 'Ishanath Municipality',
                'created_at' => '2022-03-27 08:33:57',
                'updated_at' => '2022-03-27 08:33:57',
            ),
            176 => 
            array (
                'id' => 177,
                'district_id' => 17,
                'nepali_name' => 'कटहरिया नगरपालिका',
                'english_name' => 'Katahariya Municipality',
                'created_at' => '2022-03-27 08:33:58',
                'updated_at' => '2022-03-27 08:33:58',
            ),
            177 => 
            array (
                'id' => 178,
                'district_id' => 17,
                'nepali_name' => 'माधव नारायण नगरपालिका',
                'english_name' => 'Madhav Narayan Municipality',
                'created_at' => '2022-03-27 08:33:58',
                'updated_at' => '2022-03-27 08:33:58',
            ),
            178 => 
            array (
                'id' => 179,
                'district_id' => 17,
                'nepali_name' => 'मौलापुर नगरपालिका',
                'english_name' => 'Maulapur Municipality',
                'created_at' => '2022-03-27 08:33:58',
                'updated_at' => '2022-03-27 08:33:58',
            ),
            179 => 
            array (
                'id' => 180,
                'district_id' => 17,
                'nepali_name' => 'परोहा नगरपालिका',
                'english_name' => 'Paroha Municipality',
                'created_at' => '2022-03-27 08:33:59',
                'updated_at' => '2022-03-27 08:33:59',
            ),
            180 => 
            array (
                'id' => 181,
                'district_id' => 17,
                'nepali_name' => 'फतुवाबिजयपुर नगरपालिका',
                'english_name' => 'Phatuwa Bijayapur Municipality',
                'created_at' => '2022-03-27 08:33:59',
                'updated_at' => '2022-03-27 08:33:59',
            ),
            181 => 
            array (
                'id' => 182,
                'district_id' => 17,
                'nepali_name' => 'राजदेवी नगरपालिका',
                'english_name' => 'Rajdevi Municipality',
                'created_at' => '2022-03-27 08:33:59',
                'updated_at' => '2022-03-27 08:33:59',
            ),
            182 => 
            array (
                'id' => 183,
                'district_id' => 17,
                'nepali_name' => 'राजपुर नगरपालिका',
                'english_name' => 'Rajpur Municipality',
                'created_at' => '2022-03-27 08:34:00',
                'updated_at' => '2022-03-27 08:34:00',
            ),
            183 => 
            array (
                'id' => 184,
                'district_id' => 17,
                'nepali_name' => 'दुर्गा भगवती गाउँपालिका',
                'english_name' => 'Durga Bhagwati Rural Municipality',
                'created_at' => '2022-03-27 08:34:00',
                'updated_at' => '2022-03-27 08:34:00',
            ),
            184 => 
            array (
                'id' => 185,
                'district_id' => 17,
                'nepali_name' => 'यमुनामाई गाउँपालिका',
                'english_name' => 'Yamunamai Rural Municipality',
                'created_at' => '2022-03-27 08:34:01',
                'updated_at' => '2022-03-27 08:34:01',
            ),
            185 => 
            array (
                'id' => 186,
                'district_id' => 18,
                'nepali_name' => 'बागमती नगरपालिका',
                'english_name' => 'Bagmati Municipality',
                'created_at' => '2022-03-27 08:34:01',
                'updated_at' => '2022-03-27 08:34:01',
            ),
            186 => 
            array (
                'id' => 187,
                'district_id' => 18,
                'nepali_name' => 'बलरा नगरपालिका',
                'english_name' => 'Balara Municipality',
                'created_at' => '2022-03-27 08:34:01',
                'updated_at' => '2022-03-27 08:34:01',
            ),
            187 => 
            array (
                'id' => 188,
                'district_id' => 18,
                'nepali_name' => 'बरहथवा नगरपालिका',
                'english_name' => 'Barahathwa Municipality',
                'created_at' => '2022-03-27 08:34:02',
                'updated_at' => '2022-03-27 08:34:02',
            ),
            188 => 
            array (
                'id' => 189,
                'district_id' => 18,
                'nepali_name' => 'गोडैटा नगरपालिका',
                'english_name' => 'Godaita Municipality',
                'created_at' => '2022-03-27 08:34:02',
                'updated_at' => '2022-03-27 08:34:02',
            ),
            189 => 
            array (
                'id' => 190,
                'district_id' => 18,
                'nepali_name' => 'हरिवन नगरपालिका',
                'english_name' => 'Hariwan Municipality',
                'created_at' => '2022-03-27 08:34:03',
                'updated_at' => '2022-03-27 08:34:03',
            ),
            190 => 
            array (
                'id' => 191,
                'district_id' => 18,
                'nepali_name' => 'हरिपुर नगरपालिका',
                'english_name' => 'Haripur Municipality',
                'created_at' => '2022-03-27 08:34:03',
                'updated_at' => '2022-03-27 08:34:03',
            ),
            191 => 
            array (
                'id' => 192,
                'district_id' => 18,
                'nepali_name' => 'हरिपुर्वा नगरपालिका',
                'english_name' => 'Haripurwa Municipality',
                'created_at' => '2022-03-27 08:34:03',
                'updated_at' => '2022-03-27 08:34:03',
            ),
            192 => 
            array (
                'id' => 193,
                'district_id' => 18,
                'nepali_name' => 'ईश्वरपुर नगरपालिका',
                'english_name' => 'Ishowrpur Municipality',
                'created_at' => '2022-03-27 08:34:03',
                'updated_at' => '2022-03-27 08:34:03',
            ),
            193 => 
            array (
                'id' => 194,
                'district_id' => 18,
                'nepali_name' => 'कविलासी नगरपालिका',
                'english_name' => 'Kabilasi Municipality',
                'created_at' => '2022-03-27 08:34:04',
                'updated_at' => '2022-03-27 08:34:04',
            ),
            194 => 
            array (
                'id' => 195,
                'district_id' => 18,
                'nepali_name' => 'लालबन्दी नगरपालिका',
                'english_name' => 'Lalbandi Municipality',
                'created_at' => '2022-03-27 08:34:04',
                'updated_at' => '2022-03-27 08:34:04',
            ),
            195 => 
            array (
                'id' => 196,
                'district_id' => 18,
                'nepali_name' => 'मलंगवा नगरपालिका',
                'english_name' => 'Malangawa Municipality',
                'created_at' => '2022-03-27 08:34:04',
                'updated_at' => '2022-03-27 08:34:04',
            ),
            196 => 
            array (
                'id' => 197,
                'district_id' => 18,
                'nepali_name' => 'बसबरीया गाउँपालिका',
                'english_name' => 'Basbariya Rural Municipality',
                'created_at' => '2022-03-27 08:34:05',
                'updated_at' => '2022-03-27 08:34:05',
            ),
            197 => 
            array (
                'id' => 198,
                'district_id' => 18,
                'nepali_name' => 'विष्णु गाउँपालिका',
                'english_name' => 'Bisnu Rural Municipality',
                'created_at' => '2022-03-27 08:34:05',
                'updated_at' => '2022-03-27 08:34:05',
            ),
            198 => 
            array (
                'id' => 199,
                'district_id' => 18,
                'nepali_name' => 'ब्रह्मपुरी गाउँपालिका',
                'english_name' => 'Brahampuri Rural Municipality',
                'created_at' => '2022-03-27 08:34:05',
                'updated_at' => '2022-03-27 08:34:05',
            ),
            199 => 
            array (
                'id' => 200,
                'district_id' => 18,
                'nepali_name' => 'चक्रघट्टा गाउँपालिका',
                'english_name' => 'Chakraghatta Rural Municipality',
                'created_at' => '2022-03-27 08:34:06',
                'updated_at' => '2022-03-27 08:34:06',
            ),
            200 => 
            array (
                'id' => 201,
                'district_id' => 18,
                'nepali_name' => 'चन्द्रनगर गाउँपालिका',
                'english_name' => 'Chandranagar Rural Municipality',
                'created_at' => '2022-03-27 08:34:06',
                'updated_at' => '2022-03-27 08:34:06',
            ),
            201 => 
            array (
                'id' => 202,
                'district_id' => 18,
                'nepali_name' => 'धनकौल गाउँपालिका',
                'english_name' => 'Dhankaul Rural Municipality',
                'created_at' => '2022-03-27 08:34:06',
                'updated_at' => '2022-03-27 08:34:06',
            ),
            202 => 
            array (
                'id' => 203,
                'district_id' => 18,
                'nepali_name' => 'कौडेना गाउँपालिका',
                'english_name' => 'Kaudena Rural Municipality',
                'created_at' => '2022-03-27 08:34:07',
                'updated_at' => '2022-03-27 08:34:07',
            ),
            203 => 
            array (
                'id' => 204,
                'district_id' => 18,
                'nepali_name' => 'पर्सा गाउँपालिका',
                'english_name' => 'Parsa Rural Municipality',
                'created_at' => '2022-03-27 08:34:07',
                'updated_at' => '2022-03-27 08:34:07',
            ),
            204 => 
            array (
                'id' => 205,
                'district_id' => 18,
                'nepali_name' => 'रामनगर गाउँपालिका',
                'english_name' => 'Ramnagar Rural Municipality',
                'created_at' => '2022-03-27 08:34:07',
                'updated_at' => '2022-03-27 08:34:07',
            ),
            205 => 
            array (
                'id' => 206,
                'district_id' => 19,
                'nepali_name' => 'लहान नगरपालिका',
                'english_name' => 'Lahan Municipality',
                'created_at' => '2022-03-27 08:34:08',
                'updated_at' => '2022-03-27 08:34:08',
            ),
            206 => 
            array (
                'id' => 207,
                'district_id' => 19,
                'nepali_name' => 'धनगढीमाई नगरपालिका',
                'english_name' => 'Dhangadhimai Municipality',
                'created_at' => '2022-03-27 08:34:08',
                'updated_at' => '2022-03-27 08:34:08',
            ),
            207 => 
            array (
                'id' => 208,
                'district_id' => 19,
                'nepali_name' => 'सिरहा नगरपालिका',
                'english_name' => 'Siraha Municipality',
                'created_at' => '2022-03-27 08:34:08',
                'updated_at' => '2022-03-27 08:34:08',
            ),
            208 => 
            array (
                'id' => 209,
                'district_id' => 19,
                'nepali_name' => 'गोलबजार नगरपालिका',
                'english_name' => 'Golbazar Municipality',
                'created_at' => '2022-03-27 08:34:08',
                'updated_at' => '2022-03-27 08:34:08',
            ),
            209 => 
            array (
                'id' => 210,
                'district_id' => 19,
                'nepali_name' => 'मिर्चैयाँ नगरपालिका',
                'english_name' => 'Mirchaiya Municipality',
                'created_at' => '2022-03-27 08:34:09',
                'updated_at' => '2022-03-27 08:34:09',
            ),
            210 => 
            array (
                'id' => 211,
                'district_id' => 19,
                'nepali_name' => 'कल्याणपुर नगरपालिका',
                'english_name' => 'Kalyanpur Municipality',
                'created_at' => '2022-03-27 08:34:09',
                'updated_at' => '2022-03-27 08:34:09',
            ),
            211 => 
            array (
                'id' => 212,
                'district_id' => 19,
                'nepali_name' => 'कर्जन्हा नगरपालिका',
                'english_name' => 'Karjanha Municipality',
                'created_at' => '2022-03-27 08:34:09',
                'updated_at' => '2022-03-27 08:34:09',
            ),
            212 => 
            array (
                'id' => 213,
                'district_id' => 19,
                'nepali_name' => 'सुखीपुर नगरपालिका',
                'english_name' => 'Sukhipur Municipality',
                'created_at' => '2022-03-27 08:34:10',
                'updated_at' => '2022-03-27 08:34:10',
            ),
            213 => 
            array (
                'id' => 214,
                'district_id' => 19,
                'nepali_name' => 'भगवानपुर गाउँपालिका',
                'english_name' => 'Bhagwanpur Rural Municipality',
                'created_at' => '2022-03-27 08:34:10',
                'updated_at' => '2022-03-27 08:34:10',
            ),
            214 => 
            array (
                'id' => 215,
                'district_id' => 19,
                'nepali_name' => 'औरही गाउँपालिका',
                'english_name' => 'Aurahi Rural Municipality',
                'created_at' => '2022-03-27 08:34:10',
                'updated_at' => '2022-03-27 08:34:10',
            ),
            215 => 
            array (
                'id' => 216,
                'district_id' => 19,
                'nepali_name' => 'विष्णुपुर गाउँपालिका',
                'english_name' => 'Bishnupur Rural Municipality',
                'created_at' => '2022-03-27 08:34:11',
                'updated_at' => '2022-03-27 08:34:11',
            ),
            216 => 
            array (
                'id' => 217,
                'district_id' => 19,
                'nepali_name' => 'बरियारपट्टी गाउँपालिका',
                'english_name' => 'Bariyarpatti Rural Municipality',
                'created_at' => '2022-03-27 08:34:11',
                'updated_at' => '2022-03-27 08:34:11',
            ),
            217 => 
            array (
                'id' => 218,
                'district_id' => 19,
                'nepali_name' => 'लक्ष्मीपुर पतारी गाउँपालिका',
                'english_name' => 'Lakshmipur Patari Rural Municipality',
                'created_at' => '2022-03-27 08:34:12',
                'updated_at' => '2022-03-27 08:34:12',
            ),
            218 => 
            array (
                'id' => 219,
                'district_id' => 19,
                'nepali_name' => 'नरहा गाउँपालिका',
                'english_name' => 'Naraha Rural Municipality',
                'created_at' => '2022-03-27 08:34:12',
                'updated_at' => '2022-03-27 08:34:12',
            ),
            219 => 
            array (
                'id' => 220,
                'district_id' => 19,
                'nepali_name' => 'सखुवानान्कारकट्टी गाउँपालिका',
                'english_name' => 'SakhuwanankarKatti Rural Municipality',
                'created_at' => '2022-03-27 08:34:12',
                'updated_at' => '2022-03-27 08:34:12',
            ),
            220 => 
            array (
                'id' => 221,
                'district_id' => 19,
                'nepali_name' => 'अर्नमा गाउँपालिका',
                'english_name' => 'Arnama Rural Municipality',
                'created_at' => '2022-03-27 08:34:12',
                'updated_at' => '2022-03-27 08:34:12',
            ),
            221 => 
            array (
                'id' => 222,
                'district_id' => 19,
                'nepali_name' => 'नवराजपुर गाउँपालिका',
                'english_name' => 'Navarajpur Rural Municipality',
                'created_at' => '2022-03-27 08:34:13',
                'updated_at' => '2022-03-27 08:34:13',
            ),
            222 => 
            array (
                'id' => 223,
                'district_id' => 20,
                'nepali_name' => 'जनकपुरधाम उपमहानगरपालिका',
                'english_name' => 'Janakpurdham Sub-Metropolitan City',
                'created_at' => '2022-03-27 08:34:13',
                'updated_at' => '2022-03-27 08:34:13',
            ),
            223 => 
            array (
                'id' => 224,
                'district_id' => 20,
                'nepali_name' => 'क्षिरेश्वरनाथ नगरपालिका',
                'english_name' => 'Chhireshwarnath Municipality',
                'created_at' => '2022-03-27 08:34:13',
                'updated_at' => '2022-03-27 08:34:13',
            ),
            224 => 
            array (
                'id' => 225,
                'district_id' => 20,
                'nepali_name' => 'गणेशमान चारनाथ नगरपालिका',
                'english_name' => 'Ganeshman Charnath Municipality',
                'created_at' => '2022-03-27 08:34:13',
                'updated_at' => '2022-03-27 08:34:13',
            ),
            225 => 
            array (
                'id' => 226,
                'district_id' => 20,
                'nepali_name' => 'धनुषाधाम नगरपालिका',
                'english_name' => 'Dhanushadham Municipality',
                'created_at' => '2022-03-27 08:34:14',
                'updated_at' => '2022-03-27 08:34:14',
            ),
            226 => 
            array (
                'id' => 227,
                'district_id' => 20,
                'nepali_name' => 'नगराइन नगरपालिका',
                'english_name' => 'Nagarain Municipality',
                'created_at' => '2022-03-27 08:34:14',
                'updated_at' => '2022-03-27 08:34:14',
            ),
            227 => 
            array (
                'id' => 228,
                'district_id' => 20,
                'nepali_name' => 'विदेह नगरपालिका',
                'english_name' => 'Bideha Municipality',
                'created_at' => '2022-03-27 08:34:14',
                'updated_at' => '2022-03-27 08:34:14',
            ),
            228 => 
            array (
                'id' => 229,
                'district_id' => 20,
                'nepali_name' => 'मिथिला नगरपालिका',
                'english_name' => 'Mithila Municipality',
                'created_at' => '2022-03-27 08:34:15',
                'updated_at' => '2022-03-27 08:34:15',
            ),
            229 => 
            array (
                'id' => 230,
                'district_id' => 20,
                'nepali_name' => 'शहीदनगर नगरपालिका',
                'english_name' => 'Sahidnagar Municipality',
                'created_at' => '2022-03-27 08:34:15',
                'updated_at' => '2022-03-27 08:34:15',
            ),
            230 => 
            array (
                'id' => 231,
                'district_id' => 20,
                'nepali_name' => 'सबैला नगरपालिका',
                'english_name' => 'Sabaila Municipality',
                'created_at' => '2022-03-27 08:34:15',
                'updated_at' => '2022-03-27 08:34:15',
            ),
            231 => 
            array (
                'id' => 232,
                'district_id' => 20,
                'nepali_name' => 'कमला नगरपालिका',
                'english_name' => 'Kamala Municipality',
                'created_at' => '2022-03-27 08:34:16',
                'updated_at' => '2022-03-27 08:34:16',
            ),
            232 => 
            array (
                'id' => 233,
                'district_id' => 20,
                'nepali_name' => 'मिथिला बिहारी नगरपालिका',
                'english_name' => 'MithilaBihari Municipality',
                'created_at' => '2022-03-27 08:34:16',
                'updated_at' => '2022-03-27 08:34:16',
            ),
            233 => 
            array (
                'id' => 234,
                'district_id' => 20,
                'nepali_name' => 'हंसपुर नगरपालिका',
                'english_name' => 'Hansapur Municipality',
                'created_at' => '2022-03-27 08:34:17',
                'updated_at' => '2022-03-27 08:34:17',
            ),
            234 => 
            array (
                'id' => 235,
                'district_id' => 20,
                'nepali_name' => 'जनकनन्दिनी गाउँपालिका',
                'english_name' => 'Janaknandani Rural Municipality',
                'created_at' => '2022-03-27 08:34:17',
                'updated_at' => '2022-03-27 08:34:17',
            ),
            235 => 
            array (
                'id' => 236,
                'district_id' => 20,
                'nepali_name' => 'बटेश्वर गाउँपालिका',
                'english_name' => 'Bateshwar Rural Municipality',
                'created_at' => '2022-03-27 08:34:17',
                'updated_at' => '2022-03-27 08:34:17',
            ),
            236 => 
            array (
                'id' => 237,
                'district_id' => 20,
                'nepali_name' => 'मुखियापट्टी मुसहरमिया गाउँपालिका',
                'english_name' => 'Mukhiyapatti Musharniya Rural Municipality',
                'created_at' => '2022-03-27 08:34:17',
                'updated_at' => '2022-03-27 08:34:17',
            ),
            237 => 
            array (
                'id' => 238,
                'district_id' => 20,
                'nepali_name' => 'लक्ष्मीनिया गाउँपालिका',
                'english_name' => 'Lakshminya Rural Municipality',
                'created_at' => '2022-03-27 08:34:18',
                'updated_at' => '2022-03-27 08:34:18',
            ),
            238 => 
            array (
                'id' => 239,
                'district_id' => 20,
                'nepali_name' => 'औरही गाउँपालिका',
                'english_name' => 'Aaurahi Rural Municipality',
                'created_at' => '2022-03-27 08:34:18',
                'updated_at' => '2022-03-27 08:34:18',
            ),
            239 => 
            array (
                'id' => 240,
                'district_id' => 20,
                'nepali_name' => 'धनौजी गाउँपालिका',
                'english_name' => 'Dhanauji Rural Municipality',
                'created_at' => '2022-03-27 08:34:18',
                'updated_at' => '2022-03-27 08:34:18',
            ),
            240 => 
            array (
                'id' => 241,
                'district_id' => 21,
                'nepali_name' => 'बोदेबरसाईन नगरपालिका',
                'english_name' => 'Bodebarsain Municipality',
                'created_at' => '2022-03-27 08:34:19',
                'updated_at' => '2022-03-27 08:34:19',
            ),
            241 => 
            array (
                'id' => 242,
                'district_id' => 21,
                'nepali_name' => 'डाक्नेश्वरी नगरपालिका',
                'english_name' => 'Dakneshwori Municipality',
                'created_at' => '2022-03-27 08:34:19',
                'updated_at' => '2022-03-27 08:34:19',
            ),
            242 => 
            array (
                'id' => 243,
                'district_id' => 21,
                'nepali_name' => 'हनुमाननगर कङ्‌कालिनी नगरपालिका',
                'english_name' => 'Hanumannagar Kankalini Municipality',
                'created_at' => '2022-03-27 08:34:19',
                'updated_at' => '2022-03-27 08:34:19',
            ),
            243 => 
            array (
                'id' => 244,
                'district_id' => 21,
                'nepali_name' => 'कञ्चनरुप नगरपालिका',
                'english_name' => 'Kanchanrup Municipality',
                'created_at' => '2022-03-27 08:34:20',
                'updated_at' => '2022-03-27 08:34:20',
            ),
            244 => 
            array (
                'id' => 245,
                'district_id' => 21,
                'nepali_name' => 'खडक नगरपालिका',
                'english_name' => 'Khadak Municipality',
                'created_at' => '2022-03-27 08:34:20',
                'updated_at' => '2022-03-27 08:34:20',
            ),
            245 => 
            array (
                'id' => 246,
                'district_id' => 21,
                'nepali_name' => 'शम्भुनाथ नगरपालिका',
                'english_name' => 'Shambhunath Municipality',
                'created_at' => '2022-03-27 08:34:20',
                'updated_at' => '2022-03-27 08:34:20',
            ),
            246 => 
            array (
                'id' => 247,
                'district_id' => 21,
                'nepali_name' => 'सप्तकोशी नगरपालिका',
                'english_name' => 'Saptakoshi Municipality',
                'created_at' => '2022-03-27 08:34:21',
                'updated_at' => '2022-03-27 08:34:21',
            ),
            247 => 
            array (
                'id' => 248,
                'district_id' => 21,
                'nepali_name' => 'सुरुङ्‍गा नगरपालिका',
                'english_name' => 'Surunga Municipality',
                'created_at' => '2022-03-27 08:34:21',
                'updated_at' => '2022-03-27 08:34:21',
            ),
            248 => 
            array (
                'id' => 249,
                'district_id' => 21,
                'nepali_name' => 'राजविराज नगरपालिका',
                'english_name' => 'Rajbiraj Municipality',
                'created_at' => '2022-03-27 08:34:21',
                'updated_at' => '2022-03-27 08:34:21',
            ),
            249 => 
            array (
                'id' => 250,
                'district_id' => 21,
                'nepali_name' => 'अग्निसाइर कृष्णासरवन गाउँपालिका',
                'english_name' => 'Agnisaira Krishnasavaran Rural Municipality',
                'created_at' => '2022-03-27 08:34:22',
                'updated_at' => '2022-03-27 08:34:22',
            ),
            250 => 
            array (
                'id' => 251,
                'district_id' => 21,
                'nepali_name' => 'बलान-बिहुल गाउँपालिका',
                'english_name' => 'Balan-Bihul Rural Municipality',
                'created_at' => '2022-03-27 08:34:22',
                'updated_at' => '2022-03-27 08:34:22',
            ),
            251 => 
            array (
                'id' => 252,
                'district_id' => 21,
                'nepali_name' => 'राजगढ गाउँपालिका',
                'english_name' => 'Rajgadh Rural Municipality',
                'created_at' => '2022-03-27 08:34:22',
                'updated_at' => '2022-03-27 08:34:22',
            ),
            252 => 
            array (
                'id' => 253,
                'district_id' => 21,
                'nepali_name' => 'बिष्णुपुर गाउँपालिका',
                'english_name' => 'Bishnupur Rural Municipality',
                'created_at' => '2022-03-27 08:34:22',
                'updated_at' => '2022-03-27 08:34:22',
            ),
            253 => 
            array (
                'id' => 254,
                'district_id' => 21,
                'nepali_name' => 'छिन्नमस्ता गाउँपालिका',
                'english_name' => 'Chhinnamasta Rural Municipality',
                'created_at' => '2022-03-27 08:34:23',
                'updated_at' => '2022-03-27 08:34:23',
            ),
            254 => 
            array (
                'id' => 255,
                'district_id' => 21,
                'nepali_name' => 'महादेवा गाउँपालिका',
                'english_name' => 'Mahadeva Rural Municipality',
                'created_at' => '2022-03-27 08:34:23',
                'updated_at' => '2022-03-27 08:34:23',
            ),
            255 => 
            array (
                'id' => 256,
                'district_id' => 21,
                'nepali_name' => 'रुपनी गाउँपालिका',
                'english_name' => 'Rupani Rural Municipality',
                'created_at' => '2022-03-27 08:34:24',
                'updated_at' => '2022-03-27 08:34:24',
            ),
            256 => 
            array (
                'id' => 257,
                'district_id' => 21,
                'nepali_name' => 'तिलाठी कोईलाडी गाउँपालिका',
                'english_name' => 'Tilathi Koiladi Rural Municipality',
                'created_at' => '2022-03-27 08:34:24',
                'updated_at' => '2022-03-27 08:34:24',
            ),
            257 => 
            array (
                'id' => 258,
                'district_id' => 21,
                'nepali_name' => 'तिरहुत गाउँपालिका',
                'english_name' => 'Tirhut Rural Municipality',
                'created_at' => '2022-03-27 08:34:24',
                'updated_at' => '2022-03-27 08:34:24',
            ),
            258 => 
            array (
                'id' => 259,
                'district_id' => 22,
                'nepali_name' => 'औरही नगरपालिका',
                'english_name' => 'Aaurahi Municipality',
                'created_at' => '2022-03-27 08:34:25',
                'updated_at' => '2022-03-27 08:34:25',
            ),
            259 => 
            array (
                'id' => 260,
                'district_id' => 22,
                'nepali_name' => 'बलवा नगरपालिका',
                'english_name' => 'Balawa Municipality',
                'created_at' => '2022-03-27 08:34:25',
                'updated_at' => '2022-03-27 08:34:25',
            ),
            260 => 
            array (
                'id' => 261,
                'district_id' => 22,
                'nepali_name' => 'बर्दिबास नगरपालिका',
                'english_name' => 'Bardibas Municipality',
                'created_at' => '2022-03-27 08:34:25',
                'updated_at' => '2022-03-27 08:34:25',
            ),
            261 => 
            array (
                'id' => 262,
                'district_id' => 22,
                'nepali_name' => 'भँगाहा नगरपालिका',
                'english_name' => 'Bhangaha Municipality',
                'created_at' => '2022-03-27 08:34:26',
                'updated_at' => '2022-03-27 08:34:26',
            ),
            262 => 
            array (
                'id' => 263,
                'district_id' => 22,
                'nepali_name' => 'गौशाला नगरपालिका',
                'english_name' => 'Gaushala Municipality',
                'created_at' => '2022-03-27 08:34:26',
                'updated_at' => '2022-03-27 08:34:26',
            ),
            263 => 
            array (
                'id' => 264,
                'district_id' => 22,
                'nepali_name' => 'जलेश्वर नगरपालिका',
                'english_name' => 'Jaleshor Municipality',
                'created_at' => '2022-03-27 08:34:26',
                'updated_at' => '2022-03-27 08:34:26',
            ),
            264 => 
            array (
                'id' => 265,
                'district_id' => 22,
                'nepali_name' => 'लोहरपट्टी नगरपालिका',
                'english_name' => 'Loharpatti Municipality',
                'created_at' => '2022-03-27 08:34:27',
                'updated_at' => '2022-03-27 08:34:27',
            ),
            265 => 
            array (
                'id' => 266,
                'district_id' => 22,
                'nepali_name' => 'मनरा शिसवा नगरपालिका',
                'english_name' => 'Manara Shiswa Municipality',
                'created_at' => '2022-03-27 08:34:27',
                'updated_at' => '2022-03-27 08:34:27',
            ),
            266 => 
            array (
                'id' => 267,
                'district_id' => 22,
                'nepali_name' => 'मटिहानी नगरपालिका',
                'english_name' => 'Matihani Municipality',
                'created_at' => '2022-03-27 08:34:27',
                'updated_at' => '2022-03-27 08:34:27',
            ),
            267 => 
            array (
                'id' => 268,
                'district_id' => 22,
                'nepali_name' => 'रामगोपालपुर नगरपालिका',
                'english_name' => 'Ramgopalpur Municipality',
                'created_at' => '2022-03-27 08:34:28',
                'updated_at' => '2022-03-27 08:34:28',
            ),
            268 => 
            array (
                'id' => 269,
                'district_id' => 22,
                'nepali_name' => 'एकडारा नगरपालिका',
                'english_name' => 'Ekdara Rural Municipality',
                'created_at' => '2022-03-27 08:34:28',
                'updated_at' => '2022-03-27 08:34:28',
            ),
            269 => 
            array (
                'id' => 270,
                'district_id' => 22,
                'nepali_name' => 'महोत्तरी गाउँपालिका',
                'english_name' => 'Mahottari Rural Municipality',
                'created_at' => '2022-03-27 08:34:28',
                'updated_at' => '2022-03-27 08:34:28',
            ),
            270 => 
            array (
                'id' => 271,
                'district_id' => 22,
                'nepali_name' => 'पिपरा गाउँपालिका',
                'english_name' => 'Pipara Rural Municipality',
                'created_at' => '2022-03-27 08:34:28',
                'updated_at' => '2022-03-27 08:34:28',
            ),
            271 => 
            array (
                'id' => 272,
                'district_id' => 22,
                'nepali_name' => 'साम्सी गाउँपालिका',
                'english_name' => 'Samsi Rural Municipality',
                'created_at' => '2022-03-27 08:34:29',
                'updated_at' => '2022-03-27 08:34:29',
            ),
            272 => 
            array (
                'id' => 273,
                'district_id' => 22,
                'nepali_name' => 'सोनमा गाउँपालिका',
                'english_name' => 'Sonama Rural Municipality',
                'created_at' => '2022-03-27 08:34:29',
                'updated_at' => '2022-03-27 08:34:29',
            ),
            273 => 
            array (
                'id' => 274,
                'district_id' => 23,
                'nepali_name' => 'भक्तपुर नगरपालिका',
                'english_name' => 'Bhaktapur Municipality',
                'created_at' => '2022-03-27 08:34:29',
                'updated_at' => '2022-03-27 08:34:29',
            ),
            274 => 
            array (
                'id' => 275,
                'district_id' => 23,
                'nepali_name' => 'चाँगुनारायण नगरपालिका',
                'english_name' => 'Changunarayan Municipality',
                'created_at' => '2022-03-27 08:34:30',
                'updated_at' => '2022-03-27 08:34:30',
            ),
            275 => 
            array (
                'id' => 276,
                'district_id' => 23,
                'nepali_name' => 'सूर्यविनायक नगरपालिका',
                'english_name' => 'Suryabinayak Municipality',
                'created_at' => '2022-03-27 08:34:30',
                'updated_at' => '2022-03-27 08:34:30',
            ),
            276 => 
            array (
                'id' => 277,
                'district_id' => 23,
                'nepali_name' => 'मध्यपुर थिमी नगरपालिका',
                'english_name' => 'Madhyapur Thimi Municipality',
                'created_at' => '2022-03-27 08:34:30',
                'updated_at' => '2022-03-27 08:34:30',
            ),
            277 => 
            array (
                'id' => 278,
                'district_id' => 24,
                'nepali_name' => 'भरतपुर महानगरपालिका',
                'english_name' => 'Bharatpur Metropolitan City',
                'created_at' => '2022-03-27 08:34:31',
                'updated_at' => '2022-03-27 08:34:31',
            ),
            278 => 
            array (
                'id' => 279,
                'district_id' => 24,
                'nepali_name' => 'कालिका नगरपालिका',
                'english_name' => 'Kalika Municipality',
                'created_at' => '2022-03-27 08:34:31',
                'updated_at' => '2022-03-27 08:34:31',
            ),
            279 => 
            array (
                'id' => 280,
                'district_id' => 24,
                'nepali_name' => 'खैरहनी नगरपालिका',
                'english_name' => 'Khairhani Municipality',
                'created_at' => '2022-03-27 08:34:31',
                'updated_at' => '2022-03-27 08:34:31',
            ),
            280 => 
            array (
                'id' => 281,
                'district_id' => 24,
                'nepali_name' => 'माडी नगरपालिका',
                'english_name' => 'Madi Municipality',
                'created_at' => '2022-03-27 08:34:32',
                'updated_at' => '2022-03-27 08:34:32',
            ),
            281 => 
            array (
                'id' => 282,
                'district_id' => 24,
                'nepali_name' => 'रत्ननगर नगरपालिका',
                'english_name' => 'Ratnagar Municipality',
                'created_at' => '2022-03-27 08:34:32',
                'updated_at' => '2022-03-27 08:34:32',
            ),
            282 => 
            array (
                'id' => 283,
                'district_id' => 24,
                'nepali_name' => 'राप्ती नगरपालिका',
                'english_name' => 'Rapti Municipality',
                'created_at' => '2022-03-27 08:34:32',
                'updated_at' => '2022-03-27 08:34:32',
            ),
            283 => 
            array (
                'id' => 284,
                'district_id' => 24,
                'nepali_name' => 'इच्छाकामना गाउँपालिका',
                'english_name' => 'Ichchhakamana Rural Municipality',
                'created_at' => '2022-03-27 08:34:33',
                'updated_at' => '2022-03-27 08:34:33',
            ),
            284 => 
            array (
                'id' => 285,
                'district_id' => 25,
                'nepali_name' => 'धुनीबेंशी नगरपालिका',
                'english_name' => 'Dhunibeshi Municipality',
                'created_at' => '2022-03-27 08:34:33',
                'updated_at' => '2022-03-27 08:34:33',
            ),
            285 => 
            array (
                'id' => 286,
                'district_id' => 25,
                'nepali_name' => 'निलकण्ठ नगरपालिका',
                'english_name' => 'Nilkantha Municipality',
                'created_at' => '2022-03-27 08:34:33',
                'updated_at' => '2022-03-27 08:34:33',
            ),
            286 => 
            array (
                'id' => 287,
                'district_id' => 25,
                'nepali_name' => 'खनियाबास गाउँपालिका',
                'english_name' => 'Khaniyabas Rural Municipality',
                'created_at' => '2022-03-27 08:34:34',
                'updated_at' => '2022-03-27 08:34:34',
            ),
            287 => 
            array (
                'id' => 288,
                'district_id' => 25,
                'nepali_name' => 'गजुरी गाउँपालिका',
                'english_name' => 'Gajuri Rural Municipality',
                'created_at' => '2022-03-27 08:34:34',
                'updated_at' => '2022-03-27 08:34:34',
            ),
            288 => 
            array (
                'id' => 289,
                'district_id' => 25,
                'nepali_name' => 'गल्छी गाउँपालिका',
                'english_name' => 'Galchhi Rural Municipality',
                'created_at' => '2022-03-27 08:34:34',
                'updated_at' => '2022-03-27 08:34:34',
            ),
            289 => 
            array (
                'id' => 290,
                'district_id' => 25,
                'nepali_name' => 'गङ्गाजमुना गाउँपालिका',
                'english_name' => 'Gangajamuna Rural Municipality',
                'created_at' => '2022-03-27 08:34:35',
                'updated_at' => '2022-03-27 08:34:35',
            ),
            290 => 
            array (
                'id' => 291,
                'district_id' => 25,
                'nepali_name' => 'ज्वालामूखी गाउँपालिका',
                'english_name' => 'Jwalamukhi Rural Municipality',
                'created_at' => '2022-03-27 08:34:35',
                'updated_at' => '2022-03-27 08:34:35',
            ),
            291 => 
            array (
                'id' => 292,
                'district_id' => 25,
                'nepali_name' => 'थाक्रे गाउँपालिका',
                'english_name' => 'Thakre Rural Municipality',
                'created_at' => '2022-03-27 08:34:35',
                'updated_at' => '2022-03-27 08:34:35',
            ),
            292 => 
            array (
                'id' => 293,
                'district_id' => 25,
                'nepali_name' => 'नेत्रावती डबजोङ गाउँपालिका',
                'english_name' => 'Netrawati Dabjong Rural Municipality',
                'created_at' => '2022-03-27 08:34:35',
                'updated_at' => '2022-03-27 08:34:35',
            ),
            293 => 
            array (
                'id' => 294,
                'district_id' => 25,
                'nepali_name' => 'बेनीघाट रोराङ्ग गाउँपालिका',
                'english_name' => 'Benighat Rorang Rural Municipality',
                'created_at' => '2022-03-27 08:34:36',
                'updated_at' => '2022-03-27 08:34:36',
            ),
            294 => 
            array (
                'id' => 295,
                'district_id' => 25,
                'nepali_name' => 'रुवी भ्याली गाउँपालिका',
                'english_name' => 'Rubi Valley Rural Municipality',
                'created_at' => '2022-03-27 08:34:36',
                'updated_at' => '2022-03-27 08:34:36',
            ),
            295 => 
            array (
                'id' => 296,
                'district_id' => 25,
                'nepali_name' => 'सिद्धलेक गाउँपालिका',
                'english_name' => 'Siddhalek Rural Municipality',
                'created_at' => '2022-03-27 08:34:36',
                'updated_at' => '2022-03-27 08:34:36',
            ),
            296 => 
            array (
                'id' => 297,
                'district_id' => 25,
                'nepali_name' => 'त्रिपुरासुन्दरी गाउँपालिका',
                'english_name' => 'Tripurasundari Rural Municipality',
                'created_at' => '2022-03-27 08:34:36',
                'updated_at' => '2022-03-27 08:34:36',
            ),
            297 => 
            array (
                'id' => 298,
                'district_id' => 26,
                'nepali_name' => 'भिमेश्वर नगरपालिका',
                'english_name' => 'Bhimeswor Municipality',
                'created_at' => '2022-03-27 08:34:36',
                'updated_at' => '2022-03-27 08:34:36',
            ),
            298 => 
            array (
                'id' => 299,
                'district_id' => 26,
                'nepali_name' => 'जिरी नगरपालिका',
                'english_name' => 'Jiri Municipality',
                'created_at' => '2022-03-27 08:34:37',
                'updated_at' => '2022-03-27 08:34:37',
            ),
            299 => 
            array (
                'id' => 300,
                'district_id' => 26,
                'nepali_name' => 'कालिन्चोक गाउँपालिका',
                'english_name' => 'Kalinchok Rural Municipality',
                'created_at' => '2022-03-27 08:34:37',
                'updated_at' => '2022-03-27 08:34:37',
            ),
            300 => 
            array (
                'id' => 301,
                'district_id' => 26,
                'nepali_name' => 'मेलुङ्ग गाउँपालिका',
                'english_name' => 'Melung Rural Municipality',
                'created_at' => '2022-03-27 08:34:38',
                'updated_at' => '2022-03-27 08:34:38',
            ),
            301 => 
            array (
                'id' => 302,
                'district_id' => 26,
                'nepali_name' => 'विगु गाउँपालिका',
                'english_name' => 'Bigu Rural Municipality',
                'created_at' => '2022-03-27 08:34:38',
                'updated_at' => '2022-03-27 08:34:38',
            ),
            302 => 
            array (
                'id' => 303,
                'district_id' => 26,
                'nepali_name' => 'गौरीशङ्कर गाउँपालिका',
                'english_name' => 'Gaurishankar Rural Municipality',
                'created_at' => '2022-03-27 08:34:38',
                'updated_at' => '2022-03-27 08:34:38',
            ),
            303 => 
            array (
                'id' => 304,
                'district_id' => 26,
                'nepali_name' => 'वैतेश्वर गाउँपालिका',
                'english_name' => 'Baiteshowr Rural Municipality',
                'created_at' => '2022-03-27 08:34:39',
                'updated_at' => '2022-03-27 08:34:39',
            ),
            304 => 
            array (
                'id' => 305,
                'district_id' => 26,
                'nepali_name' => 'शैलुङ्ग गाउँपालिका',
                'english_name' => 'Sailung Rural Municipality',
                'created_at' => '2022-03-27 08:34:39',
                'updated_at' => '2022-03-27 08:34:39',
            ),
            305 => 
            array (
                'id' => 306,
                'district_id' => 26,
                'nepali_name' => 'तामाकोशी गाउँपालिका',
                'english_name' => 'Tamakoshi Rural Municipality',
                'created_at' => '2022-03-27 08:34:39',
                'updated_at' => '2022-03-27 08:34:39',
            ),
            306 => 
            array (
                'id' => 307,
                'district_id' => 27,
                'nepali_name' => 'काठमाण्डौं महानगरपालिका',
                'english_name' => 'Kathmandu Metropolitan City',
                'created_at' => '2022-03-27 08:34:40',
                'updated_at' => '2022-03-27 08:34:40',
            ),
            307 => 
            array (
                'id' => 308,
                'district_id' => 27,
                'nepali_name' => 'गोकर्णेश्वर नगरपालिका',
                'english_name' => 'Gokarneshwar Municipality',
                'created_at' => '2022-03-27 08:34:40',
                'updated_at' => '2022-03-27 08:34:40',
            ),
            308 => 
            array (
                'id' => 309,
                'district_id' => 27,
                'nepali_name' => 'कीर्तिपुर नगरपालिका',
                'english_name' => 'Kirtipur Municipality',
                'created_at' => '2022-03-27 08:34:40',
                'updated_at' => '2022-03-27 08:34:40',
            ),
            309 => 
            array (
                'id' => 310,
                'district_id' => 27,
                'nepali_name' => 'कागेश्वरी मनोहरा नगरपालिका',
                'english_name' => 'Kageshwari-Manohara Municipality',
                'created_at' => '2022-03-27 08:34:41',
                'updated_at' => '2022-03-27 08:34:41',
            ),
            310 => 
            array (
                'id' => 311,
                'district_id' => 27,
                'nepali_name' => 'चन्द्रागिरी नगरपालिका',
                'english_name' => 'Chandragiri Municipality',
                'created_at' => '2022-03-27 08:34:41',
                'updated_at' => '2022-03-27 08:34:41',
            ),
            311 => 
            array (
                'id' => 312,
                'district_id' => 27,
                'nepali_name' => 'टोखा नगरपालिका',
                'english_name' => 'Tokha Municipality',
                'created_at' => '2022-03-27 08:34:42',
                'updated_at' => '2022-03-27 08:34:42',
            ),
            312 => 
            array (
                'id' => 313,
                'district_id' => 27,
                'nepali_name' => 'तारकेश्वर नगरपालिका',
                'english_name' => 'Tarakeshwar Municipality',
                'created_at' => '2022-03-27 08:34:42',
                'updated_at' => '2022-03-27 08:34:42',
            ),
            313 => 
            array (
                'id' => 314,
                'district_id' => 27,
                'nepali_name' => 'दक्षिणकाली नगरपालिका',
                'english_name' => 'Dakshinkali Municipality',
                'created_at' => '2022-03-27 08:34:42',
                'updated_at' => '2022-03-27 08:34:42',
            ),
            314 => 
            array (
                'id' => 315,
                'district_id' => 27,
                'nepali_name' => 'नागार्जुन नगरपालिका',
                'english_name' => 'Nagarjun Municipality',
                'created_at' => '2022-03-27 08:34:42',
                'updated_at' => '2022-03-27 08:34:42',
            ),
            315 => 
            array (
                'id' => 316,
                'district_id' => 27,
                'nepali_name' => 'बुढानिलकण्ठ नगरपालिका',
                'english_name' => 'Budhalikantha Municipality',
                'created_at' => '2022-03-27 08:34:43',
                'updated_at' => '2022-03-27 08:34:43',
            ),
            316 => 
            array (
                'id' => 317,
                'district_id' => 27,
                'nepali_name' => 'शङ्खरापुर नगरपालिका',
                'english_name' => 'Shankharapur Municipality',
                'created_at' => '2022-03-27 08:34:43',
                'updated_at' => '2022-03-27 08:34:43',
            ),
            317 => 
            array (
                'id' => 318,
                'district_id' => 28,
                'nepali_name' => 'धुलिखेल नगरपालिका',
                'english_name' => 'Dhulikhel Municipality',
                'created_at' => '2022-03-27 08:34:43',
                'updated_at' => '2022-03-27 08:34:43',
            ),
            318 => 
            array (
                'id' => 319,
                'district_id' => 28,
                'nepali_name' => 'नमोबुद्ध नगरपालिका',
                'english_name' => 'Namobuddha Municipality',
                'created_at' => '2022-03-27 08:34:44',
                'updated_at' => '2022-03-27 08:34:44',
            ),
            319 => 
            array (
                'id' => 320,
                'district_id' => 28,
                'nepali_name' => 'पनौती नगरपालिका',
                'english_name' => 'Panauti Municipality',
                'created_at' => '2022-03-27 08:34:44',
                'updated_at' => '2022-03-27 08:34:44',
            ),
            320 => 
            array (
                'id' => 321,
                'district_id' => 28,
                'nepali_name' => 'पाँचखाल नगरपालिका',
                'english_name' => 'Panchkhal Municipality',
                'created_at' => '2022-03-27 08:34:44',
                'updated_at' => '2022-03-27 08:34:44',
            ),
            321 => 
            array (
                'id' => 322,
                'district_id' => 28,
                'nepali_name' => 'बनेपा नगरपालिका',
                'english_name' => 'Banepa Municipality',
                'created_at' => '2022-03-27 08:34:45',
                'updated_at' => '2022-03-27 08:34:45',
            ),
            322 => 
            array (
                'id' => 323,
                'district_id' => 28,
                'nepali_name' => 'मण्डनदेउपुर नगरपालिका',
                'english_name' => 'Mandandeupur Municipality',
                'created_at' => '2022-03-27 08:34:45',
                'updated_at' => '2022-03-27 08:34:45',
            ),
            323 => 
            array (
                'id' => 324,
                'district_id' => 28,
                'nepali_name' => 'खानीखोला गाउँपालिका',
                'english_name' => 'Khani Khola Rural Municipality',
                'created_at' => '2022-03-27 08:34:46',
                'updated_at' => '2022-03-27 08:34:46',
            ),
            324 => 
            array (
                'id' => 325,
                'district_id' => 28,
                'nepali_name' => 'चौंरीदेउराली गाउँपालिका',
                'english_name' => 'Chauri Deurali Rural Municipality',
                'created_at' => '2022-03-27 08:34:46',
                'updated_at' => '2022-03-27 08:34:46',
            ),
            325 => 
            array (
                'id' => 326,
                'district_id' => 28,
                'nepali_name' => 'तेमाल गाउँपालिका',
                'english_name' => 'Temal Rural Municipality',
                'created_at' => '2022-03-27 08:34:46',
                'updated_at' => '2022-03-27 08:34:46',
            ),
            326 => 
            array (
                'id' => 327,
                'district_id' => 28,
                'nepali_name' => 'बेथानचोक गाउँपालिका',
                'english_name' => 'Bethanchok Rural Municipality',
                'created_at' => '2022-03-27 08:34:46',
                'updated_at' => '2022-03-27 08:34:46',
            ),
            327 => 
            array (
                'id' => 328,
                'district_id' => 28,
                'nepali_name' => 'भुम्लु गाउँपालिका',
                'english_name' => 'Bhumlu Rural Municipality',
                'created_at' => '2022-03-27 08:34:47',
                'updated_at' => '2022-03-27 08:34:47',
            ),
            328 => 
            array (
                'id' => 329,
                'district_id' => 28,
                'nepali_name' => 'महाभारत गाउँपालिका',
                'english_name' => 'Mahabharat Rural Municipality',
                'created_at' => '2022-03-27 08:34:47',
                'updated_at' => '2022-03-27 08:34:47',
            ),
            329 => 
            array (
                'id' => 330,
                'district_id' => 28,
                'nepali_name' => 'रोशी गाउँपालिका',
                'english_name' => 'Roshi Rural Municipality',
                'created_at' => '2022-03-27 08:34:47',
                'updated_at' => '2022-03-27 08:34:47',
            ),
            330 => 
            array (
                'id' => 331,
                'district_id' => 29,
                'nepali_name' => 'ललितपुर महानगरपालिका',
                'english_name' => 'Lalitpur Metropolitan City',
                'created_at' => '2022-03-27 08:34:48',
                'updated_at' => '2022-03-27 08:34:48',
            ),
            331 => 
            array (
                'id' => 332,
                'district_id' => 29,
                'nepali_name' => 'महालक्ष्मी नगरपालिका',
                'english_name' => 'Mahalaxmi Municipality',
                'created_at' => '2022-03-27 08:34:48',
                'updated_at' => '2022-03-27 08:34:48',
            ),
            332 => 
            array (
                'id' => 333,
                'district_id' => 29,
                'nepali_name' => 'गोदावरी नगरपालिका',
                'english_name' => 'Godawari Municipality',
                'created_at' => '2022-03-27 08:34:49',
                'updated_at' => '2022-03-27 08:34:49',
            ),
            333 => 
            array (
                'id' => 334,
                'district_id' => 29,
                'nepali_name' => 'कोन्ज्योसोम गाउँपालिका',
                'english_name' => 'Konjyosom Rural Municipality',
                'created_at' => '2022-03-27 08:34:49',
                'updated_at' => '2022-03-27 08:34:49',
            ),
            334 => 
            array (
                'id' => 335,
                'district_id' => 29,
                'nepali_name' => 'बागमती गाउँपालिका',
                'english_name' => 'Bagmati Rural Municipality',
                'created_at' => '2022-03-27 08:34:49',
                'updated_at' => '2022-03-27 08:34:49',
            ),
            335 => 
            array (
                'id' => 336,
                'district_id' => 29,
                'nepali_name' => 'महाङ्काल गाउँपालिका',
                'english_name' => 'Mahankal Rural Municipality',
                'created_at' => '2022-03-27 08:34:50',
                'updated_at' => '2022-03-27 08:34:50',
            ),
            336 => 
            array (
                'id' => 337,
                'district_id' => 30,
                'nepali_name' => 'हेटौडा उपमहानगरपालिका',
                'english_name' => 'Hetauda Sub-Metropolitan City',
                'created_at' => '2022-03-27 08:34:50',
                'updated_at' => '2022-03-27 08:34:50',
            ),
            337 => 
            array (
                'id' => 338,
                'district_id' => 30,
                'nepali_name' => 'थाहा नगरपालिका',
                'english_name' => 'Thaha Municipality',
                'created_at' => '2022-03-27 08:34:50',
                'updated_at' => '2022-03-27 08:34:50',
            ),
            338 => 
            array (
                'id' => 339,
                'district_id' => 30,
                'nepali_name' => 'भिमफेदी गाउँपालिका',
                'english_name' => 'Bhimphedi Rural Municipality',
                'created_at' => '2022-03-27 08:34:51',
                'updated_at' => '2022-03-27 08:34:51',
            ),
            339 => 
            array (
                'id' => 340,
                'district_id' => 30,
                'nepali_name' => 'मकवानपुरगढी गाउँपालिका',
                'english_name' => 'Makawanpurgadhi Rural Municipality',
                'created_at' => '2022-03-27 08:34:51',
                'updated_at' => '2022-03-27 08:34:51',
            ),
            340 => 
            array (
                'id' => 341,
                'district_id' => 30,
                'nepali_name' => 'मनहरी गाउँपालिका',
                'english_name' => 'Manahari Rural Municipality',
                'created_at' => '2022-03-27 08:34:51',
                'updated_at' => '2022-03-27 08:34:51',
            ),
            341 => 
            array (
                'id' => 342,
                'district_id' => 30,
                'nepali_name' => 'राक्सिराङ्ग गाउँपालिका',
                'english_name' => 'Raksirang Rural Municipality',
                'created_at' => '2022-03-27 08:34:51',
                'updated_at' => '2022-03-27 08:34:51',
            ),
            342 => 
            array (
                'id' => 343,
                'district_id' => 30,
                'nepali_name' => 'बकैया गाउँपालिका',
                'english_name' => 'Bakaiya Rural Municipality',
                'created_at' => '2022-03-27 08:34:52',
                'updated_at' => '2022-03-27 08:34:52',
            ),
            343 => 
            array (
                'id' => 344,
                'district_id' => 30,
                'nepali_name' => 'बाग्मति गाउँपालिका',
                'english_name' => 'Bagmati Rural Municipality',
                'created_at' => '2022-03-27 08:34:52',
                'updated_at' => '2022-03-27 08:34:52',
            ),
            344 => 
            array (
                'id' => 345,
                'district_id' => 30,
                'nepali_name' => 'कैलाश गाउँपालिका',
                'english_name' => 'Kailash Rural Municipality',
                'created_at' => '2022-03-27 08:34:53',
                'updated_at' => '2022-03-27 08:34:53',
            ),
            345 => 
            array (
                'id' => 346,
                'district_id' => 30,
                'nepali_name' => 'इन्द्रसरोबर गाउँपालिका',
                'english_name' => 'Indrasarowar Rural Municipality',
                'created_at' => '2022-03-27 08:34:53',
                'updated_at' => '2022-03-27 08:34:53',
            ),
            346 => 
            array (
                'id' => 347,
                'district_id' => 31,
                'nepali_name' => 'विदुर नगरपालिका',
                'english_name' => 'Bidur Municipality',
                'created_at' => '2022-03-27 08:34:53',
                'updated_at' => '2022-03-27 08:34:53',
            ),
            347 => 
            array (
                'id' => 348,
                'district_id' => 31,
                'nepali_name' => 'बेलकोटगढी नगरपालिका',
                'english_name' => 'Belkotgadhi Municipality',
                'created_at' => '2022-03-27 08:34:53',
                'updated_at' => '2022-03-27 08:34:53',
            ),
            348 => 
            array (
                'id' => 349,
                'district_id' => 31,
                'nepali_name' => 'ककनी गाउँपालिका',
                'english_name' => 'Kakani Rural Municipality',
                'created_at' => '2022-03-27 08:34:54',
                'updated_at' => '2022-03-27 08:34:54',
            ),
            349 => 
            array (
                'id' => 350,
                'district_id' => 31,
                'nepali_name' => 'पञ्चकन्या गाउँपालिका',
                'english_name' => 'Panchakanya Rural Municipality',
                'created_at' => '2022-03-27 08:34:54',
                'updated_at' => '2022-03-27 08:34:54',
            ),
            350 => 
            array (
                'id' => 351,
                'district_id' => 31,
                'nepali_name' => 'लिखु गाउँपालिका',
                'english_name' => 'Likhu Rural Municipality',
                'created_at' => '2022-03-27 08:34:55',
                'updated_at' => '2022-03-27 08:34:55',
            ),
            351 => 
            array (
                'id' => 352,
                'district_id' => 31,
                'nepali_name' => 'दुप्चेश्वर गाउँपालिका',
                'english_name' => 'Dupcheshwar Rural Municipality',
                'created_at' => '2022-03-27 08:34:55',
                'updated_at' => '2022-03-27 08:34:55',
            ),
            352 => 
            array (
                'id' => 353,
                'district_id' => 31,
                'nepali_name' => 'शिवपुरी गाउँपालिका',
                'english_name' => 'Shivapuri Rural Municipality',
                'created_at' => '2022-03-27 08:34:55',
                'updated_at' => '2022-03-27 08:34:55',
            ),
            353 => 
            array (
                'id' => 354,
                'district_id' => 31,
                'nepali_name' => 'तादी गाउँपालिका',
                'english_name' => 'Tadi Rural Municipality',
                'created_at' => '2022-03-27 08:34:56',
                'updated_at' => '2022-03-27 08:34:56',
            ),
            354 => 
            array (
                'id' => 355,
                'district_id' => 31,
                'nepali_name' => 'सुर्यगढी गाउँपालिका',
                'english_name' => 'Suryagadhi Rural Municipality',
                'created_at' => '2022-03-27 08:34:56',
                'updated_at' => '2022-03-27 08:34:56',
            ),
            355 => 
            array (
                'id' => 356,
                'district_id' => 31,
                'nepali_name' => 'तारकेश्वर गाउँपालिका',
                'english_name' => 'Tarkeshwar Rural Municipality',
                'created_at' => '2022-03-27 08:34:56',
                'updated_at' => '2022-03-27 08:34:56',
            ),
            356 => 
            array (
                'id' => 357,
                'district_id' => 31,
                'nepali_name' => 'किस्पाङ गाउँपालिका',
                'english_name' => 'Kispang Rural Municipality',
                'created_at' => '2022-03-27 08:34:56',
                'updated_at' => '2022-03-27 08:34:56',
            ),
            357 => 
            array (
                'id' => 358,
                'district_id' => 31,
                'nepali_name' => 'म्यगङ गाउँपालिका',
                'english_name' => 'Myagang Rural Municipality',
                'created_at' => '2022-03-27 08:34:57',
                'updated_at' => '2022-03-27 08:34:57',
            ),
            358 => 
            array (
                'id' => 359,
                'district_id' => 32,
                'nepali_name' => 'मन्थली नगरपालिका',
                'english_name' => 'Manthali Municipality',
                'created_at' => '2022-03-27 08:34:57',
                'updated_at' => '2022-03-27 08:34:57',
            ),
            359 => 
            array (
                'id' => 360,
                'district_id' => 32,
                'nepali_name' => 'रामेछाप नगरपालिका',
                'english_name' => 'Ramechhap Municipality',
                'created_at' => '2022-03-27 08:34:58',
                'updated_at' => '2022-03-27 08:34:58',
            ),
            360 => 
            array (
                'id' => 361,
                'district_id' => 32,
                'nepali_name' => 'उमाकुण्ड गाउँपालिका',
                'english_name' => 'Umakunda Rural Municipality',
                'created_at' => '2022-03-27 08:34:58',
                'updated_at' => '2022-03-27 08:34:58',
            ),
            361 => 
            array (
                'id' => 362,
                'district_id' => 32,
                'nepali_name' => 'खाँडादेवी गाउँपालिका',
                'english_name' => 'Khandadevi Rural Municipality',
                'created_at' => '2022-03-27 08:34:59',
                'updated_at' => '2022-03-27 08:34:59',
            ),
            362 => 
            array (
                'id' => 363,
                'district_id' => 32,
                'nepali_name' => 'दोरम्बा गाउँपालिका',
                'english_name' => 'Doramba Rural Municipality',
                'created_at' => '2022-03-27 08:34:59',
                'updated_at' => '2022-03-27 08:34:59',
            ),
            363 => 
            array (
                'id' => 364,
                'district_id' => 32,
                'nepali_name' => 'गोकुलगङ्गा गाउँपालिका',
                'english_name' => 'Gokulganga Rural Municipality',
                'created_at' => '2022-03-27 08:34:59',
                'updated_at' => '2022-03-27 08:34:59',
            ),
            364 => 
            array (
                'id' => 365,
                'district_id' => 32,
                'nepali_name' => 'लिखु तामाकोशी गाउँपालिका',
                'english_name' => 'LikhuTamakoshi Rural Municipality',
                'created_at' => '2022-03-27 08:35:00',
                'updated_at' => '2022-03-27 08:35:00',
            ),
            365 => 
            array (
                'id' => 366,
                'district_id' => 32,
                'nepali_name' => 'सुनापती गाउँपालिका',
                'english_name' => 'Sunapati Rural Municipality',
                'created_at' => '2022-03-27 08:35:00',
                'updated_at' => '2022-03-27 08:35:00',
            ),
            366 => 
            array (
                'id' => 367,
                'district_id' => 33,
                'nepali_name' => 'कालिका गाउँपालिका',
                'english_name' => 'Kalika Rural Municipality',
                'created_at' => '2022-03-27 08:35:01',
                'updated_at' => '2022-03-27 08:35:01',
            ),
            367 => 
            array (
                'id' => 368,
                'district_id' => 33,
                'nepali_name' => 'गोसाईकुण्ड गाउँपालिका',
                'english_name' => 'Gosaikunda Rural Municipality',
                'created_at' => '2022-03-27 08:35:01',
                'updated_at' => '2022-03-27 08:35:01',
            ),
            368 => 
            array (
                'id' => 369,
                'district_id' => 33,
                'nepali_name' => 'नौकुण्ड गाउँपालिका',
                'english_name' => 'Naukunda Rural Municipality',
                'created_at' => '2022-03-27 08:35:02',
                'updated_at' => '2022-03-27 08:35:02',
            ),
            369 => 
            array (
                'id' => 370,
                'district_id' => 33,
                'nepali_name' => 'आमाछोदिङमो गाउँपालिका',
                'english_name' => 'Amachhoding Rural Municipality',
                'created_at' => '2022-03-27 08:35:02',
                'updated_at' => '2022-03-27 08:35:02',
            ),
            370 => 
            array (
                'id' => 371,
                'district_id' => 33,
                'nepali_name' => 'उत्तरगया गाउँपालिका',
                'english_name' => 'Uttargaya Rural Municipality',
                'created_at' => '2022-03-27 08:35:03',
                'updated_at' => '2022-03-27 08:35:03',
            ),
            371 => 
            array (
                'id' => 372,
                'district_id' => 34,
                'nepali_name' => 'कमलामाई नगरपालिका',
                'english_name' => 'Kamalamai Municipality',
                'created_at' => '2022-03-27 08:35:03',
                'updated_at' => '2022-03-27 08:35:03',
            ),
            372 => 
            array (
                'id' => 373,
                'district_id' => 34,
                'nepali_name' => 'दुधौली नगरपालिका',
                'english_name' => 'Dudhauli Municipality',
                'created_at' => '2022-03-27 08:35:03',
                'updated_at' => '2022-03-27 08:35:03',
            ),
            373 => 
            array (
                'id' => 374,
                'district_id' => 34,
                'nepali_name' => 'सुनकोशी',
                'english_name' => 'Sunkoshi Rural Municipality',
                'created_at' => '2022-03-27 08:35:04',
                'updated_at' => '2022-03-27 08:35:04',
            ),
            374 => 
            array (
                'id' => 375,
                'district_id' => 34,
                'nepali_name' => 'हरिहरपुरगढी गाउँपालिका',
                'english_name' => 'Hariharpurgadhi Rural Municipality',
                'created_at' => '2022-03-27 08:35:05',
                'updated_at' => '2022-03-27 08:35:05',
            ),
            375 => 
            array (
                'id' => 376,
                'district_id' => 34,
                'nepali_name' => 'तीनपाटन गाउँपालिका',
                'english_name' => 'Tinpatan Rural Municipality',
                'created_at' => '2022-03-27 08:35:05',
                'updated_at' => '2022-03-27 08:35:05',
            ),
            376 => 
            array (
                'id' => 377,
                'district_id' => 34,
                'nepali_name' => 'मरिण गाउँपालिका',
                'english_name' => 'Marin Rural Municipality',
                'created_at' => '2022-03-27 08:35:05',
                'updated_at' => '2022-03-27 08:35:05',
            ),
            377 => 
            array (
                'id' => 378,
                'district_id' => 34,
                'nepali_name' => 'गोलन्जर गाउँपालिका',
                'english_name' => 'Golanjor Rural Municipality',
                'created_at' => '2022-03-27 08:35:06',
                'updated_at' => '2022-03-27 08:35:06',
            ),
            378 => 
            array (
                'id' => 379,
                'district_id' => 34,
                'nepali_name' => 'फिक्कल गाउँपालिका',
                'english_name' => 'Phikkal Rural Municipality',
                'created_at' => '2022-03-27 08:35:06',
                'updated_at' => '2022-03-27 08:35:06',
            ),
            379 => 
            array (
                'id' => 380,
                'district_id' => 34,
                'nepali_name' => 'घ्याङलेख गाउँपालिका',
                'english_name' => 'Ghyanglekh Rural Municipality',
                'created_at' => '2022-03-27 08:35:06',
                'updated_at' => '2022-03-27 08:35:06',
            ),
            380 => 
            array (
                'id' => 381,
                'district_id' => 35,
                'nepali_name' => 'चौतारा साँगाचोकगढी नगरपालिका',
                'english_name' => 'Chautara Sangachowkgadi Municipality',
                'created_at' => '2022-03-27 08:35:07',
                'updated_at' => '2022-03-27 08:35:07',
            ),
            381 => 
            array (
                'id' => 382,
                'district_id' => 35,
                'nepali_name' => 'बाह्रविसे नगरपालिका',
                'english_name' => 'Bahrabise Municipality',
                'created_at' => '2022-03-27 08:35:07',
                'updated_at' => '2022-03-27 08:35:07',
            ),
            382 => 
            array (
                'id' => 383,
                'district_id' => 35,
                'nepali_name' => 'मेलम्ची नगरपालिका',
                'english_name' => 'Melamchi Municipality',
                'created_at' => '2022-03-27 08:35:07',
                'updated_at' => '2022-03-27 08:35:07',
            ),
            383 => 
            array (
                'id' => 384,
                'district_id' => 35,
                'nepali_name' => 'बलेफी गाउँपालिका',
                'english_name' => 'Balephi Rural Municipality',
                'created_at' => '2022-03-27 08:35:08',
                'updated_at' => '2022-03-27 08:35:08',
            ),
            384 => 
            array (
                'id' => 385,
                'district_id' => 35,
                'nepali_name' => 'सुनकोशी गाउँपालिका',
                'english_name' => 'Sunkoshi Rural Municipality',
                'created_at' => '2022-03-27 08:35:08',
                'updated_at' => '2022-03-27 08:35:08',
            ),
            385 => 
            array (
                'id' => 386,
                'district_id' => 35,
                'nepali_name' => 'ईन्द्रावती गाउँपालिका',
                'english_name' => 'Indrawati Rural Municipality',
                'created_at' => '2022-03-27 08:35:08',
                'updated_at' => '2022-03-27 08:35:08',
            ),
            386 => 
            array (
                'id' => 387,
                'district_id' => 35,
                'nepali_name' => 'जुगल गाउँपालिका',
                'english_name' => 'Jugal Rural Municipality',
                'created_at' => '2022-03-27 08:35:09',
                'updated_at' => '2022-03-27 08:35:09',
            ),
            387 => 
            array (
                'id' => 388,
                'district_id' => 35,
                'nepali_name' => 'पाँचपोखरी थाङपाल गाउँपालिका',
                'english_name' => 'Panchpokhari Rural Municipality',
                'created_at' => '2022-03-27 08:35:09',
                'updated_at' => '2022-03-27 08:35:09',
            ),
            388 => 
            array (
                'id' => 389,
                'district_id' => 35,
                'nepali_name' => 'भोटेकोशी गाउँपालिका',
                'english_name' => 'Bhotekoshi Rural Municipality',
                'created_at' => '2022-03-27 08:35:09',
                'updated_at' => '2022-03-27 08:35:09',
            ),
            389 => 
            array (
                'id' => 390,
                'district_id' => 35,
                'nepali_name' => 'लिसङ्खु पाखर गाउँपालिका',
                'english_name' => 'Lisankhu Rural Municipality',
                'created_at' => '2022-03-27 08:35:10',
                'updated_at' => '2022-03-27 08:35:10',
            ),
            390 => 
            array (
                'id' => 391,
                'district_id' => 35,
                'nepali_name' => 'हेलम्बु गाउँपालिका',
                'english_name' => 'Helambu Rural Municipality',
                'created_at' => '2022-03-27 08:35:10',
                'updated_at' => '2022-03-27 08:35:10',
            ),
            391 => 
            array (
                'id' => 392,
                'district_id' => 35,
                'nepali_name' => 'त्रिपुरासुन्दरी गाउँपालिका',
                'english_name' => 'Tripurasundari Rural Municipality',
                'created_at' => '2022-03-27 08:35:11',
                'updated_at' => '2022-03-27 08:35:11',
            ),
            392 => 
            array (
                'id' => 393,
                'district_id' => 36,
                'nepali_name' => 'बागलुङ नगरपालिका',
                'english_name' => 'Baglung Municipality',
                'created_at' => '2022-03-27 08:35:11',
                'updated_at' => '2022-03-27 08:35:11',
            ),
            393 => 
            array (
                'id' => 394,
                'district_id' => 36,
                'nepali_name' => 'ढोरपाटन नगरपालिका',
                'english_name' => 'Dhorpatan Municipality',
                'created_at' => '2022-03-27 08:35:12',
                'updated_at' => '2022-03-27 08:35:12',
            ),
            394 => 
            array (
                'id' => 395,
                'district_id' => 36,
                'nepali_name' => 'गल्कोट नगरपालिका',
                'english_name' => 'Galkot Municipality',
                'created_at' => '2022-03-27 08:35:12',
                'updated_at' => '2022-03-27 08:35:12',
            ),
            395 => 
            array (
                'id' => 396,
                'district_id' => 36,
                'nepali_name' => 'जैमूनी',
                'english_name' => 'Jaimuni Municipality',
                'created_at' => '2022-03-27 08:35:12',
                'updated_at' => '2022-03-27 08:35:12',
            ),
            396 => 
            array (
                'id' => 397,
                'district_id' => 36,
                'nepali_name' => 'वरेङ गाउँपालिका',
                'english_name' => 'Bareng Rural Municipality',
                'created_at' => '2022-03-27 08:35:12',
                'updated_at' => '2022-03-27 08:35:12',
            ),
            397 => 
            array (
                'id' => 398,
                'district_id' => 36,
                'nepali_name' => 'काठेखोला गाउँपालिका',
                'english_name' => 'Khathekhola Rural Municipality',
                'created_at' => '2022-03-27 08:35:13',
                'updated_at' => '2022-03-27 08:35:13',
            ),
            398 => 
            array (
                'id' => 399,
                'district_id' => 36,
                'nepali_name' => 'तमानखोला गाउँपालिका',
                'english_name' => 'Taman Khola Rural Municipality',
                'created_at' => '2022-03-27 08:35:14',
                'updated_at' => '2022-03-27 08:35:14',
            ),
            399 => 
            array (
                'id' => 400,
                'district_id' => 36,
                'nepali_name' => 'ताराखोला गाउँपालिका',
                'english_name' => 'Tara Khola Rural Municipality',
                'created_at' => '2022-03-27 08:35:14',
                'updated_at' => '2022-03-27 08:35:14',
            ),
            400 => 
            array (
                'id' => 401,
                'district_id' => 36,
                'nepali_name' => 'निसीखोला गाउँपालिका',
                'english_name' => 'Nishi Khola Rural Municipality',
                'created_at' => '2022-03-27 08:35:14',
                'updated_at' => '2022-03-27 08:35:14',
            ),
            401 => 
            array (
                'id' => 402,
                'district_id' => 36,
                'nepali_name' => 'वडिगाड गाउँपालिका',
                'english_name' => 'Badigad Rural Municipality',
                'created_at' => '2022-03-27 08:35:14',
                'updated_at' => '2022-03-27 08:35:14',
            ),
            402 => 
            array (
                'id' => 403,
                'district_id' => 37,
                'nepali_name' => 'गोरखा नगरपालिका',
                'english_name' => 'Gorkha Municipality',
                'created_at' => '2022-03-27 08:35:15',
                'updated_at' => '2022-03-27 08:35:15',
            ),
            403 => 
            array (
                'id' => 404,
                'district_id' => 37,
                'nepali_name' => 'पालुङटार नगरपालिका',
                'english_name' => 'Palungtar Municipality',
                'created_at' => '2022-03-27 08:35:15',
                'updated_at' => '2022-03-27 08:35:15',
            ),
            404 => 
            array (
                'id' => 405,
                'district_id' => 37,
                'nepali_name' => 'बारपाक सुलिकोट गाउँपालिका',
                'english_name' => 'Barpak Sulikot Rural Municipality',
                'created_at' => '2022-03-27 08:35:15',
                'updated_at' => '2022-03-27 08:35:15',
            ),
            405 => 
            array (
                'id' => 406,
                'district_id' => 37,
                'nepali_name' => 'सिरानचोक गाउँपालिका',
                'english_name' => 'Siranchowk Rural Municipality',
                'created_at' => '2022-03-27 08:35:15',
                'updated_at' => '2022-03-27 08:35:15',
            ),
            406 => 
            array (
                'id' => 407,
                'district_id' => 37,
                'nepali_name' => 'अजिरकोट गाउँपालिका',
                'english_name' => 'Ajirkot Rural Municipality',
                'created_at' => '2022-03-27 08:35:16',
                'updated_at' => '2022-03-27 08:35:16',
            ),
            407 => 
            array (
                'id' => 408,
                'district_id' => 37,
                'nepali_name' => 'चुमनुव्री गाउँपालिका',
                'english_name' => 'Chumnubri Rural Municipality',
                'created_at' => '2022-03-27 08:35:16',
                'updated_at' => '2022-03-27 08:35:16',
            ),
            408 => 
            array (
                'id' => 409,
                'district_id' => 37,
                'nepali_name' => 'धार्चे गाउँपालिका',
                'english_name' => 'Dharche Rural Municipality',
                'created_at' => '2022-03-27 08:35:17',
                'updated_at' => '2022-03-27 08:35:17',
            ),
            409 => 
            array (
                'id' => 410,
                'district_id' => 37,
                'nepali_name' => 'भिमसेनथापा गाउँपालिका',
                'english_name' => 'Bhimsen Thapa Rural Municipality',
                'created_at' => '2022-03-27 08:35:17',
                'updated_at' => '2022-03-27 08:35:17',
            ),
            410 => 
            array (
                'id' => 411,
                'district_id' => 37,
                'nepali_name' => 'शहिद लखन गाउँपालिका',
                'english_name' => 'Sahid Lakhan Rural Municipality',
                'created_at' => '2022-03-27 08:35:17',
                'updated_at' => '2022-03-27 08:35:17',
            ),
            411 => 
            array (
                'id' => 412,
                'district_id' => 37,
                'nepali_name' => 'आरूघाट गाउँपालिका',
                'english_name' => 'Aarughat Rural Municipality',
                'created_at' => '2022-03-27 08:35:18',
                'updated_at' => '2022-03-27 08:35:18',
            ),
            412 => 
            array (
                'id' => 413,
                'district_id' => 37,
                'nepali_name' => 'गण्डकी गाउँपालिका',
                'english_name' => 'Gandaki Rural Municipality',
                'created_at' => '2022-03-27 08:35:18',
                'updated_at' => '2022-03-27 08:35:18',
            ),
            413 => 
            array (
                'id' => 414,
                'district_id' => 38,
                'nepali_name' => 'पोखरा महानगरपालिका',
                'english_name' => 'Pokhara Metropolitan City',
                'created_at' => '2022-03-27 08:35:19',
                'updated_at' => '2022-03-27 08:35:19',
            ),
            414 => 
            array (
                'id' => 415,
                'district_id' => 38,
                'nepali_name' => 'अन्नपूर्ण गाउँपालिका',
                'english_name' => 'Annapurna Rural Municipality',
                'created_at' => '2022-03-27 08:35:19',
                'updated_at' => '2022-03-27 08:35:19',
            ),
            415 => 
            array (
                'id' => 416,
                'district_id' => 38,
                'nepali_name' => 'माछापुच्छ्रे गाउँपालिका',
                'english_name' => 'Machhapuchchhre Rural Municipality',
                'created_at' => '2022-03-27 08:35:19',
                'updated_at' => '2022-03-27 08:35:19',
            ),
            416 => 
            array (
                'id' => 417,
                'district_id' => 38,
                'nepali_name' => 'मादी गाउँपालिका',
                'english_name' => 'Madi Rural Municipality',
                'created_at' => '2022-03-27 08:35:19',
                'updated_at' => '2022-03-27 08:35:19',
            ),
            417 => 
            array (
                'id' => 418,
                'district_id' => 38,
                'nepali_name' => 'रूपा गाउँपालिका',
                'english_name' => 'Rupa Rural Municipality',
                'created_at' => '2022-03-27 08:35:20',
                'updated_at' => '2022-03-27 08:35:20',
            ),
            418 => 
            array (
                'id' => 419,
                'district_id' => 39,
                'nepali_name' => 'बेसीशहर नगरपालिका',
                'english_name' => 'Besisahar Municipality',
                'created_at' => '2022-03-27 08:35:20',
                'updated_at' => '2022-03-27 08:35:20',
            ),
            419 => 
            array (
                'id' => 420,
                'district_id' => 39,
                'nepali_name' => 'मध्यनेपाल नगरपालिका',
                'english_name' => 'Madhya Nepal Municipality',
                'created_at' => '2022-03-27 08:35:21',
                'updated_at' => '2022-03-27 08:35:21',
            ),
            420 => 
            array (
                'id' => 421,
                'district_id' => 39,
                'nepali_name' => 'रारइनास नगरपालिका',
                'english_name' => 'Rainas Municipality',
                'created_at' => '2022-03-27 08:35:21',
                'updated_at' => '2022-03-27 08:35:21',
            ),
            421 => 
            array (
                'id' => 422,
                'district_id' => 39,
                'nepali_name' => 'सुन्दरबजार नगरपालिका',
                'english_name' => 'Sundarbazar Municipality',
                'created_at' => '2022-03-27 08:35:21',
                'updated_at' => '2022-03-27 08:35:21',
            ),
            422 => 
            array (
                'id' => 423,
                'district_id' => 39,
                'nepali_name' => 'दोर्दी गाउँपालिका',
                'english_name' => 'Dordi Rural Municipality',
                'created_at' => '2022-03-27 08:35:22',
                'updated_at' => '2022-03-27 08:35:22',
            ),
            423 => 
            array (
                'id' => 424,
                'district_id' => 39,
                'nepali_name' => 'दूधपोखरी गाउँपालिका',
                'english_name' => 'Dudhpokhari Rural Municipality',
                'created_at' => '2022-03-27 08:35:22',
                'updated_at' => '2022-03-27 08:35:22',
            ),
            424 => 
            array (
                'id' => 425,
                'district_id' => 39,
                'nepali_name' => 'क्व्होलासोथार गाउँपालिका',
                'english_name' => 'Kwhlosothar Rural Municipality',
                'created_at' => '2022-03-27 08:35:22',
                'updated_at' => '2022-03-27 08:35:22',
            ),
            425 => 
            array (
                'id' => 426,
                'district_id' => 39,
                'nepali_name' => 'मर्स्याङदी गाउँपालिका',
                'english_name' => 'Marsyangdi Rural Municipality',
                'created_at' => '2022-03-27 08:35:23',
                'updated_at' => '2022-03-27 08:35:23',
            ),
            426 => 
            array (
                'id' => 427,
                'district_id' => 40,
                'nepali_name' => 'चामे गाउँपालिका',
                'english_name' => 'Chame Rural Municipality',
                'created_at' => '2022-03-27 08:35:23',
                'updated_at' => '2022-03-27 08:35:23',
            ),
            427 => 
            array (
                'id' => 428,
                'district_id' => 40,
                'nepali_name' => 'नासोँ गाउँपालिका',
                'english_name' => 'Nason Rural Municipality',
                'created_at' => '2022-03-27 08:35:23',
                'updated_at' => '2022-03-27 08:35:23',
            ),
            428 => 
            array (
                'id' => 429,
                'district_id' => 40,
                'nepali_name' => 'नार्पा भूमि गाउँपालिका',
                'english_name' => 'NarpaBhumi Rural Municipality',
                'created_at' => '2022-03-27 08:35:23',
                'updated_at' => '2022-03-27 08:35:23',
            ),
            429 => 
            array (
                'id' => 430,
                'district_id' => 40,
                'nepali_name' => 'मनाङ ङिस्याङ गाउँपालिका',
                'english_name' => 'Manang Ngisyang Rural Municipality',
                'created_at' => '2022-03-27 08:35:24',
                'updated_at' => '2022-03-27 08:35:24',
            ),
            430 => 
            array (
                'id' => 431,
                'district_id' => 41,
                'nepali_name' => 'घरपझोङ गाउँपालिका',
                'english_name' => 'Gharpajhong Rural Municipality',
                'created_at' => '2022-03-27 08:35:24',
                'updated_at' => '2022-03-27 08:35:24',
            ),
            431 => 
            array (
                'id' => 432,
                'district_id' => 41,
                'nepali_name' => 'थासाङ गाउँपालिका',
                'english_name' => 'Thasang Rural Municipality',
                'created_at' => '2022-03-27 08:35:24',
                'updated_at' => '2022-03-27 08:35:24',
            ),
            432 => 
            array (
                'id' => 433,
                'district_id' => 41,
                'nepali_name' => 'वारागुङ मुक्तिक्षेत्र गाउँपालिका',
                'english_name' => 'Barhagaun Muktichhetra Rural Municipality',
                'created_at' => '2022-03-27 08:35:25',
                'updated_at' => '2022-03-27 08:35:25',
            ),
            433 => 
            array (
                'id' => 434,
                'district_id' => 41,
                'nepali_name' => 'लोमन्थाङ गाउँपालिका',
                'english_name' => 'Lomanthang Rural Municipality',
                'created_at' => '2022-03-27 08:35:25',
                'updated_at' => '2022-03-27 08:35:25',
            ),
            434 => 
            array (
                'id' => 435,
                'district_id' => 41,
                'nepali_name' => 'लो-घेकर दामोदरकुण्ड गाउँपालिका',
                'english_name' => 'Lo-Ghekar Damodarkunda Rural Municipality',
                'created_at' => '2022-03-27 08:35:25',
                'updated_at' => '2022-03-27 08:35:25',
            ),
            435 => 
            array (
                'id' => 436,
                'district_id' => 42,
                'nepali_name' => 'बेनी नगरपालिका',
                'english_name' => 'Beni Municipality',
                'created_at' => '2022-03-27 08:35:26',
                'updated_at' => '2022-03-27 08:35:26',
            ),
            436 => 
            array (
                'id' => 437,
                'district_id' => 42,
                'nepali_name' => 'अन्नपुर्ण नगरपालिका',
                'english_name' => 'Annapurna Rural Municipality',
                'created_at' => '2022-03-27 08:35:26',
                'updated_at' => '2022-03-27 08:35:26',
            ),
            437 => 
            array (
                'id' => 438,
                'district_id' => 42,
                'nepali_name' => 'धवलागिरी गाउँपालिका',
                'english_name' => 'Dhaulagiri Rural Municipality',
                'created_at' => '2022-03-27 08:35:26',
                'updated_at' => '2022-03-27 08:35:26',
            ),
            438 => 
            array (
                'id' => 439,
                'district_id' => 42,
                'nepali_name' => 'मंगला गाउँपालिका',
                'english_name' => 'Mangala Rural Municipality',
                'created_at' => '2022-03-27 08:35:27',
                'updated_at' => '2022-03-27 08:35:27',
            ),
            439 => 
            array (
                'id' => 440,
                'district_id' => 42,
                'nepali_name' => 'मालिका गाउँपालिका',
                'english_name' => 'Malika Rural Municipality',
                'created_at' => '2022-03-27 08:35:27',
                'updated_at' => '2022-03-27 08:35:27',
            ),
            440 => 
            array (
                'id' => 441,
                'district_id' => 42,
                'nepali_name' => 'रघुगंगा गाउँपालिका',
                'english_name' => 'Raghuganga Rural Municipality',
                'created_at' => '2022-03-27 08:35:27',
                'updated_at' => '2022-03-27 08:35:27',
            ),
            441 => 
            array (
                'id' => 442,
                'district_id' => 43,
                'nepali_name' => 'कावासोती नगरपालिका',
                'english_name' => 'Kawasoti Municipality',
                'created_at' => '2022-03-27 08:35:28',
                'updated_at' => '2022-03-27 08:35:28',
            ),
            442 => 
            array (
                'id' => 443,
                'district_id' => 43,
                'nepali_name' => 'गैडाकोट नगरपालिका',
                'english_name' => 'Gaindakot Municipality',
                'created_at' => '2022-03-27 08:35:28',
                'updated_at' => '2022-03-27 08:35:28',
            ),
            443 => 
            array (
                'id' => 444,
                'district_id' => 43,
                'nepali_name' => 'देवचुली नगरपालिका',
                'english_name' => 'Devachuli Municipality',
                'created_at' => '2022-03-27 08:35:28',
                'updated_at' => '2022-03-27 08:35:28',
            ),
            444 => 
            array (
                'id' => 445,
                'district_id' => 43,
                'nepali_name' => 'मध्यविन्दु नगरपालिका',
                'english_name' => 'Madhya Bindu Municipality',
                'created_at' => '2022-03-27 08:35:29',
                'updated_at' => '2022-03-27 08:35:29',
            ),
            445 => 
            array (
                'id' => 446,
                'district_id' => 43,
                'nepali_name' => 'बौदीकाली गाउँपालिका',
                'english_name' => 'Baudikali Rural Municipality',
                'created_at' => '2022-03-27 08:35:29',
                'updated_at' => '2022-03-27 08:35:29',
            ),
            446 => 
            array (
                'id' => 447,
                'district_id' => 43,
                'nepali_name' => 'बुलिङटार गाउँपालिका',
                'english_name' => 'Bulingtar Rural Municipality',
                'created_at' => '2022-03-27 08:35:29',
                'updated_at' => '2022-03-27 08:35:29',
            ),
            447 => 
            array (
                'id' => 448,
                'district_id' => 43,
                'nepali_name' => 'विनयी त्रिवेणी गाउँपालिका',
                'english_name' => 'Binayi Tribeni Rural Municipality',
                'created_at' => '2022-03-27 08:35:29',
                'updated_at' => '2022-03-27 08:35:29',
            ),
            448 => 
            array (
                'id' => 449,
                'district_id' => 43,
                'nepali_name' => 'हुप्सेकोट गाउँपालिका',
                'english_name' => 'Hupsekot Rural Municipality',
                'created_at' => '2022-03-27 08:35:30',
                'updated_at' => '2022-03-27 08:35:30',
            ),
            449 => 
            array (
                'id' => 450,
                'district_id' => 44,
                'nepali_name' => 'कुश्मा नगरपालिका',
                'english_name' => 'Kushma Municipality',
                'created_at' => '2022-03-27 08:35:31',
                'updated_at' => '2022-03-27 08:35:31',
            ),
            450 => 
            array (
                'id' => 451,
                'district_id' => 44,
                'nepali_name' => 'फलेवास नगरपालिका',
                'english_name' => 'Phalewas Municipality',
                'created_at' => '2022-03-27 08:35:31',
                'updated_at' => '2022-03-27 08:35:31',
            ),
            451 => 
            array (
                'id' => 452,
                'district_id' => 44,
                'nepali_name' => 'जलजला गाउँपालिका',
                'english_name' => 'Jaljala Rural Municipality',
                'created_at' => '2022-03-27 08:35:31',
                'updated_at' => '2022-03-27 08:35:31',
            ),
            452 => 
            array (
                'id' => 453,
                'district_id' => 44,
                'nepali_name' => 'पैयूं गाउँपालिका',
                'english_name' => 'Paiyun Rural Municipality',
                'created_at' => '2022-03-27 08:35:31',
                'updated_at' => '2022-03-27 08:35:31',
            ),
            453 => 
            array (
                'id' => 454,
                'district_id' => 44,
                'nepali_name' => 'महाशिला गाउँपालिका',
                'english_name' => 'Mahashila Rural Municipality',
                'created_at' => '2022-03-27 08:35:32',
                'updated_at' => '2022-03-27 08:35:32',
            ),
            454 => 
            array (
                'id' => 455,
                'district_id' => 44,
                'nepali_name' => 'मोदी गाउँपालिका',
                'english_name' => 'Modi Rural Municipality',
                'created_at' => '2022-03-27 08:35:32',
                'updated_at' => '2022-03-27 08:35:32',
            ),
            455 => 
            array (
                'id' => 456,
                'district_id' => 44,
                'nepali_name' => 'विहादी गाउँपालिका',
                'english_name' => 'Bihadi Rural Municipality',
                'created_at' => '2022-03-27 08:35:32',
                'updated_at' => '2022-03-27 08:35:32',
            ),
            456 => 
            array (
                'id' => 457,
                'district_id' => 45,
                'nepali_name' => 'गल्याङ नगरपालिका',
                'english_name' => 'Galyang Municipality',
                'created_at' => '2022-03-27 08:35:33',
                'updated_at' => '2022-03-27 08:35:33',
            ),
            457 => 
            array (
                'id' => 458,
                'district_id' => 45,
                'nepali_name' => 'चापाकोट नगरपालिका',
                'english_name' => 'Chapakot Municipality',
                'created_at' => '2022-03-27 08:35:33',
                'updated_at' => '2022-03-27 08:35:33',
            ),
            458 => 
            array (
                'id' => 459,
                'district_id' => 45,
                'nepali_name' => 'पुतलीबजार नगरपालिका',
                'english_name' => 'Putalibazar Municipality',
                'created_at' => '2022-03-27 08:35:33',
                'updated_at' => '2022-03-27 08:35:33',
            ),
            459 => 
            array (
                'id' => 460,
                'district_id' => 45,
                'nepali_name' => 'भीरकोट नगरपालिका',
                'english_name' => 'Bheerkot Municipality',
                'created_at' => '2022-03-27 08:35:34',
                'updated_at' => '2022-03-27 08:35:34',
            ),
            460 => 
            array (
                'id' => 461,
                'district_id' => 45,
                'nepali_name' => 'वालिङ नगरपालिका',
                'english_name' => 'Waling Municipality',
                'created_at' => '2022-03-27 08:35:34',
                'updated_at' => '2022-03-27 08:35:34',
            ),
            461 => 
            array (
                'id' => 462,
                'district_id' => 45,
                'nepali_name' => 'अर्जुनचौपारी गाउँपालिका',
                'english_name' => 'Arjun Chaupari Rural Municipality',
                'created_at' => '2022-03-27 08:35:34',
                'updated_at' => '2022-03-27 08:35:34',
            ),
            462 => 
            array (
                'id' => 463,
                'district_id' => 45,
                'nepali_name' => 'आँधिखोला गाउँपालिका',
                'english_name' => 'Aandhikhola Rural Municipality',
                'created_at' => '2022-03-27 08:35:35',
                'updated_at' => '2022-03-27 08:35:35',
            ),
            463 => 
            array (
                'id' => 464,
                'district_id' => 45,
                'nepali_name' => 'कालीगण्डकी गाउँपालिका',
                'english_name' => 'Kaligandaki Rural Municipality',
                'created_at' => '2022-03-27 08:35:35',
                'updated_at' => '2022-03-27 08:35:35',
            ),
            464 => 
            array (
                'id' => 465,
                'district_id' => 45,
                'nepali_name' => 'फेदीखोला गाउँपालिका',
                'english_name' => 'Phedikhola Rural Municipality',
                'created_at' => '2022-03-27 08:35:35',
                'updated_at' => '2022-03-27 08:35:35',
            ),
            465 => 
            array (
                'id' => 466,
                'district_id' => 45,
                'nepali_name' => 'हरिनास गाउँपालिका',
                'english_name' => 'Harinas Rural Municipality',
                'created_at' => '2022-03-27 08:35:36',
                'updated_at' => '2022-03-27 08:35:36',
            ),
            466 => 
            array (
                'id' => 467,
                'district_id' => 45,
                'nepali_name' => 'बिरुवा गाउँपालिका',
                'english_name' => 'Biruwa Rural Municipality',
                'created_at' => '2022-03-27 08:35:36',
                'updated_at' => '2022-03-27 08:35:36',
            ),
            467 => 
            array (
                'id' => 468,
                'district_id' => 46,
                'nepali_name' => 'भानु नगरपालिका',
                'english_name' => 'Bhanu Municipality',
                'created_at' => '2022-03-27 08:35:36',
                'updated_at' => '2022-03-27 08:35:36',
            ),
            468 => 
            array (
                'id' => 469,
                'district_id' => 46,
                'nepali_name' => 'भिमाद नगरपालिका',
                'english_name' => 'Bhimad Municipality',
                'created_at' => '2022-03-27 08:35:37',
                'updated_at' => '2022-03-27 08:35:37',
            ),
            469 => 
            array (
                'id' => 470,
                'district_id' => 46,
                'nepali_name' => 'व्यास नगरपालिका',
                'english_name' => 'Byas Municipalit',
                'created_at' => '2022-03-27 08:35:37',
                'updated_at' => '2022-03-27 08:35:37',
            ),
            470 => 
            array (
                'id' => 471,
                'district_id' => 46,
                'nepali_name' => 'शुक्लागण्डकी नगरपालिका',
                'english_name' => 'Suklagandaki Municipality',
                'created_at' => '2022-03-27 08:35:37',
                'updated_at' => '2022-03-27 08:35:37',
            ),
            471 => 
            array (
                'id' => 472,
                'district_id' => 46,
                'nepali_name' => 'आँबुखैरेनी गाउँपालिका',
                'english_name' => 'AnbuKhaireni Rural Municipalit',
                'created_at' => '2022-03-27 08:35:38',
                'updated_at' => '2022-03-27 08:35:38',
            ),
            472 => 
            array (
                'id' => 473,
                'district_id' => 46,
                'nepali_name' => 'देवघाट गाउँपालिका',
                'english_name' => 'Devghat Rural Municipality',
                'created_at' => '2022-03-27 08:35:38',
                'updated_at' => '2022-03-27 08:35:38',
            ),
            473 => 
            array (
                'id' => 474,
                'district_id' => 46,
                'nepali_name' => 'वन्दिपुर गाउँपालिका',
                'english_name' => 'Bandipur Rural Municipality',
                'created_at' => '2022-03-27 08:35:38',
                'updated_at' => '2022-03-27 08:35:38',
            ),
            474 => 
            array (
                'id' => 475,
                'district_id' => 46,
                'nepali_name' => 'ऋषिङ्ग गाउँपालिका',
                'english_name' => 'Rishing Rural Municipality',
                'created_at' => '2022-03-27 08:35:39',
                'updated_at' => '2022-03-27 08:35:39',
            ),
            475 => 
            array (
                'id' => 476,
                'district_id' => 46,
                'nepali_name' => 'घिरिङ गाउँपालिका',
                'english_name' => 'Ghiring Rural Municipality',
                'created_at' => '2022-03-27 08:35:39',
                'updated_at' => '2022-03-27 08:35:39',
            ),
            476 => 
            array (
                'id' => 477,
                'district_id' => 46,
                'nepali_name' => 'म्याग्दे गाउँपालिका',
                'english_name' => 'Myagde Rural Municipality',
                'created_at' => '2022-03-27 08:35:39',
                'updated_at' => '2022-03-27 08:35:39',
            ),
            477 => 
            array (
                'id' => 478,
                'district_id' => 47,
                'nepali_name' => 'कपिलवस्तु नगरपालिका',
                'english_name' => 'Kapilvastu Municipality',
                'created_at' => '2022-03-27 08:35:40',
                'updated_at' => '2022-03-27 08:35:40',
            ),
            478 => 
            array (
                'id' => 479,
                'district_id' => 47,
                'nepali_name' => 'बाणगंगा नगरपालिका',
                'english_name' => 'Banganga Municipality',
                'created_at' => '2022-03-27 08:35:40',
                'updated_at' => '2022-03-27 08:35:40',
            ),
            479 => 
            array (
                'id' => 480,
                'district_id' => 47,
                'nepali_name' => 'बुद्धभुमी नगरपालिका',
                'english_name' => 'Buddhabhumi Municipality',
                'created_at' => '2022-03-27 08:35:40',
                'updated_at' => '2022-03-27 08:35:40',
            ),
            480 => 
            array (
                'id' => 481,
                'district_id' => 47,
                'nepali_name' => 'शिवराज नगरपालिका',
                'english_name' => 'Shivaraj Municipality',
                'created_at' => '2022-03-27 08:35:41',
                'updated_at' => '2022-03-27 08:35:41',
            ),
            481 => 
            array (
                'id' => 482,
                'district_id' => 47,
                'nepali_name' => 'कृष्णनगर नगरपालिका',
                'english_name' => 'Krishnanagar Municipality',
                'created_at' => '2022-03-27 08:35:41',
                'updated_at' => '2022-03-27 08:35:41',
            ),
            482 => 
            array (
                'id' => 483,
                'district_id' => 47,
                'nepali_name' => 'महाराजगंज नगरपालिका',
                'english_name' => 'Maharajgunj Municipality',
                'created_at' => '2022-03-27 08:35:41',
                'updated_at' => '2022-03-27 08:35:41',
            ),
            483 => 
            array (
                'id' => 484,
                'district_id' => 47,
                'nepali_name' => 'मायादेवी गाउँपालिका',
                'english_name' => 'Mayadevi Rural Municipality',
                'created_at' => '2022-03-27 08:35:42',
                'updated_at' => '2022-03-27 08:35:42',
            ),
            484 => 
            array (
                'id' => 485,
                'district_id' => 47,
                'nepali_name' => 'यसोधरा गाउँपालिका',
                'english_name' => 'Yashodhara Rural Municipality',
                'created_at' => '2022-03-27 08:35:42',
                'updated_at' => '2022-03-27 08:35:42',
            ),
            485 => 
            array (
                'id' => 486,
                'district_id' => 47,
                'nepali_name' => 'सुद्धोधन गाउँपालिका',
                'english_name' => 'Suddhodan Rural Municipality',
                'created_at' => '2022-03-27 08:35:42',
                'updated_at' => '2022-03-27 08:35:42',
            ),
            486 => 
            array (
                'id' => 487,
                'district_id' => 47,
                'nepali_name' => 'विजयनगर गाउँपालिका',
                'english_name' => 'Bijaynagar Rural Municipality',
                'created_at' => '2022-03-27 08:35:43',
                'updated_at' => '2022-03-27 08:35:43',
            ),
            487 => 
            array (
                'id' => 488,
                'district_id' => 48,
                'nepali_name' => 'बर्दघाट नगरपालिका',
                'english_name' => 'Bardaghat Municipality',
                'created_at' => '2022-03-27 08:35:43',
                'updated_at' => '2022-03-27 08:35:43',
            ),
            488 => 
            array (
                'id' => 489,
                'district_id' => 48,
                'nepali_name' => 'रामग्राम नगरपालिका',
                'english_name' => 'Ramgram Municipality',
                'created_at' => '2022-03-27 08:35:44',
                'updated_at' => '2022-03-27 08:35:44',
            ),
            489 => 
            array (
                'id' => 490,
                'district_id' => 48,
                'nepali_name' => 'सुनवल नगरपालिका',
                'english_name' => 'Sunwal Municipality',
                'created_at' => '2022-03-27 08:35:45',
                'updated_at' => '2022-03-27 08:35:45',
            ),
            490 => 
            array (
                'id' => 491,
                'district_id' => 48,
                'nepali_name' => 'सुस्ता गाउँपालिका',
                'english_name' => 'Susta Rural Municipality',
                'created_at' => '2022-03-27 08:35:45',
                'updated_at' => '2022-03-27 08:35:45',
            ),
            491 => 
            array (
                'id' => 492,
                'district_id' => 48,
                'nepali_name' => 'पाल्हीनन्दन गाउँपालिका',
                'english_name' => 'Palhi Nandan Rural Municipality',
                'created_at' => '2022-03-27 08:35:45',
                'updated_at' => '2022-03-27 08:35:45',
            ),
            492 => 
            array (
                'id' => 493,
                'district_id' => 48,
                'nepali_name' => 'प्रतापपुर गाउँपालिका',
                'english_name' => 'Pratappur Rural Municipality',
                'created_at' => '2022-03-27 08:35:45',
                'updated_at' => '2022-03-27 08:35:45',
            ),
            493 => 
            array (
                'id' => 494,
                'district_id' => 48,
                'nepali_name' => 'सरावल गाउँपालिका',
                'english_name' => 'Sarawal Rural Municipality',
                'created_at' => '2022-03-27 08:35:45',
                'updated_at' => '2022-03-27 08:35:45',
            ),
            494 => 
            array (
                'id' => 495,
                'district_id' => 49,
                'nepali_name' => 'बुटवल उपमहानगरपालिका',
                'english_name' => 'Butwal Sub-Metropolitan City',
                'created_at' => '2022-03-27 08:35:46',
                'updated_at' => '2022-03-27 08:35:46',
            ),
            495 => 
            array (
                'id' => 496,
                'district_id' => 49,
                'nepali_name' => 'देवदह नगरपालिका',
                'english_name' => 'Devdaha Municipality',
                'created_at' => '2022-03-27 08:35:46',
                'updated_at' => '2022-03-27 08:35:46',
            ),
            496 => 
            array (
                'id' => 497,
                'district_id' => 49,
                'nepali_name' => 'लुम्बिनी सांस्कृतिक नगरपालिका',
                'english_name' => 'Lumbini Sanskritik Municipality',
                'created_at' => '2022-03-27 08:35:46',
                'updated_at' => '2022-03-27 08:35:46',
            ),
            497 => 
            array (
                'id' => 498,
                'district_id' => 49,
                'nepali_name' => 'सैनामैना नगरपालिका',
                'english_name' => 'Sainamaina Municipality',
                'created_at' => '2022-03-27 08:35:47',
                'updated_at' => '2022-03-27 08:35:47',
            ),
            498 => 
            array (
                'id' => 499,
                'district_id' => 49,
                'nepali_name' => 'सिद्धार्थनगर नगरपालिका',
                'english_name' => 'Siddharthanagar Municipality',
                'created_at' => '2022-03-27 08:35:47',
                'updated_at' => '2022-03-27 08:35:47',
            ),
            499 => 
            array (
                'id' => 500,
                'district_id' => 49,
                'nepali_name' => 'तिलोत्तमा नगरपालिका',
                'english_name' => 'Tilottama Municipality',
                'created_at' => '2022-03-27 08:35:47',
                'updated_at' => '2022-03-27 08:35:47',
            ),
        ));
        \DB::table('municipalities')->insert(array (
            0 => 
            array (
                'id' => 501,
                'district_id' => 49,
                'nepali_name' => 'गैडहवा गाउँपालिका',
                'english_name' => 'Gaidahawa Rural Municipality',
                'created_at' => '2022-03-27 08:35:48',
                'updated_at' => '2022-03-27 08:35:48',
            ),
            1 => 
            array (
                'id' => 502,
                'district_id' => 49,
                'nepali_name' => 'कन्चन गाउँपालिका',
                'english_name' => 'Kanchan Rural Municipality',
                'created_at' => '2022-03-27 08:35:48',
                'updated_at' => '2022-03-27 08:35:48',
            ),
            2 => 
            array (
                'id' => 503,
                'district_id' => 49,
                'nepali_name' => 'कोटहीमाई गाउँपालिका',
                'english_name' => 'Kotahimai Rural Municipality',
                'created_at' => '2022-03-27 08:35:48',
                'updated_at' => '2022-03-27 08:35:48',
            ),
            3 => 
            array (
                'id' => 504,
                'district_id' => 49,
                'nepali_name' => 'मर्चवारी गाउँपालिका',
                'english_name' => 'Marchawari Rural Municipality',
                'created_at' => '2022-03-27 08:35:48',
                'updated_at' => '2022-03-27 08:35:48',
            ),
            4 => 
            array (
                'id' => 505,
                'district_id' => 49,
                'nepali_name' => 'मायादेवी गाउँपालिका',
                'english_name' => 'Mayadevi Rural Municipality',
                'created_at' => '2022-03-27 08:35:49',
                'updated_at' => '2022-03-27 08:35:49',
            ),
            5 => 
            array (
                'id' => 506,
                'district_id' => 49,
                'nepali_name' => 'ओमसतिया गाउँपालिका',
                'english_name' => 'Omsatiya Rural Municipality',
                'created_at' => '2022-03-27 08:35:49',
                'updated_at' => '2022-03-27 08:35:49',
            ),
            6 => 
            array (
                'id' => 507,
                'district_id' => 49,
                'nepali_name' => 'रोहिणी गाउँपालिका',
                'english_name' => 'Rohini Rural Municipality',
                'created_at' => '2022-03-27 08:35:49',
                'updated_at' => '2022-03-27 08:35:49',
            ),
            7 => 
            array (
                'id' => 508,
                'district_id' => 49,
                'nepali_name' => 'सम्मरीमाई गाउँपालिका',
                'english_name' => 'Sammarimai Rural Municipality',
                'created_at' => '2022-03-27 08:35:50',
                'updated_at' => '2022-03-27 08:35:50',
            ),
            8 => 
            array (
                'id' => 509,
                'district_id' => 49,
                'nepali_name' => 'सियारी गाउँपालिका',
                'english_name' => 'Siyari Rural Municipality',
                'created_at' => '2022-03-27 08:35:50',
                'updated_at' => '2022-03-27 08:35:50',
            ),
            9 => 
            array (
                'id' => 510,
                'district_id' => 49,
                'nepali_name' => 'शुद्धोधन गाउँपालिका',
                'english_name' => 'Suddodhan Rural Municipality',
                'created_at' => '2022-03-27 08:35:50',
                'updated_at' => '2022-03-27 08:35:50',
            ),
            10 => 
            array (
                'id' => 511,
                'district_id' => 50,
                'nepali_name' => 'सन्धिखर्क नगरपालिका',
                'english_name' => 'Sandhikharka Municipality',
                'created_at' => '2022-03-27 08:35:50',
                'updated_at' => '2022-03-27 08:35:50',
            ),
            11 => 
            array (
                'id' => 512,
                'district_id' => 50,
                'nepali_name' => 'शितगंगा नगरपालिका',
                'english_name' => 'Sitganga Municipality',
                'created_at' => '2022-03-27 08:35:51',
                'updated_at' => '2022-03-27 08:35:51',
            ),
            12 => 
            array (
                'id' => 513,
                'district_id' => 50,
                'nepali_name' => 'भूमिकास्थान नगरपालिका',
                'english_name' => 'Bhumikasthan Municipality',
                'created_at' => '2022-03-27 08:35:51',
                'updated_at' => '2022-03-27 08:35:51',
            ),
            13 => 
            array (
                'id' => 514,
                'district_id' => 50,
                'nepali_name' => 'छत्रदेव गाउँपालिका',
                'english_name' => 'Chhatradev Rural Municipality',
                'created_at' => '2022-03-27 08:35:52',
                'updated_at' => '2022-03-27 08:35:52',
            ),
            14 => 
            array (
                'id' => 515,
                'district_id' => 50,
                'nepali_name' => 'पाणिनी गाउँपालिका',
                'english_name' => 'Panini Rural Municipality',
                'created_at' => '2022-03-27 08:35:52',
                'updated_at' => '2022-03-27 08:35:52',
            ),
            15 => 
            array (
                'id' => 516,
                'district_id' => 50,
                'nepali_name' => 'मालारानी गाउँपालिका',
                'english_name' => 'Malarani Rural Municipality',
                'created_at' => '2022-03-27 08:35:52',
                'updated_at' => '2022-03-27 08:35:52',
            ),
            16 => 
            array (
                'id' => 517,
                'district_id' => 51,
                'nepali_name' => 'रेसुङ्गा नगरपालिका',
                'english_name' => 'Resunga Municipality',
                'created_at' => '2022-03-27 08:35:53',
                'updated_at' => '2022-03-27 08:35:53',
            ),
            17 => 
            array (
                'id' => 518,
                'district_id' => 51,
                'nepali_name' => 'मुसिकोट नगरपालिका',
                'english_name' => 'Musikot Municipality',
                'created_at' => '2022-03-27 08:35:53',
                'updated_at' => '2022-03-27 08:35:53',
            ),
            18 => 
            array (
                'id' => 519,
                'district_id' => 51,
                'nepali_name' => 'रुरुक्षेत्र गाउँपालिका',
                'english_name' => 'Rurukshetra Rural Municipality',
                'created_at' => '2022-03-27 08:35:54',
                'updated_at' => '2022-03-27 08:35:54',
            ),
            19 => 
            array (
                'id' => 520,
                'district_id' => 51,
                'nepali_name' => 'छत्रकोट गाउँपालिका',
                'english_name' => 'Chhatrakot Rural Municipality',
                'created_at' => '2022-03-27 08:35:54',
                'updated_at' => '2022-03-27 08:35:54',
            ),
            20 => 
            array (
                'id' => 521,
                'district_id' => 51,
                'nepali_name' => 'गुल्मी दरबार गाउँपालिका',
                'english_name' => 'Gulmidarbar Rural Municipality',
                'created_at' => '2022-03-27 08:35:54',
                'updated_at' => '2022-03-27 08:35:54',
            ),
            21 => 
            array (
                'id' => 522,
                'district_id' => 51,
                'nepali_name' => 'चन्द्रकोट गाउँपालिका',
                'english_name' => 'Chandrakot Rural Municipality',
                'created_at' => '2022-03-27 08:35:54',
                'updated_at' => '2022-03-27 08:35:54',
            ),
            22 => 
            array (
                'id' => 523,
                'district_id' => 51,
                'nepali_name' => 'सत्यवती गाउँपालिका',
                'english_name' => 'Satyawati Rural Municipality',
                'created_at' => '2022-03-27 08:35:55',
                'updated_at' => '2022-03-27 08:35:55',
            ),
            23 => 
            array (
                'id' => 524,
                'district_id' => 51,
                'nepali_name' => 'धुर्कोट गाउँपालिका',
                'english_name' => 'Dhurkot Rural Municipality',
                'created_at' => '2022-03-27 08:35:55',
                'updated_at' => '2022-03-27 08:35:55',
            ),
            24 => 
            array (
                'id' => 525,
                'district_id' => 51,
                'nepali_name' => 'कालीगण्डकी गाउँपालिका',
                'english_name' => 'Kaligandaki Rural Municipality',
                'created_at' => '2022-03-27 08:35:55',
                'updated_at' => '2022-03-27 08:35:55',
            ),
            25 => 
            array (
                'id' => 526,
                'district_id' => 51,
                'nepali_name' => 'ईस्मा गाउँपालिका',
                'english_name' => 'Isma Rural Municipality',
                'created_at' => '2022-03-27 08:35:56',
                'updated_at' => '2022-03-27 08:35:56',
            ),
            26 => 
            array (
                'id' => 527,
                'district_id' => 51,
                'nepali_name' => 'मालिका गाउँपालिका',
                'english_name' => 'Malika Rural Municipality',
                'created_at' => '2022-03-27 08:35:56',
                'updated_at' => '2022-03-27 08:35:56',
            ),
            27 => 
            array (
                'id' => 528,
                'district_id' => 51,
                'nepali_name' => 'मदाने गाउँपालिका',
                'english_name' => 'Madane Rural Municipality',
                'created_at' => '2022-03-27 08:35:56',
                'updated_at' => '2022-03-27 08:35:56',
            ),
            28 => 
            array (
                'id' => 529,
                'district_id' => 52,
                'nepali_name' => 'तानसेन नगरपालिका',
                'english_name' => 'Tansen Municipality',
                'created_at' => '2022-03-27 08:35:57',
                'updated_at' => '2022-03-27 08:35:57',
            ),
            29 => 
            array (
                'id' => 530,
                'district_id' => 52,
                'nepali_name' => 'रामपुर नगरपालिका',
                'english_name' => 'Rampur Municipality',
                'created_at' => '2022-03-27 08:35:57',
                'updated_at' => '2022-03-27 08:35:57',
            ),
            30 => 
            array (
                'id' => 531,
                'district_id' => 52,
                'nepali_name' => 'रैनादेवी छहरा गाउँपालिका',
                'english_name' => 'Rainadevi Chhahara Rural Municipality',
                'created_at' => '2022-03-27 08:35:57',
                'updated_at' => '2022-03-27 08:35:57',
            ),
            31 => 
            array (
                'id' => 532,
                'district_id' => 52,
                'nepali_name' => 'रिब्दिकोट गाउँपालिका',
                'english_name' => 'Ripdikot Rural Municipality',
                'created_at' => '2022-03-27 08:35:58',
                'updated_at' => '2022-03-27 08:35:58',
            ),
            32 => 
            array (
                'id' => 533,
                'district_id' => 52,
                'nepali_name' => 'बगनासकाली गाउँपालिका',
                'english_name' => 'Bagnaskali Rural Municipality',
                'created_at' => '2022-03-27 08:35:58',
                'updated_at' => '2022-03-27 08:35:58',
            ),
            33 => 
            array (
                'id' => 534,
                'district_id' => 52,
                'nepali_name' => 'रम्भा गाउँपालिका',
                'english_name' => 'Rambha Rural Municipality',
                'created_at' => '2022-03-27 08:35:58',
                'updated_at' => '2022-03-27 08:35:58',
            ),
            34 => 
            array (
                'id' => 535,
                'district_id' => 52,
                'nepali_name' => 'पूर्वखोला गाउँपालिका',
                'english_name' => 'Purbakhola Rural Municipality',
                'created_at' => '2022-03-27 08:35:59',
                'updated_at' => '2022-03-27 08:35:59',
            ),
            35 => 
            array (
                'id' => 536,
                'district_id' => 52,
                'nepali_name' => 'निस्दी गाउँपालिका',
                'english_name' => 'Nisdi Rural Municipality',
                'created_at' => '2022-03-27 08:35:59',
                'updated_at' => '2022-03-27 08:35:59',
            ),
            36 => 
            array (
                'id' => 537,
                'district_id' => 52,
                'nepali_name' => 'माथागढी गाउँपालिका',
                'english_name' => 'Mathagadhi Rural Municipalit',
                'created_at' => '2022-03-27 08:35:59',
                'updated_at' => '2022-03-27 08:35:59',
            ),
            37 => 
            array (
                'id' => 538,
                'district_id' => 52,
                'nepali_name' => 'तिनाउ गाउँपालिका',
                'english_name' => 'Tinahu Rural Municipality',
                'created_at' => '2022-03-27 08:36:00',
                'updated_at' => '2022-03-27 08:36:00',
            ),
            38 => 
            array (
                'id' => 539,
                'district_id' => 53,
                'nepali_name' => 'घोराही उपमहानगरपालिका',
                'english_name' => 'Ghorahi Sub-Metropolitan City',
                'created_at' => '2022-03-27 08:36:00',
                'updated_at' => '2022-03-27 08:36:00',
            ),
            39 => 
            array (
                'id' => 540,
                'district_id' => 53,
                'nepali_name' => 'तुल्सीपुर उपमहानगरपालिका',
                'english_name' => 'Tulsipur Sub-Metropolitan City',
                'created_at' => '2022-03-27 08:36:00',
                'updated_at' => '2022-03-27 08:36:00',
            ),
            40 => 
            array (
                'id' => 541,
                'district_id' => 53,
                'nepali_name' => 'लमही नगरपालिका',
                'english_name' => 'Lamahi Municipality',
                'created_at' => '2022-03-27 08:36:01',
                'updated_at' => '2022-03-27 08:36:01',
            ),
            41 => 
            array (
                'id' => 542,
                'district_id' => 53,
                'nepali_name' => 'गढवा गाउँपालिका',
                'english_name' => 'Gadhawa Rural Municipality',
                'created_at' => '2022-03-27 08:36:01',
                'updated_at' => '2022-03-27 08:36:01',
            ),
            42 => 
            array (
                'id' => 543,
                'district_id' => 53,
                'nepali_name' => 'राजपुर गाउँपालिका',
                'english_name' => 'Rajpur Rural Municipality',
                'created_at' => '2022-03-27 08:36:01',
                'updated_at' => '2022-03-27 08:36:01',
            ),
            43 => 
            array (
                'id' => 544,
                'district_id' => 53,
                'nepali_name' => 'शान्तिनगर गाउँपालिका',
                'english_name' => 'Shantinagar Rural Municipality',
                'created_at' => '2022-03-27 08:36:02',
                'updated_at' => '2022-03-27 08:36:02',
            ),
            44 => 
            array (
                'id' => 545,
                'district_id' => 53,
                'nepali_name' => 'राप्ती गाउँपालिका',
                'english_name' => 'Rapti Rural Municipality',
                'created_at' => '2022-03-27 08:36:02',
                'updated_at' => '2022-03-27 08:36:02',
            ),
            45 => 
            array (
                'id' => 546,
                'district_id' => 53,
                'nepali_name' => 'बंगलाचुली गाउँपालिका',
                'english_name' => 'Banglachuli Rural Municipality',
                'created_at' => '2022-03-27 08:36:02',
                'updated_at' => '2022-03-27 08:36:02',
            ),
            46 => 
            array (
                'id' => 547,
                'district_id' => 53,
                'nepali_name' => 'दंगीशरण गाउँपालिका',
                'english_name' => 'Dangisharan Rural Municipality',
                'created_at' => '2022-03-27 08:36:02',
                'updated_at' => '2022-03-27 08:36:02',
            ),
            47 => 
            array (
                'id' => 548,
                'district_id' => 53,
                'nepali_name' => 'बबई गाउँपालिका',
                'english_name' => 'Babai Rural Municipality',
                'created_at' => '2022-03-27 08:36:03',
                'updated_at' => '2022-03-27 08:36:03',
            ),
            48 => 
            array (
                'id' => 549,
                'district_id' => 54,
                'nepali_name' => 'स्वर्गद्वारी नगरपालिका',
                'english_name' => 'Sworgadwari Municipality',
                'created_at' => '2022-03-27 08:36:03',
                'updated_at' => '2022-03-27 08:36:03',
            ),
            49 => 
            array (
                'id' => 550,
                'district_id' => 54,
                'nepali_name' => 'प्यूठान नगरपालिका',
                'english_name' => 'Pyuthan Municipality',
                'created_at' => '2022-03-27 08:36:03',
                'updated_at' => '2022-03-27 08:36:03',
            ),
            50 => 
            array (
                'id' => 551,
                'district_id' => 54,
                'nepali_name' => 'माण्डवी गाउँपालिका',
                'english_name' => 'Mandavi Rural Municipality',
                'created_at' => '2022-03-27 08:36:04',
                'updated_at' => '2022-03-27 08:36:04',
            ),
            51 => 
            array (
                'id' => 552,
                'district_id' => 54,
                'nepali_name' => 'सरुमारानी गाउँपालिका',
                'english_name' => 'Sarumarani Rural Municipality',
                'created_at' => '2022-03-27 08:36:04',
                'updated_at' => '2022-03-27 08:36:04',
            ),
            52 => 
            array (
                'id' => 553,
                'district_id' => 54,
                'nepali_name' => 'ऐरावती गाउँपालिका',
                'english_name' => 'Ayirawati Rural Municipality',
                'created_at' => '2022-03-27 08:36:04',
                'updated_at' => '2022-03-27 08:36:04',
            ),
            53 => 
            array (
                'id' => 554,
                'district_id' => 54,
                'nepali_name' => 'मल्लरानी गाउँपालिका',
                'english_name' => 'Mallarani Rural Municipality',
                'created_at' => '2022-03-27 08:36:05',
                'updated_at' => '2022-03-27 08:36:05',
            ),
            54 => 
            array (
                'id' => 555,
                'district_id' => 54,
                'nepali_name' => 'झिमरुक गाउँपालिका',
                'english_name' => 'Jhimruk Rural Municipality',
                'created_at' => '2022-03-27 08:36:05',
                'updated_at' => '2022-03-27 08:36:05',
            ),
            55 => 
            array (
                'id' => 556,
                'district_id' => 54,
                'nepali_name' => 'नौवहिनी गाउँपालिका',
                'english_name' => 'Naubahini Rural Municipality',
                'created_at' => '2022-03-27 08:36:05',
                'updated_at' => '2022-03-27 08:36:05',
            ),
            56 => 
            array (
                'id' => 557,
                'district_id' => 54,
                'nepali_name' => 'गौमुखी गाउँपालिका',
                'english_name' => 'Gaumukhi Rural Municipality',
                'created_at' => '2022-03-27 08:36:06',
                'updated_at' => '2022-03-27 08:36:06',
            ),
            57 => 
            array (
                'id' => 558,
                'district_id' => 55,
                'nepali_name' => 'रोल्पा नगरपालिका',
                'english_name' => 'Rolpa Municipality',
                'created_at' => '2022-03-27 08:36:06',
                'updated_at' => '2022-03-27 08:36:06',
            ),
            58 => 
            array (
                'id' => 559,
                'district_id' => 55,
                'nepali_name' => 'रुन्टीगढी गाउँपालिका',
                'english_name' => 'Runtigadi Rural Municipality',
                'created_at' => '2022-03-27 08:36:06',
                'updated_at' => '2022-03-27 08:36:06',
            ),
            59 => 
            array (
                'id' => 560,
                'district_id' => 55,
                'nepali_name' => 'त्रिवेणी गाउँपालिका',
                'english_name' => 'Triveni Rural Municipality',
                'created_at' => '2022-03-27 08:36:07',
                'updated_at' => '2022-03-27 08:36:07',
            ),
            60 => 
            array (
                'id' => 561,
                'district_id' => 55,
                'nepali_name' => 'सुनिल स्मृति गाउँपालिका',
                'english_name' => 'Sunil Smiriti Rural Municipality',
                'created_at' => '2022-03-27 08:36:07',
                'updated_at' => '2022-03-27 08:36:07',
            ),
            61 => 
            array (
                'id' => 562,
                'district_id' => 55,
                'nepali_name' => 'लुङग्री गाउँपालिका',
                'english_name' => 'Lungri Rural Municipality',
                'created_at' => '2022-03-27 08:36:07',
                'updated_at' => '2022-03-27 08:36:07',
            ),
            62 => 
            array (
                'id' => 563,
                'district_id' => 55,
                'nepali_name' => 'सुनछहरी गाउँपालिका',
                'english_name' => 'Sunchhahari Rural Municipality',
                'created_at' => '2022-03-27 08:36:08',
                'updated_at' => '2022-03-27 08:36:08',
            ),
            63 => 
            array (
                'id' => 564,
                'district_id' => 55,
                'nepali_name' => 'थवाङ गाउँपालिका',
                'english_name' => 'Thawang Rural Municipality',
                'created_at' => '2022-03-27 08:36:08',
                'updated_at' => '2022-03-27 08:36:08',
            ),
            64 => 
            array (
                'id' => 565,
                'district_id' => 55,
                'nepali_name' => 'माडी गाउँपालिका',
                'english_name' => 'Madi Rural Municipality',
                'created_at' => '2022-03-27 08:36:08',
                'updated_at' => '2022-03-27 08:36:08',
            ),
            65 => 
            array (
                'id' => 566,
                'district_id' => 55,
                'nepali_name' => 'गंगादेव गाउँपालिका',
                'english_name' => 'GangaDev Rural Municipality',
                'created_at' => '2022-03-27 08:36:09',
                'updated_at' => '2022-03-27 08:36:09',
            ),
            66 => 
            array (
                'id' => 567,
                'district_id' => 55,
                'nepali_name' => 'परिवर्तन गाउँपालिका',
                'english_name' => 'Pariwartan Rural Municipality',
                'created_at' => '2022-03-27 08:36:09',
                'updated_at' => '2022-03-27 08:36:09',
            ),
            67 => 
            array (
                'id' => 568,
                'district_id' => 56,
                'nepali_name' => 'पुथा उत्तरगंगा गाउँपालिका',
                'english_name' => 'Putha Uttarganga Rural Municipality',
                'created_at' => '2022-03-27 08:36:10',
                'updated_at' => '2022-03-27 08:36:10',
            ),
            68 => 
            array (
                'id' => 569,
                'district_id' => 56,
                'nepali_name' => 'भूमे गाउँपालिका',
                'english_name' => 'Bhume Rural Municipality',
                'created_at' => '2022-03-27 08:36:10',
                'updated_at' => '2022-03-27 08:36:10',
            ),
            69 => 
            array (
                'id' => 570,
                'district_id' => 56,
                'nepali_name' => 'सिस्ने गाउँपालिका',
                'english_name' => 'Sisne Rural Municipality',
                'created_at' => '2022-03-27 08:36:10',
                'updated_at' => '2022-03-27 08:36:10',
            ),
            70 => 
            array (
                'id' => 571,
                'district_id' => 57,
                'nepali_name' => 'नेपालगंज उपमहानगरपालिका',
                'english_name' => 'Nepalgunj Sub-Metropolitan City',
                'created_at' => '2022-03-27 08:36:11',
                'updated_at' => '2022-03-27 08:36:11',
            ),
            71 => 
            array (
                'id' => 572,
                'district_id' => 57,
                'nepali_name' => 'कोहलपुर नगरपालिका',
                'english_name' => 'Kohalpur Municipality',
                'created_at' => '2022-03-27 08:36:11',
                'updated_at' => '2022-03-27 08:36:11',
            ),
            72 => 
            array (
                'id' => 573,
                'district_id' => 57,
                'nepali_name' => 'राप्ती सोनारी गाउँपालिका',
                'english_name' => 'Rapti-Sonari Rural Municipality',
                'created_at' => '2022-03-27 08:36:11',
                'updated_at' => '2022-03-27 08:36:11',
            ),
            73 => 
            array (
                'id' => 574,
                'district_id' => 57,
                'nepali_name' => 'नरैनापुर गाउँपालिका',
                'english_name' => 'Narainapur Rural Municipality',
                'created_at' => '2022-03-27 08:36:12',
                'updated_at' => '2022-03-27 08:36:12',
            ),
            74 => 
            array (
                'id' => 575,
                'district_id' => 57,
                'nepali_name' => 'डुडुवा गाउँपालिका',
                'english_name' => 'Duduwa Rural Municipality',
                'created_at' => '2022-03-27 08:36:12',
                'updated_at' => '2022-03-27 08:36:12',
            ),
            75 => 
            array (
                'id' => 576,
                'district_id' => 57,
                'nepali_name' => 'जानकी गाउँपालिका',
                'english_name' => 'Janaki Rural Municipality',
                'created_at' => '2022-03-27 08:36:12',
                'updated_at' => '2022-03-27 08:36:12',
            ),
            76 => 
            array (
                'id' => 577,
                'district_id' => 57,
                'nepali_name' => 'खजुरा गाउँपालिका',
                'english_name' => 'Khajura Rural Municipality',
                'created_at' => '2022-03-27 08:36:13',
                'updated_at' => '2022-03-27 08:36:13',
            ),
            77 => 
            array (
                'id' => 578,
                'district_id' => 57,
                'nepali_name' => 'बैजनाथ गाउँपालिका',
                'english_name' => 'Baijanath Rural Municipality',
                'created_at' => '2022-03-27 08:36:13',
                'updated_at' => '2022-03-27 08:36:13',
            ),
            78 => 
            array (
                'id' => 579,
                'district_id' => 58,
                'nepali_name' => 'गुलरिया नगरपालिका',
                'english_name' => 'Gulariya Municipality',
                'created_at' => '2022-03-27 08:36:13',
                'updated_at' => '2022-03-27 08:36:13',
            ),
            79 => 
            array (
                'id' => 580,
                'district_id' => 58,
                'nepali_name' => 'राजापुर नगरपालिका',
                'english_name' => 'Rajapur Municipality',
                'created_at' => '2022-03-27 08:36:14',
                'updated_at' => '2022-03-27 08:36:14',
            ),
            80 => 
            array (
                'id' => 581,
                'district_id' => 58,
                'nepali_name' => 'मधुवन नगरपालिका',
                'english_name' => 'Madhuwan Municipality',
                'created_at' => '2022-03-27 08:36:14',
                'updated_at' => '2022-03-27 08:36:14',
            ),
            81 => 
            array (
                'id' => 582,
                'district_id' => 58,
                'nepali_name' => 'ठाकुरबाबा नगरपालिका',
                'english_name' => 'Thakurbaba Municipality',
                'created_at' => '2022-03-27 08:36:14',
                'updated_at' => '2022-03-27 08:36:14',
            ),
            82 => 
            array (
                'id' => 583,
                'district_id' => 58,
                'nepali_name' => 'बाँसगढी नगरपालिका',
                'english_name' => 'Basgadhi Municipality',
                'created_at' => '2022-03-27 08:36:14',
                'updated_at' => '2022-03-27 08:36:14',
            ),
            83 => 
            array (
                'id' => 584,
                'district_id' => 58,
                'nepali_name' => 'बारबर्दिया नगरपालिका',
                'english_name' => 'Barbardiya Municipality',
                'created_at' => '2022-03-27 08:36:15',
                'updated_at' => '2022-03-27 08:36:15',
            ),
            84 => 
            array (
                'id' => 585,
                'district_id' => 58,
                'nepali_name' => 'बढैयाताल गाउँपालिका',
                'english_name' => 'Badhaiyatal Rural Municipality',
                'created_at' => '2022-03-27 08:36:15',
                'updated_at' => '2022-03-27 08:36:15',
            ),
            85 => 
            array (
                'id' => 586,
                'district_id' => 58,
                'nepali_name' => 'गेरुवा गाउँपालिका',
                'english_name' => 'Geruwa Rural Municipality',
                'created_at' => '2022-03-27 08:36:15',
                'updated_at' => '2022-03-27 08:36:15',
            ),
            86 => 
            array (
                'id' => 587,
                'district_id' => 59,
                'nepali_name' => 'आठबिसकोट नगरपालिका',
                'english_name' => 'Aathabiskot Municipality',
                'created_at' => '2022-03-27 08:36:15',
                'updated_at' => '2022-03-27 08:36:15',
            ),
            87 => 
            array (
                'id' => 588,
                'district_id' => 59,
                'nepali_name' => 'मुसिकोट नगरपालिका',
                'english_name' => 'Musikot Municipality',
                'created_at' => '2022-03-27 08:36:16',
                'updated_at' => '2022-03-27 08:36:16',
            ),
            88 => 
            array (
                'id' => 589,
                'district_id' => 59,
                'nepali_name' => 'चौरजहारी नगरपालिका',
                'english_name' => 'Chaurjahari Municipality',
                'created_at' => '2022-03-27 08:36:16',
                'updated_at' => '2022-03-27 08:36:16',
            ),
            89 => 
            array (
                'id' => 590,
                'district_id' => 59,
                'nepali_name' => 'सानी भेरी गाउँपालिका',
                'english_name' => 'SaniBheri Rural Municipality',
                'created_at' => '2022-03-27 08:36:16',
                'updated_at' => '2022-03-27 08:36:16',
            ),
            90 => 
            array (
                'id' => 591,
                'district_id' => 59,
                'nepali_name' => 'त्रिवेणी गाउँपालिका',
                'english_name' => 'Triveni Rural Municipality',
                'created_at' => '2022-03-27 08:36:17',
                'updated_at' => '2022-03-27 08:36:17',
            ),
            91 => 
            array (
                'id' => 592,
                'district_id' => 59,
                'nepali_name' => 'बाँफिकोट गाउँपालिका',
                'english_name' => 'Banphikot Rural Municipality',
                'created_at' => '2022-03-27 08:36:17',
                'updated_at' => '2022-03-27 08:36:17',
            ),
            92 => 
            array (
                'id' => 593,
                'district_id' => 60,
                'nepali_name' => 'कुमाख गाउँपालिका',
                'english_name' => 'Kumakh Rural Municipality',
                'created_at' => '2022-03-27 08:36:17',
                'updated_at' => '2022-03-27 08:36:17',
            ),
            93 => 
            array (
                'id' => 594,
                'district_id' => 60,
                'nepali_name' => 'कालिमाटी गाउँपालिका',
                'english_name' => 'Kalimati Rural Municipality',
                'created_at' => '2022-03-27 08:36:17',
                'updated_at' => '2022-03-27 08:36:17',
            ),
            94 => 
            array (
                'id' => 595,
                'district_id' => 60,
                'nepali_name' => 'छत्रेश्वरी गाउँपालिका',
                'english_name' => 'Chhatreshwari Rural Municipality',
                'created_at' => '2022-03-27 08:36:18',
                'updated_at' => '2022-03-27 08:36:18',
            ),
            95 => 
            array (
                'id' => 596,
                'district_id' => 60,
                'nepali_name' => 'दार्मा गाउँपालिका',
                'english_name' => 'Darma Rural Municipality',
                'created_at' => '2022-03-27 08:36:18',
                'updated_at' => '2022-03-27 08:36:18',
            ),
            96 => 
            array (
                'id' => 597,
                'district_id' => 60,
                'nepali_name' => 'कपुरकोट गाउँपालिका',
                'english_name' => 'Kapurkot Rural Municipality',
                'created_at' => '2022-03-27 08:36:18',
                'updated_at' => '2022-03-27 08:36:18',
            ),
            97 => 
            array (
                'id' => 598,
                'district_id' => 60,
                'nepali_name' => 'त्रिवेणी गाउँपालिका',
                'english_name' => 'Triveni Rural Municipality',
                'created_at' => '2022-03-27 08:36:19',
                'updated_at' => '2022-03-27 08:36:19',
            ),
            98 => 
            array (
                'id' => 599,
                'district_id' => 60,
                'nepali_name' => 'सिद्ध कुमाख गाउँपालिका',
                'english_name' => 'Siddha Kumakh Rural Municipality',
                'created_at' => '2022-03-27 08:36:19',
                'updated_at' => '2022-03-27 08:36:19',
            ),
            99 => 
            array (
                'id' => 600,
                'district_id' => 60,
                'nepali_name' => 'बागचौर नगरपालिका',
                'english_name' => 'Bagchaur Municipality',
                'created_at' => '2022-03-27 08:36:20',
                'updated_at' => '2022-03-27 08:36:20',
            ),
            100 => 
            array (
                'id' => 601,
                'district_id' => 60,
                'nepali_name' => 'शारदा नगरपालिका',
                'english_name' => 'Shaarda Municipality',
                'created_at' => '2022-03-27 08:36:20',
                'updated_at' => '2022-03-27 08:36:20',
            ),
            101 => 
            array (
                'id' => 602,
                'district_id' => 60,
                'nepali_name' => 'बनगाड कुपिण्डे नगरपालिका',
                'english_name' => 'Bangad Kupinde Municipality',
                'created_at' => '2022-03-27 08:36:20',
                'updated_at' => '2022-03-27 08:36:20',
            ),
            102 => 
            array (
                'id' => 603,
                'district_id' => 61,
                'nepali_name' => 'मुड्केचुला गाउँपालिका',
                'english_name' => 'Mudkechula Rural Municipality',
                'created_at' => '2022-03-27 08:36:21',
                'updated_at' => '2022-03-27 08:36:21',
            ),
            103 => 
            array (
                'id' => 604,
                'district_id' => 61,
                'nepali_name' => 'काईके गाउँपालिका',
                'english_name' => 'Kaike Rural Municipality',
                'created_at' => '2022-03-27 08:36:21',
                'updated_at' => '2022-03-27 08:36:21',
            ),
            104 => 
            array (
                'id' => 605,
                'district_id' => 61,
                'nepali_name' => 'शे फोक्सुन्डो गाउँपालिका',
                'english_name' => 'She Phoksundo Rural Municipality',
                'created_at' => '2022-03-27 08:36:21',
                'updated_at' => '2022-03-27 08:36:21',
            ),
            105 => 
            array (
                'id' => 606,
                'district_id' => 61,
                'nepali_name' => 'जगदुल्ला गाउँपालिका',
                'english_name' => 'Jagadulla Rural Municipality',
                'created_at' => '2022-03-27 08:36:22',
                'updated_at' => '2022-03-27 08:36:22',
            ),
            106 => 
            array (
                'id' => 607,
                'district_id' => 61,
                'nepali_name' => 'डोल्पो बुद्ध गाउँपालिका',
                'english_name' => 'Dolpo Buddha Rural Municipality',
                'created_at' => '2022-03-27 08:36:22',
                'updated_at' => '2022-03-27 08:36:22',
            ),
            107 => 
            array (
                'id' => 608,
                'district_id' => 61,
                'nepali_name' => 'छार्का ताङसोङ गाउँपालिका',
                'english_name' => 'Chharka Tongsong Rural Municipality',
                'created_at' => '2022-03-27 08:36:22',
                'updated_at' => '2022-03-27 08:36:22',
            ),
            108 => 
            array (
                'id' => 609,
                'district_id' => 61,
                'nepali_name' => 'ठूली भेरी नगरपालिका',
                'english_name' => 'Thuli Bheri Municipality',
                'created_at' => '2022-03-27 08:36:22',
                'updated_at' => '2022-03-27 08:36:22',
            ),
            109 => 
            array (
                'id' => 610,
                'district_id' => 61,
                'nepali_name' => 'त्रिपुरासुन्दरी नगरपालिका',
                'english_name' => 'Tripurasundari Municipality',
                'created_at' => '2022-03-27 08:36:23',
                'updated_at' => '2022-03-27 08:36:23',
            ),
            110 => 
            array (
                'id' => 611,
                'district_id' => 62,
                'nepali_name' => 'सिमकोट गाउँपालिका',
                'english_name' => 'Simkot Rural Municipality',
                'created_at' => '2022-03-27 08:36:23',
                'updated_at' => '2022-03-27 08:36:23',
            ),
            111 => 
            array (
                'id' => 612,
                'district_id' => 62,
                'nepali_name' => 'सर्केगाड गाउँपालिका',
                'english_name' => 'Sarkegad Rural Municipality',
                'created_at' => '2022-03-27 08:36:23',
                'updated_at' => '2022-03-27 08:36:23',
            ),
            112 => 
            array (
                'id' => 613,
                'district_id' => 62,
                'nepali_name' => 'अदानचुली गाउँपालिका',
                'english_name' => 'Adanchuli Rural Municipality',
                'created_at' => '2022-03-27 08:36:24',
                'updated_at' => '2022-03-27 08:36:24',
            ),
            113 => 
            array (
                'id' => 614,
                'district_id' => 62,
                'nepali_name' => 'खार्पुनाथ गाउँपालिका',
                'english_name' => 'Kharpunath Rural Municipality',
                'created_at' => '2022-03-27 08:36:24',
                'updated_at' => '2022-03-27 08:36:24',
            ),
            114 => 
            array (
                'id' => 615,
                'district_id' => 62,
                'nepali_name' => 'ताँजाकोट गाउँपालिका',
                'english_name' => 'Tanjakot Rural Municipality',
                'created_at' => '2022-03-27 08:36:24',
                'updated_at' => '2022-03-27 08:36:24',
            ),
            115 => 
            array (
                'id' => 616,
                'district_id' => 62,
                'nepali_name' => 'चंखेली गाउँपालिका',
                'english_name' => 'Chankheli Rural Municipality',
                'created_at' => '2022-03-27 08:36:25',
                'updated_at' => '2022-03-27 08:36:25',
            ),
            116 => 
            array (
                'id' => 617,
                'district_id' => 62,
                'nepali_name' => 'नाम्खा गाउँपालिका',
                'english_name' => 'Namkha Rural Municipality',
                'created_at' => '2022-03-27 08:36:25',
                'updated_at' => '2022-03-27 08:36:25',
            ),
            117 => 
            array (
                'id' => 618,
                'district_id' => 63,
                'nepali_name' => 'तातोपानी गाउँपालिका',
                'english_name' => 'Tatopani Rural Municipality',
                'created_at' => '2022-03-27 08:36:25',
                'updated_at' => '2022-03-27 08:36:25',
            ),
            118 => 
            array (
                'id' => 619,
                'district_id' => 63,
                'nepali_name' => 'पातारासी गाउँपालिका',
                'english_name' => 'Patarasi Rural Municipality',
                'created_at' => '2022-03-27 08:36:26',
                'updated_at' => '2022-03-27 08:36:26',
            ),
            119 => 
            array (
                'id' => 620,
                'district_id' => 63,
                'nepali_name' => 'तिला गाउँपालिका',
                'english_name' => 'Tila Rural Municipality',
                'created_at' => '2022-03-27 08:36:26',
                'updated_at' => '2022-03-27 08:36:26',
            ),
            120 => 
            array (
                'id' => 621,
                'district_id' => 63,
                'nepali_name' => 'कनकासुन्दरी गाउँपालिका',
                'english_name' => 'Kanaka Sundari Rural Municipality',
                'created_at' => '2022-03-27 08:36:26',
                'updated_at' => '2022-03-27 08:36:26',
            ),
            121 => 
            array (
                'id' => 622,
                'district_id' => 63,
                'nepali_name' => 'सिंजा गाउँपालिका',
                'english_name' => 'Sinja Rural Municipality',
                'created_at' => '2022-03-27 08:36:26',
                'updated_at' => '2022-03-27 08:36:26',
            ),
            122 => 
            array (
                'id' => 623,
                'district_id' => 63,
                'nepali_name' => 'हिमा गाउँपालिका',
                'english_name' => 'Hima Rural Municipality',
                'created_at' => '2022-03-27 08:36:27',
                'updated_at' => '2022-03-27 08:36:27',
            ),
            123 => 
            array (
                'id' => 624,
                'district_id' => 63,
                'nepali_name' => 'गुठिचौर गाउँपालिका',
                'english_name' => 'Guthichaur Rural Municipality',
                'created_at' => '2022-03-27 08:36:27',
                'updated_at' => '2022-03-27 08:36:27',
            ),
            124 => 
            array (
                'id' => 625,
                'district_id' => 63,
                'nepali_name' => 'चन्दननाथ नगरपालिका',
                'english_name' => 'Chandannath Municipality',
                'created_at' => '2022-03-27 08:36:27',
                'updated_at' => '2022-03-27 08:36:27',
            ),
            125 => 
            array (
                'id' => 626,
                'district_id' => 64,
                'nepali_name' => 'खाँडाचक्र नगरपालिका',
                'english_name' => 'Khandachakra Municipality',
                'created_at' => '2022-03-27 08:36:28',
                'updated_at' => '2022-03-27 08:36:28',
            ),
            126 => 
            array (
                'id' => 627,
                'district_id' => 64,
                'nepali_name' => 'रास्कोट नगरपालिका',
                'english_name' => 'Raskot Municipality',
                'created_at' => '2022-03-27 08:36:28',
                'updated_at' => '2022-03-27 08:36:28',
            ),
            127 => 
            array (
                'id' => 628,
                'district_id' => 64,
                'nepali_name' => 'तिलागुफा नगरपालिका',
                'english_name' => 'Tilagufa Municipality',
                'created_at' => '2022-03-27 08:36:28',
                'updated_at' => '2022-03-27 08:36:28',
            ),
            128 => 
            array (
                'id' => 629,
                'district_id' => 64,
                'nepali_name' => 'नरहरिनाथ गाउँपालिका',
                'english_name' => 'Narharinath Rural Municipality',
                'created_at' => '2022-03-27 08:36:29',
                'updated_at' => '2022-03-27 08:36:29',
            ),
            129 => 
            array (
                'id' => 630,
                'district_id' => 64,
                'nepali_name' => 'पलाता गाउँपालिका',
                'english_name' => 'Palata Rural Municipality',
                'created_at' => '2022-03-27 08:36:29',
                'updated_at' => '2022-03-27 08:36:29',
            ),
            130 => 
            array (
                'id' => 631,
                'district_id' => 64,
                'nepali_name' => 'शुभ कालीका गाउँपालिका',
                'english_name' => 'Shubha Kalika Rural Municipality',
                'created_at' => '2022-03-27 08:36:29',
                'updated_at' => '2022-03-27 08:36:29',
            ),
            131 => 
            array (
                'id' => 632,
                'district_id' => 64,
                'nepali_name' => 'सान्नी त्रिवेणी गाउँपालिका',
                'english_name' => 'Sanni Triveni Rural Municipality',
                'created_at' => '2022-03-27 08:36:29',
                'updated_at' => '2022-03-27 08:36:29',
            ),
            132 => 
            array (
                'id' => 633,
                'district_id' => 64,
                'nepali_name' => 'पचालझरना गाउँपालिका',
                'english_name' => 'Pachaljharana Rural Municipalit',
                'created_at' => '2022-03-27 08:36:30',
                'updated_at' => '2022-03-27 08:36:30',
            ),
            133 => 
            array (
                'id' => 634,
                'district_id' => 64,
                'nepali_name' => 'महावै गाउँपालिका',
                'english_name' => 'Mahawai Rural Municipality',
                'created_at' => '2022-03-27 08:36:30',
                'updated_at' => '2022-03-27 08:36:30',
            ),
            134 => 
            array (
                'id' => 635,
                'district_id' => 65,
                'nepali_name' => 'खत्याड गाउँपालिका',
                'english_name' => 'Khatyad Rural Municipality',
                'created_at' => '2022-03-27 08:36:30',
                'updated_at' => '2022-03-27 08:36:30',
            ),
            135 => 
            array (
                'id' => 636,
                'district_id' => 65,
                'nepali_name' => 'सोरु गाउँपालिका',
                'english_name' => 'Soru Rural Municipality',
                'created_at' => '2022-03-27 08:36:31',
                'updated_at' => '2022-03-27 08:36:31',
            ),
            136 => 
            array (
                'id' => 637,
                'district_id' => 65,
                'nepali_name' => 'मुगुम कार्मारोंग गाउँपालिका',
                'english_name' => 'Mugum Karmarong Rural Municipality',
                'created_at' => '2022-03-27 08:36:31',
                'updated_at' => '2022-03-27 08:36:31',
            ),
            137 => 
            array (
                'id' => 638,
                'district_id' => 65,
                'nepali_name' => 'छायाँनाथ रारा नगरपालिका',
                'english_name' => 'Chhayanath Rara Municipality',
                'created_at' => '2022-03-27 08:36:32',
                'updated_at' => '2022-03-27 08:36:32',
            ),
            138 => 
            array (
                'id' => 639,
                'district_id' => 66,
                'nepali_name' => 'सिम्ता गाउँपालिका',
                'english_name' => 'Simta Rural Municipality',
                'created_at' => '2022-03-27 08:36:32',
                'updated_at' => '2022-03-27 08:36:32',
            ),
            139 => 
            array (
                'id' => 640,
                'district_id' => 66,
                'nepali_name' => 'बराहताल गाउँपालिका',
                'english_name' => 'Barahatal Rural Municipality',
                'created_at' => '2022-03-27 08:36:33',
                'updated_at' => '2022-03-27 08:36:33',
            ),
            140 => 
            array (
                'id' => 641,
                'district_id' => 66,
                'nepali_name' => 'चौकुने गाउँपालिका',
                'english_name' => 'Chaukune Rural Municipality',
                'created_at' => '2022-03-27 08:36:33',
                'updated_at' => '2022-03-27 08:36:33',
            ),
            141 => 
            array (
                'id' => 642,
                'district_id' => 66,
                'nepali_name' => 'चिङ्गाड गाउँपालिका',
                'english_name' => 'Chingad Rural Municipality',
                'created_at' => '2022-03-27 08:36:33',
                'updated_at' => '2022-03-27 08:36:33',
            ),
            142 => 
            array (
                'id' => 643,
                'district_id' => 66,
                'nepali_name' => 'गुर्भाकोट नगरपालिका',
                'english_name' => 'Gurbhakot Municipality',
                'created_at' => '2022-03-27 08:36:34',
                'updated_at' => '2022-03-27 08:36:34',
            ),
            143 => 
            array (
                'id' => 644,
                'district_id' => 66,
                'nepali_name' => 'बीरेन्द्रनगर नगरपालिका',
                'english_name' => 'Birendranagar Municipality',
                'created_at' => '2022-03-27 08:36:34',
                'updated_at' => '2022-03-27 08:36:34',
            ),
            144 => 
            array (
                'id' => 645,
                'district_id' => 66,
                'nepali_name' => 'भेरीगंगा नगरपालिका',
                'english_name' => 'Bheriganga Municipality',
                'created_at' => '2022-03-27 08:36:34',
                'updated_at' => '2022-03-27 08:36:34',
            ),
            145 => 
            array (
                'id' => 646,
                'district_id' => 66,
                'nepali_name' => 'पञ्चपुरी नगरपालिका',
                'english_name' => 'Panchapuri Municipality',
                'created_at' => '2022-03-27 08:36:35',
                'updated_at' => '2022-03-27 08:36:35',
            ),
            146 => 
            array (
                'id' => 647,
                'district_id' => 66,
                'nepali_name' => 'लेकवेशी नगरपालिका',
                'english_name' => 'Lekbeshi Municipality',
                'created_at' => '2022-03-27 08:36:35',
                'updated_at' => '2022-03-27 08:36:35',
            ),
            147 => 
            array (
                'id' => 648,
                'district_id' => 67,
                'nepali_name' => 'दुल्लु नगरपालिका',
                'english_name' => 'Dullu Municipality',
                'created_at' => '2022-03-27 08:36:35',
                'updated_at' => '2022-03-27 08:36:35',
            ),
            148 => 
            array (
                'id' => 649,
                'district_id' => 67,
                'nepali_name' => 'गुराँस गाउँपालिका',
                'english_name' => 'Gurans Rural Municipality',
                'created_at' => '2022-03-27 08:36:36',
                'updated_at' => '2022-03-27 08:36:36',
            ),
            149 => 
            array (
                'id' => 650,
                'district_id' => 67,
                'nepali_name' => 'भैरवी गाउँपालिका',
                'english_name' => 'Bhairabi Rural Municipality',
                'created_at' => '2022-03-27 08:36:36',
                'updated_at' => '2022-03-27 08:36:36',
            ),
            150 => 
            array (
                'id' => 651,
                'district_id' => 67,
                'nepali_name' => 'नौमुले गाउँपालिका',
                'english_name' => 'Naumule Rural Municipality',
                'created_at' => '2022-03-27 08:36:36',
                'updated_at' => '2022-03-27 08:36:36',
            ),
            151 => 
            array (
                'id' => 652,
                'district_id' => 67,
                'nepali_name' => 'महावु गाउँपालिका',
                'english_name' => 'Mahabu Rural Municipality',
                'created_at' => '2022-03-27 08:36:37',
                'updated_at' => '2022-03-27 08:36:37',
            ),
            152 => 
            array (
                'id' => 653,
                'district_id' => 67,
                'nepali_name' => 'ठाँटीकाँध गाउँपालिका',
                'english_name' => 'Thantikandh Rural Municipality',
                'created_at' => '2022-03-27 08:36:37',
                'updated_at' => '2022-03-27 08:36:37',
            ),
            153 => 
            array (
                'id' => 654,
                'district_id' => 67,
                'nepali_name' => 'भगवतीमाई गाउँपालिका',
                'english_name' => 'Bhagawatimai Rural Municipality',
                'created_at' => '2022-03-27 08:36:37',
                'updated_at' => '2022-03-27 08:36:37',
            ),
            154 => 
            array (
                'id' => 655,
                'district_id' => 67,
                'nepali_name' => 'डुंगेश्वर गाउँपालिका',
                'english_name' => 'Dungeshwar Rural Municipality',
                'created_at' => '2022-03-27 08:36:38',
                'updated_at' => '2022-03-27 08:36:38',
            ),
            155 => 
            array (
                'id' => 656,
                'district_id' => 67,
                'nepali_name' => 'आठबीस नगरपालिका',
                'english_name' => 'Aathabis Municipality',
                'created_at' => '2022-03-27 08:36:38',
                'updated_at' => '2022-03-27 08:36:38',
            ),
            156 => 
            array (
                'id' => 657,
                'district_id' => 67,
                'nepali_name' => 'नारायण नगरपालिका',
                'english_name' => 'Narayan Municipality',
                'created_at' => '2022-03-27 08:36:38',
                'updated_at' => '2022-03-27 08:36:38',
            ),
            157 => 
            array (
                'id' => 658,
                'district_id' => 67,
                'nepali_name' => 'चामुण्डा विन्द्रासैनी नगरपालिका',
                'english_name' => 'Chamunda Bindrasaini Municipality',
                'created_at' => '2022-03-27 08:36:39',
                'updated_at' => '2022-03-27 08:36:39',
            ),
            158 => 
            array (
                'id' => 659,
                'district_id' => 68,
                'nepali_name' => 'छेडागाड नगरपालिका',
                'english_name' => 'Chhedagad Municipality',
                'created_at' => '2022-03-27 08:36:39',
                'updated_at' => '2022-03-27 08:36:39',
            ),
            159 => 
            array (
                'id' => 660,
                'district_id' => 68,
                'nepali_name' => 'भेरी नगरपालिका',
                'english_name' => 'Bheri Municipality',
                'created_at' => '2022-03-27 08:36:39',
                'updated_at' => '2022-03-27 08:36:39',
            ),
            160 => 
            array (
                'id' => 661,
                'district_id' => 68,
                'nepali_name' => 'नलगाड नगरपालिका',
                'english_name' => 'Nalgad Municipality',
                'created_at' => '2022-03-27 08:36:39',
                'updated_at' => '2022-03-27 08:36:39',
            ),
            161 => 
            array (
                'id' => 662,
                'district_id' => 68,
                'nepali_name' => 'जुनीचाँदे गाउँपालिका',
                'english_name' => 'Junichande Rural Municipality',
                'created_at' => '2022-03-27 08:36:40',
                'updated_at' => '2022-03-27 08:36:40',
            ),
            162 => 
            array (
                'id' => 663,
                'district_id' => 68,
                'nepali_name' => 'कुसे गाउँपालिका',
                'english_name' => 'Kuse Rural Municipality',
                'created_at' => '2022-03-27 08:36:40',
                'updated_at' => '2022-03-27 08:36:40',
            ),
            163 => 
            array (
                'id' => 664,
                'district_id' => 68,
                'nepali_name' => 'बारेकोट गाउँपालिका',
                'english_name' => 'Barekot Rural Municipality',
                'created_at' => '2022-03-27 08:36:40',
                'updated_at' => '2022-03-27 08:36:40',
            ),
            164 => 
            array (
                'id' => 665,
                'district_id' => 68,
                'nepali_name' => 'शिवालय गाउँपालिका',
                'english_name' => 'Shivalaya Rural Municipality',
                'created_at' => '2022-03-27 08:36:41',
                'updated_at' => '2022-03-27 08:36:41',
            ),
            165 => 
            array (
                'id' => 666,
                'district_id' => 69,
                'nepali_name' => 'महाकाली नगरपालिका',
                'english_name' => 'Mahakali Municipality',
                'created_at' => '2022-03-27 08:36:41',
                'updated_at' => '2022-03-27 08:36:41',
            ),
            166 => 
            array (
                'id' => 667,
                'district_id' => 69,
                'nepali_name' => 'शैल्यशिखर नगरपालिका',
                'english_name' => 'Shailyashikhar Municipality',
                'created_at' => '2022-03-27 08:36:41',
                'updated_at' => '2022-03-27 08:36:41',
            ),
            167 => 
            array (
                'id' => 668,
                'district_id' => 69,
                'nepali_name' => 'नौगाड गाउँपालिका',
                'english_name' => 'Naugad Rural Municipality',
                'created_at' => '2022-03-27 08:36:42',
                'updated_at' => '2022-03-27 08:36:42',
            ),
            168 => 
            array (
                'id' => 669,
                'district_id' => 69,
                'nepali_name' => 'मालिकार्जुन गाउँपालिका',
                'english_name' => 'Malikarjun Rural Municipality',
                'created_at' => '2022-03-27 08:36:42',
                'updated_at' => '2022-03-27 08:36:42',
            ),
            169 => 
            array (
                'id' => 670,
                'district_id' => 69,
                'nepali_name' => 'मार्मा गाउँपालिका',
                'english_name' => 'Marma Rural Municipality',
                'created_at' => '2022-03-27 08:36:42',
                'updated_at' => '2022-03-27 08:36:42',
            ),
            170 => 
            array (
                'id' => 671,
                'district_id' => 69,
                'nepali_name' => 'लेकम गाउँपालिका',
                'english_name' => 'Lekam Rural Municipality',
                'created_at' => '2022-03-27 08:36:43',
                'updated_at' => '2022-03-27 08:36:43',
            ),
            171 => 
            array (
                'id' => 672,
                'district_id' => 69,
                'nepali_name' => 'दुहुँ गाउँपालिका',
                'english_name' => 'Duhun Rural Municipality',
                'created_at' => '2022-03-27 08:36:43',
                'updated_at' => '2022-03-27 08:36:43',
            ),
            172 => 
            array (
                'id' => 673,
                'district_id' => 69,
                'nepali_name' => 'ब्याँस गाउँपालिका',
                'english_name' => 'Vyans Rural Municipality',
                'created_at' => '2022-03-27 08:36:43',
                'updated_at' => '2022-03-27 08:36:43',
            ),
            173 => 
            array (
                'id' => 674,
                'district_id' => 69,
                'nepali_name' => 'अपिहिमाल गाउँपालिका',
                'english_name' => 'Apihimal Rural Municipality',
                'created_at' => '2022-03-27 08:36:43',
                'updated_at' => '2022-03-27 08:36:43',
            ),
            174 => 
            array (
                'id' => 675,
                'district_id' => 70,
                'nepali_name' => 'जयपृथ्वी नगरपालिका',
                'english_name' => 'Jayaprithvi Municipality',
                'created_at' => '2022-03-27 08:36:44',
                'updated_at' => '2022-03-27 08:36:44',
            ),
            175 => 
            array (
                'id' => 676,
                'district_id' => 70,
                'nepali_name' => 'बुंगल नगरपालिका',
                'english_name' => 'Bungal Municipality',
                'created_at' => '2022-03-27 08:36:44',
                'updated_at' => '2022-03-27 08:36:44',
            ),
            176 => 
            array (
                'id' => 677,
                'district_id' => 70,
                'nepali_name' => 'केदारस्युँ गाउँपालिका',
                'english_name' => 'Kedarsyu Rural Municipality',
                'created_at' => '2022-03-27 08:36:44',
                'updated_at' => '2022-03-27 08:36:44',
            ),
            177 => 
            array (
                'id' => 678,
                'district_id' => 70,
                'nepali_name' => 'थलारा गाउँपालिका',
                'english_name' => 'Thalara Rural Municipality',
                'created_at' => '2022-03-27 08:36:45',
                'updated_at' => '2022-03-27 08:36:45',
            ),
            178 => 
            array (
                'id' => 679,
                'district_id' => 70,
                'nepali_name' => 'वित्थडचिर गाउँपालिका',
                'english_name' => 'Bitthadchir Rural Municipality',
                'created_at' => '2022-03-27 08:36:45',
                'updated_at' => '2022-03-27 08:36:45',
            ),
            179 => 
            array (
                'id' => 680,
                'district_id' => 70,
                'nepali_name' => 'छबिसपाथिभेरा गाउँपालिका',
                'english_name' => 'Chhabis Pathibhera Rural Municipality',
                'created_at' => '2022-03-27 08:36:45',
                'updated_at' => '2022-03-27 08:36:45',
            ),
            180 => 
            array (
                'id' => 681,
                'district_id' => 70,
                'nepali_name' => 'खप्तडछान्ना गाउँपालिका',
                'english_name' => 'Khaptadchhanna Rural Municipality',
                'created_at' => '2022-03-27 08:36:46',
                'updated_at' => '2022-03-27 08:36:46',
            ),
            181 => 
            array (
                'id' => 682,
                'district_id' => 70,
                'nepali_name' => 'मष्टा गाउँपालिका',
                'english_name' => 'Masta Rural Municipality',
                'created_at' => '2022-03-27 08:36:46',
                'updated_at' => '2022-03-27 08:36:46',
            ),
            182 => 
            array (
                'id' => 683,
                'district_id' => 70,
                'nepali_name' => 'दुर्गाथली गाउँपालिका',
                'english_name' => 'Durgathali Rural Municipality',
                'created_at' => '2022-03-27 08:36:47',
                'updated_at' => '2022-03-27 08:36:47',
            ),
            183 => 
            array (
                'id' => 684,
                'district_id' => 70,
                'nepali_name' => 'तलकोट गाउँपालिका',
                'english_name' => 'Talkot Rural Municipality',
                'created_at' => '2022-03-27 08:36:47',
                'updated_at' => '2022-03-27 08:36:47',
            ),
            184 => 
            array (
                'id' => 685,
                'district_id' => 70,
                'nepali_name' => 'सूर्मा गाउँपालिका',
                'english_name' => 'Surma Rural Municipality',
                'created_at' => '2022-03-27 08:36:47',
                'updated_at' => '2022-03-27 08:36:47',
            ),
            185 => 
            array (
                'id' => 686,
                'district_id' => 70,
                'nepali_name' => 'साइपाल गाउँपालिका',
                'english_name' => 'Saipal Rural Municipality',
                'created_at' => '2022-03-27 08:36:48',
                'updated_at' => '2022-03-27 08:36:48',
            ),
            186 => 
            array (
                'id' => 687,
                'district_id' => 71,
                'nepali_name' => 'बडीमालिका नगरपालिका',
                'english_name' => 'Badimalika Municipality',
                'created_at' => '2022-03-27 08:36:48',
                'updated_at' => '2022-03-27 08:36:48',
            ),
            187 => 
            array (
                'id' => 688,
                'district_id' => 71,
                'nepali_name' => 'त्रिवेणी नगरपालिका',
                'english_name' => 'Triveni Municipality',
                'created_at' => '2022-03-27 08:36:48',
                'updated_at' => '2022-03-27 08:36:48',
            ),
            188 => 
            array (
                'id' => 689,
                'district_id' => 71,
                'nepali_name' => 'बुढीगंगा नगरपालिका',
                'english_name' => 'Budhiganga Municipality',
                'created_at' => '2022-03-27 08:36:48',
                'updated_at' => '2022-03-27 08:36:48',
            ),
            189 => 
            array (
                'id' => 690,
                'district_id' => 71,
                'nepali_name' => 'बुढीनन्दा नगरपालिका',
                'english_name' => 'Budhinanda Municipality',
                'created_at' => '2022-03-27 08:36:49',
                'updated_at' => '2022-03-27 08:36:49',
            ),
            190 => 
            array (
                'id' => 691,
                'district_id' => 71,
                'nepali_name' => 'खप्तड छेडेदह गाउँपालिका',
                'english_name' => 'Khaptad Chhededaha Rural Municipality',
                'created_at' => '2022-03-27 08:36:49',
                'updated_at' => '2022-03-27 08:36:49',
            ),
            191 => 
            array (
                'id' => 692,
                'district_id' => 71,
                'nepali_name' => 'स्वामीकार्तिक खापर गाउँपालिका',
                'english_name' => 'Swami Kartik Khapar Rural Municipality',
                'created_at' => '2022-03-27 08:36:49',
                'updated_at' => '2022-03-27 08:36:49',
            ),
            192 => 
            array (
                'id' => 693,
                'district_id' => 71,
                'nepali_name' => 'जगन्‍नाथ गाउँपालिका',
                'english_name' => 'Jagannath Rural Municipality',
                'created_at' => '2022-03-27 08:36:49',
                'updated_at' => '2022-03-27 08:36:49',
            ),
            193 => 
            array (
                'id' => 694,
                'district_id' => 71,
                'nepali_name' => 'हिमाली गाउँपालिका',
                'english_name' => 'Himali Rural Municipality',
                'created_at' => '2022-03-27 08:36:50',
                'updated_at' => '2022-03-27 08:36:50',
            ),
            194 => 
            array (
                'id' => 695,
                'district_id' => 71,
                'nepali_name' => 'गौमुल गाउँपालिका',
                'english_name' => 'Gaumul Rural Municipality',
                'created_at' => '2022-03-27 08:36:50',
                'updated_at' => '2022-03-27 08:36:50',
            ),
            195 => 
            array (
                'id' => 696,
                'district_id' => 72,
                'nepali_name' => 'दशरथचन्द नगरपालिका',
                'english_name' => 'Dashrathchanda Municipality',
                'created_at' => '2022-03-27 08:36:51',
                'updated_at' => '2022-03-27 08:36:51',
            ),
            196 => 
            array (
                'id' => 697,
                'district_id' => 72,
                'nepali_name' => 'पाटन नगरपालिका',
                'english_name' => 'Patan Municipality',
                'created_at' => '2022-03-27 08:36:51',
                'updated_at' => '2022-03-27 08:36:51',
            ),
            197 => 
            array (
                'id' => 698,
                'district_id' => 72,
                'nepali_name' => 'मेलौली नगरपालिका',
                'english_name' => 'Melauli Municipality',
                'created_at' => '2022-03-27 08:36:51',
                'updated_at' => '2022-03-27 08:36:51',
            ),
            198 => 
            array (
                'id' => 699,
                'district_id' => 72,
                'nepali_name' => 'पुर्चौडी नगरपालिका',
                'english_name' => 'Purchaudi Municipality',
                'created_at' => '2022-03-27 08:36:51',
                'updated_at' => '2022-03-27 08:36:51',
            ),
            199 => 
            array (
                'id' => 700,
                'district_id' => 72,
                'nepali_name' => 'दोगडाकेदार गाउँपालिका',
                'english_name' => 'Dogdakedar Rural Municipality',
                'created_at' => '2022-03-27 08:36:52',
                'updated_at' => '2022-03-27 08:36:52',
            ),
            200 => 
            array (
                'id' => 701,
                'district_id' => 72,
                'nepali_name' => 'डीलासैनी गाउँपालिका',
                'english_name' => 'Dilashaini Rural Municipality',
                'created_at' => '2022-03-27 08:36:52',
                'updated_at' => '2022-03-27 08:36:52',
            ),
            201 => 
            array (
                'id' => 702,
                'district_id' => 72,
                'nepali_name' => 'सिगास गाउँपालिका',
                'english_name' => 'Sigas Rural Municipality',
                'created_at' => '2022-03-27 08:36:52',
                'updated_at' => '2022-03-27 08:36:52',
            ),
            202 => 
            array (
                'id' => 703,
                'district_id' => 72,
                'nepali_name' => 'पञ्चेश्वर गाउँपालिका',
                'english_name' => 'Pancheshwar Rural Municipality',
                'created_at' => '2022-03-27 08:36:53',
                'updated_at' => '2022-03-27 08:36:53',
            ),
            203 => 
            array (
                'id' => 704,
                'district_id' => 72,
                'nepali_name' => 'सुर्नया गाउँपालिका',
                'english_name' => 'Surnaya Rural Municipality',
                'created_at' => '2022-03-27 08:36:53',
                'updated_at' => '2022-03-27 08:36:53',
            ),
            204 => 
            array (
                'id' => 705,
                'district_id' => 72,
                'nepali_name' => 'शिवनाथ गाउँपालिका',
                'english_name' => 'Shivanath Rural Municipality',
                'created_at' => '2022-03-27 08:36:53',
                'updated_at' => '2022-03-27 08:36:53',
            ),
            205 => 
            array (
                'id' => 706,
                'district_id' => 73,
                'nepali_name' => 'दिपायल सिलगढी नगरपालिका',
                'english_name' => 'Dipayal Silgadhi Municipality',
                'created_at' => '2022-03-27 08:36:54',
                'updated_at' => '2022-03-27 08:36:54',
            ),
            206 => 
            array (
                'id' => 707,
                'district_id' => 73,
                'nepali_name' => 'शिखर नगरपालिका',
                'english_name' => 'Shikhar Municipality',
                'created_at' => '2022-03-27 08:36:54',
                'updated_at' => '2022-03-27 08:36:54',
            ),
            207 => 
            array (
                'id' => 708,
                'district_id' => 73,
                'nepali_name' => 'आदर्श गाउँपालिका',
                'english_name' => 'Aadarsha Rural Municipality',
                'created_at' => '2022-03-27 08:36:55',
                'updated_at' => '2022-03-27 08:36:55',
            ),
            208 => 
            array (
                'id' => 709,
                'district_id' => 73,
                'nepali_name' => 'पूर्वीचौकी गाउँपालिका',
                'english_name' => 'Purbichauki Rural Municipality',
                'created_at' => '2022-03-27 08:36:55',
                'updated_at' => '2022-03-27 08:36:55',
            ),
            209 => 
            array (
                'id' => 710,
                'district_id' => 73,
                'nepali_name' => 'के.आई.सिं. गाउँपालिका',
                'english_name' => 'K.I.Singh Rural Municipality',
                'created_at' => '2022-03-27 08:36:56',
                'updated_at' => '2022-03-27 08:36:56',
            ),
            210 => 
            array (
                'id' => 711,
                'district_id' => 73,
                'nepali_name' => 'जोरायल गाउँपालिका',
                'english_name' => 'Jorayal Rural Municipality',
                'created_at' => '2022-03-27 08:36:56',
                'updated_at' => '2022-03-27 08:36:56',
            ),
            211 => 
            array (
                'id' => 712,
                'district_id' => 73,
                'nepali_name' => 'सायल गाउँपालिका',
                'english_name' => 'Sayal Rural Municipality',
                'created_at' => '2022-03-27 08:36:56',
                'updated_at' => '2022-03-27 08:36:56',
            ),
            212 => 
            array (
                'id' => 713,
                'district_id' => 73,
                'nepali_name' => 'बोगटान फुड्सिल गाउँपालिका',
                'english_name' => 'Bogatan-Phudsil Rural Municipality',
                'created_at' => '2022-03-27 08:36:56',
                'updated_at' => '2022-03-27 08:36:56',
            ),
            213 => 
            array (
                'id' => 714,
                'district_id' => 73,
                'nepali_name' => 'बडीकेदार गाउँपालिका',
                'english_name' => 'Badikedar Rural Municipality',
                'created_at' => '2022-03-27 08:36:56',
                'updated_at' => '2022-03-27 08:36:56',
            ),
            214 => 
            array (
                'id' => 715,
                'district_id' => 74,
                'nepali_name' => 'रामारोशन गाउँपालिका',
                'english_name' => 'Ramaroshan Rural Municipality',
                'created_at' => '2022-03-27 08:36:57',
                'updated_at' => '2022-03-27 08:36:57',
            ),
            215 => 
            array (
                'id' => 716,
                'district_id' => 74,
                'nepali_name' => 'चौरपाटी गाउँपालिका',
                'english_name' => 'Chaurpati Rural Municipality',
                'created_at' => '2022-03-27 08:36:57',
                'updated_at' => '2022-03-27 08:36:57',
            ),
            216 => 
            array (
                'id' => 717,
                'district_id' => 74,
                'nepali_name' => 'तुर्माखाँद गाउँपालिका',
                'english_name' => 'Turmakhand Rural Municipality',
                'created_at' => '2022-03-27 08:36:58',
                'updated_at' => '2022-03-27 08:36:58',
            ),
            217 => 
            array (
                'id' => 718,
                'district_id' => 74,
                'nepali_name' => 'मेल्लेख गाउँपालिका',
                'english_name' => 'Mellekh Rural Municipality',
                'created_at' => '2022-03-27 08:36:58',
                'updated_at' => '2022-03-27 08:36:58',
            ),
            218 => 
            array (
                'id' => 719,
                'district_id' => 74,
                'nepali_name' => 'ढकारी गाउँपालिका',
                'english_name' => 'Dhakari Rural Municipality',
                'created_at' => '2022-03-27 08:36:58',
                'updated_at' => '2022-03-27 08:36:58',
            ),
            219 => 
            array (
                'id' => 720,
                'district_id' => 74,
                'nepali_name' => 'बान्निगढी जयगढ गाउँपालिका',
                'english_name' => 'Bannigadi Jayagad Rural Municipality',
                'created_at' => '2022-03-27 08:36:59',
                'updated_at' => '2022-03-27 08:36:59',
            ),
            220 => 
            array (
                'id' => 721,
                'district_id' => 74,
                'nepali_name' => 'मंगलसेन नगरपालिका',
                'english_name' => 'Mangalsen Municipality',
                'created_at' => '2022-03-27 08:36:59',
                'updated_at' => '2022-03-27 08:36:59',
            ),
            221 => 
            array (
                'id' => 722,
                'district_id' => 74,
                'nepali_name' => 'कमलबजार नगरपालिका',
                'english_name' => 'Kamalbazar Municipality',
                'created_at' => '2022-03-27 08:36:59',
                'updated_at' => '2022-03-27 08:36:59',
            ),
            222 => 
            array (
                'id' => 723,
                'district_id' => 74,
                'nepali_name' => 'साँफेबगर नगरपालिका',
                'english_name' => 'Sanfebagar Municipality',
                'created_at' => '2022-03-27 08:36:59',
                'updated_at' => '2022-03-27 08:36:59',
            ),
            223 => 
            array (
                'id' => 724,
                'district_id' => 74,
                'nepali_name' => 'पन्चदेवल विनायक नगरपालिका',
                'english_name' => 'Panchadewal Binayak Municipality',
                'created_at' => '2022-03-27 08:37:00',
                'updated_at' => '2022-03-27 08:37:00',
            ),
            224 => 
            array (
                'id' => 725,
                'district_id' => 75,
                'nepali_name' => 'नवदुर्गा गाउँपालिका',
                'english_name' => 'Navadurga Rural Municipality',
                'created_at' => '2022-03-27 08:37:00',
                'updated_at' => '2022-03-27 08:37:00',
            ),
            225 => 
            array (
                'id' => 726,
                'district_id' => 75,
                'nepali_name' => 'आलिताल गाउँपालिका',
                'english_name' => 'Aalitaal Rural Municipality',
                'created_at' => '2022-03-27 08:37:00',
                'updated_at' => '2022-03-27 08:37:00',
            ),
            226 => 
            array (
                'id' => 727,
                'district_id' => 75,
                'nepali_name' => 'गन्यापधुरा गाउँपालिका',
                'english_name' => 'Ganyapadhura Rural Municipality',
                'created_at' => '2022-03-27 08:37:01',
                'updated_at' => '2022-03-27 08:37:01',
            ),
            227 => 
            array (
                'id' => 728,
                'district_id' => 75,
                'nepali_name' => 'भागेश्वर गाउँपालिका',
                'english_name' => 'Bhageshwar Rural Municipality',
                'created_at' => '2022-03-27 08:37:01',
                'updated_at' => '2022-03-27 08:37:01',
            ),
            228 => 
            array (
                'id' => 729,
                'district_id' => 75,
                'nepali_name' => 'अजयमेरु गाउँपालिका',
                'english_name' => 'Ajaymeru Rural Municipality',
                'created_at' => '2022-03-27 08:37:01',
                'updated_at' => '2022-03-27 08:37:01',
            ),
            229 => 
            array (
                'id' => 730,
                'district_id' => 75,
                'nepali_name' => 'अमरगढी नगरपालिका',
                'english_name' => 'Amargadhi Municipality',
                'created_at' => '2022-03-27 08:37:02',
                'updated_at' => '2022-03-27 08:37:02',
            ),
            230 => 
            array (
                'id' => 731,
                'district_id' => 75,
                'nepali_name' => 'परशुराम नगरपालिका',
                'english_name' => 'Parshuram Municipality',
                'created_at' => '2022-03-27 08:37:02',
                'updated_at' => '2022-03-27 08:37:02',
            ),
            231 => 
            array (
                'id' => 732,
                'district_id' => 76,
                'nepali_name' => 'भीमदत्त नगरपालिका',
                'english_name' => 'Bhimdatta Municipality',
                'created_at' => '2022-03-27 08:37:02',
                'updated_at' => '2022-03-27 08:37:02',
            ),
            232 => 
            array (
                'id' => 733,
                'district_id' => 76,
                'nepali_name' => 'पुर्नवास नगरपालिका',
                'english_name' => 'Punarbas Municipality',
                'created_at' => '2022-03-27 08:37:03',
                'updated_at' => '2022-03-27 08:37:03',
            ),
            233 => 
            array (
                'id' => 734,
                'district_id' => 76,
                'nepali_name' => 'वेदकोट नगरपालिका',
                'english_name' => 'Bedkot Municipality',
                'created_at' => '2022-03-27 08:37:03',
                'updated_at' => '2022-03-27 08:37:03',
            ),
            234 => 
            array (
                'id' => 735,
                'district_id' => 76,
                'nepali_name' => 'माहाकाली नगरपालिका',
                'english_name' => 'Mahakali Municipality',
                'created_at' => '2022-03-27 08:37:03',
                'updated_at' => '2022-03-27 08:37:03',
            ),
            235 => 
            array (
                'id' => 736,
                'district_id' => 76,
                'nepali_name' => 'शुक्लाफाँटा नगरपालिका',
                'english_name' => 'Shuklaphanta Municipality',
                'created_at' => '2022-03-27 08:37:04',
                'updated_at' => '2022-03-27 08:37:04',
            ),
            236 => 
            array (
                'id' => 737,
                'district_id' => 76,
                'nepali_name' => 'बेलौरी नगरपालिका',
                'english_name' => 'Belauri Municipality',
                'created_at' => '2022-03-27 08:37:04',
                'updated_at' => '2022-03-27 08:37:04',
            ),
            237 => 
            array (
                'id' => 738,
                'district_id' => 76,
                'nepali_name' => 'कृष्णपुर नगरपालिका',
                'english_name' => 'Krishnapur Municipality',
                'created_at' => '2022-03-27 08:37:05',
                'updated_at' => '2022-03-27 08:37:05',
            ),
            238 => 
            array (
                'id' => 739,
                'district_id' => 76,
                'nepali_name' => 'लालझाडी गाउँपालिका',
                'english_name' => 'Laljhadi Rural Municipality',
                'created_at' => '2022-03-27 08:37:05',
                'updated_at' => '2022-03-27 08:37:05',
            ),
            239 => 
            array (
                'id' => 740,
                'district_id' => 76,
                'nepali_name' => 'बेलडाडी गाउँपालिका',
                'english_name' => 'Beldandi Rural Municipality',
                'created_at' => '2022-03-27 08:37:05',
                'updated_at' => '2022-03-27 08:37:05',
            ),
            240 => 
            array (
                'id' => 741,
                'district_id' => 77,
                'nepali_name' => 'जानकी गाउँपालिका',
                'english_name' => 'Janaki Rural Municipality',
                'created_at' => '2022-03-27 08:37:05',
                'updated_at' => '2022-03-27 08:37:05',
            ),
            241 => 
            array (
                'id' => 742,
                'district_id' => 77,
                'nepali_name' => 'कैलारी गाउँपालिका',
                'english_name' => 'Kailari Rural Municipality',
                'created_at' => '2022-03-27 08:37:06',
                'updated_at' => '2022-03-27 08:37:06',
            ),
            242 => 
            array (
                'id' => 743,
                'district_id' => 77,
                'nepali_name' => 'जोशीपुर गाउँपालिका',
                'english_name' => 'Joshipur Rural Municipality',
                'created_at' => '2022-03-27 08:37:06',
                'updated_at' => '2022-03-27 08:37:06',
            ),
            243 => 
            array (
                'id' => 744,
                'district_id' => 77,
                'nepali_name' => 'बर्दगोरिया गाउँपालिका',
                'english_name' => 'Bardagoriya Rural Municipality',
                'created_at' => '2022-03-27 08:37:06',
                'updated_at' => '2022-03-27 08:37:06',
            ),
            244 => 
            array (
                'id' => 745,
                'district_id' => 77,
                'nepali_name' => 'मोहन्याल गाउँपालिका',
                'english_name' => 'Mohanyal Rural Municipality',
                'created_at' => '2022-03-27 08:37:06',
                'updated_at' => '2022-03-27 08:37:06',
            ),
            245 => 
            array (
                'id' => 746,
                'district_id' => 77,
                'nepali_name' => 'चुरे गाउँपालिका',
                'english_name' => 'Chure Rural Municipality',
                'created_at' => '2022-03-27 08:37:07',
                'updated_at' => '2022-03-27 08:37:07',
            ),
            246 => 
            array (
                'id' => 747,
                'district_id' => 77,
                'nepali_name' => 'टिकापुर नगरपालिका',
                'english_name' => 'Tikapur Municipality',
                'created_at' => '2022-03-27 08:37:07',
                'updated_at' => '2022-03-27 08:37:07',
            ),
            247 => 
            array (
                'id' => 748,
                'district_id' => 77,
                'nepali_name' => 'घोडाघोडी नगरपालिका',
                'english_name' => 'Ghodaghodi Municipality',
                'created_at' => '2022-03-27 08:37:07',
                'updated_at' => '2022-03-27 08:37:07',
            ),
            248 => 
            array (
                'id' => 749,
                'district_id' => 77,
                'nepali_name' => 'लम्कीचुहा नगरपालिका',
                'english_name' => 'Lamkichuha Municipality',
                'created_at' => '2022-03-27 08:37:08',
                'updated_at' => '2022-03-27 08:37:08',
            ),
            249 => 
            array (
                'id' => 750,
                'district_id' => 77,
                'nepali_name' => 'भजनी नगरपालिका',
                'english_name' => 'Bhajni Municipality',
                'created_at' => '2022-03-27 08:37:08',
                'updated_at' => '2022-03-27 08:37:08',
            ),
            250 => 
            array (
                'id' => 751,
                'district_id' => 77,
                'nepali_name' => 'गोदावरी नगरपालिका',
                'english_name' => 'Godawari Municipality',
                'created_at' => '2022-03-27 08:37:08',
                'updated_at' => '2022-03-27 08:37:08',
            ),
            251 => 
            array (
                'id' => 752,
                'district_id' => 77,
                'nepali_name' => 'गौरीगंगा नगरपालिका',
                'english_name' => 'Gauriganga Municipality',
                'created_at' => '2022-03-27 08:37:08',
                'updated_at' => '2022-03-27 08:37:08',
            ),
            252 => 
            array (
                'id' => 753,
                'district_id' => 77,
                'nepali_name' => 'धनगढी उपमहानगरपालिका',
                'english_name' => 'Dhangadhi Sub-Metropolitan City',
                'created_at' => '2022-03-27 08:37:09',
                'updated_at' => '2022-03-27 08:37:09',
            ),
        ));
        
        
    }
}
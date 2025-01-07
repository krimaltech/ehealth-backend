<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('departments')->delete();
        
        \DB::table('departments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'department' => 'General Medicine',
                'department_nepali' => 'सामान्य चिकित्सा',
                'symptoms' => '["10", "11", "14"]',
                'image' => 'general_1669963109.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/general_1669963109.png',
                'created_at' => '2022-12-02 17:08:29',
                'updated_at' => '2022-12-18 19:22:43',
            ),
            1 => 
            array (
                'id' => 2,
                'department' => 'Dentistry',
                'department_nepali' => 'दन्त चिकित्सा',
                'symptoms' => '["21"]',
                'image' => 'DENTAL_23_1652783538_1669962942.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/DENTAL_23_1652783538_1669962942.png',
                'created_at' => '2022-12-02 17:05:42',
                'updated_at' => '2022-12-18 19:18:30',
            ),
            2 => 
            array (
                'id' => 3,
                'department' => 'Ophthalmology',
                'department_nepali' => 'Ophthalmology',
                'symptoms' => '["15"]',
                'image' => 'eye-01_1681287956.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/eye-01_1681287956.png',
                'created_at' => '2023-02-14 19:16:07',
                'updated_at' => '2023-04-12 17:55:56',
            ),
            3 => 
            array (
                'id' => 4,
                'department' => 'Dietician',
                'department_nepali' => 'Dietician',
                'symptoms' => '["1"]',
                'image' => 'dietcian_1681287972.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/dietcian_1681287972.png',
                'created_at' => '2023-02-14 21:32:26',
                'updated_at' => '2023-04-12 17:56:12',
            ),
            4 => 
            array (
                'id' => 5,
                'department' => 'Gastroenterology',
                'department_nepali' => 'पेट तथा कलेजो रोग',
                'symptoms' => '["3", "18"]',
                'image' => 'GASTROENTEROLOGY_76_1619780603_V3_1669963071.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/GASTROENTEROLOGY_76_1619780603_V3_1669963071.png',
                'created_at' => '2022-12-02 17:07:51',
                'updated_at' => '2022-12-18 19:22:12',
            ),
            5 => 
            array (
                'id' => 7,
                'department' => 'Gynaecology / Obstetrics',
                'department_nepali' => 'स्त्री रोग / प्रसूति विज्ञान',
                'symptoms' => '["13", "16", "22"]',
                'image' => 'GYNAECOLOGY_OBSTETRICS_14_1620151148_V3_1669963158.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/GYNAECOLOGY_OBSTETRICS_14_1620151148_V3_1669963158.png',
                'created_at' => '2022-12-02 17:09:18',
                'updated_at' => '2022-12-18 19:22:59',
            ),
            6 => 
            array (
                'id' => 8,
                'department' => 'Internal Medicine',
                'department_nepali' => 'आन्तरिक चिकित्सा',
                'symptoms' => '["18", "22"]',
                'image' => 'INTERNAL_260_1652177696_1669963196.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/INTERNAL_260_1652177696_1669963196.png',
                'created_at' => '2022-12-02 17:09:56',
                'updated_at' => '2022-12-18 19:23:31',
            ),
            7 => 
            array (
                'id' => 9,
                'department' => 'Neurology',
                'department_nepali' => 'न्यूरोलोजी',
                'symptoms' => '["6", "12"]',
                'image' => 'NEUROLOGY_50_1618830964_V3_1669963243.jpg',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/NEUROLOGY_50_1618830964_V3_1669963243.jpg',
                'created_at' => '2022-12-02 17:10:43',
                'updated_at' => '2022-12-18 19:24:06',
            ),
            8 => 
            array (
                'id' => 10,
                'department' => 'Orthopedic',
                'department_nepali' => 'हाडजोर्नी विशेषज्ञ',
                'symptoms' => '["1", "14"]',
                'image' => 'ORTHOPEDIC_3_1618830174_V3_1669963283.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/ORTHOPEDIC_3_1618830174_V3_1669963283.png',
                'created_at' => '2022-12-02 17:11:23',
                'updated_at' => '2022-12-18 19:24:51',
            ),
            9 => 
            array (
                'id' => 11,
                'department' => 'Pediatrics',
                'department_nepali' => 'बाल रोग',
                'symptoms' => '["10", "11", "22"]',
                'image' => 'PEDIATRICS_13_1618816397_V3_1669963341.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/PEDIATRICS_13_1618816397_V3_1669963341.png',
                'created_at' => '2022-12-02 17:12:21',
                'updated_at' => '2022-12-18 19:25:13',
            ),
            10 => 
            array (
                'id' => 12,
                'department' => 'Psychiatric',
                'department_nepali' => 'मनोचिकित्सक',
                'symptoms' => '["6", "12"]',
                'image' => 'PSYCHIATRIC_81_1618830287_V3_1669963380.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/PSYCHIATRIC_81_1618830287_V3_1669963380.png',
                'created_at' => '2022-12-02 17:13:00',
                'updated_at' => '2022-12-18 19:25:30',
            ),
            11 => 
            array (
                'id' => 13,
                'department' => 'Pulmonary',
                'department_nepali' => 'श्वासप्रश्वास',
                'symptoms' => '["2", "3"]',
                'image' => 'PULMONARY_141_1652177668_1669963445.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/PULMONARY_141_1652177668_1669963445.png',
                'created_at' => '2022-12-02 17:14:05',
                'updated_at' => '2022-12-18 19:26:20',
            ),
            12 => 
            array (
                'id' => 14,
                'department' => 'Urology',
                'department_nepali' => 'युरोलोजी',
                'symptoms' => '["8", "18", "19", "20"]',
                'image' => 'Urology_53_1634629270_V3_1669963490.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Urology_53_1634629270_V3_1669963490.png',
                'created_at' => '2022-12-02 17:14:50',
                'updated_at' => '2022-12-18 19:26:51',
            ),
            13 => 
            array (
                'id' => 15,
                'department' => 'ENT',
                'department_nepali' => 'नाक कान घाँटी',
                'symptoms' => '["8", "19"]',
                'image' => 'ENT_29_1620150606_V3_1669963035.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/ENT_29_1620150606_V3_1669963035.png',
                'created_at' => '2022-12-02 17:07:15',
                'updated_at' => '2022-12-18 19:23:15',
            ),
            14 => 
            array (
                'id' => 16,
                'department' => 'Dermatology',
                'department_nepali' => 'छाला विज्ञान',
                'symptoms' => '["16", "20", "22"]',
                'image' => 'DERMATOLOGY_18_1618748181_V3_1669962980.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/DERMATOLOGY_18_1618748181_V3_1669962980.png',
                'created_at' => '2022-12-02 17:06:20',
                'updated_at' => '2022-12-18 19:19:02',
            ),
            15 => 
            array (
                'id' => 17,
                'department' => 'Cardiology',
                'department_nepali' => 'मुटुरोग सम्बन्धी',
                'symptoms' => '["3", "10", "20", "22"]',
                'image' => 'CARDIOLOGY_51_1618830092_V3_1669962894.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/CARDIOLOGY_51_1618830092_V3_1669962894.png',
                'created_at' => '2022-12-02 17:04:54',
                'updated_at' => '2022-12-18 19:20:32',
            ),
        ));
        
        
    }
}
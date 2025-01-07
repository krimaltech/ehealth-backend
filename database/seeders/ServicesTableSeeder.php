<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'service-blood-123',
                'service_name' => 'Blood Checkup',
                'description' => 'Blood Checkup Blood Checkup Blood Checkup',
                'price' => NULL,
                'image' => NULL,
                'image_path' => NULL,
                'test_result_type' => 'Range',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'service-sugar-123',
                'service_name' => 'Sugar Checkup',
                'description' => 'Sugar Checkup Sugar Checkup Sugar Checkup',
                'price' => NULL,
                'image' => NULL,
                'image_path' => NULL,
                'test_result_type' => 'Range',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'slug' => 'service-bone-123',
                'service_name' => 'Bone Checkup',
                'description' => 'Bone Checkup Bone Checkup Bone Checkup',
                'price' => NULL,
                'image' => NULL,
                'image_path' => NULL,
                'test_result_type' => 'Range',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'slug' => 'service-liver-123',
                'service_name' => 'Liver Checkup',
                'description' => 'Liver Checkup Liver Checkup Liver Checkup',
                'price' => NULL,
                'image' => NULL,
                'image_path' => NULL,
                'test_result_type' => 'Range',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'slug' => 'service-thyroid-123',
                'service_name' => 'Thyroid Checkup',
                'description' => 'Thyroid Checkup Thyroid Checkup Thyroid Checkup',
                'price' => NULL,
                'image' => NULL,
                'image_path' => NULL,
                'test_result_type' => 'Range',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'slug' => 'service-kidney-123',
                'service_name' => 'Kidney Checkup',
                'description' => 'Kidney Checkup Kidney Checkup Kidney Checkup',
                'price' => NULL,
                'image' => NULL,
                'image_path' => NULL,
                'test_result_type' => 'Range',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'slug' => 'service-Cardiac-Test-oOW',
                'service_name' => 'Cardiac Test',
                'description' => '<p>Cardiac Test</p>',
                'price' => NULL,
                'image' => 'test_1669965762.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669965762.png',
                'test_result_type' => 'Range',
                'created_at' => '2022-12-02 13:07:43',
                'updated_at' => '2022-12-02 13:07:43',
            ),
            7 => 
            array (
                'id' => 8,
                'slug' => 'service-Cardiac-Test-xJ0',
                'service_name' => 'Cardiac Test',
                'description' => '<p>Cardiac Test</p>',
                'price' => NULL,
                'image' => 'test_1669965980.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669965980.png',
                'test_result_type' => 'Range',
                'created_at' => '2022-12-02 13:11:20',
                'updated_at' => '2022-12-02 13:11:20',
            ),
            8 => 
            array (
                'id' => 9,
                'slug' => 'service-Blood-Group-Test-4DQ',
                'service_name' => 'Blood Group Test',
                'description' => '<p>Blood Group Test<br></p>',
                'price' => '200',
                'image' => 'test_1669966083.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669966083.png',
                'test_result_type' => 'Value',
                'created_at' => '2022-12-02 13:13:03',
                'updated_at' => '2022-12-02 13:13:03',
            ),
            9 => 
            array (
                'id' => 10,
                'slug' => 'service-Stool-Test-P34',
                'service_name' => 'Stool Test',
                'description' => '<p>Stool Test<br></p>',
                'price' => NULL,
                'image' => 'test_1669967395.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669967395.png',
                'test_result_type' => 'Range',
                'created_at' => '2022-12-02 13:34:55',
                'updated_at' => '2022-12-02 13:34:55',
            ),
            10 => 
            array (
                'id' => 11,
                'slug' => 'service-Urine-Test-Ky9',
                'service_name' => 'Urine Test',
                'description' => '<p>Urine Test<br></p>',
                'price' => NULL,
                'image' => 'test_1669967490.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669967490.png',
                'test_result_type' => 'Range',
                'created_at' => '2022-12-02 13:36:30',
                'updated_at' => '2022-12-02 13:36:30',
            ),
            11 => 
            array (
                'id' => 12,
                'slug' => 'service-Serology-Test-F3q',
                'service_name' => 'Serology Test',
                'description' => '<p>Serology Test<br></p>',
                'price' => NULL,
                'image' => 'test_1669967711.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669967711.png',
                'test_result_type' => 'Range',
                'created_at' => '2022-12-02 13:40:11',
                'updated_at' => '2022-12-02 13:40:11',
            ),
            12 => 
            array (
                'id' => 13,
                'slug' => 'service-Cancer-Test-EH3',
                'service_name' => 'Cancer Test',
                'description' => '<p>Cancer Test<br></p>',
                'price' => NULL,
                'image' => 'test_1669967767.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669967767.png',
                'test_result_type' => 'Range',
                'created_at' => '2022-12-02 13:41:07',
                'updated_at' => '2022-12-02 13:41:07',
            ),
            13 => 
            array (
                'id' => 14,
                'slug' => 'service-RA-Factor-01n',
                'service_name' => 'RA Factor',
                'description' => '<p>RA Factor<br></p>',
                'price' => NULL,
                'image' => 'test_1669967856.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669967856.png',
                'test_result_type' => 'Range',
                'created_at' => '2022-12-02 13:42:36',
                'updated_at' => '2022-12-02 13:42:36',
            ),
            14 => 
            array (
                'id' => 15,
                'slug' => 'service-USG-9wc',
                'service_name' => 'USG',
                'description' => '<p>USG<br></p>',
                'price' => '600',
                'image' => 'test_1669967906.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669967906.png',
                'test_result_type' => 'Value and Image',
                'created_at' => '2022-12-02 13:43:26',
                'updated_at' => '2022-12-02 13:43:26',
            ),
            15 => 
            array (
                'id' => 16,
                'slug' => 'service-Vitamin-B12-Vzo',
                'service_name' => 'Vitamin B12',
                'description' => '<p>Vitamin B12<br></p>',
                'price' => NULL,
                'image' => 'test_1669967964.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669967964.png',
                'test_result_type' => 'Range',
                'created_at' => '2022-12-02 13:44:24',
                'updated_at' => '2022-12-02 13:44:24',
            ),
            16 => 
            array (
                'id' => 17,
                'slug' => 'service-HBA1c-QFx',
                'service_name' => 'HBA1c',
                'description' => '<p>HBA1c<br></p>',
                'price' => NULL,
                'image' => 'test_1669968036.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669968036.png',
                'test_result_type' => 'Range',
                'created_at' => '2022-12-02 13:45:36',
                'updated_at' => '2022-12-02 13:45:36',
            ),
            17 => 
            array (
                'id' => 18,
                'slug' => 'service-ECG-P6I',
                'service_name' => 'ECG',
                'description' => '<p>ECG</p>',
                'price' => '1500',
                'image' => 'test_1669968087.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669968087.png',
                'test_result_type' => 'Value and Image',
                'created_at' => '2022-12-02 13:46:27',
                'updated_at' => '2022-12-02 13:46:27',
            ),
            18 => 
            array (
                'id' => 19,
                'slug' => 'service-X-ray-YyW',
                'service_name' => 'X-ray',
                'description' => '<p>X-ray</p>',
                'price' => '500',
                'image' => 'test_1669968114.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669968114.png',
                'test_result_type' => 'Image',
                'created_at' => '2022-12-02 13:46:54',
                'updated_at' => '2022-12-02 13:46:54',
            ),
            19 => 
            array (
                'id' => 20,
                'slug' => 'service-URIC-ACID-ijx',
                'service_name' => 'URIC ACID',
                'description' => '<p>URIC ACID<br></p>',
                'price' => NULL,
                'image' => 'test_1669968168.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669968168.png',
                'test_result_type' => 'Range',
                'created_at' => '2022-12-02 13:47:48',
                'updated_at' => '2022-12-02 13:47:48',
            ),
            20 => 
            array (
                'id' => 21,
                'slug' => 'service-ECHO-WYE',
                'service_name' => 'ECHO',
                'description' => '<p>ECHO</p>',
                'price' => '700',
                'image' => 'test_1669968201.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669968201.png',
                'test_result_type' => 'Value and Image',
                'created_at' => '2022-12-02 13:48:21',
                'updated_at' => '2022-12-02 13:48:21',
            ),
            21 => 
            array (
                'id' => 22,
                'slug' => 'service-Iron-Profile-Rhf',
                'service_name' => 'Iron Profile',
                'description' => '<p>Iron Profiles</p>',
                'price' => NULL,
                'image' => 'test_1669968261.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669968261.png',
                'test_result_type' => 'Range',
                'created_at' => '2022-12-02 13:49:21',
                'updated_at' => '2022-12-02 13:49:21',
            ),
            22 => 
            array (
                'id' => 23,
                'slug' => 'service-Vaccine-stf',
                'service_name' => 'Vaccine',
                'description' => '<p>Vaccine</p>',
                'price' => NULL,
                'image' => 'test_1669968359.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669968359.png',
                'test_result_type' => 'Range',
                'created_at' => '2022-12-02 13:50:59',
                'updated_at' => '2022-12-02 13:50:59',
            ),
            23 => 
            array (
                'id' => 24,
            'slug' => 'service-WORM-(Albendazole)-Pir',
            'service_name' => 'WORM (Albendazole)',
            'description' => '<p>WORM (Albendazole)<br></p>',
                'price' => '900',
                'image' => 'test_1669974382.png',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/test_1669974382.png',
                'test_result_type' => 'Value',
                'created_at' => '2022-12-02 15:31:22',
                'updated_at' => '2022-12-02 15:31:22',
            ),
        ));
        
        
    }
}
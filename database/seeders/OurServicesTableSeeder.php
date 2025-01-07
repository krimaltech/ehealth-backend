<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OurServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('our_services')->delete();
        
        \DB::table('our_services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'Home-Services-31V',
                'service_title' => 'Home Services',
                'short_description' => 'Take control of your health with our Healthy Living App. Get disease prevention, health check-ups, nursing care, screening, & immunizations for a healthier life.',
                'long_description' => 'Ghargharma Doctor will be providing preventive health care services by reaching at our members’
doorsteps.',
                'image' => 'BM_09701_1671247292.jpg',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/BM_09701_1671247292.jpg',
                'icon' => 'home_1683444047.png',
                'icon_path' => 'https://demo.ghargharmadoctor.com/storage/images/home_1683444047.png',
                'status' => 1,
                'created_at' => '2022-12-02 17:20:38',
                'updated_at' => '2023-07-06 13:27:50',
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'Consultant-&-Specialist-8FO',
                'service_title' => 'Consultant & Specialist',
                'short_description' => 'Schedule an appointment with skilled doctors and specialists in Nepal for preventive measures, diagnosis, annual checkups, and expert healthcare services.',
                'long_description' => 'Get in touch with the top consultants and specialists of Nepal easily from our platform.',
                'image' => 'download_1669963967.jfif',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/download_1669963967.jfif',
                'icon' => 'call-doctor-concept-doctors-answer-patient-questions-phone_1150-50289-removebg-preview_1680432004.png',
                'icon_path' => 'https://demo.ghargharmadoctor.com/storage/images/call-doctor-concept-doctors-answer-patient-questions-phone_1150-50289-removebg-preview_1680432004.png',
                'status' => 1,
                'created_at' => '2022-12-02 17:22:47',
                'updated_at' => '2023-07-06 13:29:01',
            ),
            2 => 
            array (
                'id' => 3,
                'slug' => 'Therapist,-Yoga-&-Fitness-Trainer-zag',
                'service_title' => 'Therapist, Yoga & Fitness Trainer',
                'short_description' => 'Physical exercises and workouts expertees',
                'long_description' => '<p>For fitness,
yoga training,
therapy and
advice.<br></p>',
                'image' => 'Best-Yoga-Therapy-Certification-Training-Course_1669964028.jpg',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Best-Yoga-Therapy-Certification-Training-Course_1669964028.jpg',
                'icon' => 'young-man-practicing-yoga-exercises-mental-body-health_74855-20437-removebg-preview_1680432042.png',
                'icon_path' => 'https://demo.ghargharmadoctor.com/storage/images/young-man-practicing-yoga-exercises-mental-body-health_74855-20437-removebg-preview_1680432042.png',
                'status' => 0,
                'created_at' => '2022-12-02 17:23:48',
                'updated_at' => '2023-04-30 20:50:49',
            ),
            3 => 
            array (
                'id' => 4,
                'slug' => 'Nursing-Care-Service-Pp7',
                'service_title' => 'Nursing Care Service',
                'short_description' => 'GD provides comprehensive patient care at home, including physical, mental care, wound care, postoperative care, & old age care',
                'long_description' => 'Ghargharma Doctor provides trained and professional nursing services at our client’s homes.',
                'image' => 'nursing-care_1669964123.jpg',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/nursing-care_1669964123.jpg',
                'icon' => 'rehabilitation-hospital-abstract-concept-illustration-rehab-hospital-rehabilitation-center-stabilization-medical-conditions-mental-health-care-medical-facility_335657-551-removebg-preview_1680432075.png',
                'icon_path' => 'https://demo.ghargharmadoctor.com/storage/images/rehabilitation-hospital-abstract-concept-illustration-rehab-hospital-rehabilitation-center-stabilization-medical-conditions-mental-health-care-medical-facility_335657-551-removebg-preview_1680432075.png',
                'status' => 1,
                'created_at' => '2022-12-02 17:25:23',
                'updated_at' => '2023-07-06 13:29:22',
            ),
            4 => 
            array (
                'id' => 5,
                'slug' => 'Pharmacy-Service-mhG',
                'service_title' => 'Pharmacy Service',
                'short_description' => 'Get Nepal Government-Approved Medicines at your doorstep with GD Pharmacy Service. Our Registered Pharmacists ensure Dust-Free & Humidity-Controlled Pharmacy.',
                'long_description' => 'We will be delivering prescribed medicines to our members’ homes as per their needs during home
visits. We will also provide paid medicine delivery service to all clients.',
                'image' => '00711d4a938464b50109abdf1f6eee34_1669964245.jpg',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/00711d4a938464b50109abdf1f6eee34_1669964245.jpg',
                'icon' => 'pharmacist_23-2148185760-removebg-preview_1680432087.png',
                'icon_path' => 'https://demo.ghargharmadoctor.com/storage/images/pharmacist_23-2148185760-removebg-preview_1680432087.png',
                'status' => 1,
                'created_at' => '2022-12-02 17:27:25',
                'updated_at' => '2023-07-06 13:29:41',
            ),
            5 => 
            array (
                'id' => 6,
                'slug' => 'Ambulance-Service-tle',
                'service_title' => 'Ambulance Service',
                'short_description' => 'Ambulance Service in Kathmandu for Immediate Stabilization and Transport',
                'long_description' => 'Easily find and book ambulances through our platform with real time ambulance tracking features.',
                'image' => 'images_1669964312.jfif',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/images_1669964312.jfif',
                'icon' => 'emergency-ambulance-with-equipped-doctors_23-2148536273-removebg-preview_1681289085.png',
                'icon_path' => 'https://demo.ghargharmadoctor.com/storage/images/emergency-ambulance-with-equipped-doctors_23-2148536273-removebg-preview_1681289085.png',
                'status' => 1,
                'created_at' => '2022-12-02 17:28:32',
                'updated_at' => '2023-07-06 13:30:00',
            ),
            6 => 
            array (
                'id' => 7,
                'slug' => 'Hospitalization-qLT',
                'service_title' => 'Hospitalization',
                'short_description' => 'Say goodbye to long queues and waiting times for doctor\'s appointments. Book your hospitalizations online with some of the best hospitals and clinics in Kathmandu.',
            'long_description' => '<p><span id="docs-internal-guid-55718700-7fff-2433-6178-e60bf43a07c1"></span></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-973dc948-7fff-987c-59da-c90f600768c7"></span></p><p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-f600fc0d-7fff-1129-ebc4-98aa3d351925"><span style="font-size: 12pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline; white-space: pre-wrap;">Now patients don’t have to wait in long lines and queues for doctor’s appointments. It’s as simple as booking an appointment on the app. No long line anymore for hospitalizations. We have doctors from some of the best hospitals and clinics across Nepal. </span></span><br></p>',
                'image' => 'gettyimages-1334897313-dac6b3eb31b5e862dd99c95329ae89fe61994fa3-s1100-c50_1669964407.jpg',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/gettyimages-1334897313-dac6b3eb31b5e862dd99c95329ae89fe61994fa3-s1100-c50_1669964407.jpg',
                'icon' => 'patient-lying-bed-during-intensive-therapy_74855-7774-removebg-preview_1681289126.png',
                'icon_path' => 'https://demo.ghargharmadoctor.com/storage/images/patient-lying-bed-during-intensive-therapy_74855-7774-removebg-preview_1681289126.png',
                'status' => 1,
                'created_at' => '2022-12-02 17:30:07',
                'updated_at' => '2023-05-12 19:41:17',
            ),
            7 => 
            array (
                'id' => 8,
                'slug' => 'Insurance-9E2',
                'service_title' => 'Insurance',
                'short_description' => 'Get covered with free health insurance plans for everyone. Compare low-cost, short-term health insurance. Protect yourself from high health care costs.',
                'long_description' => '<p dir="ltr" style="line-height:1.38;margin-top:0pt;margin-bottom:0pt;"><span id="docs-internal-guid-7d2bc3af-7fff-c402-c41a-5013f009bd37"></span></p><p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:0pt;margin-bottom:8pt;">Stay Carefree with the Ghargharma Doctor Insurance protecting you and your family.&nbsp;<br></p>',
                'image' => 'home-insurance-getty_1669964473.jpg',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/home-insurance-getty_1669964473.jpg',
                'icon' => 'health-insurance-agreement_74855-7544-removebg-preview_1681289140.png',
                'icon_path' => 'https://demo.ghargharmadoctor.com/storage/images/health-insurance-agreement_74855-7544-removebg-preview_1681289140.png',
                'status' => 1,
                'created_at' => '2022-12-02 17:31:13',
                'updated_at' => '2023-07-06 13:30:17',
            ),
            8 => 
            array (
                'id' => 9,
                'slug' => 'Senior-Citizens-Club-LHz',
                'service_title' => 'Senior Citizens Club',
                'short_description' => 'Enjoy games, activities & fitness programs & learn about health awareness opportunities. Join senior citizen clubs & experience a renewed sense of belonging.',
                'long_description' => 'For the first time in Nepal, Ghargharma Doctor is working hard to introduce a Senior Citizens Club
where the elderly can socialize among their peers in a homely environment while receiving all the
benefits of an old age home.',
                'image' => 'Naphu-School-for-The-Elderly-9_1669964555.jpg',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/Naphu-School-for-The-Elderly-9_1669964555.jpg',
                'icon' => 'aged-woman-running-friends-say-hello_74855-10479-removebg-preview_1681289152.png',
                'icon_path' => 'https://demo.ghargharmadoctor.com/storage/images/aged-woman-running-friends-say-hello_74855-10479-removebg-preview_1681289152.png',
                'status' => 1,
                'created_at' => '2022-12-02 17:32:35',
                'updated_at' => '2023-07-06 13:31:10',
            ),
            9 => 
            array (
                'id' => 11,
                'slug' => 'Lab-Service-ADY',
                'service_title' => 'Lab Service',
                'short_description' => 'Get Clinical Laboratory Testing Services at Home | Schedule Diagnostic Tests for Thyroid Panel, Liver & Kidney Function Test, Lipid Profile Test, Blood Glucose Test & More.',
                'long_description' => '<p dir="ltr" style="line-height:1.295;text-align: justify;margin-top:0pt;margin-bottom:8pt;"><br></p>',
                'image' => 'lab service_1683445210.jpg',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/lab service_1683445210.jpg',
                'icon' => 'lab service_1683445210.jpg',
                'icon_path' => 'https://demo.ghargharmadoctor.com/storage/images/lab service_1683445210.jpg',
                'status' => 0,
                'created_at' => '2023-05-07 17:10:10',
                'updated_at' => '2023-07-06 13:31:53',
            ),
        ));
        
        
    }
}
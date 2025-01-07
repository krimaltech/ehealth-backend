<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('packages')->delete();
        
        \DB::table('packages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'package-Basic-Membership-2hD',
                'type' => 3,
                'package_type' => 'Basic Membership',
                'description' => '<ul>
<li style="text-align: justify;">Pathological Screening </li>
<li style="text-align: justify;">Medical Check-up </li>
<li style="text-align: justify;">Physical Fitness Plan </li>
<li style="text-align: justify;">Nutrition Advice &amp; Diet Plan</li>
<li style="text-align: justify;">Free use of GD Application</li>
<li style="text-align: justify;">Free Doctor Consultation booking.</li>
<li style="text-align: justify;">Free Ambulance Services for hospitalization. </li>
<li style="text-align: justify;">Hospital booking on payment.</li>
</ul>',
                'visits' => 2,
                'registration_fee' => '27000-60000',
                'monthly_fee' => '345-400',
                'screening' => 1,
                'checkup' => 1,
                'ambulance' => 1,
                'insurance' => 1,
                'insurance_amount' => 337500.0,
                'order' => 1,
                'created_at' => '2023-06-08 16:42:15',
                'updated_at' => '2023-06-11 16:25:25',
                'schedule_flexibility' => 0,
                'schedule_times' => NULL,
                'online_consultation' => 6,
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'package-Silver-Membership-MsX',
                'type' => 1,
                'package_type' => 'Silver Membership',
                'description' => '<ul>
<li style="text-align: justify;">Pathological Screening</li>
<li style="text-align: justify;">Medical Check-up</li>
<li style="text-align: justify;">Physical Fitness Plan</li>
<li style="text-align: justify;">Nutrition Advice &amp; Diet Plan</li>
<li style="text-align: justify;">Free use of GD Application</li>
<li style="text-align: justify;">Free Doctor Consultation booking.</li>
<li style="text-align: justify;">Free Ambulance Services for hospitalization.</li>
<li style="text-align: justify;">Hospital booking on payment.</li>
</ul>',
                'visits' => 2,
                'registration_fee' => '8000-24000',
                'monthly_fee' => '750-1500',
                'screening' => 1,
                'checkup' => 1,
                'ambulance' => 1,
                'insurance' => 1,
                'insurance_amount' => 490000.0,
                'order' => 2,
                'created_at' => '2023-06-09 12:00:08',
                'updated_at' => '2023-06-11 16:25:09',
                'schedule_flexibility' => 0,
                'schedule_times' => NULL,
                'online_consultation' => 6,
            ),
            2 => 
            array (
                'id' => 3,
                'slug' => 'package-Gold-Membership-XwB',
                'type' => 1,
                'package_type' => 'Gold Membership',
                'description' => '<ul>
<li style="text-align: justify;">Pathological Screening</li>
<li style="text-align: justify;">Medical Check-up</li>
<li style="text-align: justify;">Physical Fitness Plan</li>
<li style="text-align: justify;">Nutrition Advice &amp; Diet Plan</li>
<li style="text-align: justify;">Free use of GD Application</li>
<li style="text-align: justify;">Free Doctor Consultation booking</li>
<li style="text-align: justify;">Free Ambulance Services for hospitalization.</li>
<li style="text-align: justify;">Hospital booking on payment</li>
</ul>',
                'visits' => 2,
                'registration_fee' => '8000-32000',
                'monthly_fee' => '925-2200',
                'screening' => 1,
                'checkup' => 1,
                'ambulance' => 1,
                'insurance' => 1,
                'insurance_amount' => 1000000.0,
                'order' => 3,
                'created_at' => '2023-06-09 12:11:19',
                'updated_at' => '2023-06-11 16:24:01',
                'schedule_flexibility' => 0,
                'schedule_times' => NULL,
                'online_consultation' => 8,
            ),
            3 => 
            array (
                'id' => 4,
                'slug' => 'package-Platinum-Membership-TrN',
                'type' => 2,
                'package_type' => 'Platinum Membership',
                'description' => '<ul>
<li style="text-align: justify;">Pathological Screening </li>
<li style="text-align: justify;">Medical Checkup </li>
<li style="text-align: justify;">Physical Fitness Plan </li>
<li style="text-align: justify;">Nutrition Advice &amp; Diet Plan </li>
<li style="text-align: justify;">Free use of GD Application</li>
<li style="text-align: justify;">Free Doctor Consultation booking. </li>
<li style="text-align: justify;">2 types of vaccination. </li>
<li style="text-align: justify;">Free Ambulance Services for hospitalization. </li>
<li style="text-align: justify;">Hospital booking on payment.</li>
</ul>',
                'visits' => 3,
                'registration_fee' => '12000-48000',
                'monthly_fee' => '1500-2650',
                'screening' => 1,
                'checkup' => 1,
                'ambulance' => 1,
                'insurance' => 1,
                'insurance_amount' => 1537500.0,
                'order' => 4,
                'created_at' => '2023-06-09 12:13:26',
                'updated_at' => '2023-06-11 16:23:42',
                'schedule_flexibility' => 1,
                'schedule_times' => 1,
                'online_consultation' => 8,
            ),
            4 => 
            array (
                'id' => 5,
                'slug' => 'package-Diamond-Membership-eAb',
                'type' => 2,
                'package_type' => 'Diamond Membership',
                'description' => '<ul>
<li style="text-align: justify;">Pathological Screening </li>
<li style="text-align: justify;">Medical Checkup </li>
<li style="text-align: justify;">Physical Fitness Plan </li>
<li style="text-align: justify;">Nutrition Advice &amp; Diet Plan </li>
<li style="text-align: justify;">Free use of GD Application</li>
<li style="text-align: justify;">Free Doctor Consultation booking. </li>
<li style="text-align: justify;">2 types of vaccination. </li>
<li style="text-align: justify;">Free Ambulance Services for hospitalization. </li>
<li style="text-align: justify;">Hospital booking on payment.</li>
</ul>',
                'visits' => 3,
                'registration_fee' => '15000-64000',
                'monthly_fee' => '2100-3100',
                'screening' => 1,
                'checkup' => 1,
                'ambulance' => 1,
                'insurance' => 1,
                'insurance_amount' => 2185000.0,
                'order' => 5,
                'created_at' => '2023-06-09 12:15:32',
                'updated_at' => '2023-06-11 16:23:23',
                'schedule_flexibility' => 1,
                'schedule_times' => 1,
                'online_consultation' => 12,
            ),
            5 => 
            array (
                'id' => 6,
                'slug' => 'package-VIP-Membership-JjZ',
                'type' => 2,
                'package_type' => 'VIP Membership',
                'description' => '<ul>
<li style="text-align: justify;">Pathological Screening </li>
<li style="text-align: justify;">Medical Checkup </li>
<li style="text-align: justify;">Physical Fitness Plan </li>
<li style="text-align: justify;">Nutrition Advice &amp; Diet Plan </li>
<li style="text-align: justify;">Free use of GD Application</li>
<li style="text-align: justify;">Free Doctor Consultation booking. </li>
<li style="text-align: justify;">2 types of vaccination. </li>
<li style="text-align: justify;">Free Ambulance Services for hospitalization. </li>
<li style="text-align: justify;">Hospital booking on payment.</li>
</ul>',
                'visits' => 4,
                'registration_fee' => '15000-80000',
                'monthly_fee' => '2400-3600',
                'screening' => 1,
                'checkup' => 1,
                'ambulance' => 1,
                'insurance' => 1,
                'insurance_amount' => 2185000.0,
                'order' => 6,
                'created_at' => '2023-06-09 12:17:07',
                'updated_at' => '2023-06-11 16:23:05',
                'schedule_flexibility' => 1,
                'schedule_times' => 2,
                'online_consultation' => 24,
            ),
            6 => 
            array (
                'id' => 7,
                'slug' => 'package-Silver-Corporate-Membership-Q9G',
                'type' => 3,
                'package_type' => 'Silver Corporate Membership',
                'description' => '<ul>
<li style="text-align: justify;">Pathological Screening </li>
<li style="text-align: justify;">Medical Checkup </li>
<li style="text-align: justify;">Physical Fitness Plan </li>
<li style="text-align: justify;">Nutrition Advice &amp; Diet Plan </li>
<li style="text-align: justify;">Free use of GD Application</li>
<li style="text-align: justify;">Free Doctor Consultation booking. </li>
<li style="text-align: justify;">2 types of vaccination. </li>
<li style="text-align: justify;">Free Ambulance Services for hospitalization. </li>
<li style="text-align: justify;">Hospital booking on payment.</li>
</ul>',
                'visits' => 2,
                'registration_fee' => '27000-54000',
                'monthly_fee' => '750',
                'screening' => 1,
                'checkup' => 1,
                'ambulance' => 1,
                'insurance' => 1,
                'insurance_amount' => 490000.0,
                'order' => 7,
                'created_at' => '2023-06-09 12:19:06',
                'updated_at' => '2023-06-11 16:22:48',
                'schedule_flexibility' => 0,
                'schedule_times' => NULL,
                'online_consultation' => 6,
            ),
            7 => 
            array (
                'id' => 8,
                'slug' => 'package-Gold-Corporate-Membership-1n2',
                'type' => 3,
                'package_type' => 'Gold Corporate Membership',
                'description' => '<ul>
<li style="text-align: justify;">Pathological Screening </li>
<li style="text-align: justify;">Medical Checkup </li>
<li style="text-align: justify;">Physical Fitness Plan </li>
<li style="text-align: justify;">Nutrition Advice &amp; Diet Plan </li>
<li style="text-align: justify;">Free use of GD Application</li>
<li style="text-align: justify;">Free Doctor Consultation booking. </li>
<li style="text-align: justify;">2 types of vaccination. </li>
<li style="text-align: justify;">Free Ambulance Services for hospitalization. </li>
<li style="text-align: justify;">Hospital booking on payment.</li>
</ul>',
                'visits' => 2,
                'registration_fee' => '36000-72000',
                'monthly_fee' => '925',
                'screening' => 1,
                'checkup' => 1,
                'ambulance' => 1,
                'insurance' => 1,
                'insurance_amount' => 1000000.0,
                'order' => 8,
                'created_at' => '2023-06-09 12:20:01',
                'updated_at' => '2023-06-11 16:22:35',
                'schedule_flexibility' => 0,
                'schedule_times' => NULL,
                'online_consultation' => 8,
            ),
            8 => 
            array (
                'id' => 9,
                'slug' => 'package-Platinum-Corporate-Membership-LBp',
                'type' => 3,
                'package_type' => 'Platinum Corporate Membership',
                'description' => '<ul>
<li style="text-align: justify;">Pathological Screening </li>
<li style="text-align: justify;">Medical Checkup </li>
<li style="text-align: justify;">Physical Fitness Plan </li>
<li style="text-align: justify;">Nutrition Advice &amp; Diet Plan </li>
<li style="text-align: justify;">Free use of GD Application</li>
<li style="text-align: justify;">Free Doctor Consultation booking. </li>
<li style="text-align: justify;">2 types of vaccination. </li>
<li style="text-align: justify;">Free Ambulance Services for hospitalization. </li>
<li style="text-align: justify;">Hospital booking on payment.</li>
</ul>',
                'visits' => 3,
                'registration_fee' => '54000-108000',
                'monthly_fee' => '1500',
                'screening' => 1,
                'checkup' => 1,
                'ambulance' => 1,
                'insurance' => 1,
                'insurance_amount' => 1537500.0,
                'order' => 9,
                'created_at' => '2023-06-09 12:21:13',
                'updated_at' => '2023-06-11 16:22:17',
                'schedule_flexibility' => 1,
                'schedule_times' => 1,
                'online_consultation' => 8,
            ),
            9 => 
            array (
                'id' => 10,
                'slug' => 'package-School-Membership-jxd',
                'type' => 4,
                'package_type' => 'School Membership',
                'description' => '<ul>
<li style="text-align: justify;">Pathological Screening </li>
<li style="text-align: justify;">Medical Checkup </li>
<li style="text-align: justify;">Physical Fitness Plan </li>
<li style="text-align: justify;">Nutrition Advice &amp; Diet Plan </li>
<li style="text-align: justify;">Free use of GD Application</li>
<li style="text-align: justify;">Free Doctor Consultation booking. </li>
<li style="text-align: justify;">2 types of vaccination. </li>
<li style="text-align: justify;">Free Ambulance Services for hospitalization. </li>
<li style="text-align: justify;">Hospital booking on payment.</li>
</ul>',
                'visits' => 3,
                'registration_fee' => '50000-200000',
                'monthly_fee' => '200',
                'screening' => 1,
                'checkup' => 1,
                'ambulance' => 1,
                'insurance' => 0,
                'insurance_amount' => NULL,
                'order' => 10,
                'created_at' => '2023-06-09 12:23:29',
                'updated_at' => '2023-06-11 16:21:50',
                'schedule_flexibility' => 0,
                'schedule_times' => NULL,
                'online_consultation' => 0,
            ),
        ));
        
        
    }
}
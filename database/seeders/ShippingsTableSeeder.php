<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShippingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shippings')->delete();
        
        \DB::table('shippings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'maximum' => 1000,
                'minimum' => 500,
                'shipping_type' => 'Order Between 500 to 1000',
                'price' => '200.00',
                'status' => 'active',
                'created_at' => '2023-02-15 16:13:58',
                'updated_at' => '2023-02-15 16:13:58',
            ),
            1 => 
            array (
                'id' => 2,
                'maximum' => 2000,
                'minimum' => 1000,
                'shipping_type' => 'Order Between 1000 to 2000',
                'price' => '100.00',
                'status' => 'active',
                'created_at' => '2023-02-15 16:13:58',
                'updated_at' => '2023-02-15 16:13:58',
            ),
            2 => 
            array (
                'id' => 3,
                'maximum' => 1000,
                'minimum' => 500,
                'shipping_type' => 'Order Above 2000',
                'price' => '0.00',
                'status' => 'active',
                'created_at' => '2023-02-15 16:13:58',
                'updated_at' => '2023-02-15 16:13:58',
            ),
        ));
        
        
    }
}
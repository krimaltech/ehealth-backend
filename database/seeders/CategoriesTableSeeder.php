<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Fruits',
                'slug' => 'category-Fruits-P3r',
                'description' => 'Fresh Fruits',
                'parent_id' => NULL,
                'vendor_type_id' => 1,
                'featured' => 1,
                'status' => 1,
                'image' => 'fruits_1669963854.jpg',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/fruits_1669963854.jpg',
                'created_at' => '2022-12-02 12:35:54',
                'updated_at' => '2022-12-02 12:35:54',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Vegetables',
                'slug' => 'category-Vegetables-Cfi',
                'description' => 'Vegetables',
                'parent_id' => NULL,
                'vendor_type_id' => 1,
                'featured' => 1,
                'status' => 1,
                'image' => 'vegetables-and-fruits-farmers-market_1669963912.jpg',
                'image_path' => 'https://demo.ghargharmadoctor.com/storage/images/vegetables-and-fruits-farmers-market_1669963912.jpg',
                'created_at' => '2022-12-02 12:36:52',
                'updated_at' => '2022-12-02 12:36:52',
            ),
        ));
        
        
    }
}
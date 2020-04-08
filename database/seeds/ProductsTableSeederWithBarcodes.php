<?php

use Illuminate\Database\Seeder;

class ProductsTableSeederOld extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Chopped Tomatoes',
                'price' => 0.99,
                'shortDesc' => 'Valfrutta Italian tomatoes',
                'detailedDesc' => 'Valfrutta Italian tomatoes',
                'barcode' => '8001440000010',
                'category_id' => 35,
                'created_at' => '2020-03-25 13:58:17',
                'updated_at' => '2020-03-25 13:58:17',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Baked Beans',
                'price' => 0.89,
                'shortDesc' => 'Branston Baked Beans',
                'detailedDesc' => 'Branston Baked Beans',
                'barcode' => '5000232902450',
                'category_id' => 35,
                'created_at' => '2020-03-25 14:00:09',
                'updated_at' => '2020-03-25 14:00:09',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Corned Beef',
                'price' => 1.3,
                'shortDesc' => 'Princes Corned Beef',
                'detailedDesc' => 'Princes Corned Beef',
                'barcode' => '5000232414700',
                'category_id' => 35,
                'created_at' => '2020-03-25 14:02:17',
                'updated_at' => '2020-03-25 14:02:17',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Sweetcorn',
                'price' => 1.59,
                'shortDesc' => 'Green Giant Sweetcorn',
                'detailedDesc' => 'Green Giant Sweetcorn',
                'barcode' => '5010046002017',
                'category_id' => 35,
                'created_at' => '2020-03-25 14:04:07',
                'updated_at' => '2020-03-25 14:04:07',
            ),
        ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
           'name' => 'Robinsons Double Strength Summer Fruits',
           'price' => 2.99,
           'shortDesc' => 'Cordial',
           'DetailedDesc' => 'Robinsons 1L Cordial',
           'barcode' => '5010102115521'
        ]);
        Product::create([
            'name' => 'Tuna Chunks',
            'price' => 3.99,
            'shortDesc' => 'Tuna Chunks',
            'DetailedDesc' => 'Tuna Chunks in spring water',
            'barcode' => '5057967621057'
         ]);
         Product::create([
            'name' => 'Tinned Tomatoes',
            'price' => 2.99,
            'shortDesc' => 'Tinned Tomatoes',
            'DetailedDesc' => 'Valfrutta Tinned Tomatoes',
            'barcode' => '8001440000010'
         ]);
         Product::create([
            'name' => 'Soured Cream',
            'price' => 0.99,
            'shortDesc' => 'Soured Cream',
            'DetailedDesc' => 'Old El Paso Soured Cream',
            'barcode' => '0046000482538'
         ]);
         Product::create([
            'name' => 'Taco Kit',
            'price' => 3.00,
            'shortDesc' => 'Taco Kit',
            'DetailedDesc' => 'Old El Paso Taco Kit',
            'barcode' => '8410076481320'
         ]);
    }
}

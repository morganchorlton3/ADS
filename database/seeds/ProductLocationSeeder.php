<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\ProductLocation;

class ProductLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCount = Product::count();
        for($i = $productCount; $i > 0; $i--) {
            ProductLocation::create([
                'product_id' => $i,
                'aisle' => 1,
                'mod' => 2,
                'shelf' => 3,
                'slot' => 'a',
                'stock' => 200,
            ]);
        }
    }
}

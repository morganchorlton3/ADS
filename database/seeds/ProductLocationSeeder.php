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
        $letters = array_merge(range('a','j'));
        $productCount = Product::count();
        for($i = $productCount; $i > 0; $i--) {
            ProductLocation::create([
                'productID' => $i,
                'aisle' => rand(1,20),
                'mod' => rand(1,8),
                'shelf' => rand(1,6),
                'slot' => $letters[rand(0,9)],
                'stock' => 200,
            ]);
        }
    }
}

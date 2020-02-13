<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Fresh Food']);
        Category::create(['name' => 'Bakery']);
        Category::create(['name' => 'Frozen Food']);
        Category::create(['name' => 'Food Cupboard']);
        Category::create(['name' => 'Drinks']);
        Category::create(['name' => 'Baby']);
        Category::create(['name' => 'Health & Beauty']);
        Category::create(['name' => 'Pets']);
        Category::create(['name' => 'Household']);
        Category::create(['name' => 'Home']);
        //Fresh Food
        Category::create(['name' => 'Fresh Fruit', 'parent_id' => 1]);
        Category::create(['name' => 'Fresh Vegtables', 'parent_id' => 1]);
        Category::create(['name' => 'Fresh Salad', 'parent_id' => 1]);
        Category::create(['name' => 'Chilled Fruit Juice', 'parent_id' => 1]);
        Category::create(['name' => 'Milk, Butter & Eggs', 'parent_id' => 1]);
        Category::create(['name' => 'Youghurts', 'parent_id' => 1]);
        Category::create(['name' => 'Meat', 'parent_id' => 1]);
        //Bakery
        Category::create(['name' => 'Bread', 'parent_id' => 2]);
        Category::create(['name' => 'Wraps', 'parent_id' => 2]);
        Category::create(['name' => 'Crumpets', 'parent_id' => 2]);
        Category::create(['name' => 'Cakes', 'parent_id' => 2]);
        Category::create(['name' => 'Free From', 'parent_id' => 2]);
        //Frozen Food
        Category::create(['name' => 'Frozen Vegtables', 'parent_id' => 3]);
        Category::create(['name' => 'Frozen Chips', 'parent_id' => 3]);
        Category::create(['name' => 'Frozen Meat', 'parent_id' => 3]);
        Category::create(['name' => 'Frozen Fish', 'parent_id' => 3]);
        Category::create(['name' => 'Frozen Party Food', 'parent_id' => 3]);
        Category::create(['name' => 'Frozen Pizza', 'parent_id' => 3]);
        //Cupboard
        Category::create(['name' => 'Dried Fruit', 'parent_id' => 4]);
        Category::create(['name' => 'Free From Range', 'parent_id' => 4]);
        Category::create(['name' => 'Hot Drinks', 'parent_id' => 4]);
        Category::create(['name' => 'Cereals', 'parent_id' => 4]);
        Category::create(['name' => 'Biscuits', 'parent_id' => 4]);
        Category::create(['name' => 'Chocolate', 'parent_id' => 4]);
        Category::create(['name' => 'Tins', 'parent_id' => 4]);
        Category::create(['name' => 'Pasta', 'parent_id' => 4]);
        //Drinks
        Category::create(['name' => 'Fizzy Drinks', 'parent_id' => 5]);
        Category::create(['name' => 'Juices & Smoothies', 'parent_id' => 5]);
        Category::create(['name' => 'Bottled Water', 'parent_id' => 5]);
        Category::create(['name' => 'Squash & Cordial', 'parent_id' => 5]);
        Category::create(['name' => 'Beer & Cider', 'parent_id' => 5]);
        Category::create(['name' => 'Wine', 'parent_id' => 5]);
        Category::create(['name' => 'Spirits', 'parent_id' => 5]);
        Category::create(['name' => 'Alcohol Free', 'parent_id' => 5]);
        //Baby
        Category::create(['name' => 'Nappies', 'parent_id' => 6]);
        Category::create(['name' => 'Wipes', 'parent_id' => 6]);
        Category::create(['name' => 'Baby Food', 'parent_id' => 6]);
        Category::create(['name' => 'Mum To Be', 'parent_id' => 6]);
        Category::create(['name' => 'Dummies', 'parent_id' => 6]);
        Category::create(['name' => 'Toys', 'parent_id' => 6]);
        //Health & Beauty
        Category::create(['name' => 'Make up', 'parent_id' => 7]);
        Category::create(['name' => 'Body Care', 'parent_id' => 7]);
        Category::create(['name' => 'Haircare', 'parent_id' => 7]);
        Category::create(['name' => 'Oral Care', 'parent_id' => 7]);
        Category::create(['name' => 'Women\'s Toiletries', 'parent_id' => 7]);
        Category::create(['name' => 'Men\'s Toiletries', 'parent_id' => 7]);
        //Pets
        Category::create(['name' => 'Cat & Kitten', 'parent_id' => 8]);
        Category::create(['name' => 'Dog & Puppy', 'parent_id' => 8]);
        Category::create(['name' => 'Small Animal, Fish & Bird', 'parent_id' => 8]);
        //Household
        Category::create(['name' => 'Laundry', 'parent_id' => 9]);
        Category::create(['name' => 'Toilet Roll', 'parent_id' => 9]);
        Category::create(['name' => 'Kitchen Roll & Tissues', 'parent_id' => 9]);
        Category::create(['name' => 'Cleaning', 'parent_id' => 9]);
        Category::create(['name' => 'Dishwashing', 'parent_id' => 9]);
        Category::create(['name' => 'Lightbulbs', 'parent_id' => 9]);
        //Home
        Category::create(['name' => 'Batteries', 'parent_id' => 10]);
        Category::create(['name' => 'Newsagent & Tobacco', 'parent_id' => 10]);
        Category::create(['name' => 'Cooking & Dining', 'parent_id' => 10]);
        Category::create(['name' => 'DIY & Car', 'parent_id' => 10]);
        Category::create(['name' => 'Home & Office', 'parent_id' => 10]);
        Category::create(['name' => 'Stationery', 'parent_id' => 10]);
    }
}

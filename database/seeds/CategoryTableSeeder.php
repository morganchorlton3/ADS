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
        Category::create(['name' => 'Fresh Food', 'slug' => 'fresh-food']);
        Category::create(['name' => 'Bakery',  'slug' => 'bakery']);
        Category::create(['name' => 'Frozen Food',  'slug' => 'frozen-food']);
        Category::create(['name' => 'Cupboard',  'slug' => 'cupboard']);
        Category::create(['name' => 'Drinks',  'slug' => 'drinks']);
        Category::create(['name' => 'Baby',  'slug' => 'baby']);
        Category::create(['name' => 'Health & Beauty',  'slug' => 'health-beauty']);
        Category::create(['name' => 'Pets',  'slug' => 'pets']);
        Category::create(['name' => 'Household',  'slug' => 'household']);
        Category::create(['name' => 'Home',  'slug' => 'home']);
        //Fresh Food
        Category::create(['name' => 'Fresh Fruit', 'parent_id' => 1, 'slug' => 'fresh-fruit']);
        Category::create(['name' => 'Fresh Vegtables', 'parent_id' => 1, 'slug' => 'fresh-vegtables']);
        Category::create(['name' => 'Fresh Salad', 'parent_id' => 1,  'slug' => 'fresh-salad']);
        Category::create(['name' => 'Chilled Fruit Juice', 'parent_id' => 1,  'slug' => 'chilled-fruit']);
        Category::create(['name' => 'Milk, Butter & Eggs', 'parent_id' => 1,  'slug' => 'milk-butter']);
        Category::create(['name' => 'Youghurts', 'parent_id' => 1,  'slug' => 'youghurts']);
        Category::create(['name' => 'Meat', 'parent_id' => 1,  'slug' => 'meat']);
        //Bakery
        Category::create(['name' => 'Bread', 'parent_id' => 2, 'slug' => 'bread']);
        Category::create(['name' => 'Wraps', 'parent_id' => 2, 'slug' => 'wraps']);
        Category::create(['name' => 'Crumpets', 'parent_id' => 2, 'slug' => 'crumpets']);
        Category::create(['name' => 'Cakes', 'parent_id' => 2, 'slug' => 'cakes']);
        Category::create(['name' => 'Free From', 'parent_id' => 2, 'slug' => 'free-from']);
        //Frozen Food
        Category::create(['name' => 'Frozen Vegtables', 'parent_id' => 3, 'slug' => 'vegtables']);
        Category::create(['name' => 'Frozen Chips', 'parent_id' => 3, 'slug' => 'chips']);
        Category::create(['name' => 'Frozen Meat', 'parent_id' => 3, 'slug' => 'meat']);
        Category::create(['name' => 'Frozen Fish', 'parent_id' => 3, 'slug' => 'fish']);
        Category::create(['name' => 'Frozen Party Food', 'parent_id' => 3, 'slug' => 'party-food']);
        Category::create(['name' => 'Frozen Pizza', 'parent_id' => 3, 'slug' => 'pizza']);
        //Cupboard
        Category::create(['name' => 'Dried Fruit', 'parent_id' => 4, 'slug' => 'dried-fruit']);
        Category::create(['name' => 'Free From Range', 'parent_id' => 4, 'slug' => 'free-from']);
        Category::create(['name' => 'Hot Drinks', 'parent_id' => 4, 'slug' => 'hot-drinks']);
        Category::create(['name' => 'Cereals', 'parent_id' => 4, 'slug' => 'cereals']);
        Category::create(['name' => 'Biscuits', 'parent_id' => 4, 'slug' => 'biscuits']);
        Category::create(['name' => 'Chocolate', 'parent_id' => 4, 'slug' => 'chocolate']);
        Category::create(['name' => 'Tins', 'parent_id' => 4, 'slug' => 'tins']);
        Category::create(['name' => 'Pasta', 'parent_id' => 4, 'slug' => 'pasta']);
        //Drinks
        Category::create(['name' => 'Fizzy Drinks', 'parent_id' => 5, 'slug' => 'fizzy']);
        Category::create(['name' => 'Juices & Smoothies', 'parent_id' => 5, 'slug' => 'juice-smoothies']);
        Category::create(['name' => 'Bottled Water', 'parent_id' => 5, 'slug' => 'bottled-water']);
        Category::create(['name' => 'Squash & Cordial', 'parent_id' => 5, 'slug' => 'squash-cordial']);
        Category::create(['name' => 'Beer & Cider', 'parent_id' => 5, 'slug' => 'beer-cider']);
        Category::create(['name' => 'Wine', 'parent_id' => 5, 'slug' => 'wine']);
        Category::create(['name' => 'Spirits', 'parent_id' => 5, 'slug' => 'spirits']);
        Category::create(['name' => 'Alcohol Free', 'parent_id' => 5, 'slug' => 'alcohol-free']);
        //Baby
        Category::create(['name' => 'Nappies', 'parent_id' => 6, 'slug' => 'nappies']);
        Category::create(['name' => 'Wipes', 'parent_id' => 6, 'slug' => 'wipes']);
        Category::create(['name' => 'Baby Food', 'parent_id' => 6, 'slug' => 'baby-food']);
        Category::create(['name' => 'Mum To Be', 'parent_id' => 6, 'slug' => 'mum-to-be']);
        Category::create(['name' => 'Dummies', 'parent_id' => 6, 'slug' => 'dummies']);
        Category::create(['name' => 'Toys', 'parent_id' => 6, 'slug' => 'toys']);
        //Health & Beauty
        Category::create(['name' => 'Make up', 'parent_id' => 7, 'slug' => 'makeup']);
        Category::create(['name' => 'Body Care', 'parent_id' => 7, 'slug' => 'bodycare']);
        Category::create(['name' => 'Haircare', 'parent_id' => 7, 'slug' => 'haircare']);
        Category::create(['name' => 'Oral Care', 'parent_id' => 7, 'slug' => 'oral-care']);
        Category::create(['name' => 'Women\'s Toiletries', 'parent_id' => 7, 'slug' => 'womens-toiletries']);
        Category::create(['name' => 'Men\'s Toiletries', 'parent_id' => 7, 'slug' => 'mens-toiletries']);
        //Pets
        Category::create(['name' => 'Cat & Kitten', 'parent_id' => 8, 'slug' => 'cat']);
        Category::create(['name' => 'Dog & Puppy', 'parent_id' => 8, 'slug' => 'dog']);
        Category::create(['name' => 'Small Animal, Fish & Bird', 'parent_id' => 8, 'slug' => 'small-animal']);
        //Household
        Category::create(['name' => 'Laundry', 'parent_id' => 9, 'slug' => 'laundry']);
        Category::create(['name' => 'Toilet Roll', 'parent_id' => 9, 'slug' => 'toilet-roll']);
        Category::create(['name' => 'Kitchen Roll & Tissues', 'parent_id' => 9, 'slug' => 'kitchenroll']);
        Category::create(['name' => 'Cleaning', 'parent_id' => 9, 'slug' => 'cleaning']);
        Category::create(['name' => 'Dishwashing', 'parent_id' => 9, 'slug' => 'dishwashing']);
        Category::create(['name' => 'Lightbulbs', 'parent_id' => 9, 'slug' => 'lightbulbs']);
        //Home
        Category::create(['name' => 'Batteries', 'parent_id' => 10, 'slug' => 'batteries']);
        Category::create(['name' => 'Newsagent & Tobacco', 'parent_id' => 10, 'slug' => 'newsagent-tabacco']);
        Category::create(['name' => 'Cooking & Dining', 'parent_id' => 10, 'slug' => 'cooking-dining']);
        Category::create(['name' => 'DIY & Car', 'parent_id' => 10, 'slug' => 'diy-car']);
        Category::create(['name' => 'Home & Office', 'parent_id' => 10, 'slug' => 'Home-office']);
        Category::create(['name' => 'Stationery', 'parent_id' => 10, 'slug' => 'Stationery']);
    }
}

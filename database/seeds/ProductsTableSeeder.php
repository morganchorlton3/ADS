<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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
            5 =>
            array (
                'id' => 1,
                'name' => 'Kingsmill Soft White Thick Bread',
                'price' => 1.0,
                'shortDesc' => 'White Bread',
                'detailedDesc' => 'White Bread',
                'barcode' => '54942358314',
                'category_id' => 18,
                'type' => 1,
                'created_at' => '2020-02-13 15:47:00',
                'updated_at' => '2020-02-13 15:47:00',
            ),
            6 => 
            array (
                'id' => 2,
                'name' => 'Organic Fair Trade Bananas 5 Pack',
                'price' => 1.35,
                'shortDesc' => 'Bananas.',
                'detailedDesc' => 'Bananas.',
                'barcode' => '65295486527',
                'category_id' => 11,
                'type' => 1,
                'created_at' => '2020-02-13 15:52:50',
                'updated_at' => '2020-02-13 15:52:50',
            ),
            7 => 
            array (
                'id' => 3,
                'name' => 'Blueberries 150G',
                'price' => 2.0,
                'shortDesc' => 'Blueberries.',
                'detailedDesc' => 'Blueberries.',
                'barcode' => '10838923903',
                'category_id' => 11,
                'type' => 2,
                'created_at' => '2020-02-13 15:53:37',
                'updated_at' => '2020-02-13 15:53:37',
            ),
            8 => 
            array (
                'id' => 4,
                'name' => 'Rosedene Farms Strawberries 227G',
                'price' => 1.85,
                'type' => 2,
                'shortDesc' => 'Strawberries',
                'detailedDesc' => 'Strawberries
Rosedene Farms Strawberries
Pack size: 227G',
                'barcode' => '51913136394',
                'category_id' => 11,
                'created_at' => '2020-02-13 15:54:29',
                'updated_at' => '2020-02-13 15:54:29',
            ),
            9 => 
            array (
                'id' => 5,
                'name' => 'Redmere Farms Carrots 1Kg',
                'price' => 0.57,
                'shortDesc' => 'Carrots',
                'detailedDesc' => 'Carrots',
                'barcode' => '49168484198',
                'category_id' => 12,
                'type' => 1,
                'created_at' => '2020-02-13 15:56:14',
                'updated_at' => '2020-02-13 15:56:14',
            ),
            10 => 
            array (
                'id' => 6,
                'name' => 'Baking Potatoes Loose',
                'price' => 0.3,
                'shortDesc' => 'Lose Potatoes',
                'detailedDesc' => 'Lose Potatoes',
                'barcode' => '35984747571',
                'category_id' => 12,
                'type' => 1,
                'created_at' => '2020-02-13 15:57:03',
                'updated_at' => '2020-02-13 15:57:03',
            ),
            11 => 
            array (
                'id' => 7,
                'name' => 'Tesco Baby Plum Tomatoes 325G',
                'price' => 1.0,
                'shortDesc' => 'Tesco Baby Plum Tomatoes 325G',
                'detailedDesc' => 'Tesco Baby Plum Tomatoes 325G',
                'barcode' => '15488238997',
                'category_id' => 13,
                'type' => 1,
                'created_at' => '2020-02-13 15:57:52',
                'updated_at' => '2020-02-13 15:57:52',
            ),
            12 => 
            array (
                'id' => 8,
                'name' => 'Lactose Free Semi Skimmed Dairy Drink 1Ltr',
                'price' => 1.2,
                'shortDesc' => 'Lactose Free Semi Skimmed Dairy Drink 1Ltr',
                'detailedDesc' => 'Lactose Free Semi Skimmed Dairy Drink 1Ltr',
                'barcode' => '21532226743',
                'category_id' => 15,
                'type' => 2,
                'created_at' => '2020-02-13 15:58:49',
                'updated_at' => '2020-02-13 15:58:49',
            ),
            13 => 
            array (
                'id' => 9,
                'name' => 'Creamfields Uht Semi Skimmed Milk 1 Litre',
                'price' => 0.55,
                'shortDesc' => 'Creamfields Uht Semi Skimmed Milk 1 Litre',
                'detailedDesc' => 'Creamfields Uht Semi Skimmed Milk 1 Litre',
                'barcode' => '08728877225',
                'category_id' => 15,
                'type' => 2,
                'created_at' => '2020-02-13 15:59:27',
                'updated_at' => '2020-02-13 15:59:27',
            ),
            14 => 
            array (
                'id' => 10,
                'name' => 'Vita Coco Natural Coconut Water 1 Litre',
                'price' => 3.49,
                'shortDesc' => 'Vita Coco Natural Coconut Water 1 Litre',
                'detailedDesc' => 'Vita Coco Natural Coconut Water 1 Litre',
                'barcode' => '57446222701',
                'category_id' => 14,
                'type' => 1,
                'created_at' => '2020-02-13 16:00:02',
                'updated_at' => '2020-02-13 16:00:02',
            ),
            15 => 
            array (
                'id' => 11,
                'name' => 'Innocent Kids Mango & Pineapple Smoothie 4 X 180 Ml',
                'price' => 1.6,
                'shortDesc' => 'Innocent Kids Mango & Pineapple Smoothie 4 X 180 Ml',
                'detailedDesc' => 'Innocent Kids Mango & Pineapple Smoothie 4 X 180 Ml',
                'barcode' => '30257971489',
                'category_id' => 14,
                'type' => 2,
                'created_at' => '2020-02-13 16:00:37',
                'updated_at' => '2020-02-13 16:00:37',
            ),
            16 => 
            array (
                'id' => 12,
                'name' => 'Sunny Delight Florida Citrus Juice Drink 1 Litre',
                'price' => 1.0,
                'shortDesc' => 'Sunny Delight Florida Citrus Juice Drink 1 Litre',
                'detailedDesc' => 'Sunny Delight Florida Citrus Juice Drink 1 Litre',
                'barcode' => '39238682915',
                'category_id' => 14,
                'type' => 2,
                'created_at' => '2020-02-13 16:01:13',
                'updated_at' => '2020-02-13 16:01:13',
            ),
            17 => 
            array (
                'id' => 13,
                'name' => 'H.W Nevills 8 Plain Tortilla Wraps',
                'price' => 0.79,
                'shortDesc' => 'H.W Nevills 8 Plain Tortilla Wraps',
                'detailedDesc' => 'H.W Nevills 8 Plain Tortilla Wraps',
                'barcode' => '52045403807',
                'category_id' => 19,
                'type' => 1,
                'created_at' => '2020-02-13 16:02:10',
                'updated_at' => '2020-02-13 16:02:10',
            ),
            18 => 
            array (
                'id' => 14,
                'name' => 'H.W Nevills 8 Wholemeal Tortilla Wrap',
                'price' => 0.79,
                'shortDesc' => 'H.W Nevills 8 Wholemeal Tortilla Wrap',
                'detailedDesc' => 'H.W Nevills 8 Wholemeal Tortilla Wrap',
                'barcode' => '87474504433',
                'category_id' => 19,
                'type' => 1,
                'created_at' => '2020-02-13 16:02:36',
                'updated_at' => '2020-02-13 16:02:36',
            ),
            19 => 
            array (
                'id' => 15,
                'name' => 'Birds Eye Petit Pois 1.05Kg',
                'price' => 3.29,
                'shortDesc' => 'Birds Eye Petit Pois 1.05Kg',
                'detailedDesc' => 'Birds Eye Petit Pois 1.05Kg',
                'barcode' => '48380287215',
                'category_id' => 23,
                'type' => 3,
                'created_at' => '2020-02-13 16:03:20',
                'updated_at' => '2020-02-13 16:03:20',
            ),
            20 => 
            array (
                'id' => 16,
                'name' => 'Tesco Finest Supersweet Sweetcorn 1Kg',
                'price' => 2.0,
                'shortDesc' => 'Tesco Finest Supersweet Sweetcorn 1Kg',
                'detailedDesc' => 'Tesco Finest Supersweet Sweetcorn 1Kg',
                'barcode' => '89347968313',
                'category_id' => 23,
                'type' => 3,
                'created_at' => '2020-02-13 16:03:51',
                'updated_at' => '2020-02-13 16:03:51',
            ),
            21 => 
            array (
                'id' => 17,
                'name' => 'Mccain Home Chips Straight Cut 2.1Kg',
                'price' => 3.85,
                'shortDesc' => 'Mccain Home Chips Straight Cut 2.1Kg',
                'detailedDesc' => 'Mccain Home Chips Straight Cut 2.1Kg',
                'barcode' => '89347968313',
                'category_id' => 24,
                'type' => 3,
                'created_at' => '2020-02-13 16:04:34',
                'updated_at' => '2020-02-13 16:04:34',
            ),
            22 => 
            array (
                'id' => 18,
                'name' => 'Mccain Jackets 8 Pack 1.6Kg',
                'price' => 4.0,
                'shortDesc' => 'Mccain Jackets 8 Pack 1.6Kg',
                'detailedDesc' => 'Mccain Jackets 8 Pack 1.6Kg',
                'barcode' => '46772600077',
                'category_id' => 24,
                'type' => 3,
                'created_at' => '2020-02-13 16:05:06',
                'updated_at' => '2020-02-13 16:05:06',
            ),
            23 => 
            array (
                'id' => 19,
                'name' => 'Birds Eye 38 Crispy Chicken Dippers 697G',
                'price' => 4.0,
                'shortDesc' => 'Birds Eye 38 Crispy Chicken Dippers 697G',
                'detailedDesc' => 'Birds Eye 38 Crispy Chicken Dippers 697G',
                'barcode' => '39286268937',
                'category_id' => 25,
                'type' => 3,
                'created_at' => '2020-02-13 16:05:39',
                'updated_at' => '2020-02-13 16:05:39',
            ),
            24 => 
            array (
                'id' => 20,
                'name' => 'Tesco Chicken Breast Fillets 640G',
                'price' => 3.75,
                'shortDesc' => 'Tesco Chicken Breast Fillets 640G',
                'detailedDesc' => 'Tesco Chicken Breast Fillets 640G',
                'barcode' => '72424086581',
                'category_id' => 25,
                'type' => 2,
                'created_at' => '2020-02-13 16:06:04',
                'updated_at' => '2020-02-13 16:06:04',
            ),
            25 => 
            array (
                'id' => 21,
                'name' => 'Richmond Skinless Sausages 16 Pack 426G',
                'price' => 2.0,
                'shortDesc' => 'Richmond Skinless Sausages 16 Pack 426G',
                'detailedDesc' => 'Richmond Skinless Sausages 16 Pack 426G',
                'barcode' => '98586199129',
                'category_id' => 25,
                'type' => 3,
                'created_at' => '2020-02-13 16:06:30',
                'updated_at' => '2020-02-13 16:06:30',
            ),
            26 => 
            array (
                'id' => 22,
                'name' => 'Birds Eye Inspirations Fish Chargrilled With Tomato & Herb 300G',
                'price' => 3.5,
                'shortDesc' => 'Birds Eye Inspirations Fish Chargrilled With Tomato & Herb 300G',
                'detailedDesc' => 'Birds Eye Inspirations Fish Chargrilled With Tomato & Herb 300G',
                'barcode' => '03782013900',
                'category_id' => 26,
                'type' => 3,
                'created_at' => '2020-02-13 16:07:41',
                'updated_at' => '2020-02-13 16:07:41',
            ),
            27 => 
            array (
                'id' => 23,
                'name' => 'Birds Eye 4 Sausage Rolls 360G',
                'price' => 1.55,
                'shortDesc' => 'Birds Eye 4 Sausage Rolls 360G',
                'detailedDesc' => 'Birds Eye 4 Sausage Rolls 360G',
                'barcode' => '37538420657',
                'category_id' => 27,
                'type' => 3,
                'created_at' => '2020-02-13 16:09:19',
                'updated_at' => '2020-02-13 16:09:19',
            ),
            28 => 
            array (
                'id' => 24,
                'name' => 'Brew City Ipa Last Order Fries 400G',
                'price' => 2.0,
                'shortDesc' => 'Brew City Ipa Last Order Fries 400G',
                'detailedDesc' => 'Brew City Ipa Last Order Fries 400G',
                'barcode' => '34549293207',
                'category_id' => 27,
                'type' => 3,
                'created_at' => '2020-02-13 16:09:45',
                'updated_at' => '2020-02-13 16:09:45',
            ),
            29 => 
            array (
                'id' => 25,
                'name' => 'Chicago Town Medium Takeaway Four Cheese Melt Pizza 480G',
                'price' => 3.0,
                'shortDesc' => 'Chicago Town Medium Takeaway Four Cheese Melt Pizza 480G',
                'detailedDesc' => 'Chicago Town Medium Takeaway Four Cheese Melt Pizza 480G',
                'barcode' => '68459573650',
                'category_id' => 28,
                'type' => 3,
                'created_at' => '2020-02-13 16:10:36',
                'updated_at' => '2020-02-13 16:10:36',
            ),
            30 => 
            array (
                'id' => 26,
                'name' => 'Goodfella\'s Stonebaked Thin Margherita Pizza 345G',
                'price' => 2.25,
                'shortDesc' => 'Goodfella\'s Stonebaked Thin Margherita Pizza 345G',
                'detailedDesc' => 'Goodfella\'s Stonebaked Thin Margherita Pizza 345G',
                'barcode' => '13636651323',
                'category_id' => 28,
                'type' => 3,
                'created_at' => '2020-02-13 16:10:59',
                'updated_at' => '2020-02-13 16:10:59',
            ),
            31 => 
            array (
                'id' => 27,
                'name' => 'Grower\'s Harvest Island Mix 300G',
                'price' => 1.19,
                'shortDesc' => 'Grower\'s Harvest Island Mix 300G',
                'detailedDesc' => 'Grower\'s Harvest Island Mix 300G',
                'barcode' => '63725525137',
                'category_id' => 29,
                'type' => 1,
                'created_at' => '2020-02-13 16:12:50',
                'updated_at' => '2020-02-13 16:12:50',
            ),
            32 => 
            array (
                'id' => 28,
                'name' => 'Grower\'s Harvest Trail Mix 300G',
                'price' => 1.19,
                'shortDesc' => 'Grower\'s Harvest Trail Mix 300G',
                'detailedDesc' => 'Grower\'s Harvest Trail Mix 300G',
                'barcode' => '98685592378',
                'category_id' => 29,
                'type' => 1,
                'created_at' => '2020-02-13 16:13:20',
                'updated_at' => '2020-02-13 16:13:20',
            ),
            33 => 
            array (
                'id' => 29,
                'name' => 'Nature Valley Protein Salted Caramel Nut Bars 4X40g',
                'price' => 2.0,
                'shortDesc' => 'Nature Valley Protein Salted Caramel Nut Bars 4X40g',
                'detailedDesc' => 'Nature Valley Protein Salted Caramel Nut Bars 4X40g',
                'barcode' => '61191083203',
                'category_id' => 30,
                'type' => 1,
                'created_at' => '2020-02-13 16:14:02',
                'updated_at' => '2020-02-13 16:14:02',
            ),
            34 => 
            array (
                'id' => 30,
                'name' => 'Schar White Ciabatta Rolls 200G',
                'price' => 2.0,
                'shortDesc' => 'Schar White Ciabatta Rolls 200G',
                'detailedDesc' => 'Schar White Ciabatta Rolls 200G',
                'barcode' => '59078521512',
                'category_id' => 22,
                'type' => 1,
                'created_at' => '2020-02-13 16:14:33',
                'updated_at' => '2020-02-13 16:14:33',
            ),
            35 => 
            array (
                'id' => 31,
                'name' => 'Mcvitie\'s Jaffa Cakes Triple Pack 30 Cakes',
                'price' => 1.25,
                'shortDesc' => 'Mcvitie\'s Jaffa Cakes Triple Pack 30 Cakes',
                'detailedDesc' => 'Mcvitie\'s Jaffa Cakes Triple Pack 30 Cakes',
                'barcode' => '54203730653',
                'category_id' => 21,
                'type' => 1,
                'created_at' => '2020-02-13 16:15:03',
                'updated_at' => '2020-02-13 16:15:03',
            ),
            36 => 
            array (
                'id' => 32,
                'name' => 'Pepsi Max 24 X 330Ml',
                'price' => 8.0,
                'shortDesc' => 'Pepsi Max 24 X 330Ml',
                'detailedDesc' => 'Pepsi Max 24 X 330Ml',
                'barcode' => '80487675168',
                'category_id' => 37,
                'type' => 1,
                'created_at' => '2020-02-13 16:15:44',
                'updated_at' => '2020-02-13 16:15:44',
            ),
        ));
        
        
    }
}
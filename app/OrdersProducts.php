<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersProducts extends Model
{
    protected $table = 'orders_products';

    protected $fillable = [
        'order_id', 'product_id', 'product_name', 'product_quantity', 'product_price', 'product_barcode'
    ];
}

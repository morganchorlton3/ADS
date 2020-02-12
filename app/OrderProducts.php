<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    protected $table = 'order_products';

    protected $fillable = [
        'order_id', 'product_id', 'product_name', 'product_quantity', 'product_price', 'product_barcode'
    ];
}

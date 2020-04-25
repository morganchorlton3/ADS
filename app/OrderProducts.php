<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    protected $table = 'order_products';

    protected $fillable = [
        'orderID', 'productID', 'quantity', 'pricePaid',
    ];

    public function product(){
        return $this->hasOne('App\Product','id', 'productID');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLocation extends Model
{
    protected $fillable = [
        'productID', 'aisle', 'mod', 'shelf', 'slot',
    ];

    public function Product(){
        return $this->hasOne('App\Product', 'productID', 'id');
    }
}

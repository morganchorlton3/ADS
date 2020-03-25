<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLocation extends Model
{
    protected $fillable = [
        'product_ID', 'aisle', 'mod', 'shelf', 'slot',
    ];

    protected $primaryKey = 'product_ID';

    public function Product(){
        return $this->hasOne('App\Product');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLocation extends Model
{
    protected $fillable = [
        'product_ID', 'aisle', 'mod', 'shelf', 'slot',
    ];

    public function Product()
    {
        return $this->belongsTo('App\Product');
    }
}

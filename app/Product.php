<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'shortDesc', 'detailedDesc', 'barcode'
    ];

    public function Productlocation(){
        return $this->hasOne('App\ProductLocation');
    }
}

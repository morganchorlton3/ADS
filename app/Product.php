<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'shortDesc', 'detailedDesc', 'barcode', 'category_id'
    ];

    public function Productlocation(){
        return $this->hasOne('App\ProductLocation');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Laravel\Scout\Searchable;

class Product extends Model
{

    protected $fillable = [
        'name', 'price', 'shortDesc', 'detailedDesc', 'barcode', 'category_id', 'type'
    ];

    public function Productlocation(){
        return $this->hasOne('App\ProductLocation');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

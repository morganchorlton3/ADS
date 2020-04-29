<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductPicking extends Model
{    
    protected $table = "product_picking";

    public function products(){
        return $this->belongsTo(Product::class, 'productID');
    }
}
 
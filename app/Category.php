<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategory;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'parent_id' ];

    public function subcategory(){
        return $this->hasMany('App\Category', 'parent_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

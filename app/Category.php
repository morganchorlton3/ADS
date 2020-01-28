<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['cat','sub_cat', 'sub_sub_cat', 'type' ];

    public function products()
    {
        return $this->belongsToMany(\App\Product::class);
    }
}

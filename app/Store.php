<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = "store_location";

    protected $fillable = [
        'name', 'post_code',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id', 'delivery_date', 'placed_date', 'note', 'total_weight', 'item_count', 'total', 'status'
    ];

}

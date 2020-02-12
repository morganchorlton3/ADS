<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'slot_id', 'note', 'total_weight', 'item_count', 'total', 'status'
    ];
}

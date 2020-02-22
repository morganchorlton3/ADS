<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'slot_id','schedule_id', 'user_id', 'date','order_id', 'post_code', 'delivery_time'
    ];
}

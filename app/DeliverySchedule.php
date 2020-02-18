<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliverySchedule extends Model
{

    protected $table = 'delivery_schedule';

    protected $fillable = [
       'van_id', 'day', 'start', 'end'
    ];
}

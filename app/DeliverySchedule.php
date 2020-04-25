<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliverySchedule extends Model
{

    protected $table = 'delivery_schedule';

    protected $fillable = [
       'run', 'start', 'end'
    ];
}

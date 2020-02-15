<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryProfile extends Model
{
    protected $fillable = [
        'van_id', 'schedule_id',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryVehicle extends Model
{
    protected $table = 'van';

    protected $fillable = [
        'registration', 'mileage', 'capacity'
    ];
}

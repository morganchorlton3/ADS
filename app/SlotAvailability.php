<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotAvailability extends Model
{
    protected $fillable = [
        'slotID', 'price', 'status',
    ];
}

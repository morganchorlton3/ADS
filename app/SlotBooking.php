<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotBooking extends Model
{
    protected $table = 'slot_booking';

    protected $fillable = [
        'user_id', 'slot_id', 'date'
    ];
}

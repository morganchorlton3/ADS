<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = [
        'day', 'start', 'end', 'price'
    ];

    protected $primaryKey = 'id';

    public function SlotBooking()
    {
        return $this->belongsTo('App\SlotBooking', 'slot_id');
    }
}

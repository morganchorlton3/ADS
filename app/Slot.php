<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = [
        'day', 'start', 'end', 'price'
    ];

    protected $primaryKey = 'id';

    public function Orders()
    {
        return $this->hasOne('App\Orders');
    }

    public function SlotBooking()
    {
        return $this->hasMany('App\SlotBooking', 'slot_id');
    }
}

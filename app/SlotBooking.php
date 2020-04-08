<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotBooking extends Model
{
    protected $table = 'slot_booking';

    protected $primaryKey = 'slot_id';

    protected $fillable = [
        'user_id', 'slot_id', 'date', 'post_code'
    ];

    public function slot(){
        return $this->hasOne('App\Slot', 'id');
    }
}

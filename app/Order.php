<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'userID', 'placedDate', 'note', 'totalWeight', 'itemCount', 'total', 'status'
    ];

    public function Address(){	
        return $this->hasOne('App\Address', 'user_id');	
    }	

    public function User(){	
        return $this->hasOne('App\User', 'id');	
    }	

    public function Slot(){	
        return $this->hasOne('App\Slot', 'id', 'slot_id');	
    }

    public function SlotBooking(){	
        return $this->hasOne('App\SlotBooking','id', 'slotBookingID');	
    }

}

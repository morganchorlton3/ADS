<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = "orders";

    protected $fillable = [
        'userID', 'placedDate', 'note', 'totalWeight', 'itemCount', 'total', 'status'
    ];

    public function Address(){	
        return $this->hasOne('App\Address', 'user_id');	
    }	

    public function User(){	
        return $this->belongsTo('App\User', 'userID');	
    }	

    public function SlotBooking(){	
        return $this->belongsTo('App\SlotBooking', 'slotBookingID', 'id');	
    }

}

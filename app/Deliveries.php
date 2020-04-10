<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliveries extends Model
{
    public function Orders(){	
        return $this->belongsTo('App\Order', 'order', 'id');	
    }

    public function DeliverySchedule(){	
        return $this->belongsTo('App\DeliverySchedule', 'deliverySchedule', 'id');	
    }
}

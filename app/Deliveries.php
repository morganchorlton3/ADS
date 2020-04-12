<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliveries extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Order', 'order', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id', 'slot_id', 'delivery_date', 'placed_date', 'note', 'total_weight', 'item_count', 'total', 'status'
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
}

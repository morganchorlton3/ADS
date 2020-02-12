<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id', 'slot_id', 'note', 'total_weight', 'item_count', 'total', 'status'
    ];

    public function Address(){
        return $this->hasOne('App\Address');
    }
}

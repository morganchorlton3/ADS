<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = [
        'day', 'start', 'end', 'price'
    ];

    public function Orders()
    {
        return $this->hasOne('App\Orders');
    }
}

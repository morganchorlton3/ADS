<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Run extends Model
{
    public function deliveries()
    {
        return $this->hasMany('App\Deliveries', 'deliverySchedule');
    }
}

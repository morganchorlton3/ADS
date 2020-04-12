<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleRuns extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'run', 'deliveryDate', 'deliveryCount', 'lastPostCode', 'currentRunTime', 'slotID'
    ];

    /*public function Deliveries(){
        return $this->hasMany('App\Deliveries', 'deliverySchedule', 'id');
    }*/
    public function deliveries()
    {
        return $this->hasMany('App\Deliveries', 'deliverySchedule');
    }

}

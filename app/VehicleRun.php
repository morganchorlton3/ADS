<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleRun extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'run', 'deliveryDate', 'deliveryCount', 'lastPostCode', 'currentRunTime', 'slotID'
    ];

    public function deliveries()
    {
        return $this->hasMany('App\Deliveries', 'deliverySchedule');
    }

}

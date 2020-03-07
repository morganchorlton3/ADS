<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleRuns extends Model
{
    protected $fillable = [
        'run', 'deliveryDate', 'deliveryCount', 'lastPostCode', 'currentRunTime'
    ];
}

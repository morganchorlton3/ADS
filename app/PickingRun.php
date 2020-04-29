<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductPicking;

class PickingRun extends Model
{
    protected $table = "picking_runs";

    public function productPicking(){
        return $this->hasMany(ProductPicking::class, 'runID', 'id');
    }
}

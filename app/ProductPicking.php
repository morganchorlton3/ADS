<?php

namespace App;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class ProductPicking extends Model
{
    use Cachable;
    
    protected $cachePrefix = "picking";
}

<?php

namespace app\Facades;

use Illuminate\Support\Facades\Facade;

class DirectionsFacade extends Facade {
    protected static function getFacadeAccessor() { return 'directions'; }
}
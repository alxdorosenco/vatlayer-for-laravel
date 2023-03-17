<?php

namespace AlxDorosenco\VatlayerForLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class Vatlayer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'vatlayer-factory';
    }
}

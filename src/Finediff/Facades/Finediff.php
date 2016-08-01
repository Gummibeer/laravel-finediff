<?php

namespace Gummibeer\Finediff\Facades;

use Illuminate\Support\Facades\Facade;

class Finediff extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'finediff';
    }
}

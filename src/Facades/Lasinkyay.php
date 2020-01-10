<?php

namespace Mrlinnth\Lasinkyay\Facades;

use Illuminate\Support\Facades\Facade;

class Lasinkyay extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lasinkyay';
    }
}

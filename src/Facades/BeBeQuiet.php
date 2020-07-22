<?php

namespace jjrohrer\BeBeQuiet\Facades;

use Illuminate\Support\Facades\Facade;

class BeBeQuiet extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bebequiet';
    }
}

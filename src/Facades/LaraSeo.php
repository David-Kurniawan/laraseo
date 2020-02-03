<?php

namespace VidLab\LaraSeo\Facades;

use Illuminate\Support\Facades\Facade;

class LaraSeo extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraseo';
    }
}

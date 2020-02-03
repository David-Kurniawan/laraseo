<?php

namespace VidLab\LaraSeo\Facades;

use Illuminate\Support\Facades\Facade;

class LaraOpenGraph extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraopengraph';
    }
}

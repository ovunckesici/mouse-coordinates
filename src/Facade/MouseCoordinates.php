<?php

namespace Doranetyazillim\MouseCoordinates;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Doranetyazillim\MouseCoordinates\Skeleton\SkeletonClass
 */
class MouseCoordinates extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mouse-coordinates';
    }
}

<?php

namespace Jeffochoa\LivewirePortal;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jeffochoa\LivewirePortal\LivewirePortal
 */
class LivewirePortalFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LivewirePortal';
    }
}

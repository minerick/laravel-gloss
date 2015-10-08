<?php namespace Ilkermutlu\Gloss;

use Illuminate\Support\Facades\Facade;

class GlossFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'gloss';
    }
}

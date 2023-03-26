<?php

namespace App\Traits;

trait CanThrowTrait
{
    /**
     * Throw exception.
     *
     * @param string $exceptionClass
     */
    public function throw(string $exceptionClass)
    {
        throw new $exceptionClass;
    }
}

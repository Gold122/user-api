<?php

namespace App\Traits;

trait CanThrowTrait
{
    /**
     * Throw exceeption
     *
     * @param string $exceptionClass
     */
    public function throw(string $exceptionClass)
    {
        throw new $exceptionClass;
    }
}

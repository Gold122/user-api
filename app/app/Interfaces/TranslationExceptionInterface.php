<?php

namespace App\Interfaces;

interface TranslationExceptionInterface
{
    /**
     * Get exception translation.
     *
     * @return string
     */
    public function getTranslation(): string;

    /**
     * Get status code.
     *
     * @return int
     */
    public function getStatusCode(): int;
}

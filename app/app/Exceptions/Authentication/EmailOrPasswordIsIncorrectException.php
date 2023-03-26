<?php

namespace App\Exceptions\Authentication;

use App\Interfaces\TranslationExceptionInterface;
use Exception;

class EmailOrPasswordIsIncorrectException extends Exception implements TranslationExceptionInterface
{
    /**
     * @inheritDoc
     */
    public function getTranslation(): string
    {
        return 'exception.emailOrPasswordIsIncorrect';
    }

    /**
     * @inheritDoc
     */
    public function getStatusCode(): int
    {
        return 403;
    }
}

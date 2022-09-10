<?php

namespace App\Exceptions;

use Exception;
use Nuwave\Lighthouse\Exceptions\RendersErrorsExtensions;

class CustomException extends Exception implements RendersErrorsExtensions
{


    public function __construct(string $message)
    {
        parent::__construct($message);

    }

    public function isClientSafe(): bool
    {
        return true;
    }


    public function getCategory(): string
    {
        return "";
    }

    public function extensionsContent(): array
    {
        return [
        ];
    }


}

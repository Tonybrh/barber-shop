<?php

namespace App\Domain\Exceptions;

class UserUnauthorizedException extends \DomainException
{
    const  MESSAGE = 'User unauthorized';
    public function __construct(string $message = "", int $code = 0)
    {
        parent::__construct(self::MESSAGE, $code);
    }
}

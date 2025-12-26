<?php

namespace App;

class InsufficientFundsException extends \Exception
{
    public function __construct(string $message = "Недостаточно средств", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
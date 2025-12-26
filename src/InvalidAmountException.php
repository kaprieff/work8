<?php

namespace App;

class InvalidAmountException extends \Exception
{
    public function __construct(string $message = "Недопустимая сумма", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
<?php

namespace App\Exceptions;

class ValidateException extends \Exception
{
  public function __construct(string $message)
  {
    parent::__construct($message);
  }
}

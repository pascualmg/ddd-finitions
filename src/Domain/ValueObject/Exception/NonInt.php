<?php

namespace pascualmg\dddfinitions\Domain\ValueObject\Exception;

use Throwable;

class NonInt extends \InvalidArgumentException
{
    public static function of(mixed $value): self
    {
        return new self(
            "Value '$value' is not an integer");
    }
}
<?php

namespace pascualmg\dddfinitions\Domain\ValueObject\Exception;


class NonNumericString extends \InvalidArgumentException
{
    private function __construct(string $nonNumericString)
    {
        parent::__construct("The string '$nonNumericString' is not a valid integer");
    }

    public static function of(string $nonNumericString): static
    {
        return new self($nonNumericString);
    }
}
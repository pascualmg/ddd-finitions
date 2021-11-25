<?php

namespace pascualmg\dddfinitions\Domain\Bus;

use pascualmg\dddfinitions\Domain\ValueObject\StringValueObject;

abstract class EnumValueObject extends StringValueObject
{

    protected function __construct(string $value,string ...$validValues)
    {
        parent::__construct($value);
        $this->validValues = $validValues;
    }

    protected function asserts($value): void
    {
        parent::asserts($value);
        if(!in_array($value, $this->validValues, true)) {
            throw new \InvalidArgumentException("Invalid value for enum: $value" . PHP_EOL . "Valid values: " . implode(', ', $this->validValues));
        }
    }
}
<?php

namespace pascualmg\dddfinitions\Domain\Bus;

use pascualmg\dddfinitions\Domain\ValueObject\StringValueObject;

abstract class EnumValueObject extends StringValueObject
{
    protected array $validValues = [];

    protected function asserts($value): void
    {
        if(!in_array($value, $this->validValues, true)) {
            throw new \InvalidArgumentException("Invalid value for enum: $value" . PHP_EOL . "Valid values: " . implode(', ', $this->validValues));
        }
    }
}
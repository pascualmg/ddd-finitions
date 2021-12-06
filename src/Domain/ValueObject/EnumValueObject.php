<?php

namespace pascualmg\dddfinitions\Domain\ValueObject;

abstract class EnumValueObject extends StringValueObject
{
    protected array $validValues = [];

    protected function asserts($value): void
    {
        if(!in_array($value, $this->validValues, true)) {
            throw new \InvalidArgumentException("Invalid value for enum: $value" . PHP_EOL . "Valid values: " . implode(', ', $this->validValues));
        }
    }
    public function __call(string $name, array $arguments)
    {
        self::from($name);
    }
}
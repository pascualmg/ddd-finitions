<?php


namespace pascualmg\dddfinitions\Domain\ValueObject;


use Pascualmg\assert\Assert;

class StringValueObject extends ValueObject implements \Stringable
{
    protected function asserts($value): void
    {
        if(!is_string($value)){
            throw new \InvalidArgumentException('The value is not a string');
        }
    }

    public function __toString() : string
    {
        return (string)$this->value();
    }

    public function jsonSerialize() : string
    {
        return (string)$this->value();
    }
}
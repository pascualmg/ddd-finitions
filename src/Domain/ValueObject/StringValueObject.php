<?php


namespace pascualmg\dddfinitions\Domain\ValueObject;


use Pascualmg\assert\Assert;

class StringValueObject extends ValueObject implements \Stringable
{
    protected function asserts($value): void
    {
        Assert::that($value)('is_string', "{$value} has to be string", \DomainException::class);
    }

    public function __toString()
    {
        return (string)$this->value();
    }

    public function jsonSerialize() : string
    {
        return (string)$this->value();
    }
}
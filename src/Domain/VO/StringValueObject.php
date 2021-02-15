<?php


namespace pascualmg\dddfinitions\Domain\VO;

use pascualmg\assert\Assert;

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
}
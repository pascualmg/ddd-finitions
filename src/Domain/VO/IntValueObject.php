<?php


namespace pascualmg\dddfinitions\Domain\VO;

use pascualmg\assert\Assert;
use pascualmg\assert\Asserts\IsType;

class IntValueObject extends ValueObject
{

    public static function fromString(string $number): IntValueObject
    {
        return self::from((int)$number);
    }

    protected function asserts($value): void
    {
        Assert::that($value)
        ('is_numeric')
        (IsType::integer());
    }
}
<?php


namespace Pascualmg\dddfinitions\Domain\VO;

use Pascualmg\assert\Assert;
use Pascualmg\assert\Asserts\IsType;

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
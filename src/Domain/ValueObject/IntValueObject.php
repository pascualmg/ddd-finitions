<?php


namespace pascualmg\dddfinitions\Domain\ValueObject;


use pascualmg\dddfinitions\Domain\ValueObject\Exception\NonNumericString;
use pascualmg\dddfinitions\Domain\ValueObject\Exception\NonInt;

class IntValueObject extends ValueObject
{

    public static function fromString(string $number): IntValueObject
    {
        if(!is_numeric($number)){
            throw NonNumericString::of($number);
        }
        return self::from((int)$number);
    }

    public function jsonSerialize() : int
    {
        return $this->value();
    }

    protected function asserts(mixed $value): void
    {
        if (is_int($value)) {
            return;
        }

        throw NonInt::of($value);
    }
}
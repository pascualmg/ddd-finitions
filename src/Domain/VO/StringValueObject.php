<?php


namespace pascualmg\dddfinitions\Domain\VO;

class StringValueObject extends ValueObject
{
    protected function asserts($value): void
    {
        if (is_string($value)) {
            return;
        }
        throw new \Exception('Error : StringValueObject from not string! used : ' . gettype($value));
    }
}
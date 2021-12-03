<?php


namespace pascualmg\dddfinitions\Domain\ValueObject;

use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid extends StringValueObject
{
    public static function random(): static
    {
        return self::from(RamseyUuid::uuid4()->toString());
    }

    protected function asserts($value): void
    {
        if(is_null($value)) {
            throw new \InvalidArgumentException('Uuid cannot be null');
        }
        if( RamseyUuid::isValid($value) ) {
            return;
        }
        throw new InvalidUuidStringException($value);
    }

    public function __toString()
    {
        return (string)$this->value();
    }

    public function jsonSerialize() : string
    {
        return $this->__toString();
    }
}
<?php


namespace Pascualmg\dddfinitions\Domain\VO;


use Pascualmg\assert\Assert;

class Uuid extends ValueObject implements \Stringable
{

    public static function random(): static
    {
        return self::from(\Ramsey\Uuid\Uuid::uuid4()->toString());
    }

    protected function asserts($value): void
    {
        $isValidUuid = fn($possibleUuid) => \Ramsey\Uuid\Uuid::isValid($possibleUuid);

        Assert::that($value)
        ($isValidUuid, "{$value} is not a valid uuid!", \DomainException::class);
    }

    public function __toString()
    {
        return (string)$this->value();
    }
}
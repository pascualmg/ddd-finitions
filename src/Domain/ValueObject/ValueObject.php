<?php


namespace pascualmg\dddfinitions\Domain\ValueObject;


abstract class ValueObject implements \JsonSerializable
{
    private mixed $value;

    protected function __construct(mixed $value)
    {
        $this->asserts($value);
        $this->value = $value;
    }

    abstract protected function asserts(mixed $value): void;

    public static function from(mixed $value): static
    {
        return new static($value);
    }

    public function equals(ValueObject $valueObject): bool
    {
        return $valueObject->jsonSerialize() === $this->jsonSerialize();
    }

    public function value()
    {
        return $this->value;
    }
}
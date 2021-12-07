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

    public function equals(ValueObject | int | string | bool | array  $value): bool
    {
        if($value instanceof self) {
            return $value->jsonSerialize() === $this->jsonSerialize();
        }

        return $value === $this->jsonSerialize();
    }

    public function value()
    {
        return $this->value;
    }
}
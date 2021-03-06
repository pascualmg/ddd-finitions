<?php


namespace Pascualmg\dddfinitions\Domain\VO;


abstract class ValueObject implements \JsonSerializable
{
    private mixed $value;

    private function __construct(mixed $value)
    {
        $this->asserts($value);
        $this->value = $value;
    }

    abstract protected function asserts($value): void;

    public static function from(mixed $value): static
    {
        if(null === $value){
            $className = static::class;
            throw new \DomainException("trying to get ValueObject {$className} with null");
        }
            return new static($value);
    }

    public function equals(ValueObject $valueObject): bool
    {
        return $valueObject->jsonSerialize() === $this->jsonSerialize();
    }

    public function JsonSerialize()
    {
        return $this->value();
    }

    public function value()
    {
        return $this->value;
    }
}
<?php

namespace pascualmg\dddfinitions\Domain\Bus;

use InvalidArgumentException;
use JsonSerializable;
use pascualmg\dddfinitions\Domain\Interfaces\Identificable;
use pascualmg\dddfinitions\Domain\Interfaces\Nombrable;
use pascualmg\dddfinitions\Domain\ValueObject\Uuid;

abstract class Message implements JsonSerializable, Identificable, Typable, Nombrable
{
    public const ID = 'id';
    public const PAYLOAD = 'payload';
    private Uuid $id;
    private array $payload;

    public function __construct(array $payload = [], ?Uuid $id = null)
    {
        $this->id = $id ?? Uuid::random();

        $this->assertPayloadHasOnlyPrimitiveValues($payload);
        $this->payload = $payload;
    }

    private function assertPayloadHasOnlyPrimitiveValues(array $payload): void
    {
        foreach ($payload as $key => $value) {
            {
                switch (gettype($value)) {
                    case 'integer':
                    case 'double':
                    case 'string':
                    case 'boolean':
                        break;
                    default:
                        throw new InvalidArgumentException(
                            "The value of the key '$key' is not a primitive type used : " . gettype(
                                $value
                            ) . ' ' . (is_object($value) ? get_class($value) : '')
                        );
                }
            }
        }
    }

    public function fromJson(string $json): Message
    {
        $verifiedJsonDecodedAssocArray = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        return new static($verifiedJsonDecodedAssocArray);
    }


    public static function fromArray(array $array): static
    {
        self::assertThatKeyExists($array, self::ID);
        self::assertThatKeyExists($array, self::PAYLOAD);
        return new static($array[self::PAYLOAD], $array[self::ID]);
    }

    private static function assertThatKeyExists(array $payload, string $string): void
    {
        if (!array_key_exists($string, $payload)) {
            throw new InvalidArgumentException("The key '$string' is not present in the payload");
        }
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function jsonSerialize(): array
    {
        return $this->payload();
    }

    public function payload(): array
    {
        return $this->payload;
    }
}
<?php

namespace pascualmg\dddfinitions\Domain\Bus;

use InvalidArgumentException;
use JsonSerializable;
use pascualmg\dddfinitions\Domain\Identificable;
use pascualmg\dddfinitions\Domain\ValueObject\Uuid;

abstract class Message implements JsonSerializable, Identificable
{
    public const ID = 'id';
    public const PAYLOAD = 'payload';
    private Uuid $id;
    private array $payload;

    public function __construct(Uuid $id, array $payload = [])
    {
        $this->id = $id;
        $this->payload = $payload;
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function fromJson(string $json): Message
    {
        $verifiedJsonDecodedAssocArray = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        $this->setPayload($verifiedJsonDecodedAssocArray);
        return $this;
    }

    private function setPayload(array $payload): void
    {
        $this->assertThatKeyExists($payload, self::ID);
        $this->assertThatKeyExists($payload, self::PAYLOAD);
        $this->assertPayloadHasOnlyPrimitiveValues($payload);

        $this->payload = $payload;
    }

    private function assertThatKeyExists(array $payload, string $string): void
    {
        if (!array_key_exists($string, $payload)) {
            throw new InvalidArgumentException("The key '$string' is not present in the payload");
        }
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
                        throw new InvalidArgumentException("The value of the key '$key' is not a primitive type");
                }
            }
        }
    }

    public function fromArray(array $array): Message
    {
        $this->assertThatKeyExists($array, self::ID);
        $this->id = Uuid::from($array[self::ID]);
        $this->setPayload($array);
        return $this;
    }

    public function fromJsonString(string $string): Message
    {
        $decodedArray = json_decode(json_encode($string), true, 512, JSON_THROW_ON_ERROR);
        $this->setPayload($decodedArray);
        return $this;
    }

    public function jsonSerialize()
    {
        return $this->payload;
    }

    public function payload(): array
    {
        return $this->payload;
    }
    abstract protected function type(): MessageType;
    abstract protected function name(): string;

}
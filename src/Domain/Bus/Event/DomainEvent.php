<?php

declare(strict_types=1);

namespace Pascualmg\dddfinitions\Domain\Bus\Event;

use Pascualmg\dddfinitions\Domain\VO\AtomDate;
use Pascualmg\dddfinitions\Domain\VO\Uuid;

abstract class DomainEvent
{
    private string $eventId;
    private AtomDate $occurredOn;

    public function __construct(private string $aggregateId, string $eventId = null, string $occurredOn = null)
    {
        $this->eventId    = $eventId ?: (string)Uuid::random();
        $this->occurredOn = $occurredOn ?: AtomDate::now();
    }

    abstract public static function fromPrimitives(
        string $aggregateId,
        array $payload,
        string $eventId,
        string $occurredOn
    ): self;

    abstract public static function eventName(): string;

    abstract public function toPrimitives(): array;

    public function aggregateId(): string
    {
        return $this->aggregateId;
    }

    public function eventId(): string
    {
        return $this->eventId;
    }

    public function occurredOn(): string
    {
        return (string)$this->occurredOn;
    }
}

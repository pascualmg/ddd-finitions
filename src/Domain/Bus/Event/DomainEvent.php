<?php

declare(strict_types=1);

namespace pascualmg\dddfinitions\Domain\Bus\Event;

use pascualmg\dddfinitions\Domain\Bus\Message;
use pascualmg\dddfinitions\Domain\ValueObject\AtomDate;
use pascualmg\dddfinitions\Domain\ValueObject\Uuid;

abstract class DomainEvent extends Message
{

    public function __construct(
        private Uuid $aggregateId,
        private ?AtomDate $occurredOn = null
    ) {
        parent::__construct(
            [
                'aggregateId' => $this->aggregateId,
                'occurredOn' => $this->occurredOn
            ]
        );
        $this->occurredOn = $occurredOn ?: AtomDate::now();
    }

    public function aggregateId(): Uuid
    {
        return $this->aggregateId;
    }

    public function occurredOn(): AtomDate
    {
        return $this->occurredOn;
    }
}

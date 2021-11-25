<?php


namespace pascualmg\dddfinitions\Domain;


use pascualmg\dddfinitions\Domain\Bus\Event\DomainEvent;

abstract class AggregateRoot extends Entity
{
    /** @var DomainEvent[] */
    private array $domainEvents = [];

    final public function popAndFlushAllDomainEvents(): array
    {
        $domainEvents = $this->domainEvents;
        $this->domainEvents = [];

        return $domainEvents;
    }

    final protected function pushDomainEvent(DomainEvent ...$domainEvents): void
    {
        foreach ($domainEvents as $domainEvent) {
            $this->domainEvents[] = $domainEvent;
        }
    }
}
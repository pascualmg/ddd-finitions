<?php


namespace pascualmg\dddfinitions\Domain\Model;


use pascualmg\dddfinitions\Domain\Bus\Event\DomainEvent;

abstract class AggregateRoot extends Entity
{
    private array $domainEvents = [];

    final public function popAndFlushAllDomainEvents(): array
    {
        $domainEventsToPop = $this->domainEvents;
        unset($this->domainEvents);
        $this->domainEvents = [];

        return $domainEventsToPop;
    }

    final protected function pushDomainEvent(DomainEvent ...$domainEvents): void
    {
        foreach ($domainEvents as $domainEvent) {
            $this->domainEvents[] = $domainEvent;
        }
    }
}
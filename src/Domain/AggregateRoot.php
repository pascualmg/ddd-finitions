<?php


namespace pascualmg\dddfinitions\Domain;


use pascualmg\dddfinitions\Domain\Bus\Event\DomainEvent;

abstract class AggregateRoot implements Identificable, Nameable
{
    /** @var DomainEvent[] */
    private array $domainEvents = [];

    final public function popAndFlushAllDomainEvents(): array
    {
        $domainEvents = $this->domainEvents;
        $this->domainEvents = [];

        return $domainEvents;
    }

    final protected function push(DomainEvent $domainEvent): void
    {
        $this->domainEvents[] = $domainEvent;
    }
}
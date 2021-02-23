<?php


namespace Pascualmg\dddfinitions\Domain;


use Pascualmg\dddfinitions\Domain\Bus\Event\DomainEvent;

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

    final protected function pushDomainEvent(DomainEvent ...$domainEvents): void
    {
        foreach ($domainEvents as $domainEvent) {
            $this->domainEvents[] = $domainEvent;
        }
    }
}
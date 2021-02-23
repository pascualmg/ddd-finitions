<?php


namespace Pascualmg\dddfinitions\Domain\Bus\Event;

interface DomainEventBus
{
    public function dispatch(DomainEvent ...$domainEvents): void;
}


<?php


namespace pascualmg\dddfinitions\Domain\Bus\Event;

interface DomainEventBus
{
    public function dispatch(DomainEvent ...$domainEvents): void;
}


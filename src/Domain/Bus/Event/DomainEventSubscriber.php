<?php


namespace Pascualmg\dddfinitions\Domain\Bus\Event;


interface DomainEventSubscriber
{
    /** @return string[] with the classNames of DomainEvents */
    public function subscribedToEvent(): array;
}
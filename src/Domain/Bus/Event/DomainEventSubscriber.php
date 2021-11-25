<?php


namespace pascualmg\dddfinitions\Domain\Bus\Event;


use pascualmg\dddfinitions\Domain\Bus\Message;
use pascualmg\dddfinitions\Domain\Bus\MessageSubscriber;

interface DomainEventSubscriber extends MessageSubscriber
{
    /** @return string[] with the classNames of DomainEvents */
    public function subscribedTo(): array;

    public function __invoke(Message $domainEvent): mixed;
}
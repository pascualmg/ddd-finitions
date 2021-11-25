<?php


namespace pascualmg\dddfinitions\Domain\Bus\Event;


use pascualmg\dddfinitions\Domain\Bus\Message;
use pascualmg\dddfinitions\Domain\Bus\MessageSubscriber;

interface DomainEventSubscriber extends MessageSubscriber
{
    public function __invoke(Message $domainEvent): void;
}
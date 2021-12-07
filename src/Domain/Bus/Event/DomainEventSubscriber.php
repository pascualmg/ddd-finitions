<?php


namespace pascualmg\dddfinitions\Domain\Bus\Event;


use pascualmg\dddfinitions\Domain\Bus\Message;
use pascualmg\dddfinitions\Domain\Bus\MessageSubscriber;

abstract class DomainEventSubscriber implements MessageSubscriber
{

    public function isSubscribedTo(Message $message): bool
    {
        return $message->type() === DomainEvent::class;
    }
}
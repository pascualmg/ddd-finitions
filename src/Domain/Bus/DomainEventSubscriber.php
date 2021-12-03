<?php


namespace pascualmg\dddfinitions\Domain\Bus;


abstract class DomainEventSubscriber implements MessageSubscriber
{

    public function isSubscribedTo(Message $message): bool
    {
        return $message->type() === DomainEvent::class;
    }
}
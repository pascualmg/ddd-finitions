<?php


namespace pascualmg\dddfinitions\Domain\Bus\Event;




use pascualmg\dddfinitions\Domain\Bus\Message;
use pascualmg\dddfinitions\Domain\Bus\MessageBus;
use pascualmg\dddfinitions\Domain\Bus\MessageSubscriber;
use pascualmg\dddfinitions\Domain\Bus\MessageType;


class DomainEventMessageBus implements MessageBus
{


    public function dispatch(Message $message): void
    {
        //check if Message is a DomainEvent
        if (!$message instanceof DomainEvent) {
            throw new \InvalidArgumentException('Message must be a DomainEvent');
        }
    }

    public function subscribe(MessageSubscriber $subscriber): void
    {
        // TODO: Implement subscribe() method.
    }
}


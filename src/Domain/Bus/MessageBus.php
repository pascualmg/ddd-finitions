<?php

namespace pascualmg\dddfinitions\Domain\Bus;

interface MessageBus
{
   public function dispatch(Message $message): void;
   public function subscribe(MessageSubscriber $subscriber): void;
}
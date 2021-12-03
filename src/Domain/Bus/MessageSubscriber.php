<?php

namespace pascualmg\dddfinitions\Domain\Bus;

interface MessageSubscriber
{
    public function isSubscribedTo(Message $message): bool;

    public function __invoke(Message $notifiedMessage);
}
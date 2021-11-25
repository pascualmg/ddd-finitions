<?php

namespace pascualmg\dddfinitions\Domain\Bus;

use pascualmg\dddfinitions\Domain\ValueObject\Name;

interface MessageSubscriber
{
    public function isSubscribedTo(Message $message): bool;

    public function __invoke(Message $notifiedMessage);
}
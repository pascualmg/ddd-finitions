<?php

namespace pascualmg\dddfinitions\Domain\Bus;

final class MessageType extends EnumValueObject
{
    public const DOMAIN_EVENT = 'domain-event';
    public const COMMAND = 'command';
    public const QUERY = 'query';

    protected array $validValues = [
        self::DOMAIN_EVENT,
        self::COMMAND,
        self::QUERY,
    ];
}
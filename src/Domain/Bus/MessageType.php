<?php

namespace pascualmg\dddfinitions\Domain\Bus;

class MessageType extends EnumValueObject
{
    public const DOMAIN_EVENT = 'domain-event';
    public const COMMAND = 'command';
    public const QUERY = 'query';

    public function __construct($value)
    {
        parent::__construct($value, self::DOMAIN_EVENT, self::COMMAND, self::QUERY);
    }
}
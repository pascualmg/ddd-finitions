<?php


namespace pascualmg\dddfinitions\Domain\Interfaces;


use pascualmg\dddfinitions\Domain\ValueObject\Uuid;

interface Identificable
{
    public function id(): Uuid;
}
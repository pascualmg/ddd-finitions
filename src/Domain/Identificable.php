<?php


namespace Pascualmg\dddfinitions\Domain;


use pascualmg\dddfinitions\Domain\ValueObject\Uuid;

interface Identificable
{
    public function id(): Uuid;
}
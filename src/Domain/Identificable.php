<?php


namespace Pascualmg\dddfinitions\Domain;


use Pascualmg\dddfinitions\Domain\VO\Uuid;

interface Identificable
{
    public function id(): Uuid;
}
<?php


namespace pascualmg\dddfinitions\Domain;


use pascualmg\dddfinitions\Domain\VO\Uuid;

interface Identificable
{
    public function id(): Uuid;
}
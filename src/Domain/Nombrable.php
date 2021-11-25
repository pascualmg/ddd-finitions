<?php


namespace pascualmg\dddfinitions\Domain;


use pascualmg\dddfinitions\Domain\ValueObject\Name;

interface Nombrable
{
    public static function name() : Name;
}
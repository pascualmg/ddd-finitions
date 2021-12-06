<?php


namespace pascualmg\dddfinitions\Domain\Interfaces;


use pascualmg\dddfinitions\Domain\ValueObject\Name;

interface Nombrable
{
    public static function name() : Name;
}
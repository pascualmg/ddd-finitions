<?php


namespace Pascualmg\dddfinitions\Domain;


interface Nameable
{
    public static function name() : string;
}
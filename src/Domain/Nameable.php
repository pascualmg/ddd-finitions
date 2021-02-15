<?php


namespace pascualmg\dddfinitions\Domain;


interface Nameable
{
    public static function name() : string;
}
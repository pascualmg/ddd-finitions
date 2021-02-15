<?php


namespace pascualmg\dddfinitions\Domain;


interface Nameable
{
    public function name() : string;
}
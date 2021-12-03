<?php

namespace pascualmg\dddfinitions\Domain\Bus;

interface Typable
{
    public function type(): string;
}
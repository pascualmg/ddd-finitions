<?php


namespace pascualmg\dddfinitions\Domain\Model;


use JsonSerializable;
use pascualmg\dddfinitions\Domain\Interfaces\Identificable;
use pascualmg\dddfinitions\Domain\Interfaces\Nombrable;

abstract class Entity implements Identificable , Nombrable, JsonSerializable
{

}
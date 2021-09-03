<?php


namespace Pascualmg\dddfinitions\Domain;


use JsonSerializable;

abstract class Entity implements Identificable , Nameable,  JsonSerializable
{

}
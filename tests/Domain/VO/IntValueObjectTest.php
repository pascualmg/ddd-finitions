<?php

namespace Domain\VO;

use pascualmg\dddfinitions\Domain\VO\IntValueObject;
use pascualmg\dddfinitions\Domain\VO\StringValueObject;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class IntValueObjectTest extends TestCase
{
    public function test_given_when_then()
    {
        $foo =IntValueObject::fromString("41");
        $foo->JsonSerialize();
        assertEquals(41, $foo->value());
    }

    public function test_given_when_then_2()
    {
        $bar =IntValueObject::from(42);
        $bar->JsonSerialize();
        assertEquals(42, $bar->value());
    }

    public function test_given_when_then_3()
    {
        $foo =IntValueObject::fromString("42");
        $bar =StringValueObject::from("42");

        $this->assertFalse($bar->equals($foo));
    }



}

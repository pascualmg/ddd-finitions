<?php

namespace Domain\VO;

use pascualmg\dddfinitions\Domain\VO\IntValueObject;
use pascualmg\dddfinitions\Domain\VO\StringValueObject;
use pascualmg\dddfinitions\Tests\Domain\VO\StringMother;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class IntValueObjectTest extends TestCase
{

    public function test_given_numeric_string_when_from_string_then_valulue_is_the_same_int()
    {
        $numericString = StringMother::numeric();
        $integer = (int)$numericString;

        $intValueObjectFromNumericString =IntValueObject::fromString($numericString);
        assertEquals($integer, $intValueObjectFromNumericString->value());
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

<?php

namespace pascualmg\dddfinitions\Tests\Domain\VO;

use pascualmg\dddfinitions\Domain\ValueObject\Exception\NonInt;
use pascualmg\dddfinitions\Domain\ValueObject\Exception\NonNumericString;
use pascualmg\dddfinitions\Domain\ValueObject\IntValueObject;
use pascualmg\dddfinitions\Domain\ValueObject\StringValueObject;
use Pascualmg\dddfinitions\Domain\ValueObject\TryToCreateIntValueObjectFromNonInt;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class IntValueObjectTest extends TestCase
{

    public function test_given_numeric_string_when_from_string_then_valulue_is_the_same_int(): void
    {
        $numericString = StringMother::numeric();
        $integer = (int)$numericString;

        $intValueObjectFromNumericString =IntValueObject::fromString($numericString);
        assertEquals($integer, $intValueObjectFromNumericString->value());
    }

    public function test_given_int_value_object_when_create_from_some_integer_then_serialized_value_is_the_same_integer()
    {
        $bar =IntValueObject::from(42);
        assertEquals(42, $bar->jsonSerialize());
    }

    public function test_given_same_int_value_object_when_equals_then_is_true(): void
    {
        $foo =IntValueObject::fromString("42");
        $bar =StringValueObject::from("42");

        $this->assertFalse($bar->equals($foo));
    }

    public function test_given_int_value_object_when_create_from_non_int_then_trhows_creating_from_non_numeric_string(): void
    {
        $this->expectException(NonNumericString::class);
   //     $this->expectExceptionMessage("The value 'nonNumericString' is not a valid integer");

        IntValueObject::fromString("nonNumericString");
    }

    public function test_given_int_value_object_when_create_from_non_int_then_trhows_try_to_with_message(): void
    {
        $this->expectException(NonInt::class);
        $this->expectExceptionMessage("Value '22' is not an integer");

        IntValueObject::from('22');
    }


}

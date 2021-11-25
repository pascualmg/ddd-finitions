<?php

namespace pascualmg\dddfinitions\Tests\Domain\VO;

use pascualmg\dddfinitions\Domain\ValueObject\StringValueObject;
use PHPUnit\Framework\TestCase;

class StringValueObjectTest extends TestCase
{

    public function test_given_a_value_of_type_string_when_get_instance_using_from_then_value_is_stored_and_i_can_get_and_serialize(){
        $someStringWithVariableSize = random_bytes(random_int(1, 100));

        $stringValueObject = StringValueObject::from($someStringWithVariableSize) ;

        self::assertEquals(
            expected: $someStringWithVariableSize,
            actual: $stringValueObject->value()
        );
        self::assertEquals(
            expected: $someStringWithVariableSize,
            actual: $stringValueObject->JsonSerialize()
        );
    }

    public function test_given_a_int_value_with_the_meaing_of_existence_type_when_get_instance_using_from_then_trhows_exception_and_tell_me_the_wrong_type_used(){
        $this->expectException('Exception');
        StringValueObject::from(random_int(1, 100));
    }
}

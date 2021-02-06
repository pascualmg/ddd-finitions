<?php


namespace pascualmg\dddfinitions\Domain\VO;

use InvalidArgumentException;

class IntValueObject extends ValueObject
{

    public static function fromString(string $number): IntValueObject
    {
        return self::from((int)$number);
    }

    protected function asserts($value): void
    {



        $this->assertThat( $value)
        (
            assertionCallback: 'is_numeric',
            reason: "must be numeric",
        )
        (
            'is_integer',
            "must be integer",
        );

    }


    private static function assertThat(mixed $value): callable
    {
        return static function (
            callable $assertionCallback,
            string $reason = '',
            ?string $exceptionToLaunch = null
        ) use (
            $value
        ) {
            if ($assertionCallback($value)) {
                return self::assertThat($value);
            }
            if (null === $exceptionToLaunch) {
                throw new InvalidArgumentException("value { $value } , reason { $reason }");
            }
            throw new $exceptionToLaunch($reason);
        };
    }
}
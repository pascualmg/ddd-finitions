<?php

namespace Pascualmg\dddfinitions\Tests\Domain\VO;


use Pascualmg\dddfinitions\Domain\VO\Uuid;
use PHPUnit\Framework\TestCase;

class UuidTest extends TestCase
{
    public function test_given_random_uuid_then_is_stringable_and_is_valid_uuid(): void
    {
        $validRandomUuid = Uuid::random();

        self::assertTrue(
            \Ramsey\Uuid\Uuid::isValid(
                (string)$validRandomUuid
            )
        );
    }

    public function test_given_non_valid_uuid_then_from_throws_domain_exception(): void
    {
        $invalidUuid = 'non-valid-uuid';

        $this->expectException(\DomainException::class);
        Uuid::from($invalidUuid);
    }

    public function test_given_valid_uuid_when_from_then_get_instance()
    {
        $validUuid = \Ramsey\Uuid\Uuid::uuid4();

        self::assertEquals(
            Uuid::class,
            Uuid::from($validUuid)::class
        );
    }

    public function test_given_null_id_when_from_then_trhows_domain_exception()
    {
        $this->expectException(\DomainException::class);
        Uuid::from(null);
    }
}

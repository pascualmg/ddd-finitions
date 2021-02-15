<?php

namespace pascualmg\dddfinitions\Tests\Domain\VO;

use pascualmg\dddfinitions\Domain\VO\AtomDate;
use PHPUnit\Framework\TestCase;

class AtomDateTest extends TestCase
{
    public function test_given_valid_format_date_string_when_from_then_get_instance()
    {
        $now = (string)AtomDate::now();
        $expected = (\DateTimeImmutable::createFromFormat(AtomDate::FORMAT, $now))->format(AtomDate::FORMAT);

        self::assertEquals($expected, $now);
    }
    public function test_given_invalid_format_date_string_when_from_then_throws_domain_exception()
    {
        $invalidFormatDate = '2020-03-03';
        $this->expectException(\DomainException::class);
        (string)AtomDate::from($invalidFormatDate);
    }

}

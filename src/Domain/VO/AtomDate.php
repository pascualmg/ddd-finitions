<?php


namespace Pascualmg\dddfinitions\Domain\VO;


use DateTimeInterface;
use pascualmg\assert\Assert;

class AtomDate extends StringValueObject
{
    public const FORMAT = DateTimeInterface::ATOM;

    protected function asserts($value): void
    {
        $isValidFormatDate = static fn(string $format): callable => static fn(string $date
        ): bool => ($dateTimeInmutable = \DateTimeImmutable::createFromFormat(
                $format,
                $date
            )) && $dateTimeInmutable->format($format) === $date;

        $currentFormat = self::FORMAT;

        parent::asserts($value);
        Assert::that($value)
        (
            $isValidFormatDate(self::FORMAT),
            "$value invalid date format, has to be $currentFormat",
            \DomainException::class
        );
    }

    public static function now(): static
    {
        return self::from((new \DateTimeImmutable())->format(self::FORMAT));
    }
}
<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

abstract class IntegerValueObject
{
    public function __construct(protected int $value)
    {
    }

    public function value(): int
    {
        return $this->value;
    }

    public function isBiggerThan(IntegerValueObject $other): bool
    {
        return $this->value() > $other->value();
    }
}

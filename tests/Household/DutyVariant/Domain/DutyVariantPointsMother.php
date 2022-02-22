<?php

declare(strict_types=1);

namespace App\Tests\Household\DutyVariant\Domain;

use App\Household\DutyVariant\Domain\DutyVariantPoints;
use App\Tests\Shared\Domain\IntegerMother;

final class DutyVariantPointsMother
{
    public static function create(?int $value = null): DutyVariantPoints
    {
        return new DutyVariantPoints($value ?? IntegerMother::create());
    }
}

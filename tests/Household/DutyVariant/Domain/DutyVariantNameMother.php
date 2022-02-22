<?php

declare(strict_types=1);

namespace App\Tests\Household\DutyVariant\Domain;

use App\Household\DutyVariant\Domain\DutyVariantName;
use App\Tests\Shared\Domain\WordMother;

final class DutyVariantNameMother
{
    public static function create(?string $value = null): DutyVariantName
    {
        return new DutyVariantName($value ?? WordMother::create());
    }
}

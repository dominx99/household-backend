<?php

declare(strict_types=1);

namespace App\Tests\Household\DutyVariant\Domain;

use App\Household\DutyVariant\Domain\DutyVariantId;
use App\Tests\Shared\Domain\UuidMother;

final class DutyVariantIdMother
{
    public static function create(?string $value = null): DutyVariantId
    {
        return new DutyVariantId($value ?? UuidMother::create());
    }
}

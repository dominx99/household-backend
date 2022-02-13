<?php

declare(strict_types=1);

namespace App\Tests\Duty\Domain;

use App\Household\Duty\Domain\DutyId;
use App\Tests\Shared\Domain\UuidMother;

final class DutyIdMother
{
    public static function create(?string $value = null): DutyId
    {
        return new DutyId($value ?? UuidMother::create());
    }
}

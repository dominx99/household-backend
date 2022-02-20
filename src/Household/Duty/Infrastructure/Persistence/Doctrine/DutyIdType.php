<?php

declare(strict_types=1);

namespace App\Household\Duty\Infrastructure\Persistence\Doctrine;

use App\Household\Duty\Domain\DutyId;
use App\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class DutyIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return DutyId::class;
    }
}

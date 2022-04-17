<?php

declare(strict_types=1);

namespace App\Household\DutyVariant\Infrastructure\Persistence\Doctrine;

use App\Household\DutyVariant\Domain\DutyVariantId;
use App\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class DutyVariantIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return DutyVariantId::class;
    }
}

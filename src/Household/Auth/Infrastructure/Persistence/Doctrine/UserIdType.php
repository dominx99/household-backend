<?php

declare(strict_types=1);

namespace App\Household\Auth\Infrastructure\Persistence\Doctrine;

use App\Household\Auth\Domain\UserId;
use App\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class UserIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return UserId::class;
    }
}

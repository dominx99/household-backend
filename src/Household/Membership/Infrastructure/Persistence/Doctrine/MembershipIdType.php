<?php

declare(strict_types=1);

namespace App\Household\Membership\Infrastructure\Persistence\Doctrine;

use App\Household\Membership\Domain\MembershipId;
use App\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class MembershipIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return MembershipId::class;
    }
}

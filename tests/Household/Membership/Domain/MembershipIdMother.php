<?php

declare(strict_types=1);

namespace App\Tests\Household\Membership\Domain;

use App\Household\Membership\Domain\MembershipId;
use App\Tests\Shared\Domain\UuidMother;

final class MembershipIdMother
{
    public static function create(?string $value = null): MembershipId
    {
        return new MembershipId($value ?? UuidMother::create());
    }
}

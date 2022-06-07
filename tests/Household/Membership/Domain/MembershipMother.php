<?php

declare(strict_types=1);

namespace App\Tests\Household\Membership\Domain;

use App\Household\Membership\Domain\Member;
use App\Household\Membership\Domain\Membership;
use App\Household\Membership\Domain\MembershipId;
use App\Household\Membership\Domain\Resource;

final class MembershipMother
{
    public static function create(
        ?MembershipId $id = null,
        ?Member $member = null,
        ?Resource $resource = null,
    ): Membership {
        return new Membership(
            $id ?? MembershipIdMother::create(),
            $member ?? MemberMother::create(),
            $resource ?? ResourceMother::create(),
        );
    }
}

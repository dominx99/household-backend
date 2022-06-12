<?php

declare(strict_types=1);

namespace App\Tests\Household\Membership\Application\Find;

use App\Household\Membership\Application\SearchByCriteria\MembershipResponse;
use App\Household\Membership\Application\SearchByCriteria\MembershipsResponse;

final class MembershipsResponseMother
{
    public static function create(MembershipResponse ...$memberships)
    {
        return new MembershipsResponse(...$memberships);
    }
}

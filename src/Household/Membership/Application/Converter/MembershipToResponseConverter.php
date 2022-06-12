<?php

declare(strict_types=1);

namespace App\Household\Membership\Application\Converter;

use App\Household\Membership\Application\SearchByCriteria\MembershipResponse;
use App\Household\Membership\Domain\Membership;

final class MembershipToResponseConverter
{
    public function __invoke(Membership $membership): MembershipResponse
    {
        return new MembershipResponse(
            $membership->id()->value(),
            $membership->member()->id()->value(),
            $membership->member()->type(),
            $membership->resource()->id()->value(),
            $membership->resource()->type(),
        );
    }
}

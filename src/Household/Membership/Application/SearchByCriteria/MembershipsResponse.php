<?php

declare(strict_types=1);

namespace App\Household\Membership\Application\SearchByCriteria;

use App\Shared\Domain\Bus\Query\Response;

final class MembershipsResponse implements Response
{
    private array $memberships;

    public function __construct(MembershipResponse ...$memberships)
    {
        $this->memberships = $memberships;
    }

    public function memberships(): array
    {
        return $this->memberships;
    }
}

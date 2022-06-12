<?php

declare(strict_types=1);

namespace App\Household\Membership\Application\SearchByCriteria;

use App\Shared\Domain\Bus\Query\Query;

final class SearchMembershipsByResourceAndMemberTypeQuery implements Query
{
    public function __construct(private string $resourceId, private string $memberType)
    {
    }

    public function resourceId(): string
    {
        return $this->resourceId;
    }

    public function memberType(): string
    {
        return $this->memberType;
    }
}

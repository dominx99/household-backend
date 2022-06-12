<?php

declare(strict_types=1);

namespace App\Household\Membership\Application\SearchByCriteria;

final class MembershipResponse
{
    public function __construct(
        private string $id,
        private string $memberId,
        private string $memberType,
        private string $resourceId,
        private string $resourceType,
    ) {
    }
}

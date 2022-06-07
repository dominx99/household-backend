<?php

declare(strict_types=1);

namespace App\Household\Membership\Domain;

use App\Shared\Domain\Criteria\Criteria;

interface MembershipRepository
{
    public function save(Membership $membership): void;

    public function search(MembershipId $id): ?Membership;

    public function matching(Criteria $criteria): array;
}

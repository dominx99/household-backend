<?php

declare(strict_types=1);

namespace App\Household\Membership\Infrastructure\Persistence;

use App\Household\Membership\Domain\Membership;
use App\Household\Membership\Domain\MembershipId;
use App\Household\Membership\Domain\MembershipRepository;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class MySqlMembershipRepository extends DoctrineRepository implements MembershipRepository
{
    public function save(Membership $membership): void
    {
        $this->persist($membership);
    }

    public function search(MembershipId $id): ?Membership
    {
        return $this->repository(Membership::class)->find($id);
    }

    public function matching(Criteria $criteria): array
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria);

        return $this->repository(Membership::class)->matching($doctrineCriteria)->toArray();
    }
}

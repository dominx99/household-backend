<?php

declare(strict_types=1);

namespace App\Household\Membership\Domain;

final class Membership
{
    public function __construct(
        private MembershipId $id,
        private Member $member,
        private Resource $resource,
    ) {
    }

    public function id(): MembershipId
    {
        return $this->id;
    }

    public function member(): Member
    {
        return $this->member;
    }

    public function resource(): Resource
    {
        return $this->resource;
    }
}

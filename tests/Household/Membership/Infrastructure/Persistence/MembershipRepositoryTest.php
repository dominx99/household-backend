<?php

declare(strict_types=1);

namespace App\Tests\Household\Membership\Infrastructure\Persistence;

use App\Household\Membership\Domain\Membership;
use App\Tests\Household\Membership\Domain\MembershipCriteriaMother;
use App\Tests\Household\Membership\Domain\MembershipMother;
use App\Tests\Household\Membership\MembershipModuleInfrastructureTestCase;

final class MembershipRepositoryTest extends MembershipModuleInfrastructureTestCase
{
    private Membership $membership;

    public function setUp(): void
    {
        parent::setUp();

        $this->membership = MembershipMother::create();
    }

    /** @test */
    public function should_return_members_matching_resource_and_member_type(): void
    {
        $this->repository()->save($this->membership);

        $criteria = MembershipCriteriaMother::resourceIdAndMemberTypeEquals(
            $this->membership->resource()->id(),
            $this->membership->member()->type(),
        );

        $memberships = $this->repository()->matching($criteria);

        $this->assertSimilar($this->membership, reset($memberships));
    }

    /** @test */
    public function should_save_member_and_resource_as_membership(): void
    {
        $this->repository()->save($this->membership);

        $this->assertEquals($this->membership, $this->repository()->search($this->membership->id()));
    }

    /** @test */
    public function should_return_null_on_empty_criteria(): void
    {
        $criteria = MembershipCriteriaMother::resourceIdAndMemberTypeEquals(
            $this->membership->resource()->id(),
            $this->membership->member()->type(),
        );

        $memberships = $this->repository()->matching($criteria);

        $this->assertEmpty($memberships);
    }
}

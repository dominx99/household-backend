<?php

declare(strict_types=1);

namespace App\Tests\Household\Membership;

use App\Household\Membership\Domain\MembershipRepository;
use App\Tests\Household\Shared\Infrastructure\PhpUnit\HouseholdContextInfrastructureTestCase;

abstract class MembershipModuleInfrastructureTestCase extends HouseholdContextInfrastructureTestCase
{
    protected function repository(): MembershipRepository
    {
        return $this->service(MembershipRepository::class);
    }
}

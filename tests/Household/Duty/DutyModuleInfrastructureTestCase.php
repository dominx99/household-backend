<?php

declare(strict_types=1);

namespace App\Tests\Household\Duty;

use App\Household\Duty\Domain\DutyRepository;
use App\Tests\Household\Shared\Infrastructure\PhpUnit\HouseholdContextInfrastructureTestCase;

abstract class DutyModuleInfrastructureTestCase extends HouseholdContextInfrastructureTestCase
{
    protected function repository(): DutyRepository
    {
        return $this->service(DutyRepository::class);
    }
}

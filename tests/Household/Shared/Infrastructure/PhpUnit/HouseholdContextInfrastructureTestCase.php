<?php

declare(strict_types=1);

namespace App\Tests\Household\Shared\Infrastructure\PhpUnit;

use App\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
use Apps\Household\Backend\HouseholdBackendKernel;
use Doctrine\ORM\EntityManagerInterface;

abstract class HouseholdContextInfrastructureTestCase extends InfrastructureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $arranger = new HouseholdEnvironmentArranger($this->service(EntityManagerInterface::class));

        $arranger->arrange();
    }

    protected function tearDown(): void
    {
        $arranger = new HouseholdEnvironmentArranger($this->service(EntityManagerInterface::class));

        $arranger->close();

        parent::tearDown();
    }

    protected function kernelClass(): string
    {
        return HouseholdBackendKernel::class;
    }
}

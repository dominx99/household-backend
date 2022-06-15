<?php

declare(strict_types=1);

namespace App\Tests\Household\Listing;

use App\Household\Listing\Domain\ListingRepository;
use App\Tests\Household\Shared\Infrastructure\PhpUnit\HouseholdContextInfrastructureTestCase;

abstract class ListingModuleInfrastructureTestCase extends HouseholdContextInfrastructureTestCase
{
    protected function repository(): ListingRepository
    {
        return $this->service(ListingRepository::class);
    }
}

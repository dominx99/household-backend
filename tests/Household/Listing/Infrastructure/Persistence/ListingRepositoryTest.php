<?php

declare(strict_types=1);

namespace App\Tests\Household\Listing\Infrastructure\Persistence;

use App\Tests\Household\Listing\Domain\ListingMother;
use App\Tests\Household\Listing\ListingModuleInfrastructureTestCase;

final class ListingRepositoryTest extends ListingModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_listing(): void
    {
        $listing = ListingMother::create();

        $this->repository()->save($listing);
    }

    /** @test */
    public function is_should_return_existing_listing(): void
    {
        $listing = ListingMother::create();

        $this->repository()->save($listing);

        $this->assertEquals($listing, $this->repository()->search($listing->id()));
    }
}

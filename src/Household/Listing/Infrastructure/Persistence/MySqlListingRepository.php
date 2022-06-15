<?php

declare(strict_types=1);

namespace App\Household\Listing\Infrastructure\Persistence;

use App\Household\Listing\Domain\Listing;
use App\Household\Listing\Domain\ListingId;
use App\Household\Listing\Domain\ListingRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class MySqlListingRepository extends DoctrineRepository implements ListingRepository
{
    public function save(Listing $listing): void
    {
        $this->persist($listing);
    }

    public function search(ListingId $id): ?Listing
    {
        return $this->repository(Listing::class)->find($id);
    }
}

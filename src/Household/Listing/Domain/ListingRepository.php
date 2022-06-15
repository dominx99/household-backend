<?php

declare(strict_types=1);

namespace App\Household\Listing\Domain;

interface ListingRepository
{
    public function save(Listing $listing): void;

    public function search(ListingId $id): ?Listing;
}

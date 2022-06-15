<?php

declare(strict_types=1);

namespace App\Household\Listing\Infrastructure\Persistence\Doctrine;

use App\Household\Listing\Domain\ListingId;
use App\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class ListingIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return ListingId::class;
    }
}

<?php

declare(strict_types=1);

namespace App\Tests\Household\Listing\Domain;

use App\Household\Listing\Domain\ListingId;
use App\Tests\Shared\Domain\UuidMother;

final class ListingIdMother
{
    public static function create(?string $value = null): ListingId
    {
        return new ListingId($value ?? UuidMother::create());
    }
}

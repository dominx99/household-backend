<?php

declare(strict_types=1);

namespace App\Tests\Household\Listing\Domain;

use App\Household\Listing\Domain\Listing;
use App\Household\Listing\Domain\ListingId;
use App\Household\Listing\Application\Create\CreateListingCommand;
use App\Tests\Shared\Domain\WordMother;

final class ListingMother
{
    public static function create(
        ?ListingId $id = null,
        ?string $name = null,
    ): Listing {
        return new Listing(
            $id ?? ListingIdMother::create(),
            $name ?? WordMother::create(),
        );
    }

    public static function fromRequest(CreateListingCommand $request): Listing
    {
        return self::create(
            ListingIdMother::create($request->id()),
            $request->name() ?? WordMother::create(),
        );
    }
}

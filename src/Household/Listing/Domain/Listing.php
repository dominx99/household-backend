<?php

declare(strict_types=1);

namespace App\Household\Listing\Domain;

use App\Shared\Domain\Aggregate\AggregateRoot;

final class Listing extends AggregateRoot
{
    public function __construct(
        private ListingId $id,
        private string $name,
    ) {
    }

    public function id(): ListingId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}

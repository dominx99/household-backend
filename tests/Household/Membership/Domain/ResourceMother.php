<?php

declare(strict_types=1);

namespace App\Tests\Household\Membership\Domain;

use App\Household\Membership\Domain\Resource;
use App\Shared\Domain\BasicId;
use App\Tests\Shared\Domain\BasicIdMother;
use App\Tests\Shared\Domain\WordMother;

final class ResourceMother
{
    public static function create(
        ?BasicId $id = null,
        ?string $type = null,
    ): Resource {
        return new Resource(
            $id ?? BasicIdMother::create(),
            $type ?? WordMother::create(),
        );
    }
}

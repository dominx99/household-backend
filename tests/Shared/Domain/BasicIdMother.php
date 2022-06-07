<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain;

use App\Shared\Domain\BasicId;

final class BasicIdMother
{
    public static function create(): BasicId
    {
        return new BasicId(UuidMother::create());
    }
}

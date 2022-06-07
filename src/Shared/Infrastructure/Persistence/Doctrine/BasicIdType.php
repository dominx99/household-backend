<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Persistence\Doctrine;

use App\Shared\Domain\BasicId;

final class BasicIdType extends UuidType
{
    public function typeClassName(): string
    {
        return BasicId::class;
    }
}

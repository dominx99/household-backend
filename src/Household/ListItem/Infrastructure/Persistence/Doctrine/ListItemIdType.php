<?php

declare(strict_types=1);

namespace App\Household\ListItem\Infrastructure\Persistence\Doctrine;

use App\Household\ListItem\Domain\ListItemId;
use App\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class ListItemIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return ListItemId::class;
    }
}

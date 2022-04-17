<?php

declare(strict_types=1);

namespace App\Household\Task\Infrastructure\Persistence\Doctrine;

use App\Household\Task\Domain\TaskId;
use App\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class TaskIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return TaskId::class;
    }
}

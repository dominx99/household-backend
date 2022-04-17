<?php

declare(strict_types=1);

namespace App\Tests\Household\Task\Domain;

use App\Household\Task\Domain\TaskId;
use App\Tests\Shared\Domain\UuidMother;

final class TaskIdMother
{
    public static function create(?string $value = null): TaskId
    {
        return new TaskId($value ?? UuidMother::create());
    }
}

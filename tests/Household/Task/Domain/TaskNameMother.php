<?php

declare(strict_types=1);

namespace App\Tests\Household\Task\Domain;

use App\Household\Task\Domain\TaskName;
use App\Tests\Shared\Domain\WordMother;

final class TaskNameMother
{
    public static function create(?string $value = null): TaskName
    {
        return new TaskName($value ?? WordMother::create());
    }
}

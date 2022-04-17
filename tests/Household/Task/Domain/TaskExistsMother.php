<?php

declare(strict_types=1);

namespace App\Tests\Household\Task\Domain;

use App\Household\Task\Domain\TaskExists;
use App\Tests\Shared\Domain\BooleanMother;

final class TaskExistsMother
{
    public static function create(?bool $value = null): TaskExists
    {
        return new TaskExists($value ?? BooleanMother::create());
    }
}

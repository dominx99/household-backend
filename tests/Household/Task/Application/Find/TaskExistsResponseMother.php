<?php

declare(strict_types=1);

namespace App\Tests\Household\Task\Application\Find;

use App\Household\Task\Application\Find\TaskExistsResponse;
use App\Household\Task\Domain\TaskExists;
use App\Tests\Household\Task\Domain\TaskExistsMother;

final class TaskExistsResponseMother
{
    public static function create(?TaskExists $exists = null): TaskExistsResponse
    {
        return new TaskExistsResponse($exists?->value() ?? TaskExistsMother::create()->value());
    }
}

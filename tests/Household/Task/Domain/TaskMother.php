<?php

declare(strict_types=1);

namespace App\Tests\Household\Task\Domain;

use App\Household\Task\Application\Create\CreateTaskCommand;
use App\Household\Task\Domain\Task;
use App\Household\Task\Domain\TaskId;
use App\Household\Task\Domain\TaskName;

final class TaskMother
{
    public static function create(
        ?TaskId $id = null,
        ?TaskName $name = null,
    ): Task {
        return new Task(
            $id ?? TaskIdMother::create(),
            $name ?? TaskNameMother::create(),
        );
    }

    public static function fromRequest(CreateTaskCommand $request): Task
    {
        return self::create(
            TaskIdMother::create($request->id()),
            TaskNameMother::create($request->name()),
        );
    }
}

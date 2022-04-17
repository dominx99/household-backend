<?php

declare(strict_types=1);

namespace App\Tests\Household\Task\Application\Create;

use App\Household\Task\Application\Create\CreateTaskCommand;
use App\Household\Task\Domain\TaskId;
use App\Household\Task\Domain\TaskName;
use App\Tests\Household\Task\Domain\TaskIdMother;
use App\Tests\Household\Task\Domain\TaskNameMother;

final class CreateTaskCommandMother
{
    public static function create(
        ?TaskId $id = null,
        ?TaskName $name = null,
    ): CreateTaskCommand {
        return new CreateTaskCommand(
            $id?->value() ?? TaskIdMother::create()->value(),
            $name?->value() ?? TaskNameMother::create()->value(),
        );
    }
}

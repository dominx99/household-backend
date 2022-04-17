<?php

declare(strict_types=1);

namespace App\Tests\Household\Task\Domain;

use App\Household\Task\Domain\Task;
use App\Household\Task\Domain\TaskCreatedDomainEvent;
use App\Household\Task\Domain\TaskId;
use App\Household\Task\Domain\TaskName;

final class TaskCreatedDomainEventMother
{
    public static function create(
        ?TaskId $id = null,
        ?TaskName $name = null,
    ): TaskCreatedDomainEvent {
        return new TaskCreatedDomainEvent(
            $id?->value() ?? TaskIdMother::create()->value(),
            $name?->value() ?? TaskNameMother::create()->value(),
        );
    }

    public static function fromDuty(Task $duty): TaskCreatedDomainEvent
    {
        return self::create($duty->id(), $duty->name());
    }
}

<?php

declare(strict_types=1);

namespace App\Household\Task\Domain;

use App\Shared\Domain\Aggregate\AggregateRoot;

final class Task extends AggregateRoot
{
    public function __construct(
        private TaskId $id,
        private TaskName $name,
    ) {
    }

    public static function create(TaskId $id, TaskName $name): self
    {
        $task = new self($id, $name);

        $task->record(new TaskCreatedDomainEvent($id->value(), $name->value()));

        return $task;
    }

    public function id(): TaskId
    {
        return $this->id;
    }

    public function name(): TaskName
    {
        return $this->name;
    }
}
